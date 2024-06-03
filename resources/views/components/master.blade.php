<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ $title }} </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/balloon/ckeditor.js"></script>

    <style>
        .active {
            background-color: #E9F0F8;
            border-radius: 10px;
            font-weight: 700;
        }

        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link.show {
            color: #398FE6;
        }

        .nav-bar {
            background-color: #30be41;
        }

        body {
            background-color: #f2f2f2;
        }

        .nav-color {
            background-color: #ffffff;
            box-shadow: 0px 0px 5px rgb(0, 0, 0, 0.5);
        }

        .footer {
            background-color: #1E3161;
        }

        main {}

        .modal-dialog {
            max-width: 500px;
        }

        .modal-content {
            border: none;
        }

        .modal-header {
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 15px;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .modal-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .close {
            padding: 1rem;
        }

        .btn {
            padding: 0.5rem 1rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        td img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    @include('secciones.menu')

    <main class="container">
        {{ $slot }}
    </main>
    @include('secciones.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('succes-process', (response) => {
                Swal.fire(
                    '¡Proceso completado!',
                    response.mensaje,
                    'success'
                );
            });

            Livewire.on('failed-process', (response) => {
                Swal.fire(
                    'Error',
                    response.mensaje,
                    'error'
                );
            });
        });
    </script>

    @stack('script')
</body>

</html>
