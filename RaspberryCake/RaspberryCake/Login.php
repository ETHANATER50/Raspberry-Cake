<?php
require "MyHeader.php";
?>

<br />
<br />
<h2>Enter Username and Password</h2>
<div class="container form-signin">

    <?php
    $msg = '';

    if (isset($_POST['login']) && !empty($_POST['username'])
       && !empty($_POST['password'])) {

        if ($_POST['username'] == 'admin' &&
           $_POST['password'] == 'admin') {
            session_start();
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();

            header("Refresh: 0; url=index.php");
        }else {
            $msg = 'Wrong username or password';
        }
    }
    ?>
</div><!-- /container -->

<div class="container">

    <form class="form-signin" role="form"
        action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <h4 class="form-signin-heading">
            <?php echo $msg; ?>
        </h4>
        <input type="text" class="form-control"
            name="username" placeholder="username"
            required autofocus /><br />
        <input type="password" class="form-control"
            name="password" placeholder="password" required />
        <button class="btn btn-lg btn-primary btn-block" type="submit"
            name="login">
            Login
        </button>
    </form>
</div>

<?php
require "MyFooter.php";
?>