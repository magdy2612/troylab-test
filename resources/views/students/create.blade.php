@extends('layouts.admin')

@section('page_title')
    <h1 class="text-center" style="margin-bottom: 1.5rem;">Add Student</h1>
@stop

@section('pageContent')
<form action="{{ route('students.store') }}" method="POST">
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
    <div class="row">
        <div class="form-group col">
            <label for="school_id">{{ __('School') }}</label>
            <select name="school_id" id="school_id" required class="form-control">
                @foreach($schools as $school)
                    <option value="{{$school->id}}" {{ old('school_id')==$school->id?"selected":"" }}>
                        {{$school->name}}
                    </option>
                @endforeach
            </select>
            @if($errors->has('school_id'))
                <div class="alert alert-danger">{{ $errors->first('school_id') }}</div>
            @endif
        </div>
    </div>
    <input type="submit" value="Create">
</form>
@stop
