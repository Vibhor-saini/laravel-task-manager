<!DOCTYPE html>
<html>
<head><title>Create Task</title></head>
<body>
    <h1>Create Task</h1>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <input type="text" name="title" placeholder="Task Title" required>

        <br><br>

        <label for="category_id">Select Category:</label>
        <select name="category_id" required>
            <option value="">-- Select --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <br><br>

        <button type="submit">Add Task</button>
    </form>

    <a href="{{ route('tasks.index') }}">← Back</a>
</body>
</html>
