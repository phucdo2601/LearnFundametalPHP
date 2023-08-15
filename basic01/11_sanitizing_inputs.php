<?php
/* --- Sanitizing Inputs -- */

/*
  Data submitted through a form is not sanitized by default. We have methods to sanitize data manually.
*/

if (isset($_POST['submit'])) {
    // $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    // $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);

    // $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
    // $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);

    

    echo $name;
} ?>

<!-- Pass data through a form -->
<!-- php_self can be used for xss -->
<form action="<?php echo htmlspecialchars(
                    $_SERVER['PHP_SELF']
                ); ?>" method="POST">
    <div>
        <label>Name: </label>
        <input type="text" name="name">
    </div>
    <br>
    <?php echo $email; ?>
    <div>
        <label>Email: </label>
        <input type="text" name="email">
    </div>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>