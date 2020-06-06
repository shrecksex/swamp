<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use File;

class FileController extends Controller
{
    public function uploadFile(Request $request) {
      if($request->hasFile('file')) {
           $file = $request->file('file');
           $path = Storage::put('public', $file);
           $path = str_replace("public/", "", $path);
           $file = new File();
           $file->name = 'Документ';
           $file->path = $path;
           $file->save();
           return $path;
       }
       return 'false';
     }
}
