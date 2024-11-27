<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/scss/app.scss')
    <title>Yu-gi-oh</title>
</head>

<body>


@include('fragments.navbar')

@yield('content')

@vite('resources/js/app.js')


</body>

</html>

