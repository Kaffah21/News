

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5">Berita Terbaru</h2>

    <div class="row">
        @foreach($news as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm hover-shadow">
                @if($item->image)
                    <img src="{{ Storage::url('news/'.$item->image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="placeholder">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text text-muted">
                        <small>{{ $item->created_at->format('d F Y') }}</small>
                    </p>
                    <p class="card-text flex-grow-1">
                        {{ Str::limit(strip_tags($item->content), 150) }}
                    </p>
                    <a href="{{ route('news.show', $item->slug) }}" class="btn btn-primary mt-auto">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $news->links() }}
    </div>
</div>

<style>
.hover-shadow:hover {
    transform: translateY(-5px);
    transition: transform 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
}

.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
</style>
@endsection
