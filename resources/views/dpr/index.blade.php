
@extends('index')
@section('content')
        <section>
            <!-- *** HOMEPAGE CAROUSEL ***
 _________________________________________________________ -->

            <div class="home-carousel">

                <div class="dark-mask"></div>

                <div class="container">
                    <div class="homepage owl-carousel">
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-7">
                                    <img class="img-responsive" src="{{asset('img/banners/worker1.jpg')}}" alt="">
                                </div>
                                <div class="col-sm-5">
                                    <h1>Department of Petroleum Resources</h1>
                                    <p>The Regulatory Body Of Oil And Gas Industry In Nigeria</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-5 right">
                                    <h1>Graduate Trainees </h1>
                                    <h1>Experienced Hire</h1>
                                    <p>Candidates are required to fill their application online using the DPR Application Portal. Please follow the instructions to fill in your application.</p>
                                </div>
                                <div class="col-sm-7">
                                    <img class="img-responsive" src="{{asset('img/banners/graduation.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-5 right">
                                    <h1>Complete your application</h1>
                                    <p> Candidates are required to read the instructions below carefully before registration.</p>
                                </div>
                                <div class="col-sm-7">
                                    <img class="img-responsive" src="{{asset('img/banners/oilandgas.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.project owl-slider -->
                </div>
            </div>

            <!-- *** HOMEPAGE CAROUSEL END *** -->

            <section class="bar background-white statement" >
            <div class="container">
                <div class="col-md-12">
                    <div class="heading text-center">
                        <h3><b>Recruitment Of Graduate Trainees/Experienced Professionals</b></h3>
                    </div>
                    <div>
					<div style="font-size:20px">
                    <p>The Department of Petroleum Resources<b>(DPR)</b>, in line with its regulatory mandate of ensuring sustainable development of Nigeria's oil and gas resources hereby invites applications from suitably qualified University/Polytechnic Graduates as well as experienced and skilled professionals to fill the underlisted vacancies:</p>
                    <p>1.<b> Graduate Trainees<br></b>
                    Successful applicants shall have the opportunity to develop specialist skills and professional competencies in oil/gas regulations and supervision during their career.</p>
                    <p> <b>Requirements</b>
                    <p>Candidates For this category Should:
                    <ul><li>Possess<b> B.Sc/BA/B.Pharm./HND</b> in relevant Engineering and Management/Social Sciences With a Minimum of Second Class Lower or Upper Credit.</li>
                    <li>Possess<b> N.Y.S.C</b> discharged/exemption Certificate.</li>
                    <li>Not More than 30 years old by <b><u>31st December,2016.</u></b></li>
                    <li>Be Computer Literate.</li></ul>
                    <br><br>
                    <p>2.<b> Experienced Hire<br></b>
                    Successful candidates shall have their career in the regulatory and monitoring of the dynamic Nigerian Oil and Gas industry with very bright prospects of attaining the peak of their profession.</p>
                    <p> <b>Requirements</b>
                    <p>Candidates For this category Should:
                    <ul><li>Possess a minimum of 5 years' experience from the Oil and Gas industry or any other relevant experience.</li>
                    <li>Not More than 40 years old by <b><u>31st December,2016.</u></b></li>
                    <li>Possess<b> NYSC</b> discharged/exemption certificate.</li>
                    <li>Be Computer Literate.</li></ul>
                    </div>
					</div>

        </section>

       

            <section class="bar background-white no-mb">
                <div class="container" data-animate="fadeInUpBig">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading text-center">
                                <h2>Method Of Application</h2>
                            </div>

                                <div class="statement" style="font-size:20px;">
                                <p>Candidates are required to have the following available for registration:<ul> <li>Scanned copy of a Passport Photograph.</li> 
                                <li>Scanned copy of Certificates (N.Y.S.C Discharge/Exemption certificate, Higher Institution Certificate, SSCE Certificate).</li>
                                <li>Scanned copy of any other necessary supporting documents. </li></ul></p>
                                
                    <p>Candidates are required to fill their application online through the <b> DPR Application Portal</b>. Please follow the instructions to fill in your application:</p>
                   <p> <ul><li>Only Applications in respect of the advertised positions would be considered. All applicants are expected to apply for <b>ONLY ONE </b>position.</p></li>
                   <p> <li>Multiple applications by any candidate for more than one job would be <b>DISQUALIFIED.</b></li></p>
                   <p><li>Upon Submission, applicants would receive an acknowledgment containing a reference number which should be quoted in all future correspondences.</li></p> 
                   <p> <b><li>Deadline for Submission of application is six weeks from the date of this publication. Only Shortlisted candidates will be invited for interview.</b></li></p>
                        
            </div>
                        </div>

                    </div>
                </div>
            </section>

     
        <!-- ***PORTFOLIO STARTS*** -->

        <section class="bar background-white no-mb">
            <div class="container" data-animate="fadeInUpBig">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading text-center">
                            <h2>Our portfolio</h2>
                        </div>

                        <div class="row portfolio">
                            <div class="col-sm-4">
                                <div class="box-image">
                                    <div class="image">
                                        <img src="{{asset('img/portfolio/tsabanner1.jpg')}}" alt="" class="img-responsive">
                                    </div>
                                    <div class="bg"></div>
                                    <div class="name">
                                        <h3><a href="portfolio-detail.html">Payment Portal</a></h3> 
                                    </div>
                                    <div class="text">
                                        <p class="buttons">
                                            <a href="https://dpr.gov.ng/index/payments-to-dpr-tsa-account/" target="_blank" class="btn btn-template-transparent-primary">View</a>
                                            <a href="https://dpr.gov.ng/index/payments-to-dpr-tsa-account/" target="_blank" class="btn btn-template-transparent-primary" id="web">Website</a>
                                        </p>
                                    </div>
                                </div>
                                <!-- /.item -->

                            </div>

                            <div class="col-sm-4">
                                <div class="box-image">
                                    <div class="image">
                                        <img src="img/portfolio/listref.jpg" alt="" class="img-responsive">
                                    </div>
                                    <div class="bg"></div>
                                    <div class="name">
                                        <h3><a href="portfolio-detail.html">Private Sectors</a></h3> 
                                    </div>
                                    <div class="text">
                                        <p class="buttons">
                                            <a href="upload/List-of-Private-Refineries-Licences.pdf" target="_blank" class="btn btn-template-transparent-primary">View</a>
                                            <a href="upload/List-of-Private-Refineries-Licences.pdf" target="_blank" class="btn btn-template-transparent-primary" id="web">Website</a>
                                        </p>
                                    </div>
                                </div>
                                <!-- /.item -->

                            </div>

                            <div class="col-sm-4">
                                <div class="box-image">
                                    <div class="image">
                                        <img src="{{asset('img/portfolio/hsebanner.jpg')}}" alt="" class="img-responsive">
                                    </div>
                                    <div class="bg"></div>
                                    <div class="name">
                                        <h3><a href="portfolio-detail.html">HSE Conference</a></h3> 
                                    </div>
                                    <div class="text">
                                        <p class="buttons">
                                            <a href="http://oghseconf.com.ng/main/HSE" target="_blank" class="btn btn-template-transparent-primary">View</a>
                                            <a href="http://oghseconf.com.ng/main/HSE" target="_blank" class="btn btn-template-transparent-primary" id="web">Website</a>
                                        </p>
                                    </div>
                                </div>
                                 <!-- ***PORTFOLIO END*** -->
                                <!-- /.item -->

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>


    </div>


    <!-- /#all -->

    <!-- #### JAVASCRIPT FILES ### -->

 

    
       @endsection