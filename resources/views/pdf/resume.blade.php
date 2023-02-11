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
        <table>
            @foreach($Resume as $resume)
                @if ($resume->user_id == Auth::user()->id)
                    {{ $fullname = $resume->fullname }}
                    {{ $Contact = $resume->phone }}
                    {{ $HomeAddress = $resume->address }}
                    {{ $emailaddress = $resume->email }}
                    {{ $description = $resume->textarea }}
                    {{ $myskills = $resume->skills }}
                    {{ $mylanguage = $resume->language }}
                @endif
            @endforeach
        </table>
    </div>

<h2>{{ $fullname }}</h2>
<h6>{{ $Contact }}</h6>
<i>{{ $HomeAddress }}</i><br>
<i>{{ $emailaddress }}</i><br><br>
<h5>{!! $description !!}</h5>   
<h6>{{ $myskills }}</h6>
<h6>{{ $mylanguage }}</h6>


</body>
</html>
</html>
{{-- 

 --}}

{{-- 
fullname
phone
address
email
textarea
skills
language
 --}}
