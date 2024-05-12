<div>
  @auth
    @if (Auth::user()->likesTweet($content_detail))
        <form action="{{ route('tweet.unlike', $content_detail->id) }}" method="post">
            @csrf
            <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
              </span> {{ $content_detail->likes()->count() }} </button>
        </form>
    @else
        <form action="{{ route('tweet.like', $content_detail->id) }}" method="post">
            @csrf
            <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
              </span> {{ $content_detail->likes()->count() }} </button>
        </form>
    @endif   
  @endauth
  @guest
      <a href="{{ route('login') }}" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
        </span> {{ $content_detail->likes()->count() }} </a>
  @endguest
</div>
