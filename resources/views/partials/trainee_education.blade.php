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
<!-- Changed on 30/08/2016 changed the date attended format-->
<!-- Added more categories to grade and degree-->


    
    <!-- Add the Add new entry button here -->
    <div class="col-md-10">
        <div class="form-group">
            <br>
            <p class="lead" style="margin-bottom:10px;">Higher Institution</p>
        </div>
    </div>
    <div class="col-md-10" >
        <div class="row">
            <div class="col-xs-8 col-sm-11">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addInstitute"><i class="fa fa-plus"></i> Add New Entry</button>
            </div>
        </div>
 
    
   

		@if(count($institute)>0)
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
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#einstitute"><i class="fa fa-edit"></i> Edit</button>
                                        @else
                                        <form class="inline-form" action="{{ url('/deleteHireEdu')}}/{{ $inst->iname }}" method="POST">
                                                    <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
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
 <!--display the table here -->
    <div class="row" style="margin-top:30px; margin-left:-20px;">
           <div class="col-md-12 col-lg-12">
               <div class="col-xs-12 col-sm-12">
                   <h3 class="text-warning">No result Found! Add a new entry to get started</h3>
               </div>
           </div>
       </div> 
      @endif
    <div>
                             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                             <input type="hidden" name="id" id="id" value="{{ Auth::User()->id }}">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <br>
                                        <p class="lead" style="margin-bottom:10px;">Secondary School</p>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="sname">Name of Secondary School</label>
                                            <div class="row">
                                                <div class="col-xs-8 col-sm-11">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-bookmark bigger-110"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="sname" id="sname">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="idate">From</label>
                                            <div class="row">
                                                <div class="col-xs-8 col-sm-11">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar bigger-110"></i>
                                                            </span>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <select class="form-control" id="sfyear" name="sfyear">
                                                                    <option value="0">Year</option>
                                                                    @for($year = 1980; $year <= 2012; $year++)
                                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <!-- Month -->
                                                                <select class="form-control" id="sfmonth", name="sfmonth">
                                                                    <option value="0">Month</option>
                                                                    @foreach ($months as $key=>$month)
                                                                        <option value="{{ $key }}">{{ $month }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <!-- Day -->
                                                            <select class="form-control" id="sfday" name="sfday">
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
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="idate">To</label>
                                            <div class="row">
                                                <div class="col-xs-8 col-sm-11">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar bigger-110"></i>
                                                        </span>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <select class="form-control" id="seyear" name="seyear">
                                                                    <option value="0">Year</option>
                                                                    @for($year = 1980; $year <= date('Y'); $year++)
                                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <!-- Month -->
                                                                <select class="form-control" id="semonth", name="semonth">
                                                                    <option value="0">Month</option>
                                                                    @foreach ($months as $key=>$month)
                                                                        <option value="{{ $key }}">{{ $month }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <!-- Day -->
                                                            <select class="form-control" id="seday" name="seday">
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
                                            <label for="sdegree">Degree Obtained</label>
                                            <div class="row">
                                                <div class="col-xs-8 col-sm-11">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-circle bigger-110"></i>
                                                        </span>
                                                        <select class="chosen-select form-control" id="sdegree" name="sdegree" data-placeholder="Choose a State...">
                                                                <option value="0">-Select-</option>
                                                                <option value="waec">WAEC</option>
                                                                <option value="neco">NECO</option>
                                                                <option value="gce">GCE</option>
                                                                 <option value="gce">Combined Result</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
									
                                            <label for="my-dropzone-files">Upload in the following order:&emsp; <li>N.Y.S.C Discharge/ exemption  Certificate </li><li> Higher Institution Certificate</li><li> Secondary School leaving Certificate</li> @if(Auth::user()->jobcat==2) <li>Certificate from recognised professional bodies</li><li>Evidence of Previous experience</li> @endif </label>
                                            <div class="dropzone" id="my-dropzone-files" name="my-dropzone-files">
                                                
                                            </div>
                                        </div>
                                </div>

                                <div class="col-md-10">
                                   
                                        <div >
                                            <button type="submit" name="btn" id="btned" class="btn btn-template-main"><i class="fa fa-check-circle"></i> Save & Continue</button>
                                        </div>
                                        <br><br>
                                    </div>
                                </div>
                                <br><br><br>


                                

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
                                                                <select class="chosen-select form-control" id="oigrade" name="oigrade" data-placeholder="Choose a State...">
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
                                            <div class="col-md-12" id="ogradeadd">
                                                <div class="form-group">
                                                    <label for="ograde">Enter Grade </label>
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-11">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-bookmark bigger-110"></i>
                                                                </span>
                                                                <input type="text" class="form-control" name="ograde" id="ograde">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-default btn-lg">Submit</button>
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
                            <!-- Modal to Edit Higher institution data -->
                            <div class="modal fade" id="einstitute" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                            <h4>Higer Institution</h4>
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
                                                                <input type="text" class="form-control" name="iname" id="iname" value="@if(isset($inst->iname)) {{$inst->iname}} @endif" >
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
                                                                <input type="text" class="form-control" name="course" id="course" value="@if(isset($inst->iname)) {{$inst->course}} @endif">
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