<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
<div class="sidebar-header">
<div class="d-flex justify-content-between">
    <div class="logo">
        <h4 class="alert"><a href="/dashboard">Apotek Keluarga</a></h4>
    </div>
    <div class="toggler">
        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
    </div>
</div>
</div>
<div class="sidebar-menu">
<ul class="menu">
    <li class="sidebar-title">Menu</li>  
    <li
        class="sidebar-item {{ Request::is('dashboard') ? 'active' : ''}} ">
        <a href="/dashboard" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>
    
    <li
    class="sidebar-item {{ Request::is('dashboard/posts*') ? 'active' : ''}}">
        <a href="/dashboard/posts" class='sidebar-link'>
            <i class="bi bi-file-text"></i>
            <span>My Posts</span>
        </a>
    </li>

    <li
    class="sidebar-item {{ Request::is('dashboard/categories*') ? 'active' : ''}}">
        <a href="/dashboard/categories" class='sidebar-link'>
            <i class="bi bi-card-list"></i>
            <span>Category</span>
        </a>
    </li>

    <li
    class="sidebar-item {{ Request::is('dashboard/heroes*') ? 'active' : ''}}">
        <a href="/dashboard/hero" class='sidebar-link'>
            <i class="bi bi-card-heading"></i>
            <span>Hero</span>
        </a>
    </li>

    <li
    class="sidebar-item {{ Request::is('dashboard/galleries*') ? 'active' : ''}}">
        <a href="/dashboard/galleries" class='sidebar-link'>
            <i class="bi bi-image"></i>
            <span>Gallery</span>
        </a>
    </li>
</ul>
</div>
<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>