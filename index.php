
<?php
  require "PHP/Header/header-index.php"
?>

  <main>

<!-- LOGIN -->

    <div class="container-fluid row justify-content-center">
      <div class="col-md-3 order-md-1">

        <div class="jumbotron">
          <form class="form-signin" action="includes/signin.inc.php" method="post">
              <h2 class="h5 mt-5 mb-3 font-weight-normal text-muted">Please Sign-in</h2>

            <label for="uidormail" class="sr-only">Username or E-mail</label>
            <input type="username"name="uidormail" class="form-control mb-3" placeholder="username or email" required autofocus>

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password"name="inputPassword" class="form-control mb-3" placeholder="password" required>
            <!-- <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div> -->
            <button class="btn btn-lg btn-primary btn-block" name="signin-submit" type="submit">Sign in</button>

          </form>
        </div>
      </div>
    </div>
  </main>


<?php
  require "PHP/Footer/footer.php"
?>
