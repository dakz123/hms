@extends('layouts.admin')
@section('contents')

    <div class="card">
        <div class="card-header">
            
                
        <div class="col-12 col-sm-4 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="departement" id="departement" class="custom-select" >
            <option value="">Select Specialisation</option>
            @foreach($speclisations as $row )
            <option value="{{$row->specialisation}}">{{$row->specialisation}}</option>
            @endforeach
            </select>
             
        </div>
        
        <div class="card-body">
        <div class="alert" id="message_status" style="display: none"></div>
        <ul>
        
        </ul>
        <link rel='stylesheet' href='https://fullcalendar.io/js/fullcalendar-3.1.0/fullcalendar.min.css' />
            <div id='calendar'></div>


        </div>
    </div>
@endsection

    
@section('scripts') 
@parent
<script src='https://fullcalendar.io/js/fullcalendar-3.1.0/lib/moment.min.js'></script>

<script src='https://fullcalendar.io/js/fullcalendar-3.1.0/fullcalendar.min.js'></script>


<script>
    $(document).ready(function() {

// page is now ready, initialize the calendar...



$(document).on('change', '#departement', function(e) { 
    e.preventDefault();
    
    var data={
       'dep':$('#departement').val()
    }
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $.ajax({
        type: "post",
        url: "/calendar_view",
        data: data,
        dataType: "json",
        
        success: function (response) {
        if(response.events!=null){
         events=response ;
         $('#calendar').fullCalendar( 'destroy' );
        $('#calendar').fullCalendar({
    // put your options and callbacks here
    left:   'Calendar',
    center: '',
    right:  'today prev,next',
    events:events,
}); 
        }
        else
        
        //$('#message_status').html("No Appoinments Available!!");
        $('#calendar').fullCalendar( 'destroy' );
        }
      
    });
    
});

    
    



});
</script>
@stop