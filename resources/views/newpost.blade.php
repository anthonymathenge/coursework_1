@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mb-4">Create Post</h1>
                        <form action="{{ route('newpost.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>

                            <div class="form-group">
                                <label for="content">Content:</label>
                                <textarea class="form-control" name="content" rows="4" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

