<?php include_once "./functions.php";
$mode = 'encode';
if ( isset( $_GET['task'] ) && $_GET['task'] != '' ) {
    $mode = $_GET['task'];
}
$key = "wtx#f5vW&g@0l%ID~6dnON3MKZFJ*j8AuzEUsCkQYybLcR?GS4hq1am7eTHXrPi^!V2o9pB";

if ( 'key' == $mode ) {
    $key = str_shuffle( $key );
} elseif ( isset( $_POST['key'] ) && $_POST['key'] != '' ) {
    $key = $_POST['key'];
}
$scremblerData = '';
if ( 'encode' == $mode ) {
    $data = $_POST['data'] ?? '';
    if ( $data != '' ) {
        $scremblerData = encodeData( $key, $data );
    }
}
if ( 'decode' == $mode ) {
    $data = $_POST['data'] ?? '';
    if ( $data != '' ) {
        $scremblerData = decodeData( $key, $data );
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <title>Data Scrambler</title>
</head>

<body>
    <div class="container" style="margin-top: 2rem">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h4>Data Scrambler</h4>
                <p>Use this application to scrambler your data </p>
                <a href="./index.php?task=encode">Encode</a> |
                <a href="./index.php?task=decode">Decode</a> |
                <a href="./index.php?task=key">Generate Key</a>
                <form method="POST" action="index.php<?php if ( 'decode' == $mode ) {echo "?task=decode";}?>">
                    <label for="key">Your key</label>
                    <input type="text" name="key" id="key" <?php displayKey( $key );?> style="font-size: 1.2rem;" >
                    <label for="data">Data</label>
                    <textarea height: 100px name="data" id="data"><?php if ( isset( $_POST['data'] ) ) {echo $_POST['data'];}?></textarea>
                    <label for="result">Result</label>
                    <textarea height: 100px name="result" id="result"><?php echo $scremblerData; ?></textarea>
                    <input type="submit" value="Do for me">
                </form>
            </div>
        </div>
    </div>
</body>

</html>