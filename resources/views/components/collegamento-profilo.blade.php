<div class="collegamento-profilo rounded-circle d-flex justify-content-center align-items-center position-fixed shadow-sm d-none d-lg-block" >
    <a href="{{route('personalArea', Auth::user()->id)}}" class="text-blu text-decoration-none " >
        <img src="{{asset('storage/'.Auth::user()->profile_image) }}" class="rounded-circle img-thumbnail" alt="" height="50" width="50">
    </a>
</div>