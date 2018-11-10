<nav>
    <ul>
        @foreach(config('app.nav') as $link => $label)
            <li>
                {{--{{dump(Request::path())}}--}}
                @if(Request::is(substr($link, 1)))
                    {{ $label }}
                @else
                    <a href='{{ $link }}'>{{ $label }}</a>
                @endif
            </li>
        @endforeach
    </ul>
</nav>
