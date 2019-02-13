@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            @if($errors->any())
            @foreach($errors->all() as $error)
         <p class="alert alert-danger">{{ $error }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endforeach
        @endif
            <div class="content">
                    <div class="content">
                <!-- <div class="title m-b-md"> -->
                    <!-- <?php //$id = $_POST['id'];
                    // $result = DB::table('posts')->select('*')->where('id', $id)->first(); ?>
                     -->{!! Form::open(['route' => ['posts.update',$post->id],  'method'=>'POST']) !!}
                        <div class="form-group">
                            {{Form::label('title','Name')}}
                            {{Form::text('name',$post->name,['class' =>'form-control','placeholder'=>'name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('title','Phone')}}
                            {{Form::text('phone',$post->phone,['class' =>'form-control','placeholder'=>'Phone'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('title','Email')}}
                            {{Form::text('email',$post->email,['class' =>'form-control','placeholder'=>'Email'])}}
                            </div>
                        <div class="form-group">
                            {{Form::label('title','Address')}}
                            {{Form::text('address',$post->address,['class' =>'form-control','placeholder'=>'Address'])}}
                            </div>
                        <div class="form-group">
                            {{Form::label('title','Date of Birth')}}
                            {{Form::date('dateOfBirth',$post->dateObBirth,['class' =>'form-control','placeholder'=>'Date of Birth'])}}</div>
                        <div class="form-group">
                            {{Form::hidden('_method','PUT')}}
                            {{Form::submit('Submit')}}
                        {!! Form::close() !!}
                        <!-- </div> -->

                    </div>
            </div>
                </div>
        </div>
@endsection

