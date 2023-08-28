<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit student</title>
</head>

<body>
    
    <form action="{{route('student.update',$student->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="name" value="{{$student->name}}">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="email" value="{{$student->email}}">
        <label for="track">Track</label>
        <input type="text" name="track" placeholder="track" value="{{$student->track}}">
        <label for="address">Address</label>
        <input type="text" name="address" placeholder="address" value="{{$student->address}}">
        <label for="Bdate">BirthDate</label>
        <input type="text" name="Bdate" placeholder="YYYY-MM-DD" value="{{$student->Bdate}}">
        <label for="image">Image</label>
        <input type="file" name="image" >
        <input type="submit" value="Update">
    </form>
    <td>
        <form action="{{ route('student.index') }}">
            <input type="submit" value="back">
        </form>
    </td>
</body>

