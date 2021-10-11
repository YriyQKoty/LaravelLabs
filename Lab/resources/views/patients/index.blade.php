@extends("layout")

@section("app-title") 
    Patients
@endsection


@section("nav-recip-active", "active")

@section("page-title", "Patients & recipes")

@section("page-content") 
        <div class = "col">
            <div class = "mt-5">
                @if (Auth::user()->can('update', Patient::class))
                    <a href="/patients/create" style = "margin-bottom: 10px; font-size: 16pt; font-weight: bold" class="btn btn-outline-dark">Add patient</a>
                @endif
                <table class="table table-striped table-dark ">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col" >Fullname</th>
                        <th scope="col" >Doctor</th>
                        <th scope="col">Recipes</th>
                        <th scope="col" class="text-center">Count</th>
                        @if ( Auth::user()->can('update', Patient::class))
                        <th scope="col" colspan="2" class="text-center">Management</th>
                        @endif
                
                        </tr>
                    </thead>

                    <tbody>
                        <?php $index = 1; ?>
                        <?php foreach ($patients as $row): ?>
                            <tr>
                            <th scope="row"><?php echo $index?></th>
                                <td name="{{ $row->fullname }}"><?php echo $row->fullname; ?></td>
                                <td><?php echo $row->doctor; ?></td>
                                <td> <a href="/recipes/{{ $row->id }}" class = "btn btn-outline-success">Show</a></td>
                                <td  class="text-center"><?php echo $row->recipes->count(); ?></td>
                                @if ( Auth::user()->can('update', Patient::class))
                                <td class="text-center"> <a href="/patients/index/{{ $row->id }}/edit" class = "btn btn-outline-primary">Edit</a></td>
                                <th class="text-center"> <a id="{{ $row->id }}" name="{{ $row->fullname }}" class = "btn btn-outline-danger">Delete</a></td>
                                @endif
                                <?php  $index++ ?>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>

        <script>
        $(document).ready(function () {
            $('th a:nth-child(1n)').on('click', function (e) {
                const patientId = $(this).attr('id');
                const patientName = $(this).attr('name');
                bootbox.confirm({
                    message: `Do you want to delete patient ${patientName}?`,
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
                            url: '/patients/index/' + patientId + '/delete',
                            type: 'post',
                            data: {
                                _method: 'delete',
                                _token: "{!! csrf_token() !!}"
                            },
                            success: function () {
                                location.href = '/patients/index'
                            }
                        })
                    }
                });
            });
        });
    </script>

           
@endsection