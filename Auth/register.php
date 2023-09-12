<?php 
require_once "../includes/headear.php"  ;
require_once __DIR__ . '/../vendor/autoload.php';
require_once "../traits/General.php";

$aouthntecation = new \Kirolos\GalleryApp\Auth\Auth();


if(isset($_SESSION['username'])) {
    $aouthntecation->redirect_to_index();
    exit();
}
if(isset($_POST['submit'])) {

$aouthntecation->signup($_POST['submit'],$_POST['email'],$_POST['username'],$_POST['password']);
}
?>



<main class="form-signin w-50 m-auto">
    <form method="POST" action="register.php">
        <h1 class="h3 mt-5 fw-normal text-center">Please Register</h1>

        <div class="form-floating">
        <label for="floatingInput">Email address</label>

            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        </div>

        <div class="form-floating">
        <label for="floatingUsername">Username</label>

            <input name="username" type="text" class="form-control" id="floatingUsername" placeholder="username">
        </div>

        <div class="form-floating">
        <label for="floatingPassword">Password</label>

            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
        </div>

        <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        <h6 class="mt-3">Already have an account? <a href="login.php">Login</a></h6>
    </form>
</main>



<?php 
require_once "../includes/fotter.php"  ;