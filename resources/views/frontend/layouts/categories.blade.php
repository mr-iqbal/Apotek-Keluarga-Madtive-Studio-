<div class="col">
    <div class="col-sm-12" id="side-footer">
        <h6 class="text-uppercase">Kategori</h6>
        <div class="row g-0">
            <div class="col-md-8">
                @foreach ($categories as $category)
                <a
                    href="/article/?category={{ $category->name }}" 
                    class="badge bg-secondary badge-pill text-decoration-none" 
                    style="cursor:pointer;" 
                    id="category" 
                    >
                    {{ $category->name }}
                </a>        
                @endforeach
                <hr class="mb-3">
            </div>
        </div>
    </div>
</div>