<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
  
        </style>
    </head>
    <body>
        <div class="container">
        <div class="flex-center position-ref full-height">
            @if(Auth::check()) 
            <h3>Hello {{Auth::user()->name}} </h3>
            @endif
           <span>&nbsp;<a href="{{url('/user/logout')}}"> Logout</a></span>
        </div>
            <h2>Curd System</h2>           
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Firstname</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                @foreach($userDetails as $users)
                  <tr>
                    <td>{{$users->name}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->address}}</td>
                    <td>{{$users->mobile}}</td>
                    <td><span><a href="{{url('/user/sign-up')}}">Insert</a></span> || 
                    <span><a href="{{url('/user/delete/'.$users->id)}}">Delete</a></span>|| 
                    <span><a href="{{url('/user/update/'.$users->id)}}">Update</a></span></td>
                  </tr>
                  @endforeach

                </tbody>
            </table>
        </div>
    </body>
</html>
