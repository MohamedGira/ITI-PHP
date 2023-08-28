<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="{{ route('course.index') }}">courses</a>

    <table border=1 style=" border-collapse:collapse">
        <caption>Students</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Track</th>
                <th>Image</th>
                <th>Visit</th>

             
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->track }}</td>
                    <td><img width="200px" height="200px" src="/Images/{{ $student->image   ?? 'unknown' }}" alt="image"></td>

                    <td>
                        <form action="{{ route('student.show', $student->id) }}">
                            <input type="submit" value="show">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <form action="{{route('student.create')}}">
        <input type="submit" value="create student">
    </form>
    
</body>
