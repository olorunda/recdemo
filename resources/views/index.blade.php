<! DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Department of Petroleum Resources (D.P.R.)</title>

    <meta name="keywords" content="">


    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/morris.css')}}"> 


    <!--
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    -->

    <!-- Css animations  -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
   <script src="{{asset('js/sweetalert.min.js')}}"></script>
   <script src="{{asset('js/nprogress.js')}}"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/twitter.css')}}">
   <link rel="stylesheet" href="{{asset('css/print.css')}}" type="text/css" media="print" />
   <link rel="stylesheet" href="{{asset('css/morris.css')}}" type="text/css" media="print" />
    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="{{asset('css/style.green.css')}}" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('css/nprogress.css')}}" rel="stylesheet">
	<style>
	#nprogress .bar {
		height:2px;
	}
	

	
	</style>

    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
   
	 <link type="text/css" rel="stylesheet" href="{{asset('css/dropzone.min.css')}}">
    <!-- owl carousel css -->

    <link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.theme.css')}}" rel="stylesheet">
	<style>
	
	@if(Auth::guest())
		
	@else
		
			
		@if(Auth::user()->type=="1")
			@else
	@if(Auth::user()->complete=="1")
	.btn-success,.btn-danger,.btn-primary,.btn-info{
		display:none;
	}
	@endif
	@endif
	@endif
	
	
	.col-md-3{
		margin-left:0px;
	}
::-webkit-scrollbar {
    width: 5px;
}
.adminimg{
	height:70%;
	width:70%;
	margin:20px;
	} 

::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
   // border-radius: 10px;
}
 
::-webkit-scrollbar-thumb {
    //border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px #6aae7a; 
	background-color:rgb(106, 174, 122);
}

::-moz-scrollbar {
    width: 5px;
}

::-moz-scrollbar-track {
    -moz-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
   // border-radius: 10px;
}

::-moz-scrollbar-thumb {
    //border-radius: 10px;
    -moz-box-shadow: inset 0 0 6px #6aae7a; 
    background-color:rgb(106, 174, 122);
}

::-scrollbar {
    width: 15px;
}
::-scrollbar-track {
    -box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
   // border-radius: 10px;
}

::-scrollbar-thumb {
    //border-radius: 10px;
    box-shadow: inset 0 0 6px #6aae7a; 
    background-color:rgb(106, 174, 122);
}


	
	</style>
	
</head>

<body style="background:url('{{asset('img/bg.png')}}')" onload="">

    <div id="all">



            <!-- *** NAVBAR ***
    _________________________________________________________ -->
		
            <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

                <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                    <div class="container">
                        <div class="navbar-header">

                            <a class="navbar-brand home" href="/">
                                <img src="{{asset('img/logo_res.png')}}" alt="DPR LOGO"  id="logo">
                                
                                </span>
                            </a>
                            <div class="navbar-buttons">
                                <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                    <span class="sr-only">Menu</span>
                                    <i class="fa fa-align-justify"></i>
                                </button>
                            </div>
                        </div>
                        <!--/.navbar-header -->

                        <div class="navbar-collapse collapse" id="navigation">

                            <ul class="nav navbar-nav navbar-right">
                               
                                    <li class="{{ active('/') }}">
                                        <a href="{{url('/')}}">&nbsp;Home&nbsp;</a>
                                    </li>
                                 
								    @if(Auth::guest())
                                    <li class="{{ active('register') }}">
                                        <a href="{{url('/register')}}">&nbsp;Register&nbsp;</a>
                                    </li>
                                    <li class="{{ active('login') }}">
                                        <a href="{{url('/login')}}">&nbsp;Log In&nbsp;</a>
                                    </li>
									 <li >
                                        <a style="cursor:pointer" data-toggle="modal" data-target="#contactus">&nbsp;Contact Us&nbsp;</a>
                                    </li>
									@else
									@if(Auth::user()->type=="1")	
                                    <li class="{{ active('panel') }}">
                                        <a href="{{url('panel')}}" >&nbsp;Admin&nbsp;</a>
                                    </li>
									@endif
									@if(Auth::user()->progress=="5" && Auth::user()->type=="0")
									  <li class="{{ active('profile/*') }}">
                                        <a href="{{url('profile')}}/{{Crypt::encrypt(Auth::user()->id)}}">&nbsp;Profile&nbsp;</a>
                                    </li>
                                    @else
                                    @if(Auth::user()->type==1)
                                    @else
                                    	 <li class="{{ active('jobtype') }}">
                                        <a href="{{url('jobtype')}}">&nbsp;Profile&nbsp;</a>
                                    </li>
                                    @endif
									@endif
									<li >
                                        <a href="{{url('/logout')}}">&nbsp;Logout&nbsp;</a>
                                    </li>
							 @endif
                            </ul>

                        </div>
                        <!--/.nav-collapse -->



                        <div class="collapse clearfix" id="search">

                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">

                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

                </span>
                                </div>
                            </form>

                        </div>
                        <!--/.nav-collapse -->

                    </div>


                </div>
                <!-- /#navbar -->

            </div>
			
<div id="contactus" class="modal fade" role="dialog" style="">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Contact Us</h4>
      </div>
      <div class="modal-body">
        <form id="ctus">
		<h4>Name</h4>
		<input type="text" class="form-control" id="ctname" required />
		<h4>Email</h4>
		<input type="email" class="form-control" id="ctemail" required />
		<br><h4>Subject</h4>
		<input type="text" class="form-control" id="ctsubject" required />
		<b>
		<h4>Message</h4>
		<textarea required class="form-control" id="ctmessage" placeholder="Enter a message .." style="height:200px;" ></textarea> 
		<br>
		<button class="btn btn-md btn-success" id="ctsendmail" ><i class="fa fw fa-envelope"></i>Send</button> or Call:<B class="text-warning">070XXXXXXXXX</b>
			
			</form>
			
			
			
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
			
			
			
<div id="quickmail" class="modal fade" role="dialog" style="">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Send Mass Mail</h4>
      </div>
      <div class="modal-body">
        <form action="export" method="get">
		<h4>Applicants Category</h3>
		<select  class="form-control" id="choice" >
		<option value="1">Approved</option>
		<option value="2">Rejected</option>
		</select>
		<br>
		<h4>Message Content</h3>
		<textarea class="form-control" id="messagetext" placeholder="Enter a message .." style="height:200px;" ></textarea> 
		<br>
		<button class="btn btn-md btn-success" id="sendmail" ><i class="fa fw fa-envelope"></i>Send Mail</button>
			
			</form>
			
			
			
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

            <!-- *** NAVBAR END *** -->
         @yield('content')

<!-- *** COPYRIGHT ***
_________________________________________________________ -->
	<!-- *** COPYRIGHT ***
_________________________________________________________ -->
	<script src="{{asset('js/jquery.js')}}" ></script>
	 <script src="{{ asset('js/timer.jquery.js') }}"></script>
	 
	@if(Auth::guest())
		@elseif(Auth::user()->type=="1")

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	    <script src="{{asset('js/raphael-min.js')}}"></script>
	    <script src="{{asset('js/morris.min.js')}}"></script>

	@else
	
	@endif
	<script src="{{asset('js/jquery-barcode.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <script src="{{asset('js/jquery.cookie.js')}}"></script>
    <script src="{{asset('js/waypoints.min.js')}}"></script>
	<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('js/jquery.parallax-1.1.3.js')}}"></script>
	<script>
	function submit2(id){
		swal({   title: "Are you sure?",
		text: "You are about to Submit Your Application, You wont be able to edit your application once submitted",  
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Yes, Submit it!", 
		cancelButtonText: "No, cancel!",  
		closeOnConfirm: false,  
		closeOnCancel: false },
		function(isConfirm){  
		if (isConfirm) {     
		
		$.get('/finalize/'+id,function(data,status,xhr){
			
			if(data=="success"){
				swal("Success", "You have successfully Submitted your Application", "success");  
				setInterval(function(){
					
					window.location.reload();
					
				},2000);
			}
			
		});
			
		   } 
		else {     swal("Cancelled", "Submission Cancelled", "error");   } });
		
		
	}
	//modify position
	function modifypos(id){
	
	var jobcat=$('#jobcat'+id).val();
	var jobcat=jobcat.replace('/','-');
	var ref_no=$('#ref_no'+id).val();
	//var ref_no=ref_no.replace('/;
	var title=$('#title'+id).val();
	var title=title.replace('/','-');
	var qualreq=$('#qualificationrequired'+id).val();
	var qualreq=qualreq.replace('/','-');
	var desc=$('#description'+id).val();
	var desc=desc.replace('/','-');
	
	$.get('/modifypos/'+jobcat+'/'+ref_no+'/'+title+'/'+qualreq+'/'+desc,function(data,status,xhr){
		if(data=="1"){
		swal("success", "Position Successfully updated", "success");
				window.location.reload();
				
		}
		else{
		swal("Error", "Some Error Occurred", "error");	
		}
	
});
		
		
		
	}
	
	//show after three clicks
	/**	function advert(){
			
	if(sessionStorage.getItem('count')==undefined){
		sessionStorage.setItem('count',1);
	
	}
	else{
		var count=parseInt(sessionStorage.getItem('count')) + 1;
		 sessionStorage.setItem('count',count);
		var counttimes=sessionStorage.getItem('count');
		
		if(counttimes>=3){
		sessionStorage.setItem('count',0);
	
		swal({   title: "Department of Petroleum Resources",  
		text: "<span style='font-size:20px;'>This Portal is designed By <b><a href='http://www.snapnet.com.ng'>Snapnet Limited.</a></span><br><span style='text-align:center'><img src='{{asset('img/snapnet.png')}}'> </span>",  
		html: true });
		
	}
		
	}
		} **/
		
		//send as email
		//##########################################################################
		//SEND SLIP LINK AS EMAIL
		//##########################################################################
		function sendmail(){
			$.get('/sendprof',function(data,status,xhr){
				
				if(data=="1"){
					
					swal('success','Exam slip successfully sent','success');
				}
				else{
					swal('Error','unable to deliver email','error');
			
				}
				
			});
			
		}
		
	function searchname(){
		searchhstring=$('#examnum').val();
		searchhstring=searchhstring.replace('/','-');
		console.log(window.location);
		window.location=window.location.origin+'/search/'+searchhstring;
	}
		
		//password-login
		//##########################################################################
		//PASWORD VALIDATION CLASS
		//##########################################################################
		function passwordval(){
			pswd=$('#password-login').val();
			confirmpswd=$('#password-login').val();
			if ( pswd.match(/[A-z]/) &&  pswd.match(/[A-Z]/) && pswd.match(/\d/) ) {
				if(pswd.length>=6){
		    $('#help').html('');
		  	$('#enabled').show();
		  	$('#disabled').hide();
	
				}
            } else {
		$('#enabled').hide();
		$('#disabled').show();
	    $('#help').html('Password must contain at least one uppercase,one lowercase,one number and must be at least six characters');
  
         }

	
		}
  //##########################################################################
  //PASWORD VALIDATION ENDS
  //##########################################################################
	
		
		//add applicant
	function addapplicant(){
		
	//	$('#adminreg').click(function(){
		//event.preventDefault();
	var firstname=$('#f_name').val();
	var lastname=$('#l_name').val();
	
	var email=$('#email').val();
	var phonenum=$('#phonenum').val();
	var password=$('#password').val();
	
	var jobid=$('#jobid').val();
	var token=$('#token').val();
	if(firstname==""||lastname==""||email==""||phonenum==""||password==""||jobid==""){
			return swal('Error','Please fill all fields','error');

	}
	if(password.length < 6){
		return swal('Error','Password Must be at least six characters long','error');
	}
	//alert(jobid);
	$.post('/registerapplicant',{
		first_name:firstname,
	    last_name:lastname,
		email :email,
		jobid :jobid,
		password:password,
		password_confirmation:password,
		phone_number:phonenum,
		_token:token
		
	},function(data,status,xhr){
			$("#error").html(data);
		if(data=="success"){
	

swal({   title: "Applicant successfully added",   
			text: "<span style='font-size:15px'>You have successfully added applicant</span>",  
			html: true });

window.setTimeout(function() {
    window.location.href = '/jobtype';
}, 2000);
		}
		else{
			//$("#error").html(data);
			//return alert(data);
		swal('Error','Some Error Occurred','error');
	
		}

	});
	

	
	//});

	}
//submit answer
function submit(){
	
	
		sessionStorage.setItem('started',0);
	var	questionid1=$('#questid1').val();
	var	questionid2=$('#questid2').val();
	var	questionid3=$('#questid3').val();
	var	questionid4=$('#questid4').val();
	var	questionid5=$('#questid5').val();
	
	var	selectedoption1=$('input[name=option'+questionid1+']:checked').val();
	var	selectedoption2=$('input[name=option'+questionid2+']:checked').val();
	var	selectedoption3=$('input[name=option'+questionid3+']:checked').val();
	var	selectedoption4=$('input[name=option'+questionid4+']:checked').val();
	var	selectedoption5=$('input[name=option'+questionid5+']:checked').val();
	var	insertquestion=[{question1:{ 
	question:questionid1,
	option:selectedoption1
	},
	question2:{
	question:questionid2,
	option:selectedoption2
	},
	question3:{
	 question:questionid3,
	option:selectedoption3
	},
	question4:{
		question:questionid4,
		option:selectedoption4
	},
	question5:{
		question:questionid5,
		option:selectedoption5
	}}];
		
    $.each(insertquestion,function(index,element){
		submitstudentanswer(element.question1.question,element.question1.option);
		submitstudentanswer(element.question2.question,element.question2.option);
		submitstudentanswer(element.question3.question,element.question3.option);
		submitstudentanswer(element.question4.question,element.question4.option);
		submitstudentanswer(element.question5.question,element.question5.option);
		$.get('/classified',function(data,status,xhr){
			console.log(data);
			if(data==1){
				swal('success','text Submitted','success');
					uicond();
			}
			else{
				//i hope this condition does not exist
				swal('error','Unable to submit test Please Try again','error');
			}
			
		});
		
	});	
	
	
}	
	
	//submit student answer function
	function submitstudentanswer(questionid,selectedoption){
		
		//var userid=$('#userid').val();

	@if(Auth::guest())
	@else

	$.get('/quest/submittest/'+{{Auth::user()->id}}+'/'+questionid+'/'+selectedoption,function(data,status,xhr){
		
		if(data=='failure'){
			
		 swal("Error", "Some Unknow error occured :)", "error"); 
		}
	
		
	});
	@endif
		
		
	}
	function uicond(){
		
		$('#scorepanel').show(1000);
			$('.panel-heading').html("<b>Test Completed</b>");
		$('#textpanel').hide(1000);
		$('#infopanel').hide(1000);
		$('#scorepanel').show(1000);
		$('#start').hide(1000);
		$('#close').show(1000);
		$('#submit').hide(1000);
		$.get('/myscore',function(data,status,xhr){
			console.log(data);
			var percent=Math.round((data/5)*100);
			$('#myscore').text(percent+'%');
		});
	}
	
	$(function(){
		@if(is_active('report'))
		 $('#reporttype').select2();
		 @endif
		$('#ctus').submit(function(){
			event.preventDefault();
			var name=$('#ctname').val();
			var email=$('#ctemail').val();
			var message=$('#ctmessage').val();
			var subject=$('#ctsubject').val();
			
			$.get('/contactus?name='+name+'&email='+email+'&message='+message+'&subject='+subject,function(data,status,xhr){
				
				if(data==1){
				return	swal('Success','We Would Contact You Soon','success');
				}
				return  swal('Error','Some Error Occured, Please Try Again Later','error');
				
			});
			
		});
		
		  $(document).on("contextmenu",function(e){
        if(e.target.nodeName != "INPUT" && e.target.nodeName != "TEXTAREA")
             e.preventDefault();
     });
			@if(Auth::guest())
	@else

	sessionStorage.setItem('started',0);
		@if(Auth::user()->textcomplete==1)
			uicond();
			
		@else
			
		$('#scorepanel').hide(1000);
		$('#close').hide(1000);
		$('#submit').hide();
			@endif
			@endif
	//	if()	
			@if(Auth::guest())
	@else

		@if(Auth::user()->textcomplete==1)
			@else
   if(sessionStorage.getItem('started')==1){
	$(window).on('beforeunload',function(){
		
		
	

	submit();
	  $.get('/start/1/{{Auth::user()->id}}',function(data,status,xhr){

	swal('Success','Test Submitted Successfully','success');
	});
	

	
		});
		}
		@endif
		@endif
		
			$('#textpanel').hide();
			$('#start').show();
			$('#sendmail').click(function(){
				event.preventDefault();
				var message=$('#messagetext').val();
			   var choice=$('#choice').val();
			   //return alert(message);
				$.get('/sendmassmail?message='+message+'&choice='+choice,function(data,status,xhr){
					
					if(data=="success"){
						return swal('success','Mail Successfully Sent','success');
					}
					return swal('error','Unable to complete request','error');
					
				});
				
			});
		
		//newly added
		 $('#aregion').change(function(){
			 
			 if($('#aregion').val()=="Abuja"){
				 $('#acenters').html('<option value="center1">Abuja</option>');
				 
			 }
			else if($('#aregion').val()=="Portharcourt"){
				 $('#acenters').html('<option value="center1">Portharcourt</option>');
				
			}
			else if($('#aregion').val()=="Lagos"){
				 $('#acenters').html('<option value="unilag">Unilag</option>');
				
			}
			
			else {
				 $('#acenters').html('<option value="center1">Kano</option>');
				
			}
			
		
		  
	  });

		 $("#odegreeadd").hide();

                $("#idegree").change(function() {
                    $deg = $("#idegree").val();
                    if($deg=="others") {
                        $("#odegreeadd").show("fast");
                    } else {
                        $("#odegreeadd").hide("fast");
                    }
                });

		
		@if(session('messagepre'))
			swal('Warning','{{session("messagepre")}}','warning');
		@endif
		$('#enabled').hide();
			//this was added to hide and show maiden name field depending on the sex of the user
		if($("#sex").val()=="M") {
				$("#maiden").hide("fast");
			} else {
				$("#maiden").show("fast");
			}
		$("#sex").on("change", function() {
			if($("#sex").val()=="M") {
				$("#maiden").hide("fast");
			} else {
				$("#maiden").show("fast");
			}
		});
		//============================================================
		//MORRIS CHART PLUGIN ADDED
		//=============================================================
	
			@if (is_active('report'))
			
 
   function appperregion(){
   $.get('/appperregion/0',function(data,status,xhr){
	 liveregion=Morris.Bar({
  element: 'appregion',
  data:data,
  xkey: 'x',
  ykeys: ['y', 'z', 'a' , 'j'],
  labels: ['Abuja', 'Kano', 'Lagos','Portharcourt'],
  barColors: ['#6aae7a','red','yellow','blue']

}).on('click', function(i, row){
  console.log(i, row);
});  
	   
   });
   }
   
  
appperregion();
sexstat();
yearstat();
passfail();
appbystate();

//refresh anallytics data

   
function sexstat(){
$.get('/getsexstat/0',function(data,status,xhr){
	
	liveupdate=Morris.Bar({
  element: 'examstat2',
  data: data,
  xkey: 'period',
  ykeys: ['Male', 'Female'],
  labels: ['Male', 'Female'],
  barColors: ['#6aae7a','blue'],
  xLabelAngle: 60

});
});
}



function appbystate(){

$.get('/appbystate/0',function(data,xhr,status){
	
	donut=Morris.Donut({
  element: 'graph',
  data:data,
  formatter: function (x, data) { return data.formatted; },
  colors: [
    '#0BA462',
    '#39B580',
    '#67C69D',
    '#95D7BB',
  ]

});	
	
});

}
$('#refresh').click(function(){
	
	
	dataautoupdate();
	
});

$('#reporttype').change(function(){
	var jobid=$('#reporttype').val();
	
	dataautoupdate(jobid);
	
});

	@if (is_active('report'))


function dataautoupdate(jobid=0){
	$.get('/appbystate/'+jobid,function(data,status,xhr){
	donut.setData(data);
	});
	
	$.get('/getsexstat/'+jobid,function(data,status,xhr){
	liveupdate.setData(data);
	});
	
	$.get('/yearlystat/'+jobid,function(data,status,xhr){
		liveyear.setData(data);
	});
	
	$.get('/passfail/'+jobid,function(data,status,xhr){
		livepassfail.setData(data);
	});
	
	
	$.get('/appperregion/'+jobid,function(data,status,xhr){
		liveregion.setData(data);
	});
	}

//live update
setInterval(function(){
	
	dataautoupdate();
	
},60000*5);
@endif
//live update ends


function yearstat(){
$.get('/yearlystat/0',function(data,status,xhr){
    liveyear=Morris.Line({
  
  element: 'examstat',
  data: data,
  xkey: 'year',
  ykeys: ['value'],
  labels: ['Value'],
  lineColors:['#6aae7a']
});
	
});
}
	
function passfail(){	
$.get('/passfail/0',function(data,status,xhr){
	
	livepassfail=Morris.Bar({
  element: 'bar',
  data:data,
  xkey: 'x',
  ykeys: ['y', 'z'],
  labels: ['Pass', 'Fail'],
  barColors: ['#6aae7a','red']
}).on('click', function(i, row){
  console.log(i, row);
});

});

}


	


//============================================================
//MORRIS CHART PLUGIN ADDED
//=============================================================


@endif
	
		@if(session('regsuccess')=="success")
				 
				 swal('Successfull','Registration Successfull','success');
				 setInterval(function(){
				 window.location="/login";
				 },3000);
	
		 @endif
		//search applicant
			@if(Auth::guest())
		@else
			@if(isset($user->ref_num))
		$("#demo").barcode(
		  	"{{$user->ref_num}}", // Value barcode (dependent on the type of barcode)
		  	"code128" // type (string)
		);
		@endif
		@endif
			
		 $('#region').change(function(){
			 
			 if($('#region').val()=="Abuja"){
				 $('#centers').html('<option value="center1">Abuja</option>');
				 
			 }
			else if($('#region').val()=="Portharcourt"){
				 $('#centers').html('<option value="center1">Portharcourt</option>');
				
			}
			else if($('#region').val()=="Lagos"){
				 $('#centers').html('<option value="unilag">Unilag</option>');
				
			}
			
			else {
				 $('#centers').html('<option value="center1">Kano</option>');
				
			}
			
		
		  
	  });

		 $("#odegreeadd").hide();

                $("#idegree").change(function() {
                    $deg = $("#idegree").val();
                    if($deg=="others") {
                        $("#odegreeadd").show("fast");
                    } else {
                        $("#odegreeadd").hide("fast");
                    }
                });

                $("#eodegreeadd").hide();

                $("#eidegree").change(function() {
                    $deg = $("#eidegree").val();
                    if($deg=="others") {
                        $("#eodegreeadd").show("fast");
                    } else {
                        $("#eodegreeadd").hide("fast");
                    }
                });

                //grade
                $("#ogradeadd").hide();

                $("#oigrade").change(function() {
                    $grad = $("#oigrade").val();
                    if($grad=="8") {
                        $("#ogradeadd").show("fast");
                    } else {
                        $("#ogradeadd").hide("fast");
                    }
                });

                $("#eogradeadd").hide();

                $("#eoigrade").change(function() {
                    $grad = $("#eoigrade").val();
                    if($grad=="8") {
                        $("#eogradeadd").show("fast");
                    } else {
                        $("#eogradeadd").hide("fast");
                    }
                });

		//record perpage
		 $('#perpage').change(function(){
		  var perpage=$('#perpage').val();
		$.get('/panel?perpage='+perpage,function(data,status,xhr){
			window.location.reload();
		}); 
		
	  });
	//alert('sss');
	  //dj js/bootstrap
	  @if(Auth::guest())
		  
	  @elseif((is_active('/')))
		  @else
	  @if(Auth::user()->type=="0")
	  	
	    Dropzone.autoDiscover = false;
                var myDropzone = new Dropzone("#my-dropzone",{
                
                url:'/apply',
                autoProcessQueue:false,
                acceptedFiles:'image/*',
                uploadMultiple:false,
                maxFiles:1,
                dictDefaultMessage:"Drag a Profile Picture Here",
                addRemoveLinks:'dictCancelUpload',
                parallelUploads:1,
                dictInvalidFileType:"Profile Picture Must Be An Image",
                maxFilesize:0.0642,
                dictFileTooBig: 'Warning: Image is Larger than 62kb'

                });
                myDropzone.on("sending", function(file,xhr,formData) {
                    formData.append("id", $("#id").val());
                    formData.append("middle_name", $("#middle_name").val());
                    formData.append("phone_number", $("#phonenumber").val());
                    formData.append("maiden_name", $("#maiden_name").val());
                    formData.append("birth_year", $("#birth_year").val());
                    formData.append("birth_month", $("#birth_month").val());
                    formData.append("birth_day", $("#birth_day").val());
                    formData.append("state_origin", $("#state_origin").val());
               
                    formData.append("sex", $("#sex").val());
                    formData.append("marital_status", $("#marital_status").val());
                    formData.append("_token", $("#token").val());
                });
                myDropzone.on("success", function(file,response) {
                    sessionStorage.setItem("message", response);
					// $("#disp").html(response);
					if(response=="success"){
						window.location='/contact';
					}
					else if(response=="dob"){
						 swal('Error',"You are not up the specified age",'error');
				
					}
					else if(response=="over"){
						 swal('Error',"Your age Exceeds Maximum allowable age",'error');
				
					}
					else if(response=="origin") {
						swal("Error", "Please select a valid State of Origin", "error");
					} else if(response=="sex") {
						swal("Error", "Selected Sex is Invalid", "error");
					} else if(response=="status") {
						swal("Error", "Pick an option for Marital Status", "error");
					}
					else {
						alert(response);
					}
                   // window.location='/contact';
                });
                myDropzone.on("error", function(file,response) {
                    sessionStorage.setItem("error", 1);
                   // $("#disp").html(response);
                   swal('Error',"Some Error Occured,please check that you fill all fields correctly,also make sure  that the your Picture size is not greater than 62kb");
				  myDropzone.removeFile(file);
                });
				
				 myDropzone.on("complete", function(file) {
                   // sessionStorage.setItem("error", 1);
                   // $("#disp").html(response);
                   //swal('Error',"Some Error Occured,please check that you fill all fields correctly");
				  myDropzone.removeFile(file);
                });
                $("#btn").click(function(){
					var phonenum=$("#phonenumber").val();
					if(phonenum.length<11){
						return swal('Error','Phone Number Is Invalid','error')
					}
                    myDropzone.processQueue();
                });

                $('.date-picker').datepicker({
                    autoclose: true,
                    todayHighlight: true
                })
                $('#dob').datepicker({
                    autoclose: true,
                    todayHighlight: true
                })
                //show datepicker when clicking on the icon
                .next().on(ace.click_event, function(){
                    $(this).prev().focus();
                });
                
        		

                //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
                $('input[name=date-range-picker]').daterangepicker({
                    'applyClass' : 'btn-sm btn-success',
                    'cancelClass' : 'btn-sm btn-default',
                    locale: {
                        applyLabel: 'Apply',
                        cancelLabel: 'Cancel',
                    }
                })
                .prev().on(ace.click_event, function(){
                    $(this).next().focus();
                });
	
	  @endif
	  @endif
	  
		  @if (is_active('report'))
	
	@else
 $(document).ajaxStart(function(){
	
	NProgress.start();

}).ajaxStop(function(){
	
	NProgress.done();
});
@endif



//search applicants 
$('#searchapp').submit(function(){
	event.preventDefault();

	var state=$('#state').val();
	var region=$('#region').val();
	var status=$('#status').val();
	var region=$('#region').val();
	var grade=$('#grade').val();
	var sex=$('#sex').val();
	var age=$('#age').val();
	var ageto=$('#ageto').val();
	
	var scorefrom=$('#scorefrom').val();
	var scoreto=$('#scoreto').val();
	
	window.location='/searchapp/'+state+'/'+region+'/'+grade+'/'+sex+'/'+age+'/'+ageto+'/'+scorefrom+'/'+scoreto+'/'+status;
	
});


//admin registration
	

$('#addposition').click(function(){
	
	var jobcat=$('#jobcat').val();
	var jobcat=jobcat.replace('/','-');
	var ref_no=$('#ref_no').val();
	//var ref_no=ref_no.replace('/','-');
	var title=$('#title').val();
	var title=title.replace('/','-');
	var qualreq=$('#qualificationrequired').val();
	var qualreq=qualreq.replace('/','-');
	var desc=$('#description').val();
	//var desc=desc.replace('/','-');
	if(ref_no=="" || title=="" || qualreq=="" || desc==""){
		return swal("Error", "Please Fill all the fields", "error");	;
	}
	//alert(jobcat);
	$.get('/addposition/'+jobcat+'/'+ref_no+'/'+title+'/'+qualreq+'/'+desc,function(data,status,xhr){
	//	alert(data);
		if(data=="1"){
		swal("success", "Position Successfully Added", "success");
				window.location.reload();
				
		}
		else{
			
		swal("Error", "Some Error Occurred", "error");	
		}
		
	});
});

		
	  
	 
	
 $('#checkall').click(function(){
$('input:checkbox').prop('checked',this.checked);

}); 
		  
		$('#other').hide();
		$('#otherspec').hide();
		$('#qualification').change(function(){
			
			if($('#qualification').val() == "other" ){
				
				$('#other').show();
			}
			else{
				$('#other').hide();
				
			}
			
		});
		
		$('#specialization').change(function(){
			
			if($('#specialization').val() == "otherspec" ){
				
				$('#otherspec').show();
			}
			else{
				$('#otherspec').hide();
				
			}
			
		});
	
				
	});

		@if(Auth::guest())
			
		
	 @elseif(Auth::User()->type=="1")
		 
	 
	 function deleteposition(id){
		 swal({   title: "Are you sure?",  
 text: "You will not be able to recover position deleted!",  
 type: "warning",  
 showCancelButton: true,  
 confirmButtonColor: "#DD6B55",  
 confirmButtonText: "Yes, delete position!", 
 cancelButtonText: "No, cancel!",  
 closeOnConfirm: false,  
 closeOnCancel: false },
 function(isConfirm){  
 if (isConfirm) {   
 
		 $.get('/deletepos/'+id,function(data,status,xhr){
			
			

			
			 if(data=="1"){
				 
				 swal('Deleted','Position Successfully Deleted','success');
				 window.location.reload();
			 }
			 else{
				 swal('Error','Some Error Occurred','error');
			 
			 }
			 
			 
			 
			 
		 });
		 
  } 
 else {     swal("Cancelled", "No Changes Made", "error");   
 } });

 }
	 
	 
	function approve(email,desicion,types){
		if(desicion==1){
			var type="Approved";
		}
		else{
			var type="Reject";
			
		}
		swal({   title: "Are you sure?",
		text: "You are about to "+type+" Applicant",  
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Yes, "+type+" it!", 
		cancelButtonText: "No, cancel!",  
		closeOnConfirm: false,  
		closeOnCancel: false },
		function(isConfirm){  
		if (isConfirm) {     
		
			$.post('/decision',{
			approval:desicion,
			select:email,
			type:types,
			//ajax:1,
			_token:$('#token').val()
		},function(data,status,xhr){
			
			if(data=="1"){
				swal(type, "Applicant has been successfully Accepted", "success");
				window.location.reload();
				//success message
			}
			else {
				swal("Error", "Some Unknown Error Occurred ", "error");
			
			}
			
		});
		   } 
		else {     swal("Cancelled", "No changes Made :)", "error");   } });
		
	
		
	}
	
	
	function warning(){
		
		
		
		swal("Warning", "This Might Take A while ", "error"); 
		event.preventDefault;
	}
	
	@else 
		
	@endif
	
	</script>
	
	@if(Auth::guest())
		
	@else
	@if(Auth::user()->type=="0")
     <script src="{{asset('js/daterangepicker.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}" ></script>
	
    <script type="text/javascript">
        $('input[name="daterange"]').daterangepicker();
        $('input[name="pdaterange"]').daterangepicker();
        $('input[name="sdaterange"]').daterangepicker();
    </script>
    <script src="{{asset('js/daterangepicker.min.js')}}" ></script>
	@endif
	@endif
    <script src="{{asset('js/front.js')}}"></script>

    

    <!-- owl carousel -->
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/bootstrap-hover-dropdown.js')}}" ></script>
   <script type="text/javascript" src="{{asset('js/dropzone.min.js')}}"></script>
  
		<div id="copyright" >
            <div class="container">
                <div class="col-md-12">
                    <p class="pull-left">&copy; 2016. DPR / Department of Petroleum Resources. All Rights Reserved.</p>
                    <p class="pull-right">Designed by <a href="http://www.snapnet.com.ng">Snapnet Limited</a> 
                        <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :) -->
                    </p>

                </div>
            </div>
        </div>
        <!-- /#copyright -->

        <!-- *** COPYRIGHT END *** -->



</body>

</html>
        <!-- /#copyright -->

        <!-- *** COPYRIGHT END *** -->
            <!-- *** NAVBAR END *** -->