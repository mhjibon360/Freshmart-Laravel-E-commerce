@extends('backend.layouts.backend-master')
@section('title', 'service list')
@section('content')
    <div class="container">
        <!-- row -->
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                    <!-- pageheader -->
                    <div>
                        <h2>service</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                        class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">service</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- button -->
                    <div>
                        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Add New service</a>
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
                                        <th>Si</th>
                                        <th>Icon</th>
                                        <th>Heading</th>
                                        <th>Details</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allservice as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }} </td>
                                            <td>
                                                <img src="{{ asset($item->icon) }}" alt=""
                                                    class="icon-shape icon-sm" />
                                            </td>
                                            <td>{{ $item->heading }}</td>
                                            <td>{{ $item->details }}</td>
                                            <td>{{ $item->created_at->format('d M Y') }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="feather-icon icon-more-vertical fs-5"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <form action="{{ route('admin.services.destroy', $item->id) }}"
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
                                                                href="{{ route('admin.services.edit', $item->id) }}">
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
