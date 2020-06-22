@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post List</div>
                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! -->
                    @if (count($posts) > 0)
                      @foreach ($posts as $post)
                        <div class='col-md-8'>
                        <h3><a href="{{ url('post/'.$post->post_id.'/show') }}">{{ $post->title }}</a></h3>
                        <p>Created on {{ $post->created_at }} By {{ $post->user->name }} </p>                        
                        </div>
                      @endforeach
                    @endif
                         <div class="card-body">  
                        <a href="/post/create" class="btn btn-primary">Create Post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
