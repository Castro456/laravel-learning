<div>
    <form action="{{ route('create.tweet_comments', $content_detail->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea class="fs-6 form-control" name="create_tweet_comments" rows="1"></textarea>
        </div>
        <div>
            <button class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>

    <hr>
    @foreach ($content_detail->twitter_comments as $tweet_comment)
    <div class="d-flex align-items-start">
        <img style="width:35px" class="me-2 avatar-sm rounded-circle"
            src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Luigi" alt="Luigi Avatar">
        <div class="w-100">
            <div class="d-flex justify-content-between">
                <h6 class="">Luigi
                </h6>
                <small class="fs-6 fw-light text-muted"> {{ $tweet_comment->created_at }}</small>
            </div>
            <p class="fs-6 mt-3 fw-light">
                {{ $tweet_comment->comment }}
            </p>
        </div>
    </div>
    @endforeach
</div>