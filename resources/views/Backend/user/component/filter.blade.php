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
            </div>
            <div class="action">
                <div class="d-flex align-items-center action-content justify-content-between">
                    <select name="user_catalogue_id" class="form-control mr-10 setupSelect2 select-user" id="">
                        <option value="0" selected="selected">Chọn nhóm thành viên</option>
                        <option value="1">Quản trị viên</option>
                    </select>
                    <div class="d-flex align-items-center ml-2">
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