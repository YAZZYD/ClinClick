<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.gerant.head')
</head>
<body>
 <div class="container">
   @include('layouts.gerant.main-sidebar')

    <div class="content">
        @include('layouts.gerant.main-headbar')
        @yield('content')
    </div>

</div>

<!--==============================================icons======================================================-->
@include('layouts.gerant.script')
</body>
</html>