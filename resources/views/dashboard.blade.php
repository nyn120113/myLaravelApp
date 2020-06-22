@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">                
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! -->

                    <div class="card-body">  
                        <a href="/post/create" class="btn btn-primary">Create Post</a>
                    </div>
                    
                    <div class="card-body">  

                    <h3>Your Blog Post</h3>
                    <table class="table table-striped">
                        @if (count($posts) > 0)

                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>                            
                        
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td><a href="/post/{{ $post->post_id }}/edit" class="btn btn-primary">Edit</a></td>
                                <td>
                                    {!! Form::open(['action' => ['PostController@destroy', $post->post_id], 'method' => 'POST']) !!}
                                    <div class="form-group">
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    </div>
                                    {!! Form::close() !!}    

                                </td>
                            </tr>
                        @endforeach

                        @else
                            <tr>
                                <td colspan="3" align="center"> No Post Found</td>
                            </tr>
                        @endif
                    </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
