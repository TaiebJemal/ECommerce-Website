<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

  <header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a href="home.php" class="logo">
        <img src="./images/mytek.png" width="160" height="50" alt="logo">
      </a>

      <button class="nav-open-btn" data-nav-open-btn aria-label="Open Menu">
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>

        <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
          <ion-icon name="close-outline"></ion-icon>
        </button>

        <a href="home.php" class="logo">
          <img src="./images/mytek.png" width="160" height="50" alt="logo"/>
        </a>

        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="home.php" class="navbar-link">Home</a>
          </li>

          <li class="navbar-item">
            <a href="about.php" class="navbar-link">About</a>
          </li>

          <li class="navbar-item">
            <a href="products.php" class="navbar-link">Products</a>
          </li>

          <li class="navbar-item">
            <a href="contact.php" class="navbar-link">Contact</a>
          </li>

        </ul>

      <div class="profile">
        <?php          
          $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
          $select_profile->execute([$user_id]);
          if($select_profile->rowCount() > 0){
          $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
        ?>
         <ul class="nav-action-list">
           <li>
             <a href="search_page.php" class="nav-action-btn">
               <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
               <span class="navbar-item">Search</span>
             </a>
           </li>
           <li>
             <a href="update_user.php" class="nav-action-btn">
               <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
               <span class="navbar-item">Profile of <?= $fetch_profile["name"]; ?></span>
             </a>
           </li>
           <li>
             <a href="components/user_logout.php" class="nav-action-btn">
               <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
               <span class="navbar-item">Logout</span>
             </a>
           </li>
         </ul>
         <?php
            }else{
         ?>
         <ul class="nav-action-list">
           <li>
             <a href="search_page.php" class="nav-action-btn">
               <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
               <span class="navbar-item">Search</span>
             </a>
           </li>
           <li>
             <a href="user_login.php" class="nav-action-btn">
               <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
               <span class="navbar-item">Login</span>
             </a>
           </li>
           <li>
             <a href="user_register.php" class="nav-action-btn">
               <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
               <span class="navbar-item">Sign up</span>
             </a>
           </li>
         </ul>
         <?php
            }
         ?>      
         
         
      </div>
      </nav>

    </div>
  </header>