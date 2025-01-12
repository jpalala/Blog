<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\GitHubOAuthConfig;
use Illuminate\Support\Facades\Config;
use App\Services\Contracts\GitHubOAuthConfigInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GitHubOAuthConfigInterface::class, function () {
            return new GitHubOAuthConfig(
                Config::get('github.client_id'),
                Config::get('github.client_secret'),
                env('APP_URL') . '/auth/github/callback'
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
