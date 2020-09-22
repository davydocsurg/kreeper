@extends('layouts.main')

@section('content')
<!-- <div class="layout"> -->
    <!-- <navbar/> -->
    <sidebar :user="{{ auth()->user() }}" id="app" />
<!-- </div> -->
@endsection
