<?php
require_once "../includes/headear.php"  ;
require_once __DIR__ . '/../vendor/autoload.php';
require_once "../traits/General.php";

$aouthntecation = new \Kirolos\GalleryApp\Auth\Auth();
// Redirect logged-in users to the index page
if(isset($_SESSION['username'])) {
    $aouthntecation->redirect_to_index();
    exit(); // Make sure to exit after header redirection
}
if(isset($_POST['submit'])) {

$aouthntecation->login($_POST['email'],$_POST['password']);
}
?>

<main class="form-signin w-50 m-auto">
    <form method="POST" action="login.php">
        <h1 class="h3 mt-5 fw-normal text-center">Please login</h1>

        <div class="form-floating">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        
        <div class="form-floating">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <h6 class="mt-3">Don't have an account? <a href="register.php">Create your account</a></h6>
    </form>
</main>
<?php
require_once "../includes/fotter.php"  ;