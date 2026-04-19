<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run()
    {
        $faqs = [
            // Home Page
            ['page' => 'home', 'sort_order' => 1, 'question' => 'What is the format of the 2026 World Cup?', 'answer' => 'The 2026 World Cup features 48 teams divided into 12 groups of four. The top two from each group and the eight best third-placed teams advance to a new Round of 32.'],
            ['page' => 'home', 'sort_order' => 2, 'question' => 'Which countries are hosting the tournament?', 'answer' => 'The tournament is co-hosted by Canada, Mexico, and the United States across 16 different host cities.'],
            ['page' => 'home', 'sort_order' => 3, 'question' => 'How many total matches will be played?', 'answer' => 'A total of 104 matches will be played over 39 days, making it the largest World Cup in history.'],
            ['page' => 'home', 'sort_order' => 4, 'question' => 'When does the 2026 World Cup start?', 'answer' => 'The opening match is scheduled for June 2026, with the final taking place in July 2026.'],
            ['page' => 'home', 'sort_order' => 5, 'question' => 'Can I see live scores on this portal?', 'answer' => 'Yes, our portal provides real-time live score updates for all matches as they happen.'],
            ['page' => 'home', 'sort_order' => 6, 'question' => 'Where will the final match be held?', 'answer' => 'The final is scheduled to be held at MetLife Stadium in East Rutherford, New Jersey, USA.'],
            ['page' => 'home', 'sort_order' => 7, 'question' => 'How many teams qualify from each confederation?', 'answer' => 'The expansion to 48 teams allows more slots: AFC (8), CAF (9), CONCACAF (6), CONMEBOL (6), OFC (1), and UEFA (16), plus two from inter-confederation play-offs.'],
            ['page' => 'home', 'sort_order' => 8, 'question' => 'What are the host cities in Mexico?', 'answer' => 'The host cities in Mexico are Mexico City (Estadio Azteca), Guadalajara (Estadio Akron), and Monterrey (Estadio BBVA).'],
            ['page' => 'home', 'sort_order' => 9, 'question' => 'What are the host cities in Canada?', 'answer' => 'Canada will host matches in Vancouver (BC Place) and Toronto (BMO Field).'],
            ['page' => 'home', 'sort_order' => 10, 'question' => 'Is this an official FIFA website?', 'answer' => 'No, this is a dedicated fan portal and live score tracker for the 2026 World Cup.'],

            // Schedule Page
            ['page' => 'schedule', 'sort_order' => 1, 'question' => 'How can I filter matches by group?', 'answer' => 'On the schedule page, matches are automatically grouped by their respective groups and stages for easy navigation.'],
            ['page' => 'schedule', 'sort_order' => 2, 'question' => 'Are the kick-off times in my local time?', 'answer' => 'Yes, all kick-off times displayed on the schedule are automatically converted to your browser\'s local time zone.'],
            ['page' => 'schedule', 'sort_order' => 3, 'question' => 'Can I see finished match results?', 'answer' => 'Yes, you can filter the schedule to show "Finished" matches to see all past results.'],
            ['page' => 'schedule', 'sort_order' => 4, 'question' => 'What does "Upcoming" status mean?', 'answer' => 'Upcoming matches are those that have not yet started. Their times are shown in your local time zone.'],
            ['page' => 'schedule', 'sort_order' => 5, 'question' => 'Where can I see match details for a specific game?', 'answer' => 'Clicking on any match card in the schedule will take you to the detailed match view with lineups and events.'],
            ['page' => 'schedule', 'sort_order' => 6, 'question' => 'How many matches are played per day in the group stage?', 'answer' => 'During the peak of the group stage, there will be up to 4 matches played per day.'],
            ['page' => 'schedule', 'sort_order' => 7, 'question' => 'When are the knockout stage matches determined?', 'answer' => 'Knockout matches are determined immediately following the conclusion of the group stage matches for each respective bracket.'],
            ['page' => 'schedule', 'sort_order' => 8, 'question' => 'Can I see friendly matches in the schedule?', 'answer' => 'Friendly matches are listed separately at the bottom of the schedule or in the dedicated Friendlies section.'],
            ['page' => 'schedule', 'sort_order' => 9, 'question' => 'What happens if a knockout match ends in a draw?', 'answer' => 'If tied after 90 minutes, matches go to extra time (two 15-minute halves) and then a penalty shootout if necessary.'],
            ['page' => 'schedule', 'sort_order' => 10, 'question' => 'Is the match schedule subject to change?', 'answer' => 'While rare, FIFA may adjust kick-off times for broadcasting or logistical reasons. Our portal updates these in real-time.'],

            // Standings Page
            ['page' => 'standings', 'sort_order' => 1, 'question' => 'How are points awarded in the group stage?', 'answer' => 'Teams earn 3 points for a win, 1 point for a draw, and 0 points for a loss.'],
            ['page' => 'standings', 'sort_order' => 2, 'question' => 'What is the primary tie-breaker for group rankings?', 'answer' => 'The primary tie-breaker is goal difference in all group matches.'],
            ['page' => 'standings', 'sort_order' => 3, 'question' => 'How many teams from each group advance?', 'answer' => 'The top two teams from each of the 12 groups automatically advance to the Round of 32.'],
            ['page' => 'standings', 'sort_order' => 4, 'question' => 'How are the best third-placed teams selected?', 'answer' => 'The 8 best third-placed teams are ranked by points, then goal difference, then goals scored across all groups.'],
            ['page' => 'standings', 'sort_order' => 5, 'question' => 'What does "GD" stand for in the table?', 'answer' => 'GD stands for Goal Difference, which is calculated as Goals For (GF) minus Goals Against (GA).'],
            ['page' => 'standings', 'sort_order' => 6, 'question' => 'What happens if two teams have the same points and goal difference?', 'answer' => 'The next tie-breaker is the number of goals scored in all group matches.'],
            ['page' => 'standings', 'sort_order' => 7, 'question' => 'Are head-to-head results used as tie-breakers?', 'answer' => 'Yes, if teams are still level after goal difference and goals scored, their head-to-head record is considered.'],
            ['page' => 'standings', 'sort_order' => 8, 'question' => 'Where can I see the live standings update?', 'answer' => 'The standings table updates automatically as goals are scored during live matches.'],
            ['page' => 'standings', 'sort_order' => 9, 'question' => 'How many groups are there in total?', 'answer' => 'There are 12 groups, labeled Group A through Group L.'],
            ['page' => 'standings', 'sort_order' => 10, 'question' => 'Does Fair Play record affect standings?', 'answer' => 'Yes, fair play points (based on yellow and red cards) can be used as a late-stage tie-breaker.'],

            // Teams Page
            ['page' => 'teams', 'sort_order' => 1, 'question' => 'How many teams are participating in 2026?', 'answer' => 'For the first time in history, 48 national teams are participating in the World Cup.'],
            ['page' => 'teams', 'sort_order' => 2, 'question' => 'How can I view a specific team\'s players?', 'answer' => 'Click on a team flag or name to visit their detailed page, which includes their full player roster.'],
            ['page' => 'teams', 'sort_order' => 3, 'question' => 'Which team has won the most World Cups?', 'answer' => 'Brazil holds the record with 5 FIFA World Cup titles.'],
            ['page' => 'teams', 'sort_order' => 4, 'question' => 'Are there any debutants in the 2026 edition?', 'answer' => 'With the expansion to 48 teams, several nations are expected to make their first-ever World Cup appearance.'],
            ['page' => 'teams', 'sort_order' => 5, 'question' => 'Where can I see the FIFA ranking for each team?', 'answer' => 'The teams page displays current group positions, and detailed rankings can be found on individual team pages.'],
            ['page' => 'teams', 'sort_order' => 6, 'question' => 'Which confederation has the most representatives?', 'answer' => 'UEFA (Europe) has the most slots with 16 teams qualifying for the tournament.'],
            ['page' => 'teams', 'sort_order' => 7, 'question' => 'How are the host nations qualified?', 'answer' => 'As hosts, Canada, Mexico, and the USA all qualify automatically for the tournament.'],
            ['page' => 'teams', 'sort_order' => 8, 'question' => 'Can I see the team managers?', 'answer' => 'Team manager information is available on each team\'s detailed profile page.'],
            ['page' => 'teams', 'sort_order' => 9, 'question' => 'Where are the team base camps located?', 'answer' => 'Base camps are spread across the three host nations, usually near their group stage venue clusters.'],
            ['page' => 'teams', 'sort_order' => 10, 'question' => 'How can I see a team\'s recent form?', 'answer' => 'Recent match results for each team are listed on their individual team details page.'],

            // Stadiums Page
            ['page' => 'stadiums', 'sort_order' => 1, 'question' => 'How many stadiums are being used for the 2026 World Cup?', 'answer' => 'A total of 16 stadiums across the three host countries will be used.'],
            ['page' => 'stadiums', 'sort_order' => 2, 'question' => 'Which stadium has the largest capacity?', 'answer' => 'The Azteca Stadium in Mexico City and MetLife Stadium in New Jersey are among the largest venues.'],
            ['page' => 'stadiums', 'sort_order' => 3, 'question' => 'Are the stadiums air-conditioned?', 'answer' => 'Many of the modern US stadiums feature advanced climate control systems or retractable roofs.'],
            ['page' => 'stadiums', 'sort_order' => 4, 'question' => 'How many stadiums are located in the USA?', 'answer' => '11 out of the 16 stadiums are located in the United States.'],
            ['page' => 'stadiums', 'sort_order' => 5, 'question' => 'How many stadiums are located in Mexico?', 'answer' => 'There are 3 host stadiums in Mexico: Mexico City, Guadalajara, and Monterrey.'],
            ['page' => 'stadiums', 'sort_order' => 6, 'question' => 'How many stadiums are located in Canada?', 'answer' => 'There are 2 host stadiums in Canada: Toronto and Vancouver.'],
            ['page' => 'stadiums', 'sort_order' => 7, 'question' => 'Which stadium will host the opening match?', 'answer' => 'The historic Azteca Stadium in Mexico City is set to host the opening match.'],
            ['page' => 'stadiums', 'sort_order' => 8, 'question' => 'Can I see the location of each stadium?', 'answer' => 'Yes, the stadiums page provides the city and country for every venue.'],
            ['page' => 'stadiums', 'sort_order' => 9, 'question' => 'Are these all existing stadiums?', 'answer' => 'Yes, all venues are established stadiums, though many have undergone significant renovations for the World Cup.'],
            ['page' => 'stadiums', 'sort_order' => 10, 'question' => 'What is the average capacity of the venues?', 'answer' => 'The average capacity is approximately 50,000 to 70,000 seats per stadium.'],

            // Friendlies Page
            ['page' => 'friendlies', 'sort_order' => 1, 'question' => 'Why are friendly matches tracked here?', 'answer' => 'We track international friendlies to help fans follow their teams\' preparation and form ahead of the tournament.'],
            ['page' => 'friendlies', 'sort_order' => 2, 'question' => 'Do friendlies affect the World Cup standings?', 'answer' => 'No, friendly matches are separate from the competitive tournament and do not grant points in the group stage.'],
            ['page' => 'friendlies', 'sort_order' => 3, 'question' => 'How often are friendly matches played?', 'answer' => 'International friendlies are typically played during FIFA international windows throughout the year.'],
            ['page' => 'friendlies', 'sort_order' => 4, 'question' => 'Are lineups available for friendly matches?', 'answer' => 'Yes, we aim to provide lineups and match events for all major international friendlies.'],
            ['page' => 'friendlies', 'sort_order' => 5, 'question' => 'Can I see the history of past friendlies?', 'answer' => 'Yes, the friendlies page lists both recent results and upcoming exhibition matches.'],
            ['page' => 'friendlies', 'sort_order' => 6, 'question' => 'What is the purpose of these games?', 'answer' => 'Managers use friendlies to test new players, tactics, and build team chemistry before the main event.'],
            ['page' => 'friendlies', 'sort_order' => 7, 'question' => 'Are substitutions different in friendly matches?', 'answer' => 'Often, friendlies allow more than the standard 5 substitutions if both teams and the referee agree before the match.'],
            ['page' => 'friendlies', 'sort_order' => 8, 'question' => 'Do these matches affect FIFA rankings?', 'answer' => 'Yes, official FIFA international friendlies do carry weight in the calculation of the FIFA World Rankings.'],
            ['page' => 'friendlies', 'sort_order' => 9, 'question' => 'Where can I find tickets for these games?', 'answer' => 'Tickets for friendlies are usually sold through the host nation\'s football association or the match venue.'],
            ['page' => 'friendlies', 'sort_order' => 10, 'question' => 'Are cards from friendlies carried into the World Cup?', 'answer' => 'Generally, no. Red card suspensions may carry over if specified by FIFA, but yellow cards do not.'],

            // About Page
            ['page' => 'about', 'sort_order' => 1, 'question' => 'What is the goal of this portal?', 'answer' => 'Our goal is to provide a clean, fast, and comprehensive platform for fans to follow every aspect of the 2026 World Cup.'],
            ['page' => 'about', 'sort_order' => 2, 'question' => 'Who developed this application?', 'answer' => 'This application was developed by passionate football fans and developers using the Laravel framework.'],
            ['page' => 'about', 'sort_order' => 3, 'question' => 'Is the data provided in real-time?', 'answer' => 'Yes, we use advanced scraping and API integrations to provide live updates for scores and match events.'],
            ['page' => 'about', 'sort_order' => 4, 'question' => 'How can I support this project?', 'answer' => 'You can support us by sharing the portal with other fans and providing feedback for improvements.'],
            ['page' => 'about', 'sort_order' => 5, 'question' => 'Is this portal mobile-friendly?', 'answer' => 'Absolutely! The portal is designed with a mobile-first approach for the best experience on all devices.'],
            ['page' => 'about', 'sort_order' => 6, 'question' => 'Does this site use cookies?', 'answer' => 'We use minimal cookies to remember your theme preferences and improve site performance.'],
            ['page' => 'about', 'sort_order' => 7, 'question' => 'Where does the match data come from?', 'answer' => 'Our data is aggregated from various reliable sports data providers and official announcements.'],
            ['page' => 'about', 'sort_order' => 8, 'question' => 'Can I use this site for betting?', 'answer' => 'This is an information portal only. We do not provide or encourage betting services.'],
            ['page' => 'about', 'sort_order' => 9, 'question' => 'How often is the content updated?', 'answer' => 'Live content is updated every minute, while news and stats are updated several times a day.'],
            ['page' => 'about', 'sort_order' => 10, 'question' => 'Are there plans for more features?', 'answer' => 'Yes, we are constantly working on new features like player stats, historical data, and fan polls.'],

            // Contact Page
            ['page' => 'contact', 'sort_order' => 1, 'question' => 'How can I report a score error?', 'answer' => 'Please use the contact form to report any discrepancies, and our team will verify and correct it immediately.'],
            ['page' => 'contact', 'sort_order' => 2, 'question' => 'Can I advertise on this portal?', 'answer' => 'For advertising inquiries, please select "Partnership" in the contact form dropdown.'],
            ['page' => 'contact', 'sort_order' => 3, 'question' => 'How long does it take to get a response?', 'answer' => 'We typically respond to all inquiries within 24 to 48 hours.'],
            ['page' => 'contact', 'sort_order' => 4, 'question' => 'Do you have a dedicated support team?', 'answer' => 'Yes, our small but dedicated team monitors all incoming messages to ensure the portal runs smoothly.'],
            ['page' => 'contact', 'sort_order' => 5, 'question' => 'Can I submit news or articles?', 'answer' => 'We love community contributions! Send us your pitch via the contact form.'],
            ['page' => 'contact', 'sort_order' => 6, 'question' => 'Is there a way to reach you on social media?', 'answer' => 'Yes, you can find our social media links in the footer of every page.'],
            ['page' => 'contact', 'sort_order' => 7, 'question' => 'How do I suggest a new feature?', 'answer' => 'We welcome all suggestions! Select "Feature Request" in the contact form to share your ideas.'],
            ['page' => 'contact', 'sort_order' => 8, 'question' => 'Is my email address kept private?', 'answer' => 'Yes, we only use your email to respond to your inquiry and never share it with third parties.'],
            ['page' => 'contact', 'sort_order' => 9, 'question' => 'What information should I include in my message?', 'answer' => 'Please provide as much detail as possible, including relevant match IDs or team names if applicable.'],
            ['page' => 'contact', 'sort_order' => 10, 'question' => 'Can I contact you for technical API access?', 'answer' => 'Currently, our API is for internal use only, but we may offer public access in the future.'],

            // Privacy Policy Page
            ['page' => 'privacy-policy', 'sort_order' => 1, 'question' => 'What personal information do you collect?', 'answer' => 'We collect minimal information such as your email (if you contact us) and basic usage data via cookies.'],
            ['page' => 'privacy-policy', 'sort_order' => 2, 'question' => 'How do you use my data?', 'answer' => 'Your data is used solely to improve site functionality and respond to your direct requests.'],
            ['page' => 'privacy-policy', 'sort_order' => 3, 'question' => 'Do you share data with third parties?', 'answer' => 'We do not sell or share your personal data with any third-party marketing companies.'],
            ['page' => 'privacy-policy', 'sort_order' => 4, 'question' => 'Are my cookies tracked for advertising?', 'answer' => 'We only use essential and analytical cookies, not invasive advertising trackers.'],
            ['page' => 'privacy-policy', 'sort_order' => 5, 'question' => 'How can I request my data be deleted?', 'answer' => 'You can contact us via the contact form to request the removal of any personal data we may have.'],
            ['page' => 'privacy-policy', 'sort_order' => 6, 'question' => 'Is this site compliant with GDPR?', 'answer' => 'Yes, we strive to follow GDPR principles to protect the privacy of our European users.'],
            ['page' => 'privacy-policy', 'sort_order' => 7, 'question' => 'How do you protect against data breaches?', 'answer' => 'We use secure servers and industry-standard encryption to protect our database.'],
            ['page' => 'privacy-policy', 'sort_order' => 8, 'question' => 'Does this policy cover external links?', 'answer' => 'No, our policy only applies to this portal. External sites have their own privacy policies.'],
            ['page' => 'privacy-policy', 'sort_order' => 9, 'question' => 'Will this policy change in the future?', 'answer' => 'We may update our policy occasionally. Any changes will be posted on this page with an updated date.'],
            ['page' => 'privacy-policy', 'sort_order' => 10, 'question' => 'Who is the data controller?', 'answer' => 'The site administrators act as the data controllers for all information processed on this portal.'],

            // Terms Conditions Page
            ['page' => 'terms-conditions', 'sort_order' => 1, 'question' => 'What is the acceptable use of this site?', 'answer' => 'Users must use the site for personal, non-commercial purposes and respect all copyright notices.'],
            ['page' => 'terms-conditions', 'sort_order' => 2, 'question' => 'Can I scrape data from this portal?', 'answer' => 'Automated scraping of our data for commercial use is strictly prohibited without written consent.'],
            ['page' => 'terms-conditions', 'sort_order' => 3, 'question' => 'Is the match data guaranteed to be accurate?', 'answer' => 'While we strive for 100% accuracy, all data is provided "as is" without warranties of any kind.'],
            ['page' => 'terms-conditions', 'sort_order' => 4, 'question' => 'What is your policy on user-generated content?', 'answer' => 'Users are responsible for any comments or content they submit and must not post illegal material.'],
            ['page' => 'terms-conditions', 'sort_order' => 5, 'question' => 'Can you terminate my access?', 'answer' => 'We reserve the right to block users who violate our terms or attempt to disrupt our services.'],
            ['page' => 'terms-conditions', 'sort_order' => 6, 'question' => 'Are there age restrictions for using this site?', 'answer' => 'This site is intended for a general audience, but users under 13 should have parental supervision.'],
            ['page' => 'terms-conditions', 'sort_order' => 7, 'question' => 'Do you own the tournament logos?', 'answer' => 'No, all FIFA World Cup logos and trademarks are the property of FIFA. We use them for editorial purposes.'],
            ['page' => 'terms-conditions', 'sort_order' => 8, 'question' => 'What happens if the site is down?', 'answer' => 'We are not liable for any losses resulting from temporary site outages or technical issues.'],
            ['page' => 'terms-conditions', 'sort_order' => 9, 'question' => 'How are disputes handled?', 'answer' => 'Any legal disputes shall be governed by the laws of the jurisdiction where the site is operated.'],
            ['page' => 'terms-conditions', 'sort_order' => 10, 'question' => 'How can I accept these terms?', 'answer' => 'By continuing to use this portal, you are agreeing to be bound by these Terms and Conditions.'],

            // Match Details Page
            ['page' => 'match-details', 'sort_order' => 1, 'question' => 'How often is the match event timeline updated?', 'answer' => 'The timeline is updated in real-time as events like goals, cards, and substitutions are reported.'],
            ['page' => 'match-details', 'sort_order' => 2, 'question' => 'Where can I see the starting lineups?', 'answer' => 'Lineups are usually available on the match details page 60 minutes before kick-off.'],
            ['page' => 'match-details', 'sort_order' => 3, 'question' => 'What does "VAR" stand for in match events?', 'answer' => 'VAR stands for Video Assistant Referee, used to review critical decisions like goals or penalties.'],
            ['page' => 'match-details', 'sort_order' => 4, 'question' => 'Can I see the referee for the match?', 'answer' => 'Yes, referee information is listed in the match details section alongside the stadium info.'],
            ['page' => 'match-details', 'sort_order' => 5, 'question' => 'Are match statistics like possession shown?', 'answer' => 'Yes, we provide key match stats including possession, shots on target, and corner kicks.'],
            ['page' => 'match-details', 'sort_order' => 6, 'question' => 'How is "Man of the Match" determined?', 'answer' => 'Man of the Match is typically based on official FIFA awards or community voting data.'],
            ['page' => 'match-details', 'sort_order' => 7, 'question' => 'Can I see the bench players?', 'answer' => 'The substitutes for both teams are listed below the starting eleven in the lineups section.'],
            ['page' => 'match-details', 'sort_order' => 8, 'question' => 'Are weather conditions provided?', 'answer' => 'We provide current weather conditions at the stadium for all live and upcoming matches.'],
            ['page' => 'match-details', 'sort_order' => 9, 'question' => 'What happens if a match is abandoned?', 'answer' => 'The match details page will show the status as "Abandoned" and provide any official updates on rescheduling.'],
            ['page' => 'match-details', 'sort_order' => 10, 'question' => 'How can I share this match with friends?', 'answer' => 'You can use the share buttons or simply copy the URL to send the match details to others.'],

            // Team Details Page
            ['page' => 'team-details', 'sort_order' => 1, 'question' => 'Where can I see a team\'s full history?', 'answer' => 'Each team page includes a summary of their past World Cup achievements and recent form.'],
            ['page' => 'team-details', 'sort_order' => 2, 'question' => 'Who is the current top scorer for the team?', 'answer' => 'Individual player stats, including goals scored in the tournament, are listed in the squad section.'],
            ['page' => 'team-details', 'sort_order' => 3, 'question' => 'Can I see the team\'s official jersey colors?', 'answer' => 'Yes, we display the team\'s primary colors and crest on their profile page.'],
            ['page' => 'team-details', 'sort_order' => 4, 'question' => 'How many players are in the final squad?', 'answer' => 'Each team is allowed to register a final squad of 26 players for the tournament.'],
            ['page' => 'team-details', 'sort_order' => 5, 'question' => 'Where is the team currently ranked by FIFA?', 'answer' => 'The team\'s latest official FIFA World Ranking is displayed prominently on their profile.'],
            ['page' => 'team-details', 'sort_order' => 6, 'question' => 'Who is the head coach?', 'answer' => 'The head coach and technical staff are listed at the top of the team details page.'],
            ['page' => 'team-details', 'sort_order' => 7, 'question' => 'Can I see the team\'s upcoming matches?', 'answer' => 'Yes, a dedicated "Upcoming Matches" section on the team page shows their next tournament games.'],
            ['page' => 'team-details', 'sort_order' => 8, 'question' => 'Are player injuries tracked?', 'answer' => 'We provide updates on player availability, including injuries and suspensions, in the squad list.'],
            ['page' => 'team-details', 'sort_order' => 9, 'question' => 'Which group is the team in?', 'answer' => 'The team\'s group assignment and their current position in that group are shown on their page.'],
            ['page' => 'team-details', 'sort_order' => 10, 'question' => 'Has the team ever won a World Cup?', 'answer' => 'The team\'s historical honors and best-ever finishes are listed in their profile summary.'],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(
                ['page' => $faq['page'], 'question' => $faq['question']],
                ['answer' => $faq['answer'], 'sort_order' => $faq['sort_order']]
            );
        }
    }
}
