@extends('layouts.app')

@section('title', 'Welcome to Lincoln')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">LINCOLN / STUDENT SERVICES</p>
            <h1 class="page-title">Welcome to Lincoln</h1>
            <p class="page-description">Your student services workspace, all in one place.</p>
        </div>
        <a class="button button-primary" href="{{ route('students.index') }}">View student directory</a>
    </div>
@endsection
