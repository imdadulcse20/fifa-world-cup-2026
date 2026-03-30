import React from 'react';
import { useQuery } from '@tanstack/react-query';
import api from '../lib/api';
import { Team } from '../types';
import { motion } from 'framer-motion';

const Teams: React.FC = () => {
    const { data: teams, isLoading } = useQuery({
        queryKey: ['teams'],
        queryFn: async () => {
            const res = await api.get('/teams');
            return res.data;
        }
    });

    return (
        <div className="space-y-6 max-w-lg mx-auto md:max-w-none pb-12">
            <header>
                <h1 className="text-3xl font-black mb-6">Participating Teams</h1>
            </header>

            {isLoading ? (
                <div className="flex items-center justify-center h-64">
                    <div className="w-8 h-8 border-3 border-primary-500 border-t-transparent rounded-full animate-spin" />
                </div>
            ) : (
                <div className="grid grid-cols-2 md:grid-cols-4 gap-6">
                    {teams?.map((team: Team) => (
                        <motion.div 
                            key={team.id}
                            whileHover={{ y: -5 }}
                            className="p-6 rounded-[2rem] glass dark:glass-dark border border-white/10 flex flex-col items-center text-center space-y-4"
                        >
                            <span className="text-6xl">{team.flag_url}</span>
                            <div>
                                <h3 className="font-black text-lg">{team.name}</h3>
                                <p className="text-[10px] font-bold text-primary-500 uppercase tracking-widest">{team.group_name}</p>
                            </div>
                            <div className="pt-4 border-t border-white/5 w-full">
                                <p className="text-[10px] text-slate-500 font-bold uppercase mb-1">Coach</p>
                                <p className="text-sm font-semibold truncate">{team.coach}</p>
                            </div>
                        </motion.div>
                    ))}
                </div>
            )}
        </div>
    );
};

export default Teams;
