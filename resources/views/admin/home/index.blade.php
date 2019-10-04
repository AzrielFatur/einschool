@extends('layouts.EinApp')

@section('content')
        <div class="row panel">

          <div class="col-sm-4">
            <div class="card sub-panel">
              <div class="card-body">
                <img src="storage/vendor/image/Students.png" class="float-left">
                <div class="detail-panel">
                  3502<p class="type">Total Student</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card sub-panel">
              <div class="card-body">
                <img src="storage/vendor/image/Class.png" class="float-left">
                <div class="detail-panel">
                    22<p class="type">Total Class</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card sub-panel">
              <div class="card-body">
                <img src="storage/vendor/image/Teach.png" class="float-left">
                <div class="detail-panel">
                    35<p class="type">Total Teachers</p>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection