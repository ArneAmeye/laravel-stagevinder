<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Mail;
use App\Mail\InternshipEmail;

class Notification
{
	public static function newNotifications($id) {
		$notifications = Notification::getNotifications($id);
		if (count($notifications) == 0) {
			return false;
		}
		Notification::sendMail();
		return true;
	}

	public static function getNotifications($id) {
		$user = session()->get('user');
		if (!Notification::isStudent($user)) {
			$notifications = \App\StudentInternship::where([
				['company_id', $id],
				['status', 0]
			])->get();
		} else {
			$notifications = \App\StudentInternship::where([
				['student_id', $id],
				['status', '!=', 0 ]
			])->get();
		}

        return $notifications;
	}

	public static function isStudent($user) {
        if ($user->type != "student") {
            return false;
        }
        return true;
    }

	public static function getNotificationDetails($id) {
		$user = session()->get('user');
		if (Notification::isStudent($user)) {
			$user = \App\Company::where('id', $id)->first();
			$user["image_location"] = "companies";
		} else {
			$user = \App\Student::where('id', $id)->first();
			$user["image_location"] = "students";
		}

		return $user;
	}

	private static function sendMail() {
		$data = [
			'title' => 'Hi user just a test',
			'content' => 'Just a body'
		];
		/*Mail::send('mails.notification', $data, function($message){
			$message->to('lars.pauwels@telenet.be', 'Lars')->subject('Hello Testing');
		});*/
		//Mail::to('lars.pauwels@telenet.be')->send(new InternshipEmail($data));
	}
}