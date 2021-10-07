@extends("layout")

@section("app-title", "")


@section("page-title", "Create Recipe")

@section("page-content") 
        <div class = "col">
            <form method="POST" action="/recipes/<?php echo $patient_id ?>">
            {{csrf_field()}}
                <div class = "form-group text">
                    @include('includes/input', [
                        'fieldId' => "description",
                        'fieldName' => "description",
                        'labelText' => "Description",
                        'value' => '',
                        'placeHolderText' => "Enter medicine description..."
                        ])
                </div>
                <div class = "form-group">
                    @include('includes/input', [
                        'fieldId' => "type",
                        'fieldName' => "type",
                        'labelText' => "Type",
                        'value' => '',
                        'placeHolderText' => "Enter medicine type..."
                        ])
                </div>
                <div class = "form-group">
                    @include('includes/input', [
                        'fieldId' => "amount",
                        'fieldName' => "amount",
                        'labelText' => "Amount",
                        'value' => '',
                        'placeHolderText' => "Enter amount..."
                        ])
                </div>
                <button type="submit" class = "btn btn-outline-dark float-right">Add recipe</button>
            </form>
           
@endsection