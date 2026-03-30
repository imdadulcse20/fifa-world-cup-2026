import React from 'react';
import { useQuery } from '@tanstack/react-query';
import api from '../lib/api';
import { Stadium } from '../types';
import { MapPin, Users as UsersIcon } from 'lucide-react';
import { motion } from 'framer-motion';

const Stadiums: React.FC = () => {
    const { data: stadiums, isLoading } = useQuery({
        queryKey: ['stadiums'],
        queryFn: async () => {
            const res = await api.get('/stadiums');
            return res.data;
        }
    });

    if (isLoading) return <div className="flex items-center justify-center h-[80vh]">
        <div className="w-12 h-12 border-4 border-primary-500 border-t-transparent rounded-full animate-spin" />
    </div>;

    return (
        <div className="space-y-6 max-w-lg mx-auto md:max-w-none pb-12">
            <header>
                <h1 className="text-3xl font-black">2026 Stadiums</h1>
                <p className="text-slate-500 text-sm mt-1">Explore the venues across North America</p>
            </header>

            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {stadiums?.map((stadium: Stadium, index: number) => (
                    <motion.div 
                        key={stadium.id}
                        initial={{ opacity: 0, scale: 0.9 }}
                        animate={{ opacity: 1, scale: 1 }}
                        transition={{ delay: index * 0.1 }}
                        className="rounded-[2.5rem] overflow-hidden glass dark:glass-dark border border-white/10 group shadow-xl"
                    >
                        <div className="relative h-48 overflow-hidden">
                            <img 
                                src={stadium.image_url} 
                                alt={stadium.name}
                                className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            />
                            <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition-opacity" />
                            <div className="absolute bottom-4 left-6 right-6">
                                <h3 className="text-white font-black text-xl leading-tight">{stadium.name}</h3>
                                <div className="flex items-center text-white/80 text-xs mt-1">
                                    <MapPin size={10} className="mr-1" />
                                    <span>{stadium.city}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div className="p-6 flex justify-between items-center">
                            <div className="flex flex-col">
                                <span className="text-[10px] text-slate-500 uppercase font-bold tracking-widest">Capacity</span>
                                <div className="flex items-center space-x-1 mt-1">
                                    <UsersIcon size={14} className="text-primary-500" />
                                    <span className="font-bold">{stadium.capacity.toLocaleString()}</span>
                                </div>
                            </div>
                            
                            <div className="flex space-x-2">
                                <button className="px-4 py-2 bg-slate-100 dark:bg-slate-800 rounded-full text-[10px] font-bold hover:bg-primary-500 hover:text-white transition-all">
                                    LOCATION
                                </button>
                                <button className="px-4 py-2 bg-primary-500 text-white rounded-full text-[10px] font-bold shadow-lg shadow-primary-500/30">
                                    MATCHES
                                </button>
                            </div>
                        </div>
                    </motion.div>
                ))}
            </div>
        </div>
    );
};

export default Stadiums;
