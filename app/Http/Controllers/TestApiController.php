<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class TestApiController extends Controller
{
    //
    public function test(Request $request)
    { 
    	$katakunci = $rquest->get('katakunci');
    	$data = Student::
    	  where('nama','like','%'. $katakunci .'$')->paginate(7);

    	   return $data;

    }
}
