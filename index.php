<?php include "./class.php";?>
<!doctype html>
<html lang="en">

<head>
    <title>Hex to RGB/RGBA - Color Converter</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font-awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
</head>

<body style="background: url('https://static.vecteezy.com/system/resources/previews/002/072/154/original/colorful-dynamic-background-free-vector.jpg') no-repeat center;background-size: cover;">
    <div class="container d-flex align-items-start justify-content-center mt-5" style="height: 100vh;">
        <div class="card p-3" style="width: 380px;background: rgba(0,0,0,0.3);">
            <h4 class="text-center text-light m-3">Hexa to RGB & RGBA</h4>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="was-validated">
                <div class="form-group">
                    <input maxlength="7" class="form-control text-light" type="text" name="colorCode" style="background: rgba(0,0,0,0.3);" value="#000000" required>
                    <div class="valid-feedback">&#10004;</div>
                    <div class="invalid-feedback">Please enter hexadecimal color code</div>
                </div>
                <input class="btn btn-primary btn-block" type="submit" value="Convert Hexadecimal to RGB">
            </form>
            <div>
                <h6 class="mt-3 mb-1 text-light">RGB :</h6>
                <div class="input-group">
                    <input type="text" class="form-control text-light" style="background: rgba(0,0,0,0.3)" id="rgb" value="<?php echo $rgb; ?>">
                    <div class="input-group-append">
                        <span style="cursor: pointer;" class="input-group-text" onclick="copyToClipboard('rgb')"><i class="far fa-copy"></i></span>
                    </div>
                </div>
                <h6 class="mt-3 mb-1 text-light">RGBA :</h6>
                <div class="input-group">
                    <input type="text" class="form-control text-light" style="background: rgba(0,0,0,0.3)" id="rgba"  value="<?php echo $rgba; ?>">
                    <div class="input-group-append">
                        <span style="cursor: pointer;" class="input-group-text" onclick="copyToClipboard('rgba')"><i class="far fa-copy"></i></span>
                    </div>
                </div>
                <div style="background: <?php echo $rgb; ?>; height: 50px;" class="mt-3 w-50 mx-auto"></div>
            </div>

        </div>
    </div>
    <script>
        function copyToClipboard(id) {
            // Get the text field
            let copyText = document.getElementById(id);
            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices
            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);
        }
    </script>
</body>

</html>

<?php #echo substr( "123456789", 0, 6 ); ?>