@extends('layouts.EinApp')

@section('content')
        <div class="breadcump">
            <h2 class="float-left">Data Management <small> > Edit Class</small></h2>
        </div>
        <br><br><br>
        <form action="{{ route('class.update', $grade->id) }}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Class Name">Class Name</label>
                        <select name="class_name" id="class_name" class="form-control" required>
                            <option value="{{ $grade->class_name }}" selected disabled>{{ $grade->class_name }}</option>
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
                            <option value="{{ $grade->class_sort }}" selected disabled>{{ $grade->class_sort }}</option>
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
@endsection