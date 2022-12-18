@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center>All Bookings</center></div>
                @include('inc.messages')
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Message</th>
                            <th>Type Of Order</th>
                            <th>Date</th>
                            <th>Delete</th>
                        </tr>
                    </thead>                    
                    <tbody>
                        
                        @if(count($posts) > 0)
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->name}}</td>
                                    <td>{{$post->email}}</td>
                                    <td>{{$post->contactno}}</td>
                                    <td>{{$post->message}}</td>
                                    <td>{{$post->ordertype}}</td>
                                    <td>{{$post->created_at}}</td>
                                    <td>
                                        {!! Form::open(['action' => ['BookingController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull right']) !!} 
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
