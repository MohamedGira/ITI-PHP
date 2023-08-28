<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="{{ route('student.index') }}">students</a>
    <table border=1 style=" border-collapse:collapse">
        <caption>courses</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Track</th>
                <th>Visit</th>
             
            </tr>
        </thead>
        <tbody>
            
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->maxScore }}</td>

                    <td>
                        <form action="{{ route('course.show', $course->id) }}">
                            <input type="submit" value="show">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
</body>
