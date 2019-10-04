@extends('layouts.EinApp')

@section('content')

    @if(session('alert-success'))
    <div class="alert alert-success">
        <h3>{{session('alert-success')}}</h3>
    </div>
    @endif
        <div class="breadcump">
            <h2 class="float-left">Data Management <small> > Teachers</small></h2>
            <a class="btn btn-primary float-right" href="{{ route('teacher.create') }}">Tambah Guru</a>
        </div>
        <br><br><br>
        <div class="table-responsive">
            <table class="table table-bordered" id="class">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIG</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        @section('script')
        <script type="text/javascript">
            $(document).ready( function () {
                let table = $('#class').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('teacher.index') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'nig', name: 'nig'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'phone_number', name: 'phone_number'},
                        {data: 'action', name: 'action', orderable: false, searchable: true},
                    ]
                });
            });
        </script>

        <script>
            $(document).on('click', '.button-sweet', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                Swal.fire({
                    title: "Are you sure to deleted this data?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: "Yes! Delete it!",
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Cancel",
                    closeOnConfirm: false,
                    confirmButtonClass: "btn-danger",
                    closeOnCancel: false
                    })
                    .then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "DELETE",
                            url : "{{ url('/data-management/teacher/destroy/') }}/"+id,
                            dataType: "JSON",
                            data : {'_method' : 'DESTROY',
                                    '_token' : '{{ csrf_token() }}' },
                            success: function (data) {
                                Swal.fire({
                                    title: "Data berhasil di hapus!",
                                    type: "success",
                                    }).then(function(){ 
                                        location.reload();
                                    }
                                );
                            }         
                        })
                    }
                });                
            });
        </script>

        @endsection
@endsection