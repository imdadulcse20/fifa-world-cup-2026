@extends('layouts.admin')

@section('title', 'Manage FAQs')

@section('content')
<div class="space-y-8">
    <!-- Add FAQ Form -->
    <div class="bg-white dark:bg-slate-800 rounded-[3rem] shadow-xl border border-slate-100 dark:border-slate-700 overflow-hidden max-w-4xl">
        <div class="p-8 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-900/50">
            <h2 class="text-xl font-black text-slate-800 dark:text-white uppercase tracking-tight">Add New FAQ</h2>
        </div>
        <form action="{{ route('admin.faqs.store') }}" method="POST" class="p-8 space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Select Page</label>
                    <select name="page" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500 text-slate-800 dark:text-white">
                        @foreach($pages as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Sort Order</label>
                    <input type="number" name="sort_order" value="0" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Question</label>
                <input type="text" name="question" required class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Answer</label>
                <textarea name="answer" rows="4" required class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-medium focus:ring-2 focus:ring-primary-500"></textarea>
            </div>

            <div class="pt-4">
                <button type="submit" class="px-8 py-4 bg-primary-500 text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-primary-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                    ADD FAQ
                </button>
            </div>
        </form>
    </div>

    <!-- FAQ List -->
    <div class="space-y-4">
        <h2 class="text-2xl font-black text-slate-800 dark:text-white uppercase tracking-tight ml-4">Existing FAQs</h2>
        
        @foreach($faqs->groupBy('page') as $page => $pageFaqs)
            <div class="space-y-4">
                <h3 class="text-sm font-black text-primary-500 uppercase tracking-[0.2em] ml-6 mt-8">{{ $pages[$page] ?? ucfirst($page) }}</h3>
                <div class="grid grid-cols-1 gap-4">
                    @foreach($pageFaqs as $faq)
                        <div class="bg-white dark:bg-slate-800 rounded-[2rem] p-6 shadow-sm border border-slate-100 dark:border-slate-700 flex flex-col md:flex-row md:items-center justify-between gap-6 group hover:border-primary-500/30 transition-colors">
                            <div class="flex-1 space-y-2">
                                <div class="flex items-center space-x-3">
                                    <span class="px-2 py-1 bg-slate-100 dark:bg-slate-900 rounded-lg text-[10px] font-black text-slate-500">#{{ $faq->sort_order }}</span>
                                    <h4 class="font-bold text-slate-800 dark:text-white">{{ $faq->question }}</h4>
                                </div>
                                <p class="text-sm text-slate-500 dark:text-slate-400 ml-10">{{ Str::limit($faq->answer, 150) }}</p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button onclick="editFaq({{ json_encode($faq) }})" class="p-4 bg-slate-50 dark:bg-slate-900 text-slate-400 hover:text-primary-500 rounded-2xl transition-all">
                                    <i data-lucide="edit-3" class="w-5 h-5"></i>
                                </button>
                                <form action="{{ route('admin.faqs.delete', $faq->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-4 bg-slate-50 dark:bg-slate-900 text-slate-400 hover:text-red-500 rounded-2xl transition-all">
                                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Edit Modal (Simple implementation) -->
<div id="editModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-950/50 backdrop-blur-sm">
    <div class="bg-white dark:bg-slate-800 rounded-[3rem] shadow-2xl border border-slate-100 dark:border-slate-700 overflow-hidden max-w-2xl w-full">
        <div class="p-8 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
            <h2 class="text-xl font-black text-slate-800 dark:text-white uppercase tracking-tight">Edit FAQ</h2>
            <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600"><i data-lucide="x" class="w-6 h-6"></i></button>
        </div>
        <form id="editForm" method="POST" class="p-8 space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Select Page</label>
                    <select name="page" id="editPage" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500 text-slate-800 dark:text-white">
                        @foreach($pages as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Sort Order</label>
                    <input type="number" name="sort_order" id="editSortOrder" class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Question</label>
                <input type="text" name="question" id="editQuestion" required class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Answer</label>
                <textarea name="answer" id="editAnswer" rows="4" required class="w-full bg-slate-50 dark:bg-slate-900 border-none rounded-2xl p-4 font-medium focus:ring-2 focus:ring-primary-500"></textarea>
            </div>

            <div class="pt-4 flex space-x-4">
                <button type="submit" class="flex-1 py-4 bg-primary-500 text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-primary-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                    UPDATE FAQ
                </button>
                <button type="button" onclick="closeModal()" class="flex-1 py-4 bg-slate-100 dark:bg-slate-900 text-slate-500 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-slate-200 transition-all">
                    CANCEL
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function editFaq(faq) {
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editModal').classList.add('flex');
        document.getElementById('editForm').action = `/admin/faqs/${faq.id}`;
        document.getElementById('editPage').value = faq.page;
        document.getElementById('editSortOrder').value = faq.sort_order;
        document.getElementById('editQuestion').value = faq.question;
        document.getElementById('editAnswer').value = faq.answer;
    }

    function closeModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editModal').classList.remove('flex');
    }
</script>
@endsection
