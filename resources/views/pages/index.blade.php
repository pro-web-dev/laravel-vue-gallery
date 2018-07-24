@extends('layout')

@section('content')
    <div class="container">
        <router-view name="galleryIndex"></router-view>
        <router-view></router-view>
    </div>
@endsection