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

<header class="header">

   <section class="flex">

      <nav class="navbar">
        <a href="../admin/index.php">Administration of <span>Mytek</span></a>
      </nav>
      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
      </div>
         <ul class="nav-action-list">
           <li>
             <a href="#" class="nav-action-btn">
               <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
               <span class="navbar-item">Connected as an admin(<?= $fetch_profile['name']; ?>)</span>
             </a>
           </li>
           <li>
             <a href="../admin/update_profile.php" class="nav-action-btn">
               <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
               <span class="navbar-item">Edit Profile</span>
             </a>
           </li>
           <li>
             <a href="../components/admin_logout.php" class="nav-action-btn">
               <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
               <span class="navbar-item">Logout</span>
             </a>
           </li>
         </ul>
   </section>

</header>