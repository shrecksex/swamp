<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\File;
use App\Header;
use App\Text;

class FileController extends Controller
{
    public function uploadFile(Request $request) {
      if($request->hasFile('file')) {
           $file = $request->file('file');
           $path = Storage::put('public', $file);
           $path = str_replace("public/", "", $path);
           $file = new File();
           $file->name = $request->name;
           $file->path = $path;
           $file->save();
           return $path;
       }
       return 'false';
     }

     public function getFiles(Request $request){
       $files = File::all();
       return $files;
     }

     public function delete(Request $request){
       $files = File::find($request->id);
       Storage::delete( "public/".$files->path);
       $files->delete();
       return "true";
     }

     public function send(Request $requset){
       $command = escapeshellcmd('C:\opens\OSPanel\domains\swamp\storage\app\public\test.py');
       $output = shell_exec($command);
       
       return "true";
     }
}
