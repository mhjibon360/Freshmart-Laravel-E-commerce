@extends('backend.layouts.backend-master')
@section('title', 'product size list')
@section('content')
    <div class="container">
        <!-- row -->
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                    <!-- pageheader -->
                    <div>
                        <h2>Product size</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                        class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">size</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- button -->
                    <div>
                        <a href="{{ route('admin.product-size.create') }}" class="btn btn-primary">Add New product
                            size</a>
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
                                        <th>size Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allsize as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }} </td>
                                            <td>{{ $item->size_name }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="feather-icon icon-more-vertical fs-5"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <form
                                                                action="{{ route('admin.product-size.destroy', $item->id) }}"
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
                                                                href="{{ route('admin.product-size.edit', $item->id) }}">
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
        // sweet alert
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            // iconsize: 'white',
            customClass: {
                popup: 'sizeed-toast',
            },
            showConfirmButton: false,
            timer: 3500,
            timerProgressBar: true,
        });
        // sweet alert end

        $(function() {
            // featured size status change
            $('.featured_size').change(function() {
                var featured_size = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: route('admin.featured.size.status'),
                    data: {
                        featured_size: featured_size,
                        id: id,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            Toast.fire({
                                icon: 'success',
                                title: response.success,
                            })
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Error',
                            })
                        }
                    }
                });
            });

            // Footer size status change
            $('.footer_size').change(function() {
                var footer_size = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: route('admin.footer.size.status'),
                    data: {
                        footer_size: footer_size,
                        id: id,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            Toast.fire({
                                icon: 'success',
                                title: response.success,
                            })
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Error',
                            })
                        }
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
                    confirmButtonsize: "#3085d6",
                    cancelButtonsize: "#d33",
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
