@extends("layout")

@section("app-title", "Edit")


@section("page-title", "Edit recipe")

@section("page-content") 
    <div class = "col">
            <form method="POST" action="/recipes/index/{{ $recipe->id }}">
            @csrf

            {{ method_field("patch") }}
                <div class = "form-group text">
                    <strong><label for="description">Description</label></strong>
                    <input type="text" id = "description" name="description" value="{{ old('description') ? old('description') : $recipe->description }}"
                    class = "form-control {{ $errors->has('description') ? 'is-invalid':'' }}" placeholder="Enter medicine description..." >
                    <small class = "form-text text-danger">
                        <ul>
                            @foreach($errors->get('description') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </small>
                </div>
                <div class = "form-group">
                <strong><label for="type">Type</label></strong>
                    <input type="text" id = "type" name="type" value="{{ old('type') ? old('type') : $recipe->type }}"
                     class = "form-control {{ $errors->has('type') ? 'is-invalid':'' }}" placeholder="Enter medicine type...">
                    <small class = "form-text text-danger">
                        <ul>
                            @foreach($errors->get('type') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </small>
                </div>
                <div class = "form-group">
                <strong><label for="amount">Amount</label></strong>
                    <input type="number" id = "amount" name="amount" value="{{ old('amount') ? old('amount') : $recipe->amount }}"
                    class = "form-control {{ $errors->has('amount') ? 'is-invalid':'' }}" placeholder="Enter amount...">
                    <small class = "form-text text-danger">
                        <ul>
                            @foreach($errors->get('amount') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </small>
                </div>
                <button type="submit" class = "btn btn-outline-dark float-right ml-5">Update</button>
            </form>
            </div> 
            
          
           
@endsection