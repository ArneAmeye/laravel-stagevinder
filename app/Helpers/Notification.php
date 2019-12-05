<?php

namespace App\Helpers;

class Notification
{
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
		$user = \App\Student::where('id', $id)->first();

		return $user;
	}
}