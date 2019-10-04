@extends('layouts.EinApp')

@section('content')
        <div class="breadcump">
            <h2 class="float-left">Data Management <small> > Add Class</small></h2>
        </div>
        <br><br><br>
        <form action="{{ route('class.store') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Class Name">Class Name</label>
                        <select name="class_name" id="class_name" class="form-control" required>
                            <option value=''>---Select one---</option>
                            <option value="VII">VII</option>
                            <option value="VIII">VIII</option>
                            <option value="IX">IX</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">    
                        <label for="Class Name">Sub Class Name</label>
                        <select name="class_sort" id="subclassname" class="form-control" required>
                            <option value=''>---Select one---</option>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                            <option value="V">V</option>
                        </select>
                    </div>
                    <button class="btn-primary">Kirim</button>
                </div>
            </div>
        </form>

    @section('script')
    <!-- <script type="text/javascript">
        $('#class_name').on('change', function(e){
            console.log(e);
            let class_name = e.target.value;
            $.get('/json-subclassname?class_name=' + class_name,function(data) {
            console.log(data);
            $('#subclassname').empty();
            $('#subclassname').append('<option value="0" disable="true" required selected="true">---Select one---</option>');

            $.each(data, function(index, subclassnameObj){
                $('#subclassname').append('<option name="class_sort" value="'+ subclassnameObj.id +'">'+ subclassnameObj.class_sort +'</option>');
            })
            });
        });
    </script> -->
    @endsection
@endsection