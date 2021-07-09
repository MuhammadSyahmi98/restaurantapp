@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
                <p class="alert alert-success">
                    {{ session('success') }}
                </p>
            @endif
      
            <div class="card">
                <div class="card-header">List of Food
                    <span class="float-right">
                        <a href="{{route('food-create')}}">
                            <button class="btn btn-outline-secondary">Add Food</button>
                        </a>
                    </span>
                </div>
                    <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Descrition</td>
                                <td>Price</td>
                                <td>Category</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                        @if (count($foods)>0)
                            
                        
                        @foreach($foods as $food)
                            <tr>
                                <td><img style="max-height: 35px;" src="{{ asset('images') }}/{{ $food->image }}" alt="Product"></td>
                                <td>{{ $food->name }}</td>
                                <td>{{ $food->description }}</td>
                                <td>{{ $food->price }}</td>
                                <td>{{ $food->category->name}}</td>
                                <td><a href="{{ route('food-edit', $food->id) }}"><button class="btn btn-primary">EDIT</button></a></td>
                                <td>
                                    <form action="{{ route('food-destroy', $food->id) }}" method="POST" onsubmit="return confirm('Are sure want to delete book titled {{ $food->name }}')">
                                    @csrf
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        @else
                        <td colspan="4">No records found</td>

                        @endif
                        </tbody>
                    </table>
                    {{$foods->links()}}
                    </div>
                
            </div>
        </div>
    </div>
</div>
@endsection





