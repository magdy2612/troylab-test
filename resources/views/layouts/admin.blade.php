@extends('layouts.app')

@section('menuBar')


<li class="nav-item">
    <a class="nav-link" href="home">{{ __('Home') }}</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="schools">{{ __('Schools') }}</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="students">{{ __('Students') }}</a>
</li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @yield('pageContent')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
