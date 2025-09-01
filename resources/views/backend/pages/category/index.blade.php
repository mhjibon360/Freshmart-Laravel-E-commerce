@extends('backend.layouts.backend-master')
@section('title', 'product category list')
@section('content')
    <div class="container">
        <!-- row -->
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                    <!-- pageheader -->
                    <div>
                        <h2>Product category</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                        class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">category</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- button -->
                    <div>
                        <a href="{{ route('admin.product-category.create') }}" class="btn btn-primary">Add New product
                            category</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-12 mb-5">
                <!-- card -->
                <div class="card h-100 card-lg">

                    <!-- card body -->
                    <div class="card-body p-0">
                        <!-- table -->
                        <div class="table-responsive p-4">
                            <table id="example"
                                class="table table-centered table-hover mb-0 text-nowrap table-borderless table-with-checkbox">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Si</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Featured Category</th>
                                        <th>Footer Category</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allcategory as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }} </td>
                                            <td>
                                                <img src="{{ asset($item->category_image) }}" alt=""
                                                    class="icon-shape icon-sm" />
                                            </td>
                                            <td>{{ $item->category_name }}</td>
                                            <td>
                                                <input type="checkbox" class="toggle-class featured_category  btn-sm"
                                                    data-id="{{ $item->id }}" data-toggle="toggle" data-on="Active"
                                                    data-off="Inactive" data-onstyle="success" data-offstyle="danger"
                                                    data-size="small" {{ $item->featured_category == 1 ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <input type="checkbox" class="toggle-class btn-sm footer_category"
                                                    data-id="{{ $item->id }}" data-toggle="toggle" data-on="Active"
                                                    data-off="Inactive" data-onstyle="success" data-offstyle="danger"
                                                    data-size="small" {{ $item->footer_category == 1 ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="feather-icon icon-more-vertical fs-5"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <form
                                                                action="{{ route('admin.product-category.destroy', $item->id) }}"
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
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.product-category.edit', $item->id) }}">
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

                </div>
            </div>
        </div>
    </div>


@endsection

@push('admin_script')
    <script>
        $(function() {
            // featured category status change
            $('.featured_category').change(function() {
                var featured_category = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: route('admin.featured.category.status'),
                    data: {
                        featured_category: featured_category,
                        id: id,
                    },
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        window.location.reload();
                    }
                });
            });
            // Footer category status change
            $('.footer_category').change(function() {
                var footer_category = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: route('admin.footer.category.status'),
                    data: {
                        footer_category: footer_category,
                        id: id,
                    },
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        window.location.reload();
                    }
                });
            });
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
