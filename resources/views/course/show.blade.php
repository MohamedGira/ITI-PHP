<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->name }}</title>
</head>

<body>

    <table border=1 style=" border-collapse:collapse;width:100%">
        <caption>course</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Back</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name ?? 'unknown' }}</td>
                <td>{{ $course->description ?? 'unknown' }}</td>
                <td>{{ $course->max_score ?? 'unknown' }}</td>
            
                <td>
                    <form action="{{ route('course.index') }}">
                        <input type="submit" value="back">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    <table border=1 style=" border-collapse:collapse;width:100%">
        <caption>Student</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($course->enrollments as $item)
                <tr>
                    <td> {{ $item->student->id }}</td>
                    <td> {{ $item->student->name }}</td>
                    <td> {{ $item->student->track }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
