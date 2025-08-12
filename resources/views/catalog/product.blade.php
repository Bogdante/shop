@extends('layouts.app')

@section('title', 'Cool shop | Детали товара')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="bg-light rounded p-4 text-center">
                    <img src="{{ asset($product->picture_path) }}"
                         class="img-fluid"
                         alt="{{ $product->name }}"
                         id="main-product-image">
                </div>
            </div>

            <div class="col-lg-6">
                <h1 class="mb-3">{{ $product->name }}</h1>

                <div class="mb-4">
                    <h2 class="text-primary">{{ $product->price }} ₽</h2>
                </div>

                <button class="btn btn-primary btn-lg w-50 add-to-cart"
                        data-product-id="{{ $product->id }}"
                        data-product-name="{{ $product->name }}"
                        data-product-price="{{ $product->price }}"
                        data-product-image="{{ asset($product->picture_path) }}">
                    <i class="fas fa-shopping-cart me-2"></i> В корзину
                </button>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.cart-modal')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            console.log('clicked')
            $(document).ready(function() {
                $('.add-to-cart').click(function(event) {
                    console.log('clicked')
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

            });
        });
    </script>
@endsection

