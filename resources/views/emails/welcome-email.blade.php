<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="telephone=no" name="format-detection" />
    <title>Bienvenida</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
        }

        .header {
            background-color: #008000;
            /* Verde */
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            /* Añadido border-radius para esquinas redondeadas */
        }

        .content {
            padding: 20px;
            text-align: center;
            /* Centrar el contenido */
        }

        .footer {
            background-color: #f0f0f0;
            padding: 20px;
            text-align: center;
            font-size: 14px;
        }

        .footer a {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .social-icons {
            margin-top: 20px;
        }

        .social-icons a {
            display: inline-block;
            margin-right: 10px;
        }

        .social-icons img {
            width: 30px;
            height: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>¡Bienvenido a nuestra plataforma {{$nombreUsuario}}!</h1>
        </div>

        <div class="content">
            <img src="https://img.freepik.com/free-vector/hand-drawn-flat-design-people-waving-illustration_23-2149195759.jpg?t=st=1715746205~exp=1715749805~hmac=153bb1ffa3321e993484700c5c65e2bea19573f4e103a93a946776e62617010f&w=900"
                alt="Bienvenida" style="max-width: 100%;" />
            <h2>Estamos encantados de tenerte a bordo</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <p>Id, laudantium? Dolore atque sequi quo, maxime suscipit natus nihil</p>
        </div>

        <div class="footer">
            <p>Dirección: ubicación</p>
            <p>Email: <a href="#">your@mail.com</a></p>
            <p>Teléfono: <a href="tel:1234567890">123 456-78-90</a></p>
            <div class="social-icons">
                <a href="#"><img
                        src="https://fhrvwbt.stripocdn.email/content/assets/img/social-icons/rounded-colored/facebook-rounded-colored.png"
                        alt="Facebook" /></a>
                <a href="#"><img
                        src="https://fhrvwbt.stripocdn.email/content/assets/img/social-icons/rounded-colored/youtube-rounded-colored.png"
                        alt="YouTube" /></a>
                <a href="#"><img
                        src="https://fhrvwbt.stripocdn.email/content/assets/img/social-icons/rounded-colored/instagram-rounded-colored.png"
                        alt="Instagram" /></a>
                <a href="#"><img
                        src="https://fhrvwbt.stripocdn.email/content/assets/img/social-icons/rounded-colored/twitter-rounded-colored.png"
                        alt="Twitter" /></a>
            </div>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.</p>
            <p>
                <a href="">Politica y privacidad</a>
            </p>
            <p>&copy; Yo Todos los derechos reservados</p>
        </div>
    </div>
</body>

</html>
