@extends('layouts.pdfmaster')
@section('content')
<div class="col-md-12">
<h2>{{ $event->EventTitle }}</h2>
  <div class="table-responsive" style="overflow: auto;">
    <table class="table table-bordered table-condensed">
      <tr>        
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
      @foreach ($participants as $participant)                  
      <tr>      
        <td>{{ strtoupper($participant->LastName) }}, {{ strtoupper($participant->FirstName) }} {{ strtoupper(str_replace('.','',$participant->MI)) }}.</td>
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
    </div>
    @endif
  </div>      

</div><!-- /.col-lg-6 -->    
<htmlpagefooter name="page-footer">
    {PAGENO}
</htmlpagefooter>
</section>
<script>
  var token = '{{ Session::token() }}';
</script>
@endsection