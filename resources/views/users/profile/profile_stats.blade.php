<div class="d-flex justify-content-start">
    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
        </span> {{ $profile->followers()->count() }} </a>
    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
        {{-- DB Relationship. For counts() use as method tweets() --}}
        </span> {{ $profile->tweets()->count() }} </a>
    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-comment me-1">
        {{-- DB Relationship --}}
        </span> {{ $profile->comments()->count() }} </a>
    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
        </span> {{ $profile->likes()->count() }} </a>
</div>
