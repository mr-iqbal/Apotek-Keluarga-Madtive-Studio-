<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page }}  |  {{ $title }}</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/assets/css/trix.css">
    <script type="text/javascript" src="/assets/js/trix.js"></script>

</head>

<body>
<div id="app">
    @include('dashboard.layouts.sidebar')
</div>
<div id="main">
    @include('dashboard.layouts.header')
    @yield('content')
</div>
<script>
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        });

        //to get title and send to slug
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        title.addEventListener('change', function(){
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        }); 
        
        // const name = document.querySelector('#name')
        // const slug = document.querySelector('#slug')

        // name.addEventListener('change', function(){
        // fetch('/dashboard/categories/checkSlug?name=' + name.value)
        //     .then(response => response.json())
        //     .then(data =>slug.value = data.slug)  
        // })
      //untuk preview image ketika di upload
    function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display= 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function (oFREvent){
            imgPreview.src = oFREvent.target.result; 
        }
    }

</script>
<script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="/assets/js/pages/dashboard.js"></script>
<script src="/assets/js/mazer.js"></script>
<script src="/assets/js/extensions/sweetalert2.js"></script>
<script src="/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>

</body>
</html>
