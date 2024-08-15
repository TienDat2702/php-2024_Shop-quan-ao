<form action="{{ route('user.catalogue.index') }}">
    <div class="filter mb-3">
        <div class="d-flex align-items-center justify-content-end">
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
                            $publishArray = ['Không hoạt động', 'Hoạt động'];
                            $publish = request('publish') ?: old('publish');
                        @endphp
                        <option value="-1" selected="selected">Chọn tình trạng</option>
                        @foreach ($publishArray as $key => $val)
                            <option {{ $publish == $key ? 'selected' : '' }} value="{{ $key }}">{{ $val }}</option>
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
                    <a href="{{ route('user.catalogue.create')}}" class="btn btn-success ml-2">+ Thêm nhóm thành viên</a>
                </div>
            </div>
        </div>
    </div>
</form>