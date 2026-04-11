# FIFA World Cup 2026 Mobile API - Comprehensive Reference (v3.0)

This document contains the absolute complete list of API endpoints with **full JSON response examples** including all relationships, flags, and stadium images.

**Standard Response Wrapper:**
```json
{
  "success": true,
  "data": { ... }
}
```

---

## 1. Dashboard (Live & Highlights)
### `GET /api/dashboard`
The primary landing data for the mobile app home screen.
**Data Included:** Live matches with events, top 5 upcoming tournament matches, top 5 upcoming friendly matches, tournament stats, and global settings.

**Response Structure:**
```json
{
  "success": true,
  "data": {
    "live_matches": [
      {
        "id": 1,
        "home_score": 1,
        "away_score": 0,
        "status": "live",
        "match_time": "23'",
        "slug": "mexico-vs-south-africa",
        "match_date_utc": "2026-06-11T18:00:00Z",
        "ground_time": "12:00",
        "ground_time_full": "June 11, 2026, 12:00 pm UTC-06:00",
        "home_team": { "id": 1, "name": "Mexico", "full_flag_url": "http://domain.com/uploads/flags/mexico.png" },
        "away_team": { "id": 2, "name": "South Africa", "full_flag_url": "http://domain.com/uploads/flags/south_africa.png" },
        "stadium": { "id": 1, "name": "Estadio Azteca", "city": "Mexico City", "full_image_url": "..." },
        "match_events": [
            { "event_type": "goal", "minute": 23, "player": { "name": "Star 1 (Mexico)" }, "team": { "name": "Mexico" } }
        ]
      }
    ],
    "upcoming_tournament_matches": [...],
    "upcoming_friendly_matches": [...],
    "stats": { "total_teams": 48, "total_stadiums": 16, "total_matches": 104, "finished_matches": 1 },
    "settings": { "site_name": "FIFA World Cup 2026" }
  }
}
```

---

## 2. Match & Schedule
### `GET /api/schedule`
Grouped tournament and friendly schedule. Replicates the web "Schedule" page.
**Response:**
```json
{
  "success": true,
  "data": {
    "tournament": [
      {
        "stage_name": "Group A",
        "matches": [
          {
            "id": 1,
            "status": "upcoming",
            "home_team": { "name": "Mexico", "full_flag_url": "..." },
            "away_team": { "name": "South Africa", "full_flag_url": "..." },
            "stadium": { "name": "Estadio Azteca", "city": "Mexico City" },
            "match_date_utc": "2026-06-11T18:00:00Z",
            "ground_time": "12:00"
          }
        ]
      }
    ],
    "friendlies": [...]
  }
}
```

### `GET /api/matches/{id}` (Match Details)
Comprehensive data for a single match.
**Data Included:** Rosters, stadium info, and a full timeline of events.
**Response:**
```json
{
  "success": true,
  "data": {
    "id": 1,
    "home_score": 1,
    "away_score": 0,
    "status": "live",
    "match_time": "23'",
    "home_team": {
      "id": 1,
      "name": "Mexico",
      "full_flag_url": "...",
      "players": [ { "name": "Star 1 (Mexico)", "number": 10, "position": "Pro" } ]
    },
    "away_team": { ... },
    "stadium": { "name": "Estadio Azteca", "capacity": 83000, "full_image_url": "..." },
    "match_events": [ ... ]
  }
}
```

---

## 3. Teams
### `GET /api/teams` (Team List)
All teams grouped by group name, including their current standings summary.
**Response:**
```json
{
  "success": true,
  "data": [
    {
      "group_name": "Group A",
      "teams": [
        {
          "id": 1,
          "name": "Mexico",
          "full_flag_url": "...",
          "fifa_rank": 15,
          "standing": { "played": 1, "points": 3, "won": 1 }
        }
      ]
    }
  ]
}
```

### `GET /api/teams/{id}` (Team Details)
Detailed team profile including official squad and all scheduled matches.
**Response:**
```json
{
  "success": true,
  "data": {
    "team": {
      "id": 1,
      "name": "Mexico",
      "coach": "Coach Mexico",
      "fifa_rank": 15,
      "highest_rank": 4,
      "players": [ { "name": "Star 1 (Mexico)", "number": 10, "position": "Pro" } ],
      "standing": { "played": 1, "points": 3 }
    },
    "matches": [ { "id": 1, "status": "live", "home_score": 1, "away_score": 0 } ]
  }
}
```

---

## 4. Point Table
### `GET /api/standings`
Complete group standings and the "Ranking of third-placed teams" table.
**Response:**
```json
{
  "success": true,
  "data": {
    "groups": [
      {
        "group_name": "Group A",
        "teams": [
          { "team_id": 1, "played": 1, "won": 1, "drawn": 0, "lost": 0, "gd": 1, "pts": 3, "team": { "name": "Mexico", "full_flag_url": "..." } }
        ]
      }
    ],
    "third_placed_rankings": [...]
  }
}
```

---

## 5. Stadiums
### `GET /api/stadiums` (Stadium List)
**Response:**
```json
{
  "success": true,
  "data": [
    { "id": 1, "name": "Estadio Azteca", "city": "Mexico City", "capacity": 83000, "full_image_url": "..." }
  ]
}
```

### `GET /api/stadiums/{id}` (Stadium Details)
Includes a list of all matches scheduled at this specific stadium.

---

## 6. Static Pages
- `GET /api/pages/about`
- `GET /api/pages/privacy-policy`
- `GET /api/pages/terms-conditions`
- `GET /api/pages/contact`
- `GET /api/faqs?page=home`
