@extends('index')
@section('content')
	<script src="{{asset('js/jquery.js')}}" ></script>
<script>

@if(session()->has('notcsv') && session('notcsv')==1)
	swal('error','Only Csv Allowed','error');
@elseif(session('notcsv')==2)
	swal('Success','question successfully Uploaded','success');
	@elseif(session('notcsv')==3)
	
	swal('Error','Only Partial Upload Done','error');
//	console.log("{{session('notcsv')}}");
	@else
@endif

function populate(val){
	//alert (val());

			 if(val=="Abuja"){
				 $('#centers').html('<option value="center1">Abuja</option>');
				 
			 }
			else if(val=="Portharcourt"){
				 $('#centers').html('<option value="center1">Portharcourt</option>');
				
			}
			else if(val=="Lagos"){
				 $('#centers').html('<option value="unilag">Unilag</option>');
				
			}
			
			else {
				 $('#centers').html('<option value="center1">Kano</option>');
				
			}
			
		
	
}

//modify question
//modify question
function modified(id){
	
	//alert(id);
	//event.preventDefault;
 var question=$('#question'+id).val();	
 var option1=$('#option1'+id).val();	
 var option2=$('#option2'+id).val();	
 var option3=$('#option3'+id).val();	
 var option4=$('#option4'+id).val();	

 var correct=$('#correct'+id).val();	
 var token=$('#token'+id).val();
 
 $.post('/updatequestion',{
	 question:question,
	 option1:option1,
	 option2:option2,
	 option3:option3,
	 id:id,
	 option4:option4,
	 answer:correct,
	 _token:token
	 
	 
	 
 },function(data,status,xhr){
	 
	
	 swal('Success',data,'success');
	 window.location.reload();
	
 });
	
	
	
}



function deletequest(quesid){
	swal({   title: "Are you sure?", 
          	text: "You will not be able to recover this question!", 
			type: "warning", 
			showCancelButton: true,  
			confirmButtonColor: "#DD6B55", 
			confirmButtonText: "Yes, delete it!", 
			closeOnConfirm: false }, 
			function(){  
			$.get('/deletequestion/'+quesid,function(data,status,xhr){
		if(data=='success'){
			
				swal("Deleted!", "Question Successully Deleted", "success"); 
		        window.location.reload();
		}
		else{
			
				swal("Error", "Unable to delete question at the moment", "error"); 
		
		}
		
		
	       });
	
			
			});
	
       }



</script>
        <!-- *** LOGIN MODAL END *** -->
<?php $url=$_SERVER['PHP_SELF']; 

$url=explode('/',$url);
?>
    <?php  $states= ["1"=>"Abia","2"=>"Adamawa","3"=>"Akwa Ibom","4"=>"Anambra","5"=>"Bauchi","6"=>"Bayelsa","7"=>"Benue","8"=>"Borno","9"=>"Cross River","10"=>"Delta","11"=>"Ebonyi","12"=>"Edo","13"=>"Ekiti","14"=>"Enugu","15"=>"Abuja","16"=>"Gombe","17"=>"Imo","18"=>"Jigawa","19"=>"Kaduna","20"=>"Kano","21"=>"Katsina","22"=>"Kebbi","23"=>"Kogi","24"=>"Kwara","25"=>"Lagos","26"=>"Nasawara","27"=>"Niger","28"=>"Ogun","29"=>"Ondo","30"=>"Osun","31"=>"Oyo","32"=>"Plateau","33"=>"Rivers","34"=>"Sokoto","35"=>"Taraba","36"=>"Yobe","37"=>"Zamfara"];
		?>

        <div id="content">
            <div class="container" style="background-color:white; padding-top:50px;">


                <div class="row">
                   @include('dpr.sidebar')
                    <!-- *** LEFT COLUMN ***
			 _________________________________________________________ -->
			
								
			 	<form class="form-horizontal" action="/deleteselected" method="post">
				@if(count($questions)>0)
				
				<div >
			
			
		    
			
				
				
								<div class="col-md-5">
								<input type="hidden"id="token" name="_token" value="{{csrf_token()}}">
								
								</div>
								
								<div class="btn btn-group"><button class="btn btn-danger">Delete Selected</button>
									<div class="">
												<button  type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fw fa-file-excel-o"></i>Import Question</button>
										
										</div></div>
											
												</div>
												@endif
                    <div class="col-md-9 col-sm-8" id="customer-orders">
				        
                      <div class="">
              
							@if(count($questions)>0)
								
							

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
									
                                            <th><input type="checkbox"  id="checkall" ></th>
                                            <th>S/N</th>
                                            <th>QUSETION</th>
                                            <th>OPTION 1</th>
                                            <th>OPTION 2</th>
                                            <th>OPTION 3</th>
                                            <th>OPTION 4</th>
                                            <th>CORRECT OPTION</th>
                                            <th>EDIT/DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($questions as $question)
                                        <tr>
										
										
                                            <th><input type="checkbox" name="questions[]" value="{{$question->question_id}}"/></th>
                                            <th>{{$question->id}}</th>
                                            <td>{{$question->content}}</td>
                                            <td>{{$question->option1}}</td>
                                            <td style="text-transform:uppercase;">{{$question->option2}}</td>
                                            <td>{{$question->option2}}</td>
											<td>{{$question->option4}}</td>
                                          <!--  <td><a href="/download/{{$question->id}}" class="btn btn-template-main btn-sm"><I class="fa fa-download"></i>Download</a> </td> -->
											<td>Option {{$question->correctoption}}</td>
											<td><div class="btn-group">
  <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal{{$question->id}}" ><i class="fa fw fa-check-square"></i>E</button>
  <div id="myModal{{$question->id}}" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Edit Question</h3>
      </div>
      <div class="modal-body">
        <div >
		<h4>Question</h4>
		<input type="hidden" class="form-control" id="token{{$question->question_id}}" value="{{csrf_token()}}"  />
		<input type="text" class="form-control" id="question{{$question->question_id}}" value="{{$question->content}}"  />
		<br>
		<h4>Option One</h4>
		<input type="text" class="form-control" id="option1{{$question->question_id}}" value="{{$question->option1}}"  />
		<br>
		<h4>Option Two</h4>
		<input type="text" class="form-control" id="option2{{$question->question_id}}" value="{{$question->option2}}"  />
		<br>
		<h4>Option Three</h4>
		<input type="text" class="form-control" id="option3{{$question->question_id}}" value="{{$question->option3}}"  />
		<br>
		<h4>Option Four</h4>
		<input type="text" class="form-control" id="option4{{$question->question_id}}"  value="{{$question->option4}}"  />
		<br>
		<h4>Correct Option</h4>
		<select name="center"  id="correct{{$question->question_id}}" class="form-control">
		<option value="1">Option 1</option>
		<option value="2">Option 2</option>
		<option value="3">Option 3</option>
		<option value="4">Option 4</option>
		</select>
		<br>
		<a class="btn btn-md btn-success" style="pointer:cursor;" onclick="modified({{$question->question_id}})" value="export"><i class="fa fw fa-pencil-square-o"></i>Modify</a>
			</div>
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

  <button type="button" class="btn btn-danger btn-sm" onclick="deletequest('{{$question->question_id}}')"><i class="fa fw fa-times"></i>D</button>
</div>
                                            </td>
                                        </tr>
                                         @endforeach
										 </form>
                                    </tbody>
                                </table>
                            </div>
						@else
							<div class="col-md-12"><p class="text-center text-info "style="margin-top:10%; font-size:30px;"> @if(isset($message)) No Result Found Click  <a href="/panel" >Here</a> to return home @else No questions Yet click <a data-toggle="modal" data-target="#myModal" style="cursor:pointer">Here</a> to import question @endif</p></div>
							@endif
                            <!-- /.table-responsive -->
						<div class="pull-right">	{!! $questions->render()   !!} </div>
                        </div>
						<!-- /.table-responsive -->

                        </div>
                        <!-- /.box -->

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
		</form>
        <!-- /#content -->
<div id="myModal" class="modal fade" role="dialog" style="padding-top:10%;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Import From Excel</h4>
      </div>
      <div class="modal-body">
       <form action="csvupload" method="post" enctype="multipart/form-data" >
		<h4>Upload Question</h3>
		
		<input type="hidden" name="_token" class="form-control"  value="{{csrf_token()}}"/>
		<input type="file" name="file" class="form-control" />
		<br>
		
		<br>
		<button class="btn btn-md btn-success" ><i class="fa fw fa-file-excel-o"></i>Import Question</button>
			
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

   @endsection