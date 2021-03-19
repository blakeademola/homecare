<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title> @yield('title') | Homecare </title>
    @include('layouts.partials._styles')
</head>

<body class="animsition">
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            @yield('content')
        </div>
    </div>
</div>
@include('layouts.partials._scripts')
<script>
    $( document ).ready(function() {

    });
    @include('layouts.partials._noty')
</script>
</body>

</html>
