@extends('layouts.app')

@section('title','Messages')

@section('content')
    <section class="section layout_padding">
        <div class="container">
            <h1>Received Messages</h1>
            <table class="table">
                <thead>
                        <th>id</th>
                        <th>name</th>
                        <th>phone</th>
                        <th>received at</th>
                        <th colspan="2">action</th>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                    <tr>
                        <td>{{$message->id}}</td>
                        <td><a href="{{route('admin.messages.show',$message->id)}}">{{$message->name}}</a></td>
                        <td>{{$message->phone}}</td>
                        <td>{{$message->created_at}}</td>
                        <td class="text-center row">
                            <div class="btn-group" role="group">
                                <div class="col-md-6 padding-right: 5px padding-left: 5px;">
                                    <form action="{{ route('admin.messages.show', $message) }}" method="GET">
                                        @csrf
                                        <button type="submit" value="edit" class="btn btn-sm btn-warning">Show</button>
                                    </form>
                                </div>
                                <div class="col-md-6 padding-right: 5px padding-left: 5px;">
                                    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" value="delete" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection
