import React, { useState } from 'react';
import { useQuery } from '@tanstack/react-query';
import api from '../lib/api';
import { Standing } from '../types';
import { motion } from 'framer-motion';

const Standings: React.FC = () => {
    const [selectedGroup, setSelectedGroup] = useState('Group A');
    
    const { data: groups, isLoading } = useQuery({
        queryKey: ['standings'],
        queryFn: async () => {
            const res = await api.get('/standings');
            return res.data;
        }
    });

    const groupNames = groups ? Object.keys(groups) : [];

    return (
        <div className="space-y-6 max-w-lg mx-auto md:max-w-none pb-12">
            <header>
                <h1 className="text-3xl font-black mb-6">Standings</h1>
                
                <div className="flex space-x-2 overflow-x-auto no-scrollbar pb-2">
                    {groupNames.map((group) => (
                        <button
                            key={group}
                            onClick={() => setSelectedGroup(group)}
                            className={`px-6 py-2 rounded-full text-xs font-bold transition-all whitespace-nowrap ${
                                selectedGroup === group 
                                ? 'bg-primary-500 text-white' 
                                : 'glass dark:glass-dark text-slate-500'
                            }`}
                        >
                            {group}
                        </button>
                    ))}
                </div>
            </header>

            {isLoading ? (
                <div className="flex items-center justify-center h-64">
                    <div className="w-8 h-8 border-3 border-primary-500 border-t-transparent rounded-full animate-spin" />
                </div>
            ) : (
                <motion.div 
                    key={selectedGroup}
                    initial={{ opacity: 0, x: 20 }}
                    animate={{ opacity: 1, x: 0 }}
                    className="p-6 rounded-[2rem] glass dark:glass-dark border border-white/10 overflow-hidden"
                >
                    <table className="w-full text-left">
                        <thead>
                            <tr className="text-[10px] font-bold text-slate-500 uppercase tracking-widest border-b border-white/5">
                                <th className="pb-4 font-black">#</th>
                                <th className="pb-4 font-black">Team</th>
                                <th className="pb-4 font-black text-center">P</th>
                                <th className="pb-4 font-black text-center">W</th>
                                <th className="pb-4 font-black text-center">D</th>
                                <th className="pb-4 font-black text-center">L</th>
                                <th className="pb-4 font-black text-center">GD</th>
                                <th className="pb-4 font-black text-center">Pts</th>
                            </tr>
                        </thead>
                        <tbody className="divide-y divide-white/5">
                            {groups?.[selectedGroup]?.map((standing: Standing, index: number) => (
                                <tr key={standing.id} className="text-sm">
                                    <td className="py-4 font-bold text-slate-500">{index + 1}</td>
                                    <td className="py-4">
                                        <div className="flex items-center space-x-3">
                                            <span className="text-xl">{standing.team?.flag_url}</span>
                                            <span className="font-bold truncate max-w-[80px]">{standing.team?.name}</span>
                                        </div>
                                    </td>
                                    <td className="py-4 text-center font-medium">{standing.played}</td>
                                    <td className="py-4 text-center font-medium">{standing.won}</td>
                                    <td className="py-4 text-center font-medium">{standing.drawn}</td>
                                    <td className="py-4 text-center font-medium">{standing.lost}</td>
                                    <td className="py-4 text-center font-medium">{standing.goal_difference}</td>
                                    <td className="py-4 text-center font-black text-primary-500">{standing.points}</td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </motion.div>
            )}
        </div>
    );
};

export default Standings;
