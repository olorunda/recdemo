<script>
	/** $(function(){  **/
		
			




function starttext(){


	sessionStorage.setItem('started',1);
	
	$.get('/start/1/{{Auth::user()->id}}',function(data,status,xhr){
		if(status==401){
			return swal('Error','Please Reload The Page','error');
		}
		if(data==1){
			/**start timer **/
			$('#timer').timer({
	seconds:0,
	duration:'5m0s',
	callback: function(){
		    submit();
			alert("time up!!");
	}
	
});

		$('#textpanel').show(1000);
	$('#infopanel').hide(1000);
	$('#start').hide(1000);
	$('#submit').show(1000);
	
		}
		
		else if(data==2){
			swal('Error','You Have Already Taken Test','error');
		}
		else{
			swal('Error','Text Not Available Try Again Later','error');
		}
	});
	
}




</script>
<?php
    $months = ["01" =>"January", "02" => "February", "03" => "March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "November", "12" => "December"];

     $countries = [
    "0"=> "-Select-",
    "Afghanistan"=>"Afghanistan",
    "Albania"=>"Albania",
    "Algeria"=>"Algeria",
    "Andorra"=>"Andorra",
    "Angola"=>"Angola",
    "Antigua and Barbuda"=>"Antigua and Barbuda",
    "Argentina"=>"Argentina",
    "Armenia"=>"Armenia",
    "Aruba"=>"Aruba",
    "Australia"=>"Australia",
    "Austria"=>"Austria",
    "Azerbaijan"=>"Azerbaijan",
    "Bahamas, The"=>"Bahamas, The",
    "Bahrain"=>"Bahrain",
    "Bangladesh"=>"Bangladesh",
    "Barbados"=>"Barbados",
    "Belarus"=>"Belarus",
    "Belgium"=>"Belgium",
    "Belize"=>"Belize",
    "Benin"=>"Benin",
    "Bhutan"=>"Bhutan",
    "Bolivia"=>"Bolivia",
    "Bosnia and Herzegovina"=>"Bosnia and Herzegovina",
    "Botswana"=>"Botswana",
    "Brazil"=>"Brazil",
    "Brunei"=>"Brunei",
    "Bulgaria"=>"Bulgaria",
    "Burkina Faso"=>"Burkina Faso",
    "Burma"=>"Burma",
    "Burundi"=>"Burundi",
    "Cambodia"=>"Cambodia",
    "Cameroon"=>"Cameroon",
    "Canada"=>"Canada",
    "Cabo Verde"=>"Cabo Verde",
    "Central African Republic"=>"Central African Republic",
    "Chad"=>"Chad",
    "Chile"=>"Chile",
    "China"=>"China",
    "Colombia"=>"Colombia",
    "Comoros"=>"Comoros",
    "Congo, Democratic Republic of the"=>"Congo, Democratic Republic of the",
    "Congo, Republic of the"=>"Congo, Republic of the",
    "Costa Rica"=>"Costa Rica",
    "Cote d'Ivoire"=>"Cote d'Ivoire",
    "Croatia"=>"Croatia",
    "Cuba"=>"Cuba",
    "Curacao"=>"Curacao",
    "Cyprus"=>"Cyprus",
    "Czech Republic"=>"Czech Republic",
    "Denmark"=>"Denmark",
    "Djibouti"=>"Djibouti",
    "Dominica"=>"Dominica",
    "Dominican Republic"=>"Dominican Republic",
    "East Timor (see Timor-Leste)"=>"East Timor (see Timor-Leste)",
    "Ecuador"=>"Ecuador",
    "Egypt"=>"Egypt",
    "El Salvador"=>"El Salvador",
    "Equatorial Guinea"=>"Equatorial Guinea",
    "Eritrea"=>"Eritrea",
    "Estonia"=>"Estonia",
    "Ethiopia"=>"Ethiopia",
    "Fiji"=>"Fiji",
    "Finland"=>"Finland",
    "France"=>"France",
    "Gabon"=>"Gabon",
    "Gambia, The"=>"Gambia, The",
    "Georgia"=>"Georgia",
    "Germany"=>"Germany",
    "Ghana"=>"Ghana",
    "Greece"=>"Greece",
    "Grenada"=>"Grenada",
    "Guatemala"=>"Guatemala",
    "Guinea"=>"Guinea",
    "Guinea-Bissau"=>"Guinea-Bissau",
    "Guyana"=>"Guyana",
    "Haiti"=>"Haiti",
    "Holy See"=>"Holy See",
    "Honduras"=>"Honduras",
    "Hong Kong"=>"Hong Kong",
    "Hungary"=>"Hungary",
    "Iceland"=>"Iceland",
    "India"=>"India",
    "Indonesia"=>"Indonesia",
    "Iran"=>"Iran",
    "Iraq"=>"Iraq",
    "Ireland"=>"Ireland",
    "Israel"=>"Israel",
    "Italy"=>"Italy",
    "Jamaica"=>"Jamaica",
    "Japan"=>"Japan",
    "Jordan"=>"Jordan",
    "Kazakhstan"=>"Kazakhstan",
    "Kenya"=>"Kenya",
    "Kiribati"=>"Kiribati",
    "Korea, North"=>"Korea, North",
    "Korea, South"=>"Korea, South",
    "Kosovo"=>"Kosovo",
    "Kuwait"=>"Kuwait",
    "Kyrgyzstan"=>"Kyrgyzstan",
    "Laos"=>"Laos",
    "Latvia"=>"Latvia",
    "Lebanon"=>"Lebanon",
    "Lesotho"=>"Lesotho",
    "Liberia"=>"Liberia",
    "Libya"=>"Libya",
    "Liechtenstein"=>"Liechtenstein",
    "Lithuania"=>"Lithuania",
    "Luxembourg"=>"Luxembourg",
    "Macau"=>"Macau",
    "Macedonia"=>"Macedonia",
    "Madagascar"=>"Madagascar",
    "Malawi"=>"Malawi",
    "Malaysia"=>"Malaysia",
    "Maldives"=>"Maldives",
    "Mali"=>"Mali",
    "Malta"=>"Malta",
    "Marshall Islands"=>"Marshall Islands",
    "Mauritania"=>"Mauritania",
    "Mauritius"=>"Mauritius",
    "Mexico"=>"Mexico",
    "Micronesia"=>"Micronesia",
    "Moldova"=>"Moldova",
    "Monaco"=>"Monaco",
    "Mongolia"=>"Mongolia",
    "Montenegro"=>"Montenegro",
    "Morocco"=>"Morocco",
    "Mozambique"=>"Mozambique",
    "Namibia"=>"Namibia",
    "Nauru"=>"Nauru",
    "Nepal"=>"Nepal",
    "Netherlands"=>"Netherlands",
    "Netherlands Antilles"=>"Netherlands Antilles",
    "New Zealand"=>"New Zealand",
    "Nicaragua"=>"Nicaragua",
    "Niger"=>"Niger",
    "Nigeria"=>"Nigeria",
    "North Korea"=>"North Korea",
    "Norway"=>"Norway",
    "Oman"=>"Oman",
    "Pakistan"=>"Pakistan",
    "Palau"=>"Palau",
    "Palestinian Territories"=>"Palestinian Territories",
    "Panama"=>"Panama",
    "Papua New Guinea"=>"Papua New Guinea",
    "Paraguay"=>"Paraguay",
    "Peru"=>"Peru",
    "Philippines"=>"Philippines",
    "Poland"=>"Poland",
    "Portugal"=>"Portugal",
    "Qatar"=>"Qatar",
    "Romania"=>"Romania",
    "Russia"=>"Russia",
    "Rwanda"=>"Rwanda",
    "Saint Kitts and Nevis"=>"Saint Kitts and Nevis",
    "Saint Lucia"=>"Saint Lucia",
    "Saint Vincent and the Grenadines"=>"Saint Vincent and the Grenadines",
    "Samoa"=>"Samoa",
    "San Marino"=>"San Marino",
    "Sao Tome and Principe"=>"Sao Tome and Principe",
    "Saudi Arabia"=>"Saudi Arabia",
    "Senegal"=>"Senegal",
    "Serbia"=>"Serbia",
    "Seychelles"=>"Seychelles",
    "Sierra Leone"=>"Sierra Leone",
    "Singapore"=>"Singapore",
    "Sint Maarten"=>"Sint Maarten",
    "Slovakia"=>"Slovakia",
    "Slovenia"=>"Slovenia",
    "Solomon Islands"=>"Solomon Islands",
    "Somalia"=>"Somalia",
    "South Africa"=>"South Africa",
    "South Korea"=>"South Korea",
    "South Sudan"=>"South Sudan",
    "Spain"=>"Spain",
    "Sri Lanka"=>"Sri Lanka",
    "Sudan"=>"Sudan",
    "Suriname"=>"Suriname",
    "Swaziland"=>"Swaziland",
    "Sweden"=>"Sweden",
    "Switzerland"=>"Switzerland",
    "Syria"=>"Syria",
    "Taiwan"=>"Taiwan",
    "Tajikistan"=>"Tajikistan",
    "Tanzania"=>"Tanzania",
    "Thailand"=>"Thailand",
    "Timor-Leste"=>"Timor-Leste",
    "Togo"=>"Togo",
    "Tonga"=>"Tonga",
    "Trinidad and Tobago"=>"Trinidad and Tobago",
    "Tunisia"=>"Tunisia",
    "Turkey"=>"Turkey",
    "Turkmenistan"=>"Turkmenistan",
    "Tuvalu"=>"Tuvalu",
    "Uganda"=>"Uganda",
    "Ukraine"=>"Ukraine",
    "United Arab Emirates"=>"United Arab Emirates",
    "United Kingdom"=>"United Kingdom",
    "Uruguay"=>"Uruguay",
    "Uzbekistan"=>"Uzbekistan",
    "Vanuatu"=>"Vanuatu",
    "Venezuela"=>"Venezuela",
    "Vietnam"=>"Vietnam",
    "Yemen"=>"Yemen",
    "Zambia"=>"Zambia",
    "Zimbabwe"=>"Zimbabwe"
];
?>
<!--
###################################
		BASIC INFORMATION
###################################
-->
@if(Auth::user()->type==1)
	@else
@if(Auth::user()->complete=='1')
	@if(Auth::user()->textcomplete==1)
		@else
<marquee behavior="scroll" direction="left"><b style="color:red; font-size:20px; display:none;"><b>Please Click on The Take Test Button In order To Increase You Chances of getting Hired</b></marquee>
</marquee>
@endif
@endif
@endif
<div class="row" id="prof" >
	<div class="col-lg-12">
		<div class="dpr-well" style="padding-left:40px; @if(Auth::guest())
@else
@if(Auth::user()->type==1)
	@else
@if(Auth::user()->approved==1)
@elseif(Auth::user()->approved==0)

	background-image:url('{{asset('img/rejected.jpg')}}');

@else

	background-image:url('{{asset('img/rejected.jpg')}}');

@endif
@endif
@endif background-size:100%;">
			<div class="img-responsive">
				<img class="pull-left" alt="user_profile" src="{{asset('upload')}}/{{$user->image}}" style="height:150px; width:150px;">
			</div>
			<div class="data">
				<h3 class="text-uppercase text-primary">{{ $user->f_name }} {{ $user->l_name }}</h3>
				<p class="lead" id="dpr-pf-name">
				    {{ $contacts->street }}, {{ $contacts->city }}, {{ $contacts->state }}
					<br><b>Phone Number:</b> {{ $user->phone_num }}
					<br><b>E-Mail:</b> {{ $user->email }}   
					<br><b>Application Status:</b> @if($user->approved=="0")<span class="label label-warning">Pending</span>
                                            @elseif($user->approved=='1')
											<span class="label label-success">Approved</span>
											@else
												<span class="label label-danger">Rejected</span>
											@endif		<br>
				
					<strong style="margin-left:150px;" class="text-danger"><b>Reference Number:</b> {{ $user->ref_num }}</strong>
					<br>
						
				
					@if(Auth::user()->type=="0" && Auth::user()->complete=="1")
						<div style="margin-left:147px; margin-top:-30px;">
					
    <a  onclick="window.print()" id="noprint" style="color:black; cursor:pointer; text-decoration:none;"><i class="fa fa-print"></i> Print</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a  onclick="sendmail()" id="noprint" style="color:black; cursor:pointer; text-decoration:none;"><i class="fa fa-share"></i> Send as Email</a>
					</div>
			
					
					<div style="display:none">
					<B>Score:</b> <b style="color:green">{{round(Auth::user()->exam_init/5,2)*100 }}%</b></div>
					@else	
					@if(Auth::user()->type=="1")
                    @else
					@if(Auth::user()->complete=="1"	)					
						@endif
				    @endif
				    @endif
					
					@if(Auth::user()->type=="1")
                    @else
					@if(Auth::user()->complete=="1"	)					
				<div style="display:none">	&nbsp;&nbsp;<a style="color:red; cursor:pointer; text-decoration:none;" data-toggle="modal" data-target="#take" data-backdrop="static" 
   data-keyboard="false"><i class="fa fa-file-text"></i><b class="tab blink">Take Test</b></a> 
				     
				    @endif
				    @endif
						</div>
				</p>
				
				@if(Auth::user()->type=="0" && Auth::user()->complete=="1")
				<?php	$margin=''; ?>
				@else
					<?php  $margin=60;  ?>
				@endif
				<div id="demo" style="margin-left:145px; margin-top:{{$margin}}px;"></div>
				<br><span class='text-danger'><b>@if(Auth::user()->type==1) @else @if(Auth::user()->approved==1) Successful candidates should come along with their registration slip to the examination centre. @elseif(Auth::user()->approved==0) This is a Temporary Copy , Do Not come with this copy to the examination hall,Please Check back later for the Permanent Copy @else  Sorry Your Application Has Not Been Approved, PLease do not come to the Examination center with this slip @endif @endif</b></span>
					
	
			</div>
			
		</div>
	@if(Auth::user()->complete==1 && Auth::user()->type==0 )</div>@endif
	
	

</div>
<div id="take" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Quick Text</h4>
      </div>
      <div class="modal-body">
     <div class="panel-group">
  
 <div class="panel panel-success">
      <div class="panel-heading">Text Duration (5 min) - <span id="timer" style="font-weight:bold; color:red;">_ _ _ _</span>
</div>
      <div class="panel-body">
	    <div  id="infopanel" style=" font-weight:bold;"> <h5 class="text-left text-danger">Click on the Start Button To start Test, Please Take Note of the following Before Starting the Test : </h5> <br>
		<ul>
		<li>One The Text is Started ,<b style="color:red;"> Do not close the browser </b>, if you do , the text would automatically be submitted even if you are yet to complete it </li>
		<li>You can only take the test <b>once</b> </li>
		
		</ul>
		
		</div>
		 <div  id="scorepanel" style=" font-weight:bold;"> <h5 class="text-left text-danger">You Has Successfully Completed Test : </h5> <br>
		<ul>
		 
		<li>Your Text Result is: <b style="color:green;" id="myscore"></b></li>
		
		
		</ul>
		
		</div>
	  <div class="form-horizontal" id="textpanel">
	  <?php $index=1;  $index2=1;?>
	  
	  @if(count($questions)>0)
		  @foreach($questions as $question)
     <h5> {{$index++}}. {{$question->content}}</h5><br>
	 a)&nbsp;&nbsp;<input type="hidden" id="questid{{$index2++}}"  value="{{$question->question_id}}" > <input type="radio" name="option{{$question->question_id}}" value="1" />{{$question->option1}}
	  <br> 
	 b)&nbsp;&nbsp;<input type="radio" name="option{{$question->question_id}}" value="2" />{{$question->option2}}
	  <br>
	 c)&nbsp;&nbsp; <input type="radio" name="option{{$question->question_id}}" value="3" />{{$question->option3}}
	  <br>
	 d) &nbsp;&nbsp;<input type="radio" name="option{{$question->question_id}}" value="4" />{{$question->option4}}
	  <hr>
	  
		  @endforeach
	      @endif
	  
	  </div>
	  </div>
    </div>
</div>
</div>
 <div class="modal-footer">
        <button type="button" class="btn btn-default" id="start" onclick="starttext()">Start</button>
        <button type="button" class="btn btn-default" id="submit" onclick="submit()">Submit</button>
        <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
      <!--  <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button> -->
      </div>
      </div>
     
    </div>
  
  </div>


<!--
###################################
		BIO-DATA INFORMATION
###################################
-->

<br>

<div class="row" id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-male"></i>/<i class="fa fa-female"></i> BIO-DATA 
				@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else		<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#biodataModal" >Edit</button> @endif
				</h3>
				<div class="col-lg-6">
					<p class="lead" id="dpr-pf-name">
						<b>First name:</b> {{ $user->f_name }} 
						<br><b>Middle name:</b> {{ $user->m_name }} 
						<br><b>Phone Number:</b> {{ $user->phone_num }} 
						<br><b>Date of Birth:</b> {{ $user->dob }}
						<br><b>Reference Number:</b> {{ $user->ref_num }}<br>
				
					</p>
				</div>
				<div class="col-lg-6">
					<p class="lead" id="dpr-pf-name">
						<b>Last name:</b> {{ $user->l_name }}
						<br><b>Maiden name:</b> {{ $user->maiden_name }}
						<br><b>E-Mail:</b> {{ $user->email }}
						<br><b>Marital Status:</b> {{ $user->marital_status }}
						<br><b>Sex:</b> {{ $user->sex }}
					</p>
				</div>
				<br><br><br><br><br><br>
			</div>
		</div>
	</div>
</div>

<!--
###################################
		CONTACT INFORMATION
###################################
-->

<div class="row" id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-envelope-o"></i> <i class="fa fa-phone"></i> Contact Information 
				@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else
				<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#contactModal" >Edit</button> @endif
				</h3>
				<div class="col-lg-6">
					<p class="lead" id="dpr-pf-name">
						<b> Street:</b> {{ $contacts->street }} 
						<br><b>City:</b> {{ $contacts->city }} 
						<br><b>Local Government Area:</b> {{ $contacts->lga }}
						<br><b>State:</b> {{ $contacts->state }} 
						<br><b>State of Origin:</b> {{ $contacts->state_origin }} 
					</p>
				</div>
				<br><br><br><br><br>
			</div>
		</div>
	</div>
</div>

<!--
##################################################
		EDUCATIONAL BACKGROUND INFORMATION
##################################################
-->


<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<h3 class="text-uppercase text-primary">
					<i class="fa fa-institution"></i> Educational Information
					@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else	<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#addInstitute" pull-right">Add</button> @endif
				</h3>
				<legend>Secondary School Attended</legend>
				<br><b>Secondary School:</b>&nbsp;&nbsp;&nbsp;&nbsp; {{ $institute2->sname }} <br><br>
			<b>Date Attended:</b>&nbsp;&nbsp;&nbsp;&nbsp; {{ date('F j, Y', strtotime($institute2->sstart_date)) }} to {{ date('F j, Y',strtotime($institute2->send_date)) }}
				<br>
				@if(count($institute)>0)
					
				<div class="col-md-12" style="margin-bottom:40px;"></div>
				<legend>Higher Institution Attended</legend>
				
       <div class="row" style="margin-top:30px; margin-left:-20px;">
           <div class="col-md-12">
               <div class="">
                   <div class="table-responsive">
                       <table class="table table-hover table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name of Institution</th>
                                    <th>Course</th>
                                    <th>Date Started</th>
                                    <th>Date Ended</th>
                                    <th>Degree Obtained</th>
                                    <th>Grade</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index=0; ?>
                                @foreach($institute as $inst)
                                    @if($inst->degree=="bsc")
                                    <?php $degree = "B.Sc."; ?>
                                    @elseif($inst->degree=="ben")
                                    <?php $degree = "B.Eng."; ?>
                                    @elseif($inst->degree=="btech")
                                    <?php $degree = "B.Tech."; ?>
                                    @elseif($inst->degree=="mbbs")
                                    <?php $degree = "M.B.B.S."; ?>
                                    @elseif($inst->degree=="llb")
                                    <?php $degree = "L.LB."; ?>
                                    @elseif($inst->degree=="hnd")
                                    <?php $degree = "HND"; ?>
                                    @elseif($inst->degree=="ba")
                                    <?php $degree = "B.A."; ?>
                                     @elseif($inst->degree=="bpharm")
                                    <?php $degree = "B.Pharm"; ?>
                                     @elseif($inst->degree=="others")
                                    <?php $degree = $inst->degree; ?>
                                    @else
                                        <?php $degree = $inst->degree; ?>
                                    @endif

                                    @if($inst->grade==1)
                                    <?php $grade = "First Class"; ?>
                                    @elseif($inst->grade==2)
                                    <?php $grade = "Second Class Upper"; ?>
                                    @elseif($inst->grade==3)
                                    <?php $grade = "Second Class Lower"; ?>
                                    @elseif($inst->grade==4)
                                    <?php $grade = "Third Class"; ?>
                                    @elseif($inst->grade==5)
                                    <?php $grade = "Merit"; ?>
                                    @elseif($inst->grade==6)
                                    <?php $grade = "Distinction"; ?>
                                    @elseif($inst->grade==7)
                                    <?php $grade = "Pass"; ?>
                                    @elseif($inst->grade==8)
                                    <?php $grade = $inst->grade; ?>
                                    @else
                                        <?php $grade = $inst->grade; ?>
                                    @endif
                                    <tr>
                                        <th>{{ $index+=1 }}</th>
                                        <th>{{ $inst->iname }}</th>
                                        <th>{{ $inst->course }}</th>
                                        <th>{{ $inst->istart_date }}</th>
                                        <th>{{ $inst->iend_date }}</th>
                                        <th>{{ $degree }}</th>
                                        <th>{{ $grade }}</th>
                                        <th>
                                        @if(Auth::user()->jobcat==1)
                                          @if(Auth::user()->type==1)
                                    @else
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#einstitute"><i class="fa fa-edit"></i> Edit</button>
                                        @endif
                                        @else
                                        <form class="inline-form" action="{{ url('/deleteHireEdu')}}/{{ $inst->iname }}" method="POST">
                                                    <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
                                                    @if(Auth::user()->type=="1" && Auth::user()->complete=="1")   <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button> @else    @endif
                                                </form>
                                        @endif
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div> 
  @else
	  
  <p class="text-danger lead" id="dpr-pf-name" style="margin-top:30px;" >
					<b>No Institution Found  @if(Auth::user()->complete=='0'), Click On the Add button to Add Institution @endif</b>
				</p>
  @endif
		</div>
	</div>
</div>

<!--
######################################################
		PROFESSIONAL QUALIFICATIONS INFORMATION
######################################################
-->
<div class="col-md-12" style="margin-top:20px;"></div>
@if(count($professional_quals) > 0)
<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-mortar-board"></i> Professional Qualifications 
					@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else	<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#qualificationModal" pull-right">Add</button> @endif
				</h3>
				<div class="table-responsive">
					<table class="table table-hover table-stripped">
						<thead>
							<tr>
								<th>#</th>
								<th>Professional Qualification</th>
								<th>Certification</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $index = 1; ?>
							@foreach($professional_quals as $qual)
							<tr>
								<th>{{ $index }}</th>
								<th>{{ $qual->name }}</th>
								<th>{{ $qual->position }}</th>
								<th>
				             	@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else   <form class="inline-form" action="{{ url('/deletequals') }}/{{ $qual->id }}" method="POST">
				                        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
				                        <input type="hidden" name="url" id="url" value="{{ Request::url() }}">
				                        <input type="hidden" name="_method" value="DELETE">
				                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button> @endif
				                    </form>
				                </th>
							</tr>
							<?php $index+=1; ?>
							@endforeach
							<?php $index=1;?>
						</tbody>
					</table>
				</div><!-- -->
			</div>
		</div>
	</div>
</div>
@else
<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-mortar-board"></i> Professional Qualifications 
					@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else	<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#qualificationModal" >Add</button> @endif
					
				</h3>
				<p class="lead" id="dpr-pf-name">
					No Professional Qualifications Found
				</p>
			</div>
		</div>
	</div>
</div>

@endif
<!--
###################################################
		RELEVANT EXPERIENCES INFORMATION
###################################################
-->

<br>
@if($user->jobcat==1)
	
@else
@if(count($relevant_exp)>0)

<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-puzzle-piece"></i> Relevant Experiences 
				@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else		<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#relevantexpModal" >Add</button> @endif
				</h3>
				<div class="table-responsive">
					<table class="table table-hover table-stripped">
						<thead>
							<tr>
								<th>#</th>
								<th>Name of Organization</th>
								<th>Position</th>
								<th>Date Employed</th>
								<th>Date Ended</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $index=1; ?>
							@foreach($relevant_exp as $exp)
							<tr>
								<th>{{ $index++}}</th>
								<th>{{ $exp->name }}</th>
								<th>{{ $exp->position }}</th>
								<th>{{ $exp->start_date }}</th>
                				<th>{{ $exp->end_date }}</th>
								<th>
				     	@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else           <form class="inline-form" action="{{ url('/deleteexp')}}/{{ $exp->id }}" method="POST">
				                        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
				                        <input type="hidden" name="url" id="url" value="{{ Request::url() }}">
				                        <input type="hidden" name="_method" value="DELETE">
				                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button> @endif
				                    </form>
				                </th>
							</tr>
							
							@endforeach
						
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@else

<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-puzzle-piece"></i> Relevant Experiences 
					@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else	<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#relevantexpModal" >Add</button> @endif
				</h3>
				<p class="lead" id="dpr-pf-name">
					No Relevant Experiences Found
				</p>
			</div>
		</div>
	</div>
</div>

@endif
@endif
<!--
###################################
		REFEREES INFORMATION
###################################
-->

<br>
@if(count($refs) > 0)

<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-users"></i> Referees 
					@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else	<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#refereesModal" pull-right">Add</button> @endif
				</h3>
				<table class="table table-hover table-stripped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name of Referee</th>
							<th>Organization</th>
							<th>Position</th>
							<th>E-Mail</th>
							<th>Phone</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $index=1; ?>
						@foreach($refs as $ref)
						<tr>
							<th>{{ $index++ }}</th>
							<th>{{ $ref->name }}</th>
							<th>{{ $ref->organization }}</th>
							<th>{{ $ref->position }}</th>
							<th>{{ $ref->email }}</th>
							<th>{{ $ref->phone }}</th>
							<th>
			         	@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else       <form class="inline-form" action="{{ url('/deleteref')}}/{{ $ref->id }}" method="POST">
			                        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
			                        <input type="hidden" name="url" id="url" value="{{ Request::url() }}">
			                        <input type="hidden" name="_method" value="DELETE">
			                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button> @endif
			                    </form>
			                </th>
						</tr>
					
						@endforeach
				
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@else

<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-users"></i> Referees 
					@if(Auth::user()->type=="1" && Auth::user()->complete=="1") @else	<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#refereesModal" >Add</button> @endif
				</h3>
				<p class="lead" id="dpr-pf-name">
					No Referees Found!
				</p>
			</div>
		</div>
	</div>
</div>

<br>
@endif

<!--
###################################################
		EAXMINATION CENTER INFORMATION
###################################################
-->

<br>
<div class="row"  id="noprint">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-map-marker"></i> Preferred Examination Center 
						</h3>
				<div class="col-lg-6">
					<h5>Preferred Center</h5>
					<p class="lead" id="dpr-pf-name">
						<b>Region:</b> {{ $user->region }} 
						<br><b>Center:</b> {{ $user->center }} 
					</p>
				</div>
				<div class="col-lg-6">
					<h5>Alternate Center</h5>
					<p class="lead" id="dpr-pf-name">
						<b>Region:</b> {{ $user->altregion }} 
						<br><b>Center:</b> {{ $user->altcenter }} 
					</p>
				</div>
				<br><br><br><br>
			</div>
		</div>
	</div>
</div>

<div class="">
    <?php $idgen = Crypt::encrypt(Auth::User()->id); ?>
	@if(Auth::user()->complete=="0")
		@if(Auth::user()->type=="1")
			@else
    <a  onclick="submit2('{{Auth::user()->id}}')" class="btn btn-template-main"><i class="fa fa-paper-plane-o"></i> Submit & Print</a>
	@endif
	@endif
</div>
<!--
###################################
		BEGIN MODAL DEFINITION
###################################
-->


<!--
##########################################
		MODAL - BIODATA INFORMATIN
##########################################
-->

<div id="biodataModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header well">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">BIO-DATA INFORMATION</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" method="POST" action="{{ url('/bio') }}">
					<input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
					<input type="hidden" name="id" id="id" value="{{ $user->id }}">
					<input type="hidden" name="url" id="url" value="{{ Request::url() }}">
					<div class="col-md-10">
						<div class="col-md-10">
							<div class="form-group">
								<label for="phone">Phone Number</label>
								<div class="row">
									<div class="col-xs-8 col-sm-12">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-bookmark bigger-110"></i>
											</span>
											<input type="phone" class="form-control" name="phone" id="phone" value="{{ $user->phone_num }}">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-10">
							<div class="form-group">
								<label for="l_name">E-Mail</label>
								<div class="row">
									<div class="col-xs-8 col-sm-12">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-bookmark bigger-110"></i>
											</span>
											<input type="mail" class="form-control" name="email" id="email" value="{{ $user->email }}">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-10">
							<div class="form-group">
								<label for="dob">Date of Birth</label>
								<div class="row">
									<div class="col-xs-8 col-sm-12">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-bookmark bigger-110"></i>
											</span>
											<!--<input type="text" class="form-control date-picker" name="dob" id="dob" data-date-format="yyyy-mm-dd" value="{{ $user->dob }}">-->
											<div class="row">
					                            <div class="col-md-4">
					                                <select class="form-control" id="byear" name="byear">
					                                    <option value="0">Year</option>
					                                    @for($year = 1980; $year <= 2012; $year++)
					                                    <option value="{{ $year }}">{{ $year }}</option>
					                                    @endfor
					                                </select>
					                            </div>
					                            <div class="col-md-4">
					                                <!-- Month -->
					                                <select class="form-control" id="bmonth", name="bmonth">
					                                    <option value="0">Month</option>
					                                    @foreach ($months as $key=>$month)
					                                    <option value="{{ $key }}">{{ $month }}</option>
					                                    @endforeach
					                                </select>
					                            </div>
					                            <div class="col-md-4">
					                                <!-- Day -->
					                                <select class="form-control" id="bday" name="bday">
					                                    <option value="0">Day</option>
					                                    @for($day = 1; $day <= 31; $day++)
					                                    <option value="{{ $day }}">{{ $day }}</option>
					                                    @endfor
					                                </select>
					                            </div>
					                        </div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-10">
							<div class="form-group">
								<label for="marital_status">Marital Status</label>
								<div class="row">
									<div class="col-xs-8 col-sm-12">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-bookmark bigger-110"></i>
											</span>
											<select class="form-control" id="marital_status" name="marital_status" value="{{ $user->marital_status }}">
												<option value="single">Single</option>
												<option value="married">Married</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-10">
							<div class="form-group">
								<label for="sex">Sex</label>
								<div class="row">
									<div class="col-xs-8 col-sm-12">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-bookmark bigger-110"></i>
											</span>
											<select class="form-control" id="sex" name="sex">
												<option value="M">Male</option>
												<option value="F">Female</option>
											</select>
										</div>
										<br>
										<button class="btn btn-template-main" id="add"><i class="fa fa-plus"></i>Add</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>
</div>

<!--
##########################################
		MODAL - CONTACT INFORMATION
##########################################
-->
<?php
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
	?>
	<div id="contactModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header well">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">CONTACT INFORMATION</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal " role="form" method="POST" action="{{ url('/contact') }}">
						<input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
						<input type="hidden" name="id" id="id" value="{{ $user->id }}">
						<input type="hidden" name="url" id="url" value="{{ Request::url() }}">
						<div class="col-md-10">
							<div class="col-md-10">
								<div class="form-group">
									<label for="street">Street</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<input type="phone" class="form-control" name="street" id="street" value="{{ $contacts->street }}">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<label for="city">City</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<input type="text" class="form-control" name="city" id="city" value="{{ $contacts->city }}">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<label for="lga">Local Government Area</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<input type="text" class="form-control" name="lga" id="lga" value="{{ $contacts->lga }}">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<label for="state">State</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<select class="form-control" id="state" name="state" value="{{ $contacts->state }}">
													@foreach($states as $state)
													<option value="{{ $state }}">{{ $state }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<label for="state_origin">State of Origin</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<select class="form-control" id="state_origin" name="state_origin" value="{{ $contacts->state_origin }}">
													@foreach($states as $state)
													<option value="{{ $state }}">{{ $state }}</option>
													@endforeach
												</select>
											</div>
											<br>
											<button class="btn btn-template-main" id="add"><i class="fa fa-plus"></i>Add</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
					<div class="modal-footer">
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--
##########################################
		MODAL - EDUCATIONAL BACKGROUND
##########################################
-->



	<!--
####################################################
		MODAL - PROFESSIONAL QUALIFICATIONS
###################################################
-->
<div id="qualificationModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header well">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Professional Qualifications (If Any)</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/others_quals') }}">
            <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="url" id="url" value="{{ Request::url() }}">
            <input type="hidden" name="id" id="id" value="{{ $user->id }}">
            <div class="col-md-10">
            <div class="col-md-10">
                <div class="form-group">
                    <br>
                    <label for="prof_name">Name of Professional body</label>
                    <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-bookmark bigger-110"></i>
                                </span>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="position">Certification</label>
                    <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                                <input class="form-control" type="text" name="position" id="position">
                            </div>
                            <br>
                            <button class="btn btn-template-main" id="add"><i class="fa fa-plus"></i>Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div class="modal-footer">
        </div>
    </div>
    </div>
</div>
</div>
<!-- 
#################################################
Relevat exp real modal 
#################################################
-->
<div id="relevantexpModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header well">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Relevant Experiences</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/others_exp') }}">
            <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="url" id="url" value="{{ Request::url() }}">
            <input type="hidden" name="id" id="id" value="{{ $user->id }}">
            <div class="col-md-10">
            <div class="col-md-10">
                <div class="form-group">
                    <br>
                    <label for="prof_name">Name of Organization</label>
                    <div class="row">
                        <div class="col-xs-8 col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-bookmark bigger-110"></i>
                                </span>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="position">Position</label>
                    <div class="row">
                        <div class="col-xs-8 col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                                <input class="form-control" type="text" name="position" id="position">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                    <div class="form-group">
                    <label for="esyear">Date Employed</label>
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-control" id="esyear" name="esyear">
                                    <option value="0">Year</option>
                                    @for($year = 1980; $year <= 2012; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <!-- Month -->
                                <select class="form-control" id="esmonth", name="esmonth">
                                    <option value="0">Month</option>
                                    @foreach ($months as $key=>$month)
                                    <option value="{{ $key }}">{{ $month }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <!-- Day -->
                                <select class="form-control" id="esday" name="esday">
                                    <option value="0">Day</option>
                                    @for($day = 1; $day <= 31; $day++)
                                    <option value="{{ $day }}">{{ $day }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                    <label for="eeyear">Date Ended</label>
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-control" id="eeyear" name="eeyear">
                                    <option value="0">Year</option>
                                    @for($year = 1980; $year <= 2012; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                                <br>
                                <button class="btn btn-template-main" id="add"><i class="fa fa-plus"></i>Add</button>
                            </div>
                            <div class="col-md-4">
                                <!-- Month -->
                                <select class="form-control" id="eemonth", name="eemonth">
                                    <option value="0">Month</option>
                                    @foreach ($months as $key=>$month)
                                    <option value="{{ $key }}">{{ $month }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <!-- Day -->
                                <select class="form-control" id="eeday" name="eeday">
                                    <option value="0">Day</option>
                                    @for($day = 1; $day <= 31; $day++)
                                    <option value="{{ $day }}">{{ $day }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
        <div class="modal-footer">
        </div>
    </div>
    </div>
</div>
</div>

	<!--
####################################################
		MODAL - RELEVANT EXPERIENCES
###################################################
-->
<!-- Modal For Relevant Experiences-->
    <div id="examModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header well">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Examination Center</h4>
        </div>
        <div class="modal-body">
            <form action="/savecenter" method="POST">
		        <h4>Select Region</h3>
		        <select name="region" class="form-control" id="region">
		        <option value="Abuja">Abuja</option>
		        <option value="Portharcourt">Portharcourt</option>
		        <option value="Lagos">Lagos</option>
		        <option value="someregion">Kano</option>
		        </select>
		        <br>
		        <select name="center" id="centers" class="form-control">
				
		        <option value="Abuja">Select Center</option>
		        </select>
		        <br>
		        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
		        <input type="hidden" name="url" id="url" value="{{ Request::url() }}">
		        <input type="hidden" name="id" id="url" value="{{ $user->id }}">
		        <button class="btn btn-md btn-success" value="save"><i class="fa fw fa-file-excel-o"></i>Save Center and Continue</button>
		    </form>
        <div class="modal-footer">
        </div>
    </div>
    </div>
</div>
</div>


	<!--
####################################################
		MODAL - REFEREES
###################################################
-->
<!-- Modal For Referees-->
    <div id="refereesModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header well">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Referees</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/others_ref') }}">
            <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="id" id="id" value="{{ $user->id }}">
            <input type="hidden" name="url" id="url" value="{{ Request::url() }}">
            <div class="col-md-10">
            <div class="col-md-10">
                <div class="form-group">
                    <br>
                    <label for="name">Name of Referee</label>
                    <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-bookmark bigger-110"></i>
                                </span>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-10">
                <div class="form-group">
                    <label for="organization">Name of Referees Organization</label>
                    <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-bookmark bigger-110"></i>
                                </span>
                                <input type="text" class="form-control" name="organization" id="organization">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="position">Position</label>
                    <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                                <input class="form-control" type="text" name="position" id="position">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-bookmark bigger-110"></i>
                                </span>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="phone">Referees Phone Number</label>
                    <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-bookmark bigger-110"></i>
                                </span>
                                <input type="phone" class="form-control" name="phone" id="phone">
                            </div>
                            <br>
                            <button class="btn btn-template-main" id="add"><i class="fa fa-plus"></i>Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div class="modal-footer">
        </div>
    </div>
    </div>
</div>
</div>


	<!--
####################################################
		MODAL - EXAMINATION CENTER
###################################################
-->
<div id="contactModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header well">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">CONTACT INFORMATION</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/contact') }}">
						<input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
						<input type="hidden" name="id" id="id" value="{{ $user->id }}">
						<input type="hidden" name="url" id="url" value="{{ Request::url() }}">
						<div class="col-md-10">
							<div class="col-md-10">
								<div class="form-group">
									<label for="street">Street</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<input type="phone" class="form-control" name="street" id="street" value="{{ $contacts->street }}">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<label for="city">City</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<input type="text" class="form-control" name="city" id="city" value="{{ $contacts->city }}">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<label for="lga">Local Government Area</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<input type="text" class="form-control" name="lga" id="lga" value="{{ $contacts->lga }}">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<label for="state">State</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<select class="form-control" id="state" name="state" value="{{ $contacts->state }}">
													@foreach($states as $state)
													<option value="{{ $state }}">{{ $state }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<label for="state_origin">State of Origin</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<select class="form-control" id="state_origin" name="state_origin" value="{{ $contacts->state_origin }}">
													@foreach($states as $state)
													<option value="{{ $state }}">{{ $state }}</option>
													@endforeach
												</select>
											</div>
											<br>
											<button class="btn btn-template-main" id="add"><i class="fa fa-plus"></i>Add</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
					<div class="modal-footer">
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
	     <!-- mODAL dEFINITION fOR aDD hIGHER iNSTITUTION -->
                        <div id="addInstitute" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header well">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3>Higher Institution</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" style="margin-left:35px;" role="form" method="POST" action="{{ url('/educationHire') }}">
                                            <input type="hidden" name="_token" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id" id="id" value="{{ Auth::User()->id }}">
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <br><br>
                                                    <label for="country">Country </label>
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-11">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-bookmark bigger-110"></i>
                                                                </span>
                                                                <select class="form-control" id="country" name="country">
                                                                    @foreach($countries as $country)
                                                                        <option value="{{$country}}">{{$country}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <br><br>
                                                    <label for="iname">Name of Higher Institution</label>
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-11">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-bookmark bigger-110"></i>
                                                                </span>
                                                                <input type="text" class="form-control" name="iname" id="iname">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="course">Course of Study</label>
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-11">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-bookmark bigger-110"></i>
                                                                </span>
                                                                <input type="text" class="form-control" name="course" id="course" name="course">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="idate">From</label>
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-11">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar bigger-110"></i>
                                                                </span>
                                                                <!--<input class="form-control data-range-picker" type="text" name="date-range-picker" id="idate" data-date-format="yyyy-mm-dd">-->
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <select class="form-control" id="ifyear" name="ifyear">
                                                                            <option value="0">Year</option>
                                                                            @for($year = 1980; $year <= 2012; $year++)
                                                                            <option value="{{ $year }}">{{ $year }}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <!-- Month -->
                                                                        <select class="form-control" id="ifmonth", name="ifmonth">
                                                                            <option value="0">Month</option>
                                                                            @foreach ($months as $key=>$month)
                                                                            <option value="{{ $key }}">{{ $month }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <!-- Day -->
                                                                        <select class="form-control" id="ifday" name="ifday">
                                                                            <option value="0">Day</option>
                                                                            @for($day = 1; $day <= 31; $day++)
                                                                            <option value="{{ $day }}">{{ $day }}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Date attended to -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="idate">To</label>
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-11">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar bigger-110"></i>
                                                                </span>
                                                                <!--<input class="form-control data-range-picker" type="text" name="date-range-picker" id="idate" data-date-format="yyyy-mm-dd">-->
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <select class="form-control" id="ieyear" name="ieyear">
                                                                            <option value="0">Year</option>
                                                                            @for($year = 1980; $year <= date('Y'); $year++)
                                                                            <option value="{{ $year }}">{{ $year }}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <!-- Month -->
                                                                        <select class="form-control" id="iemonth", name="iemonth">
                                                                            <option value="0">Month</option>
                                                                            @foreach ($months as $key=>$month)
                                                                            <option value="{{ $key }}">{{ $month }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <!-- Day -->
                                                                        <select class="form-control" id="ieday" name="ieday">
                                                                            <option value="0">Day</option>
                                                                            @for($day = 1; $day <= 31; $day++)
                                                                            <option value="{{ $day }}">{{ $day }}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="idegree">Degree Obtained</label>
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-11">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-circle bigger-110"></i>
                                                                </span>
                                                                <select class="chosen-select form-control" id="idegree" name="idegree" data-placeholder="Choose a State...">
                                                                    <option value="0">-Select-</option>
                                                                    <option value="bsc">B.Sc.</option>
                                                                    <option value="ben">B.Eng.</option>
                                                                    <option value="btech">B.Tech.</option>
                                                                    <option value="mbbs">MBBS</option>
                                                                    <option value="llb">LLB</option>
                                                                    <option value="hnd">HND</option>
                                                                    <option value="ba">B.A.</option>
                                                                    <option value="bpharm">B.Pharm.</option>
                                                                    <option value="pgd">Post Graduate (M.Sc., P.hD. etc)</option>
                                                                    <option value="others">Other</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="odegreeadd">
                                                <div class="form-group">
                                                    <label for="odegree">Enter Degree </label>
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-11">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-bookmark bigger-110"></i>
                                                                </span>
                                                                <input type="text" class="form-control" name="odegree" id="odegree">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="igrade">Grade</label>
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-11">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-tags bigger-110"></i>
                                                                </span>
                                                                <select class="chosen-select form-control" id="igrade" name="igrade" data-placeholder="Choose a State...">
                                                                    <option value="0">-Select-</option>
                                                                    <option value="1">First Class</option>
                                                                    <option value="2">Second Class Upper</option>
                                                                    <option value="3">Second Class Lower</option>
                                                                    <option value="5">Merit</option>
                                                                    <option value="6">Distinction</option>
                                                                    <option value="8">NOT APPLICABLE</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-default btn-lg">Add</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer ">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-8 col-sm-11">
                                                        <div class="input-group">
                                                            <!--<button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div id="disp">

                            </div>




                            <div class="modal fade" id="einstitute" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                            <h4>Higher Institution</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" style="margin-left:35px;" role="form" method="POST" action="{{ url('/editHireEdu') }}">
                                            <input type="hidden" name="_token" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id" id="id" value="{{ Auth::User()->id }}">
                                            
                                                                                       <div class="col-md-12">
                                                <div class="form-group">
                                                <br><br>
                                                    <label for="iname">Name of Higher Institution</label>
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-11">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-bookmark bigger-110"></i>
                                                                </span>
                                                                <input type="text" class="form-control" name="iname" id="iname" value="{{ $inst->iname }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="country">Country </label>
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-11">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-bookmark bigger-110"></i>
                                                                </span>
                                                                <select class="form-control" id="country" name="country">
                                                                    @foreach($countries as $country)
                                                                        <option value="{{$country}}">{{$country}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="course">Course of Study</label>
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-11">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-bookmark bigger-110"></i>
                                                                </span>
                                                                <input type="text" class="form-control" name="course" id="course" value="{{ $inst->course }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="idate">From</label>
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-11">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar bigger-110"></i>
                                                                </span>
                                                                <!--<input class="form-control data-range-picker" type="text" name="date-range-picker" id="idate" data-date-format="yyyy-mm-dd">-->
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <select class="form-control" id="ifyear" name="ifyear">
                                                                            <option value="0">Year</option>
                                                                            @for($year = 1980; $year <= 2012; $year++)
                                                                            <option value="{{ $year }}">{{ $year }}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <!-- Month -->
                                                                        <select class="form-control" id="ifmonth", name="ifmonth">
                                                                            <option value="0">Month</option>
                                                                            @foreach ($months as $key=>$month)
                                                                            <option value="{{ $key }}">{{ $month }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <!-- Day -->
                                                                        <select class="form-control" id="ifday" name="ifday">
                                                                            <option value="0">Day</option>
                                                                            @for($day = 1; $day <= 31; $day++)
                                                                            <option value="{{ $day }}">{{ $day }}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Date attended to -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="idate">To</label>
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-11">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar bigger-110"></i>
                                                                </span>
                                                                <!--<input class="form-control data-range-picker" type="text" name="date-range-picker" id="idate" data-date-format="yyyy-mm-dd">-->
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <select class="form-control" id="ieyear" name="ieyear">
                                                                            <option value="0">Year</option>
                                                                            @for($year = 1980; $year <= date('Y'); $year++)
                                                                            <option value="{{ $year }}">{{ $year }}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <!-- Month -->
                                                                        <select class="form-control" id="iemonth", name="iemonth">
                                                                            <option value="0">Month</option>
                                                                            @foreach ($months as $key=>$month)
                                                                            <option value="{{ $key }}">{{ $month }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <!-- Day -->
                                                                        <select class="form-control" id="ieday" name="ieday">
                                                                            <option value="0">Day</option>
                                                                            @for($day = 1; $day <= 31; $day++)
                                                                            <option value="{{ $day }}">{{ $day }}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="idegree">Degree Obtained</label>
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-11">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-circle bigger-110"></i>
                                                                </span>
                                                                <select class="chosen-select form-control" id="eidegree" name="eidegree" data-placeholder="Choose a State...">
                                                                    <option value="0">-Select-</option>
                                                                    <option value="bsc">B.Sc.</option>
                                                                    <option value="ben">B.Eng.</option>
                                                                    <option value="btech">B.Tech.</option>
                                                                    <option value="mbbs">MBBS</option>
                                                                    <option value="llb">LLB</option>
                                                                    <option value="hnd">HND</option>
                                                                    <option value="ba">B.A.</option>
                                                                    <option value="bpharm">B.Pharm.</option>
                                                                    <option value="pgd">Post Graduate (M.Sc., P.hD. etc)</option>
                                                                    <option value="others">Other</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="eodegreeadd">
                                                <div class="form-group">
                                                    <label for="odegree">Enter Degree </label>
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-11">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-bookmark bigger-110"></i>
                                                                </span>
                                                                <input type="text" class="form-control" name="odegree" id="odegree" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="igrade">Grade</label>
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-11">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-tags bigger-110"></i>
                                                                </span>
                                                                <select class="chosen-select form-control" id="eoigrade" name="eoigrade" data-placeholder="Choose a State...">
                                                                    <option value="0">-Select-</option>
                                                                    <option value="1">First Class</option>
                                                                    <option value="2">Second Class Upper</option>
                                                                    <option value="3">Second Class Lower</option>
                                                                    <option value="5">Merit</option>
                                                                    <option value="6">Distinction</option>
                                                                    <option value="8">NOT APPLICABLE</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="eogradeadd">
                                                <div class="form-group">
                                                    <label for="eograde">Enter Grade </label>
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-11">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-bookmark bigger-110"></i>
                                                                </span>
                                                                <input type="text" class="form-control" name="eograde" id="eograde">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-default btn-lg">Submit</button>
                                        </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>