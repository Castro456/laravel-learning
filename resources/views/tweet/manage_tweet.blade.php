<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> Mario
                        </a></h5>
                </div>
            </div>
            <div>
                <form action="{{ route('delete.tweet', $content_detail->id) }}" method="post">
                    @csrf
                    {{-- On web request we can do only get & post so laravel has a spoofing method, but for best practices use 'post' --}}
                    @method('delete')
                    <a class="mx-2" href="{{ route('edit.tweet', $content_detail->id) }}"> Edit </a>
                    <a href="{{ route('show.tweet', $content_detail->id) }}"> View </a>
                    <button class="ms-1 btn btn-danger btn-sm"> X </button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action={{ route('update.tweet', $content_detail->id) }} method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea class="form-control" id="edit_tweet" name="edit_tweet_content" rows="3">{{ $content_detail->content }}</textarea>
                    @error('edit_tweet')
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
