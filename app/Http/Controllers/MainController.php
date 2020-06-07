<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Text;
use App\Header;

class MainController extends Controller
{
    public function getlending(Request $requset) {
      return view('lending', $this->getText());
    }

    public function getText(){
      $headers = Header::all();
      $arrText = array();
      foreach ($headers as $key => $header) {
        $text = Text::where("id_headers", $header->id)->get();
        $arrText[$header->id] = $text;
      }
      return ["headers" => $headers, "texts" => $arrText];
    }
}
