<?php

/*
|
| DestinyUI 3.0
| (C) 2016 TUDT
|
| UI Pages controller
|
*/

namespace App\Http\Controllers;

use Applicant;

class UIPages extends Controller{

    // Public homepage
    public function homePage(){
      $visitingApplicant = new Applicant();
      if($visitingApplicant->isLoggedIn()){
        return redirect('application/home');
      }else{
        return response()->view('login_home');
      }
    }

    // Registration homepage
    public function newUserRegistrationPage(){
      return response()->view('steps.00_new_user_registration');
    }

    // Applicant home page (a.k.a. the "Dashboard")
    public function applicantDashboard(){
        return response()->view('dashboard');
    }

    // "Change Password" page for logged in users
    public function changePasswordPage(){
        return response()->view('change_password');
    }

    // Application about page
    public function aboutPage(){
        return response()->view('about');
    }

    // Frequently asked questions
    public function faqPage(){
        return response()->view('faq');
    }




}
