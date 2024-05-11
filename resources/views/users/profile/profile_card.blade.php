 <div class="card">
     <div class="px-3 pt-4 pb-2">
         <div class="d-flex align-items-center justify-content-between">
             <div class="d-flex align-items-center">
                 <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                     src="{{ $profile->getImageURL() }}" alt="{{ $profile->name }}">
                 <div>
                     <h3 class="card-title mb-0"><a href="#"> {{ $profile->name }}
                         </a></h3>
                     <span class="fs-6 text-muted">{{ $profile->email }}</span>
                 </div>
             </div>
             <div>
                 @auth
                     @if (Auth::id() === $profile->id)
                         <a href="{{ route('profile.edit', $profile->id) }}">Edit</a>
                     @endif
                 @endauth
             </div>
         </div>
         <div class="px-2 mt-4">
             <h5 class="fs-5"> Bio : </h5>
             <p class="fs-6 fw-light">
             <p class="fs-6 fw-light">
                 {{ $profile->bio }}
             </p>
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
                        {{-- If logged in user follows a user show un-follow button or else show follow button --}}
                        @if (Auth::user()->follows($profile))
                            <form action=" {{ route('users.un-follow', $profile->id) }} " method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"> UnFollow </button>
                            </form>
                        @else
                            <form action=" {{ route('users.follow', $profile->id) }} " method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm"> Follow </button>
                            </form>
                        @endif
                     </div>
                 @endif
             @endauth
         </div>
     </div>
 </div>
 <hr>
