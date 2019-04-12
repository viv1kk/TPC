<?php
  require "../Header/header-signup.php"
?>

  <main>

<!-- Signup-->
    <div class="container-fluid row justify-content-center" style="margin:0 auto;">
      <div class="col-md-3 order-md-1">

        <div class="jumbotron">
          <form class="form-signup" action="../../includes/signup.inc.php" method="post">
            <h2 class="h4 mt-3 mb-4 font-weight-normal text-muted">Please Sign-up</h2>

            <label for="inputUsername" class="sr-only">Username</label>
            <input type="username" name="inputUsername" class="form-control mb-3" placeholder="Username" required autofocus>

            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" name="inputEmail" class="form-control mb-3" placeholder="you@example.com" required>

            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

            <label for="repeatPassword" class="sr-only">Password</label>
            <input type="password" name="repeatPassword" class="form-control mb-3" placeholder="Repeat Password" required>
            </div>
            <button class="btn btn-lg btn-primary btn-block" name="signup-submit" type="submit">Sign Up</button>

          </form>
        </div>
      </div>
    </div>

  </main>


<?php
  require "../Footer/footer.php"
?>
