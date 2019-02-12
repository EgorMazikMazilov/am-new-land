<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ThanksController extends Controller {

	//
public function show(){
        return view('site.thanks');
    }
}
