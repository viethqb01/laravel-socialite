<?php
/**
 * @Author apple
 * @Date Aug 04, 2024
 */

namespace Viethqb\LaravelSocialite;

use Laravel\Socialite\Contracts\Factory as Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Viethqb\LaravelSocialite\Contract\SocialiteInterface;
use Viethqb\LaravelSocialite\Enum\SocialiteEnum;

class BaseService implements SocialiteInterface
{
    protected Socialite $socialite;

    public function __construct(Socialite $socialite)
    {
        $this->socialite = $socialite;
    }

    /**
     * @Author apple
     * @Date Aug 05, 2024
     *
     * @param SocialiteEnum $provider
     * @return RedirectResponse|\Illuminate\Http\RedirectResponse
     */
    public function redirectToProvider(SocialiteEnum $provider): RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return $this->socialite->driver($provider)->redirect();
    }

    /**
     * @Author apple
     * @Date Aug 05, 2024
     *
     * @param SocialiteEnum $provider
     * @return array
     */
    public function handleProviderCallback(SocialiteEnum $provider): array
    {
        $user = $this->socialite->driver($provider)->stateless()->user();

        return [
            'token' => $user->token,
            'refreshToken' => $user->refreshToken,
            'expiresIn' => $user->expiresIn,
            'user' => [
                'id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'avatar' => $user->getAvatar(),
            ],
        ];
    }
}