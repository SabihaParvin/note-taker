@extends('master')

@section('content')

<form action="{{route('update.profile', $users->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <h3 class="mt-3">Update Profile</h3>
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
                                        <input type="file"  value="{{$users->image}}" class="form-control" id="validationDefault01" class="rounded-circle" width="150" name="image">
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
                            <input type="text" value="{{$users->name}}" placeholder="Update Your Name" name="name" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" value="{{$users->email}}" placeholder="Update Your email" name="email" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" value="{{$users->phone_no}}" placeholder="Update Your phone number" name="phone" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Enter your address" name="address" required>{{$users->address}}</textarea>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-info ">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>

</form>

@endsection