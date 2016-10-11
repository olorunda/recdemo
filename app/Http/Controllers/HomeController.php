<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\Register;
use Mail;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 protected $registerapplicant;
	 
    public function __construct(Register $registerapplicant)
    {
		//$this->middleware('guest');
		$this->registerapplicant=$registerapplicant;
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		session(['page'=>1]);
        return view('dpr.login');
    }
	public function logout(){
		Auth::logout();
		session(['page'=>1]);
		return redirect('/login');
		
	}

	public function register (){
		session(['page'=>2]);
		return view ('dpr.signup');
		
	}
	public function sendmail(Request $request){
		//return $request->message;
	try{
		
	$data=['email'=>$request->email,'name'=>$request->name,'messages'=>$request->message,'subject'=>$request->subject];
	   Mail::send('email.contact',$data,function($message) use($data){
			$message->from($data['email'],$data['name']);
			$message->to('info@dpronline.com','dpr')->subject($data['subject']);	
			});
			return "1";
			
	}
	catch(\Exception $ex){
		return $ex;
	}
} 
	public function test(){
		$type=$this->registerapplicant->getjobtype(8);
		return $type;
		
	}
	
	//register user
	public function registerapplicant (Request $request){
		
		if($request->ajax()){
			
		$jobid=$request->jobid;
		$type=trim($this->registerapplicant->getjobtype($jobid));
		//return $type;
		$progress=2;
		}
		else{
		
		$jobid=0;
		$type=0;
		$progress=1;
		}
		if($request->ajax()){
			$this->validate($request,[
			'first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			'phone_number' => 'required|max:255',
		]);
		}
		else{
				$this->validate($request,[
			'first_name' => 'required|max:255',
			'g-recaptcha-response' => 'required|captcha',
			'last_name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			'phone_number' => 'required|max:255',
		]);
			
		}
		$register=$this->registerapplicant->register(['f_name'=>$request->first_name,'email'=>$request->email,'l_name'=>$request->last_name,'email'=>$request->email,'password'=>bcrypt($request->password),'phone_num'=>$request->phone_number,'pos_id'=>$jobid,'jobcat'=>$type,'progress'=>$progress]);
		if($register=="1"){
			
			$data=['name'=>$request->first_name.' '.$request->last_name,'email'=>$request->email];
			
			Mail::later(20,'email.regsuccess',$data,function($message) use($data){
			$message->from('info@dpronline.org.ng','Registration Successfull');
			$message->to($data['email'],$data['name'])->subject('Registration successfull');	
			});
			
			if($request->ajax()){
				Auth::logout();
				if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
				return response()->json('success');
				}
			
				
			}
			return redirect('/register')->with('regsuccess','success');
			
		}
		else {
				if($request->ajax()){
				return response()->json('failure');
			}
			session(['page'=>2]);
			return redirect('/register')->with('regsuccess','some error occurred');
		}
	}
	
	//forgot password
	public function forget(){
		session(['page'=>1]);
		return view('dpr.forgot');
	}
}
