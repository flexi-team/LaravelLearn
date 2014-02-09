@extends('layouts.front-end.default')


@section('content')

	<h1>Seng Panhna</h1>
	<!-- <a href="http://cambomovie.com/video/khmer/khmer-comedy/8Hs3M6LGicU/chun-luos-brus-met.html#.UvcobfmSxmx">link</a> -->
	@if(1==1)
		Hello
		<?php $i=1; ?>
		{{$i}}

		{{{isset($i)?'have':'no'}}}

		{{{$i or 'default'}}}
	
	@endif

@stop
<div ng-controller="testCtrl">
	<% name %>
</div>
@section('sidebar')

	<h1>Side Bar</h1>

	@if(1==1)
		Hello 3423423
		<?php $i=1; ?>
		{{$i}}
	@endif

	<?php echo 'hi'; ?>

@stop