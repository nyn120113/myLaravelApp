@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>
                <div class="card-body">
                  
                  {!! Form::open(['action' => ['PostController@update', $post->post_id], 'method' => 'POST']) !!}
                  <div class="form-group">
                    {{Form::label('title', 'Title')}} 
                    {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('body', 'Body')}} 
                    {{Form::textArea('body', $post->description, ['class' => 'form-control', 'placeholder' => 'Body Text'])}}
                  </div>

                  <div class="form-group">
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                  </div>
                  {!! Form::close() !!}                
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
