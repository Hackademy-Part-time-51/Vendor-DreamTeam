<form class="m-0 p-0" action="{{route('setLocale', $lang)}}" method="POST">
    @csrf
    <button type="submit" class="btn btn-lang">
        <img src="{{asset('vendor/blade-flags/language-'.$lang.'.svg')}}" width="32" height="32">
    </button>
</form>