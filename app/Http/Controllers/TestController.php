<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller{
    public function test(Request $request){
      $a = ["sad" => 12];
      dump($a);
      return "Что то ";
    }
}
