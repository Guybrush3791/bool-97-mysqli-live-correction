<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB - MYSQLI - TEACHERS</title>
    <?php

        require_once("./DB/dbManager.php");

        $mail = $_POST['mail'];
        $teachers = getTeachersByMail($mail);
        // var_dump($teachers);

        // $username = $_POST['username'];
        // $users = getUsersByUsername($username);
    ?>
</head>
<body>
    <h1>Student search engine</h1>
    <form method="post">
        <label for="mail">Mail</label>
        <input type="text" name="mail" value="<?php echo $mail ?>">
        <input type="submit" value="SEARCH">
    </form>

    <?php if (count($teachers) < 1) { ?>
        <div>
            NO TEACHER FOUND :-(
        </div>
    <?php } else { ?>
        <?php foreach($teachers as $teacher) { ?>
            <div>
                <h1>
                    <?php echo $teacher['name'] . ' ' . $teacher['surname']; ?>
                </h1>
            </div>
        <?php } ?>
    <?php } ?>
</body>
</html>