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

    <main>
        <div class="container_edit">
            <h1>Edit a Student</h1>
            <div class="form_edit">
                <form method="post" action="{{ route('student.grade.update', ['grade'=>$grade]) }}">
                    @csrf
                    @method('post')
                <div>
                    <label for="subject_1">Subject 1:</label>
                    <input type="number" name="subject_1" placeholder="100" value="{{ $grade->subject_1 }}" step="0.01" min="70" max="100" maxlength="3">
                </div>
                <div>
                    <label for="subject_2">Subject 2:</label>
                    <input type="number" name="subject_2" placeholder="99" value="{{ $grade->subject_2 }}" step="0.01" min="70" max="100" maxlength="3">
                </div>
                <div>
                    <label for="subject_3">Subject 3:</label>
                    <input type="number" name="subject_3" placeholder="99" value="{{ $grade->subject_3 }}" step="0.01" min="70" max="100" maxlength="3">
                </div>
                <div>
                    <label for="subject_4">Subject 4:</label>
                    <input type="number" name="subject_4" placeholder="100" value="{{ $grade->subject_4 }}"
                    >
                </div>
                <div>
                    <label for="subject5">Subject 5::</label>
                    <input type="number" name="subject_5" placeholder="88" value="{{ $grade->subject_5 }}" step="0.01" min="70" max="100" maxlength="3""
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

</body>
</html>
