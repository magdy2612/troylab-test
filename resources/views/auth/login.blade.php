@extends('layouts.admin')

@section('page_title')
    <h1 class="text-center" style="margin-bottom: 1.5rem;">Products</h1>
@stop

@section('pageContent')
<form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('POST') }}
    <div class="row">
        <div class="form-group col">
            <label for="name">{{ __('E-mail') }}</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="email" required class="form-control">
            @if($errors->has('email'))
                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="name">{{ __('Password') }}</label>
            <input type="text" name="password" value="{{ old('password') }}" placeholder="password" required class="form-control">
            @if($errors->has('password'))
                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
            @endif
        </div>
    </div>
    <input type="submit" value="Create">
</form>
@stop






















