@extends('master')

@section('content')

<div class="container">
    <div class="main-body">
        <div>
            <h3 class="mt-3">Profile</h3>
        </div>
        <div class="row gutters-sm">

            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">

                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <div>
                                            <img src="{{url('/uploads/'. auth()->user()->image)}}" alt="upload image" class="rounded-circle" width="150">
                                        </div>
                                        <div class="mt-3">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ auth()->user()->name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ auth()->user()->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{auth()->user()->phone_no}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                @if (auth()->user()->address)
                                {{auth()->user()->address}}
                                @else
                                <p>Empty</p>
                                @endif

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm">
                                <a class="btn btn-info " href="{{route('edit.profile', auth()->user()->id)}}">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>

<hr>

