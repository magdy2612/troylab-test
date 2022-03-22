@extends('layouts.admin')

@section('page_title')
    <h1 class="text-center" style="margin-bottom: 1.5rem;">Edit Student</h1>
@stop

@section('pageContent')
<form action="{{ route('students.update', $resource->id ) }}" method="POST">
    @csrf
    {{ method_field('PUT') }}
    <div class="row">
        <div class="form-group col">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" value="{{ $resource->name??'' }}" placeholder="Name" required class="form-control">
            @if($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>
    </div>
    <input type="submit" value="Update">
</form>
@stop
