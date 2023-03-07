<?php require_once('./template/header.php'); ?>

<h1 style="margin: 2rem 0 2rem;text-align:center;">All Cart properties</h1>
<div style="overflow-x: auto;">
    <table class="cart-table">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>action</th>
        </tr>
        <?php
        if (count($_SESSION['cart']) != 0) {
            foreach ($allCart as $key) {
                echo <<<EOD
            <tr>
                <td width="150px"><img src="{$properties[$key]['image']}" alt="{$properties[$key]['title']}"></td>
                <td><h4>{$properties[$key]['title']}</h4></td>
                <td><p><b>$</b>{$properties[$key]['price']}</p></td>
                <td width="60px"><a class="button" href="?removeCart={$key}">x</a></td>
            </tr>
            
        EOD;
            }
            function totalPrice($array)
            {
                $sum = 0;
                foreach ($array as $key) {
                    $sum += $_SESSION['properties'][$key]['price'];
                }
                return $sum;
            }
            $sum = totalPrice($allCart);
            echo <<<EOD
                    <tr>
                    <td></td>
                        <td style="text-align:right;">Total =</td>
                        <td><p><b>$</b>{$sum}</p></td>
                        <td></td>
                    </tr>
                EOD;
        } else {
            echo "<tr><td colspan=4>No property add to cart</td></tr>";
        }
        ?>
    </table>
</div>
<?php require_once('./template/footer.php'); ?>