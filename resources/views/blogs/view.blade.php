@extends('layouts.app')

@section('title', 'AdminLTE v4 | View Blog')
@section('breadcrumb-title', 'View Blog')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h3>{{ $blog->title }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Author:</strong> {{ $blog->author ?? 'N/A' }}</p>
                <p><strong>Summary:</strong> {{ $blog->summary ?? 'No summary provided.' }}</p>
                <p><strong>Category:</strong> {{ $blog->category ?? 'Uncategorized' }}</p>
                <hr>
                <div>
                    <strong>Content:</strong>
                    <div>{!! $blog->content !!}</div>
                </div>
                <hr>
                <p><strong>Tags:</strong> {{ $blog->tags ?? 'None' }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
