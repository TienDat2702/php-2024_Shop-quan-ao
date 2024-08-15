@extends('Backend.dashboard.layout')
@section('title', 'Xóa thành viên')
@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        @include('Backend.dashboard.component.content_header')
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('user.catalogue.destroy', $userCatalogue->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="panel-head">
                                <div class="panel-title">
                                    <h4>Thông tin chung</h4>
                                </div>
                                <div class="pannel-description">
                                    <strong>Lưu ý <span class="text-danger">(*)</span></strong>: Không thể khôi phục thành viên sau khi xóa, hãy chắc chắn bạn muốn thực hiện chức năng này!
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="control-label ">
                                                Họ và tên<span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="name" value="{{ old('name', ($userCatalogue->name) ?? '') }}" class="form-control"
                                                autocomplete="off" readonly>
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="control-label ">
                                                Mô tả
                                            </label>
                                            <input type="text" name="description" value="{{ old('description', ($userCatalogue->description) ?? '') }}" class="form-control"
                                                autocomplete="off" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-add text-right">
                        <button class="btn btn-danger" type="submit" name="send" value="send">Xóa người dùng</button>
                    </div>
                </form>
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection

@section('css')

@endsection

@section('script')

@endsection
