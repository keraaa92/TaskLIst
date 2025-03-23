@extends("layouts.app")

@section("title",  isset($task) ? "Edit Task" : "Add Task")

@section("content")

@section("styles")


@endsection

<form method = "POST"  action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">

    @csrf
    @isset($task)
        @method("PUT")

    @endisset
    <div class = "mb-4">
        <label for="name" > Title </label>
        <input type = "text" name="name" id= "name"
        @class(["border-red-500" => $errors->has("name")])
        value = "{{$task->name ?? old("name")}}"/>
        @error("name")
            <p class = " error" > {{$message}} </p>
        @enderror
    </div>

    <div class = "mb-4">
        <label for = "description"> Description </label>
        <textarea name = "description" id = "description" rows = "5"
        @class(["border-red-500" => $errors->has("description")])>{{$task->description ?? old(key: "description")}}</textarea>
        @error("description")
            <p class = " error" > {{$message}} </p>
        @enderror
    </div>

    <div class = "mb-4">
        <label for = "long_description"> Long Description </label>
        <textarea name = "long_description" id = "long_description" rows = "10"
        @class(["border-red-500 " => $errors->has("long_description")])>{{$task->long_description ?? old("long_description")}}</textarea>
        @error("long_description")
            <p class = " error"> {{$message}} </p>
        @enderror
    </div>
    <div class = "flex gap-x-2">
    <button type = "submit" class = "btn"> @isset($task)
        Update task
        @else
        Add task
    @endisset
</button>
<button type = "submit" class= "btn"> <a href = "{{route("tasks.index")}}" > Cancel </a> </button>

    </div>
</form>

@endsection