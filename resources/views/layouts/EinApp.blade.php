<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>EinSchool | {{$title}}</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">


  <!-- Custom styles for this template -->
  <link href="{{ asset('storage/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('storage/vendor/datatable/jquery.dataTables.min.css') }}" rel="stylesheet">
  <link href="{{ asset('storage/vendor/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('storage/vendor/css/simple-sidebar.css') }}" rel="stylesheet">
  <link href="{{asset('storage/vendor/css/dashboard.css')}}" rel="stylesheet">
  <link href="{{asset('storage/vendor/css/custom-bootstrap.css')}}" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading text-center"><img src="{{asset('storage/vendor/image/Logo.png')}}" width="200px"></div>
      <div class="list-group list-group-flush">
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action {{ active('home') }}"><img src="{{ asset('storage/vendor/image/Dashboard.png') }}"> Dashboard</a>
        <a href="{{ route('data-management.index') }}" class="list-group-item list-group-item-action {{ active(['data-management.index', 'data-management/*']) }}"><img src="{{ asset('storage/vendor/image/folder.png') }}"> Data Management</a>
        <a href="{{ route('my-account.edit', Auth::user()->id) }}" class="list-group-item list-group-item-action {{ active(['my-account.edit', Auth::user()->id]) }}"><img src="{{ asset('storage/vendor/image/account.png') }}"> My Account</a>
        <a href="#" class="list-group-item list-group-item-action"><img src="{{ asset('storage/vendor/image/setting.png') }}"> Setting</a>
        <a href="{{ route('logout') }}" class="list-group-item list-group-item-action" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="{{ asset('storage/vendor/image/exit.png') }}"> Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <a id="menu-toggle"><img src="{{ asset('storage/vendor/image/Menu.png') }}" width="30px"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        @yield('content')
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('storage/vendor/jquery/jquery-3.4.1.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
  <script src="{{ asset('storage/vendor/datatable/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('storage/vendor/datatable/dataTables.bootstrap4.min.js') }}"></script>
  <!-- <script src="{{ asset('storage/vendor/jquery/jquery.min.js') }}"></script> -->
  <script src="{{ asset('storage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Menu Toggle Script -->
  @yield('script')
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
