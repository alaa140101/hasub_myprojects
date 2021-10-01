@extends('layouts.app')

@section('content')
<header class="d-flex justify-content-between align-items center my-5" dir="rtl">
    <div class="h6 text-dark">
        <a href="/projects">صفحةالمشروع ||  {{ $project->title }}</a>
    </div>
    <div>
        <a href="/projects/{{$project->id}}/edit" class="btn btn-primary px-4" role="button">تعديل المشروع </a>
    </div>
</header>

<section class='row text-right' dir="rtl" >
    <div class="col-lg-4">
        {{-- Project Details --}}
            <div class="card text-right mb-3">
              <div class="card-body">
                <div class="status">
                  @switch($project->status)
                      @case(1)
                          <span class="text-success">مكتمل</span>
                          @break
                      @case(2)
                          <span class="text-danger">ملغى</span>
                          @break
                      @default
                          <span class="text-warning">قيد الانجاز</span>
                  @endswitch
                  <h5 class="font-weight-bold card-title">
                    <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                  </h5>
                  <div class="card-text mt-4">
                      {{ $project->description }}
                  </div>

                </div>
            </div>
            @include('projects.footer')
            </div>
      <div class="card">
          <div class="card-body">
              <h5 class="font-weight-bold">تغيير حالة المشروع</h5>
              <form action="/projects/{{ $project->id }}" method="post" >
                @csrf
                @method('PATCH')
                <select name="status" class="custom-select" onchange="this.form.submit()">
                  <option value="0" {{ $project->status == 0 ? 'selected' : ''}}>قيد الانجاز</option>
                  <option value="1" {{ $project->status == 1 ? 'selected' : ''}}>مكتمل</option>
                  <option value="2" {{ $project->status == 2 ? 'selected' : ''}}>ملغى</option>
                </select>
              </form>
          </div>
      </div>
    </div>

    <div class="col-lg-8">
        {{-- Project tasks --}}
        @foreach ($project->tasks as $task)
            <div class="card d-flex flex-row align-items-center mt-2 p-4">
                <div class="{{ $task->done ? 'checked muted' : ''}}">
                    {{$task->body}}
                </div>
                <div class="mr-auto">
                    <form action="/projects/{{$task->project_id}}/tasks/{{$task->id}}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="checkbox" name="done" id="done" class="form-control ml-4" {{ $task->done ? 'checked' : ''}} onchange="this.form.submit()">
                    </form>
                </div>
                <div class="d-flex align-items-center mr-3">
                    <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="post">
                        @method('DELETE')
                            @csrf
                        <input type="submit" class="btn btn-delete mt-1" value="">
                    </form>
                </div>
            </div>
        @endforeach

        <div class="card mt-3">
            <form action="/projects/{{$project->id}}/tasks" method="post" class="d-flex flex-row">
                @csrf
                <input type="text" class="form-control p-2 ml-2 border-0" name="body" placeholder="اضف مهمة جديدة">
                <button type="submit" class="btn btn-primary">اضافة</button>
            </form>
        </div>
    </div>
</section>
@endsection
