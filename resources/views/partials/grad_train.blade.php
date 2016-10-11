<!-- Changed the layout of the form so as to accomodate maiden name change-->
<?php
    $months = ["01" =>"January", "02" => "February", "03" => "March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "November", "12" => "December"];

    $states= [
    "0"=>"-Select-",
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
<div>
                             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                             <input type="hidden" name="id" id="id" value="{{ Auth::User()->id }}">
                                <div class="col-md-10">
                                    <div class="col-md-5">
                                       <div class="form-group">
                                            <label for="name-login">First Name</label>
                                            <input type="text" class="form-control" name="first_name" value="{{ Auth::User()->f_name }}" disabled="disabled">
                                        </div>
                                         
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="name-login">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" value="{{ Auth::User()->l_name }}" disabled="disabled">
                                        </div>
                                         
                                    </div>
                                
                                </div>
                                    <div class="col-md-10">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="middle_name">Middle Name</label>
                                            <input type="text" class="form-control" name="middle_name" id="middle_name" value="{{ Auth::User()->m_name}}">
                                        </div>
                                         
                                    </div>
                                    
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="sex">Sex</label>
                                            <select class="form-control" id="sex" name="sex">
                                                <option value="0">-Select-</option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-10" id="maiden">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="maiden_name">Maiden Name</label>
                                            <input type="text" class="form-control" name="maiden_name" id="maiden_name" value="{{ Auth::User()->maiden_name}}">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="email-login">E-Mail</label>
                                            <input type="text" class="form-control" name="email" id="email-login" value="{{ Auth::User()->email }}" disabled="disabled">
                                        </div>
                                         
                                    </div>
                                    
                                </div>

                                <div class="col-md-10">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                        <label for="marital_status">Marital Status</label>
                                        <select  class="form-control" id="marital_status" name="marital_status">
                                            <option>-Select-</option>
                                            <option value="single">Single</option>
                                            <option value="married">Married</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="id-date-picker-1">Date of Birth</label>
                                            <!--<input class="form-control date-picker" id="id-date-picker-1" name="date_of_birth" type="text" value="2016-04-04" data-date-format="yyyy-mm-dd">-->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <select class="form-control" id="birth_year" name="birth_year">
                                                        <option value="0">Year</option>
                                                        @for($year = 1980; $year <= 2012; $year++)
                                                            <option value="{{ $year }}">{{ $year }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <!-- Month -->
                                                    <select class="form-control" id="birth_month", name="birth_month">
                                                        <option value="0">Month</option>
                                                        @foreach ($months as $key=>$month)
                                                            <option value="{{ $key }}">{{ $month }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <!-- Day -->
                                                <select class="form-control" id="birth_day" name="birth_day">
                                                    <option value="0">Day</option>
                                                    @for($day = 1; $day <= 31; $day++)
                                                        <option value="{{ $day }}">{{ $day }}</option>
                                                    @endfor
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- SEX with col-md-->
                                    <div class="col-md-5">
                                       <div class="form-group">
                                            <label for="phonenumber">Phone Number</label>
                                            <input type="text" class="form-control" name="phone_number" id="phonenumber" value="{{ Auth::User()->phone_num }}">
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="state_origin">State of Origin</label>
                                            <select class="form-control" name="state_origin" id="state_origin">
                                                @foreach($states as $state)
                                                    <option value="{{ $state }}">{{ $state }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                         
                                    </div>
                                    
                                </div>

                                <div class="col-md-10">
                                    <div class="col-md-10">
                                        <div class="form-group" id="otherspec">
                                            <label for="my-dropzone">Upload Passport:&nbsp;&nbsp;</label><b class="text-danger">Passport Must not be Larger than 62kb</b>
                                            <div class="dropzone" id="my-dropzone" name="my-dropzone" >
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-10">
                                    <div class="col-md-10">
                                        
                                        <div>
                                            <button type="submit" name="btn" id="btn" class="btn btn-template-main"><i class="fa fa-check-circle"></i> Save & Continue</button>
                                        </div>
                                        <br><br>
                                    </div>
                                </div>
                                <br><br><br>
                            </div>

                            <div id="disp">
                                
                            </div>