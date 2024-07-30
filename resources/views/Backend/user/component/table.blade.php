<table id="user" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="user_info">
    <thead>
        <tr>
            <th style="width: 3%" class="table-center" style="width: 10px"><input type="checkbox"></th>
            <th style="width: 7%" class="sorting table-center" tabindex="0">Ảnh</th>
            <th style="width: 15%" class="sorting table-center" tabindex="0">Họ và tên</th>
            <th style="width: 15%" class="sorting table-center" tabindex="0"> Email</th>
            <th style="width: 10%" class="sorting table-center" tabindex="0"> SĐT</th>
            <th style="width: 25%" class="sorting table-center" tabindex="0"> Địa chỉ</th>
            <th style="width: 10%" class="sorting table-center" tabindex="0"> Trạng thái</th>
            <th style="width: 10%" class="sorting table-center" tabindex="0"> Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
            <tr>
                <td class="table-center"><input type="checkbox"></td>
                <td class="img-user"><img class="img-fluid" src="{{ asset('Backend/img/user1.png') }}" alt="">
                </td>
                <td> {{ $item->name }} </td>
                <td> {{ $item->email }} </td>
                <td> {{ $item->phone }} </td>
                <td> {{ $item->address . '' . $item->province_id }}</td>

                <td class="table-center checkbox-status">
                    <input class="status" type="checkbox" name="publish" value="{{ $item->publish }}" data-model="User" data-modelId="{{ $item->id}}" data-field="publish"
                        {{ $item->publish == 1 ? 'checked' : '' }} data-bootstrap-switch data-off-color="danger"
                        data-on-color="success">
                        {{-- <input class="status" type="checkbox" name="publish" value="{{ $item->publish }}" data-model="User" data-field="publish"
                        {{ $item->publish == 1 ? 'checked' : '' }} > --}}
                </td>

                <td class="table-center checkbox-status">
                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('user.delete', $item->id) }}" class="btn btn-danger"><i
                            class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{-- <nav aria-label="Page navigation example">
                                                <ul class="pagination d-flex justify-content-center my-3">
                                                    {{ $users->appends(request()->all())->links() }}
                                                </ul>
                                              </nav> --}}
{{ $users->appends(request()->all())->links('pagination::bootstrap-4') }}


