      @extends('index')
@section('content')
        <!-- *** LOGIN MODAL END *** -->

      
        <div id="content">
            <div class="container"style="background-color:white; padding-top:50px;">


                <div class="row">
                 
                    <!-- *** LEFT COLUMN ***
			 _________________________________________________________ -->

                    <div class="col-md-12" id="customer-orders" >
				<legend>	<b> {{session('cat')}}  </b></legend><br><br>
    	@if(count($listjobs)>0)
	  <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
									
                                           
                                            <th>S/N</th>
                                            <th>REF NO</th>
                                            <th>POSITION</th>
                                            <th>QUALIFICATION</th>
                                            <th>Apply</th>
                                            
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
								<?php $index=1; ?>
									@foreach($listjobs as $job)
                                        <tr>
                                            <th>{{$index++}}</th>
                                            <td>{{$job->ref_no}}</td>
                                            <td>{{$job->position}}</td>
                                            <td>{{$job->qualification}}</td>
                                            <td>@if($job->type=="1") Graduate Trainee @else Experience Hire @endif</td>
                                            <td><a href="{{url('appliedfor')}}/{{str_replace(' ','-',$job->position)}}/{{$job->id}}/{{$job->type}}" class="btn btn-success btn-md">Apply</a></td>
                                           </tr>
									@endforeach
									</tbody>
									</table>
                                    {!! $listjobs->render() !!}

@else
	<p class="text-info text-center" style="font-size:40px; margin-top:5%; margin-bottom:7.5%;"><b> NO  OPEN POSITIONS CLICK <a href="/jobtype">HERE</a> TO GO BACK </p>


@endif


                      
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.box -->
<div class="col-md-12" style="padding-bottom:50px;"></div>
                    </div>
                    <!-- /.col-md-9 -->

                    <!-- *** LEFT COLUMN END *** -->

                    <!-- *** RIGHT COLUMN ***
			 _________________________________________________________ -->



                    <!-- *** RIGHT COLUMN END *** -->

                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** GET IT ***
_________________________________________________________ -->
@endsection