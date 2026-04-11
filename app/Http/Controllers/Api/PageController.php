<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return response()->json([
            'success' => true,
            'data' => [
                'title' => 'About FIFA World Cup 2026',
                'content' => [
                    'summary' => 'The FIFA World Cup 2026™ will be the 23rd FIFA World Cup, the quadrennial international men\'s football championship contested by the national teams of the member associations of FIFA.',
                    'stats' => [
                        ['label' => 'Teams', 'value' => '48'],
                        ['label' => 'Host Cities', 'value' => '16'],
                        ['label' => 'Host Nations', 'value' => '3'],
                    ],
                    'sections' => [
                        [
                            'title' => 'The Vision',
                            'text' => 'The 2026 edition marks a historic milestone in football history. By expanding to 48 teams, FIFA aims to provide more opportunities for nations across the globe to participate in the world\'s most prestigious sporting event.'
                        ],
                        [
                            'title' => 'Host Nations',
                            'text' => 'For the first time, the tournament will be hosted by three North American countries: Canada, Mexico, and the United States. This collaboration reflects the unifying power of football and the shared passion for the sport across the continent.'
                        ]
                    ]
                ]
            ]
        ]);
    }

    public function privacyPolicy()
    {
        return response()->json([
            'success' => true,
            'data' => [
                'title' => 'Privacy Policy',
                'content' => 'Your privacy is important to us. It is our policy to respect your privacy regarding any information we may collect from you across our website and other platforms we own and operate.'
            ]
        ]);
    }

    public function termsConditions()
    {
        return response()->json([
            'success' => true,
            'data' => [
                'title' => 'Terms & Conditions',
                'content' => 'By accessing our app, you are agreeing to be bound by these terms of service, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws.'
            ]
        ]);
    }

    public function contact()
    {
        return response()->json([
            'success' => true,
            'data' => [
                'title' => 'Contact Us',
                'email' => 'support@fwc2026.com',
                'phone' => '+1 (555) 123-4567',
                'address' => '123 Stadium Way, North America'
            ]
        ]);
    }
}
