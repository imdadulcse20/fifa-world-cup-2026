import React, { useState, useEffect } from 'react';
import { NavLink, Outlet } from 'react-router-dom';
import { Home, Calendar, Trophy, Users, Settings, Sun, Moon } from 'lucide-react';
import { clsx, type ClassValue } from 'clsx';
import { twMerge } from 'tailwind-merge';

function cn(...inputs: ClassValue[]) {
  return twMerge(clsx(inputs));
}

const Layout: React.FC = () => {
    const [darkMode, setDarkMode] = useState(true);

    useEffect(() => {
        if (darkMode) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }, [darkMode]);

    return (
        <div className="min-h-screen pb-24 md:pb-0 md:pl-20 bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 font-sans selection:bg-primary-500/30">
            {/* Desktop Sidebar / Mobile Top Nav */}
            <nav className="fixed top-0 left-0 right-0 z-50 md:bottom-0 md:right-auto md:w-20 glass dark:glass-dark border-b md:border-r border-white/10 px-4 py-2 md:py-8 flex flex-row md:flex-col justify-between items-center">
                <div className="flex items-center space-x-2 md:space-x-0 md:space-y-8 md:flex-col">
                    <div className="w-10 h-10 bg-primary-600 rounded-xl flex items-center justify-center shadow-lg shadow-primary-500/20">
                        <span className="text-white font-bold text-xl">26</span>
                    </div>
                </div>

                <div className="hidden md:flex flex-col space-y-6">
                    <NavItem to="/" icon={<Home size={24} />} label="Home" />
                    <NavItem to="/schedule" icon={<Calendar size={24} />} label="Matches" />
                    <NavItem to="/standings" icon={<Trophy size={24} />} label="Standings" />
                    <NavItem to="/teams" icon={<Users size={24} />} label="Teams" />
                </div>

                <button 
                    onClick={() => setDarkMode(!darkMode)}
                    className="p-2 rounded-xl bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 transition-all hover:scale-110 active:scale-95 shadow-lg"
                >
                    {darkMode ? <Sun size={20} /> : <Moon size={20} />}
                </button>
            </nav>

            {/* Mobile Bottom Nav */}
            <nav className="md:hidden fixed bottom-6 left-6 right-6 z-50 h-16 glass dark:glass-dark rounded-2xl flex items-center justify-around px-4 border border-white/20 shadow-2xl">
                <NavItem to="/" icon={<Home size={24} />} label="Home" />
                <NavItem to="/schedule" icon={<Calendar size={24} />} label="Matches" />
                <NavItem to="/standings" icon={<Trophy size={24} />} label="Standings" />
                <NavItem to="/teams" icon={<Users size={24} />} label="Teams" />
                <NavItem to="/settings" icon={<Settings size={24} />} label="Settings" />
            </nav>

            <main className="container mx-auto px-4 pt-20 md:pt-8 animate-in fade-in duration-500">
                <Outlet />
            </main>
        </div>
    );
};

interface NavItemProps {
    to: string;
    icon: React.ReactNode;
    label: string;
}

const NavItem: React.FC<NavItemProps> = ({ to, icon, label }) => (
    <NavLink 
        to={to} 
        className={({ isActive }) => cn(
            "p-2 rounded-xl transition-all duration-300 flex flex-col items-center justify-center space-y-1 relative group",
            isActive ? "text-primary-500" : "text-slate-500 hover:text-slate-700 dark:hover:text-slate-300"
        )}
    >
        {({ isActive }) => (
            <>
                <div className={cn(
                    "relative z-10 transition-transform duration-300 group-hover:scale-110",
                    isActive && "scale-110"
                )}>
                    {icon}
                </div>
                <span className="text-[10px] font-medium md:hidden">{label}</span>
                {isActive && (
                    <div className="absolute inset-0 bg-primary-500/10 rounded-xl animate-in zoom-in-75 duration-300" />
                )}
            </>
        )}
    </NavLink>
);

export default Layout;
