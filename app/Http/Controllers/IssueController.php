<?php

namespace App\Http\Controllers;
use App\Issue;

class IssueController extends Controller
{
   public function index()
   {
   		return view('issue/index',[
   			'issues' => Issue::orderBy('id','DESC')->paginate(5),
   			'type' => 'all'
   		]);
   }

   public function filter($type){
   		switch($type){
   			case "new":
   				$issues = Issue::where('status',0)->orderBy('id','desc')->paginate(5); 				
   				break;
   			case "assgined":
   				$issues = Issue::where('status',1)->orderBy('id','desc')->paginate(5);
   				$type = "filter";
   				break;
   			case "wip":
   				$issues = Issue::where('status',2)->orderBy('id','desc')->paginate(5);
   				$type = "filter";
   				break;
   			case "done":
   				$issues = Issue::where('status',3)->orderBy('id','desc')->paginate(5);
   				$type = "filter";
   				break;
   			case "closed":
   				$issues = Issue::where('status',4)->orderBy('id','desc')->paginate(5);
   				$type = "filter";
   				break;			
			case "default":
   				$issues = Issue::orderBy('id','desc')->paginate(5);   				
   				break;
   		}

   		return view('issue/index',[
   			'issues' => $issues,
   			'type' => $type
   		]);
   }
}
