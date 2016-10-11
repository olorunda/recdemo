      @extends('index')
@section('content')
        <!-- *** LOGIN MODAL END *** -->

      
        <div id="content">
            <div class="container"style="background-color:white; padding-top:50px;">


                <div class="row">
                 
                    <!-- *** LEFT COLUMN ***
			 _________________________________________________________ -->

                    <div class="col-md-12" id="customer-orders"  style="font-size:20px;">
				<legend >	<b>Application Category ,Click the Apply Button to apply </b></legend><br><br>
                <p><b> Apply for the category that best suits your qualification.</b></p>
<div class="media">
    <div class="media-left">
        <a href="#">
            <img src="{{asset('img/stdtrain.jpg')}}" style="height:100px; width:100px;" class="media-object" alt="Sample Image">
        </a>
    </div>
    <div class="media-body" style="font-size:17px;">
        <h4 class="media-heading" style="font-size:17px;">Graduate Trainee</h4>
        <p>Successful Candidates shall have the opportunity to develop specialist skills and professional competencies in Oil and Gas regulations.</p>
        <p><b>Requirements</b>
                   <p>Candidates For this category Should:
                    <ul><li>Possess<b> B.Sc/BA/B.Pharm./HND</b> in relevant Engineering and Management/Social Sciences With a Minimum of Second Class Lower or Upper Credit.</li>
                    <li>Possess<b> NYSC</b> discharged/exemption certificate.</li>
                    <li>Not More than 30 years old by <b><u>31st December,2016.</u></b></li>
                    <li>Be Computer Literate.</li></ul>
		<div class="col-md-offset-11"><a href="/available/graduate-trainee" class="btn btn-success btn-md">Apply</a></div>
	</div>
</div>


<div class="media">
    <div class="media-left">
        <a href="#">
            <img src="{{asset('img/stdtrain2.jpg')}}" style="height:100px; width:100px;" class="media-object" alt="Sample Image">
        </a>
    </div>
    <div class="media-body" style="font-size:17px;">
        <h4 class="media-heading" style="font-size:17px;">Experienced Hire</h4>
        <p>Successful Candidates shall have their career in the regulatory and monitoring of the dynamic Nigerian Oil and Gas industry with very bright prospects of attaining the peak of their professions.</p>
         <p><b>Requirements</b>
                    <p>Candidates For this category Should:
                    <ul><li>Possess a minimum of 5 years' experience from the Oil and Gas industry or any other relevant experience.</li>
                    <li>Not More than 40 years old by <b><u>31st December,2016.</u></b></li>
                    <li>Possess<b> NYSC</b> discharged/exemption certificate.</li>
                    <li>Be Computer Literate.</li></ul></p>
		<div class="col-md-offset-11"><a href="available/experience-hire" class="btn btn-success btn-md">Apply</a></div>
	</div>
</div>

                      
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