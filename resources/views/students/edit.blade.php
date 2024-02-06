<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <main>
        <div class="container_edit">
            <h1>Edit a Student</h1>
            <div class="form_edit">
                <form method="post" action="{{ route('student.update', ['student'=>$student]) }}">
                    @csrf
                    @method('post')
                <div>
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" placeholder="First Name" value="{{ $student->first_name }}">
                </div>

                <div>
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" placeholder="Last Name" value="{{ $student->last_name }}">
                </div>

                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="email"
                    value="{{ $student->email }}">
                </div>

                <div>
                    <label for="course">Course:</label>
                    <input type="course" name="course" placeholder="BS Information Technology"
                    value="{{ $student->course }}"
                    >
                </div>
                    <div style="display: flex; flex-direction: column; gap:1rem;">
                    <button type="submit" value="update">UPDATE</button>
                    <a href="{{ url('/') }}" class="btn">BACK</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    {{-- <div class="card">
        <h1>Create</h1>
        <form action="{{ route('store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="email" placeholder="Email">
            <button type="submit">Create</button>
        </form>
    </div> --}}
</body>
</html>
