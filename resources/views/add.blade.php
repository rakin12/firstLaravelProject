@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    {!! Form::open(['route' => 'posts.store','method'=>'POST']) !!}
                        <div class="form-group">
                            {{Form::label('title','Name')}}
                            {{Form::text('name','',['class' =>'form-control','placeholder'=>'Name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('title','Phone')}}
                            {{Form::text('phone','',['class' =>'form-control','placeholder'=>'Phone'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('title','Email')}}
                            {{Form::text('email','',['class' =>'form-control','placeholder'=>'Email'])}}
                            </div>
                        <div class="form-group">
                            {{Form::label('title','Address')}}
                            {{Form::text('address','',['class' =>'form-control','placeholder'=>'Address'])}}
                            </div>
                        <div class="form-group">
                            {{Form::label('title','Date of Birth')}}
                            {{Form::date('dateOfBirth','',['class' =>'form-control','placeholder'=>'Date of Birth'])}}</div>
                        <div class="form-group">
                            {{Form::submit('Submit')}}
                        {!! Form::close() !!}
                        </div>

                    </div>
@endsection
