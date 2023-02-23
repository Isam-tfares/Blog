<?php $title = 'login';
?>
<?php ob_start(); ?>
<div class="container w-50 my-5 py-5">
    <h1 class="py-2 text-center">Login Page</h1>
    <form action="index.php?action=login" method="POST">
       
        <div class="form-outline mb-4">
            <input type="text" id="form2Example1" class="form-control" name="username"/>
            <label class="form-label" for="form2Example1">Username</label>
        </div>

        
        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control" name="password"/>
            <label class="form-label" for="form2Example2">Password</label>
        </div>

       
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                
                <div class="form-check">
                    <input class="form-check-input" name="remember" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                </div>
            </div>

            <div class="col">

                <a href="#!">Forgot password?</a>
            </div>
        </div>


        <input type="submit" name="signin" class="btn btn-primary btn-block mb-4" value="Sign in">

        <div class="text-center">
            <p>Not a member? <a href="index.php?action=register">Register</a></p>
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>