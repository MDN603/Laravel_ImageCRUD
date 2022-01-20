<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All-student</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>All Student</h2> <a href="/add-student"><button class="btn btn-primary">Add New</button></a>
        </div>
        <div class="card-body">
            @if(Session::has('data_deleted'))
                <div class="alert alert-success" role="alert">
                {{Session::get('data_deleted')}}
                </div>
                @endif
           <table id="students" class="table table-striped">
                <thead>
                    <tr>
                        <td width="10%">ID<td>
                        <td width="50%">Name<td>
                        <td width="20%">Image<td>
                        <td width="20%">Action<td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td width="10%">{{$student->id}}<td>
                        <td width="50%">{{$student->name}}<td>
                        <td width="20%"><img src="{{asset('images')}}/{{$student->profilePicture}}" style="max-width:60px"/><td>
                        <td width="20%"><a href="/edit-student/{{$student->id}}"><button class="btn btn-warning">Edit</button></a><a href="/delete-student/{{$student->id}}"><button class="btn btn-danger">Delete</button></a><td>
                    <tr>
                  @endforeach
                </tbody>
           </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
