@extends('layouts.app')

@section('title', 'Terms & Conditions')

@section('content')
<div class="max-w-4xl mx-auto py-12">
    <div class="bg-white dark:bg-slate-900 rounded-[3rem] p-10 md:p-16 shadow-xl border border-slate-100 dark:border-slate-800">
        <h1 class="text-4xl font-black mb-8 text-slate-800 dark:text-white uppercase tracking-tight">Terms & Conditions</h1>
        
        <div class="prose dark:prose-invert prose-slate max-w-none space-y-6 text-slate-600 dark:text-slate-400">
            <p class="text-lg font-medium">By accessing this website, you are agreeing to be bound by these terms of service, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws.</p>
            
            <section class="space-y-4">
                <h2 class="text-xl font-bold text-slate-800 dark:text-white">1. Use License</h2>
                <p>Permission is granted to temporarily download one copy of the materials (information or software) on our website for personal, non-commercial transitory viewing only.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-xl font-bold text-slate-800 dark:text-white">2. Disclaimer</h2>
                <p>The materials on our website are provided on an 'as is' basis. We make no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-xl font-bold text-slate-800 dark:text-white">3. Limitations</h2>
                <p>In no event shall we or our suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on our website.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-xl font-bold text-slate-800 dark:text-white">4. Accuracy of Materials</h2>
                <p>The materials appearing on our website could include technical, typographical, or photographic errors. We do not warrant that any of the materials on its website are accurate, complete or current.</p>
            </section>

            <p class="pt-8 border-t border-slate-100 dark:border-slate-800 italic">These terms are governed by and construed in accordance with the laws and you irrevocably submit to the exclusive jurisdiction of the courts in that State or location.</p>
        </div>
    </div>
</div>
@endsection
