@extends('layouts.app')

@section('content')
    <div class="container">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h2>Edit Profile</h2>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Title</label>

                        <input 
                        id="title"
                        name="title" 
                        type="text" 
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') ?? $user->profile->title }}" 
                        autocomplete="title" 
                        autofocus>

                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">description</label>

                        <input 
                        id="description"
                        name="description" 
                        type="text" 
                        class="form-control @error('description') is-invalid @enderror"
                        value="{{ old('description') ?? $user->profile->description }}" 
                        autocomplete="description" 
                        autofocus>

                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label">url</label>

                        <input 
                        id="url"
                        name="url" 
                        type="text" 
                        class="form-control @error('url') is-invalid @enderror"
                        value="{{ old('url') ?? $user->profile->url }}" 
                        autocomplete="url" 
                        autofocus>

                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label">Profile Pic</label>
                    <input type="file" class="form-control-file" id="image"name="image">

                    @error('image')
                            <span style="color: #D54D30; font-size: 0.85em;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="row pt-1">
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
            </div>
        </form>
    </div>
@endsection