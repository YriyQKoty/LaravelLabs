@extends("layout")

@section("app-title", $app_title)


@section("page-title", $title)

@section("page-content") 
        <div class = "col">
            <h2>Doctor: <?php echo $doctorName ?></h2>
            <div class = "mt-5">
                <table class="table table-striped table-dark ">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Description</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Type</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $index = 1; ?>
                        <?php foreach ($recipes as $row): ?>
                            <tr>
                            <th scope="row"><?php echo $index++ ?></th>
                                <td><?php echo $row->description; ?></td>
                                <td><?php echo $row->amount; ?></td>
                                <td><?php echo $row->type; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
           
@endsection