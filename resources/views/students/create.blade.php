<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>

    <main>
        <div class="container">
            <div class="form">
                <form action="{{ route('student.store') }}" method="post">
                    @csrf
                    @method('post')
                <div>
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" placeholder="First Name">
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
