<?php

namespace App\Providers;



use App\Models\bot_users;
use App\Models\account_types;
use App\Models\device_data_categories;
use App\Models\devices;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
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
        View::composer(['bot_users_pair_devices.fields'], function ($view) {
            $bot_userItems = bot_users::pluck('account_id','id')->toArray();
            $view->with('bot_userItems', $bot_userItems);
        });
        View::composer(['bot_users_pair_devices.fields'], function ($view) {
            $deviceItems = devices::pluck('name','public_key')->toArray();
            $view->with('deviceItems', $deviceItems);
        });
        View::composer(['bot_users.fields'], function ($view) {
            $account_typeItems = account_types::pluck('name','id')->toArray();
            $view->with('account_typeItems', $account_typeItems);
        });
        View::composer(['device_commands.fields'], function ($view) {
            $deviceItems = devices::pluck('name','id')->toArray();
            $view->with('deviceItems', $deviceItems);
        });
        View::composer(['device_data.fields'], function ($view) {
            $device_data_categoryItems = device_data_categories::pluck('name','id')->toArray();
            $view->with('device_data_categoryItems', $device_data_categoryItems);
        });
        View::composer(['device_data.fields'], function ($view) {
            $deviceItems = devices::pluck('name','id')->toArray();
            $view->with('deviceItems', $deviceItems);
        });
        //
    }
}