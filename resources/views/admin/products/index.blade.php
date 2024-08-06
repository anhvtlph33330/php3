@extends('admin.layouts.master')

@section('title')
    Danh sách Sản phẩm
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="row">
            @if (session('success'))
                <div class="alert alert-danger">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Danh sách Sản phẩm</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Danh sách Sản phẩm</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h5 class="card-title mb-0 flex-grow-1">Danh sách sản phẩm</h5>
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Thêm mới</a>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Img Thumbnail</th>
                                    <th>Name</th>
                                    <th>Catelogues</th>
                                    <th>Price Regular</th>
                                    <th>Price Sale</th>
                                    <th>Is Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            @php
                                                $url = $item->image_thumbnail;
                                                if (!\Str::contains($url, 'http')) {
                                                    $url = Storage::url($url);
                                                }
                                            @endphp
                                            <img src="{{ $url }}" alt="" width="100px" height="100px">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->price_regular }}</td>
                                        <td>{{ $item->price_sale }}</td>
                                        <td>
                                            {!! $item->status === 1
                                                ? '<span class="badge bg-success">Yes</span>'
                                                : '<span class="badge bg-danger">No</span>' !!}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group gap-1">
                                                <a href="{{ route('admin.products.edit', $item) }}"
                                                    class="btn btn-warning">EDIT</a>
                                                <form action="{{ route('admin.products.destroy', $item) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    @if ($item->status == 1)
                                                        <button type="submit"
                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không ?')"
                                                            class="btn btn-danger">Delete</button>
                                                    @else
                                                        <button type="submit"
                                                            onclick="return confirm('Bạn có chắc chắn muốn khôi phục sản phẩm này không ?')"
                                                            class="btn btn-info">Restore</button>
                                                    @endif
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div><!--end col-->
        </div>
        <!-- Modal -->
    @endsection

    @section('style-libs')
        <!--datatable css-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
        <!--datatable responsive css-->
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    @endsection

    @section('script-libs')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <!--datatable js-->
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

        <script>
            new DataTable("#example", {
                order: [
                    [0, 'desc']
                ]
            });
        </script>
    @endsection
