<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function uploadFile(Request $request) {
      if($request->hasFile('file')) {
           $file = $request->file('file');
           return Storage::put('public', $file);
       }
       return 'false';
     }
}
