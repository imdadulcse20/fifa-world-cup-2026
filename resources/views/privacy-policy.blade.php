@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('content')
<div class="max-w-4xl mx-auto py-12">
    <div class="bg-white dark:bg-slate-900 rounded-[3rem] p-10 md:p-16 shadow-xl border border-slate-100 dark:border-slate-800">
        <h1 class="text-4xl font-black mb-8 text-slate-800 dark:text-white uppercase tracking-tight">Privacy Policy</h1>
        
        <div class="prose dark:prose-invert prose-slate max-w-none space-y-6 text-slate-600 dark:text-slate-400">
            <p class="text-lg font-medium">Your privacy is important to us. It is our policy to respect your privacy regarding any information we may collect from you across our website.</p>
            
            <section class="space-y-4">
                <h2 class="text-xl font-bold text-slate-800 dark:text-white">1. Information We Collect</h2>
                <p>We only ask for personal information when we truly need it to provide a service to you. We collect it by fair and lawful means, with your knowledge and consent.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-xl font-bold text-slate-800 dark:text-white">2. Use of Information</h2>
                <p>We only retain collected information for as long as necessary to provide you with your requested service. What data we store, we’ll protect within commercially acceptable means to prevent loss and theft, as well as unauthorized access, disclosure, copying, use or modification.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-xl font-bold text-slate-800 dark:text-white">3. Third-Party Sharing</h2>
                <p>We don’t share any personally identifying information publicly or with third-parties, except when required to by law.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-xl font-bold text-slate-800 dark:text-white">4. External Links</h2>
                <p>Our website may link to external sites that are not operated by us. Please be aware that we have no control over the content and practices of these sites, and cannot accept responsibility or liability for their respective privacy policies.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-xl font-bold text-slate-800 dark:text-white">5. Your Rights</h2>
                <p>You are free to refuse our request for your personal information, with the understanding that we may be unable to provide you with some of your desired services.</p>
            </section>

            <p class="pt-8 border-t border-slate-100 dark:border-slate-800 italic">This policy is effective as of April 2026.</p>
        </div>
    </div>
</div>
@endsection
