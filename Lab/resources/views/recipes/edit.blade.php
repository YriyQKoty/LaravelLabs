@extends("layout")

@section("app-title", "Edit")


@section("page-title", "Edit recipe")

@section("page-content") 
    <div class = "col">
            <form method="POST" action="/recipes/index/{{ $recipe->id }}">
            @csrf

            {{ method_field("patch") }}
                <div class = "form-group text"> 
                    @include('includes/input', [
                        'fieldId' => "description",
                        'fieldName' => "description",
                        'labelText' => "Description",
                        'value' => $recipe->description,
                        'placeHolderText' => "Enter medicine description..."
                        ])
                </div>
                <div class = "form-group">
                    @include('includes/input', [
                        'fieldId' => "type",
                        'fieldName' => "type",
                        'labelText' => "Type",
                        'value' => $recipe->type,
                        'placeHolderText' => "Enter medicine type..."
                        ])
                </div>
                <div class = "form-group">
                    @include('includes/input', [
                        'fieldId' => "amount",
                        'fieldName' => "amount",
                        'labelText' => "Amount",
                        'value' => $recipe->amount,
                        'placeHolderText' => "Enter amount..."
                        ])
                </div>
                <button type="submit" class = "btn btn-outline-dark float-right ml-5">Update</button>
            </form>
            </div> 
            
          
           
@endsection