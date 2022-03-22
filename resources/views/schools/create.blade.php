@extends('layouts.admin')

@section('page_title')
    <h1 class="text-center" style="margin-bottom: 1.5rem;">Add School</h1>
@stop

@section('pageContent')
<form action="{{ route('schools.store') }}" method="POST">
    @csrf
    {{ method_field('POST') }}
    <div class="row">
        <div class="form-group col">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" required class="form-control">
            @if($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>
    </div>
    <input type="submit" value="Create">
</form>
@stop
