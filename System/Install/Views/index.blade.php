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
            <p>
                {{__("Malla V-1.0 es un aplicativo de gestión para enfocado en el desarrollo de aplicaciones simple y de 
                alto nivel.")}}
            </p>
            <p>{{__("Al iniciar la instalación se publicara los ficheros requeridos del aplicativo.")}}</p>
        </header>
        <article class="btn">
           <a href="#">{{__("Politicas")}}</a>
           <a href="https://github.com/linaresdev/malla" target="_blank">{{__("Soporte")}}</a>
           <a href="{{__url('env')}}">{{__("Iniciar instalación")}}</a>
        </article>
    </section>
</body>
</html>