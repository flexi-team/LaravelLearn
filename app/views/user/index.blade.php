@extends('layouts.front-end.default')

@section('content')

	<h1>Seng Panhna</h1>

	@if(1==1)
		Hello
	@endif

@stop

@section('sidebar')

	<h1>Side Bar</h1>

	@if(1==1)
		Hello 3423423
		{{$num=1}}
		{{$num}}
	@endif
	<?php echo 'hi'; ?>

@stop