<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('dpr.index');
});
Route::get('appliedfor/{position}/{id}/{type}', ['middleware'=>'rprogress','uses'=>'ApplicantController@appliedfor']);

Route::auth();

Route::get('/panel' ,'AdminController@panel');
Route::get('/sortapp' ,'AdminController@panel2');
//###############################################
//ANALYTICS Route API
//###############################################
Route::get('/yearlystat/{jobid}' ,'AdminController@yearlystatistics');
Route::get('/passfail/{jobid}' ,'AdminController@passfail');
Route::get('/appperregion/{jobid}' ,'AdminController@appperregion');
Route::get('/getsexstat/{jobid}' ,'AdminController@getsexstat');

Route::get('/sendmassmail' ,'AdminController@massmailing');
Route::get('/appbystate/{jobid}' ,'AdminController@getappstate');


//###############################################
//ANALYTICS Route ENDS
//###############################################
//###############################################
//INITIAL TEXT SUBMISSION
//###############################################
Route::get('/quest/submittest/{userid}/{questionid}/{selectedoption}', 'ApplicantController@submittest');
Route::get('/classified' ,'ApplicantController@completedtest');
//###########################################
//NEWLY ADDED ROUTES BY BALLS
//###########################################
Route::get('/examscore' ,'AdminController@examscore');
//####################################################
//TEST QUESTION
//####################################################
Route::post('/csvupload' ,'AdminController@csvupload');
Route::get('/start/{type}/{appid}' ,'ApplicantController@starttest');
Route::post('/deleteselected' ,'AdminController@deleteselectedquestion');
Route::get('/allquestion' ,'AdminController@allquestion');
Route::get('/myscore' ,'ApplicantController@myscore');

//ajax delete
Route::get('/deletequestion/{id}' ,'AdminController@deletequestion');
Route::post('/updatequestion' ,'AdminController@updatequestion');
Route::get('/search/{name}' ,'AdminController@searchresults');
//####################################################
//TEST QUESTION ROUTE ENDED
//####################################################

//##############################################
//TEST PUSHER
//##############################################
Route::get('/contactus' ,'HomeController@sendmail');

Route::get('/sortapp' ,'AdminController@panel2');


Route::get('/poscat' ,'AdminController@disppostbycat');
Route::get('/deletepos/{id}' ,'AdminController@deletepos');
Route::get('/addposition/{jobcat}/{ref_no}/{title}/{qualreq}/{desc}' ,'AdminController@addposition');
Route::get('/modifypos/{jobcat}/{ref_no}/{title}/{qualreq}/{desc}' ,'AdminController@modifyposition');
Route::post('/decision' ,'AdminController@decision');
Route::get('/download/{id}' ,'AdminController@downloadcv');
Route::get('/searchapp/{state}/{region}/{grade}/{sex}/{age}/{ageto}/{scorefrom}/{scoreto}/{status}' ,'AdminController@search');
Route::get('/login',['middleware=>guest','uses'=> 'HomeController@index']);
Route::get('/export','AdminController@exportexcel');
Route::get('/manageposition','AdminController@manageposition');
Route::post('/registerapplicant', 'HomeController@registerapplicant');
Route::get('/register',['middleware=>guest','uses'=>'HomeController@register']);
Route::get('/logout/rdr', 'HomeController@logout');
Route::get('/available/{cat}',['middleware'=>'rprogress','uses'=>'ApplicantController@availablejobs']);
Route::get('/report','AdminController@report');
Route::get('/tts','HomeController@test');

//some changes made middleware
//dontforget middleware added
Route::get('/jobtype',['middleware'=>['auth', 'rprogress'] ,'uses'=>'ApplicantController@listjobcat']);
Route::get('appliedfor/{position}/{id}/{type}',['middleware'=>['auth', 'progress'] ,'uses'=>'ApplicantController@appliedfor']);
Route::get('addapplicant', 'AdminController@addapplicant');

#################################################3
//start dejiroute
//#################################################
Route::post('/apply', ['middleware'=>'auth', 'uses'=>'ApplicantController@apply']);

Route::get('/contact',['middleware'=>['auth','progress'] ,'uses'=>'ApplicantController@contact']);
Route::get('/finalize/{id}', 'ApplicantController@finalize');

Route::post('/contact', ['middleware'=>'auth', 'uses'=>'ApplicantController@savecontact']);

Route::get('/education',['middleware'=>['auth', 'progress'] ,'uses'=> 'ApplicantController@education']);

Route::post('/education', ['middleware'=>'auth', 'uses'=>'ApplicantController@saveducation']);

###############################################
//added on 24/08/2016
###############################################
Route::post('/bio', ['middleware'=>'auth', 'uses'=>'ApplicantController@bio']);
Route::get('/sendprof', 'ApplicantController@sendprof');

Route::get('/others',['middleware'=>['auth', 'progress'] ,'uses'=> 'ApplicantController@others']);

Route::post('/others_quals', ['middleware'=>'auth', 'uses'=>'ApplicantController@saveothersquals']);

Route::delete('/deletequals/{id}', ['middleware'=>'auth', 'uses'=>'ApplicantController@deletequal']);

Route::post('/others_exp', ['middleware'=>'auth', 'uses'=>'ApplicantController@saveothersexp']);

Route::delete('/deleteexp/{id}', ['middleware'=>'auth', 'uses'=>'ApplicantController@deleteexp']);

Route::post('/others_ref', ['middleware'=>'auth', 'uses'=>'ApplicantController@saveothersref']);

Route::delete('/deleteref/{id}', ['middleware'=>'auth', 'uses'=>'ApplicantController@deleteref']);

Route::get('/profile/{id}', ['middleware'=>'auth', 'uses'=>'ApplicantController@profiledit']);

Route::post('/profile', ['middleware'=>'auth', 'uses'=>'ApplicantController@profile']);

Route::post('/complete', ['middleware'=>'auth', 'uses'=>'ApplicantController@appcomplete']);

Route::post('/savecenter', ['middleware'=>'auth', 'uses'=>'ApplicantController@savecenter']);
//added this other route on 01/09/2016
Route::post('/educationHire', ['middleware'=>'auth', 'uses'=>'ApplicantController@saveHireEducation']);

Route::delete('/deleteHireEdu/{name}', ['middleware'=>'auth', 'uses'=>'ApplicantController@deleteHireEdu']);

Route::post('/editHireEdu', ['middleware'=>'auth', 'uses'=>'ApplicantController@editHireEdu']);

###########################################3
//end deji route
//###########################################################
//PASSWORDRESET Route view
//#############################################################
Route::get('/forgot', 'HomeController@forget');
Route::get('/change', 'HomeController@change');

