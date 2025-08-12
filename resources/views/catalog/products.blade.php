@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <h1 class="mb-4 text-left">
            @isset($selectedCategory)
                {{ $selectedCategory->name }}
            @else
                Все товары
            @endisset
        </h1>

        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div style="cursor: pointer;" data-product-slug="{{ $product->slug }}" class="card h-100 shadow-sm product-card">
                        <div class="d-flex align-items-center justify-content-center" style="height: 200px;">
                            <img src="{{ asset($product->picture_path) }}"
                                 class="card-img-top img-fluid p-3"
                                 alt="{{ $product->name }}"
                                 style="max-height: 100%; object-fit: contain;">
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">{{ $product->name }}</h5>

                            <div class="mt-auto d-flex justify-content-between align-items-center pt-3">
                                <span class="h5 mb-0 text-primary">{{ $product->price }} ₽</span>
                                <button class="btn btn-outline-primary add-to-cart"
                                        data-product-id="{{ $product->id }}"
                                        data-product-name="{{ $product->name }}"
                                        data-product-price="{{ $product->price }}"
                                        data-product-image="{{ asset($product->picture_path) }}">
                                    <i class="fas fa-shopping-cart"></i> В корзину
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
    </div>


    @include('partials.cart-modal')


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            $(document).ready(function() {
                $('.add-to-cart').click(function(event) {
                    event.stopPropagation();
                    const productId = $(this).data('product-id');
                    const button = $(this);

                    const productName = $(this).data('product-name');
                    const productPrice = $(this).data('product-price');
                    const productImage = $(this).data('product-image');

                    $('#modal-product-name').text(productName);
                    $('#modal-product-price').text(productPrice + ' ₽');
                    $('#modal-product-image').attr('src', productImage);

                    $('#cartModal').modal('show');

                    button.html('<i class="fas fa-spinner fa-spin"></i> Добавляем');
                    button.prop('disabled', true);

                    setTimeout(function() {
                        button.html('<i class="fas fa-shopping-cart"></i> В корзину');
                        button.prop('disabled', false);

                        const cartCount = $('.badge').text();
                        $('.badge').text(parseInt(cartCount || 0) + 1);
                    }, 1000);
                });

                $('.product-card').click(function () {
                    const productSlug = $(this).data('product-slug');
                    window.location.href = `/products/${productSlug}`;
                });

            });
        });
    </script>
@endsection
