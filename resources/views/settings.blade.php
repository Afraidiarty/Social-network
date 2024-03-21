<style>
  body{
    background-color: #252837;
  }
</style>
@extends('inc.layout')

@section('title')
    Profile
@endsection


@section('content')
    <div class="setting-content">
      <form id="upload-form" enctype="multipart/form-data">

        <h1>Email & Password</h1>
        <p>Update your email and or password.</p>
        <label for="current-password">Current Password (required to update email or change current password)</label>
        <input type="password" id="current-password" name="current-password">
        <a href="/reset-password">Lost your password?</a>
        <label for="email">Account Email</label>
        <input type="email" id="email" name="email" value="example@gmail.com">
        <p>Click on the "Generate Password" button to change your password.</p>
        <button type="button" id="generate-password" onclick="generatePassword()">Generate Password</button>
        <div id="generated-password" class="alert alert-success"></div>
        <label for="file-upload">Attach a file:</label>
        <input type="file" id="file-upload" name="image">
        <button type="button" onclick="uploadImage()">Save Changes</button>
    </form>
    
    <div id="response"></div>
          
          <script>
function uploadImage() {
    var form = document.getElementById('upload-form');
    var formData = new FormData(form);
    var token = "{{ csrf_token() }}"; // Retrieve CSRF token from Blade template

    formData.append('_token', token); // Append CSRF token to form data

    $.ajax({
        url: "{{ route('image.upload') }}",
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Handle success response
        
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(xhr.responseText);
        }
    });
}

          </script>



          <script>
            
          </script>


          <script>
          function generatePassword() {
            var length = 8,
                charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
                retVal = "";
            for (var i = 0, n = charset.length; i < length; ++i) {
              retVal += charset.charAt(Math.floor(Math.random() * n));
            }
            document.getElementById('generated-password').style.display = 'block';
            document.getElementById('generated-password').innerText = 'Generated Password: ' + retVal;
          }
          </script>
          
    </div>


<!-- Add more lines to display other user information as needed -->



@endsection