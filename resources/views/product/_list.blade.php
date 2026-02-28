<div class="products mb-3">
    <div class="row justify-content-center">
        @foreach ($getProduct as $value)
            @php
                $getProductImage = $value->getImageSingle($value->id);
            @endphp

            <div class="col-12 @if (!empty($is_home)) col-md-3 col-lg-3 @else col-md-4 col-lg-4 @endif">
                <div class="product product-7 text-center">
                    <figure class="product-media">
                        <a href="{{ url(str($value->slug)) }}">
                            @if (!empty($getProductImage) && !empty($getProductImage->getLogo()))
                                <img style="height: 280px; width: 100%; object-fit: cover;"
                                    src="{{ $getProductImage->getLogo() }}" alt="{{ str($value->title) }}"
                                    class="product-image">
                            @endif
                        </a>

                        <div class="product-action-vertical">
                            @if (!empty(Auth::check()))
                                <a href="javascript:;" data-toggle="modal"
                                    class="add-to-wishlist add_to_wishlist{{ $value->id }} btn-product-icon btn-wishlist btn-expandable {{ !empty($value->checkWishlist($value->id)) ? 'btn-wishlist-add' : '' }}"
                                    id="{{ $value->id }}" title="Wishlist"><span>Додати до списку бажань</span></a>
                            @else
                                <a href="#signin-modal" data-toggle="modal"
                                    class="btn-product-icon btn-wishlist btn-expandable" title="Wishlist"><span>Додати
                                        до
                                        списку бажань</span></a>
                            @endif
                        </div>
                    </figure>
                    <div class="product-body">
                        <div class="product-cat">
                            <a
                                href="{{ url($value->category_slug . '/' . $value->sub_category_slug) }}">{{ $value->sub_category_name }}</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="{{ url(str($value->slug)) }}">{{ str($value->title) }}</a>
                        </h3>
                        <div class="product-price">
                            {{ number_format($value->price, 2) }} грн
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: {{ $value->getReviewRating($value->id) }}%;">
                                </div>
                                <!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text"> Відгуки ( {{ $value->getTotalReview() }} )</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
