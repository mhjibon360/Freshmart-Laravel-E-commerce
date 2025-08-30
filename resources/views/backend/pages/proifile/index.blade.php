@extends('backend.layouts.backend-master')
@section('title', 'your Profile')
@section('content')
    <!-- row -->
    <div class="row mb-8">
        <div class="col-md-12">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                <div>
                    <h2>Your Profile</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                    class="text-inherit">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Your Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="py-6 p-md-6 ">
                <div>
                    <!-- heading -->
                    <h5 class="mb-4">Account details</h5>
                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.update.profile') }}">
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
                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}"
                                placeholder="example@gmail.com" />
                            @error('email')
                                <span class=" text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- input -->
                        <div class="mb-5">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}"
                                placeholder="Phone number" />
                            @error('phone')
                                <span class=" text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- input -->
                        <div class="mb-5">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}"
                                placeholder="Address" />
                            @error('address')
                                <span class=" text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- input -->
                        <div class="mb-5">
                            <label class="form-label">Photo</label>
                            <input type="file" class="form-control dropify" name="photo"
                                data-default-file="{{ asset(Auth::user()->photo) }}" />
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
                    <form  action="{{ route('admin.update.password') }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 col">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="**********" />
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
                {{-- <div>
                    <!-- heading -->
                    <h5 class="mb-4">Delete Account</h5>
                    <p class="mb-2">Would you like to delete your account?</p>
                    <p class="mb-5">This account contain 12 orders, Deleting your account will remove all the order
                        details
                        associated with it.</p>
                    <!-- btn -->
                    <a href="#" class="btn btn-outline-danger">I want to delete my account</a>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
