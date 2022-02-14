@extends('layouts.admin')
@section('contents')

<div class="card">

        <div class="card-header">
            
        </div>

        <div class="card-body">
        <div class="alert" id="message_status" style="display: none"></div>
      <form action="" method="post" id="my_form" >
      
          <div class="row">
              <div class="col-sm-4">
              <label for="specialisation">Specialisation:</label>
              <select name="specialisation" id="specialisation" class="form-control" style="color:white">
              <option value="">Select Specialisation</option>
              <option value="general">General Health</option>
              <option value="cardiology">Cardiology</option>
              <option value="dental">Dental</option>
              <option value="neurology">Neurology</option>
              <option value="orthopaedics">Orthopaedics</option>
            </select>  
              </div>
              <div class="col-sm-4">
              <label for="specialisation">Doctor:</label>
                  <input type="text" class="form-control" name="doctor_name" id="doctor_name"  style="color:white"/>
              </div>
              <div class="col-sm-4 ">
              <label for="specialisation" style="color:#212121" >:</label>
              <input type="submit" class=" add_data form-control btn btn-dark  " value="Save">
              </div>
              
              </div>
                  
              
      </form>

        </div>
    </div>
    @endsection
    @section('scripts')
    <script>
   $(document).on('click', '.add_data', function (e) {
  e.preventDefault();
  
 
  var data={
       'specialisation':$('#specialisation').val(),
       'doctor_name':$('#doctor_name').val(),
      
     }
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
$.ajax({
  type: "post",
  url: "/doctor",
  data: data,
  dataType:'json',
  success: function (response) {
    $("#my_form")[0].reset();
    console.log(response); 
    $('#message_status').css('display', 'block');
  $('#message_status').html(response.message);
    
  }
});


});
  </script>

    @endsection

         
