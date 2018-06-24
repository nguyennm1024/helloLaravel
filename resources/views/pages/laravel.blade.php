@extends('layouts.master')

@section('NoiDung')
<h2>Laravel</h2>
<!-- @if($khoahoc != "")
{{$khoahoc}}
@else
    {{"Khong co khoa hoc"}}
@endif -->
{{'Khong co khoa hoc'}}
@for($i = 1; $i <=10; $i++)
    {{'Nguyen '}}
    {{$i}}
@endfor
@endsection