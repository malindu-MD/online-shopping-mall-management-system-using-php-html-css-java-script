<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin login</title>
   <link rel="stylesheet" href="../css/admin_styles.css">

</head>
<body>


<section class="form-container">

   <form action="admin_login.php" method="post">
      <h3>login now</h3>
      
      <input type="text" name="email" required placeholder="enter your email" maxlength="20"  class="box">
      <input type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" >
      <input type="submit" value="login now" class="btn" name="submit">
   </form>

</section>
   
</body>
</html>