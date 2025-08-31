@extends('frontend.layouts.frontend-master')
@section('title', 'dashboard')
@section('main')
    <!-- section -->
    <section>
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center d-md-none py-4">
                        <!-- heading -->
                        <h3 class="fs-5 mb-0">Account Setting</h3>
                        <!-- button -->
                        <button class="btn btn-outline-gray-400 text-muted d-md-none btn-icon btn-sm ms-3" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasAccount" aria-controls="offcanvasAccount">
                            <i class="bi bi-text-indent-left fs-3"></i>
                        </button>
                    </div>
                </div>
                <!-- col -->
                <div class="col-lg-3 col-md-4 col-12 border-end d-none d-md-block">
                    @include('frontend.layouts.inc.user-menu')
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="py-6 p-md-6 ">
                        <div>
                            <!-- heading -->
                            <h5 class="mb-4">Account details</h5>
                            <form method="POST" enctype="multipart/form-data" action="{{ route('update.profile') }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                <!-- input -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" value="{{ Auth::user()->name }}" name="name"
                                                class="form-control" />
                                            @error('name')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">User Name</label>
                                            <input type="text" value="{{ Auth::user()->username }}" name="username"
                                                class="form-control" />
                                            @error('username')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- input -->
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ Auth::user()->email }}" placeholder="example@gmail.com" />
                                    @error('email')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- input -->
                                <div class="mb-5">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone"
                                        value="{{ Auth::user()->phone }}" placeholder="Phone number" />
                                    @error('phone')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- input -->
                                <div class="mb-5">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address"
                                        value="{{ Auth::user()->address }}" placeholder="Address" />
                                    @error('address')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- input -->
                                <div class="mb-5">
                                    <label class="form-label">Photo</label>
                                    <input type="file" class="form-control dropify" name="photo"
                                        data-default-file="{{ isset(Auth::user()->photo) ? Auth::user()->photo : Avatar::create(Auth::user()->name)->toBase64() }}" />

                                </div>
                                <!-- button -->
                                <div class="mb-3">
                                    <button class="btn btn-primary">Save Details</button>
                                </div>
                            </form>
                        </div>
                        <hr class="my-10" />
                        <div class="pe-lg-14">
                            <!-- heading -->
                            <h5 class="mb-4">Password</h5>
                            <form action="{{ route('update.password') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 col">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="**********" />
                                            @error('password')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 col">
                                            <label class="form-label">New Password</label>
                                            <input type="password" name="new_password" class="form-control"
                                                placeholder="**********" />
                                            @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 col">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" name="confirm_password" class="form-control"
                                                placeholder="**********" />
                                            @error('confirm_password')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- input -->
                                <div class="col-12">
                                    <p class="mb-4">
                                        Can’t remember your current password?
                                        <a href="{{ route('password.request') }}">Reset your password.</a>
                                    </p>
                                    <button type="submit" class="btn btn-primary">Save Password</button>
                                </div>
                            </form>
                        </div>
                        <hr class="my-10" />
                        <div>
                            <!-- heading -->
                            <h5 class="mb-4">Delete Account</h5>
                            <p class="mb-2">Would you like to delete your account?</p>
                            <p class="mb-5">This account contain 12 orders, Deleting your account will remove all the
                                order
                                details
                                associated with it.</p>
                            <!-- btn -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#deletemodal"
                                class="btn btn-outline-danger">I want to delete my account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--delete modal-->
    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Hey {{ Auth::user()->name }} you want delete
                        your account?</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" action="{{ route('delete.account') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" name="password" class="form-control" id="fullName"
                                placeholder="*******" required />
                            @error('password')
                                <span class=" text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-primary" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
