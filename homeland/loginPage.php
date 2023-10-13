<?php
include 'headerLoginPage.php';
?>
<div class="content-container">
    <div class="card logreg-form">
        <h1 class="card-title">Login</h1>
        <div class="card-text">
            <form action="php/login.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" required />
                        <button class="btn btn-outline-secondary" type="button" id="eyepass"><i class="bi bi-eye-slash"></i></button>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-secondary" name="login">LOGIN</button>
                </div>
                <div class="logreg-link">
                    <p>Don't have an account yet? <a href="registerPage.php">Register Here</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include 'footerLite.php';
?>