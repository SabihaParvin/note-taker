@extends('master')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col">

            <form action="{{route('note.update', $note->id)}}" method="post">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input value="{{$note->title}}" type="tsxt" class="form-control" id="exampleFormControlInput1" placeholder="Enter title here" name="title" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Content</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter content here" name="content" required>{{$note->content}}</textarea>
                </div>
                <button class="btn btn-success">Save</button>
            </form>

        </div>
    </div>
</div>

@endsection