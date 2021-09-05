@extends("layout")

@section("app-title") 
    Patients
@endsection


@section("nav-recip-active", "active")

@section("page-title", "Patients & recipes")

@section("page-content") 
        <div class = "col">
            <div class = "mt-5">
                <table class="table table-striped table-dark ">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Recipes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                            <td>Mark Shield</td>
                            <td>Otto Donk</td>
                            <td>...</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                            <td>Jacob Strauss</td>
                            <td>Thornton Kol</td>
                            <td>...</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                            <td>Larry Dank</td>
                            <td>Ken Luht</td>
                            <td>...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
           
@endsection