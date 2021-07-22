<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index () {

        //MAIL
        Mail::to('test@test.it')->send(new SendNewMail());
        return view('admin.home');
    }
}
