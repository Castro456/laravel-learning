@extends('layouts.header_footer_layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('navigation.left_sidebar')
        </div>
        <div class="col-6">
            @include('tweet.success_message')
            <div class="mt-3">
                @include('users.profile.profile_card')

                {{-- For explanation see dashboard.blade file --}}
                @forelse ($twitter_content_details as $content_detail)
                    <div class="mt-3">
                        @include('tweet.manage_tweet')
                    </div>
                @empty
                    <div class="p text-center mt-4">No tweets found</div>
                @endforelse
                <div class="mt-3">
                    {{ $twitter_content_details->withQueryString()->links() }}
                </div>
            </div>

            <hr>
        </div>
        <div class="col-3">
            @include('users.follow.follow')
        </div>
    </div>
@endsection
