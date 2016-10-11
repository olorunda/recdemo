<?php

namespace App\Http\Controllers;

use Crypt;
use Illuminate\Http\Request;
use App\Repositories\Applicant;
use App\Http\Requests;
use App\User;
use App\contact;
use App\institution;
use App\professional_quals;
use App\relevant_exp;
use App\documents;
use App\referee;
use Auth;
use Mail;


class ApplicantController extends Controller
{
	protected $applicant;
	
    public function __construct(Applicant $applicant){
		$this->middleware('auth');
		$this->applicant=$applicant;
		
	}
	
	//list job category
	public function listjobcat(){
		
		return view('dpr.available_jobs');
	}
	
	//get available jobs by category
	public function availablejobs($cat){
		
		$availablejob=$this->applicant->availablejob($cat);
		return view('dpr.listjobs',['listjobs'=>$availablejob]);
		
	}
	
	//set applied for jobs
	public function appliedfor($position=1,$id=1,$type){
		
		User::where('id',Auth::user()->id)
		->update(['pos_id'=>$id,'progress'=>2,'appstart'=>1,'jobcat'=>$type]);
		return view('dpr.apply',['positionid'=>$id,'title'=>str_replace('-',' ',$position),'type'=>$type]);
		
	}

	public function bio(Request $request) {
		$this->validate($request, [ 
			'phone'=>'required|max:13', 
			'marital_status'=>'required|string', 
			'sex'=>'required|string', 
		]);
		$dob = trim($request->byear.'-'.$request->bmonth.'-'.$request->bday);
		$apply_cand = User::where('id',$request->id)
				->update([
					'm_name'=>$request->middle_name,
					'phone_num' => $request->phone, 
					'dob' => $dob, 
					'sex' => $request->sex, 
					'marital_status' => $request->marital_status
				]);	
		return redirect($request->url)->with('message', 'Bio-data was Successfully Updated!');
	}

	public function apply(Request $request) {

		$this->validate($request,[
			'file' => 'required|mimes:png,jpg,jpeg',
			'middle_name' => 'max:255|string', 
			'phone_number' => 'required|max:13', 
			'state_origin' => 'required|string',
		]);

			//by zeus
			$dob;
			if($request->birth_year=='0' || $request->birth_month=='0' || $request->birth_day=='0'){
				return "Please select a valid option for Year , Month and Day of Birth";
			} else {
				$dob=trim($request->birth_year.'-'.$request->birth_month.'-'.$request->birth_day);
			}

			//added on 30/08/2016 to remove maiden name for male applicant
			$maiden_name;
			if($request->sex == "M") {
				$maiden_name = "NOT APPLICABLE";
			} else {
				$maiden_name = $request->maiden_name;
			}
			$year = date('Y');
			$year_birth = explode('-', $dob);
			$age = (int) $year - (int) $year_birth[0];
			if($age <18){
				return "dob";
			}
			if($age > 30 ){
				
				return "over";
			}
			if($request->state_origin=="0") {
				return "origin";
			}
			if($request->sex=="0") {
				return "sex";
			}
			if($request->marital_status=="0") {
				return "status";
			}
			try{
				$filename=time().'.'.$request->file('file')->getClientOriginalExtension();
				$request->file('file')->move('upload',$filename);
				$apply_cand = User::where('id',$request->id)
				->update([
					'm_name'=>$request->middle_name,
					'maiden_name' => $maiden_name,
					'phone_num' => $request->phone_number, 
					'dob' => $dob, 
					'sex' => $request->sex, 
					'image'=>$filename,
					'age' => $age,
					'marital_status' => $request->marital_status
				]);

				//first check if the contact already exists then update it
				if(contact::where('user_ref', Auth::user()->id)->exists()) {
					//update it
					contact::where('user_ref', Auth::user()->id)
						   ->update(['state_origin'=>$request->state_origin]);
				} else {
					//if the contact does not already exists then create it with only the state value
					contact::create([
						'user_ref' => $request->id,
						'state_origin'=>$request->state_origin
						]);
				}

				return "success";
			}
			catch(\Exception $ex){
				return $ex;
			}

	}

	public function sendprof(Request $request){
		
		$user=['email'=>$request->user()->email,'name'=>$request->user()->f_name.' '.$request->user()->l_name,'id'=>$request->user()->id];
		  Mail::later(10,'email.sendprof', $user, function ($m) use ($user) {
            $m->from('info@dpr.gov.ng', 'DPR PORTAL');
            $m->to($user['email'], $user['name'])->subject('Examination Slip Link');
        });
		return '1';
	}
	
	public function contact(){
		
		
		//return view('dpr.contact',['positionid'=>$id,'title'=>$position,'type'=>$type]);

		return view('dpr.contact');
		
	}

	public function savecontact(Request $request) {

	
	//return $request->url;
	
		$this->validate($request, [
			'id'=> 'required', 
			'street'  => 'required|max:255', 
			'city'    => 'required|max:100|string', 
			'lga'	  => 'required|max:100|string', 
			'state'	  => 'required|max:50|string', 
		]);
		User::where('id',$request->id)
		->update(['state_of_origin'=>$request->state_origin]);

		if($request->url!="") {
				//update contact information
			$updateContact = contact::where('user_ref', $request->id)
								   ->update([
								   	'street' => $request->street, 
								   	'city' => $request->city, 
								   	'state' => $request->state, 
								   	'lga' => $request->lga,
								   	'state_origin' => $request->state_origin
								   	]);
			return redirect($request->url)->with('message', 'Successfully updated.');
		}
		if(contact::where('user_ref', $request->id)->exists()) {
			//record already exists
			if($request->url!="") {
				return redirect($request->url)->with('message', 'Successfully created.');
			}
			//return redirect('/education')->with('message', 'Successfully created.');
			//don't just redirect anymore since we need to update the remaining columns in the table
			$updateC = contact::where('user_ref', $request->id)
							  ->update([
							  		'street' => $request->street, 
							  		'city' => $request->city, 
							  		'lga' => $request->lga, 
							  		'state' => $request->state
							  	]);
			return redirect('/education')->with('message', 'Successfully updated!');
		}	
		$savecontact = contact::create([
			'user_ref' => $request->id, 
			'street' => $request->street, 
			'city' => $request->city, 
			'lga' => $request->lga,
			'state' => $request->state
		]);
         
			User::where('id',Auth::user()->id)
			->update(['progress'=>3]);
		return redirect('/education')->with('message', 'Successfully created.');
	}

	################################################
	//----------Added by zeus 24/08/2016------------
	################################################
	public function education(Request $request) {
		//get the available institutions the applicant has added for experienced hire
		$institute = $this->applicant->fetchAllInstitute($request->User()->id);

		return view('dpr.education', ['institute'=>$institute]);
	}

//edited this form to make necessary adjustments to save without institution data

	public function saveducation(Request $request) {

		//remove primary school name from validation since it has been removed from the UI

		if($request->url!="") {
			
			$this->validate($request, [
				'user_ref' => 'required', 
				'iname' => 'required|string|max:200', 
				'sname' => 'required|string|max:200', 
				'course' => 'required|string|max:100',
			]);
		} else {
			foreach($request->file('file') as $files){
				$ext=$files->getClientOriginalExtension();
				//return $ext;
			if($ext=="pdf" || $ext=="doc" || $ext=="docx"){
				
			}
			else{
				return "error";
			}
			}
			$this->validate($request, [
				
				'user_ref' => 'required',  
				'sname' => 'required|string|max:200',
			]);
		}

		//from and to date for secondary school
		$sstart_date = trim($request->sfyear.'-'.$request->sfmonth.'-'.$request->sfday);
		$send_date = trim($request->seyear.'-'.$request->semonth.'-'.$request->seday);
				
		if($sstart_date == "0" || $send_date == "0") {
			return "Please select a valid date for Higher Institution and Secondary School attended";
		}

		
		if($request->url!="") {
			$filenames = [$request->iresult, $request->sresult, $request->presult];
		} else {
			try {
				//loop through the images and upload and upload
				foreach($request->file('file') as $files){
					$filename = $request->User()->f_name . rand(00000000000,99999999999).'.'.$files->getClientOriginalExtension();
					$files->move('upload/profiles', $filename);

					//after uploading, update the documents table
					documents::create([
						'user_ref' => $request->user_ref, 
						'document' => $filename
					]);

					$filenames[] = $filename;
					//return $filename1;
				}

				if($filenames[0]=="" || $filenames[1]=="" || $filenames[2]=="") {
					return "Incomplete Files! Make Sure You Upload At least Three Files";
				}

			} catch(\Exception $e) {
				return $e;
			}
		}
		 
		 //check if result have previously been uploaded
		 if(institution::where('user_ref',$request->user_ref)->exists()) {

		 	//record exists just update info
		 	try{
						//database save info
		 		$updateducation = institution::where('user_ref',$request->user_ref)
				->update([
					'user_ref' => $request->user_ref, 
								'sname' => $request->sname, 
								'sstart_date' => $sstart_date, 
								'send_date' => $send_date, 
								'sdegree' => $request->sdegree, 
				]);
				$updateUserAccount = User::where('id', $request->user_ref)
								   ->update(['progress' => 4]);

				if($request->url!="") {
					return redirect($request->url)->with('message', 'success');
				} else {
					return "success";
				}
			
			}
			catch (\Exception $ex ){
				return $ex;
			}

		 } else {
		 	//record doesn't exist so create one
		 	try{
						//database save info
							$saveducation = institution::create([
								'user_ref' => $request->user_ref,
								'sname' => $request->sname, 
								'sstart_date' => $sstart_date, 
								'send_date' => $send_date,  
								'sdegree' => $request->sdegree
							]);	
							$updateUserAccount = User::where('id', $request->user_ref)
								   ->update(['progress' => 4]);
							return "success";
			
			}
			catch (\Exception $ex ){
				return $ex;
			}
		 }
	}

	public function saveHireEducation(Request $request) {
		$this->validate($request, [
			'iname' => 'required|string|max:100', 
			'course' => 'required|string|max:100', 
		]);
		
		$checkempty=institution::where('user_ref',$request->id)->select('iname')->first();
		$institution=institution::where('user_ref',$request->id)->count('id');
	
		//prevent graduate trainee from entering more than on intitution
		//work on this tomao morning
	//	if($checkempty->iname!=""){
		if($request->user()->jobcat==1 && $institution>=1){
			if(Auth::user()->progress==5){
			return redirect('/profile/'.Crypt::encrypt($request->id))->with('messagepre','You Cannot add more than one Institution as a Graduate Trainee');
		}
		
		
		return redirect('/education')->with('messagepre','You Cannot add more than one Institution a Graduate Trainee');
	
		}
	//	}
		
		if($request->ifyear=="0" || $request->ifmonth=="0" || $request->ifday=="0" || $request->ieyear=="0" || $request->iemonth=="0" || $request->ieday=="0") {
			return redirect('/education')->with('message', 'Please select a valid year month and day!');
		}
		$istart_date = trim($request->ifyear.'-'.$request->ifmonth.'-'.$request->ifday);
		$iend_date = trim($request->ieyear.'-'.$request->iemonth.'-'.$request->ieday);

		$degree = "";
		if($request->idegree=="others") {
			$degree = $request->odegree;
		} else {
			$degree = $request->idegree;
		}

		if($request->oigrade=="8") {
			$grade = $request->ograde;
		} else {
			$grade = $request->oigrade;
		}
		$saveHireEducation = institution::create([
			'user_ref' => $request->id, 
			'iname' => $request->iname, 
			'istart_date' => $istart_date, 
			'iend_date' => $iend_date, 
			'degree'=> $degree, 
			'country' => $request->country,
			'course' => $request->course, 
			'grade' => $grade
		]);
		//update degree on user table
		User::where('id', Auth::user()->id)
		->update(['degree'=>$request->idegree]);
		if(Auth::user()->progress==5){
			return redirect('/profile/'.Crypt::encrypt($request->id));
		}

		return redirect('/education');
	}

	public function editHireEdu(Request $request) {
		$this->validate($request, [
			'iname' => 'required|string|max:100', 
			'course' => 'required|string|max:100', 
		]);

		if($request->ifyear=="0" || $request->ifmonth=="0" || $request->ifday=="0" || $request->ieyear=="0" || $request->iemonth=="0" || $request->ieday=="0") {
			return redirect('/education')->with('message', 'Please select a valid year month and day!');
		}
		$istart_date = trim($request->ifyear.'-'.$request->ifmonth.'-'.$request->ifday);
		$iend_date = trim($request->ieyear.'-'.$request->iemonth.'-'.$request->ieday);

		$degree = "";
		if($request->eidegree=="others") {
			$degree = $request->odegree;
		} else {
			$degree = $request->eidegree;
		}
		$grade = "";
		if($request->eoigrade=="8") {
			$grade = $request->eograde;
		} else {
			$grade = $request->eoigrade;
		}
		$editHireEducation = institution::where('user_ref', Auth::user()->id)
		->update([
			'iname' => $request->iname, 
			'istart_date' => $istart_date, 
			'iend_date' => $iend_date, 
			'degree'=> $degree, 
			'country' => $request->country,
			'course' => $request->course, 
			'grade' => $grade
		]);
		//update degree on user table
		User::where('id', Auth::user()->id)
		->update(['degree'=>$request->idegree]);
		if(Auth::user()->progress==5){
			return redirect('/profile/'.Crypt::encrypt($request->id));
		}
		return redirect('/education');
	}

	public function others(Request $request) {

		$quals = $this->applicant->fetchquals($request->user()->id);
		$relexp = $this->applicant->fetchexperience($request->user()->id);
		$refs = $this->applicant->fetchrefs($request->user()->id);
		return view('dpr.others',[
			   'professional_quals'=>$quals,
			   'relevant_exp'=>$relexp, 
			   'refs'=>$refs
		]);
	}

	//fixed --other qual
	public function saveothersquals(Request $request) {

		$this->validate($request, [
			'id' => 'required', 
			'name' => 'required|max:200', 
			'position' => 'required|max:200',
		]);
		//check if the qualification has been previously updated
		if(professional_quals::where('user_ref', $request->id)
							 ->where('name', $request->name)
							 ->where('position', $request->position)
							 ->exists()) {
			//record already exists
			if($request->url!=""){
				return redirect($request->url)->with('message', 'Record was Successfully Added!');
			}
			return redirect('/others')->with('message', 'Record Already Exists!');
		} else {
			//record does not exist, save record
			$saveothersquals = professional_quals::create([
				'user_ref' => $request->id, 
				'name' => $request->name, 
				'position' => $request->position
			]);
			if($request->url!=""){
				return redirect($request->url)->with('message', 'Record was Successfully Added!');
			}
			return redirect('/others')->with('message', 'Record was Successfully Added!');
		}
	}

	public function deletequal(Request $request, $id) {
		$deletedRow = professional_quals::where('id', $id)->delete();
		if($request->url!=""){
			return redirect($request->url)->with('message', 'Record was Successfully Added!');
		}
		return redirect('/others')->with('message', 'Record was successfully deleted!');
	}

	//fixed
	public function saveothersexp(Request $request) {
		$this->validate($request, [
			'id' => 'required', 
			'name' => 'required|max:200', 
			'position' => 'required|max:200',
		]);

		//collect the start and end date
		$start_date = trim($request->esyear.'-'.$request->esmonth.'-'.$request->esday);
		$end_date = trim($request->eeyear.'-'.$request->eemonth.'-'.$request->eeday);

		//check if the experience has been previously updated
		if(relevant_exp::where('user_ref', $request->id)
							 ->where('name', $request->name)
							 ->where('position', $request->position)
							 ->exists()) {
			//record already exists
			if($request->url!=""){
				return redirect($request->url)->with('message', 'Record was Successfully Added!');
			}
			return redirect('/others')->with('message', 'Record Already Exists!');
		} else {
			//record does not exist, save record
			$saveothersexp = relevant_exp::create([
				'user_ref' => $request->id, 
				'name' => $request->name, 
				'position' => $request->position, 
				'start_date' => $start_date, 
				'end_date' => $end_date
			]);
			if($request->url!=""){
				return redirect($request->url)->with('message', 'Record was Successfully Added!');
			}
			return redirect('/others')->with('message', 'Record was Successfully Added!');
		}

	}

	public function deleteexp(Request $request, $id) {
		$deletedRow = relevant_exp::where('id', $id)->delete();
		if($request->url!=""){
			return redirect($request->url)->with('message', 'Record was Successfully deleted!');
		}
		return redirect('/others')->with('message', 'Record was successfully deleted!');
	}

	//fixed ---ref
	public function saveothersref(Request $request) {
		$this->validate($request, [
			'id' => 'required', 
			'name' => 'required|max:100', 
			'organization' => 'required|max:200', 
			'position' => 'required|max:100', 
			'email' => 'required|max:100',
			'phone' => 'required|max:11',
		]);

		//check if the experience has been previously updated
		if(referee::where('user_ref', $request->id)
							 ->where('name', $request->name)
							 ->where('position', $request->position)
							 ->exists()) {
			//record already exists
			if($request->url != "") {
				return redirect($request->url)->with('message', 'Record was Successfully Added!');
			}
			return redirect('/others')->with('message', 'Record Already Exists!');
		} else {
			//record does not exist, save record
			$saveothersref = referee::create([
				'user_ref' => $request->id, 
				'name' => $request->name, 
				'organization' => $request->organization, 
				'position' => $request->position,
				'email' => $request->email, 
				'phone' => $request->phone
			]);
			if($request->url != "") {
				return redirect($request->url)->with('message', 'Record was Successfully Added!');
			}
			return redirect('/others')->with('message', 'Record was Successfully Added!');
		}
	}

	public function deleteref(Request $request, $id) {
		$deletedRow = referee::where('id', $id)->delete();
		if($request->url != "") {
				return redirect($request->url)->with('message', 'Record was Successfully Added!');
		}
		return redirect('/others')->with('message', 'Record was successfully deleted!');
	}

		public function profiledit(Request $request, $id) {
		try {
			//$did = Crypt::encrypt(1);
			$did = Crypt::decrypt($id);
			
		$year = date("Y");
		$num = 100 + $did;
		//return $request->session('ref');
		//if($request->session('ref')==null){
		
		if(User::where('id',$id)->select('ref_num')->first()==""){
			if($request->user()->region=="Abuja"){
					$ref_num = "DPR/" . $year .'/'.strtoupper('ABJ').'/'. $num;
			}
			else{
		$ref_num = "DPR/" . $year .'/'.strtoupper(substr($request->user()->region,0,3)).'/'. $num;
			}		
		session(['ref'=>$ref_num]);
		//if(User::select('ref_num',$ref_num)
		$updateUserAccount = User::where('id', $request->User()->id)
								   ->update([
								   	'progress' => 5, 
								   	'ref_num' => $ref_num
								   	]);
		}
	//	}	
		
		$user = $this->applicant->fetchuser($did);
		$contacts = $this->applicant->fetchcontact($did);
		$questions=$this->applicant->questions();
		$institute = $this->applicant->fetchAllInstitute($did);
		$institute2 = $this->applicant->fetchinstitute($did);
		$quals = $this->applicant->fetchquals($did);
		$relexp = $this->applicant->fetchexperience($did);
		$refs = $this->applicant->fetchrefs($did);
		$docs = $this->applicant->fetchdocs($did);
		
	 //	return $questions;
		//return $did;\
		
		return view('dpr.profile',[
				'user'=> $user,
				'contacts'=>$contacts,
				'institute'=>$institute,
			    'professional_quals'=>$quals,
			    'relevant_exp'=>$relexp, 
			    'refs'=>$refs, 
			    'docs'=>$docs,
				'institute2'=>$institute2,
				'questions'=>$questions
			    
		]);
		}
		catch(\Exception $ex) {
			return redirect('/malicious');
		}
	}

	public function appcomplete() {
		return view(dpr.appcomplete);
	}
	
	//finalize -fixed
	public function finalize($id){
		User::where('id',Auth::user()->id)
		->update(['complete'=>1]);
		return response()->json("success");
	}

	public function savecenter(Request $request) {
		$updateCenter = User::where('id', $request->id)
							->update([
								'region'=>$request->region,
								'center'=>$request->center, 
								'altregion'=>$request->aregion,
								'altcenter'=>$request->acenter
							]);
		$enc=Crypt::encrypt($request->id);
		//return $request->id;
		if($request->url!="") {
			return redirect($request->url);
		}
		return redirect('/profile/'.$enc);
	}

	/*
	 * addedd this function on 01/09/2016 
	 * to delete hire eexperience education
	 *
	 */

	public function deleteHireEdu(Request $request, $name) {
		$check=institution::select('sname')
		->where('iname',$name)->first();
		if($check!=""){
			$setinamenull = institution::where('iname', $name)->update(['iname'=>'','course'=>'','degree'=>'','grade'=>'','istart_date'=>'','iend_date'=>'']);	
		}
		else{
		$deletedRow = institution::where('iname', $name)->delete();
		}
    if($request->user()->progress==5){
	 return  redirect('/profile/'.Crypt::encrypt($request->user()->id))->with('message', 'Record was successfully deleted!');
    }
		return redirect('/education')->with('message', 'Record was successfully deleted!');
	}
	//###########################################
	//APPLICANT START TEXT FUNCTION, BY BALLS
	//###########################################
	public function starttest($type,$appid){
		
		$starttest=$this->applicant->starttest($type,$appid);
		return $starttest;
	}
	//submit test
	public function submittest($userid,$questionid,$selectedoption){
     $submitanswer=$this->applicant->submitanswer(['user_id'=>$userid,'question_id'=>$questionid,'selectedoption'=>$selectedoption],$questionid,$selectedoption,$userid);
	return $submitanswer; }
	//completed test
	
	public function completedtest(){
		$complete=$this->applicant->completedtest(Auth::user()->id);
		return 	$complete;
	}
	public function myscore(){
		$myscore=Auth::user()->exam_init;
		return 	$myscore;
	} 
    }
