<!DOCTYPE html>
<html>
<head>
    <title>Task App</title>
</head>
<body>
    <h1>Task List</h1>

    <form method="POST" action="/tasks">
        @csrf
        <input type="text" name="title" placeholder="Task title" required>

        <select name="category_id" required>
            <option value="">-- Select Category --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <button>Add</button>
    </form>

    <ul>
        @foreach($tasks as $task)
            <li>
                <form method="POST" action="/tasks/{{ $task->id }}">
                    @csrf @method('PATCH')
                    <input type="checkbox" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                    {{ $task->title }} — <strong>{{ $task->category->name ?? 'No Category' }}</strong>
                </form>

                <form method="POST" action="/tasks/{{ $task->id }}">
                    @csrf @method('DELETE')
                    <button>Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
