@auth
    <h4> Share yours ideas </h4>
    <div class="row">
        {{-- Types of routing --}}

        {{-- <form action="/tweet/create" method="post"> --}}
        {{-- <form action={{ url('/tweet/create') }} method="post"> --}}
        <form action={{ route('tweet.create') }} method="post">
            @csrf
            {{-- Without this it will throw 'Page expired' which is good againist csrf attack. This @csrf will create a token --}}
            <div class="mb-3">
                <textarea class="form-control" id="create_tweet" name="content" rows="3"></textarea>
                @error('content')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    {{-- message is a build in function of error function --}}
                @enderror
            </div>
            <div class="">
                <button class="btn btn-dark"> Share </button>
            </div>
        </form>
    </div>
@endauth
@guest
    <h4> Login to share yours ideas </h4>
@endguest
