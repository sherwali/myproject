<?php

namespace App\Http\Controllers;

use App\Models\Batches;
use App\Models\Grade;
use App\Models\Session;


class AllStudentsController extends Controller
{
    //
    public function index(Session $session){

        if(!$session->name==null){
            // dd($session->name);

        }
        else
        {
            $session = Session::orderBy('id', 'desc')->first();
        }
        
        $allsessions = Session::all();
        $batches = Batches::where('session_id',$session->id)->get();
        return view('allstudents.index', compact('batches','allsessions'));

    }


}
