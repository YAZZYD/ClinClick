<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.fournisseur.head')
</head>
<body>
 <div class="container">
   @include('layouts.fournisseur.main-sidebar')

    <div class="content">
        @include('layouts.fournisseur.main-headbar')
     
        @yield('content')
      
    </div>

</div>

<!--==============================================icons======================================================-->
@include('layouts.fournisseur.script')
</body>
</html>