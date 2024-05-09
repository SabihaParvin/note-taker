@extends('master')

@section('content')

<div class="container col-md-12">
    <h1 class="mt-3 mb-3">Dashboard</h1>
    <div class="row">
        <div class="col-md-3 d-flex ">
            <div class="card flex-fill shadow">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h3 class="mb-2">
                            <i class="bi bi-people"></i>
                                {{$users}} <i class="bi bi-people" style="margin-left: 200px;"></i>
                            </h3>
                            <p class="mb-2">Total Users</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex ">
            <div class="card flex-fill shadow">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h3 class="mb-2">
                                {{$notes}} <i class="fa-solid fa-users" style="margin-left: 200px;"></i>
                            </h3>
                            <p class="mb-2">Total Notes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection