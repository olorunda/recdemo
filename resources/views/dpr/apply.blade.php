@extends('index')
@section('content')

        <div id="content">
            <div class="container"style="background-color:white; padding-top:50px;">


                <div class="row">
                 
                    <!-- *** LEFT COLUMN ***
			 _________________________________________________________ -->

                    <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <h2 class="text-uppercase">New Application - {{$title}}</h2>

                            <p class="lead"><b>WARNING!!!</b></p>
                            <p class="" style="color:red; font-size:30px" >
                                Candidates can only apply for one opening.
                            </p>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                    
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        </div>
                    </div>

                </div>

                    <div class="col-md-10" id="customer-orders" >
                        
				      
				            @include('partials.grad_train')
				      
                      
                            <!-- /.table-responsive -->
                        <div class="space"></div>
                    </div>

                </div>

                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** GET IT ***
_________________________________________________________ -->
@endsection