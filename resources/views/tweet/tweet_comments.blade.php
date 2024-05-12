<div>
    <form action="{{ route('tweet.comments.store', $content_detail->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea class="fs-6 form-control" name="create_tweet_comments" rows="1"></textarea>
        </div>
        <div>
            <button class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>

    <hr>
    @forelse ($content_detail->twitter_comments as $tweet_comment)
        <div class="d-flex align-items-start">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                src="{{ $content_detail->user->getImageURL() }}" alt="{{ $content_detail->user->name }}">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6 class="">{{ $content_detail->user->name }}
                    </h6>
                    <small class="fs-6 fw-light text-muted"> {{ $tweet_comment->created_at }}</small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $tweet_comment->comment }}
                </p>
            </div>
        </div>
    @empty
        <div class="p text-center mt-4">No comments found</div>    
    @endforelse
</div>
