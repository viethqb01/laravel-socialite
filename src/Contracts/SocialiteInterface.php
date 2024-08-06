<?php

namespace Viethqb\LaravelSocialite\Contract;

use Viethqb\LaravelSocialite\Enum\SocialiteEnum;

interface SocialiteInterface
{
    public function redirectToProvider(SocialiteEnum $provider);

    public function handleProviderCallback(SocialiteEnum $provider);
}