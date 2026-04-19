@extends('layouts.app')

@section('title', 'About the Tournament')

@section('content')
<div class="max-w-4xl mx-auto py-12">
    <div class="bg-white dark:bg-slate-900 rounded-[3rem] p-10 md:p-16 shadow-xl border border-slate-100 dark:border-slate-800">
        <h1 class="text-4xl font-black mb-8 text-slate-800 dark:text-white uppercase tracking-tight">About FIFA World Cup 2026</h1>
        
        <div class="prose dark:prose-invert prose-slate max-w-none space-y-8 text-slate-600 dark:text-slate-400">
            <p class="text-xl font-medium leading-relaxed">The FIFA World Cup 2026™ will be the 23rd FIFA World Cup, the quadrennial international men's football championship contested by the national teams of the member associations of FIFA.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-8">
                <div class="bg-slate-50 dark:bg-slate-800/50 p-8 rounded-3xl text-center">
                    <div class="text-3xl font-black text-primary-500 mb-2">48</div>
                    <p class="text-xs font-black uppercase tracking-widest text-slate-400">Teams</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-800/50 p-8 rounded-3xl text-center">
                    <div class="text-3xl font-black text-primary-500 mb-2">16</div>
                    <p class="text-xs font-black uppercase tracking-widest text-slate-400">Host Cities</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-800/50 p-8 rounded-3xl text-center">
                    <div class="text-3xl font-black text-primary-500 mb-2">3</div>
                    <p class="text-xs font-black uppercase tracking-widest text-slate-400">Host Nations</p>
                </div>
            </div>

            <section class="space-y-4 pt-8">
                <h2 class="text-2xl font-black text-slate-800 dark:text-white uppercase tracking-tight">The Vision</h2>
                <p>The 2026 edition marks a historic milestone in football history. By expanding to 48 teams, FIFA aims to provide more opportunities for nations across the globe to participate in the world's most prestigious sporting event.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-black text-slate-800 dark:text-white uppercase tracking-tight">Host Nations</h2>
                <p>For the first time, the tournament will be hosted by three North American countries: Canada, Mexico, and the United States. This collaboration reflects the unifying power of football and the shared passion for the sport across the continent.</p>
            </section>
        </div>
    </div>

    <!-- Page Description -->
    @include('layouts.page-description', [
        'title' => 'The Global Vision of FIFA 2026',
        'content' => '
            <p>The vision behind the FIFA World Cup 2026™ is rooted in the belief that football has the unique power to transcend borders, unite diverse cultures, and inspire positive change across the globe. By expanding the tournament to 48 teams, FIFA is not just increasing the number of matches; it is opening the door for more nations to share in the "World Cup dream." This expansion is a testament to the growth of the sport in regions like Africa, Asia, and North America, ensuring that the highest level of competition is accessible to a truly representative sample of the global population. The 2026 edition is designed to be the most inclusive and impactful sporting event in history.</p>
            
            <p>Hosting the tournament across three vast nations—Canada, Mexico, and the United States—is a strategic move that reflects the interconnected nature of the modern world. This collaboration required unprecedented levels of diplomatic and logistical cooperation, setting a new template for how major international events can be co-managed. Each host nation brings its own unique strengths: Mexico’s deep-rooted footballing history and legendary stadiums, the United States’ world-class infrastructure and commercial expertise, and Canada’s vibrant multiculturalism and growing passion for the sport. Together, they offer a tapestry of experiences that will make the 2026 World Cup a journey of discovery for every fan who follows it.</p>
            
            <p>A key pillar of the 2026 vision is sustainability and long-term legacy. The organizers are committed to delivering an event that is environmentally responsible, socially inclusive, and economically beneficial for all host communities. This involves everything from utilizing existing world-class infrastructure to minimize new construction, to implementing innovative waste management and renewable energy solutions at all 16 venues. The goal is to set a new benchmark for "green" mega-events, proving that sport can lead the way in addressing global environmental challenges. The legacy of 2026 will not just be measured in goals and trophies, but in the positive impact left on the planet and its people.</p>
            
            <p>Education and youth development are also central to the tournament’s mission. Through various community outreach programs and football clinics, the 2026 World Cup aims to inspire millions of children to take up the sport and embrace the values of teamwork, respect, and perseverance. By bringing the world’s greatest players to local communities across North America, the tournament will create "grassroots" excitement that will fuel the growth of the game for generations to come. The "United 2026" philosophy is about more than just a tournament; it is about building a lasting bridge between the professional game and the millions of amateur players who are the heartbeat of the sport.</p>
            
            <p>The 2026 World Cup also serves as a platform for technological innovation in sports broadcasting and fan engagement. From advanced data analytics that provide deeper insights into player performance to immersive augmented reality experiences that bring fans closer to the action, the tournament will showcase the future of how we consume sports. Our portal is a part of this digital evolution, providing real-time data and comprehensive coverage that empowers fans to engage with the tournament on their own terms. We believe that by leveraging technology, we can enhance the emotional connection that fans have with the game, making the World Cup a truly interactive global experience.</p>
            
            <p>As we approach the opening ceremony, the anticipation continues to build. The 2026 FIFA World Cup is more than a championship; it is a celebration of our shared humanity and the enduring spirit of competition. It is a moment where the world stops to watch, to cheer, and to dream. We invite you to join us on this extraordinary journey as we witness the realization of a vision that began years ago—a vision of a World Cup that is bigger, better, and more meaningful than anything that has come before. The road to 2026 is paved with ambition, and the destination promises to be nothing short of spectacular.</p>
        '
    ])
</div>
@endsection
