<?php require_once 'controllers/authController.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-div {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-top: 50px;
        }
        .form-div h3 {
            margin-bottom: 20px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control-lg {
            border-radius: 5px;
        }
        .btn-block {
            border-radius: 5px;
        }
        .text-center {
            text-align: center;
        }
        @media only screen and (max-width: 600px) {
            .form-div {
                margin-top: 20px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">
                <form action="signup.php" method="post">
                    <h3 class="text-center">Register</h3>
                    <?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                                <li><?php echo $error;?> </li>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo $email; ?>"  class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="passwordConf">Confirm Password</label>
                        <input type="password" name="passwordConf" class="form-control form-control-lg">
                    </div>
                    <!-- Informed Consent -->
                    <div class="form-group">
                        <label for="consent">I agree to the terms and conditions:</label>
                        <input type="checkbox" id="consent" name="consent" required>
                        <label for="consent">I agree</label>
                        <?php if (isset($errors['consent'])): ?>
                            <div class="text-danger"><?php echo $errors['consent']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="signup-btn" class="btn btn-primary btn-block btn-lg">Sign Up</button>
                    </div>
                    <p class="text-center">Already registered? <a href="login.php">Sign In</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
