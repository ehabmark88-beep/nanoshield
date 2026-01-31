<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class WebsiteSettingsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        
$settings = WebsiteSetting::firstOrCreate(['id' => 1]);

    View::share('websiteSettings', $settings);
    }
}
