@extends('layouts.header_footer_layout') {{-- extends from this file --}}

@section('content')
    {{-- same name as @yield in layoutfile --}}
    <div class="row">
        <div class="col-3">
            @include('navigation.left_sidebar')
        </div>
        <div class="col-6">
            <h1>Terms</h1>
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, nostrum, enim labore tempora, a doloribus
                laborum ratione recusandae sint dolor fugiat? Non expedita quasi vitae consequuntur pariatur aliquid modi
                reiciendis.
            </div>
        </div>
        <div class="col-3">
            @include('tweet.search_tweet')
            @include('users.follow.follow')
        </div>
    </div>
@endsection
