<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Grade</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="student_message" style="{{
            (session()->has('success') || session()->has('error') || $errors->any()) ? 'display: block;' : 'display: none'
        }}">
            <div class="student_message">
                @if (session()->has('success'))
                    <p class="success">
                        Success:{{ session('success') }}
                    </p>
                @endif
            </div>
            <div class="error_message">
                @if (session('error'))
                    <p class="error">
                        Error: {{ session('error') }}
                    </p>
                @endif
                @foreach ($errors->all() as $error)
                    <p class="error">
                        Invalid: {{ $error }}
                        </p>
                    @endforeach
            </div>
    </div>
    <main>
        @include('students.navbar');
        <div class="container_edit">
            <div class="form_edit">
                <form method="post" action="{{ route('student.grade.add', ['student'=>$student->id]) }}">
                        @csrf
                        @method('post')
                        <div>
                            <h3><span style="font-weight: normal">Student ID:</span> {{ $student->id }}</h3>
                            <h3><span style="font-weight: normal">First Name:</span> {{ $student->first_name }}</h3>
                            <h3><span style="font-weight: normal">Last Name:</span> {{ $student->last_name }}</h3>
                        </div>
                        <br/>
                    <div>
                        <label for="subject_1">Subject 1:</label>
                        <input type="number" name="subject_1" placeholder="100" step="0.01" min="70" max="100" maxlength="3">
                    </div>
                    <div>
                        <label for="subject_2">Subject 2:</label>
                        <input type="number" name="subject_2" placeholder="99" step="0.01" min="70" max="100" maxlength="3">
                    </div>
                    <div>
                        <label for="subject_3">Subject 3:</label>
                        <input type="number" name="subject_3" placeholder="99" step="0.01" min="70" max="100" maxlength="3">
                    </div>
                    <div>
                        <label for="subject_4">Subject 4:</label>
                        <input type="number" name="subject_4" placeholder="100" step="0.01" min="70" max="100" maxlength="3">
                    </div>
                    <div>
                        <label for="subject5">Subject 5:</label>
                        <input type="number" name="subject_5" placeholder="88" step="0.01" min="70" max="100" maxlength="3""
                        >
                    </div>
                        <div style="display: flex; flex-direction: column; gap:1rem;">
                        <button type="submit" value="update">CREATE GRADE</button>
                        <a href="{{ url('/') }}" class="btn">BACK</a>
                        </div>
                </form>
            </div>
            <div class="read_students">
                <table id="studentsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student ID</th>
                            {{-- <th>First name</th>
                            <th>Last name</th> --}}
                            <th>Subject #1</th>
                            <th>Subject #2</th>
                            <th>Subject #3</th>
                            <th>Subject #4</th>
                            <th>Subject #5</th>
                            <th>Average</th>
                            <th>Edit</th>
                            {{-- <th>Delete</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($grades as $grade)
                        <tr>
                            <td>{{ $grade->id }}</td>
                            <td>{{ $grade->students_id }}</td>
                            {{-- <td>{{ $grade->student->first_name }}</td>
                            <td>{{ $grade->student->last_name }}</td> --}}
                            <td>{{ $grade->subject_1 }}</td>
                            <td>{{ $grade->subject_2 }}</td>
                            <td>{{ $grade->subject_3 }}</td>
                            <td>{{ $grade->subject_4 }}</td>
                            <td>{{ $grade->subject_5 }}</td>
                            <td>{{ $grade->average }}</td>
                            <td>
                                <a href={{ route('student.grade.edit', ['grade' => $grade] ) }} class="edit_btn">
                                    Edit
                                </a>
                            </td>
                            {{-- <td>
                                <form method="post" action="{{ route('student.grade.delete', ['grade' => $grade]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" value="delete" class="delete_btn">Delete</button>
                                </form>
                            </td> --}}
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </main>

</body>
</html>
