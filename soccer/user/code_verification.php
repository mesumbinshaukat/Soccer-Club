<?php
session_start();
include('../connection.php');

if (isset($_SESSION['code']) && !empty($_SESSION['code'])) {

    if (isset($_POST['submit'])) {
        $code_input = $_POST['code_input'];
        $code = $_SESSION['code'];

        if ($code_input == $code) {
            session_unset($code);
            header('location:login.php');
            exit();
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <?php include('../bootstrap/bootstrap-cdn.html'); ?>
</head>

<body>
    <section>
        <?php include('navbar.html'); ?>

    </section>


    <section>
        <form method="POST">
            <div class="container-sm text-center">
                <div class="mb-2 mt-5">
                    <input type="number" name="code_input" placeholder="Code...">

                </div>
                <div class="mb-5">
                    <input type="submit" name="submit" value="Verify" class="btn btn-outline-dark">
                </div>
            </div>
        </form>
    </section>

    <section>
        <?php include('footer.php'); ?>
    </section>
</body>

</html>

<?php } ?>