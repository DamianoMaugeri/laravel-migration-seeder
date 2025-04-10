<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index(){
        $now=now()->toDateTimeString();
        $orario=Carbon::parse($now)->format('H:i');
        $data= Carbon::parse($now)->format('d-m-Y');

        $trains= Train::where('partenza', '>=', $now)->orderBy('partenza','ASC')->get();
        return view('home', compact('trains','orario','data'));

    }
}
