{{$error or ''}}
<form action="{{route('login')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="text" name="username" placeholder="User">
    <input type="password" name="password" placeholder="Password">
    <input type="submit">
</form>