@extends('Backend.dashboard.layout')
@section('title', 'Thêm thành viên')
@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        @include('Backend.dashboard.component.content_header')
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @php
                    $url = ($config == 'create') ? route('user.catalogue.store') : route('user.catalogue.update', $userCatalogue->id)
                @endphp
                <form action="{{ $url }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="panel-head">
                                <div class="panel-title">
                                    <h4>Thông tin chung của nhóm thành viên</h4>
                                </div>
                                <div class="pannel-description">
                                    Nhập thông tin nhóm
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="control-label ">
                                                Tên nhóm thành viên<span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="name" value="{{ old('name', ($userCatalogue->name) ?? '') }}" class="form-control"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="control-label ">
                                                Ghi chú<span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="description" value="{{ old('description', ($userCatalogue->description) ?? '') }}" class="form-control"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end btn-add">
                        <button class="btn btn-success" type="submit" name="send" value="send">Thêm</button>
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
