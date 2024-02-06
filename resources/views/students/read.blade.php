<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Read</title>
</head>
<body>

    <main>
        <h1>Read</h1>
        <div class="container">
            <table id="studentsTable" border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Created At</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->course }}</td>
                        <td>{{ $student->created_at }}</td>
                        <td>
                            <a href="{{ route('student.edit',['student' => $student]) }}">Edit</a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('student.delete', ['student'=> $student]) }}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="delete" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </main>

</body>
</html>

