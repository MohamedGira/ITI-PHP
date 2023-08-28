<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $student->name }}</title>
</head>

<body>

    <table border=1 style=" border-collapse:collapse;width:100%">
        <caption>Student</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Track</th>
                <th>Address</th>
                <th>BirthDate</th>
                <th>image</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Back</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name ?? 'unknown' }}</td>
                <td>{{ $student->email ?? 'unknown' }}</td>
                <td>{{ $student->track ?? 'unknown' }}</td>
                <td>{{ $student->address ?? 'unknown' }}</td>
                <td>{{ $student->Bdate ?? 'unknown' }}</td>
                <td><img width="200px" height="200px" src="/Images/{{ $student->image ?? 'unknown' }}" alt="image">
                </td>
                <td>
                    <form action="{{ route('student.edit', $student->id) }}">
                        <input type="submit" value="edit">
                    </form>
                </td>
                <td>
                    <form action="{{ route('student.delete', $student->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="delete">
                    </form>
                </td>
                <td>
                    <form action="{{ route('student.index') }}">
                        <input type="submit" value="back">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    <table border=1 style=" border-collapse:collapse;width:100%">
        <caption>Courses</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($student->enrollments as $item)
                <tr>
                    <td> {{ $item->course->id }}</td>
                    <td> {{ $item->course->name }}</td>
                    <td> {{ $item->course->description }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
