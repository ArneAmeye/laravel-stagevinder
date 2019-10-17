<?php
namespace App\Services;
use App\User;
use App\Student;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = Student::whereFacebookUserId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $account = new Student([
                'facebook_user_id' => $providerUser->getId(),
                'email' => $providerUser->getEmail(),
                'password' => Hash::make(rand(1,10000)),
                'firstname' => $providerUser->getName(),
                'lastname' => $providerUser->getName(),

            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'password' => Hash::make(rand(1,10000)),
                ]);
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}