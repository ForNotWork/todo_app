<!-- resoures/views/tasks/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('tasks.update' , $task)}}" method="post">
                        @csrf
                        @method('put')
                        <label for="title" class="control-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$task -> title}}" required>
                        <br>
                        <label for="description" class="control-label">Description</label>
                        <textarea name="description" class="form-control">{{$task -> description}}</textarea>
                        <br>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>