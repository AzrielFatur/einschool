@extends('layouts.EinApp')

@section('content')
        <div class="breadcump">
            <h2 class="float-left">Data Management <small> > Detail Teachers</small></h2>
        </div>
        <br><br><br>
        <form action="{{ route('teacher.store') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Name">Nama</label>
                            <input type="text" name="name" class="form-control" disabled readonly value="{{ $teacher->name }}" placeholder="Nama">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Name">Nomor Induk Guru</label>
                            <input type="text" name="nig" class="form-control" disabled readonly value="{{ $teacher->nig }}" placeholder="Nomor Induk Siswa">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Name">Kelas</label>
                            <select name="grade_id" class="form-control" disabled readonly>
                                <option value="{{ $teacher->grade_id }}" selected>{{ $teacher->class_name }}</option>
                            @foreach($grades as $grade)
                                <option value="{{$grade->id}}">{{$grade->class_name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Name">Tempat tanggal lahir</label>
                            <input type="date" name="dateofbirth" disabled readonly value="{{ $teacher->dateofbirth }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" class="form-control" disabled readonly>
                                <option value="{{ $teacher->gender }}" selected>{{ $teacher->gender }}</option>
                                <option value="Laki - laki">Laki - laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="religion">Agama</label>
                            <select name="religion" class="form-control" disabled readonly>
                                <option value="{{ $teacher->religion }}" selected>{{ $teacher->religion }}</option>
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
                            <input type="email" name="email" disabled readonly value="{{ $teacher->email }}" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="phone_number">Nomor Telpon</label>
                            <input type="text" name="phone_number" disabled readonly value="{{ $teacher->phone_number }}" class="form-control" placeholder="Nomor Telpon">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control" disabled readonly placeholder="Alamat">{{ $teacher->address }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="footer text-center">
                    <!-- <button class="btn btn-primary" type="submit">Kirim</button> -->
                    <a href="{{ route('teacher.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
            <div class="col-sm-4">
                <a href="javascript:changeProfile()">
                    <div class="upload">
                        <img id="preview" src="{{ asset('storage/image/'.$teacher->photo) }}" width="100%"/><br/>
                        <input type="file" name="file" id="image" style="display: none;"/>
                    </div>
                </a>
            </div>
        </div>
        </form>

        @section('script')
        <script>
            function changeProfile() {
                $('#image').click();
            }
            $('#image').change(function () {
                var imgPath = this.value;
                var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
                    readURL(this);
                else
                    alert("Please select image file (jpg, jpeg, png).")
            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.readAsDataURL(input.files[0]);
                    reader.onload = function (e) {
                        $('#preview').attr('src', e.target.result);
                // $("#remove").val(0);
                    };
                }
            }
            function removeImage() {
                $('#preview').attr('src', '{{ asset('storage/vendor/image/No Image.png') }}');
                // $("#remove").val(1);
            }
        </script>
        @endsection
@endsection