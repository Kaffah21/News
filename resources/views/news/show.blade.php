

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Berita</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $news->title }}</li>
                </ol>
            </nav>

            <article class="blog-post bg-white p-4 rounded shadow-sm">
                <h1 class="blog-post-title mb-3">{{ $news->title }}</h1>
                
                <div class="blog-post-meta text-muted mb-4">
                    <span class="me-3">
                        <i class="fas fa-calendar-alt"></i> 
                        {{ $news->created_at->format('d F Y') }}
                    </span>
                </div>

                @if($news->image)
                    <div class="blog-post-image mb-4">
                        <img src="{{ Storage::url('news/'.$news->image) }}" 
                             class="img-fluid rounded" 
                             alt="{{ $news->title }}"
                             style="width: 100%; max-height: 400px; object-fit: cover;">
                    </div>
                @endif

                <div class="blog-post-content">
                    {!! $news->content !!}
                </div>

                <hr class="my-4">

                <div class="blog-post-footer">
                    <a href="{{ route('news.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Berita
                    </a>
                </div>
            </article>

            @if(isset($relatedNews) && $relatedNews->count() > 0)
            <div class="related-posts mt-5">
                <h3 class="mb-4">Berita Terkait</h3>
                <div class="row">
                    @foreach($relatedNews as $related)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 shadow-sm hover-shadow">
                            @if($related->image)
                                <img src="{{ Storage::url('news/'.$related->image) }}" 
                                     class="card-img-top" 
                                     alt="{{ $related->title }}"
                                     style="height: 150px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h6 class="card-title">{{ $related->title }}</h6>
                                <a href="{{ route('news.show', $related->slug) }}" 
                                   class="btn btn-sm btn-outline-primary mt-2">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
.blog-post {
    line-height: 1.8;
}

.blog-post-content {
    font-size: 1.1rem;
}

.blog-post-content p {
    margin-bottom: 1.5rem;
}

.blog-post-content img {
    max-width: 100%;
    height: auto;
    margin: 1rem 0;
}

.hover-shadow:hover {
    transform: translateY(-5px);
    transition: transform 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
}
</style>
@endsection