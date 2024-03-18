<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <style>
        body{
            background: #f3f3f3;
        }
        h4{
            margin: 0 0 5px 0;
        }
        small{
            color: #996;
        }
        .container {
            padding: 20px 15px;
            width: 70%;
            margin: 10% 0 0 15%;
            text-align: center;
        }
        .block{
            padding: 0 0 15px 0;
        }
        .btn a {
            display: inline-block;
            padding: 3px 7px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <section class="container">
        <header class="block">
            <h4>MALLA</h4>                    
            {{__("Es un proyecto V-1.0 para  el desarrollo de aplicaciones simple y de 
            alto nivel")}}
        </header>
        <article class="btn">
           <a href="#">{{__("Politicas")}}</a>
           <a href="#">{{__("Soporte")}}</a>
           <a href="#">{{__("Iniciar instalacion")}}</a>
        </article>
    </section>
</body>
</html>