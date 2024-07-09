<div class="filter mb-3">
    <div class="d-flex align-items-center justify-content-between">
        <div class="perpage">
            <select name="perpage" class="form-control input-sm perpage filter mr10">
                @for($i=20; $i < 200; $i += 20)
                <option value="{{ $i }}">{{ $i }} bản ghi</option>
                @endfor
            </select>
        </div>
        <div class="action">
            <div class="d-flex align-items-center">
                <select name="user_catalogue_id" class="form-control" id="">
                    <option value="0" selected="selected">Chọn nhóm thành viên</option>
                    <option value="1">Quản trị viên</option>
                </select>
                <div class="d-flex align-items-center ml-2">
                    <div class="input-group">
                        <input type="text" name="keyword" value="" class="form-control" placeholder="Nhập từ khóa bạn muốn tìm kiếm">
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