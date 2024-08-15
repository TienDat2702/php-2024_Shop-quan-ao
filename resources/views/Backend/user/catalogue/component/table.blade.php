<table id="user" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="user_info">
    <thead>
        <tr>
            <th style="width: 3%" class="table-center" style="width: 10px"><input type="checkbox" id="checkAll"></th>
            <th style="width: 15%" class="sorting table-center" tabindex="0">Tên nhóm thành viên</th>
            <th style="width: 10%" class="sorting table-center" tabindex="0">Số thành viên</th>
            <th style="width: 10%" class="sorting table-center" tabindex="0"> Mô tả</th>
            <th style="width: 10%" class="sorting table-center" tabindex="0"> Trạng thái</th>
            <th style="width: 10%" class="sorting table-center" tabindex="0"> Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($userCatalogues) && is_object($userCatalogues))
        @foreach ($userCatalogues as $item)
        <tr>
            <td class="table-center"><input type="checkbox" value="{{ $item->id }}" class="checkBoxItem"></td>
            <td> {{ $item->name }} </td>
            <td> {{ $item->name }} </td>
            <td> {{ $item->description }} </td>
            <td class="table-center checkbox-status">
                <input class="status" type="checkbox" name="publish" value="{{ $item->publish }}" data-model="UserCatalogue" data-modelId="{{ $item->id}}" data-field="publish"
                    {{ $item->publish == 1 ? 'checked' : '' }} data-bootstrap-switch data-off-color="danger"
                    data-on-color="success">
            </td>

            <td class="table-center checkbox-status">
                <a href="{{ route('user.catalogue.edit', $item->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                <a href="{{ route('user.catalogue.delete', $item->id) }}" class="btn btn-danger"><i
                        class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
{{-- <nav aria-label="Page navigation example">
                                                <ul class="pagination d-flex justify-content-center my-3">
                                                    {{ $userCatalogues->appends(request()->all())->links() }}
                                                </ul>
                                              </nav> --}}
{{ $userCatalogues->appends(request()->all())->links('pagination::bootstrap-4') }}


