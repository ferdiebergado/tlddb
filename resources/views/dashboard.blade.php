@extends('layouts.master')
@section('content')
@include('includes.message-block')    
<section class="panel-default">
  <div class="panel-heading"><h4>Participants</h4></div>
  <div class="panel-body">
    <div class="col-lg-6">
      <form action="{{ route('search') }}" method="get">
        <div class="input-group">
          <input type="text" name="searchitem" id="searchitem" class="form-control" placeholder="Search database..." value="{{ Request::old('searchitem') }}">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Search</button>
          </span>        
        </div><!-- /input-group -->
      </form>
      <br>
      <form action="{{ route('events') }}" method="get">
        <div class="form-group {{ $errors->has('event') ? 'has-error' : '' }}"> 
          <label for="event">EVENT:</label>  
          <select class="form-group" name="event" id="event" onchange="this.form.submit()">     
            <!-- <option value="999">All</option> -->
            @foreach ($events as $event)
            <option value="{{ $event->EventID }}" {{ ($event->EventID == $eventid ? "selected":"") }}>{{ $event->EventTitle }}</option>
            @endforeach
          </select>                        
        </div>
      </form>
    </div>
    <div class="col-md-12">
      <div class="table-responsive" style="overflow: auto;">
        <table class="table table-bordered table-condensed">
          <tr>
            <th width="1%" text-align="center" class="info text-center">#</th>
            <th width="20%" class="info text-center">NAME</th>                    
            <th width="1%" class="info text-center">M/F</th>              
            <th width="15%" class="info text-center">DESIGNATION</th>
            <th width="15%" class="info text-center">OFFICE/SCHOOL</th>
            <th width="5%" class="info text-center">REGION</th>
            <th width="10%" class="info text-center">DIVISION</th>
            @if (Auth::user()->role == 3)
            <th width="5%" class="info text-center">MOBILE</th>
            <th width="10%" class="info text-center">EMAIL</th>
            @else
            <th width="15%" class="info text-center" colspan="3">ACTIONS</th>
            @endif
          </tr>          
          @if ($participants->currentPage() == 1) 
          <span hidden="true">{{ $i = 1 }}</span>
          @else
          <span hidden="true">{{ $i = ($participants->currentPage() * 10) + 1 }}</span>
          @endif
          @foreach ($participants as $participant)            
          <tr>
            <td class="info" align="center">{{ $i++ }}</td>
            <td><a href="{{ url('paxform') }}/pagemode/3/pid/{{ $participant->PIN }}">{{ strtoupper($participant->LastName) }}, {{ strtoupper($participant->FirstName) }} {{ strtoupper(str_replace('.','',$participant->MI)) }}.</a></td>
            <td align="center">{{ $participant->Gender }}</td>
            <td>{{ $participant->designation->DesName }}</td>
            <td>{{ $participant->Station }}</td>
            <td align="center">{{ $participant->region->RegName}}</td>             
            <td align="center">{{ $participant->division->DivName }}</td>
            @if (Auth::user()->role == 3)
            <td align="center">{{ $participant->Mobile }}</td>
            <td align="center">{{ $participant->Email }}</td>
            @endif
            @if (Auth::user()->role == 1)            
            @if ($eventid == '*')
            <td align="center"><a href="{{ url('paxform') }}?pagemode=2?pid={{ $participant->PIN }}">Add to Event</a></td>
            @endif            
            <td align="center"><a href="{{ $participant->PIN }}">Edit</a></td>            
            <td align="center"><a href="{{ $participant->PIN }}">Delete</a></td>
            @endif
          </tr>
          @endforeach           
        </table>        
        @if (Auth::user()->role == 1)
        <div> 
          <a class="button button-default" href="{{ url('paxform') }}/pagemode/1/pid/0" role="button">Add new participant...</a>
          @endif
          <p class="text-right">
            <a class="button button-default" href="{{ url('download') }}/event/{{ $eventid }}" role="button">Download
            </a>
          </p>
        </div>
        <div>{{ $participants->links() }}</div>
      </div>      

    </div><!-- /.col-lg-6 -->    
  </section>
  <script>
    var token = '{{ Session::token() }}';
  </script>
  @endsection