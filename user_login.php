<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
   }else{
      $message[] = 'Unauthorized! please check email and password';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/style2.css">
   
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<div class="container form-container">
   <form action="" method="post">
      <div class="mb-3">
         <label for="exampleInputEmail1">Email address</label>
         <input type="email" name="email" required placeholder="Email address" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      </div>

      <div class="mb-3">
         <label for="exampleInputPassword1">Password</label>
         <input type="password" name="pass" id="exampleInputPassword1" required placeholder="Password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Login</button>
   </form>
</div>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>