<?php
define("DB_NAME", 'db/db.txt');
//Seed default students
function seed()
{
    $data = [
        [
            'id'   => 1,
            'name' => "Tufik",
            'roll' => 5,
        ],
        [
            'id'   => 2,
            'name' => "Shehab",
            'roll' => 6,
        ],
        [
            'id'   => 3,
            'name' => "Tarif",
            'roll' => 7,
        ],
    ];
    $serialized = serialize($data);
    file_put_contents(DB_NAME, $serialized, LOCK_EX);
}
//Get all students
function allStudents()
{
    $data = file_get_contents(DB_NAME);
    $students = unserialize($data);
?>
    <table>
        <tr>
            <th>Name</th>
            <th>Roll</th>
            <?php if (hasPrivilege()) {
                echo "<th>Action</th>";
            } ?>
        </tr>
        <?php foreach ($students as $student) { ?>
            <tr>
                <td><?php printf('%s', $student['name']); ?></td>
                <td><?php printf('%s', $student['roll']); ?></td>
                <?php if (isAdmin()) : ?>
                    <td width="150px"><?php printf('<a href="index.php?task=edit&id=%s">Edit</a> | <a class="delete" href="index.php?task=delete&id=%s">Delete</a>', $student['id'], $student['id']); ?></td>
                <?php elseif (isEditor()) : ?>
                    <td width="150px"><?php printf('<a href="index.php?task=edit&id=%s">Edit</a>', $student['id']); ?></td>
                <?php endif; ?>


            </tr>

        <?php } ?>
    </table>
<?php
}
//get unique id function
function getUniqueId($students)
{
    $maxId = 0;
    if (count($students)) {
        $maxId = max(array_column($students ?? [0], 'id'));
    }
    return $maxId + 1;
}
//add Student function
function addStudent($name, $roll)
{
    $data = file_get_contents(DB_NAME);
    $students = unserialize($data);

    $found = false;
    foreach ($students as $_student) {
        if ($_student['roll'] == $roll) {
            $found = true;
            break;
        }
    }
    if (!$found) {
        $student = [
            'id'   => getUniqueId($students),
            'name' => $name,
            'roll' => $roll,
        ];
        array_push($students, $student);
        $serialized = serialize($students);
        file_put_contents(DB_NAME, $serialized, LOCK_EX);
        return true;
    }
    return false;
}
//get student by id
function getStudent($id)
{
    $data = file_get_contents(DB_NAME);
    $students = unserialize($data);
    foreach ($students as $student) {
        if ($student['id'] == $id) {
            return $student;
        }
    }
    return false;
}
//edit/update student
function updateStudent($id, $name, $roll)
{
    $data = file_get_contents(DB_NAME);
    $students = unserialize($data);
    $found = false;
    foreach ($students as $_student) {
        if ($_student['roll'] == $roll && $_student['id'] != $id) {
            $found = true;
            break;
        }
    }
    if (!$found) {
        $students[$id - 1]['name'] = $name;
        $students[$id - 1]['roll'] = $roll;
        $serialized = serialize($students);
        file_put_contents(DB_NAME, $serialized, LOCK_EX);
        return true;
    }
    return false;
}
//delete student
function deleteStudent($id)
{
    $data = file_get_contents(DB_NAME);
    $students = unserialize($data);

    foreach ($students as $key => $student) {
        if ($student['id'] == $id) {
            unset($students[$key]);
        }
    }
    $serialized = serialize($students);
    file_put_contents(DB_NAME, $serialized, LOCK_EX);
}
//is role admin check function
function isAdmin()
{
    if (isset($_SESSION['role'])) {
        return ('admin' == $_SESSION['role']);
    }
}
//is role editor check function
function isEditor()
{
    if (isset($_SESSION['role'])) {
        return ('editor' == $_SESSION['role']);
    }
}
//is role admin or editor check function
function hasPrivilege()
{
    if (isset($_SESSION['role'])) {
        return ('admin' == $_SESSION['role'] || 'editor' == $_SESSION['role']);
    }
}
