<?php include "./template_part/header.php";
echo <<<EOD
        <p>TextGuard is a project that helps users protect their text messages by converting them into secret keys
                    that can
                    be used to encrypt and decrypt messages.</p>
        <form action="encrypt.php" method="post">
            <textarea name="message" id="message" rows="7" placeholder="Enter your text/message here to encrypt or decrypt..."
                required></textarea>
            <div>
                <input type="submit" value="Encrypt">
                <input type="submit" value="Decrypt" formaction="decrypt.php">
            </div>

        </form>
    EOD;
include "./template_part/footer.php";
