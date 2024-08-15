@extends('Backend.dashboard.layout')
@section('title', 'Quản lý nhóm thành viên')
@section('content')
    <div class="content-wrapper">
        
        <!-- Content Header (Page header) -->
        @include('Backend.dashboard.component.content_header')
        <!-- /.content-header -->
        
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="user_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6"></div>
                                        <div class="col-sm-12 col-md-6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            @include('Backend.user.catalogue.component.filter')
                                            @include('Backend.user.catalogue.component.table')
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('Backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('script')
  <!-- Select2 -->
    <script src="{{ asset('Backend/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('Backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    {{------------- switch ------------}}
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('Backend/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('Backend/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('Backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('Backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('Backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('Backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script>
    $(function () {
        $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    })
    </script>
    {{------------- end switch ------------}}
@endsection
