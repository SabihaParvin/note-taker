@extends('master')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col">

            <form action="{{route('note.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="tsxt" class="form-control" id="exampleFormControlInput1" placeholder="Enter title here" name="title" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Content</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter content here" name="content" required></textarea>
                </div>
                <button class="btn btn-success">Save</button>
            </form>

        </div>
    </div>
</div>

@endsection