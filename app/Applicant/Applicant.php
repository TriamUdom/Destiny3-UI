<?php

namespace App\Applicant;

/*
|
| DestinyUI 3.0
| (C) 2016 TUDT
|
| Applicant model
|
*/

use Config;
use DB;
use Hash;
use Session;

class Applicant {

	/**
	 * A method for creating an applicant. Requires a lot of variables.
	 *
	 * @param string $citizenID
	 * @param string $title
	 * @param string $firstName
	 * @param string $lastName
	 * @param string $title_en
	 * @param string $firstName_en
	 * @param string $lastName_en
	 * @param int    $gender
	 * @param string $email
	 * @param string $phone
	 * @param int    $birthday
	 * @param int    $birthmonth
	 * @param int    $birthyear
	 * @param string $password
	 * @return string Applicant's ID
	 * @throws \Exception
	 */
	public function create(
		string $citizenID,
		string $title,
		string $firstName,
		string $lastName,
		string $title_en,
		string $firstName_en,
		string $lastName_en,
		int $gender,
		string $email,
		string $phone,
		int $birthday,
		int $birthmonth,
		int $birthyear,
		string $password
	) {
		// See if an applicant with this CitizenID exists in the system.
		// If so, throw an exception:
		if (DB::collection("applicants")->where("citizenid", $citizenID)->count() != 0) {
			throw new \Exception("Duplicate application requests are not allowed");
		} else {
			// Continue.
			// TODO: Implement any more checks as required
			$insertID = DB::collection("applicants")->insertGetId([
				'citizenid' => $citizenID,
				'title' => $title,
				'fname' => $firstName,
				'lname' => $lastName,
				'title_en' => $title_en,
				'fname_en' => $firstName_en,
				'lname_en' => $lastName_en,
				'gender' => $gender,
				'email' => $email,
				'phone' => $phone,
				'birthdate' => [
					"day" => $birthday,
					"month" => $birthmonth,
					"year" => $birthyear
				],
				'password' => Hash::make($password),
				'steps_completed' => [1],
			]);

			return (string)$insertID;
		}
	}


	/**
	 * Applicant data updater (a.k.a. 'The Modifier')
	 *
	 * @param string $citizenid
	 * @param array  $things Array of 'things' to be modified.
	 * @return bool
	 */
	public function modify(string $citizenid, array $things): bool {
		if ($this->exists($citizenid)) {

			// Yep, our applicant exists. Do update:
			DB::collection("applicants")->where("citizenid", $citizenid)->update($things);

			// And we're done.
			return true;

		} else {
			// NOPE. 404 NOT FOUND.
			return false;
		}
	}

	/**
	 * Mark a step as done
	 *
	 * @param string $citizenid
	 * @param integer $step
	 * @return bool
	 */
	public function markStepAsDone(string $citizenid, int $step): bool {
		if ($this->exists($citizenid)) {

			// Get applicant data
			$applicantData = DB::collection("applicants")->where("citizenid", $citizenid)->first();

			// Yep, our applicant exists. See if the step request has already been marked as done:
			if(!in_array($step, $applicantData["steps_completed"])){
				// Nope. Let's add it!
				$stepsCompleted = $applicantData["steps_completed"];
				$stepsCompleted[] = $step;
			}
			DB::collection("applicants")->where("citizenid", $citizenid)->update([
				"steps_completed" => $stepsCompleted
			]);

			// And we're done.
			return true;

		} else {
			// NOPE. 404 NOT FOUND.
			return false;
		}
	}


	/**
	 * Applicant login processor. Requires citizenid and password. It's that simple!
	 *
	 * @param string $citizenid
	 * @param string $password
	 * @return bool
	 */
	public function login(string $citizenid, string $password): bool {
		// See if the user exists:
		if (DB::collection("applicants")->where("citizenid", $citizenid)->count() == 1) {
			// OK. Password correct?
			$loginUserData = DB::collection("applicants")->where("citizenid", $citizenid)->first();

			// Double conversion to convert Array to Object (which is easier to work with IMO)
			$loginUserData = json_decode(json_encode($loginUserData));

			if (Hash::check($password, $loginUserData->password)) {
				// Login OK
				Session::put("applicant_logged_in", "1");
				Session::put("applicant_citizen_id", $loginUserData->citizenid);
				Session::put("applicant_full_name", $loginUserData->fname . " " . $loginUserData->lname);

				return true;
			} else {
				// Login failed
				return false;
			}
		} else {
			// User does not exist
			return false;
		}
	}


	/**
	 * The complete opposite of login.
	 *
	 * @return bool
	 */
	public function logout():bool {
		Session::flush();
		Session::regenerate();

		return true;
	}


	/**
	 * Refreshes all session data (except Citizen ID).
	 *
	 * @return bool
	 */
	public function reloadSessionData():bool {

		// Reload data from DB:
		$userData = DB::collection("applicants")->where("citizenid", Session::get("applicant_citizen_id"))->first();
		Session::put("applicant_full_name", $userData['fname'] . " " . $userData['lname']);

		return true;

	}

	/**
	 * Is the user logged in or not?
	 *
	 * @return bool
	 */
	public function isLoggedIn(): bool {
		if (Session::get("applicant_logged_in") == 1) {
			// Yep.
			return true;
		} else {
			// Nope.
			return false;
		}
	}


	/**
	 * Does the applicant exist?
	 *
	 * @param string $citizenid
	 * @return bool
	 */
	public function exists(string $citizenid): bool {
		return (DB::collection("applicants")->where("citizenid", $citizenid)->count() != 0);
	}


}
