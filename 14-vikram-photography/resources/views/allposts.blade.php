@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center>All Recent Posts</center></div>
                @include('inc.messages')
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Youtube Url</th>
                            <th>Type Of Post</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>                    
                    <tbody>
                        
                        @if(count($posts) > 0)
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->Description}}</td>
                                    <td>@if(($post->image)=="") @else<img src="/storage/images/{{$post->image}}" width="50" height="50">@endif</td>
                                    <td>{{$post->youtubeurl}}</td>
                                    <td>{{$post->status}}</td>
                                    <td><button class="btn btn-default"><a href="/posts/{{$post->id}}/edit" style="text-decoration: none;">Edit Post</a></button></td>
                                    <td>
                                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull right']) !!} 
                                            {{Form::hidden('_method','DELETE')}} 
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}} 
                                        {!!Form::close() !!}
                                    </td>
                                
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
