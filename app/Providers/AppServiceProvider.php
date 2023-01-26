<?php

namespace App\Providers;

use App\Models\Draft;
use App\Models\User;
use App\Models\Magazine;
use App\Models\Subscription;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redis;

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
        $user = User::first();
        $trends = visits('App\Models\Draft')->period('week')->top(5);
        $subscriptions = Subscription::with(['magazine', 'user'])->latest()->get()->where('user_id', 'LIKE', Auth()->id());

        View::share('trends', $trends);
        View::share('user', $user);
        View::share('subscriptions', $subscriptions);
    }
}
