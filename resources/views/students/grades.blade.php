<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grades</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<main>
    @include('students.navbar')
    <div class="student_message" style="{{
        (session()->has('success') || $errors->any()) ? 'display: block;' : 'display: none'
                }}">
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
        {{-- <div class="grades_student">
            <form action="{{ route('student.grade.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div>
                    <label for="subject_1">Subject #1:</label>
                    <input type="number" step="0.01" min="70" max="100"
                    maxlength="3"
                    class="large_font" name="subject_1" placeholder="86">
                </div>

                <div>
                    <label for="subject_2">Subject #2:</label>
                    <input type="number" step="0.01" min="70" max="100"
                    name="subject_2" placeholder="90"                     maxlength="3"
                    >
                </div>

                <div>
                    <label for="subject_3">Subject #3:</label>
                    <input type="number" step="0.01" min="70" max="100"  name="subject_3" placeholder="99" maxlength="3">
                </div>

                <div>
                    <label for="subject_4">Subject #4:</label>
                    <input type="number" step="0.01" min="70" max="100"  name="subject_4" placeholder="100"                     maxlength="3">
                </div>

                <div>
                    <label for="subject_5">Subject #5:</label>
                    <input type="number" step="0.01" min="70" max="100"  name="subject_5" placeholder="100"                     maxlength="3">
                </div>
                    <button type="submit">CREATE</button>
                <br>
                <br>
            </form>
                    <div>
                <a href="{{ url('/') }}">
                    <button>
                        BACK
                        </button>
                </a>
            </div>
        </div> --}}

    <div class="read_students">
        <table id="studentsTable">
            <h2>Lists of Students Grades</h2>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Grade ID</th>
                    <th>Subject #1</th>
                    <th>Subject #2</th>
                    <th>Subject #3</th>
                    <th>Subject #4</th>
                    <th>Subject #5</th>
                    <th>Average</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($grades as $grade)
                <tr>
                    <td>{{ $grade->students_id }}</td>
                    <td>{{ $grade->student->first_name }}</td>
                    <td>{{ $grade->student->last_name }}</td>
                    <td>{{ $grade->id }}</td>
                    <td>{{ $grade->subject_1 }}</td>
                    <td>{{ $grade->subject_2 }}</td>
                    <td>{{ $grade->subject_3 }}</td>
                    <td>{{ $grade->subject_4 }}</td>
                    <td>{{ $grade->subject_5 }}</td>
                    <td>{{ $grade->average }}</td>
                    <td>
                        <a href={{ route('student.grade.input', ['student'=>$grade->students_id]) }} class="edit_btn">
                            Edit
                        </a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('student.grade.delete', ['grade' => $grade]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" value="delete" class="delete_btn">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        <a href="{{ url('/') }}">
            <button>
                BACK
                </button>
        </a>
    </div>
</div>
</main>

</body>
</html>
