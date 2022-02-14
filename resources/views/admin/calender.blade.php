@extends('layouts.admin')
@section('contents')

    <div class="card">
        <div class="card-header">
            
        </div>

        <div class="card-body">
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

$('#calendar').fullCalendar({
    // put your options and callbacks here
    left:   'Calendar',
    center: '',
    right:  'today prev,next',
   
})

});
</script>
@stop