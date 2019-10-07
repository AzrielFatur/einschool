@extends('layouts.EinApp')

@section('content')
        <div class="breadcump">
            <h2 class="float-left">Data Management <small> > Detail Student</small></h2>
        </div>
        <br><br><br>
        <form action="{{ route('student.store') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Name">Nama</label>
                            <input type="text" name="name" class="form-control" disabled readonly value="{{ $student->name }}" placeholder="Nama">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Name">Nomor Induk Siswa</label>
                            <input type="text" name="nis" class="form-control" disabled readonly value="{{ $student->nis }}" placeholder="Nomor Induk Siswa">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Name">Kelas</label>
                            <select name="grade_id" class="form-control" disabled readonly>
                                <option value="{{ $student->grade_id }}" selected>{{ $student->class_name }}</option>
                            @foreach($grades as $grade)
                                <option value="{{$grade->id}}">{{$grade->class_name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Name">Tempat tanggal lahir</label>
                            <input type="date" name="dateofbirth" disabled readonly value="{{ $student->dateofbirth }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" class="form-control" disabled readonly>
                                <option value="{{ $student->gender }}" selected>{{ $student->gender }}</option>
                                <option value="Laki - laki">Laki - laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="religion">Agama</label>
                            <select name="religion" class="form-control" disabled readonly>
                                <option value="{{ $student->religion }}" selected>{{ $student->religion }}</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" disabled readonly value="{{ $student->email }}" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="phone_number">Nomor Telpon</label>
                            <input type="text" name="phone_number" disabled readonly value="{{ $student->phone_number }}" class="form-control" placeholder="Nomor Telpon">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control" disabled readonly placeholder="Alamat">{{ $student->address }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="footer text-center">
                    <!-- <button class="btn btn-primary" type="submit">Kirim</button> -->
                    <a href="{{ route('student.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
            <div class="col-sm-4">
                <img id="preview" src="{{ asset('storage/image/'.$student->photo) }}" width="100%"/><br/>
            </div>
        </div>
        </form>
@endsection