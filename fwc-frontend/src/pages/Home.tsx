import React from 'react';
import { useQuery } from '@tanstack/react-query';
import api from '../lib/api';
import { Game } from '../types';
import { Calendar, Users, MapPin, ChevronRight, Play } from 'lucide-react';
import { motion } from 'framer-motion';

import { useNavigate } from 'react-router-dom';

const Home: React.FC = () => {
    const navigate = useNavigate();
    const { data: dashboard, isLoading } = useQuery({
        queryKey: ['dashboard'],
        queryFn: async () => {
            const res = await api.get('/dashboard');
            return res.data;
        }
    });

    if (isLoading) return <div className="flex items-center justify-center h-[80vh]">
        <div className="w-12 h-12 border-4 border-primary-500 border-t-transparent rounded-full animate-spin" />
    </div>;

    return (
        <div className="space-y-8 max-w-lg mx-auto md:max-w-none">
            {/* Live Matches Carousel */}
            <section>
                <div className="flex justify-between items-center mb-4">
                    <h2 className="text-xl font-bold flex items-center space-x-2">
                        <span className="w-2 h-2 bg-red-500 rounded-full animate-pulse" />
                        <span>Live Now</span>
                    </h2>
                </div>
                
                {dashboard?.live_matches.length > 0 ? (
                    <div className="flex space-x-4 overflow-x-auto pb-4 snap-x no-scrollbar">
                        {dashboard.live_matches.map((match: Game) => (
                            <MatchCard 
                                key={match.id} 
                                match={match} 
                                isLive 
                                onClick={() => navigate(`/match/${match.id}`)}
                            />
                        ))}
                    </div>
                ) : (
                    <div className="p-8 rounded-3xl glass dark:glass-dark text-center text-slate-500 italic">
                        No matches currently live.
                    </div>
                )}
            </section>

            {/* Quick Navigation Cards */}
            <section className="grid grid-cols-2 md:grid-cols-4 gap-4">
                <NavCard onClick={() => navigate('/schedule')} icon={<Calendar className="text-blue-500" />} label="Schedule" color="bg-blue-500/10" />
                <NavCard onClick={() => navigate('/standings')} icon={<Trophy className="text-yellow-500" />} label="Standings" color="bg-yellow-500/10" />
                <NavCard onClick={() => navigate('/teams')} icon={<Users className="text-green-500" />} label="Teams" color="bg-green-500/10" />
                <NavCard onClick={() => navigate('/stadiums')} icon={<MapPin className="text-purple-500" />} label="Stadiums" color="bg-purple-500/10" />
            </section>

            {/* Upcoming Matches */}
            <section>
                <div className="flex justify-between items-center mb-4">
                    <h2 className="text-xl font-bold">Upcoming Matches</h2>
                    <button onClick={() => navigate('/schedule')} className="text-primary-500 text-sm font-semibold flex items-center">
                        View All <ChevronRight size={16} />
                    </button>
                </div>
                <div className="space-y-4">
                    {dashboard?.upcoming_matches.map((match: Game) => (
                        <MatchListItem 
                            key={match.id} 
                            match={match} 
                            onClick={() => navigate(`/match/${match.id}`)}
                        />
                    ))}
                </div>
            </section>
        </div>
    );
};

const Trophy = ({ className }: { className?: string }) => <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" className={className}><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>;

const MatchCard = ({ match, isLive, onClick }: { match: Game, isLive?: boolean, onClick?: () => void }) => (
    <motion.div 
        whileHover={{ scale: 1.02 }}
        onClick={onClick}
        className="min-w-[300px] snap-center p-6 rounded-[2rem] glass dark:glass-dark border border-white/20 shadow-2xl relative overflow-hidden group cursor-pointer"
    >
        {isLive && <div className="absolute top-4 right-4 bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full flex items-center space-x-1">
            <Play size={10} fill="currentColor" />
            <span>LIVE</span>
        </div>}
        
        <div className="flex justify-between items-center mb-6">
            <div className="text-center flex-1">
                <span className="text-3xl mb-2 block">{match.home_team?.flag_url}</span>
                <span className="font-bold text-sm block truncate">{match.home_team?.name}</span>
            </div>
            <div className="px-4 flex flex-col items-center">
                <div className="text-3xl font-black text-primary-500 flex items-center space-x-2">
                    <span>{match.home_score}</span>
                    <span className="text-slate-300 dark:text-slate-700">:</span>
                    <span>{match.away_score}</span>
                </div>
                <span className="text-[10px] text-slate-500 font-bold mt-2">{match.stage}</span>
            </div>
            <div className="text-center flex-1">
                <span className="text-3xl mb-2 block">{match.away_team?.flag_url}</span>
                <span className="font-bold text-sm block truncate">{match.away_team?.name}</span>
            </div>
        </div>

        <div className="flex items-center justify-center space-x-2 text-slate-500 text-[10px] font-medium">
            <MapPin size={12} />
            <span>{match.stadium?.name}, {match.stadium?.city}</span>
        </div>
    </motion.div>
);

const NavCard = ({ icon, label, color, onClick }: { icon: React.ReactNode, label: string, color: string, onClick?: () => void }) => (
    <motion.div 
        whileHover={{ scale: 1.05 }}
        whileTap={{ scale: 0.95 }}
        onClick={onClick}
        className={`p-4 rounded-3xl ${color} border border-white/5 flex flex-col items-center justify-center space-y-2 cursor-pointer transition-all hover:shadow-lg`}
    >
        <div className="p-3 bg-white dark:bg-white/10 rounded-2xl shadow-sm">
            {icon}
        </div>
        <span className="text-xs font-bold">{label}</span>
    </motion.div>
);

const MatchListItem = ({ match, onClick }: { match: Game, onClick?: () => void }) => (
    <div 
        onClick={onClick}
        className="flex items-center justify-between p-4 rounded-3xl glass dark:glass-dark border border-white/5 cursor-pointer hover:border-primary-500/30 transition-colors"
    >
        <div className="flex items-center space-x-4 flex-1">
            <span className="text-xl">{match.home_team?.flag_url}</span>
            <span className="font-bold text-sm truncate max-w-[80px]">{match.home_team?.name}</span>
        </div>
        
        <div className="flex flex-col items-center px-4">
            <span className="text-xs font-bold text-primary-500">
                {new Date(match.match_date_utc).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}
            </span>
            <span className="text-[10px] text-slate-500">{new Date(match.match_date_utc).toLocaleDateString([], { month: 'short', day: 'numeric' })}</span>
        </div>

        <div className="flex items-center justify-end space-x-4 flex-1">
            <span className="font-bold text-sm truncate max-w-[80px] text-right">{match.away_team?.name}</span>
            <span className="text-xl">{match.away_team?.flag_url}</span>
        </div>
    </div>
);

export default Home;
