<?php
namespace App\Repositories;
use App\User;
use DB;
use Excel;
use App\available_job;
use App\professional_quals;
use App\relevant_exp;
use App\referee;
use App\contact;
use App\institution;
use App\documents;
use App\Questions;
use App\applicantanswer;
use App\option;
use App\start;
use App\correct;
use Mail;

class Applicant {
	
	//create question 
		public function createquestion(array $question){
		$questionid=DB::table('questions')->insertGetId($question);
		
	    return $questionid;
	}
	//create correct
	public function createcorrect(array $correct){
		$correct=correct::create($correct);
		if($correct){
			return 'success';
		}
		else{
			return 'failure';
			
		}
	}
	//search
	public function searchresults($name){
		$name=str_replace('-','/',$name);
		$searchdb=DB::table('users')
		  ->join('available_jobs','users.pos_id','=','available_jobs.id')
		->join('institutions','users.id','=','institutions.user_ref')
		->select('users.*','available_jobs.position','institutions.grade')
		
		->Where('users.f_name','like','%'.$name.'%')
		->orWhere('users.l_name','like','%'.$name.'%')
		->orWhere('users.m_name','like','%'.$name.'%')
		->orWhere('users.ref_num','like','%'.$name.'%')
		->orderBy('users.exam_init','desc')
		->paginate(10);
		/**
		$viewresult=user::where('f_name','like','%'.$name.'%')
		->where('type',0)
		->orWhere('l_name','like','%'.$name.'%')
		->orWhere('m_name','like','%'.$name.'%')
		
		->orderBy('exam_init','desc')
		
		->paginate(10); **/
		return $searchdb;
		
	}
	//start test function
	public function starttest($type,$appid){
		$checktaken=start::where('user_id',$appid)
		->where('type',$type);
		if($checktaken->exists()){
			return response()->json('2',200);
	
		}
		else{
			$time=time();
			session(['timestarted'=>$time]);
           $preventrestart=start::create(['type'=>$type,'user_id'=>$appid]);
	        return  response()->json('1',200);	  
		}
	}
	//#################################################
	//TEST SUBMISSION PROCESS
	//#################################################
	//GET CORRECT ANS
	public function getcorrect($questionid){
		
	 $getcorrect=correct::where('question_id',$questionid)
				->get();
			foreach($getcorrect as $option){
				
				return $option->correctoption;
			}
	
	}
	//GETRESULT
	 public function getscore($userid){
		$score=User::where('id',$userid)->first();
		
			
			return $score->exam_init;
		
	}
	
	//finally submit test
	
	public function submitanswer(array $data,$questionid,$selectedoption,$userid){
		
		try{
			
			$checkcorrect=self::getcorrect($questionid);
			$getscore=self::getscore($userid);
			if($checkcorrect==$selectedoption){
				
				
				
				if($getscore==0){
					
					$createresult=User::where('id',$userid)
					->update(['exam_init'=>1]);
				}
				else {
					
				$myscore=$getscore+1;
				$updateresult=user::where('id',$userid)
				->update(['exam_init'=>$myscore]);
				}
			}
		
			
		$submitanswer=applicantanswer::create($data);
			return response()->json(['message'=>'success']);
		}
		catch(\Exception $e){
			
			return $e;
			//response()->json(['message'=>'failure']);
		
		}
	}
	//notify system that test is completed
	public function completedtest($userid){
		try{
		$update=User::where('id',$userid)
		->update(['textcomplete'=>1]);
		
			return response()->json(1);
		}
		catch(\Exception $ex){
			return $ex;
			//response()->json(0);
		}
	}
	
	
	
	
	
	//##################################################
	//TEST SUBMISSION PROCESS ENDS
	//##################################################
	
	//get available jobs by category
	public function availablejob($cat){
		if($cat=="all"){
		$listjob=available_job::orderBy('id','asc')
		->paginate(10);
			//session(['cat'=>'Graduate Trainee']);
			return $listjob;	
		}
		if($cat=="graduate-trainee"){
			$listjob=available_job::where('type','1')
			->orderBy('id','asc')
			->paginate(10);
			session(['cat'=>'Graduate Trainee']);
			return $listjob;
		}
		else{
			$listjob=available_job::where('type','2')
			->orderBy('id','asc')
			->paginate(10);
			session(['cat'=>'Experience Hire']);
			return $listjob;
		}
		
	}

	//#################################################
	//END QUESTION MANAGE
	//################################################
	
	
	//display five random questions
	public function questions(){
		$questions=DB::table('questions')
		->join('options','questions.id','=','options.question_id')
		->join('corrects','questions.id','=','corrects.question_id')
		->select('questions.*','options.*','corrects.*')
		->orderBy(DB::raw('RAND()'))
        ->take(5)
        ->get();
		return $questions;
	}
	
	//all question
		public function allquestions(){
		$questions=DB::table('questions')
		->join('options','questions.id','=','options.question_id')
		->join('corrects','questions.id','=','corrects.question_id')
		->select('questions.*','options.*','corrects.*')
		->orderBy('questions.id','asc')
        //->take(5)
        ->paginate(10);
		return $questions;
	}
	
	
	//delete question
	public function deletequestion($id){
		
		$question=Questions::find($id);
		$question->delete();
		$option=option::where('question_id',$id);
		$option->delete();
		$correct=correct::where('question_id',$id);
		$correct->delete();
		
		return 'success';
	}
	//modify question
		public function updatequestion(array $data1, array $data2,array $data3 ,$questionid){
		$updatequestion=DB::table('questions')
					->where('id',$questionid)
					->update($data1);
					
		$updateoption=DB::table('options')
					->where('question_id',$questionid)
					->update($data2);
					
		$updatecorrect=DB::table('corrects')
					->where('question_id',$questionid)
					->update($data3);
					
		if($updatequestion||$updatecorrect||$updateoption){
			
			return response()->json('You have successfully updated Question');
			
		}
		else{
			return response()->json('No Changes Made');	
		}
		
	}
	//#################################################
	//EDN QUESTION MANAGE
	//################################################
	
	
	//all aplicant
	public function allapplicants($perpage,$order=0){
		
		if($order==1){
		$allapplicant=DB::table('users')
		->join('available_jobs','users.pos_id','=','available_jobs.id')
		//->join('institutions','users.id','=','institutions.user_ref')
		->select('users.*','available_jobs.position')
		->where('users.type','=',0)
		->where('users.complete','=',1)
		->orderBy('exam_init','desc')
		->paginate($perpage);
		return $allapplicant;	
		}
		$allapplicant=DB::table('users')
		->join('available_jobs','users.pos_id','=','available_jobs.id')
		//->join('institutions','users.id','=','institutions.user_ref')
		->select('users.*','available_jobs.position')
		->where('users.type','=',0)
		->where('users.complete','=',1)
		->orderBy('id','desc')
		->paginate($perpage);
		return $allapplicant;
	}


		public function allapplicants2($perpage){
		
		$allapplicant=DB::table('users')
		->join('available_jobs','users.pos_id','=','available_jobs.id')
		//->join('institutions','users.id','=','institutions.user_ref')
		->select('users.*','available_jobs.position')
		->where('users.type','=',0)
		->where('users.complete','=',1)
		->where('users.sort','=',1)
		->orderBy('id','desc')
		->paginate($perpage);
		return $allapplicant;
	}
	
	//approve applicant 
	public function approvereject($applicantemail, $decision,$type){
		
		try{
			if($type==0){
		$approvereject=User::where('email',$applicantemail)
		->update(['approved'=>$decision]);
	     }
        else{
        	$approvereject=User::where('email',$applicantemail)
		->update(['approved'=>$decision,'sort'=>1]);	
        }
		return "1";
		}
		catch(\Exception $ex){
			
			return $ex;
		}
		
	}
	
	//to excel
	
	public function toexcel($region,$center){
		if($region=="all"){
			$datas=User::select('f_name','l_name','m_name','dob','region','phone_num','email','age','sex','created_at','textscore')
			->where('type',0)
			->where('complete',1)
			->get();
		}
		else{
		$datas=User::select('f_name','l_name','m_name','dob','region','phone_num','email','age','sex','created_at','textscore')
			->where('region',$region)
			->where('center',$center)
			->where('type',0)
			->where('complete',1)
			->get();
		}
		
		
		foreach($datas as $data){
			
			
			$result[]=['First Name'=>$data->f_name,'Last Name'=>$data->l_name,'Date of Birth'=>$data->dob,'sex'=>$data->sex,'Apllication Date & Time'=>$data->created_at,'region'=>$data->region,'phone number'=>$data->phone_num,'email'=>$data->email,'age'=>$data->age,'testscore'=>$data->textscore];
			
		}
		if(!isset($result)){
			$data=["Empty"=>"No Result Found"];
		}
		else{
	$data=$result;
		}
	Excel::create('applicantsdata', function($excel) use($data) {

    $excel->sheet('applicants', function($sheet) use($data) {

        $sheet->fromArray($data);

    });

})->export('xls');
		//return $usertoexcel;
	}
	
	//addposition
	public function addposition(array $data){
		
		try{
		$addposition=available_job::create($data);
		return response()->json("1",200);
		}
		catch(\Exception $ex){
			return response()->json("0",500);
		}
	}
	//create uption
	
	public function createoption(array $option){
		
		
		$option=option::create($option);
		if($option){
		  return 'success';
			
		}else{
			
			return 'failure';
		}
		
	}
	
	//delete position
	public function deletepos($id){
		try{
			
			$deletepos=available_job::where('id',$id)
			->delete();
			return response()->json("1");
		}
		catch(\Exception $ex){
			return response()->json("0");
		}
		
	}
	//GET FILES
	public function alldoc(){
		$getappfile=documents::all();
		return $getappfile;
		
	}
	//modify position
	public function modifyposition(array $data){
		try{
		$addposition=available_job::where('ref_no',$data['ref_no'])
		->update($data);
		return response()->json("1",200);
		}
		catch(\Exception $ex){
			return response()->json("0",500);
		}
		
	}
	
	//download cv
	public function downloadcv($docid){
		$usercv=documents::select('document')
		->where('id',$docid)
		
		->get();
			return $usercv;
		}
		
		//search 
		public function search(array $data){
			//state
			if($data['state']=="all"){
			$state="";
			$eq1="!=";
		}	
		else{
			$state=$data['state'];
			$eq1="=";
		}
			
			//status
			if($data['status']=="all"){
			$status="";
			$eq5="!=";
		}	
		else{
			$status=$data['status'];
			$eq5="=";
		}
		
			
		//region
		if($data['region']=="all"){
			$region="";
			$eq3="!=";
		}
		else{
			$region=$data['region'];
			$eq3="!=";
		}
		//sex
		if($data['sex']=="all"){
			$sex="";
			$eq4="!=";
		}
		else{
			$sex=$data['sex'];
			$eq4="!=";
		}	
		
		//grade
		if($data['grade']=="all"){
			$grade="";
			$eq6="!=";
		}
		else{
			$grade=$data['grade'];
			$eq6="!=";
		}
			
		$searchdb=DB::table('users')
		  ->join('available_jobs','users.pos_id','=','available_jobs.id')
		->join('institutions','users.id','=','institutions.user_ref')
		->select('users.*','available_jobs.position','institutions.grade')
		->where('users.type','=',0)
	
		->whereBetween('users.age',[$data['fromage'],$data['toage']])
		->whereBetween('users.textscore',[$data['scorefrom'],$data['scoreto']])
	
		->where('users.state_of_origin',$eq1,$state)
		->where('users.approved',$eq5,$status)
		->where('users.region',$eq3,$region)
		
		->where('institutions.grade',$eq6,$grade)
		->where('users.sex',$eq4,$sex)
			
		->where('users.complete','=',1)
		->where('users.sort','=',1)
		->paginate(30);
		
		if(session()->has('count')){
			
		}
		else{
		$searchdbs=DB::table('users')
		  ->join('available_jobs','users.pos_id','=','available_jobs.id')
		->join('institutions','users.id','=','institutions.user_ref')
		->select('users.*','available_jobs.position','institutions.grade')
		->where('users.type','=',0)
	
		->whereBetween('users.age',[$data['fromage'],$data['toage']])
		->whereBetween('users.textscore',[$data['scorefrom'],$data['scoreto']])
	
		->where('users.state_of_origin',$eq1,$state)
		->where('users.approved',$eq5,$status)
		->where('users.region',$eq3,$region)
		
		->where('institutions.grade',$eq6,$grade)
		->where('users.sex',$eq4,$sex)
			
		->where('users.complete','=',1)
		->where('users.sort','=',1)
			->count('users.id');
		
			session(['count'=>$searchdbs]);
		}
		
		if(session()->has('counttotal')){
			
		}
		else{
			$totalrec=User::where('complete',1)
			->where('type',0)
			->count('id');
			session(['counttotal'=>$totalrec]);
		}
		
	
			
			return $searchdb;
		}
		
	################################################
		//----------Added by zeus 24/08/2016------------
		################################################
		public function fetchquals($id) {
			return professional_quals::where('user_ref',$id)
									  ->orderBy('created_at', 'asc')
									  ->get();
		}

		public function deletequal($id){

			$deletequal=professional_quals::where('id',$id)
											->delete();
			return "success";
		}

		public function fetchexperience($id) {
			return relevant_exp::where('user_ref', $id)
								->orderBy('created_at', 'asc')
								->get();
		}

		public function deleteexp($id) {
			$deleteexp = relevant_exp::where('id', $id)
									  ->delete();
			return  "success";
		}

		public function fetchrefs($id) {
			return referee::where('user_ref',$id)
									  ->orderBy('created_at', 'asc')
									  ->get();
		}
		//mass mailing
		public function massmail($messages,$choice){
			//return $messages;
			$allappsored=User::where('sort',1)
			->where('complete',1)
			->where('approved',$choice)
			->select('email','f_name','l_name')
			->get();
			//loop through and send mail to each individual
			if($choice=='1'){
				$subject="Congratulation";
			}
			else{
				$subject="Sorry";
			}
			foreach($allappsored as $applicant){
			$data=['email'=>$applicant->email,'info'=>$messages,'name'=>$applicant->f_name.' '.$applicant->l_name,'subject'=>$subject];
			
	        Mail::later(60,'email.custom',$data,function($message) use($data){
			$message->from('olaoluwa@snapnet.com.ng','DPRJobPortal');
			$message->to($data['email'],$data['name'])->subject($data['subject']);	
			});
			}
			return response()->json('success',200);
			
		}

		public function deleteref($id) {
			$deleteref = referee::where('id', $id)
									  ->delete();
			return  "success";
		}

		public function fetchcontact($id) {
			return contact::where('user_ref', $id)->first();
		}

		public function fetchinstitute($id) {
			return institution::where('user_ref', $id)->first();
		}

		public function fetchuser($id) {
			return User::where('id', $id)->first();
		}
		public function fetchdocs($id) {
			return documents::where('user_ref', $id)
							 ->orderBy('created_at', 'asc')
							 ->get();
		}
		/*
		 * added by aDELOYE aDEDEJI on 01/09/2016 
		 * to collect not just one but all institutions attached to a particular user
		 *
		 */

		public function fetchAllInstitute($id) {
			return institution::where('user_ref', $id)
								->where('iname','!=','')
								->orderBy('created_at', 'asc')
								->get();
		}
		//###########################################################
		//ANALYTICS API'S
		//###########################################################
		public function yearlystaistics($date,$jobid){
			if($jobid==0){
				$jobid="*";
				$tt='!=';
			}
			else{
				$jobid=$jobid;
				$tt='=';
			}
			$alluser=User::where('created_at','like',$date.'%')
			->where('pos_id',$tt,$jobid)
			->count('id');
			return $alluser;
		}
		
		public function passfail($date,$jobid){
				if($jobid==0){
				$jobid="*";
				$tt='!=';
			}
			else{
				$jobid=$jobid;
				$tt='=';
			}
			
			$alluserpass=User::where('textscore','>=',50)
				->where('pos_id',$tt,$jobid)
			->where('created_at','like',$date.'%')
			->count('id');
			
			$alluserfail=User::where('textscore','<',50)
				->where('pos_id',$tt,$jobid)
			->where('created_at','like',$date.'%')
			->count('id');
			return [$alluserpass,$alluserfail];
			
		}
		
		public function appperregion($date,$jobid){
			
				if($jobid==0){
				$jobid="*";
				$tt='!=';
				
			}
			else{
				$jobid=$jobid;
				$tt='=';
				
			}
			
			$portregion=User::where('region','Portharcourt')
				->where('pos_id',$tt,$jobid)
			->where('created_at','like',$date.'%')
			->count('id');
			
			$lagregion=User::where('region','Lagos')
				->where('pos_id',$tt,$jobid)
			->where('created_at','like',$date.'%')
			->count('id');
			
			$abjregion=User::where('region','Abuja')
				->where('pos_id',$tt,$jobid)
			->where('created_at','like',$date.'%')
			->count('id');
			
			$kanoregion=User::where('region','Kano')
				->where('pos_id',$tt,$jobid)
			->where('created_at','like',$date.'%')
			->count('id');
			
			return [$portregion,$lagregion,$abjregion,$kanoregion];
		}
		
		public function yearlysexstat($date,$jobid){
			
				if($jobid==0){
				$jobid="*";
				$tt='!=';
			}
			else{
				$jobid=$jobid;
				$tt='=';
			}
			$male=User::where('sex','M')
				->where('pos_id',$tt,$jobid)
			->where('created_at','like',$date.'%')
			->count('id');
			$female=User::where('sex','F')
			->where('pos_id',$tt,$jobid)
			->where('created_at','like',$date.'%')
			->count('id');
			
			return [$male,$female];
			
			
			
		}
		public function appbystate($jobid){
			
				if($jobid==0){
				$jobid="*";
				$tt='!=';
			}
			else{
				$jobid=$jobid;
				$tt='=';
			}
			
	$states= [
    "Abia"=>"Abia",
    "Adamawa"=>"Adamawa",
    "Akwa Ibom"=>"Akwa Ibom",
    "Anambra"=>"Anambra",
    "Bauchi"=>"Bauchi",
    "Bayelsa"=>"Bayelsa",
    "Benue"=>"Benue",
    "Borno"=>"Borno",
    "Cross River"=>"Cross River",
    "Delta"=>"Delta",
    "Ebonyi"=>"Ebonyi",
    "Edo"=>"Edo",
    "Ekiti"=>"Ekiti",
    "Enugu"=>"Enugu",
    "FCT"=>"FCT",
    "Gombe"=>"Gombe",
    "Imo"=>"Imo",
    "Jigawa"=>"Jigawa",
    "Kaduna"=>"Kaduna",
    "Kano"=>"Kano",
    "Katsina"=>"Katsina",
    "Kebbi"=>"Kebbi",
    "Kogi"=>"Kogi",
    "Kwara"=>"Kwara",
    "Lagos"=>"Lagos",
    "Nasawara"=>"Nasawara",
    "Niger"=>"Niger",
    "Ogun"=>"Ogun",
    "Ondo"=>"Ondo",
    "Osun"=>"Osun",
    "Oyo"=>"Oyo",
    "Plateau"=>"Plateau",
    "Rivers"=>"Rivers",
    "Sokoto"=>"Sokoto",
    "Taraba"=>"Taraba",
    "Yobe"=>"Yobe",
    "Zamfara"=>"Zamfara"];
	$date=date('Y');
	$total=User::where('created_at','like',$date.'%')
			->where('pos_id',$tt,$jobid)
			->count('id');
	 
	foreach($states as $state){
		
		$stateapp=User::where('state_of_origin',$state)
			->where('pos_id',$tt,$jobid)
		->count('id');
		$percentage=round(($stateapp/$total)*100,2).'%';
		$allappstat[]=['value'=>$stateapp,'label'=>"{$state}", 'formatted'=>"approx:{$percentage}"];
	}
	
	return $allappstat;
    	
			
		}

		//###########################################################
		//ANALYTICS API'S
		//###########################################################
	}
	
	
	