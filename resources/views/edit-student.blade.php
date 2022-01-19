<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit-Student</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Edit Student</h2>
        </div>
        <div class="card-body">
            @if(Session::has('data_updated'))
                <div class="alert alert-success" role="alert">
                {{Session::get('data_updated')}}
                </div>
                @endif
            <form method="POST" action="{{route('student.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$students->id}}" name="id"/>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Students Name</label>
                    <input type="text" class="form-control" name="name"  value="{{$students->name}}">
                </div>
                <div class="form-group">
                    <label for="file">Example file input</label>
                    <input type="file" name="file" class="form-control" onchange="previewFile(this)"/>
                    <img id="preview" src="{{asset('images')}}/{{$students->profilePicture}}"  style="max-width:130px; margin-top:20px;"/>
                </div>
                <button type="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
</div>  
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $('#preview').attr("src",  reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
</body>
