@php
    $currentUrl = url()->current();
    $siteUrl = url('/');
    $logoUrl = asset('images/logo.jpeg');
    $appName = $site_settings['app_name'] ?? 'World Cup Live24';
    $companyName = 'World Cup Live24';
    $authorName = 'Imdadul Haque';
    
    // Get title and description from sections or defaults
    $title = View::getSection('title') ? View::getSection('title') . ' - ' . $appName : $appName;
    $description = View::getSection('meta_description') ?? 'Get the latest 2026 World Cup scores, schedule, standings and team news. Stay updated with live match events and stadium information.';
    $pageImage = View::getSection('og_image') ?? $logoUrl;
    
    $publishedDate = '2026-04-19T08:00:00+06:00'; 
    $modifiedDate = date('c'); 
@endphp

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Article",
      "@id": {!! json_encode($currentUrl . '/#article') !!},
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": {!! json_encode($currentUrl) !!}
      },
      "url": {!! json_encode($currentUrl) !!},
      "headline": {!! json_encode($title) !!},
      "image": {!! json_encode($pageImage) !!},
      "datePublished": {!! json_encode($publishedDate) !!},
      "dateModified": {!! json_encode($modifiedDate) !!},
      "author": {
        "@type": "Person",
        "name": {!! json_encode($authorName) !!},
        "url": {!! json_encode($siteUrl . '/about') !!}
      },
      "publisher": {
        "@type": "Organization",
        "name": {!! json_encode($companyName) !!},
        "logo": {
          "@type": "ImageObject",
          "url": {!! json_encode($logoUrl) !!}
        }
      },
      "description": {!! json_encode($description) !!}
    },
    {
      "@type": "LocalBusiness",
      "@id": {!! json_encode($siteUrl . '/#localbusiness') !!},
      "name": {!! json_encode($companyName) !!},
      "image": {!! json_encode($logoUrl) !!},
      "url": {!! json_encode($siteUrl) !!},
      "telephone": "+8801XXXXXXXXX",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "World Cup Plaza, Level 4",
        "addressLocality": "Dhaka",
        "postalCode": "1212",
        "addressCountry": "BD"
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.8",
        "reviewCount": "150",
        "bestRating": "5",
        "worstRating": "1"
      }
    }
    @if(isset($faqs) && $faqs->count() > 0)
    ,
    {
      "@type": "FAQPage",
      "@id": {!! json_encode($currentUrl . '/#faq') !!},
      "mainEntity": [
        @foreach($faqs as $index => $faq)
        {
          "@type": "Question",
          "name": {!! json_encode($faq->question) !!},
          "acceptedAnswer": {
            "@type": "Answer",
            "text": {!! json_encode(strip_tags($faq->answer)) !!}
          }
        }{{ $index < $faqs->count() - 1 ? ',' : '' }}
        @endforeach
      ]
    }
    @endif
  ]
}
</script>
