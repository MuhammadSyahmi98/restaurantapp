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
                <div class="card-header">Manage Food Category</div>
                    <div class="card-body">

                    <!-- Display error -->
                    @if($errors->any())

                    <p class="alert alert-danger">
                    Please check your input
                    </p>

                    @endif
                        <form action="{{ route('category-store') }}" method="POST">
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
                            <button class="btn btn-outline-primary">Submit</button>
                           </div>
                        </form>
                    </div>
                
            </div>
        </div>
    </div>
</div>
@endsection