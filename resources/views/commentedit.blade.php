@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Comment</h1>
        <form action="{{ route('comment.update', $comment) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="content" class="form-label">Comment Content:</label>
                <textarea name="content" class="form-control" required>{{ old('content', $comment->content) }}</textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Comment</button>
        </form>
    </div>
@endsection
