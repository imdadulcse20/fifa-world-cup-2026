import React from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import { useQuery } from '@tanstack/react-query';
import api from '../lib/api';
import { Game, MatchEvent } from '../types';
import { ArrowLeft, MapPin, Calendar, Clock, Play } from 'lucide-react';
import { motion } from 'framer-motion';

const MatchDetails: React.FC = () => {
    const { id } = useParams<{ id: string }>();
    const navigate = useNavigate();

    const { data: match, isLoading } = useQuery({
        queryKey: ['match', id],
        queryFn: async () => {
            const res = await api.get(`/matches/${id}`);
            return res.data;
        }
    });

    if (isLoading) return <div className="flex items-center justify-center h-[80vh]">
        <div className="w-12 h-12 border-4 border-primary-500 border-t-transparent rounded-full animate-spin" />
    </div>;

    if (!match) return <div className="text-center p-20">Match not found.</div>;

    return (
        <div className="max-w-4xl mx-auto space-y-8 pb-20">
            <button 
                onClick={() => navigate(-1)}
                className="p-2 rounded-xl glass dark:glass-dark text-slate-500 hover:text-primary-500 transition-colors"
            >
                <ArrowLeft size={24} />
            </button>

            {/* Scoreboard */}
            <motion.div 
                initial={{ opacity: 0, y: 20 }}
                animate={{ opacity: 1, y: 0 }}
                className="p-10 rounded-[3rem] glass dark:glass-dark border border-white/20 shadow-2xl overflow-hidden relative"
            >
                <div className="absolute top-0 right-0 p-8 opacity-5">
                    <Trophy size={200} />
                </div>

                <div className="flex justify-between items-center mb-8">
                    <span className="text-xs font-black uppercase tracking-widest text-primary-500">{match.stage} • {match.group_name}</span>
                    {match.status === 'live' && (
                        <div className="flex items-center space-x-2 bg-red-500 text-white px-3 py-1 rounded-full text-[10px] font-bold animate-pulse">
                            <Play size={10} fill="currentColor" />
                            <span>LIVE</span>
                        </div>
                    )}
                </div>

                <div className="grid grid-cols-3 items-center">
                    <div className="flex flex-col items-center space-y-4">
                        <span className="text-6xl md:text-8xl filter drop-shadow-xl">{match.home_team?.flag_url}</span>
                        <span className="text-xl md:text-3xl font-black">{match.home_team?.name}</span>
                    </div>

                    <div className="flex flex-col items-center">
                        <div className="text-6xl md:text-8xl font-black flex items-center space-x-4">
                            <span>{match.home_score}</span>
                            <span className="text-slate-300 dark:text-slate-800">:</span>
                            <span>{match.away_score}</span>
                        </div>
                        <span className="text-xs font-bold text-slate-500 mt-4 uppercase">Match {match.status}</span>
                    </div>

                    <div className="flex flex-col items-center space-y-4">
                        <span className="text-6xl md:text-8xl filter drop-shadow-xl">{match.away_team?.flag_url}</span>
                        <span className="text-xl md:text-3xl font-black">{match.away_team?.name}</span>
                    </div>
                </div>

                <div className="mt-12 flex flex-wrap justify-center gap-6 pt-8 border-t border-white/5 text-sm text-slate-500 font-medium">
                    <div className="flex items-center space-x-2">
                        <Calendar size={16} className="text-primary-500" />
                        <span>{new Date(match.match_date_utc).toLocaleDateString([], { month: 'long', day: 'numeric', year: 'numeric' })}</span>
                    </div>
                    <div className="flex items-center space-x-2">
                        <Clock size={16} className="text-primary-500" />
                        <span>{new Date(match.match_date_utc).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</span>
                    </div>
                    <div className="flex items-center space-x-2">
                        <MapPin size={16} className="text-primary-500" />
                        <span>{match.stadium?.name}, {match.stadium?.city}</span>
                    </div>
                </div>
            </motion.div>

            {/* Timeline & Events */}
            <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
                <section className="space-y-6">
                    <h2 className="text-2xl font-black">Timeline</h2>
                    <div className="space-y-4 relative before:absolute before:left-[11px] before:top-2 before:bottom-2 before:w-0.5 before:bg-slate-200 dark:before:bg-slate-800">
                        {match.match_events?.map((event: MatchEvent) => (
                            <div key={event.id} className="relative pl-8">
                                <div className="absolute left-0 top-1.5 w-6 h-6 rounded-full bg-white dark:bg-slate-900 border-2 border-primary-500 z-10 flex items-center justify-center">
                                    <span className="text-[10px] font-bold">{event.minute}'</span>
                                </div>
                                <div className="p-4 rounded-2xl glass dark:glass-dark border border-white/5">
                                    <div className="flex justify-between items-start">
                                        <div>
                                            <span className="text-[10px] font-black uppercase text-primary-500 block mb-1">{event.type}</span>
                                            <span className="font-bold">{event.player?.name}</span>
                                            {event.details && <p className="text-xs text-slate-500 mt-1">{event.details}</p>}
                                        </div>
                                        <span className="text-xs font-medium text-slate-400">{event.team?.name}</span>
                                    </div>
                                </div>
                            </div>
                        ))}
                        {(!match.match_events || match.match_events.length === 0) && (
                            <div className="p-8 rounded-3xl glass dark:glass-dark text-center text-slate-500 italic">
                                No match events recorded yet.
                            </div>
                        )}
                    </div>
                </section>

                <section className="space-y-6">
                    <h2 className="text-2xl font-black">Stadium Info</h2>
                    <div className="rounded-[2.5rem] overflow-hidden glass dark:glass-dark border border-white/10 group shadow-xl h-fit">
                        <div className="relative h-48 overflow-hidden">
                            <img 
                                src={match.stadium?.image_url} 
                                alt={match.stadium?.name}
                                className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            />
                            <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-60" />
                            <div className="absolute bottom-4 left-6">
                                <h3 className="text-white font-black text-xl leading-tight">{match.stadium?.name}</h3>
                                <div className="flex items-center text-white/80 text-xs mt-1">
                                    <MapPin size={10} className="mr-1" />
                                    <span>{match.stadium?.city}</span>
                                </div>
                            </div>
                        </div>
                        <div className="p-6">
                            <div className="flex items-center justify-between">
                                <div className="flex flex-col">
                                    <span className="text-[10px] text-slate-500 uppercase font-bold tracking-widest">Capacity</span>
                                    <span className="font-bold mt-1">{match.stadium?.capacity?.toLocaleString()} fans</span>
                                </div>
                                <button className="px-6 py-2 bg-primary-500 text-white rounded-full text-[10px] font-bold shadow-lg shadow-primary-500/30">
                                    VIEW MAP
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    );
};

const Trophy = ({ size, className }: { size?: number, className?: string }) => <svg xmlns="http://www.w3.org/2000/svg" width={size || 24} height={size || 24} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" className={className}><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>;

export default MatchDetails;
