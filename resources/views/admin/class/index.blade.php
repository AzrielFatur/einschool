<!-- <div class="row panel">
        <div class="col-sm-4">
            <div class="card sub-panel">
                <div class="card-body">
                <img src="{{ asset('storage/vendor/image/Grade.png') }}" class="float-left">
                <div class="detail-panel">
                    CLASS VII<p class="type"><a href="{{ route('class.index') }}" class="btn btn-info">Check</a></p>
                </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card sub-panel">
                <div class="card-body">
                <img src="{{ asset('storage/vendor/image/Grade.png') }}" class="float-left">
                <div class="detail-panel">
                CLASS VIII<p class="type"><a href="{{ route('class.index') }}" class="btn btn-info">Check</a></p>
                </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card sub-panel">
                <div class="card-body">
                <img src="{{ asset('storage/vendor/image/Grade.png') }}" class="float-left">
                <div class="detail-panel">
                CLASS IX<p class="type"><a href="{{ route('class.index') }}" class="btn btn-info">Check</a></p>
                </div>
                </div>
            </div>
        </div>
    </div> -->

@extends('layouts.EinApp')

@section('content')

    @if(session('alert-success'))
        <h3>{{session('alert-success')}}</h3>
    @endif
        <div class="breadcump">
            <h2 class="float-left">Data Management <small> > Class</small></h2>
            <a class="btn btn-primary float-right" href="{{ route('class.create') }}">Tambah Kelas</a>
        </div>
        <br><br><br>
        <div class="table-responsive">
            <table class="table table-bordered" id="class">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Class Name</th>
                        <th>Class Number</th>
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
                    ajax: "{{ route('class.index') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'class_name', name: 'class_name'},
                        {data: 'class_sort', name: 'class_sort'},
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
                            url : "{{ url('/data-management/class/destroy/') }}/"+id,
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