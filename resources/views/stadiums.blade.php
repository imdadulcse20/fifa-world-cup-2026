@extends('layouts.app')

@section('title', '2026 World Cup Host Stadiums & Cities')
@section('meta_description', 'Discover the world-class stadiums hosting the 2026 World Cup across Canada, Mexico, and the USA. View capacities, locations, and match details.')

@section('content')
<div class="space-y-6 max-w-lg mx-auto md:max-w-none pb-12">
    <header>
        <h1 class="text-3xl font-black">2026 Stadiums</h1>
        <p class="text-slate-500 text-sm mt-1">Explore the venues across North America</p>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($stadiums as $stadium)
            <div class="rounded-[2.5rem] overflow-hidden glass dark:glass-dark border border-white/10 group shadow-xl">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ $stadium->image_url }}" alt="{{ $stadium->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition-opacity"></div>
                    <div class="absolute bottom-4 left-6 right-6">
                        <h3 class="text-white font-black text-xl leading-tight">{{ $stadium->name }}</h3>
                        <div class="flex items-center text-white/80 text-xs mt-1">
                            <i data-lucide="map-pin" class="w-3 h-3 mr-1"></i>
                            <span>{{ $stadium->city }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="p-6 flex justify-between items-center">
                    <div class="flex flex-col">
                        <span class="text-[10px] text-slate-500 uppercase font-bold tracking-widest">Capacity</span>
                        <div class="flex items-center space-x-1 mt-1 text-primary-500">
                            <i data-lucide="users" class="w-3.5 h-3.5"></i>
                            <span class="font-bold text-slate-900 dark:text-slate-100">{{ number_format($stadium->capacity) }}</span>
                        </div>
                    </div>
                    
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 bg-primary-500 text-white rounded-full text-[10px] font-bold shadow-lg shadow-primary-500/30">
                            MATCHES
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Page Description -->
    @include('layouts.page-description', [
        'title' => 'Icons of North American Architecture',
        'content' => '
            <p>The 2026 FIFA World Cup™ will be played across 16 world-class venues, each selected for its unique character, advanced technology, and ability to provide a spectacular stage for the beautiful game. These stadiums, spread across Canada, Mexico, and the United States, represent the pinnacle of modern sports architecture and engineering. From historic temples of football with decades of history to state-of-the-art arenas with retractable roofs and innovative sustainability features, the 16 host venues are as diverse as the nations participating in the tournament.</p>
            
            <p>In Mexico, the tournament returns to the legendary Estadio Azteca in Mexico City, a stadium that has witnessed some of the greatest moments in football history, including the finals of 1970 and 1986. Joining it are the modern Estadio BBVA in Monterrey and the sleek Estadio Akron in Guadalajara. These Mexican venues provide a passionate and historic atmosphere that is synonymous with Latin American football. The Azteca, in particular, will host the opening match, continuing its legacy as one of the most important and respected stadiums in the world of sport.</p>
            
            <p>The United States will host matches in 11 cities, featuring some of the most technologically advanced stadiums on the planet. Venues like SoFi Stadium in Los Angeles, AT&T Stadium in Dallas, and Mercedes-Benz Stadium in Atlanta are marvels of modern design, offering incredible sightlines, massive high-definition screens, and premium fan experiences. Many of these stadiums are home to NFL teams and have been retrofitted to meet FIFAs rigorous standards for pitch quality and spectator comfort. The final will take place at MetLife Stadium in New Jersey, a venue capable of hosting over 80,000 fans in a truly world-class setting.</p>
            
            <p>Canada’s contribution to the tournament includes the vibrant BC Place in Vancouver and BMO Field in Toronto. BC Place, with its iconic retractable roof and stunning mountain backdrop, offers one of the most picturesque settings in world football. BMO Field, located in the heart of Toronto, provides an intimate yet electric atmosphere, having been expanded specifically to host the biggest matches. These Canadian venues highlight the country’s growing love for football and its ability to host major international events with style and efficiency.</p>
            
            <p>Sustainability and legacy are core themes for the 16 host stadiums. Many venues have implemented innovative water conservation systems, solar power integration, and waste reduction programs to minimize their environmental impact. Beyond the 2026 tournament, these stadiums will continue to serve their communities as hubs for sports, entertainment, and culture. The investment in these facilities ensures that North America will remain a premier destination for global sporting events for decades to come, inspiring future generations of athletes and fans alike.</p>
            
            <p>Our stadium guide provides you with all the essential details for each venue, including seat capacity, location, and the specific matches they will host. Whether you are attending a game in person or watching from afar, understanding the "home" for each match adds a deeper layer to your World Cup experience. Every stadium has its own "soul"—the way the sound echoes, the way the light hits the pitch, and the energy of the local crowd. As the world descends on North America, these 16 icons will be the heart of the 2026 World Cup, witnessing the drama and triumph that define the greatest tournament on Earth.</p>
        '
    ])
</div>
@endsection
