<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getlending(Request $requset) {
      return view('lending');
    }
}
