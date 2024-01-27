@extends('inc.layout')

@section('title')
    Profile
@endsection


@section('content')
    <div class="setting-content">
        <form action="{{ route('image.upload') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <h1>Email & Password</h1>
            <p>Update your email and or password.</p>
            <label for="current-password">Current Password (required to update email or change current password)</label>
            <input type="password" id="current-password" name="current-password">
            <a href="/reset-password">Lost your password?</a>
            <label for="email">Account Email</label>
            <input type="email" id="email" name="email" value="example@gmail.com">
            <p>Click on the "Generate Password" button to change your password.</p>
            <button type="button" id="generate-password" onclick="generatePassword()">Generate Password</button>
            <div id="generated-password" class="alert alert-success" ></div>
            <label for="file-upload">Attach a file:</label>
            <input type="file" id="file-upload" name="image">
            <button type="submit">Save Changes</button>
          </form>
          
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