import React from 'react';
import { Settings as SettingsIcon, Bell, Globe, Moon, Shield, Info, ChevronRight } from 'lucide-react';
import { motion } from 'framer-motion';

const Settings: React.FC = () => {
    return (
        <div className="max-w-lg mx-auto space-y-8 pb-20">
            <header>
                <h1 className="text-3xl font-black">Settings</h1>
                <p className="text-slate-500 text-sm mt-1">Manage your preferences and account</p>
            </header>

            <div className="space-y-4">
                <section className="space-y-2">
                    <h2 className="text-[10px] font-black uppercase tracking-widest text-slate-500 px-4">Preference</h2>
                    <div className="rounded-[2rem] glass dark:glass-dark border border-white/10 overflow-hidden">
                        <SettingItem icon={<Globe className="text-blue-500" />} label="Language" value="English" />
                        <SettingItem icon={<Bell className="text-red-500" />} label="Notifications" value="On" />
                        <SettingItem icon={<Moon className="text-purple-500" />} label="Dark Mode" value="Auto" />
                    </div>
                </section>

                <section className="space-y-2">
                    <h2 className="text-[10px] font-black uppercase tracking-widest text-slate-500 px-4">Support</h2>
                    <div className="rounded-[2rem] glass dark:glass-dark border border-white/10 overflow-hidden">
                        <SettingItem icon={<Shield className="text-green-500" />} label="Privacy Policy" />
                        <SettingItem icon={<Info className="text-slate-500" />} label="About 2026 App" />
                    </div>
                </section>
            </div>

            <div className="p-8 rounded-[2rem] bg-primary-500 text-white shadow-2xl shadow-primary-500/30 relative overflow-hidden">
                <div className="relative z-10">
                    <h3 className="font-black text-xl mb-2">FIFA World Cup 2026</h3>
                    <p className="text-white/80 text-sm mb-6">Get the most out of the tournament with premium features.</p>
                    <button className="bg-white text-primary-600 px-6 py-2 rounded-full font-bold text-xs">
                        GO PREMIUM
                    </button>
                </div>
                <div className="absolute -right-4 -bottom-4 opacity-10">
                    <SettingsIcon size={120} />
                </div>
            </div>
            
            <p className="text-center text-[10px] text-slate-500 font-bold uppercase tracking-widest">Version 1.0.0 (Beta)</p>
        </div>
    );
};

const SettingItem = ({ icon, label, value }: { icon: React.ReactNode, label: string, value?: string }) => (
    <motion.div 
        whileTap={{ backgroundColor: 'rgba(0,0,0,0.05)' }}
        className="flex items-center justify-between p-5 cursor-pointer border-b border-white/5 last:border-0"
    >
        <div className="flex items-center space-x-4">
            <div className="p-2 rounded-xl bg-white dark:bg-slate-800 shadow-sm">
                {icon}
            </div>
            <span className="font-bold text-sm">{label}</span>
        </div>
        <div className="flex items-center space-x-2 text-slate-500">
            {value && <span className="text-xs font-medium">{value}</span>}
            <ChevronRight size={16} />
        </div>
    </motion.div>
);

export default Settings;
