<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.admin.head')
</head>
<body>
 <div class="container">

 @include('layouts.admin.main-sidebar')
 
 <div class="content">
 @include('layouts.admin.main-headbar')
 
 @yield('content')
    </div>
</div> 
    

   
 
</div>

<!--==============================================icons======================================================-->
@include('layouts.admin.script')

</body>
</html>