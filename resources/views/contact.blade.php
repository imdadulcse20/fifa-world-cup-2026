@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="max-w-4xl mx-auto py-12">
    <div class="bg-white dark:bg-slate-900 rounded-[3rem] shadow-xl border border-slate-100 dark:border-slate-800 overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="p-10 md:p-16 space-y-8">
                <div>
                    <h1 class="text-4xl font-black text-slate-800 dark:text-white uppercase tracking-tight mb-4">Contact Us</h1>
                    <p class="text-slate-500 dark:text-slate-400 font-medium">Have questions or feedback about the 2026 World Cup? We'd love to hear from you.</p>
                </div>

                <div class="space-y-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-primary-500/10 rounded-2xl flex items-center justify-center text-primary-500">
                            <i data-lucide="mail" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Email Address</p>
                            <p class="font-bold text-slate-700 dark:text-slate-200">support@fwc2026.com</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-primary-500/10 rounded-2xl flex items-center justify-center text-primary-500">
                            <i data-lucide="map-pin" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Main Office</p>
                            <p class="font-bold text-slate-700 dark:text-slate-200">New York, United States</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 dark:bg-slate-800/50 p-10 md:p-16">
                <form action="#" method="POST" class="space-y-6" onsubmit="alert('Message sent! (Demo only)'); return false;">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Full Name</label>
                        <input type="text" required class="w-full bg-white dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Email Address</label>
                        <input type="email" required class="w-full bg-white dark:bg-slate-900 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-primary-500">
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-4">Message</label>
                        <textarea rows="4" required class="w-full bg-white dark:bg-slate-900 border-none rounded-2xl p-4 font-medium focus:ring-2 focus:ring-primary-500"></textarea>
                    </div>

                    <button type="submit" class="w-full py-4 bg-primary-500 text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-primary-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                        SEND MESSAGE
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Page Description -->
    @include('layouts.page-description', [
        'title' => 'Building a Global Football Community',
        'content' => '
            <p>At the heart of our 2026 World Cup portal is a commitment to building a vibrant and engaged global football community. We believe that the fans are the lifeblood of the sport, and your feedback is essential in helping us create a platform that truly serves the needs of the international football family. The "Contact Us" page is more than just a form; it is a direct line of communication between our team and the millions of fans who share our passion for the beautiful game. Every message we receive is an opportunity for us to learn, improve, and better celebrate the historic event that is the 2026 FIFA World Cup™.</p>
            
            <p>Our philosophy is rooted in transparency and responsiveness. Whether you have a technical question about our live score updates, a suggestion for a new feature, or simply want to share your excitement for your national team, we are here to listen. We understand that in the fast-paced world of international sports, accuracy and reliability are paramount. If you spot a discrepancy in our match data or have an inquiry about our stadium guides, your input allows us to maintain the high standards that our users expect. By working together with our community, we can ensure that our portal remains the most trusted and comprehensive resource for World Cup enthusiasts everywhere.</p>
            
            <p>Beyond technical support, we are eager to hear your stories. The World Cup is a tapestry of personal experiences—the journey to a host city, the joy of a last-minute goal, and the shared camaraderie of fans from different nations. We encourage you to use this contact channel to share how the 2026 tournament is impacting your community. Are you part of a local supporters\' club? Are you a volunteer at one of the 16 host venues? Your unique perspective enriches our understanding of the tournament’s global impact and helps us highlight the "human side" of the World Cup that often goes unnoticed by mainstream media.</p>
            
            <p>We also welcome inquiries regarding partnerships and collaborations. As we count down to 2026, we are always looking for ways to work with other organizations, content creators, and community leaders who share our vision for a more inclusive and engaged football world. If you have a proposal for a joint project, a sponsorship inquiry, or a media request, our dedicated team is ready to explore how we can work together to amplify the message of the 2026 World Cup. We believe that by pooling our resources and creativity, we can create experiences that are far greater than the sum of their parts.</p>
            
            <p>Our commitment to you extends beyond the duration of the tournament. We aim to build a platform that remains a hub for international football long after the final whistle has blown in 2026. Your long-term feedback helps us plan for the future, ensuring that we continue to evolve alongside the sport and its fans. We are constantly exploring new technologies, from interactive data visualizations to community-driven content sections, and your input is the compass that guides our development roadmap. We are building this for you, and we want you to be part of every step of the journey.</p>
            
            <p>In conclusion, thank you for being a part of our community. Your passion, your expertise, and your feedback are what drive us to excellence every single day. As we prepare for the biggest sporting event in history, we look forward to hearing from you and working together to make the 2026 World Cup an unforgettable experience for everyone. Whether you are reaching out from a bustling host city in Mexico or a quiet village thousands of miles away, your voice matters to us. Let’s keep the conversation going and celebrate the unifying power of football together.</p>
        '
    ])
</div>
@endsection
