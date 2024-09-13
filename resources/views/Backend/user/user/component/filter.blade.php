<form action="{{ route('user.index') }}">
    <div class="filter mb-3">
        <div class="d-flex align-items-center justify-content-between">
            <div class="perpage">
                @php
                    $perpage = request('perpage') ?: old('perpage');
                @endphp
                <select name="perpage" class="form-control input-sm perpage filter mr10 setupSelect2">
                    @for($i=20; $i <= 200; $i += 20)
                    <option {{ $perpage == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }} bản ghi</option>
                    @endfor
                </select>

                <input name="userDeleted" value="1" class="checkBox mr-2" id="userdeleted" type="checkbox"> 
                <label class="control-label" for="userdeleted">Thành viên đã xóa</label>
                {{-- <a href="{{ route('user.userDeleted')}}" class="btn btn-warning ml-2">Thành viên đã xóa</a> --}}
            </div>
            <div class="action">
                <div class="d-flex align-items-center action-content justify-content-between">
                    <div class="ibox-tools mx-4">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Publish <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li class="px-5 py-2"><a href="#" class="changeStatusAll" data-field="publish" data-model="User" data-value="1">
                                    kích hoạt Publish </a>
                            </li>
                            <li class="px-5 py-2"><a href="#" class="changeStatusAll" data-field="publish" data-model="User" data-value="0">
                                    Tắt kích hoạt Publish</a>
                            </li>
                        </ul>
                    </div>
                    <select name="publish" class="form-control mr-10 setupSelect2 select-user mx-2" id="">
                        @php
                            
                            $publish = request('publish') ?: old('publish');
                        @endphp
                        {{-- <option value="-1" selected="selected">Chọn tình trạng</option> --}}
                        @foreach (Config('general.publish') as $key => $val)
                            <option {{ $publish == $key ? 'selected' : '' }} value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>
                    <select name="user_catalogue_id" class="form-control mr-10 setupSelect2 select-user" id="">
                        @php
                        $userCatalogue = [
                            'Chọn nhóm thành viên',
                            'Quản trị viên',
                            'Cộng tác viên',
                        ];
                        $userCatalogueOld = request('user_catalogue_id') ?: old('user_catalogue_id');
                        @endphp
                        @foreach ($userCatalogue as $key => $val)
                            <option {{ $userCatalogueOld == $key ? 'selected' : '' }} value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>
                    <div class="d-flex align-items-center">
                        <div class="input-group">
                            <input type="text" name="keyword" value="{{ request('keyword') ?: old('keyword') }}" class="form-control" placeholder="Nhập từ khóa bạn muốn tìm kiếm">
                            <div class="input-group-append">
                                <button type="submit" name="search" value="search" class="btn btn-info btn-sm">TÌm kiếm</button>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('user.create')}}" class="btn btn-success ml-2">+ Thêm thành viên</a>
                </div>
            </div>
        </div>
    </div>
</form>