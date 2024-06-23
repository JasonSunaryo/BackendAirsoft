@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Comment</h2>

    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea name="comment" class="form-control" required>{{ $comment->comment }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Comment</button>
    </form>
</div>
@endsection
