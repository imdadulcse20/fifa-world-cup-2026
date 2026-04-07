<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!app()->runningInConsole()) {
            try {
                $settings = \App\Models\Setting::all()->pluck('value', 'key');
                \Illuminate\Support\Facades\View::share('site_settings', $settings);

                \Illuminate\Support\Facades\View::composer(['home', 'schedule', 'standings', 'teams', 'stadiums', 'friendlies', 'match-details', 'team-details', 'privacy-policy', 'terms-conditions', 'contact', 'about', 'layouts.app'], function ($view) {
                    if ($view->offsetExists('faqs')) return;

                    $route = request()->route();
                    $page = $route ? $route->getName() : 'home';
                    if (!$page) $page = 'home';

                    $faqs = \App\Models\Faq::where('page', $page)
                        ->orderBy('sort_order')
                        ->get();
                    
                    if ($faqs->count() > 0) {
                        $view->with('faqs', $faqs);
                    }
                });
            } catch (\Exception $e) {
                // Silently fail if table doesn't exist
            }
        }
    }
}
