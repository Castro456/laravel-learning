<h4> Share yours ideas </h4>
<div class="row">
  {{-- Types of routing --}}

  {{-- <form action="/create-tweet" method="post"> --}}
  {{-- <form action={{ url('/create-tweet') }} method="post"> --}}
  <form action={{ route('create.tweet') }} method="post">
    @csrf
    {{-- Without this it will throw 'Page expired' which is good againist csrf attack. This @csrf will create a token --}}
    <div class="mb-3">
      <textarea class="form-control" id="create_tweet" name="create_tweet" rows="3"></textarea>
      @error('create_tweet')
          <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span> 
          {{-- message is a build in function of error function --}}
      @enderror
    </div>
    <div class="">
      <button class="btn btn-dark"> Share </button>
    </div>
  </form>
</div>
