<?php

namespace App\Http\Controllers;
use App\Issue;

class IssueController extends Controller
{
   public function index()
   {
   		return view('issue/index',[
   			'issues' => Issue::paginate(5)
   		]);
   }
}
