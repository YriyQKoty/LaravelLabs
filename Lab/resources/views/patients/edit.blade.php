@extends("layout")

@section("app-title", "Edit")


@section("page-title", "Edit patient")

@section("page-content") 
        <div class = "col">
            <form method="post" action="/patients/index/{{ $patient->id }}">
                @csrf

                {{ method_field("patch") }}
                <div class = "form-group text">

                    @include('includes/input', [
                        'fieldId' => "fullname",
                        'fieldName' => "fullname",
                        'labelText' => "Fullname",
                        'value' => $patient->fullname,
                        'placeHolderText' => "Enter patient fullname..."
                        ])
                </div>
                <div class = "form-group">

                    @include('includes/input', [
                        'fieldId' => "doctor",
                        'fieldName' => "doctor",
                        'labelText' => "Doctor name",
                        'value' => $patient->doctor,
                        'placeHolderText' => "Enter doctor name..."
                        ])
                </div>
                <button type="submit" class = "btn btn-outline-dark float-right ml-5">Update</button>
            </form>
        </div>
            
          
           
@endsection