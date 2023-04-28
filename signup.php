<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <!-- denmar -->
     <form action="signup-check.php" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>First Name</label>
          <?php if (isset($_GET['fname'])) { ?>
               <input type="text" 
                      name="fname" 
                      placeholder="First Name"
                      value="<?php echo $_GET['fname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="fname" 
                      placeholder="First Name"><br>
          <?php }?>
          <label>Last Name</label>
          <?php if (isset($_GET['lname'])) { ?>
               <input type="text" 
                      name="lname" 
                      placeholder="First Name"
                      value="<?php echo $_GET['lname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="lname" 
                      placeholder="First Name"><br>
          <?php }?>
          <label>Contact</label>
          <?php if (isset($_GET['contact'])) { ?>
               <input type="text" 
                      name="contact" 
                      placeholder="Contact"
                      value="<?php echo $_GET['contact']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="contact" 
                      placeholder="Contact"><br>
          <?php }?>

          <label>Email</label>
          <?php if (isset($_GET['email'])) { ?>
               <input type="text" 
                      name="email" 
                      placeholder="Email"
                      value="<?php echo $_GET['email']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="email" 
                      placeholder="Email"><br>
          <?php }?>


     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>Re Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>

     	<button type="submit">Sign Up</button>
          <a href="index.php" class="ca">Already have an account?</a>
     </form>
</body>
</html>