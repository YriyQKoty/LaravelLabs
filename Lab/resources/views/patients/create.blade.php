@extends("layout")

@section("app-title", "")


@section("page-title", "Create Patient")

@section("page-content") 
        <div class = "col">
            <form method="POST" action="/patients">
            {{csrf_field()}}
                <div class = "form-group text">
                    @include('includes/input', [
                        'fieldId' => "fullname",
                        'fieldName' => "fullname",
                        'labelText' => "Fullname",
                        'value' => '',
                        'placeHolderText' => "Enter patient fullname..."
                        ])
                </div>
                <div class = "form-group">
                    @include('includes/input', [
                        'fieldId' => "doctor",
                        'fieldName' => "doctor",
                        'labelText' => "Doctor name",
                        'value' => '',
                        'placeHolderText' => "Enter doctor name..."
                        ])
                </div>
                <button type="submit" class = "btn btn-outline-dark float-right">Add patient</button>
            </form>
           
@endsection