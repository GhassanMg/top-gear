@extends('layouts.app');

@section('title','Cars');

@section('content')
<div class="container">
    <h1>All Cars</h1>
    <table class="table">
        <thead>
                <th>id</th>
                <th>model</th>
                <th>brand</th>
                <th>colors</th>
                <th>gear_type</th>
                <th>year</th>
                <th>country</th>
                <th>is_new</th>
                <th>description</th>
                <th>action</th>
        </thead>
        <tbody>
            @foreach ($cars as $car)
            <tr>
                <td>{{$car->id}}</td>
                <td><a href="{{route('cars.show',$car->id)}}">{{$car->model}}</a></td>
                <td>{{$car->brand}}</td>
                <td>{{$car->colors}}</td>
                <td>{{$car->gear_type}}</td>
                <td>{{$car->year}}</td>
                <td>{{$car->country}}</td>
                <td>{{$car->is_new}}</td>
                <td>{{$car->description}}</td>
                <td>
                    <form action="{{ route('cars.edit', $car) }}" method="GET"> @csrf <button class="btn btn-warning " type="submit" value="edit">edit</button>  </form>
                </td>
                <td>
                    <form action="{{ route('cars.destroy', $car) }}" method="POST"> @csrf @method('DELETE') <button class="btn btn-danger " type="submit" value="delete">delete</button> </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
