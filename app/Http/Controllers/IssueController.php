<?php

namespace App\Http\Controllers;
use App\Issue;
use App\Customer;
use App\Product;
use App\User;

class IssueController extends Controller
{
	
	public function __construct(){
		$this->middleware('auth')->except(['index']);
	}

    public function index()
    {
   		return view('issue/index',[
   			'issues' => Issue::where('status','<',4)->orderBy('id','DESC')->paginate(5),
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

    public function add(){     	
   		return view('issue/add',[
   			"customers" => Customer::all(),
   			"products" => Product::all()
   		]);
    }

    public function create(){
    	$validator = validator(request()->all(),[         
	        "subject" => "required",
	        "detail" => "required",
	        "customer_id" => "required",
	        "product_id" => "required"
      	]);
      	if($validator->passes()){
	    	$issue = new Issue();
	    	$issue->subject = request()->subject;
	    	$issue->detail = request()->detail;
	    	$issue->customer_id = request()->customer_id;
	    	$issue->product_id = request()->product_id;
	    	$issue->status = 0;
	    	$issue->user_id = auth()->user()->id;
	    	$issue->save();

	    	return redirect('issues');
    	}
    	return back()->withErrors($validator);
    }

    public function edit($id){      
      return view("issue/edit",[
        'issue' => Issue::find($id)
      ]);
    }

    public function update($id){
        $validator = validator(request()->all(),[         
          "subject" => "required",
          "detail" => "required"          
        ]);

        if($validator->passes()){
          $issue = Issue::find($id);
          $issue->subject = request()->subject;
          $issue->detail = request()->detail;          
          $issue->save();

          return redirect('issues/view/'.$id);
        }
        return back()->withErrors($validator);
    }

    public function status($id,$status)
    {
      $issue = Issue::find($id);
      $issue->status = $status;
      $issue->save();

      return back()->with('info','Status changed');
    }

    public function assign($id,$user)
    {
      $issue = Issue::find($id);
      $issue->user_id = $user;
      $issue->save();

      return back()->with('info','Re-assigned');
    }

    public function view($id){
    	return view('issue/view',[
   			'issue' => Issue::find($id),
        'users' => User::all()
   		]);
    }

    public function delete($id){
      $issue = Issue::find($id);
      $issue->delete();

      return redirect('issues');
    }
}
