<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Emily" alt="{{ $content_detail->user->name }}">
                <div>
                    {{--
                        If logged in user clicked their name from the tweet they post. The route should be taken to their account and the name of the routes should be 'my-profile' not 'profile/{}'
                     --}}
                    @if (auth()->id() !== $content_detail->user->id)
                        <h5 class="card-title mb-0"><a href="{{ route('profile.show', $content_detail->user->id) }}">
                                {{ $content_detail->user->name }} </a></h5>
                    @else
                        <h5 class="card-title mb-0"><a href="{{ route('my-profile') }}">
                                {{ $content_detail->user->name }} </a></h5>
                    @endif
                </div>
            </div>
            <div>
                @if (auth()->id() === $content_detail->user_id)
                    <form action="{{ route('tweet.delete', $content_detail->id) }}" method="post">
                        @csrf
                        {{-- On web request we can do only get & post so laravel has a spoofing method, but for best practices use 'post' --}}
                        @method('delete')
                        <a class="mx-2" href="{{ route('tweet.edit', $content_detail->id) }}"> Edit </a>
                        <a href="{{ route('tweet.show', $content_detail->id) }}"> View </a>
                        <button class="ms-1 btn btn-danger btn-sm"> X </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action={{ route('tweet.update', $content_detail->id) }} method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea class="form-control" id="edit_tweet" name="content" rows="3">{{ $content_detail->content }}</textarea>
                    @error('content')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="">
                    <button class="btn btn-dark mb-2 btn-sm "> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $content_detail->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $content_detail->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $content_detail->created_at }} </span>
            </div>
        </div>
        @include('tweet.tweet_comments')
    </div>
</div>
