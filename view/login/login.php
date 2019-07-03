<?php require "view/header.php";?>

    <form class="form-inline" method="post" action="postLogin">
        <div class="form-group mx-sm-3 mb-2">
            <label for="inputUser" class="sr-only">User Name</label>
            <input type="text" class="form-control" id="inputUser" name="inputUser">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="inputPassword" >
        </div>
        <button type="submit" class="btn btn-primary mb-2" name="login">Login</button>
    </form>

<?php require "view/footer.php";?>