<?php

namespace App\Providers;

use App\Contact;
use App\Service;
use Illuminate\Support\ServiceProvider;
use App\Setting;
use App\StaticPage;
use App\SocalLink;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot() {
        $settings = Setting::first();
        $static   = StaticPage::all();
        $services = Service::all();
        $contacts = Contact::all();
        $social_links = SocalLink::all();

        View::share([
            'settings' => $settings,
            'static'   => $static,
            'services' => $services,
            'contacts' => $contacts,
            'social_links' => $social_links,

        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
