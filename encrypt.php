<?php
include "./funnctions.php";
include "./template_part/header.php";

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $message = strtolower( $_POST['message'] );
    $result = encryptDecrypt( $message, $original, $key );
    echo <<<EOD
        <a href="./" class="backBtn">&#8592; Back to Home</a>
        <p>Your message has been successfully encrypted</p>
        <textarea id="copyMessage" rows="7" placeholder="Enter your text/message here to encrypt or decrypt..." required>$result</textarea>
        <input type="button" onclick="copyToClipboard('copyMessage')" value="Copy To Clipboard">
    EOD;
}
include "./template_part/footer.php";