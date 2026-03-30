MASTER PROMPT (UI/UX + Full Stack Development)

Project Title:
📱 2026 World Cup Football Mobile App with Laravel Backend (API Driven)

🎯 Objective

Design and develop a modern, scalable, and visually stunning mobile application for the FIFA World Cup 2026 that delivers real-time match data, schedules, standings, teams, and stadium information using external sports APIs and a custom Laravel backend.

🎨 UI/UX DESIGN REQUIREMENTS (Expert Level)

Act as a senior UI/UX designer and create a clean, modern, and engaging interface:

🌈 Design Style
Minimalist + Sports dynamic theme
Dark mode + Light mode
Use glassmorphism / neumorphism for cards
Smooth animations (micro-interactions)
Responsive across all screen sizes
📱 Key Screens
Splash Screen
World Cup theme animation
Logo + loading API sync indicator
Home Dashboard
Live matches carousel
Upcoming matches (today)
Highlight: “Top Teams”, “Trending Matches”
Quick navigation cards
Tournament Overview
About tournament
Host countries, dates, format
Groups (Group A–H)
Match Schedule Screen
Filter by:
Date
Team
Group
Show:
Match time (Stadium Time)
Local Time (User timezone)
Countdown timer
Match status (Live / Upcoming / Finished)
Points Table / Standings
Group-wise standings
Columns:
Played, Win, Draw, Loss
Goal Difference
Points
Highlight qualified teams
Teams List
Grid/List view
Team details:
Flag, Coach, Players
Stats & recent form
Stadium List
Stadium images
Location (Map integration)
Capacity, city
Match Details Page
Live score (API)
Lineups
Timeline (goals, cards)
Stats (possession, shots)
Settings
Language selection
Notification preferences
Timezone auto/manual
⚙️ BACKEND (Laravel API)

Act as a senior backend engineer and design scalable architecture:

🔧 Tech Stack
Laravel 10+
MySQL / PostgreSQL
REST API (JSON)
Redis (for caching live data)
Queue (for background sync)
🧩 Core Modules
1. API Integration Layer
Connect to sports API (e.g., API-Football)
Cron Jobs:
Sync matches
Update scores
Refresh standings
2. Admin Dashboard (Laravel Blade / Vue)
Manage:
Teams
Matches
Stadiums
Tournament info
Manual override for API data
3. Match Management
Store:
Match date/time (UTC)
Convert to:
Stadium local time
User local time (via frontend)
4. Points Table Engine
Auto calculate:
Points
Goal difference
Ranking rules
5. Notification System
Push notifications:
Match start
Goal alerts
Final score
🔌 API STRUCTURE (Sample)
GET /api/dashboard
GET /api/matches
GET /api/matches/{id}
GET /api/teams
GET /api/teams/{id}
GET /api/standings
GET /api/stadiums
GET /api/tournament
🗄️ DATABASE DESIGN (Core Tables)
tournaments
teams
players
matches
standings
stadiums
match_events
users (optional)
⚡ ADVANCED FEATURES (Modern Touch)
🔴 Live match tracking (WebSocket / Pusher)
🌍 Auto timezone conversion
⭐ Favorite team system
📊 Match analytics & stats visualization
🧠 AI-based match prediction (optional future feature)
📡 Offline caching (last data sync)
🔔 Smart notifications (based on user interest)
🔐 SECURITY & PERFORMANCE
API authentication (JWT / Sanctum)
Rate limiting
Data caching
Lazy loading images
Pagination for large datasets
🚀 DEPLOYMENT
Backend: VPS / AWS / DigitalOcean
Database: Managed DB
CDN for images
CI/CD pipeline
🎯 FINAL GOAL

Build a fast, scalable, visually premium football app that feels like:

Live sports TV + Data dashboard + Social engagement
All in one seamless mobile experience.