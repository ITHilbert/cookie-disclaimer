@if(!isset($_COOKIE["cookies-allow"]))
    <cookie-disclaimer cookieURL="{{ url()->current() }}"></cookie-disclaimer>
    <cookies-infos></cookies-infos>
@endif
