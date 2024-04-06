@extends('layouts.header_footer_layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('navigation.left_sidebar')
        </div>
        <div class="col-6">
            @include('tweet.success_message')
            <hr>
            <div class="mt-3">
                @include('tweet.manage_tweet')
            </div>
        </div>
        <div class="col-3">
            @include('users.follow.follow')
        </div>
    </div>
@endsection
