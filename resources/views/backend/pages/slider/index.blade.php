@extends('backend.layouts.backend-master')
@section('title', 'slider list')
@section('content')
    <div class="container">
        <!-- row -->
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                    <!-- pageheader -->
                    <div>
                        <h2>slider</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                        class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">slider</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- button -->
                    <div>
                        <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">Add New Slider</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-12 mb-5">
                <!-- card -->
                <div class="card h-100 card-lg">
                    <div class="px-6 py-6">
                        <div class="row justify-content-between">
                            <div class="col-lg-4 col-md-6 col-12 mb-2 mb-md-0">
                                <!-- form -->
                                <form class="d-flex" role="search">
                                    <input class="form-control" type="search" placeholder="Search Category"
                                        aria-label="Search" />
                                </form>
                            </div>
                            <!-- select option -->
                            <div class="col-xl-2 col-md-4 col-12">
                                <select class="form-select">
                                    <option selected>Status</option>
                                    <option value="Published">Published</option>
                                    <option value="Unpublished">Unpublished</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- card body -->
                    <div class="card-body p-0">
                        <!-- table -->
                        <div class="table-responsive">
                            <table
                                class="table table-centered table-hover mb-0 text-nowrap table-borderless table-with-checkbox">
                                <thead class="bg-light">
                                    <tr>
                                        <th> Si </th>
                                        <th>Slider</th>
                                        <th>Title</th>
                                        <th>Heading</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allslider as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }} </td>
                                            <td>
                                                <img src="{{ asset($item->image) }}" alt=""
                                                    class="icon-shape icon-sm" />
                                            </td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->heading }}</td>
                                            <td>
                                                <input type="checkbox" class="toggle-class btn-sm"
                                                    data-id="{{ $item->id }}" data-toggle="toggle" data-on="Active"
                                                    data-off="Inactive" data-onstyle="success" data-offstyle="danger"
                                                    data-size="small" {{ $item->status == 1 ? 'checked' : '' }}>
                                            </td>

                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="feather-icon icon-more-vertical fs-5"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <form action="{{ route('admin.slider.destroy', $item->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="dropdown-item delete_item">
                                                                    <i class="bi bi-trash me-3"></i>
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('admin.slider.edit',$item->id) }}">
                                                                <i class="bi bi-pencil-square me-3"></i>
                                                                Edit
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div
                        class="border-top d-flex justify-content-between align-items-md-center px-6 py-6 flex-md-row flex-column gap-4">
                        <span>Showing 1 to 8 of 12 entries</span>
                        <nav>
                            <ul class="pagination mb-0">
                                <li class="page-item disabled"><a class="page-link" href="#!">Previous</a></li>
                                <li class="page-item"><a class="page-link active" href="#!">1</a></li>
                                <li class="page-item"><a class="page-link" href="#!">2</a></li>
                                <li class="page-item"><a class="page-link" href="#!">3</a></li>
                                <li class="page-item"><a class="page-link" href="#!">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('admin_script')
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: route('admin.slider.status'),
                    data: {
                        status: status,
                        id: id,
                    },
                    dataType: "json",
                    success: function(response) {
                        window.location.reload();
                    }
                });
            })
        })

        // delete item
        $(document).ready(function() {
            $(document).on('click', '.delete_item', function(e) {
                e.preventDefault();
                var form = $(this).closest("form");
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to delete this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your data has been deleted.",
                            icon: "success"
                        });
                    }
                });

            });
        });
    </script>
@endpush
