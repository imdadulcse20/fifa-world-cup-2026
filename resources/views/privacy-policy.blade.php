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

    <!-- Page Description -->
    @include('layouts.page-description', [
        'title' => 'Our Commitment to Data Ethics and Security',
        'content' => '
            <p>In an increasingly digital world, the protection of personal data is not just a legal requirement but a fundamental ethical obligation. At our 2026 World Cup portal, we take this responsibility with the utmost seriousness, ensuring that every user can engage with our platform with complete peace of mind. Our "Privacy Policy" page is a comprehensive declaration of how we collect, use, and safeguard your information, reflecting our deep-seated commitment to transparency, security, and user autonomy. We believe that a world-class fan experience must be built on a foundation of trust and respect for individual privacy.</p>
            
            <p>Our approach to data collection is governed by the principle of "minimalism." We only request the information that is absolutely necessary to provide you with the services you desire, such as personalized match alerts or community engagement features. We do not engage in invasive tracking or the "shadow" collection of data that characterizes many modern web platforms. Your information is treated as a temporary trust, never as a commodity to be sold or traded. By limiting the data we hold, we inherently reduce the risk to our users, ensuring that your digital footprint on our site remains as small as possible while still delivering a rich and engaging experience.</p>
            
            <p>Security is at the core of our technical infrastructure. We employ industry-leading encryption and secure server protocols to protect our database from unauthorized access, loss, or theft. Our team of developers and security experts continuously monitors our systems for potential vulnerabilities, implementing regular updates and patches to stay ahead of emerging threats. We understand that when you trust us with your email address or your preferences, you are trusting us with a piece of your digital identity. We honor that trust by maintaining a "security-first" culture that permeates every aspect of our organization, from back-end coding to front-end design.</p>
            
            <p>We are also committed to empowering our users with control over their own data. We believe that you should have the final say in how your information is used and for how long. Our portal provides clear and accessible tools for you to manage your privacy settings, request a copy of the data we hold, or ask for the permanent deletion of your information at any time. We strive to make these processes as simple and transparent as possible, moving beyond the complex "legalese" that often obscures user rights. Your data belongs to you, and we are merely its temporary custodians, dedicated to serving your needs while respecting your boundaries.</p>
            
            <p>Our data ethics also extend to how we handle third-party integrations and external links. We carefully vet every partner and service provider we work with, ensuring that they share our high standards for privacy and security. While we cannot control the policies of external sites that we may link to, we are transparent about these transitions, providing you with the information you need to make informed decisions about your digital safety. We believe in building a "web of trust," where every connection is made with the user’s best interests in mind, fostering a safer and more ethical online ecosystem for all football fans.</p>
            
            <p>As the digital landscape continues to evolve, so too will our privacy practices. We are committed to a process of continuous improvement, regularly reviewing and updating our policies to reflect new legal standards and technological advancements. We invite our community to engage with us on these topics, providing feedback and asking the questions that help us stay accountable. The 2026 World Cup is a celebration of global unity, and we believe that this unity should extend to how we protect and respect one another in the digital realm. Thank you for trusting us as your companion for the greatest tournament on Earth.</p>
        '
    ])
</div>
@endsection
