<?php require_once "inc/functions.php";

$info = '';
$task = $_GET['task'] ?? 'report';
$error = $_GET['error'] ?? '0';

//seeds students data
if ('seeds' == $task) {
  seed();
  $info = "Seeding is completed";
}
//Add and update student
$name = '';
$roll = '';
if (isset($_POST['name'])) {
  $name = $_POST['name'];
  $roll = $_POST['roll'];
  //update student
  if (isset($_POST['id'])) {
    if ($name != '' && $roll != '') {
      $valid = updateStudent($_POST['id'], $name, $roll);
      if ($valid) {
        header('Location: index.php?task=report');
      } else {
        $error = '1';
      }
    }
  } else { //add new student
    if ($name != '' && $roll != '') {
      $valid = addStudent($name, $roll);
      if ($valid) {
        header('Location: index.php?task=report');
      } else {
        $error = '1';
      }
    }
  }
}
//Delete student
if ('delete' == $task) {
  $id = $_GET['id'];
  if ($id > 0) {
    deleteStudent($id);
    header('Location: index.php?task=report');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crud project - Filesystem</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
</head>
<style>
  body {
    margin-top: 30px;
  }

  a {
    margin-right: 10px;
  }
</style>

<body>
  <div class="container">
    <!-- Hero area -->
    <div class="row">
      <div class="column column-50 column-offset-25">
        <h2>Students Crud Project</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus tenetur natus qui molestias temp</p>
      </div>
    </div>
    <div class="row">
      <div class="column column-50 column-offset-25">
        <?php
        //include navigation
        include_once "inc/nav.php";
        //Seed information showing
        if ($info != '') {
          echo "<p>$info</p>";
        } ?>
      </div>
    </div>
    <!-- Error showing -->
    <div class="row">
      <div class="column column-50 column-offset-25">
        <?php if ('1' == $error) {
          echo "<blockquote>Duplicate roll number</blockquote>";
        }
        ?>
      </div>
    </div>
    <!-- Get all Students -->
    <div class="row">
      <div class="column column-50 column-offset-25">
        <?php if ('report' == $task) {
          echo allStudents();
        } ?>
      </div>
    </div>
    <!-- Add new student -->
    <div class="row">
      <div class="column column-50 column-offset-25">
        <?php if ('add' == $task) { ?>
          <form action="index.php?task=add" method="POST">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="student name..." value="<?php echo $name; ?>">
            <label for="roll">Roll</label>
            <input type="number" name="roll" id="roll" placeholder="student roll..." value="<?php echo $roll; ?>">
            <input type="submit" value="Add Student" />
          </form>
        <?php } ?>
      </div>
    </div>
    <!-- Edit student -->
    <div class="row">
      <div class="column column-50 column-offset-25">
        <?php if ('edit' == $task) {
          $id = $_GET['id'];
          $student = getStudent($id);
        ?>
          <form method="POST">
            <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="student name..." value="<?php echo $student['name']; ?>">
            <label for="roll">Roll</label>
            <input type="number" name="roll" id="roll" placeholder="student roll..." value="<?php echo $student['roll']; ?>">
            <input type="submit" value="Update" />
          </form>
        <?php } ?>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", () => {
      let links = document.querySelectorAll('.delete');
      for (let i = 0; i < links.length; i++) {
        links[i].addEventListener('click', (e) => {
          if (!confirm("Are sure want to delete?")) {
            e.preventDefault();
          }
        })

      }
    })
  </script>
</body>

</html>