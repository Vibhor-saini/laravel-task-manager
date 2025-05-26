<!-- resources/views/categories/create.blade.php -->
<!DOCTYPE html>
<html>
<head><title>Create Category</title></head>
<body>
    <h1>Create Category</h1>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Category Name" required>
        <button type="submit">Add</button>
    </form>

    <a href="{{ route('categories.index') }}">← Back</a>
</body>
</html>
