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
                <div class="card-header">List of Food Category
                <span class="float-right">
                        <a href="{{route('category-create')}}">
                            <button class="btn btn-outline-secondary">Add Category</button>
                        </a>
                    </span>
                </div>
                    <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                        @if (count($categories)>0)
                            
                        
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td><a href="{{ route('category-edit', $category->id) }}"><button class="btn btn-primary">EDIT</button></a></td>
                                <td>
                                    <form action="{{ route('category-destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are sure want to delete book titled {{ $category->name }}')">
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
                    </div>
                
            </div>
        </div>
    </div>
</div>
@endsection





