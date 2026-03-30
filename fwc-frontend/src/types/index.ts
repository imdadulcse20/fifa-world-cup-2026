export interface Team {
    id: number;
    name: string;
    flag_url: string;
    coach: string;
    group_name: string;
}

export interface Stadium {
    id: number;
    name: string;
    city: string;
    capacity: number;
    image_url: string;
    latitude: number;
    longitude: number;
}

export interface Game {
    id: number;
    home_team_id: number;
    away_team_id: number;
    stadium_id: number;
    match_date_utc: string;
    status: 'upcoming' | 'live' | 'finished';
    home_score: number;
    away_score: number;
    stage: string;
    group_name?: string;
    home_team?: Team;
    away_team?: Team;
    stadium?: Stadium;
    match_events?: MatchEvent[];
}

export interface MatchEvent {
    id: number;
    match_id: number;
    team_id: number;
    player_id?: number;
    type: string;
    minute: number;
    details?: string;
    player?: { name: string };
    team?: { name: string };
}

export interface Standing {
    id: number;
    team_id: number;
    group_name: string;
    played: number;
    won: number;
    drawn: number;
    lost: number;
    goals_for: number;
    goals_against: number;
    goal_difference: number;
    points: number;
    team?: Team;
}
