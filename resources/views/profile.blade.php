@extends('layouts.app')

@section('title', 'الصفحة الشخصية')

@section('content')

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card pt-3">
      <div class="text-center">
        <img src="{{ asset('storage/' . auth()->user()->image) }}" width="82px" height="125px" alt="">
        <h3>{{ auth()->user()->name }}</h3>
      </div>
      <div class="card-body text-right" dir="rtl">
        <form action="/profile" method="post" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" name="name" id="name" class="form-control" value="{{auth()->user()->name}}">
            @error('name')
                <div class="text-danger">
                    <small>{{$message}}</small>
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">الايميل</label>
            <input type="text" name="email" id="email" class="form-control" value="{{auth()->user()->email}}">
            @error('email')
               <div class="text-danger">
                   <small>{{$message}}</small>
               </div>
           @enderror
          </div>
          <div class="form-group">
            <label for="password">كلمة المرور</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')
                <div class="text-danger">
                    <small>{{$message}}</small>
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="password-confirmation">تأكيد كلمة المرور</label>
            <input type="password" name="password-confirmation" id="password-confirmation" class="form-control">
            @error('password-confirmation')
                <div class="text-danger">
                    <small>{{$message}}</small>
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="image">تغيير الصورة الشخصية</label>
            <div class="custom-file">
              <input type="file" name="image" id="image" class="custom-file-input">
              <label for="image" id="image-label" class="custom-file-label text-left" data-browse="استعرض"></label>
              @error('image')
                <div class="text-danger">
                    <small>{{$message}}</small>
                </div>
            @enderror
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

<script>
    document.getElementById('image').onchange = uploadOnChange;

    function uploadOnChange(){
        let filename = this.value;
        let lastIndex = filename.lastIndexOf("\\");

        if(lastIndex >= 0){
            filename = filename.substring(lastIndex + 1);
        }
        document.getElementById('image-label').innerHTML = filename;
    }
</script>

@endsection
