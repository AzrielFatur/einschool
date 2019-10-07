@extends('layouts.EinApp')

@section('content')
        <div class="breadcump">
            <h2 class="float-left">Data Management <small> > Detail Student</small></h2>
        </div>
        <br><br>
        @if(session('alert-success'))
        <div class="alert alert-success" role="alert">
            Data has been <a href="#" class="alert-link">Update</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <br>
        <form action="{{ route('my-account.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-4">
                <a href="javascript:changeProfile()">
                    <div class="upload">
                        <img id="preview" src="{{ asset('storage/image/user/'.Auth::user()->photo) }}" width="100%"/><br/>
                        <input type="file" value="{{ asset('storage/image/user/'.Auth::user()->photo) }}" name="photo" id="image" style="display: none;"/>
                    </div>
                </a>
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Name">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" placeholder="Nama">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Email">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label for="Phone Number">Phone Number</label>
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">+62</span>
                            </div>
                            <input type="text" class="form-control" value="{{ Auth::user()->phone_number }}" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Password"></label>
                            <input type="password" name="password" class="form-control" value="" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <!-- <a href="" class="btn btn-danger">Cancel</a> -->
                    </div>
                </div>
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
                $('#preview').attr('src', '{{ asset('storage/image/.Auth::user()->photo') }}');
                // $("#remove").val(1);
            }
        </script>
        @endsection
@endsection