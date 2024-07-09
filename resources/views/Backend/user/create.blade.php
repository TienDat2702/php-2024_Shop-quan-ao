@extends('Backend.dashboard.layout')
@section('title', 'Thêm thành viên')
@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        @include('Backend.dashboard.component.content_header')
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <form action="">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="panel-head">
                                <div class="panel-title">
                                    <h4>Thông tin chung</h4>
                                </div>
                                <div class="pannel-description">
                                    Nhập thông tin người sử dụng
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="control-label " >
                                                Email<span class="text-danger">*</span>
                                            </label>
                                            <input 
                                            type="text" 
                                            name="email"
                                            value=""
                                            class="form-control" 
                                            autocomplete="off"
                                            >
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="control-label " >
                                                Họ và tên<span class="text-danger">*</span>
                                            </label>
                                            <input 
                                            type="text" 
                                            name="name"
                                            value=""
                                            class="form-control" 
                                            autocomplete="off"
                                            >
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="control-label " >
                                                Nhóm thành viên<span class="text-danger">*</span>
                                            </label>
                                            <select name="user_catalogue_id" class="form-control" >
                                                <option value="0">[Nhóm thành viên]</option>
                                                <option value="1">QUản trị viên</option>
                                                <option value="2">Cộng tác viên</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="control-label " >
                                                Ngày sinh
                                            </label>
                                            <input 
                                            type="text" 
                                            name="birthday"
                                            value=""
                                            class="form-control" 
                                            autocomplete="off"
                                            >
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="control-label " >
                                                Mật khẩu<span class="text-danger">*</span>
                                            </label>
                                            <input 
                                            type="password" 
                                            name="password"
                                            value=""
                                            class="form-control" 
                                            autocomplete="off"
                                            >
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="control-label " >
                                                Nhập lại mật khẩu<span class="text-danger">*</span>
                                            </label>
                                            <input 
                                            type="password" 
                                            name="re_password"
                                            value=""
                                            class="form-control" 
                                            autocomplete="off"
                                            >
                                        </div>
                                        <div class="form-group col-12">
                                            <label class="control-label " >
                                                Hình ảnh
                                            </label>
                                            <input 
                                            type="text" 
                                            name="image"
                                            value=""
                                            class="form-control"
                                            autocomplete="off"
                                            >
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- thông tin liên hệ --}}
                    <div class="row my-5">
                        <div class="col-lg-5">
                            <div class="panel-head">
                                <div class="panel-title">
                                    <h4>Thông tin liên hệ</h4>
                                </div>
                                <div class="pannel-description">
                                    Nhập thông tin liên hệ của người sử dụng
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="control-label " >
                                                Tỉnh thành
                                            </label>
                                            <select name="province_id" class="form-control setupSelect2 province" >
                                                <option value="0">[Chọn tỉnh thành]</option>
                                                @foreach ($provinces as $item)
                                                    <option value="{{ $item->code }}">{{ $item->name }}</option>  
                                                @endforeach  
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="control-label " >
                                                Quận/Huyện
                                            </label>
                                            <select name="district_id" class="form-control setupSelect2 districts" >
                                                {{-- @foreach ($districts as $item)
                                                    <option value="{{ $item->code }}">{{ $item->name }}</option> 
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="control-label " >
                                                Phường/Xã
                                            </label>
                                            <select name="ward_id" class="form-control" >
                                                <option value="0">[Chọn Phường/Xã]</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="control-label " >
                                                Địa chỉ
                                            </label>
                                            <input 
                                            type="text" 
                                            name="address"
                                            value=""
                                            class="form-control" 
                                            autocomplete="off"
                                            >
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="control-label " >
                                                Số điện thoại<span class="text-danger">*</span>
                                            </label>
                                            <input 
                                            type="text" 
                                            name="phone"
                                            value=""
                                            class="form-control" 
                                            autocomplete="off"
                                            >
                                        </div>
                                        <div class="form-group col-12">
                                            <label class="control-label " >
                                                Ghi chú
                                            </label>
                                            <input 
                                            type="text" 
                                            name="description"
                                            value=""
                                            class="form-control"
                                            autocomplete="off"
                                            >
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pst-ab btn-add">
                        <button class="btn btn-success" type="submit" name="send" value="send">Thêm</button>
                    </div> 
                </form>
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('script')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  
@endsection
