@extends('layouts.header_footer_layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('navigation.left_sidebar')
        </div>
        <div class="col-6">
            @include('tweet.success_message')
            @include('tweet.create_tweet')
            <hr>
            @foreach ($twitter_content_details as $content_detail)
                {{-- The child will have this values ($content_detail), no need to do anything. child: 'manage_tweet' view file.  --}}
                <div class="mt-3">
                    @include('tweet.manage_tweet')
                </div>
            @endforeach
            <div class="mt-3">
                {{ $twitter_content_details->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('tweet.search_tweet')
            @include('users.follow.follow')
        </div>
    </div>
@endsection
