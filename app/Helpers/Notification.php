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
		return true;
	}

	public static function getNotifications($id) {
		$user = session()->get('user');
		if (!Notification::isStudent($user)) {
			$notifications = \App\StudentInternship::where([
				['company_id', $id],
				['status', 0]
			])->get();

			// $student = \App\Student::where('id', $notifications[0]->student_id)->first();
			// $name = $student->firstname." ".$student->lastname;
		} else {
			$notifications = \App\StudentInternship::where([
				['student_id', $id],
				['status', '!=', 0 ]
			])->get();

			// $company = \App\Company::where('id', $notifications[0]->company_id)->first();
			// $name = $company->name;
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

	public static function sendMail() {
		$user = session()->get('user');
		if (Notification::isStudent($user)) {
			$name = $user->firstname." ".$user->lastname;
		} else {
			$name = $user->name;
		}

		$data = [
			'title' => 'Notification',
			'subtitle' => 'You have a new notification from '.$name.'!',
			'date' => date('Y-m-d'),
			'hour' => date('H:i:s'),
			'type' => 'notification'
		];
		/*Mail::send('mails.notification', $data, function($message){
			$message->to('lars.pauwels@telenet.be', 'Lars')->subject('Hello Testing');
		});*/
		Mail::to('lars.pauwels@telenet.be')->queue(new InternshipEmail($data));
	}
}