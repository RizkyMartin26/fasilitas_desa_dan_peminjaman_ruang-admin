<!DOCTYPE html>
<html lang="en">
<head>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bina Desa')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<!-- Floating WhatsApp Button -->
<a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20ingin%20bertanya%20tentang%20layanan%20desa."
   class="whatsapp-float"
   target="_blank"
   title="Chat via WhatsApp">
   <i class="fab fa-whatsapp"></i>
</a>

<body>
    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
