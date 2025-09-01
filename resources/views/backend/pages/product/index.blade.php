@extends('backend.layouts.backend-master')
@section('title', 'product list')

@section('content')
    <div class="container">
        <!-- row -->
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                    <!-- pageheader -->
                    <div>
                        <h2>product</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                        class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">product</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- button -->
                    <div>
                        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Add New Product</a>
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
                                class=" table table-centered table-hover mb-0 text-nowrap table-borderless table-with-checkbox">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Proudct Name</th>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Popular</th>
                                        <th>Best Seller</th>
                                        <th>Status</th>
                                        <th>Create at</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allproduct as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($item->thumbnail) }}" alt=""
                                                    class="icon-shape icon-md" />
                                            </td>
                                            <td>{{ $item->product_name }}</td>
                                            <td>{{ $item->category->category_name }}</td>
                                            <td>
                                                @if ($item->type == 'hot')
                                                    <span class="badge bg-light-danger text-dark-danger">Hot</span>
                                                @else
                                                    <span class="badge bg-light-warning text-dark-warning">Sale</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if ($item->discount_price)
                                                    <span class="text-success">${{ $item->discount_price }}</span>
                                                    <span class="text-decoration-line-through">${{ $item->price }}</span>
                                                @else
                                                    <span>${{ $item->price }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->popular_products == '1')
                                                    <span class="badge bg-light-success text-dark-success">Yes</span>
                                                @else
                                                    <span class="badge bg-light-warning text-dark-warning">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->best_sells == '1')
                                                    <span class="badge bg-light-info text-dark-info">Yes</span>
                                                @else
                                                    <span class="badge bg-light-warning text-dark-warning">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                <input type="checkbox" class="toggle-class btn-sm"
                                                    data-id="{{ $item->id }}" data-toggle="toggle" data-on="Active"
                                                    data-off="Inactive" data-onstyle="success" data-offstyle="danger"
                                                    data-size="small" {{ $item->status == 1 ? 'checked' : '' }}>
                                            </td>
                                            <td>{{ $item->created_at->format('d-M-Y') }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="feather-icon icon-more-vertical fs-5"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <form action="{{ route('admin.product.destroy', $item->id) }}"
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
                                                                href="{{ route('admin.product.edit', $item->id) }}">
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
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: route('admin.product.status'),
                    data: {
                        status: status,
                        id: id,
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);

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
                        if (response.active) {
                            Toast.fire({
                                icon: 'success',
                                title: response.active,
                            })
                        } else if (response.deactive) {
                            Toast.fire({
                                icon: 'warning',
                                title: response.deactive,
                            })
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Error',
                            })
                        }
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
