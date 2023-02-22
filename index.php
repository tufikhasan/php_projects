<?php include "./function.php"; ?>
<!doctype html>
<html lang="en">

<head>
  <title>Password Generator</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="card mx-auto p-2" style='width:400px'>
        <h2 class="text-center my-3">Password Generator</h2>
        <div style="height: 30px;">
          <p class="text-center font-weight-bold">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
              $input = $_POST['password'];
              if (!empty($input)) {
                if (!is_numeric($input)) {
                  echo "<span class='text-danger'>Please enter only numbers</span>";
                } else {
                  if ($input >= 4 && $input < 26) {
                    $upper = isset($_POST['capital']) ? true : false;
                    $number = isset($_POST['number']) ? true : false;
                    $special = isset($_POST['special']) ? true : false;

                    $result = generatePassword($input, $upper, $number, $special);
                    echo "<span class='text-success'>$result</span>";
                  } else {
                    echo "<span class='text-warning'>Password length must be between 4 to 25</span>";
                  }
                }
              } else {
                echo "<span class='text-warning'>Empty value</span>";
              }
            }
            ?>
          </p>
        </div>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter a number between 4 to 25" name="password">
          </div>
          <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" name="capital" type="checkbox"> Capital Letter
            </label>
          </div>
          <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" name="number" type="checkbox"> Numbers
            </label>
          </div>
          <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" name="special" type="checkbox"> Special character
            </label>
          </div>
          <button type="submit" class="btn btn-secondary">Generate password</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>