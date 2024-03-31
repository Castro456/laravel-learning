@if (session()->has('tweet'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('tweet') }}
        {{-- Both session()->has and session() works same --}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
