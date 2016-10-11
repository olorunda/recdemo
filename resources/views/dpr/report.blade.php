@extends('index')
@section('content')
        <!-- *** LOGIN MODAL END *** -->

    <?php  $states= ["1"=>"Abia","2"=>"Adamawa","3"=>"Akwa Ibom","4"=>"Anambra","5"=>"Bauchi","6"=>"Bayelsa","7"=>"Benue","8"=>"Borno","9"=>"Cross River","10"=>"Delta","11"=>"Ebonyi","12"=>"Edo","13"=>"Ekiti","14"=>"Enugu","15"=>"FCT","16"=>"Gombe","17"=>"Imo","18"=>"Jigawa","19"=>"Kaduna","20"=>"Kano","21"=>"Katsina","22"=>"Kebbi","23"=>"Kogi","24"=>"Kwara","25"=>"Lagos","26"=>"Nasawara","27"=>"Niger","28"=>"Ogun","29"=>"Ondo","30"=>"Osun","31"=>"Oyo","32"=>"Plateau","33"=>"Rivers","34"=>"Sokoto","35"=>"Taraba","36"=>"Yobe","37"=>"Zamfara"];
		?>

        <div id="content">
            <div class="container" style="background-color:white; padding-top:50px;">


                <div class="row">
                   @include('dpr.sidebar')
                    <!-- *** LEFT COLUMN ***
			 _________________________________________________________ -->
			 	<div class="col-md-9">
				<div class="col-md-12" style="margin-top:1%; margin-bottom:4%;">
				<h3 class="text-center  " style="text-transform:uppercase">Applicant Statistical Data's 		
			</h3> <br>
				<div class="text-center"><button class="btn btn-template-main btn-sm "id="refresh"><i class="fa fa-refresh"></i>Refresh Data</button>
			
				</div>
			
				</div>
				
				<div class="col-md-6" id="examstat" style="height: 250px;">
				<p style="font-size:20px" class="text-center">Applicant Statistics </p></div>
				
			 <div class="col-md-6" id="bar" style="height: 250px;">
			 <p style="font-size:20px">Percentage Pass/Failure </p></div>
			 
			 <div class="col-md-12" style="margin-top:50px; " ><div id="graph" style="height:250px;"></div>
			 <p style="font-size:20px" class="text-center">Applicants Per State </p></div>
			 	
			 <div class="col-md-12" style="margin-bottom:50px; " >
				<div class="col-md-6" id="examstat2" style="height: 250px;">
				<p style="font-size:20px" class="text-center">Male/Female Ratio</p></div>
					
				<div class="col-md-6" id="appregion" style="height: 250px;">
				<p style="font-size:20px" class="text-center">Apllicants per Region</p></div>
				</div>
			
			 </div>
			 
			
                    <!-- *** RIGHT COLUMN END *** -->

                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


   @endsection