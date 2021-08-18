@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://avatars.githubusercontent.com/u/28962907?v=4" class="rounded-circle" alt="profile picture" style="max-height: 175px;">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="/p/create">New Post</a>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>474</strong> followers</div>
                <div class="pr-5"><strong>381</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#" target='_blank'>{{ $user->profile->url }}</a></div>
            <a href="/profile/{{ $user->id }}/edit">Edit</a>
        </div>
 
        <div class="row pt-5">
            @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100"> 
                </a>      
            </div>
            @endforeach
        </div>
</div>
@endsection
