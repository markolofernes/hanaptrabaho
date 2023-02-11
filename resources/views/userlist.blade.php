<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        .card{
            padding:5px;
            border: solid black;
            border-radius: 10px;
            box-shadow: 3px 3px 7px rgba(0,0,0,0.5);
        }
    </style>
</head>
<body>
    <div class="card">
    <h1>List of Users</h1>
    <img src="https://hips.hearstapps.com/hmg-prod/images/inspirational-quote-hrm-queen-elizabeth-ii-1665765893.png?resize=480:*" alt="test">
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>Email</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->firstname }}</td>
            <td>{{ $user->lastname }}</td>
            <td>{{ $user->email }}</td>
        </tr>
        @endforeach
    </table>
    </div>
</body>
</html>