@extends("layout")

@section("app-title", "Edit")


@section("page-title", "Edit patient")

@section("page-content") 
        <div class = "col">
            <form method="post" action="/patients/index/{{ $patient->id }}">
                @csrf
                
                {{ method_field("patch") }}
                <div class = "form-group text">
                    <strong><label for="fullname">Fullname</label></strong>
                    <input type="text" id = "fullname" name="fullname" class = "form-control" value="{{ $patient->fullname }}">
                </div>
                <div class = "form-group">
                <strong><label for="doctorName">Doctor name</label></strong>
                    <input type="text" id = "doctorName" name="doctorName" class = "form-control" value="{{ $patient->doctor}}">
                </div>
                <button type="submit" class = "btn btn-outline-dark float-right">Update patient</button>
            </form>
           
@endsection