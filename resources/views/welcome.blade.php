@extends('layouts.common',['title' => 'Start Quiz'])
@section('content')

    {!! Form::open(['route' => 'validate_user','class'=>'form-signin', 'method' => 'post']) !!}
    @include('alerts')
    <h1 class="h3 mb-3 font-weight-normal">Enter your email address</h1>
    {!! Form::text('email', old('email'), ['type'=>'email','id' => 'email','placeholder'=>'Email address', 'class' => 'form-control' ]) !!}
    @error('email')
    <div class="small text-danger">{!! $message !!}</div>
    @enderror
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Next</button>
    {!! Form::close() !!}
@endsection
