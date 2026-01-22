@extends('layouts.app')

@section('content')
<section class="hero-section" style="height: 80vh; background: url('https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=2000') center/cover;">
    <div class="hero-overlay">
        <div class="container text-white text-center">
            <h1 class="display-2 fw-bold mb-3" style="text-shadow: 2px 2px 10px rgba(0,0,0,0.7);">NEW SEASON</h1>
            <p class="fs-5 mb-4" style="text-shadow: 1px 1px 5px rgba(0,0,0,0.5);">Eksplorasi gaya urban terbaik Anda hari ini.</p>
            <a href="#etalase" class="btn btn-primary btn-lg px-5 py-3 btn-modern">Lihat Koleksi</a>
        </div>
    </div>
</section>

<div class="container mt-5 py-5" id="etalase">
    <div class="text-center mb-5">
        <h2 class="fw-bold">SHOP THE LOOK</h2>
        <div style="width: 50px; height: 3px; background: var(--primary-color); margin: 0 auto;"></div>
    </div>

    <div class="row g-4 row-cols-2 row-cols-md-4">
        @foreach($products as $p)
        <div class="col">
            <a href="{{ route('product.show', $p->id) }}" class="text-decoration-none text-dark">
                <div class="card product-card h-100">
                    <img src="{{ $p->image }}" class="card-img-top" style="aspect-ratio: 3/4; object-fit: cover;">
                    <div class="card-body p-3 text-center">
                        <h6 class="fw-bold mb-1" style="font-size: 0.9rem;">{{ $p->name }}</h6>
                        <p class="text-primary fw-bold mb-0">Rp {{ number_format($p->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

<section class="bg-light py-5" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4">
                <img src="https://images.unsplash.com/photo-1534452203293-494d7ddbf7e0?q=80&w=1000" class="img-fluid shadow rounded" alt="About Us">
            </div>
            <div class="col-md-6 ps-md-5">
                <h6 class="text-primary fw-bold text-uppercase">Tentang Kami</h6>
                <h2 class="fw-bold mb-4">Mendefinisikan Ulang Gaya Anda</h2>
                <p class="text-muted">Kami hadir untuk memberikan kemudahan bagi Anda dalam menemukan pakaian yang tidak hanya mengikuti tren, tetapi juga mencerminkan karakter unik Anda. Setiap helai pakaian dikurasi dengan ketelitian tinggi untuk memastikan kualitas premium.</p>
                <p class="text-muted">Inspirasi kami berasal dari gaya jalanan urban yang dipadukan dengan kenyamanan maksimal.</p>
            </div>
        </div>
    </div>
</section>
@endsection
