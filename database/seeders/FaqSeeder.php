<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faqs = [
            // Home Page
            ['page' => 'home', 'question' => 'What makes the 2026 World Cup unique?', 'answer' => 'The 2026 World Cup will be the first edition to feature 48 teams (expanded from 32) and the first to be hosted jointly by three nations: Canada, Mexico, and the United States.', 'sort_order' => 1],
            ['page' => 'home', 'question' => 'How can I stay updated with live scores?', 'answer' => 'Our portal provides real-time updates for all live matches, including goal scorers, cards, and other major match events right on the home page.', 'sort_order' => 2],

            // Schedule/Matches Page
            ['page' => 'schedule', 'question' => 'How are match times displayed?', 'answer' => 'All match times are displayed in your local time zone automatically. We also provide the ground time at the stadium venue for reference.', 'sort_order' => 1],
            ['page' => 'schedule', 'question' => 'Where can I see match results from previous days?', 'answer' => 'You can use the "FINISHED" filter at the top of the schedule page to view results and scores from completed matches.', 'sort_order' => 2],

            // Standings Page
            ['page' => 'standings', 'question' => 'How are group rankings determined?', 'answer' => 'Teams are ranked by points (3 for win, 1 for draw). Tie-breakers include goal difference, goals scored, and head-to-head results between the tied teams.', 'sort_order' => 1],
            ['page' => 'standings', 'question' => 'Do third-placed teams qualify for knockouts?', 'answer' => 'Yes, in the new 48-team format, the best-ranked third-placed teams from the groups will advance to the Round of 32.', 'sort_order' => 2],

            // Teams Page
            ['page' => 'teams', 'question' => 'Where can I see a team\'s full squad?', 'answer' => 'Click on any team flag or name on the Teams page to view their detailed profile, including their current roster and tournament schedule.', 'sort_order' => 1],
            
            // Stadiums Page
            ['page' => 'stadiums', 'question' => 'Which cities are hosting the matches?', 'answer' => 'Matches are hosted across 16 cities: 11 in the USA, 3 in Mexico, and 2 in Canada. Each stadium page provides details on capacity and location.', 'sort_order' => 1],

            // Friendlies Page
            ['page' => 'friendlies', 'question' => 'Are friendly matches included in tournament standings?', 'answer' => 'No, friendly matches are exhibition games and do not impact the official FIFA World Cup 2026 group standings or knockout brackets.', 'sort_order' => 1],

            // About Page
            ['page' => 'about', 'question' => 'Who is hosting the 2026 World Cup?', 'answer' => 'The tournament is being co-hosted by three North American countries: Canada, Mexico, and the United States.', 'sort_order' => 1],

            // Privacy Policy
            ['page' => 'privacy-policy', 'question' => 'Is my data secure on this site?', 'answer' => 'Yes, we take data security seriously and employ commercially acceptable means to protect your personal information.', 'sort_order' => 1],

            // Terms
            ['page' => 'terms-conditions', 'question' => 'Can I use the data from this site for my own project?', 'answer' => 'The materials on this site are for personal, non-commercial transitory viewing only.', 'sort_order' => 1],

            // Contact
            ['page' => 'contact', 'question' => 'How quickly do you respond to inquiries?', 'answer' => 'We strive to respond to all inquiries within 24-48 business hours.', 'sort_order' => 1],
        ];

        foreach ($faqs as $faq) {
            \App\Models\Faq::updateOrCreate(
                ['page' => $faq['page'], 'question' => $faq['question']],
                ['answer' => $faq['answer'], 'sort_order' => $faq['sort_order']]
            );
        }
    }
}
