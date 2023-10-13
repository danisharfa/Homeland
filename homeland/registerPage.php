<?php
include 'headerRegisterPage.php';
?>
<div class="content-container">
    <div class="card logreg-form">
        <h1 class="card-title">Register</h1>
        <div class="card-text">
            <form action="php/register.php" method="post">
                <div class="mb-3">
                    <label for="fullname" class="form-label">Fullname</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" required />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required />
                </div>
                <div class="mb-3">
                    <label for="phonenumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phonenumber" id="phonenumber" required />
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="address" required />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" required />
                        <button class="btn btn-outline-secondary" type="button" id="eyepass"><i class="bi bi-eye-slash"></i></button>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-secondary" name="register">Create Account</button>
                </div>
                <div class="logreg-link">
                    <p>Already have an account? <a href="loginPage.php">Login Here</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include 'footerLite.php';
?>