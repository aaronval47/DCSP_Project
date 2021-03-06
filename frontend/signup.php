<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
  <?php
  ##################
  # DATABASE COMMENTS
  # This page is set up to confirm and validate the entry for a new user
  # Still havent fleshed out the actual Database calls
  # Needs to do the following:
  #   - check if given username already exists in database
  #   - add new user to database
  #################
  # OTHER: need to add entry sanitation and password encryption
  ####################
  session_start();

  if ($_SESSION['type'] == 'user' || $_SESSION['type'] == 'admin') {
    header('Location: index.php');
    exit();
  }


  $connection = new mysqli($hn, $un, $pw, $db);
  if ($connection->connect_error)
    die($connection->connect_error);

  # Input variables
  $firstName = "";
  $lastName = "";
  $username = "";
  $password1 = "";
  $password2 = "";

  # Error message variables
  $fnErr = "";
  $lnErr = "";
  $unErr = "";
  $pw1Err = "";
  $pw2Err = "";
  $errFlg = False;

  if (!empty($_POST)) {
    if (!empty($_POST['firstName'])) {
      $firstName = $_POST['firstName'];
    } else {
      $fnErr = "You must enter your first name.";
      $errFlg = True;
    }
    if (!empty($_POST['lastName'])) {
      $lastName = $_POST['lastName'];
    } else {
      $lnErr = "You must enter your last name.";
      $errFlg = True;
    }
    if (!empty($_POST['userame'])) {
      $username = $_POST['username'];
      $check = False;
      #########################
      # CHECK IF USERNAME ALREADY EXISTS IN DATABASE
      ########################
      if ($check) {
        $unErr = "Username already exists. Please try another one.";
        $errFlg = True;
      }
    } else {
      $unErr = "You must enter a username.";
      $errFlg = True;
    }
    if (!empty($_POST['password1'])) {
      $password1 = $_POST['password1'];
      # NEEDS WORK: PASSWORD VERIFICATION
      if (!preg_match('/^[a-zA-Z0-9]{6,}$/', $password1)) {
        $pw1Err = "Not a valid password: must be 8 characters {a-z, A-Z, 0-9}.";
        $errFlg = True;
      }
      if (!empty($_POST['password2'])) {
        $password2 = $_POST['password2'];
        if ($password1 != $password2) {
          $pw2Error = "Your password entries do not match.";
          $errFlg = True;
        }
      } else {
        $pw2Err = "You must confirm your password";
        $errFlg = True;
      }
    } else {
      $pw1Err = "You must enter a password.";
      $errFlg = True;
    }
  }

  if (!$errFlg) {
    $encryptedPw = 'yada-yada';
    #######################################
    # ADD USER TO DATABASE HERE
    # make sure to initialize an empty cart
    #######################################
    $_SESSION['username'] = $username;
    $_SESSION['type'] = "user";
    header('Location: index.php');
    exit();
  }
  ?>
</body>
</html>
