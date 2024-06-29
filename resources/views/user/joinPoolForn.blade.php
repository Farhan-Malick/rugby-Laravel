<!DOCTYPE html>
<html lang="en">

<head>
  @include('layouts.headLinks')
  
</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    @include('layouts.header')

    <div class="hero overlay" style="background-image: url('{{asset('assets/images/banner.jpg')}}');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 mx-auto text-center">
            <h1 class="text-white">Join Pool Form</h1>
          </div>
        </div>
      </div>
    </div>


    
    <h1 class="text-white" style="text-align:center; margin-top:50px">Fill Form To Join Pool</h1>
    <div class="text-right">
      <div class="site-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <form id="joinPoolForm" action="{{ route('Save_JoinPool', ['id' => $random_id->id]) }}" method="post">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control text-black" placeholder="ID" name="created_pool_id" required>
                  @error('created_pool_id')
                    <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="text" class="form-control text-black" placeholder="Write Name Of Pool" name="pool_name" required>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-secondary select-team w-100">Submit</button>
                </div>
              </form>
              
              {{-- <form id="joinPoolForm" action="{{ route('Save_JoinPool', ['id' => $random_id->id]) }}" method="post">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control text-black" placeholder="ID" name="created_pool_id" required>
                  @error('created_pool_id')
                    <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="text" class="form-control text-black" placeholder="Write Name Of Pool" name="pool_name" required>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-secondary select-team w-100">Submit</button>
                </div>
              </form> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
    
 </div>


    @include('layouts.footer')



  </div>
  @include('layouts.scriptingLinks')


</body>
<script>
  $(document).ready(function() {
    $('#joinPoolForm').on('submit', function(event) {
      event.preventDefault();
      var form = $(this);

      $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            Swal.fire('Success', 'Pool joined successfully', 'success').then(function() {
              window.location.href = response.redirect_url;
            });
          } else {
            Swal.fire('Error', response.error, 'error');
          }
        },
        error: function() {
          Swal.fire('Error', 'An error occurred while processing your request', 'error');
        }
      });
    });
  });
</script>



{{-- <script>
  // Wait for the document to be ready
  $(document).ready(function() {
    // Listen for form submission
    $('#joinPoolForm').on('submit', function(event) {
      event.preventDefault();
      var form = $(this);

      // Perform an AJAX post request
      $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        dataType: 'json',
        timer:5000,
        showConfirmButton:false,
        success: function(response) {
          // Check if the response indicates success
          if (response.success) {
            // Show a success SweetAlert
            Swal.fire('Success', 'Pool joined successfully', 'success').then(function() {
              // Redirect to the desired route
              window.location.href = "{{ route('all_pools') }}";
            });
          } else {
            // Show an error SweetAlert
            Swal.fire('Error', response.error, 'error');
          }
        },
        error: function() {
          // Show an error SweetAlert for AJAX error (optional)
          Swal.fire('Error', 'An error occurred while processing your request', 'error');
        }
      });
    });
  });
</script> --}}


</html>