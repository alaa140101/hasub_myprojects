@extends('layouts.app')

@section('title', 'الصفحة الشخصية')

@section('content')

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card">
      <div class="text-center">
        <img src="{{ asset(auth()->user()->image) }}" width="82px" height="82px" alt="">
        <h3>{{ auth()->user->name }}</h3>
      </div>
    </div>
  </div>
</div>

@endsection