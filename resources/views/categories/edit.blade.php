<!-- resources/views/categories/edit.blade.php -->
<!DOCTYPE html>
<html>
<head><title>Edit Category</title></head>
<body>
    <h1>Edit Category</h1>

    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $category->name }}" required>
        <button type="submit">Update</button>
    </form>

    <a href="{{ route('categories.index') }}">← Back</a>
</body>
</html>
