<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{('assets/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{('assets/plugins/summernote/summernote-bs4.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{('assets/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{('assets/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{('assets/dist/css/adminlte.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
        .main-sidebar,
        .main-sidebar::before {
            transition: margin-left 0.2s ease-in-out, width 0.2s ease-in-out;
        }

        .fade {
            transition: opacity 0.15s linear;
        }

        .table thead th,
        .table tfoot th {
            vertical-align: middle;
            /* text-align: center; */
        }

    </style>

</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('logout') }}" class="nav-link">
                        Logout
                    </a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown user-menu">
                    <p class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="far fa-user"></i>
                        <span class="d-none d-md-inline">Hallo, {{ Session::get('nama')}}!</span>
                    </p>
                    {{-- <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header " style="background-color:#343a40;color:white">
                            <img src="{{('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                                alt="User Image">
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="" class="btn btn-danger btn-flat">Logout</a>
                        </li>
                    </ul> --}}
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="https://stmik-sumedang.ac.id/wp-content/uploads/2019/11/LOGO-PNG.png"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">STMIK SUMEDANG</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                {{-- <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="/" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div> --}}

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">MAHASISWA</li>
                        <li class="nav-item">
                            <a href="/grade" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Nilai Mahasiswa
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/collegestudent" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Data Mahasiwa
                                </p>
                            </a>
                        </li>
                        @if (Session::get('level') == 'admin')
                        <li class="nav-header">DOSEN</li>
                        <li class="nav-item has-treeview">
                            <a href="/lecturer" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Data Dosen
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="/course" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Mata Kuliah
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">ADMIN</li>
                        <li class="nav-item has-treeview">
                            <a href="/teach" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Pengampu
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="/academicyear" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Tahun Akademik
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="/user" class="nav-link">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    Akun Pengguna
                                </p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('container')

        <footer class="main-footer" style="font-size:14px;">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2020.</strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('layout._modal')

    <!-- jQuery -->
    <script src="{{('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{('assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{('assets/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{('assets/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{('assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- SweetAlert -->
    <script src="{{('assets/vendor/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script src="{{'js/sin.js'}}"></script>
    <!-- AdminLTE App -->
    <script src="{{('assets/dist/js/adminlte.min.js')}}"></script>
    {{-- <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{('assets/dist/js/pages/dashboard.js')}}"></script> --}}
    <!-- bs-custom-file-input -->
    <script src="{{('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{('assets/dist/js/demo.js')}}"></script>
    <!-- page script -->
    @stack('js')
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });

    </script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });
            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            // //Colorpicker
            // $('.my-colorpicker1').colorpicker()
            // //color picker with addon
            // $('.my-colorpicker2').colorpicker()

            // $('.my-colorpicker2').on('colorpickerChange', function (event) {
            //     $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            // });

            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })

    </script>
    <script>
        // now make it draggable
        $('#modal-warning').draggable();
        $('#modal-default').draggable();

    </script>
</body>

</html>
