@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <a href="/" class="btn btn-link text-dark text-decoration-none mb-4 fw-600">
        <i class="bi bi-arrow-left me-2"></i> Kembali ke Etalase
    </a>

    <div class="row g-5">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="{{ $product->image }}" class="img-fluid" alt="{{ $product->name }}">
            </div>
        </div>
        <div class="col-md-6">
            <h1 class="fw-bold mb-2">{{ $product->name }}</h1>
            <h3 class="text-primary fw-bold mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>

            <p class="text-muted mb-5">{{ $product->description }}</p>

            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-dark btn-lg btn-modern">
                        <i class="bi bi-cart-plus me-2"></i> Tambahkan ke Tas
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
