<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Товар добавлен в корзину!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex align-items-center">
                    <div class="mr-4">
                        <img id="modal-product-image" src=""
                             class="img-fluid rounded"
                             style="max-height: 100px;"
                             alt="Изображение товара">
                    </div>
                    <div>
                        <h5 id="modal-product-name" class="mb-1"></h5>
                        <p id="modal-product-price" class="h5 text-success mb-2"></p>
                        <p class="mb-0">Товар успешно добавлен в вашу корзину</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Продолжить покупки</button>
                <a href="{{ route('home') }}" class="btn btn-primary">
                    <i class="fas fa-shopping-cart mr-1"></i> Перейти в корзину
                </a>
            </div>
        </div>
    </div>
</div>
