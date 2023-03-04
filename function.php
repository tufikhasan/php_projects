<?php
class Products {
    function displayProduct( array $products ) {
        foreach ( $products as $product ) {
            echo <<<EOD
            <div class="col-md-3 mb-3">
                <div class="bg-light rounded shadow pb-3">
                   <img style="height:200px" class="img-fluid rounded" src="{$product['image']}" alt="{$product['name']}">
                    <p class="text-black-50 m-0 text-center"><span>{$product['category']}</span></p>
                    <h6 class="text-dark display-6 mb-0 text-center">{$product['name']}</h6>
                    <p class="m-0 text-center">\${$product['price']}</p>
                    <button class="btn-sm btn-outline-primary mt-2 d-block mx-auto rounded-circle">Buy</button>
                </div>
            </div>
        EOD;
        }
    }
    function filterProduct( string $cat, array $products ) {
        $filterProducts = array_filter( $products, fn( $element ) => $cat == $element['category'] );
        if ( count( $filterProducts ) == 0 ) {
            echo "<h4 class='text-danger text-center w-100'>Sorry can't find any matches for your search term: ({$cat})</h4>";
        } else {
            $this->displayProduct( $filterProducts );
        }
    }
}
