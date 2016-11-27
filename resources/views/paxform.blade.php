@extends('layouts.master')
@section('content')
@include('includes.message-block')    
<section class="row new-participant">
	<div class="col-xs-6 col-sm-4 col-md-12">
		<!-- Optional: clear the XS cols if their content doesn't match in height -->
		<div class="well well-sm">            
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>{{ $pagetitle }}</h3></div>
				<div class="panel-body">					
					<form action="{{ route('savedata') }}" method="post">	
						<!-- LAST NAME -->						
						<div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
							<label for="lastname">Lastname:</label>
							<input class="form-control" type="text" name="lastname" id="lastname" placeholder="Last name" 
							@if ($participant <> '')
							value="{{ Request::old('lastname',$participant->LastName) }}"
							@endif
							>							
						</div>
						<!-- FIRST NAME -->						
						<div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
							<label for="firstname">Firstname:</label>
							<input class="form-control" type="text" name="firstname" id="firstname" placeholder="First name" 
							@if ($participant <> '')
							value="{{ Request::old('firstname',$participant->FirstName) }}"
							@endif
							>
						</div>
						<!-- MIDDLE INITIAL -->						
						<div class="form-group {{ $errors->has('MI') ? 'has-error' : '' }}">			
							<label for="MI">Middle Initial:</label>								
							<input class="form-control" type="text" name="MI" id="MI" placeholder="Middle Initial" 
							@if ($participant <> '')
							value="{{ Request::old('MI',$participant->MI) }}"
							@endif
							>
						</div>
						<!-- GENDER -->						
						<div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">		
							<label for="gender">Gender:</label>	
							<select class="form-group" name="gender" id="gender">
								@foreach ($genders as $genderid => $gendername)
								<option value="{{ $genderid }}" 
								@if ($participant <> '')
								{{ (Request::old("gender",$participant->Gender) == $genderid ? "selected":"") }}
								@endif
								>{{ $gendername }}</option>	
								@endforeach								
							</select>
						</div>		
						<!-- DESIGNATION -->												
						<div class="form-group {{ $errors->has('designation') ? 'has-error' : '' }}">	
							<label for="designation">Designation:</label>	
							<select class="form-group" name="designation" id="designation" }}">			
								@foreach ($designations as $designation)
								<option value="{{ $designation->DesID}}" 
								@if ($participant <> '')
								{{ (Request::old("designation",$participant->designation->DesID) == $designation->DesID ? "selected":"") }}
								@endif
								>{{ $designation->DesName }}</option>
								@endforeach
							</select>
						</div>
						<!-- REGION -->						
						<div class="form-group {{ $errors->has('region') ? 'has-error' : '' }}">		
							<label for="region">Region:</label>	
							<select class="form-group" name="region" id="region" onchange="{{ route('getdivisions') }}">								
								@foreach ($regions as $region)
								<option value="{{ $region->RegID }}"
								@if ($participant <> '') 
								{{ (Request::old("region",$participant->region->RegID) == $region->RegID ? "selected":"") }}
								@endif
								>{{ $region->RegName }}</option>
								@endforeach
							</select>
						</div>	
						<!-- DIVISION -->						
						<div class="form-group {{ $errors->has('division') ? 'has-error' : '' }}">		
							<label for="division">Division:</label>	
							<select class="form-group" name="division" id="division">
								@foreach ($divisions as $division)
								<option value="{{ $division->DivID }}" 
								@if ($participant <> '')
								{{ (Request::old("division",$participant->division->DivID) == $division->DivID ? "selected":"") }}
								@endif
								>{{ $division->DivName }}</option>
								@endforeach
							</select>
						</div>	
						<!-- DISTRICT -->						
						<div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
							<label for="district">District:</label>
							<input class="form-control" type="text" name="district" id="district" placeholder="District" 
							@if ($participant <> '')
							value="{{ Request::old('district',$participant->District) }}"
							@endif
							>
						</div>
						<!-- STATION -->						
						<div class="form-group {{ $errors->has('station') ? 'has-error' : '' }}">
							<label for="station">School/Office:</label>
							<input class="form-control" type="text" name="station" id="station" placeholder="School/Office" 
							@if ($participant <> '')
							value="{{ Request::old('station',$participant->Station) }}"
							@endif
							>
						</div>
						<!-- EMPLOYEE NO. -->						
						<div class="form-group {{ $errors->has('empno') ? 'has-error' : '' }}">
							<label for="empno">Employee No.:</label>
							<input class="form-control" type="text" name="empno" id="empno" placeholder="Employee No." 
							@if ($participant <> '')
							value="{{ Request::old('empno',$participant->EmpNo) }}"
							@endif
							>
						</div>
						<!-- MOBILE NO. -->						
						<div class="form-group {{ $errors->has('mobileno') ? 'has-error' : '' }}">
							<label for="mobileno">Mobile No.:</label>
							<input class="form-control" type="text" name="mobileno" id="mobileno" placeholder="Mobile No." 
							@if ($participant <> '')
							value="{{ Request::old('mobileno',$participant->Mobile) }}"
							@endif
							>
						</div>
						<!-- TEL. NO. -->						
						<div class="form-group {{ $errors->has('telno') ? 'has-error' : '' }}">
							<label for="telno">Telephone No.:</label>
							<input class="form-control" type="text" name="telno" id="telno" placeholder="Telephone No." 
							@if ($participant <> '')
							value="{{ Request::old('telno',$participant->TelNo) }}"
							@endif
							>
						</div>
						<!-- EMAIL -->						
						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
							<label for="email">Email:</label>
							<input class="form-control" type="email" name="email" id="email" placeholder="Email address" 
							@if ($participant <> '')
							value="{{ Request::old('email',$participant->Email) }}"
							@endif
							>
						</div>
						@if (($pagemode == 1) || ($pagemode == 2))
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
						@endif
						@if ($pagemode == 3)
						<label>Events Attended:</label>
						<span hidden="true">{{ $j=1 }}</span>
						<div class="table-responsive" style="overflow: auto;">
							<table class="table table-bordered table-condensed">
								<tr>
									<th width="1%" text-align="center" class="info text-center">#</th>
									<th width="20%" class="info text-center">EVENT</th>
									<th width="10%" class="info text-center">LEARNING AREA</th>
									<th width="10%" class="info text-center">LANGUAGE</th>
									<th width="10%" class="info text-center">ROLE</th>
									@if (Auth::user()->role == 1)
									<th width="5%" class="info text-center">ACTION</th>
									@endif
								</tr>
								@if (!empty($transactions))
								@foreach ($transactions as $transaction)
								<tr>
									<td align="center">{{ $j++ }}</td>
									<td>
										<strong>{{ $transaction->event->EventTitle }} </strong>
										<em>
											<br>{{$transaction->event->EventVenue}}
											<br>{{ $transaction->event->EventDate  }}
										</em>
									</td>
									<td align="center">{{ is_null($transaction->LAID) ? "[Unspecified]":$transaction->learning_area->LAName }}</td>
									<td align="center">{{ is_null($transaction->LID) ? "[Unspecified]":$transaction->language->LanguageName }}</td>
									<td align="center">{{ is_null($transaction->PTID) ? "[Unspecified]":$transaction->participant_type->PTName }}</td>
									@if (Auth::user()->role == 1)
									<td align="center"><a href="{{ $transaction->TransactID }}">Change</a>
										@endif
									</td>
								</tr>
								@endforeach
								@endif
							</table>
						</div>						
						@endif
						@if (Auth::user()->role == 1)
						<input type="hidden" name="pagemode" value="{{ $pagemode }}">
						<button type="submit" class="btn btn-primary">Save</button>				
						<input type="hidden" name="_token" value="{{ Session::token() }}">
						@endif
					</form>					
				</div>
			</div>
		</div>
	</div>       
</section>
@endsection