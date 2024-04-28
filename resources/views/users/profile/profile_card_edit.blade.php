 <div class="card">
     <div class="px-3 pt-4 pb-2">
         <form enctype="multipart/form-data" action="{{ route('profile.update', $profile->id) }}" method="post">
             @csrf
             @method('put')
             <div class="d-flex align-items-center justify-content-between">
                 <div class="d-flex align-items-center">
                     <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                         src="{{ $profile->getImageURL() }}" alt="{{ $profile->name }}">
                     <div>
                         <input type="text" name="name" value="{{ $profile->name }}" class="form-control">
                         @error('name')
                             <span class="text-danger fs-6">{{ $message }}</span>
                         @enderror
                     </div>
                 </div>
                 <div>
                     @auth
                         @if (Auth::id() === $profile->id)
                             <a href="{{ route('my-profile') }}">View</a>
                         @endif
                     @endauth
                 </div>
             </div>
             <div class="mt-4">
                 <label for="profile-pic">Profile Picture</label>
                 <input type="file" name="image" id="image" class="form-control">
                 @error('image')
                     <span class="text-danger fs-6">{{ $message }}</span>
                 @enderror
             </div>
             <div class="px-2 mt-4">
                 <h5 class="fs-5"> Bio : </h5>
                 <p class="fs-6 fw-light">
                 <div class="mb-3">
                     <textarea class="form-control" id="edit_tweet" name="bio" rows="3"> {{ $profile->bio }} </textarea>
                     @error('bio')
                         <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                     @enderror
                 </div>
                 <div class="text-center">
                     <button class="btn btn-dark sm mb-3">Update</button>
                 </div>
                 </p>
                 <div class="d-flex justify-content-start">
                     <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                         </span> 120 Followers </a>
                     <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                             {{-- DB Relationship. For counts() use as method tweets() --}}
                         </span> {{ $profile->tweets()->count() }} </a>
                     <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                             {{-- DB Relationship --}}
                         </span> {{ $profile->comments()->count() }} </a>
                 </div>
                 @auth
                     @if (Auth::id() !== $profile->id)
                         <div class="mt-3">
                             <button class="btn btn-primary btn-sm"> Follow </button>
                         </div>
                     @endif
                 @endauth
             </div>
         </form>
     </div>
 </div>
 <hr>
