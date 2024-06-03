<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="telephone=no" name="format-detection" />
    <title>Nueva Factura</title>

    <style>
        /* Estilos CSS simplificados */
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
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .content {
            padding: 20px;
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
            <h2>Se ha creado una nueva factura</h2>
        </div>

        <div class="content">
            <img src="https://fhrvwbt.stripocdn.email/content/guids/a96b7835-27bb-4a31-b7de-740739e27736/images/facturadibujo.jpg"
                alt="Factura" style="display: block; margin: 0 auto;" />
            <h3>Hola {{ $nombreUsuario }}</h3>
            <table>
                <tr>
                    <td>Numero de factura</td>
                    <td>{{ $numeroFactura }}</td>
                </tr>
                <tr>
                    <td>Valor</td>
                    <td>{{ $valorFactura }}</td>
                </tr>
            </table>
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
