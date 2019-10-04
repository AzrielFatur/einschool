@extends('layouts.EinApp')

@section('content')

    @if(session('alert-success'))
        <h3>{{session('alert-success')}}</h3>
    @endif
    <div class="row panel">
        <div class="col-sm-4">
            <div class="card sub-panel">
                <div class="card-body">
                <img src="{{ asset('storage/vendor/image/Students.png') }}" class="float-left">
                <div class="detail-panel">
                    Students<p class="type"><a href="{{ route('student.index') }}" class="btn btn-info">Check</a></p>
                </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card sub-panel">
                <div class="card-body">
                <img src="{{ asset('storage/vendor/image/Class.png') }}" class="float-left">
                <div class="detail-panel">
                Class<p class="type"><a href="{{ route('class.index') }}" class="btn btn-info">Check</a></p>
                </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card sub-panel">
                <div class="card-body">
                <img src="{{ asset('storage/vendor/image/Teach.png') }}" class="float-left">
                <div class="detail-panel">
                Teachers<p class="type"><a href="{{ route('teacher.index') }}" class="btn btn-info">Check</a></p>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection