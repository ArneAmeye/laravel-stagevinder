<?php
namespace App\Services;
use App\User;
use App\Student;
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
                'facebook_user_id' => $providerUser->getId()
            ]);
            $user = Student::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = Student::create([
                    'facebook_user_id' => $providerUser->getId(),
                    'email' => $providerUser->getEmail(),
                    'firstname' => $providerUser->getName(),
                    'lastname' => $providerUser->getName(),
                    'password' => md5(rand(1,10000)),
                ]);
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}