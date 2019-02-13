@extends('layouts.app')

@section('content') 
	<style>
		table,th,td{
			border: 1px solid black;
		}
	</style>
	<div class="flash-message">
        @if(session()->has('success'))
		    <div class="alert alert-success">
		        {{ session()->get('success') }}
		    </div>
		@endif
    </div>
	@if(@$posts)
	<table style="width:100%;">
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Date of Birth</th>
			<th>Address</th>
			<th>Operation</th>
		</tr>
		@foreach($posts as $post)
			<div class="well">
		<tr>
			<td>{{$post->name}}</td>
			<td>{{$post->email}}</td>
			<td>{{$post->phone}}</td>
			<td>{{$post->dateOfBirth}}</td>
			<td>{{$post->address}}</td>
			<td>
				<a href="{{ route('posts.show',$post->id) }}">Show</a>
				<a href="{{ route('posts.edit',$post->id) }}">Update</a>
				<form action="{{ route('posts.destroy',$post->id) }}" method="post">
				    <input class="btn btn-default" type="submit" value="Delete" />
				    <input type="hidden" name="_method" value="delete" />
				    {!! csrf_field() !!}
				</form>
			</td>
		</tr>
			</div>
		@endforeach

				</table> 
	@endif
@endsection