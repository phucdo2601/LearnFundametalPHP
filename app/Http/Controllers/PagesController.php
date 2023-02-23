<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    function index() {
        return view('index');
    }

    function about() {

        $name = "tan";

        $listName = array('Hoang', 'Phuc', 'Nam', 'Tien', 'Michael', 'Tahun');
        // $listName = [];
        return view('about',[
            'name' => $name,
            'listName' => $listName
        ]);
    }
}
