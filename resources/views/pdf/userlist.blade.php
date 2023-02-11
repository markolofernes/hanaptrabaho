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
        img,
        .card{
            padding:5px;
            border-radius: 15px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.777);
        }
        .textshadow{
            text-shadow: 1px 1px 3px black;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="card">
    <h1>List of Users</h1>
    <table class="table table-bordered textshadow">
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
</html>