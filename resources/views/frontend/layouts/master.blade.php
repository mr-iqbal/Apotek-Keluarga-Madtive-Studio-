<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page }} | {{ $title }}</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/assets/css/trix.css">
    <script type="text/javascript" src="/assets/js/trix.js"></script>

</head>

<body>
    @include('frontend.layouts.navbar')
    @yield('content')

<script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="/assets/js/pages/dashboard.js"></script>
<script src="/assets/js/mazer.js"></script>
<script src="{{ asset('assets/js/extensions/sweetalert2.js') }}"></script>
<script src="/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
<script>
    
    let side = document.getElementById('side-footer')
    let nav = document.querySelector('.navbar')
    const login = document.querySelector('#btn-login')
    const category = document.getElementById('category')

    window.addEventListener('scroll', function() {
        
        //memberi posisi fixed pada categories, ketika document.element di scroll lebih dari 500px
        // if (document.documentElement.scrollTop > 500) {
            // side.style.position='fixed'
            // side.style.top='8rem'
            // side.style.right='5.5rem'
        // } 
        //memberi posisi static pada categories /home
        // if (document.documentElement.scrollTop < 500 || document.documentElement.scrollTop >= 1450) {
            // side.style.position='static'
        // }

    })
    //memberi efek hover pada category button
    category.addEventListener('mouseenter', function(){
        category.classList.add('text-dark')
    })
    category.addEventListener('mouseleave', function(){
        category.classList.remove('text-dark')
    })
    //memberi efek hover pada button
    login.addEventListener('mouseenter', function(){
        login.classList.add('text-primary')
    }) 
    login.addEventListener('mouseleave', function(){
        login.classList.remove('text-primary')
        login.style.textDecoration=''
    }) 
    //hero section
    const hero = document.querySelector('#hero')
    hero.style.paddingTop='75px'
    hero.style.paddingBottom='50px'

    //memberi style pada author
    const author = document.getElementById('author')
    const imgAuthor = document.getElementById('img-author')

    author.addEventListener('mouseenter', function(){
        author.style.textDecoration='underline'
        author.style.cursor='pointer'
    })
    imgAuthor.addEventListener('mouseenter', function(){
        imgAuthor.style.cursor='pointer'
    })
    author.addEventListener('mouseleave', function(){
        author.style.textDecoration=''
    })
    
</script>

</body>
</html>
