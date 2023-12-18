<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>@yield('title') laravel</title>
</head>
<body>
    <div class="content w-100 vh-100 d-flex justify-content-center align-items-center">
        <div style="width: 10%;" class="h-100 bg-danger d-flex justify-content-center align-items-center">@include('components.sidebar')</div>
        <div style="width: 90%;" class=" vh-100 d-flex justify-content-center align-items-center">@yield('content')</div>
    </div>
    
</body>
</html>