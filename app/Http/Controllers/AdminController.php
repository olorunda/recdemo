<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Repositories\Applicant;
use App\Repositories\Register;
use App\Repositories\Excel;
use App\Http\Requests;
use League\Csv\Reader;
use Zipper;
use Redirect;
use Mail;
use File;

class AdminController extends Controller
{
	protected $applicants;
	protected $excel;
	protected $register;
	protected $parsecsv;
    public function __construct(Applicant $applicants, Excel $excel,Register $register){
		
		$this->middleware('auth');
		$this->middleware('role');
		$this->applicants=$applicants;
		$this->register=$register;
		$this->excel=$excel;
	
	}
	//sharepoint report
	public function report(){
		$jobs= \App\available_job::select('id','position')
		->get();
		return view('dpr.report',['jobs'=>$jobs]);
	}
	//admin panelome populated with applicantsdata
	public function panel(Request $request){
		
		if(isset($request->perpage)){
			session(['perpage'=>$request->perpage]);
			
		}
		if($request->session()->has('perpage')){
			$perpage=session('perpage');
		}
		else{
			$perpage=10;
		}
		$alldoc=$this->applicants->alldoc();
		$allapplicants=$this->applicants->allapplicants($perpage);
		$index=1;
			//return $allapplicants;
		return view('dpr.panel',['applicants'=>$allapplicants,'index'=>$index,'alldoc'=>$alldoc]);
		

	}

	//EXAM SCORES
	public function examscore(Request $request){
		//QUITE EMBARASSING THAT I KEEP REPEATING THIS, JUST LAZY ..NEVER MIND
		    if(isset($request->perpage)){
			session(['perpage'=>$request->perpage]);
			
		}
		if($request->session()->has('perpage')){
			$perpage=session('perpage');
		}
		else{
			$perpage=10;
		}
		
		
		$getexamscore=$this->applicants->allapplicants($perpage,1);
	
		$index=1;
		return view('dpr.examscore',['applicants'=>$getexamscore,'index'=>$index]);
		
		
	}
	
//in house sorting

	public function panel2(Request $request){
    
    if(isset($request->perpage)){
			session(['perpage'=>$request->perpage]);
			
		}
		if($request->session()->has('perpage')){
			$perpage=session('perpage');
		}
		else{
			$perpage=10;
		}
		$alldoc=$this->applicants->alldoc();
		$allapplicants=$this->applicants->allapplicants2($perpage);
	
		$index=1;
		return view('dpr.inhouseapp',['applicants'=>$allapplicants,'index'=>$index,'alldoc'=>$alldoc]);
		


	}




	
	//mass approve applicants or not
	public function decision(Request $request){
	##########################################33
	###########################################
	//approve reject
	
	#######################################
	//the email value of checkbox array
	//individual accept
	if($request->ajax()){
		$select=$request->select;
		$aprrovereject=$this->applicants->approvereject($select,$request->approval,$request->type);
			if($aprrovereject=="1"){
			if($request->approval=="1"){
				//send congrat email
				if($request->type==0){
				$data=['email'=>trim($select)];
			
			Mail::later(20,'email.approved',$data,function($message) use($data){
			$message->from('info@dpronline.com','DPRJobPortal');
			$message->to($data['email'],'Applicant')->subject('Congratulations');	
			});
		      }
			}
			else{
				if($request->type==0){
				$data=['email'=>trim($select)];
			
				Mail::later(20,'email.rejected',$data,function($message) use($data){
			$message->from('info@dpronline.com','DPRJobPortal');
			$message->to($data['email'],'Applicant')->subject('Sorry!!');	
			});
			}
			}
			
				
				//send email to user 
			}
			else{
			
		return response()->json('0');	
	
			}
return response()->json('1');	
				
	}
	
	
	//mass accept applicants
	if(!isset($request->select)){
			return redirect('/panel');
	}
		foreach($request->select as $select){
			
			$aprrovereject=$this->applicants->approvereject($select,$request->approval,$request->type);
			if($aprrovereject=="1"){
			if($request->approval=="1"){
				//send congrat email
				if($request->type==0){
				$data=['email'=>trim($select)];
			
			Mail::later(15,'email.approved',$data,function($message) use($data){
			$message->from('info@dpronline.com','DPRJobPortal');
			$message->to($data['email'],'Applicant')->subject('Congratulations');	
			});
		    }
			}
			else{
				if($request->type==0){
				$data=['email'=>trim($select)];
			
				Mail::later(15,'email.rejected',$data,function($message) use($data){
			$message->from('info@dpronline.com','DPRJobPortal');
			$message->to($data['email'],'Applicant')->subject('Sorry!!');	
			});
			}
			}
			
				
				//send email to user 
			}
			else{
				if($request->ajax()){
		return response()->json('0');	
		}
		if($request->type==0){
			return redirect('/sortapp');
		}
				return Redirect::back();
				//return Request::server('HTTP_REFERER');
			}
			
		}
		if($request->ajax()){
		return response()->json('1');	
		}
		if($request->type==0){
			return redirect('/sortapp');
		}
		return Redirect::back();
		//##############################################
		
	}
	
	//export data to excel
	public function exportexcel(Request $request){
		
		$excel=$this->applicants->toexcel($request->region,$request->center);
	     
		return $excel;
		
}

//manage job postings
public function manageposition(){
	
	$allpositions=$this->applicants->availablejob('all');
	$index=1;
	
	return view('dpr.managepos',['allpos'=>$allpositions,'index'=>$index]);
}

public function disppostbycat(Request $request){
	
	$posbycat=$this->applicants->availablejob($request->poscat);
	$index=1;
	return view('dpr.managepos',['allpos'=>$posbycat,'index'=>$index]);

}
	

//add positions
public function addposition($jobcat,$ref_no,$title,$qualreq){
	$addposition=$this->applicants->addposition(['ref_no'=>$ref_no,'position'=>str_replace('-', '/',$title),'qualification'=>str_replace('-', '/',$qualreq),'type'=>str_replace('-', '/',$jobcat)]);
	
	return $addposition;
	
}		

//delete positon
public function deletepos($id){
	
	$deletepos=$this->applicants->deletepos($id);
	return $deletepos;
}

	//modify positon
	public function modifyposition($jobcat,$ref_no,$title,$qualreq){
	$modifyposition=$this->applicants->modifyposition(['ref_no'=>$ref_no,'position'=>$title,'qualification'=>$qualreq,'type'=>$jobcat]);
	
	return $modifyposition;
	
}

//route to add applicants
public function addapplicant(){
	$allpositions=$this->applicants->availablejob('all');
	
	return view('dpr.addapplicant',['jobs'=>$allpositions]);
}

public function massmailing(Request $request){
	

	$sendmail=$this->applicants->massmail($request->message,$request->choice);
	return $sendmail;
}

//###############################################
//BEST WAY TO HANDLE THIS
//###############################################
//download cv
public function downloadcv ($docid){
	
	try{
	$downloadcv=$this->applicants->downloadcv($docid)->first();
	//return $downloadcv;	
		return response()->download(public_path('upload/profiles/').trim($downloadcv->document));

		
		
		
	}
	
	
	catch(\Exception $ex){
		return $ex;
		//redirect('/panel');
	}
}
//###############################################
//BEST WAY TO HANDLE THIS
//###############################################

//search and sort

public function search($state,$region,$grade,$sex,$age,$ageto,$scorefrom,$scoreto,$status){
	$searchresult=$this->applicants->search(['state'=>$state,'fromage'=>$age,'toage'=>$ageto,'region'=>$region,'grade'=>$grade,'sex'=>$sex,'scorefrom'=>$scorefrom,'scoreto'=>$scoreto,'status'=>$status]);
	$index=1;
	$alldoc=$this->applicants->alldoc();
		return view('dpr.panel',['applicants'=>$searchresult,'index'=>$index,'message'=>'show','alldoc'=>$alldoc]);
		
}
//##################################################
//ANALYTICS FUNCTION
//##################################################
//get total applicants datas yearl applied
public function yearlystatistics($jobid){
	$date=date('Y');

	for($i=2016; $i<=$date; $i++){
		
		$getcount=$this->applicants->yearlystaistics($i,$jobid);
		$allstat[]=['year'=>"{$i}",'value'=>$getcount];
		
	}
	
	return $allstat;
}

//get pass and fail yearly statistics
public function passfail($jobid){
	$date=date('Y');
		for($i=2016; $i<=$date; $i++){
	
	    $pass=$this->applicants->passfail($i,$jobid);
	     $allperf[]=[$i=>$pass];
		}

		foreach($allperf as $prefs){
			foreach($prefs as $key=>$pref){
			$finalperf[]=['x'=>"{$key}",'y'=>$pref[0],'z'=>$pref[1]];
		}
		}
		return $finalperf;
}

//get applicants per region yearly stat
public function appperregion($jobid){
	$date=date('Y');
	for($i=2016; $i<=$date; $i++){
	$allregion =$this->applicants->appperregion($i,$jobid);
	$region[]=[$i=>$allregion];
	}
   
	//return $region;
	foreach($region as $specyears){
		foreach ($specyears as $key=>$specyear){
	$yearly[]=['x'=>"{$key}",'y'=>$specyear[0],'z'=>$specyear[1],'a'=>$specyear[2],'j'=>$specyear[3]];
	
		}
	}
	return $yearly;
}

//get male female applicants yearly data
public function getsexstat($jobid){
	$date=date('Y');
	
	for($i=2016; $i<=$date; $i++ ){
		
		$getstat=$this->applicants->yearlysexstat($i,$jobid);
		$allsexstat[]=[$i=>$getstat];
	}
	
//return $allsexstat;
	foreach($allsexstat as $stat){
		
		foreach($stat as $key=>$realstat){
			
		$yearlysexstat[]=['period'=>"{$key}",'Male'=>$realstat[0],'Female'=>$realstat[1]];
		
		}
	}
	return $yearlysexstat;
	
}

//#######################################
//ADAPTED ROM OWOSO CBT
//#########################################
	public function csvupload(Request $request){
	
/**	$csv = new \App\Repositories\parseCSV();


# Parse '_books.csv' using automatic delimiter detection...
		$csv->auto($request->file('file')->getRealPath());
foreach ($csv->data as $key => $row): 
	foreach ($csv->data as $key => $newquestion){
			//return $row['question'];
			$createandgetid=$this->applicants->createquestion(['content'=>$newquestion['question']]);
		$optioncreate=$this->applicants->createoption(['question_id'=>$createandgetid,'option1'=>$newquestion['option1'],'option2'=>$newquestion['option2'],'option3'=>$newquestion['option3'],'option4'=>$newquestion['option4'],'correctoption'=>$newquestion['answer']]);
		$correctoptioncreate=$this->applicants->createcorrect(['question_id'=>$createandgetid,'correctoption'=>$newquestion['answer']]);
		
		}

**/
	//#############################
	//testing 123
	//#############################
	
	//validate input
	$this->validate($request,['file' => 'required']);
	
	
	
	//manage upload of csv question
	if($request->file('file')->getClientOriginalExtension() !='csv'){
		$request->session()->flash('class','alert-danger');
		return redirect('/allquestion')->with('notcsv',1);
	  }
 
		try{
		
	        $reader = Reader::createFromPath($request->file('file')->getRealPath());
			$keys = ['question', 'option1','option2','option3','option4','answer'];

			$results = $reader->fetchAssoc($keys);
			foreach ($results as $newquestion) {
				$createandgetid=$this->applicants->createquestion(['content'=>$newquestion['question']]);
		$optioncreate=$this->applicants->createoption(['question_id'=>$createandgetid,'option1'=>$newquestion['option1'],'option2'=>$newquestion['option2'],'option3'=>$newquestion['option3'],'option4'=>$newquestion['option4'],'correctoption'=>$newquestion['answer']]);
		$correctoptioncreate=$this->applicants->createcorrect(['question_id'=>$createandgetid,'correctoption'=>$newquestion['answer']]);
		
			
			}
		$request->session()->flash('class','alert-success');
		return redirect('/allquestion')->with('notcsv',2);
			}
		catch(\Exception $ex){
		return redirect('/allquestion')->with('notcsv',3);
			
		}
	
}


//#######################################################
//CSV IMPORT ENDS
//#######################################################
//display all questions functions
//##############################
//update question
	       public function updatequestion(Request $request){
//	 return $request->answer;
			$data1=['content'=>$request->question];
			$data2=['option1'=>$request->option1,'option2'=>$request->option2,'option3'=>$request->option3,'option4'=>$request->option4,'correctoption'=>$request->answer];
			$data3=['correctoption'=>$request->answer];
			
			/**
			 $data1=['content'=>'jkbfhdfgjdsthisiidghs'];
			$data2=['option1'=>'gfgsrg','option2'=>'faewrrrfer','option3'=>'dfdfefew','option4'=>'dwwffefe'];
			$data3=['correctoption'=>3]; **/
		$modifiedquest=$this->applicants->updatequestion($data1,$data2,$data3,$request->id);
		
		return $modifiedquest;
		
		
	}



public function allquestion(){
	
	$questions=$this->applicants->allquestions();
	//return $questions;
	
	return view('question.allquestion',['questions'=>$questions]);
     }
	 
    //delete question individual//ajax
	public function deletequestion($id)
	{
		$deletequestion=$this->applicants->deletequestion($id);
		return $deletequestion;
	}
	
	//delete selected
	public function deleteselectedquestion(Request $request){
	if($request->questions==""){
		
		return Redirect::back();
	}
	foreach($request->questions as $question){
		//return $question;
		$deletequestion=$this->applicants->deletequestion($question);
		//return $deletequestion;
	}
	
	return Redirect::back();
	
   }
   
//#######################################################
//CSV IMPORT ENDS
//#######################################################

//get applicants by state
public function getappstate($jobid){
	
	$appbystate=$this->applicants->appbystate($jobid);
	return $appbystate;
}

//################################
//ANALYTICS INSIGHT API DONE , WOULD ADD DAILY LATER
//################################

//##########################################
//PUSHER TESTING
//############################################
public function testpusher(){
	

    $pusher = App::make('pusher');
		//$yearly=self::yearlystatistics();
    $pusher->trigger( 'chart-channel',
                      'chart-event', 
						$yearly);

    return view('pushertest');

}

public function searchresults($name){
$searchresult=$this->applicants->searchresults($name);

$index=1;
	$alldoc=$this->applicants->alldoc();
		return view('dpr.panel',['applicants'=>$searchresult,'index'=>$index,'message'=>'show','alldoc'=>$alldoc]);
	
}

public function sendmail(){
	
	$data=['email'=>'sankeyed@outlook.com','Edward'];
	   Mail::send('email.campaign',$data,function($message) use($data){
			$message->from('olaoluwa@snapnet.com.ng','Sankey');
			$message->to($data['email'],'Applicant')->subject('Email Campaign');	
			});
			return "success";
} 


	
}
