@extends("layout")

@section("app-title", "")


@section("page-title", "Create Patient")

@section("page-content") 
        <div class = "col">
            <form method="POST" action="/patients">
            {{csrf_field()}}
                <div class = "form-group text">
                    <strong><label for="fullname">Fullname</label></strong>
                    <input type="text"  id = "fullname" name="fullname" value="{{ old('fullname') }}"
                    class = "form-control {{ $errors->has('fullname') ? 'is-invalid':'' }}" placeholder="Enter patient fullname...">
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
                    <input type="text" id = "doctor" name="doctor" value="{{ old('doctor') }}"
                    class = "form-control {{ $errors->has('doctor') ? 'is-invalid':'' }}" placeholder="Enter doctor`s name...">
                    <small class = "form-text text-danger">
                        <ul>
                            @foreach($errors->get('doctor') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </small>
                </div>
                <button type="submit" class = "btn btn-outline-dark float-right">Add patient</button>
            </form>
           
@endsection