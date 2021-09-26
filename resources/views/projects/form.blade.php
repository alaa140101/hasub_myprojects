@csrf
<div class="form-group">
    <label for="title">عنوان المشروع</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="ادخل عنوان المشروع" value="{{$project->title}}">
</div>
<div class="form-group">
    <label for="description">وصف المشروع</label>
    <textarea class="form-control" id="description" name="description" rows="3">{{$project->description}}</textarea>
</div>

