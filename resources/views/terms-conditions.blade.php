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

    <!-- Page Description -->
    @include('layouts.page-description', [
        'title' => 'Fostering a Culture of Digital Responsibility',
        'content' => '
            <p>The "Terms & Conditions" of our 2026 World Cup portal are designed to create a safe, fair, and respectful environment for all users to enjoy the excitement of the tournament. These terms represent a mutual agreement between our platform and the global community of football fans, outlining the responsibilities and standards of conduct that allow us to maintain a high-quality digital experience. We believe that by fostering a culture of digital responsibility, we can protect the integrity of our data, respect the intellectual property of our partners, and ensure that every user has a positive and engaging journey through the world’s greatest sporting event.</p>
            
            <p>A primary focus of our terms is the principle of "fair use." The materials provided on our site—from real-time match scores and detailed standings to original articles and stadium guides—are intended for personal, non-commercial use by our community. We invest significant resources into the accuracy and delivery of this data, and we ask our users to respect this investment by not engaging in automated scraping, unauthorized redistribution, or commercial exploitation of our content. By adhering to these guidelines, you help us sustain the platform and continue providing free, high-quality information to millions of fans around the world who might not otherwise have access to such comprehensive coverage.</p>
            
            <p>Digital responsibility also extends to how users interact with our platform and each other. We are committed to maintaining a space that is free from harassment, misinformation, and illegal activity. Our terms prohibit the submission of any content that is defamatory, offensive, or infringing on the rights of others. We believe that the World Cup should be a unifying force, and we expect our community to embody the values of "fair play" that are celebrated on the football pitch. By using our site, you agree to contribute to a constructive and respectful atmosphere, where diverse opinions are welcomed and the passion for the sport is shared in a positive way.</p>
            
            <p>Intellectual property is another critical pillar of our agreement. We respect the trademarks and copyrights of FIFA, the participating national teams, and our various data and media partners. The logos, images, and trademarks associated with the 2026 World Cup are used on our site for editorial and informational purposes, and we remind our users that these assets are protected by international law. Respecting these rights is essential for the continued success of the tournament and the complex ecosystem of organizations that make it possible. We ask our community to be mindful of these boundaries as they share and engage with World Cup content across the digital landscape.</p>
            
            <p>Our terms also include important disclaimers regarding the nature of digital data and service availability. While we strive for 100% accuracy and uptime, the technical realities of live data scraping and high-traffic web hosting mean that occasional errors or interruptions may occur. We provide our services on an "as-is" basis and ask for your understanding as we navigate the immense technical challenges of covering a 48-team, 104-match tournament. Your use of the site implies acceptance of these realities and a shared commitment to resolving any issues through constructive communication and mutual respect.</p>
            
            <p>In conclusion, these Terms & Conditions are the foundation of a trust-based relationship between our portal and its users. They are not merely "fine print," but a vital part of our mission to deliver the best possible World Cup experience. We encourage you to read them carefully and reach out to us if you have any questions or concerns. By working together within this framework of responsibility and fair use, we can ensure that the 2026 World Cup remains a source of joy, inspiration, and unity for everyone. Thank you for being a responsible member of our global football family and for joining us on this extraordinary journey to 2026.</p>
        '
    ])
</div>
@endsection
