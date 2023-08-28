<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new student</title>
</head>

<body>

    <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="name">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="email">
        <label for="track">Track</label>
        <input type="text" name="track" placeholder="track">
        <label for="address">Address</label>
        <input type="text" name="address" placeholder="address">
        <label for="Bdate">BirthDate</label>
        <input type="text" name="Bdate" placeholder="YYYY-MM-DD">
        <hr>
        <label for="image">Image</label>
        <input type="file" name="image" >
        <input type="submit" value="Create">
    </form>
    <td>
        <form action="{{ route('student.index') }}">
            <input type="submit" value="back">
        </form>
    </td>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
