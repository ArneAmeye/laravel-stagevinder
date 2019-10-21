<?php
namespace App\Services;
use App\User;
use App\Student;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User as ProviderUser;
use File; 

class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        //Check if user already exists from FB login
        $account = Student::whereFacebookUserId($providerUser->getId())
            ->first();

        if ($account) {
            //User exists, return the user.
            return $account->user;

        } else {
            //Get the user's FB picture
            $profilePicture = file_get_contents($providerUser->getAvatar());
            File::put(public_path() . '/images/students/profile_picture/' . $providerUser->getId() . ".jpg", $profilePicture);
            $profilePictureName = $providerUser->getId() . ".jpg";

            //User via FB does not exist, Make a new student account
            $account = new Student([
                'facebook_user_id' => $providerUser->getId(),
                'firstname' => $providerUser->user['first_name'],
                'lastname' => $providerUser->user['last_name'],
                'profile_picture' => $profilePictureName
            ]);
            
            //Check if this new FB user's email might already be registered through the manual register/login method, if so then associate with the newly created Student.
            $user = User::whereEmail($providerUser->getEmail())->first();
            //If this user is non-existant through our previous check, then create the User also before associating it with the newly create Student.
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'password' => Hash::make(rand(1,10000)),
                ]);
            }

            $account->user()->associate($user); //Associate both User and Student (linking user_id)
            $account->save(); //Save to DB
            return $user; //return user to handle login and session in SocialAuthFacebookController
        }
    }
}