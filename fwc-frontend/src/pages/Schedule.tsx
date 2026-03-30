import React, { useState } from 'react';
import { useQuery } from '@tanstack/react-query';
import api from '../lib/api';
import { Game } from '../types';
import { Search, Filter, Calendar as CalendarIcon } from 'lucide-react';
import { motion } from 'framer-motion';

const Schedule: React.FC = () => {
    const [filter, setFilter] = useState('all');
    
    const { data: matches, isLoading } = useQuery({
        queryKey: ['matches', filter],
        queryFn: async () => {
            const res = await api.get('/matches', { params: { status: filter === 'all' ? undefined : filter } });
            return res.data;
        }
    });

    return (
        <div className="space-y-6 max-w-lg mx-auto md:max-w-none pb-12">
            <header className="flex flex-col space-y-4">
                <h1 className="text-3xl font-black">Match Schedule</h1>
                
                <div className="flex space-x-2 overflow-x-auto no-scrollbar pb-2">
                    {['all', 'upcoming', 'live', 'finished'].map((f) => (
                        <button
                            key={f}
                            onClick={() => setFilter(f)}
                            className={`px-6 py-2 rounded-full text-xs font-bold transition-all whitespace-nowrap ${
                                filter === f 
                                ? 'bg-primary-500 text-white shadow-lg shadow-primary-500/30' 
                                : 'glass dark:glass-dark text-slate-500'
                            }`}
                        >
                            {f.toUpperCase()}
                        </button>
                    ))}
                </div>
            </header>

            {isLoading ? (
                <div className="flex items-center justify-center h-64">
                    <div className="w-8 h-8 border-3 border-primary-500 border-t-transparent rounded-full animate-spin" />
                </div>
            ) : (
                <div className="space-y-6">
                    {matches?.length > 0 ? (
                        matches.map((match: Game) => (
                            <MatchRow key={match.id} match={match} />
                        ))
                    ) : (
                        <div className="text-center py-20 text-slate-500">
                            No matches found for this filter.
                        </div>
                    )}
                </div>
            )}
        </div>
    );
};

const MatchRow = ({ match }: { match: Game }) => (
    <motion.div 
        initial={{ opacity: 0, y: 10 }}
        animate={{ opacity: 1, y: 0 }}
        className="p-6 rounded-[2rem] glass dark:glass-dark border border-white/10 hover:border-primary-500/30 transition-colors"
    >
        <div className="flex justify-between items-center mb-4">
            <span className="text-[10px] font-bold text-slate-500 uppercase tracking-widest">{match.stage} • {match.group_name}</span>
            <span className={`text-[10px] font-bold px-2 py-0.5 rounded-full ${
                match.status === 'live' ? 'bg-red-500 text-white animate-pulse' : 'bg-slate-200 dark:bg-slate-800 text-slate-500'
            }`}>
                {match.status.toUpperCase()}
            </span>
        </div>

        <div className="grid grid-cols-3 items-center">
            <div className="flex flex-col items-center space-y-2">
                <span className="text-4xl">{match.home_team?.flag_url}</span>
                <span className="font-bold text-sm text-center">{match.home_team?.name}</span>
            </div>

            <div className="flex flex-col items-center">
                {match.status === 'upcoming' ? (
                    <>
                        <span className="text-2xl font-black">VS</span>
                        <span className="text-[10px] font-bold text-primary-500 mt-1">
                            {new Date(match.match_date_utc).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}
                        </span>
                    </>
                ) : (
                    <div className="text-3xl font-black flex items-center space-x-3">
                        <span>{match.home_score}</span>
                        <span className="text-slate-300 dark:text-slate-700">-</span>
                        <span>{match.away_score}</span>
                    </div>
                )}
            </div>

            <div className="flex flex-col items-center space-y-2">
                <span className="text-4xl">{match.away_team?.flag_url}</span>
                <span className="font-bold text-sm text-center">{match.away_team?.name}</span>
            </div>
        </div>

        <div className="mt-6 pt-4 border-t border-white/5 flex justify-between items-center text-[10px] text-slate-500 font-medium">
            <div className="flex items-center space-x-1">
                <CalendarIcon size={12} />
                <span>{new Date(match.match_date_utc).toLocaleDateString([], { weekday: 'short', month: 'short', day: 'numeric' })}</span>
            </div>
            <span>{match.stadium?.name}</span>
        </div>
    </motion.div>
);

export default Schedule;
