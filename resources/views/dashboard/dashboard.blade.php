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
            {{-- To checks if a loop is empty and write an else conditon, instead write @forelse()
                if the loop is empty it will run the @empty conditon
            --}}
            @forelse ($twitter_content_details as $content_detail)
                {{-- The child will have this values ($content_detail), no need to do anything. child: 'manage_tweet' view file.  --}}
                <div class="mt-3">
                    @include('tweet.manage_tweet')
                </div>
                @empty
                    <div class="p text-center mt-4">No tweets found</div>    
            @endforelse
            <div class="mt-3">
                {{--
                    pagination code

                    withQueryString() - if search query is triggred and if we paginate those search results without this fn. In the 2nd page itself it will result and the records omiting the search qurey.
                --}}
                {{ $twitter_content_details->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('tweet.search_tweet')
            @include('users.follow.follow')
        </div>
    </div>
@endsection
