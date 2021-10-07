@extends("layout")

@section("app-title", "")


@section("page-title", "Create Recipe")

@section("page-content") 
        <div class = "col">
            <form method="POST" action="/recipes/<?php echo $patient_id ?>">
            {{csrf_field()}}
                <div class = "form-group text">
                    <strong><label for="desc">Description</label></strong>
                    <input type="text" id = "desc" name="desc" class = "form-control" placeholder="Enter medicine description..." required>
                </div>
                <div class = "form-group">
                <strong><label for="type">Type</label></strong>
                    <input type="text" id = "type" name="type" class = "form-control" placeholder="Enter medicine type..." required>
                </div>
                <div class = "form-group">
                <strong><label for="amount">Amount</label></strong>
                    <input type="number" id = "amount" name="amount" class = "form-control" placeholder="Enter amount..." required>
                </div>
                <button type="submit" class = "btn btn-outline-dark float-right">Add recipe</button>
            </form>
           
@endsection