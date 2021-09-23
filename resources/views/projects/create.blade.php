@extends('layouts.app')

@section('title', 'انشاء مشروع')

@section('content')
<div class="row justify-content-center text-right">
    <div class="col-10">
        <h3 class="text-center pb-5 font-weight-bold">
          مشروع جديد
        </h3>
    <form action="/projects" method="post" dir="rtl">
        @csrf
        <div class="form-group">
          <label for="title">عنوان المشروع</label>
          <input type="text" name="title" class="form-control" id="title" placeholder="ادخل عنوان المشروع">
        </div>
        <div class="form-group">
          <label for="description">وصف المشروع</label>
          <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">انشئ</button>
            <a href="/projects" class="btn btn-light">الغاء</a>
        </div>
    </form>
  </div>
</div>
@endsection
