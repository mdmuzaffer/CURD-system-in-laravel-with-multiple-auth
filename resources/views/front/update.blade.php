<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <form method="post" action="{{url('user/update/'.$userDetails[0]->id)}}">
          <h1>Register</h1>

          <p style="float: right; margin-top: -30px;"><a href="{{url('/user/dashboard')}}">users data list</a></p>
          <p>
            @if (Session::has('flush_messsage_success'))
            <div class="alert alert-info">{{ Session::get('flush_messsage_success') }}</div>
             @endif
          </p>
          <hr>
          {{ csrf_field() }}
          <label for="name"><b>Name</b></label>
          <input type="text" placeholder="Enter Name" name="name" value="{{$userDetails[0]->name}}" required>

          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" value="{{$userDetails[0]->email}}" required>

          <label for="address"><b>Address</b></label>
          <input type="text" placeholder="Enter Address" name="address" value="{{$userDetails[0]->address}}" required>

          <label for="mobile"><b>Mobile</b></label>
          <input type="text" placeholder="Enter Mobile" name="mobile" value="{{$userDetails[0]->mobile}}"required>

          <hr>
          <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

          <button type="submit" class="registerbtn" name="btn">Register</button>
        </form>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
</body>
</html>
