<?php
namespace App\Http\Controllers;

use Applicant;
use Illuminate\Http\Request;
use DB;


class DebugController extends Controller{
  public function show_phpinfo(){
    phpinfo();
  }

  public function deleteTestingUser(){
    DB::collection("applicants")->where("citizenid", "1111111111119")->delete();
    echo("Done!");
  }

}
