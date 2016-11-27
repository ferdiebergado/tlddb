@extends('layouts.master')

@section('content')
 
<section>
<ol class="breadcrumb">
  <li><a href="{{ route('dashboard') }}">Dashboard</a></li>  
  <li class="active">{{ $pagetitle }}</li>
</ol>
</section> 
<section class="row new-participant">
	<div class="col-xs-6 col-sm-4 col-md-12">
		<!-- Optional: clear the XS cols if their content doesn't match in height -->
		<div class="well well-sm">            
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>{{ $pagetitle }}</h3></div>
				<div class="panel-body">					
					<form action="{{ route('savenewpax') }}" method="post">	
						<!-- LAST NAME -->						
						<div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
							<label for="lastname">Lastname:</label>
							<span class="label">{{ $participant->LastName }}</span>
						</div>
						<!-- FIRST NAME -->						
						<div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
							<label for="firstname">Firstname:</label>
							<input class="form-control" type="text" name="firstname" id="firstname" placeholder="First name" 

						</div>
						<!-- MIDDLE INITIAL -->						
						<div class="form-group {{ $errors->has('MI') ? 'has-error' : '' }}">			
							<label for="MI">Middle Initial:</label>								
				
						</div>
						<!-- GENDER -->						
						<div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">		
							<label for="gender">Gender:</label>	
							<select class="form-group" name="gender" id="gender">
								@foreach ($genders as $genderid => $gendername)
								<option value="{{ $genderid }}" {{ (Request::old("gender") == $genderid ? "selected":"") }}>{{ $gendername }}</option>	
								@endforeach								
							</select>
						</div>		
						<!-- DESIGNATION -->												
						<div class="form-group {{ $errors->has('designation') ? 'has-error' : '' }}">	
							<label for="designation">Designation:</label>	
							<select class="form-group" name="designation" id="designation" }}">			
								@foreach ($designations as $designation)
								<option value="{{ $designation->DesID}}" {{ (Request::old("designation") == $designation->DesID ? "selected":"") }}>{{ $designation->DesName }}</option>
								@endforeach
							</select>
						</div>
						<!-- REGION -->						
						<div class="form-group {{ $errors->has('region') ? 'has-error' : '' }}">		
							<label for="region">Region:</label>	
							<select class="form-group" name="region" id="region" onchange="{{ route('getdivisions') }}">								
								@foreach ($regions as $region)
								<option value="{{ $region->RegID }}" {{ (Request::old("region") == $region->RegID ? "selected":"") }}>{{ $region->RegName }}</option>
								@endforeach
							</select>
						</div>	
						<!-- DIVISION -->						
						<div class="form-group {{ $errors->has('division') ? 'has-error' : '' }}">		
							<label for="division">Division:</label>	
							<select class="form-group" name="division" id="division"></select>
						</div>	
						<!-- DISTRICT -->						
						<div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
							<label for="district">District:</label>
							<input class="form-control" type="text" name="district" id="district" placeholder="District" value="{{ Request::old('district') }}">
						</div>
						<!-- STATION -->						
						<div class="form-group {{ $errors->has('station') ? 'has-error' : '' }}">
							<label for="station">School/Office:</label>
							<input class="form-control" type="text" name="station" id="station" placeholder="School/Office" value="{{ Request::old('station') }}">
						</div>
						<!-- EMPLOYEE NO. -->						
						<div class="form-group {{ $errors->has('empno') ? 'has-error' : '' }}">
							<label for="empno">Employee No.:</label>
							<input class="form-control" type="text" name="empno" id="empno" placeholder="Employee No." value="{{ Request::old('empno') }}">
						</div>
						<!-- MOBILE NO. -->						
						<div class="form-group {{ $errors->has('mobileno') ? 'has-error' : '' }}">
							<label for="mobileno">Mobile No.:</label>
							<input class="form-control" type="text" name="mobileno" id="mobileno" placeholder="Mobile No." value="{{ Request::old('mobileno') }}">
						</div>
						<!-- TEL. NO. -->						
						<div class="form-group {{ $errors->has('telno') ? 'has-error' : '' }}">
							<label for="telno">Telephone No.:</label>
							<input class="form-control" type="text" name="telno" id="telno" placeholder="Telephone No." value="{{ Request::old('telno') }}">
						</div>
						<!-- EMAIL -->						
						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
							<label for="email">Email:</label>
							<input class="form-control" type="email" name="email" id="email" placeholder="Email address" value="{{ Request::old('email') }}">
						</div>
						<!-- LEARNING AREA -->						
						<div class="form-group {{ $errors->has('learningarea') ? 'has-error' : '' }}">	
							<label for="learningarea">Learning Area:</label>	
							<select class="form-group" name="learningarea" id="learningarea">		
								@foreach ($learningareas as $learningarea)
								<option value="{{ $learningarea->LAID }}" {{ (Request::old("learningarea") == $learningarea->LAID ? "selected":"") }}>{{ $learningarea->LAName }}</option>
								@endforeach
							</select>
						</div>
						<!-- LANGUAGE -->						
						<div class="form-group {{ $errors->has('language') ? 'has-error' : '' }}">	
							<label for="language">Language:</label>	
							<select class="form-group" name="language" id="language" }}">			
								@foreach ($languages as $language)
								<option value="{{ $language->LID}}" {{ (Request::old("language") == $language->LID ? "selected":"") }}>{{ $language->LanguageName }}</option>
								@endforeach
							</select>
						</div>
						<!-- PARTICIPANT TYPE -->						
						<div class="form-group {{ $errors->has('participanttype') ? 'has-error' : '' }}">
							<label for="participanttype">Participant Type:</label>	
							<select class="form-group" name="participanttype" id="participanttype" }}">	
								@foreach ($participanttypes as $participanttype)
								<option value="{{ $participanttype->PTID}}" {{ (Request::old("participanttype") == $participanttype->PTID ? "selected":"") }}>{{ $participanttype->PTName }}</option>
								@endforeach
							</select>
						</div>
						@if (!$pagemode == 3)
							<button type="submit" class="btn btn-primary">Save</button>
							<button type="reset" class="btn btn-primary">Reset</button>
							<input type="hidden" name="_token" value="{{ Session::token() }}">	
						@endif
					</form>					
				</div>
			</div>
		</div>
	</div>       
</section>
@endsection 