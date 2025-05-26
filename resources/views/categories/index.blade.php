<!-- resources/views/categories/index.blade.php -->
<!DOCTYPE html>
<html>
<head><title>Categories</title></head>
<body>
    <h1>Categories</h1>

    <a href="{{ route('categories.create') }}">+ Add New</a>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($categories as $category)
            <li>
                {{ $category->name }}
                <a href="{{ route('categories.edit', $category) }}">Edit</a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
