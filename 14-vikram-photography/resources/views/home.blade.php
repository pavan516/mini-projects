@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center>Welcome To Admin Panel - Post Here</center></div>
                @include('inc.messages'); 
                <div class="card-body">
                    <!-- Form -->
                    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{ Form::label('title', 'Title') }}
                            {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Enter Title Of Your Post If It Require!']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Description', 'Description') }}
                            {{ Form::textarea('Description', '', ['class' => 'form-control', 'placeholder' => 'Give Description If Require!', 'cols' => '3', 'rows' => '3']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('image', 'Image') }}
                            {{ Form::file('image', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('youtubeurl', 'YouTube Video Url') }}
                            {{ Form::text('youtubeurl', '', ['class' => 'form-control', 'placeholder' => 'Paste Your YouTube Video Url']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('status', 'Type Of Post') }}
                            {{ Form::select('status', ['empty' => 'Empty','services' => 'Services', 'images' => 'Images', 'youtube' => 'Youtube', 'offers' => 'Offers', 'teams' => 'Teams'], 'empty') }}
                        </div>
                        {{ csrf_field() }}
                        <div class="form-group" style="text-align:center;">
                            {{ Form::submit('submit', ['class' => 'btn btn-primary']) }}
                        </div>
                    {!! Form::close() !!}
                    <!-- End Of Form -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
