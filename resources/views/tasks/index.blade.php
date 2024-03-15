<!-- resources/views/tasks/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('TaskList') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <button id="create" class="btn btn-primary mb-1" onclick="">Create</button>
            </div>
        </div>
    </x-slot>

    @if(session('success'))
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                {{session('success')}}
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="card table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Task</th>
                                    <th>Description</th>
                                    <th>Completed?</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                <tr>
                                    <td>{{$task->tid}}</td>
                                    <td>{{$task->title}}</td>
                                    <td>{{$task->description}}</td>
                                    <td>
                                        <form action="/tasks/complete/{{$task->tid}}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="complete" value="{{ $task->complete == 1 ? 0 : 1 }}">
                                            <button type="submit" class="btn btn-success">
                                                {{ $task->complete == 1 ? 'Completed' : 'Incomplete' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td><a class="btn btn-info" href="{{ route('tasks.edit', ['task' => $task->tid]) }}">Edit</a></td>
                                    <td>
                                        <form action="{{route('tasks.destroy',['task'=>$task->tid])}}" method="post" style="display: inline-block;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<script>
    document.getElementById("create").onclick = function() {
        location.href = "{{ route('tasks.create')}}";
    };
</script>