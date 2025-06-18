<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        function showSnackBar(message, timeout) {
            let snackbar = document.createElement("div");
            snackbar.className = "snackbar";
            snackbar.innerHTML = message;
            document.body.appendChild(snackbar);
            setTimeout(()=>{
                snackbar.style.animationName = "snackbar-hide";
            },timeout-200);
            setTimeout(()=>{
                snackbar.remove();
            },timeout)
        }
    </script>
</head>
