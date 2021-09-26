@extends('layouts.app')

@section('title', 'تعديل مشروع')

@section('content')
<div class="row justify-content-center text-right">
    <div class="col-10">
        <h3 class="text-center pb-5 font-weight-bold">
          تعديل مشروع
        </h3>
    <form action="/projects/{{$project->id}}" method="post" dir="rtl">
        @method('PATCH')
        @include('projects.form')
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">تعديل</button>
            <a href="/projects" class="btn btn-light">الغاء</a>
        </div>
    </form>
  </div>
</div>
@endsection
