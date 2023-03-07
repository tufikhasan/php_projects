<?php require_once('./template/header.php'); ?>
<!-- Properties display -->
<div class='properties'>
  <?php
  if (count($_SESSION['properties']) != 0) {
    foreach ($properties as $key => $property) {
      echo <<<EOD
            <div class='property'>
            <div class='option'>
             <a href=?propertyId={$key}><img src='./img/del.png' ></a>
            </div>
            <img style='height:200px; border-radius:15px 15px 0 0' src='{$property['image']}' alt='{$property['title']}' class='property-img'>
            <div style='padding: 0 1rem;'>
              <div class='feature'>
                <img src='./img/loc.png'>
                <span>{$property['location']}</span>
              </div>
              <h2>{$property['title']}</h2>
              <p>{$property['description']}</p>
              <div class='pro-features'>
                <div class='feature'>
                  <img src='./img/bed.png'>
                  <span>{$property['bedroom']} Bedrooms</span>
                </div>
                <div class='feature'>
                  <img src='./img/bathroom.png'>
                  <span>{$property['bathroom']} Bathrooms</span>
                </div>
                <div class='feature'>
                  <img src='./img/square.png'>
                  <span>{$property['square']} sq ft.</span>
                </div>
                <div class='feature'>
                  <img src='./img/car.png'>
                  <span>{$property['garage']} Garages</span>
                </div>
              </div>
            </div>
            <hr>
            <div class='pro-footer'>
              <p class='price'>\${$property['price']}</p>
              <a href=?addToCartId={$key} class='button'>Add to cart</a>
            </div>
          </div>
          EOD;
    }
  } else {
    echo "<h1 class='not-found'>No property found</h1>";
  }
  ?>
</div>
</div>
<?php require_once('./template/footer.php'); ?>