@extends("layout")

@section("app-title") 
    Admin Panel
@endsection

@section("nav-admin-active", "active")

@section("page-title", "Admin Panel")

@section("page-content") 
<div class="mt-5">
        <h1>Manage users</h1>

        <form method="post" action="admin">

            @csrf

            {{ method_field('patch') }}

            <label for="users">User</label>
            <select class="form-select form-select-sm" id="users" name="user">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>

            <label for="models">Model</label>
            <select class="form-select form-select-sm" id="models" name="model">
                @foreach($models as $model)
                    <option value="{{ $model }}">
                        {{ $model }}
                    </option>
                @endforeach
            </select>

            <h5 class="text-center">Table Permissions</h5>
            <div class="d-flex justify-content-center mt-1">
                <label class="me-2" for="update">
                    Update
                    <input id="update" type="checkbox" name="update">
                </label>
                <label for="view">
                    View
                    <input id="view" type="checkbox" name="view">
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection