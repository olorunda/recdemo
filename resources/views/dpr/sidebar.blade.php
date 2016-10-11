 <div class="col-md-3 col-sm-4">



	<!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                        <div class="panel panel-default sidebar-menu">

                            <div class="panel-heading" >
                                <h3 class="panel-title"style="width:100%">Admin Panel             </h3>
                            </div>

                            <div class="panel-body">

                                <ul class="nav nav-pills nav-stacked">
								<div class="form-group">
								<input type="text" class="form-control" id="examnum" placeholder="Exam Number or Name"><button class="btn btn-success" onclick="searchname()" >Search</button>
								</div>
									@if (is_active('report'))
								<b><h4>Report Filter</h4></b>
								
				<select class="form-control" id="reporttype" style="margin-bottom:20px;">
				<option value="0">-Select-</option>
				<option value="0">All</option>
				@if(count($jobs)>0)
					@foreach($jobs as $job)
				<option value="{{$job->id}}">{{$job->position}}</option>
				@endforeach
				@endif
				</select>
				@endif
								
								<b><h4>Manage Applicant Details</h4></b>
								 <li class="{{ active('panel') }}">
                                        <a href="{{url('panel')}}"><i class="fa fa-home"></i> Home</a>
                                    </li>
                                    <li class="{{ active('manageposition') }}">
                                        <a href="{{url('/manageposition')}}"><i class="fa fa-pencil "></i>Manage Positions</a>
                                    </li>
									<li class="{{ active('examscore') }}">
                                        <a href="{{url('/examscore')}}"><i class="fa fa-superscript"></i>View Exam Score</a>
                                    </li>
									<li class="{{ active('allquestion') }}">
                                        <a href="{{url('/allquestion')}}"><i class="fa fa-superscript"></i>Manage Test</a>
                                    </li>
                                    <li class="{{ active('sortapp') }}">
                                        <a href="{{url('/sortapp')}}"><i class="fa fa-sort-alpha-asc"></i>Sorted Applicants</a>
                                    </li>
									<li class="{{ active('addapplicant') }}">
                                        <a href="{{url('/addapplicant')}}"><i class="fa fa-plus "></i>Add Applicant</a>
                                    </li>
									<li class="{{ active('mailapplicants') }}">
                                        <a  style="cursor:pointer" data-toggle="modal" data-target="#quickmail"><i class="fa fa-envelope "></i>Mail Applicants</a>
                                    </li>
									<li class="{{ active('report') }}">
                                        <a href="{{url('/report')}}"><i class="fa fa-microphone "></i>Report</a>
                                    </li>
									<b><h4>Search Filter</h4></b>
									<form class="form-horizontal" id="searchapp">
									
									<p>State</p> 
									<select class="form-control" style="margin-bottom:4px;" name="state" id="state">
										<option value="all">All</option>
									<?php foreach($states as $state): ?>
									<option ><?php echo $state ?></option>
									<?php endforeach; ?>
									</select>
									<p>Region</p> 
									<select class="form-control" style="margin-bottom:4px;" name="region" id="region">
									<option value="all">All</option>
									<option value="Abuja">Abuja</option>
									<option value="Portharcourt">Portharcourt</option>
									<option value="Lagos">Lagos</option>
									<option value="Kano">Kano</option>
									</select>

									<p>Sex</p> 
									<select class="form-control" style="margin-bottom:4px;" name="sex" id="sex">
									<option value="all">All</option>
									<option value="M">Male</option>
									<option value="F">Female</option>
									</select>
									
									<p>Status</p> 
									<select class="form-control" style="margin-bottom:4px;" name="status" id="status">
									<option value="all">All</option>
									<option value="1">Accepted</option>
									<option value="2">Rejected</option>
									</select>
									
									<p>Grade</p>
                                                        <select class="chosen-select form-control" id="grade" >
                                                      
                                                                <option value="all">All</option>
                                                                <option value="1">First Class</option>
                                                                <option value="2">Second Class Upper</option>
                                                                <option value="3">Second Class Lower</option>
                                                              
                                                                <option value="5">Merit</option>
                                                                <option value="6">Distinction</option>
                                                               
                                                        </select>

										
									<p>Age</p>
									<div class="col-md-12" style="margin-left:-30px;">
									<div class="col-md-6">
									<select class="form-control" style="margin-bottom:4px;" name="age" id="age">
									
									@for($i=18;  $i<=30; $i++)
									<option value="{{$i}}" >{{$i}}</option>
									@endfor
									</select>
									</div>
									<span style="margin-right:25px">To</span>&nbsp;
									<div class="col-md-6">
									<select class="form-control" style="margin-top:-22px; margin-left:20px;" name="ageto" id="ageto">
									@for($i=18;  $i<=30; $i++)
									<option value="{{$i}}" >{{$i}}</option>
									@endfor
									</select>
									</div>
									</div>
									
									<p>Score</p>
									<div class="col-md-12" style="margin-left:-30px;">
									<div class="col-md-6">
									<select class="form-control" style="margin-bottom:4px;" name="score" id="scorefrom">
									
									@for($i=10;  $i<=100; $i=$i+10)
									<option value="{{$i}}" >{{$i}}</option>
									@endfor
									</select>
									</div>
									<span style="margin-right:25px">To</span>&nbsp;
									<div class="col-md-6">
									<select class="form-control" style="margin-top:-22px; margin-left:20px;" name="scoreto" id="scoreto">
									@for($i=10;  $i<=100; $i=$i+10)
									<option value="{{$i}}" >{{$i}}</option>
									@endfor
									</select>
									</div>
									</div>
									
									
									<div class="pull-right" style="margin-top:10px;">
									<input type="submit" class="btn btn-success btn-md" value="Search" />
									</div>
									</form>
                                </ul>
                            </div>

                        </div>
                        <!-- /.col-md-3 -->
                       <!-- *** CUSTOMER MENU END *** -->
                    </div>