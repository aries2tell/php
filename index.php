<?php 
require_once 'controllers/authController.php';

if(!isset($_SESSION['id'])){
    header('location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="style.css">
    
    <title>Login</title>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div login">
                <?php if(isset($_SESSION['message'])):?>
                    <div class="alert  <?php echo $_SESSION['alert-class']; ?>">
                        <?php 
                            echo $_SESSION['message']; 
                            unset($_SESSION['message']);
                            unset($_SESSION['alert-class']);
                        ?>
                    </div>
                <?php endif; ?>   
                <h3>Welcome, <?php echo $_SESSION['username']; ?></h3>

                <?php if(!$_SESSION['verified'] && !isset($_POST['consent'])):  ?>
                    <div class="alert alert-warning">
                        Welcome to Reservation Website. Please read and confirm the following statement before proceeding:
                        <form action="choices.php" method="post">
                            <div class="form-group">
                                <label for="consent">Do you consent to proceed to the Collab Room / Study Room?</label><br>
                                <input type="radio" id="yes" name="consent" value="yes" required>
                                <label for="yes">Yes</label><br>
                                <input type="radio" id="no" name="consent" value="no">
                                <label for="no">No</label><br>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit_consent" class="btn btn-primary btn-block btn-lg">Submit</button>
                            </div>
                        </form>
                    </div>
                <?php elseif($_SESSION['verified']): ?>
                    <div class="alert alert-success">
                        You are already verified!
                    </div>
                <?php elseif(isset($_POST['consent']) && $_POST['consent'] == 'no'): ?>
                    <div class="alert alert-info">
                        Thank you for your response. You chose not to proceed.
                    </div>
                <?php elseif(isset($_POST['consent']) && $_POST['consent'] == 'yes'): ?>
                    <div class="alert alert-info">
                        Thank you for your response. Redirecting you to the Collab Room / Study Room.
                    </div>
                    <?php
                    // Redirect user to appropriate page after consent
                    // header("Location: rooms.php");
                    // exit();
                    ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</body>
</html>
