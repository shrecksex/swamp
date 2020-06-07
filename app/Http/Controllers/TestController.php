<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// require 'D:\OpenServer\OpenServer\domains\swamp\vendor\autoload.php';

class TestController extends Controller
{
    //public var $phpWordL = new \PhpOffice\PhpWord\PhpWord();

    public function test(Request $request)
    {
      $command = escapeshellcmd('C:\opens\OSPanel\domains\swamp\storage\app\public\test.py "hello"');
      $output = shell_exec($command);
      dump($output);
    }
  }
