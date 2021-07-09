@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row jsutify-content-center">
        <div class="col-md-8">
            @if (session('message'))
                <p class="alert alert-success">
            {{ session('message') }}
        </p>
            @endif
            <div class="card">
                <div class="card-header">Add Food</div>
                    <div class="card-body">

                    <!-- Display error -->
                    @if($errors->any())

                    <p class="alert alert-danger">
                    Please check your input
                    </p>

                    @endif
                        <form action="{{ route('food-store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                           <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name')
                                is-invalid
                            @enderror" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                           </div>

                           <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" cols="10" rows="5" class="form-control @error('description')
                                is-invalid
                            @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                           </div>

                           <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control @error('price')
                                is-invalid
                            @enderror" value="{{ old('price') }}">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                           </div>

                           <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" class="form-control @error('category')
                                is-invalid
                            @enderror">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                           </div>

                           <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control @error('image')
                                is-invalid
                            @enderror" value="{{ old('image') }}">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                           </div>

                           <div class="form-group">
                            <button class="btn btn-outline-primary">Submit</button>
                           </div>
                        </form>
                    </div>
                
            </div>
        </div>
    </div>
</div>
@endsection