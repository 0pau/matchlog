<!doctype html>
<html lang="en">
@include('partials.head')
<body>
@include('partials.navbar')
<div class="container">
{{ $slot }}
</div>
<script data-navigate-once src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
