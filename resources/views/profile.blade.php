@extends('layouts.app')

@section('title', 'الصفحة الشخصية')

@section('content')

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card pt-3">
      <div class="text-center">
        <img src="{{ asset(auth()->user()->image) }}" width="82px" height="125px" alt="">
        <h3>{{ auth()->user()->name }}</h3>
      </div>
      <div class="card-body text-right" dir="rtl">
        <form action="/profile" method="post" enctype="multipart/form-data">
          @csrf 
          @method('PATCH')
          <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" name="name" id="name" class="form-control" value="{{auth()->user()->name}}">
          </div>
          <div class="form-group">
            <label for="email">الايميل</label>
            <input type="text" name="email" id="email" class="form-control" value="{{auth()->user()->email}}">
          </div>
          <div class="form-group">
            <label for="password">كلمة المرور</label>
            <input type="password" name="password" id="password" class="form-control">
          </div>
          <div class="form-group">
            <label for="confirm-password">تأكيد كلمة المرور</label>
            <input type="password" name="confirm-password" id="confirm-password" class="form-control">
          </div>
          <div class="form-group">
            <label for="image">تغيير الصورة الشخصية</label>
            <div class="custom-file">
              <input type="file" name="image" id="image" class="custom-file-input">
              <label for="image" id="image-label" class="custom-file-label text-left" data-browse="استعرض"></label>
            </div>
          </div>
          <div class="form-group d-flex flex-row-reverse mt-5">
            <button class="btn btn-primary mr-2" type="submit">حفظ التعديلات</button>
            <button class="btn btn-light" type="submit" form="logout">تسجيل الخروج</button>
          </div>
         </form>
         <form action="/logout" id="logout" method="post">
          @csrf 
          </form>
      </div>
    </div>
  </div>
</div>

@endsection