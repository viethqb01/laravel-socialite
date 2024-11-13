# Laravel Socialite

This base will help to oauth2 login with Google, Facebook, Github

## Install

```shell
composer require viethqb/laravel-socialite
```

## Config class from config/app.php

```shell
'providers' => ServiceProvider::defaultProviders()->merge([
        Viethqb\LaravelSocialite\Providers\SocialiteServiceProvider::class
    ])->toArray(),
```
## Publish configuration file and Base Classes
```shell
php artisan vendor:publish --provider="Viethqb\LaravelSocialite\Providers\SocialiteServiceProvider"
```

## create file .env

```shell
GOOGLE_CLIENT_ID=your-google-client-id
GOOGLE_CLIENT_SECRET=your-google-client-secret
GOOGLE_REDIRECT=http://your-app-url/auth/google/callback

FACEBOOK_CLIENT_ID=your-facebook-client-id
FACEBOOK_CLIENT_SECRET=your-facebook-client-secret
FACEBOOK_REDIRECT=http://your-app-url/auth/facebook/callback

GITHUB_ID=your-github--client-id
GITHUB_SECRET=your-github-client-secret
GITHUB_REDIRECT=http://your-app-url/auth/github/callback
```

## Add config to file config/services/php
```shell
   'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT'),
    ],
    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => env('FACEBOOK_REDIRECT'),
    ],
    'github' => [
        'client_id' => env('GITHUB_ID'),
        'client_secret' => env('GITHUB_SECRET'),
        'redirect' => env('GITHUB_REDIRECT'),
    ],
```

# Use to function base 

```shell
extends Base/SocialiteService.php

  public function redirectToProvider(SocialiteEnum $provider);

  public function handleProviderCallback(SocialiteEnum $provider);
```