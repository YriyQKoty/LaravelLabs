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
                    <input type="text" id = "fullname" name="fullname" value="{{ old('fullname') ? old('fullname') : $patient->fullname }}"
                    class = "form-control {{ $errors->has('fullname') ? 'is-invalid':'' }}">
                    <small class = "form-text text-danger">
                        <ul>
                            @foreach($errors->get('fullname') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </small>
                </div>
                <div class = "form-group">
                <strong><label for="doctor">Doctor name</label></strong>
                    <input type="text" id = "doctor" name="doctor" value="{{ old('doctor') ? old('doctor') : $patient->doctor}}"
                    class = "form-control {{ $errors->has('doctor') ? 'is-invalid':'' }}">
                    <small class = "form-text text-danger">
                        <ul>
                            @foreach($errors->get('doctor') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </small>
                </div>
                <button type="submit" class = "btn btn-outline-dark float-right ml-5">Update</button>
            </form>
        </div>
            
          
           
@endsection