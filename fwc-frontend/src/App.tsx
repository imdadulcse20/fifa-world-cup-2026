import React from 'react';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { QueryClient, QueryClientProvider } from '@tanstack/react-query';
import Layout from './components/Layout';
import Home from './pages/Home';
import Schedule from './pages/Schedule';
import Standings from './pages/Standings';
import Teams from './pages/Teams';
import Stadiums from './pages/Stadiums';
import MatchDetails from './pages/MatchDetails';
import Settings from './pages/Settings';

const queryClient = new QueryClient({
  defaultOptions: {
    queries: {
      refetchOnWindowFocus: false,
      retry: 1,
    },
  },
});

const App: React.FC = () => {
    return (
        <QueryClientProvider client={queryClient}>
            <BrowserRouter>
                <Routes>
                    <Route path="/" element={<Layout />}>
                        <Route index element={<Home />} />
                        <Route path="schedule" element={<Schedule />} />
                        <Route path="match/:id" element={<MatchDetails />} />
                        <Route path="standings" element={<Standings />} />
                        <Route path="teams" element={<Teams />} />
                        <Route path="stadiums" element={<Stadiums />} />
                        <Route path="settings" element={<Settings />} />
                    </Route>
                </Routes>
            </BrowserRouter>
        </QueryClientProvider>
    );
};

export default App;
