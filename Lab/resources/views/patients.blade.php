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
                        <?php $index = 1; ?>
                        <?php foreach ($patients as $row): ?>
                            <tr>
                            <th scope="row"><?php echo $index++ ?></th>
                                <td><?php echo $row->getFullname(); ?></td>
                                <td><?php echo $row->getDoctorName(); ?></td>
                                <td><?php echo print_r($row->getRecipesCount(), true) ?> recipes</td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
           
@endsection