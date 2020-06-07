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
       // print($requset->namefile);
       $output = shell_exec("C:/opens/OSPanel/domains/swamp/storage/app/public/test.py ".$requset->namefile );
       $out = json_decode($output);
       // dump($out);
       $text = new Text();
       $arrHeaderId = [];
       for ($i=0; $i < count($out[0]); $i++) {
         $hed = Header::where("header", $out[0][$i])->first();
         if (!$hed) {
           $header = new Header();
           $header->header = $out[0][$i];
           $header->save();
           $arrHeaderId[$i] = $header->id;
         }else {
           $arrHeaderId[$i] = $hed->id;
         }
       }
       // dump($arrHeaderId);
       for ($i=0; $i < count($out[1]); $i++) {
         for ($j=0; $j < count($out[1][$i]); $j++) {
            if (!Text::where("texts", $out[1][$i][$j])->first()) {
              // print(count($out[1][$i]));
              // print( $out[1][$i][$j]);
               $text = new Text();
               $text->texts = $out[1][$i][$j];
               $text->id_headers = $arrHeaderId[$i];
               $text->save();
            }
         }
       }

       return "true";
     }

     public function deleteText(){
       $headers = Header::all();
       foreach ($headers as $key => $header) {
         $header->delete();
       }
       $texts = Text::all();
       foreach ($texts as $key => $text) {
         $text->delete();
       }
     }
}
