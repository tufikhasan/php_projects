<?php
function displayProducts( $products ) {
    foreach ( $products as $product ) {
        echo <<<EOD
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <!-- Product image-->
                <img class="card-img-top" src="{$product['image']}" alt="{$product['name']}" />
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder">{$product['name']}</h5>
                        <!-- Product price-->
                        $ {$product['price']}
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                </div>
            </div>
        </div>
        EOD;
    }
}
