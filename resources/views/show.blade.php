@extends('layouts.app')

@section('content') 
	@if(@$post)
	<div class="content">
	<div class="form-group">
		<div>ID :</div>
 		<div>{{$post->id}}</div>
 	</div><div class="form-group">
 		<div>Name :</div>
 		<div>{{$post->name}}</div>
 		</div><div class="form-group">
 		<div>Address :</div>
 		<div>{{$post->address}}</div>
 	</div><div class="form-group">
 		<div>Email :</div>
 		<div>{{$post->email}}</div>
 	</div><div class="form-group">
 		<div>Date of Birth :</div>
 		<div>{{$post->dateOfbirth}}</div>
 	</div><div class="form-group">
 		<div>Phone :</div>
		<div>{{$post->phone}}</div>
 	</div>
 </div>
	@endif
@endsection