<?php
/**
 * @Author apple
 * @Date Aug 04, 2024
 */
namespace Viethqb\LaravelSocialite\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Viethqb\LaravelSocialite\BaseService;
use Viethqb\LaravelSocialite\Contract\SocialiteInterface;

class SocialiteServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(SocialiteInterface::class, BaseService::class);
    }

    public function boot(): void
    {
        $this->publishConfig();
        $this->publishBaseClasses();
    }

    /**
     * Publish the config file
     */
    protected function publishConfig(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/socialite-base.php',
            'services'
        );
    }

    public function publishBaseClasses(): void
    {
        // Publish BaseService
        $servicePath = __DIR__ . '/../Publish/SocialiteService.php';
        $this->publishes([$servicePath => app_path('Base/Service/SocialiteService.php')], 'base');
    }

}