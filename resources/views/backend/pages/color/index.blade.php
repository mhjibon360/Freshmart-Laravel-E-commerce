@extends('backend.layouts.backend-master')
@section('title', 'product color list')
@section('content')
    <div class="container">
        <!-- row -->
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                    <!-- pageheader -->
                    <div>
                        <h2>Product color</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                        class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">color</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- button -->
                    <div>
                        <a href="{{ route('admin.product-color.create') }}" class="btn btn-primary">Add New product
                            color</a>
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
                                        <th>color Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allcolor as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }} </td>
                                            <td>{{ $item->color_name }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="feather-icon icon-more-vertical fs-5"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <form
                                                                action="{{ route('admin.product-color.destroy', $item->id) }}"
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
                                                                href="{{ route('admin.product-color.edit', $item->id) }}">
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
            // iconColor: 'white',
            customClass: {
                popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 3500,
            timerProgressBar: true,
        });
        // sweet alert end

        $(function() {
            // featured color status change
            $('.featured_color').change(function() {
                var featured_color = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: route('admin.featured.color.status'),
                    data: {
                        featured_color: featured_color,
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

            // Footer color status change
            $('.footer_color').change(function() {
                var footer_color = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: route('admin.footer.color.status'),
                    data: {
                        footer_color: footer_color,
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
