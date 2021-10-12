@extends("layout")

@section("app-title", $app_title)


@section("page-title", $title)

@section("page-content") 
        <div class = "col">
            <h2>Doctor: <?php echo $doctor ?></h2>
            <div class = "mt-5">
                @if (Auth::user()->can('update', Patient::class))
                     <a href="/recipes/create/<?php echo $patient_id ?>" style = "margin-bottom: 10px; font-size: 16pt; font-weight: bold" class="btn btn-outline-dark">Add recipe</a>
                @endif
                <div>
                    <form action="/recipes2/<?php echo $patient_id ?>" method = "POST">
                    {{csrf_field()}}
                        <input  type="checkbox" id="showAll" name="showAll">
                        <button class = "sumbit" style = "font-size: 16pt; font-weight: bold" id ="show">Show All</button>
                    </form>
                </div>
             
                <table class="table table-striped table-dark ">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Description</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Type</th>
                        @if (Auth::user()->can('update', Patient::class))
                        <th scope="col" colspan="2" class="text-center">Management</th>
                        @endif
                        </tr>
                    </thead>

                    <tbody>
                         <?php $index = 1;?>

                        <?php foreach ($recipes as $row): ?>
                            <tr>
             
                            <th scope="row"><?php echo $index++ ?></th>
                                <td><?php echo $row->description; ?></td>
                                <td><?php echo $row->amount; ?></td>
                                <td><?php echo $row->type; ?></td>
                                @if (Auth::user()->can('update', Patient::class))
                                <td class="text-center"> <a href="/recipes/index/{{ $row->id }}/edit" class = "btn btn-outline-primary">Edit</a></td>
                                <th class="text-center"> <a id="{{ $row->id }}" name="{{ $row->description }}" class = "btn btn-outline-danger">Delete</a></td>
                                @endif
                            
                            </tr>
                    
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>


        <script>


        $(document).ready(function () {
            $('th a:nth-child(1n)').on('click', function (e) {
                const recipeId = $(this).attr('id');
                const recipeName = $(this).attr('name');
                bootbox.confirm({
                    message: `Do you want to delete recipe ${recipeName}?`,
                    buttons: {
                        confirm: {
                            label: 'Yes',
                            className: 'btn-danger'
                        },
                        cancel: {
                            label: 'No',
                            className: 'btn-secondary'
                        }
                    },
                    callback: function (result) {
                        if (!result) {
                            return;
                        }
                        $.ajax({
                            url: '/recipes/index/' + recipeId + '/delete',
                            type: 'post',
                            data: {
                                _method: 'delete',
                                _token: "{!! csrf_token() !!}"
                            },
                            success: function () {
                                location.href = '/recipes/<?php echo $patient_id ?>'
                            }
                        })
                    }
                });
            });
        });

        </script>
@endsection