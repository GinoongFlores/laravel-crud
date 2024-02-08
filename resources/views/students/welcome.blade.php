<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRUD - MVC</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>

        <main>
            @include('students.navbar')
            <div class="student_container" style="{{ (session()->has('success') || $errors->any()) ? 'display: block' : 'display: none' }}">
                <div class="student_message">
                    @if (session()->has('success'))
                        <p class="success">
                            Success:{{ session('success') }}
                        </p>
                    @endif
                </div>
                <div class="error_message">
                    @foreach ($errors->all() as $error)
                        <p class="error">
                            Invalid: {{ $error }}
                            </p>
                        @endforeach
                </div>
        </div>
            <div class="container">
                <div class="create_student">
                        <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                        <div>
                            <label for="first_name">First Name:</label>
                            <input type="text" class="large_font" name="first_name" placeholder="First Name">
                        </div>

                        <div>
                            <label for="last_name">Last Name:</label>
                            <input type="text" name="last_name" placeholder="Last Name">
                        </div>

                        <div>
                            <label for="email">Email:</label>
                            <input type="email" name="email" placeholder="email">
                        </div>

                        <div>
                            <label for="course">Course:</label>
                            <input type="course" name="course" placeholder="BS Information Technology">
                        </div>
                            <button type="submit">CREATE</button>
                        <br>
                        <br>
                        </form>
                        <a href="{{ url('/grade/create') }}">
                            <button>
                                VIEW STUDENT GRADES
                                </button>
                        </a>
                </div>
                {{-- read students --}}
                <div class="read_students">
                    <table id="studentsTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th>Edit</th>
                                <th>Add Grade</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->first_name }}</td>
                                <td>{{ $student->last_name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->course }}</td>
                                {{-- <td>{{ $student->created_at->format('Y-m-d h:i:s A') }}</td> --}}
                                <td>
                                    <a href="{{ route('student.edit', ['student' => $student->id])}}" class="edit_btn">Edit</a>
                                </td>
                                <td>
                                    <a href="{{ route('student.grade.input', ['student' => $student->id])}}" class="edit_btn">Add Grade</a>
                                </td>
                                <td>
                                    <form method="post" action="{{ route('student.delete', ['student'=> $student]) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" value="delete" class="delete_btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </main>

    </body>
</html>
