@if (session()->has('tweet_created'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('tweet_created') }}
        {{-- Both session()->has and session() workes same --}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
