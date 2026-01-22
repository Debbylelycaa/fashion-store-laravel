@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="min-height: 70vh;">
        <h5 class="fw-bold mb-4">TAS BELANJA</h5>

        @if(session('cart') && count(session('cart')) > 0)
            @php
                $total = 0;
                $message = "Halo Admin, saya ingin memesan:";
                $message .= "%0A";

                foreach (session('cart') as $id => $item) {
                    $total += $item['price'] * $item['quantity'];
                    $message .= "- " . $item['name'] . " (" . $item['quantity'] . "x)%0A";
                }

                $message .= "%0ATotal: Rp " . number_format($total, 0, ',', '.');

                $waUrl = "https://wa.me/6281917025525?text=" . $message;
            @endphp

            <div class="row">
                <div class="col-lg-8">
                    @foreach(session('cart') as $id => $details)
                        <div class="card mb-3 border-0 shadow-sm p-3">
                            <div class="row align-items-center">
                                <div class="col-3 col-md-2">
                                    <img src="{{ $details['image'] }}" class="img-fluid rounded">
                                </div>
                                <div class="col-5 col-md-6">
                                    <h6 class="fw-bold mb-0">{{ $details['name'] }}</h6>
                                    <small class="text-primary fw-bold">Rp
                                        {{ number_format($details['price'], 0, ',', '.') }}</small>
                                </div>
                                <div class="col-4 col-md-4 text-end">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <form action="{{ route('cart.update', $id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="action" value="decrease">
                                            <button class="btn btn-sm btn-outline-dark">-</button>
                                        </form>
                                        <span class="mx-3 fw-bold">{{ $details['quantity'] }}</span>
                                        <form action="{{ route('cart.update', $id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="action" value="increase">
                                            <button class="btn btn-sm btn-outline-dark">+</button>
                                        </form>
                                        <form action="{{ route('cart.update', $id) }}" method="POST" class="ms-3">
                                            @csrf
                                            <input type="hidden" name="action" value="remove">
                                            <button class="btn btn-sm btn-link text-danger p-0"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow p-4 bg-white sticky-top" style="top: 100px;">
                        <h5 class="fw-bold mb-3">RINGKASAN</h5>
                        <div class="d-flex justify-content-between mb-4">
                            <span>Total Bayar</span>
                            <h4 class="fw-bold text-primary">Rp {{ number_format($total, 0, ',', '.') }}</h4>
                        </div>
                        <a href="{{ $waUrl }}" target="_blank" class="btn btn-dark w-100 py-3 btn-modern">
                            <i class="bi bi-whatsapp me-2"></i> CHECKOUT VIA WHATSAPP
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-bag-x display-1 text-muted"></i>
                <p class="mt-3">Tas Anda masih kosong.</p>
                <a href="/" class="btn btn-outline-dark btn-modern">Mulai Belanja</a>
            </div>
        @endif
    </div>
@endsection
