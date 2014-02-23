@extends('layouts.front-end.default')

@section('content')

	<h1>Seng Panhna</h1>

	@if(1==1)
		Hello
	@endif

@stop

@section('sidebar')

	<h1>Seng Panhna</h1>

	@if(1==1)
		Hello 3423423
	@endif

	<button><?= Lang::get('component.save',array('name'=>'panhna','tbName'=>'tbUesr')); ?></button>
	<button><?= trans('component.save'); ?></button>

	<button><?= Lang::choice('component.apples',15);?></button>

    @foreach($users as $user)
        <p>{{ $user->name }}</p>
    @endforeach

@stop