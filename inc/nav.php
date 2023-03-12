<a href="index.php?task=report">All Students</a>
<?php if (hasPrivilege()) {
    echo "<a href='index.php?task=add'>Add new</a>";
}
if (isAdmin()) {
    echo "<a href='index.php?task=seeds'>Seed</a>";
}
//login/logout button show
if (!isset($_SESSION['login'])) {
    echo "<a style='float: right;' href='index.php?task=login'>Login</a>";
} else {
    echo "<a style='float: right;' href='index.php?logout=true'>Logout({$_SESSION['role']})</a>";
}
?>