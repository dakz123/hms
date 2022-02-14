<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
      <div class="alert" id="message_status" style="display: none"></div>
      <form  method="post"  id="my_form">
        
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email address..">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" id="date" name="date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="departement" id="departement" class="custom-select">
              <option value="general">General Health</option>
              <option value="cardiology">Cardiology</option>
              <option value="dental">Dental</option>
              <option value="neurology">Neurology</option>
              <option value="orthopaedics">Orthopaedics</option>
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Number..">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>

        <button type="submit" class=" add_data btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
   $(document).on('click', '.add_data', function (e) {
  e.preventDefault();
  
 
  var data={
       'full_name':$('#full_name').val(),
       'email':$('#email').val(),
       'date':$('#date').val(),
       'phone_number':$('#phone_number').val(),
       'departement':$('#departement').val(), 
       'message':$('#message').val() 
     }
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
$.ajax({
  type: "post",
  url: "/appointment",
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