<div class="card-footer bg-transparent" dir="rtl">
    <div class="d-flex">
        <div class="d-flex align-items-center">
            <img src="/images/clock.svg" alt="" class="icon">
            <div class="mr-2">
                {{ $project->created_at->diffForHumans()}}
            </div>
        </div>
        <div class="d-flex align-items-center mr-4">
            <img src="/images/tasks.svg" alt="" class="icon">
            <div class="mr-2">
                {{ count($project->tasks) }}
            </div>
        </div>

        <div class="d-flex align-items-center mr-auto">
            <form action="/projects/{{$project->id}}" method="post">
                @method('DELETE')
                    @csrf
                <input type="submit" class="btn btn-delete" value="">
            </form>
        </div>
    </div>
</div>
