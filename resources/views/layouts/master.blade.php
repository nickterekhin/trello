<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="/css/libs/bootstrap.min.css" rel="stylesheet" >
    

    
    <title>Trello</title>
    <style rel="stylesheet">
        .card * {
            pointer-events: none;
        }
        .card button{
            pointer-events: all;
        }
    </style>
</head>
<body>
<div class="container-fluid" id="main">
    <h1>Trello</h1>
    @yield('content')
    <div class="row py-4 d-none footer-spacer"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="/js/libs/bootstrap.min.js"  crossorigin="anonymous"></script>
<script src="/js/main.js" type="text/javascript"></script>
</body>
</html>
