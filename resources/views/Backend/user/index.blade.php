@extends('Backend.dashboard.layout')
@section('title', 'Quản lý thành viên')
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
                                            @include('Backend.user.component.filter')
                                            @include('Backend.user.component.table')
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
    <link rel="stylesheet" href="Backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="Backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="Backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('script')
    <script src="Backend/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="Backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="Backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="Backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="Backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="Backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="Backend/plugins/jszip/jszip.min.js"></script>
    <script src="Backend/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="Backend/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="Backend/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="Backend/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="Backend/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    {{------------- switch ------------}}
    <!-- Select2 -->
    <script src="Backend/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="Backend/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="Backend/plugins/moment/moment.min.js"></script>
    <script src="Backend/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="Backend/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="Backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="Backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="Backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script>
    $(function () {
        $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    })
    </script>
    {{------------- end switch ------------}}
@endsection
