<form action="{{route('postFile')}}" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	<input type="file" name="myFile">
	<input type="submit">
</form>