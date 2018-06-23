<form action="{{route('postForm')}}" method="POST" >
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	<label>Nhap ten ban: </label>
	<input type="text" name="HoTen">
	<input type="submit" value="Submit">
</form>