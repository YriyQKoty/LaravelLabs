@extends("layout")

@section("app-title", "")


@section("page-title", "Create Patient")

@section("page-content") 
        <div class = "col">
            <form method="POST" action="/patients">
            {{csrf_field()}}
                <div class = "form-group text">
                    <strong><label for="fullname">Fullname</label></strong>
                    <input type="text" id = "fullname" name="fullname" class = "form-control" placeholder="Enter patient fullname...">
                </div>
                <div class = "form-group">
                <strong><label for="doctorName">Doctor name</label></strong>
                    <input type="text" id = "doctorName" name="doctorName" class = "form-control" placeholder="Enter doctor`s name...">
                </div>
                <button type="submit" class = "btn btn-outline-dark float-right">Add patient</button>
            </form>
           
@endsection