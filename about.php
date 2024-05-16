<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

$select_reviews = $conn->prepare("SELECT reviews.*, users.name AS user_name, users.image AS user_image 
                                  FROM `reviews` 
                                  INNER JOIN `users` ON reviews.user_id = users.id");
$select_reviews->execute();
$reviews = $select_reviews->fetchAll(PDO::FETCH_ASSOC);


$select_reviews = $conn->prepare("SELECT reviews.*, users.name, users.image FROM reviews INNER JOIN users ON reviews.user_id = users.id ORDER BY reviews.date DESC LIMIT 5");
$select_reviews->execute();
$reviews = $select_reviews->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- about section starts  -->

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque nobis distinctio, nisi consequatur ad sequi, rem odit fugiat assumenda eligendi iure aut sunt ratione, tempore porro expedita quisquam.</p>
         <a href="app.php" class="inline-btn">Our Apps</a>
      </div>

   </div>

   <div class="box-container">

      <div class="box">
         <i class="fas fa-graduation-cap"></i>
         <div>
            <h3>+1k</h3>
            <span>usefull links</span>
         </div>
      </div>

      <div class="box">
         <i class="fa-brands fa-app-store-ios"></i>
         <div>
            <h3>+1k</h3>
            <span>Free Apps</span>
         </div>
      </div>

      <div class="box">
         <i class="fa-solid fa-video"></i>
         <div>
            <h3>+1k</h3>
            <span>Free Videos</span>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-chalkboard-user"></i>
         <div>
            <h3>+5k</h3>
            <span>expert teachers</span>
         </div>
      </div>

   </div>
</section>
<section class="about">

</section>



<!-- reviews section starts  -->

<section class="reviews">
   <h1 class="heading">Student's Reviews</h1>
   <div class="box-container">
      <?php foreach ($reviews as $review) { ?>
         <div class="box">
            <p><?= htmlspecialchars($review['review']) ?></p>
            <div class="user">
               <img src="uploaded_files/<?= htmlspecialchars($review['image']) ?>" alt="">
               <div>
                  <h3><?= htmlspecialchars($review['name']) ?></h3>
                  <div class="stars">
                     <?= str_repeat('<i class="fas fa-star"></i>', $review['rating']) ?>
                     <?= str_repeat('<i class="far fa-star"></i>', 5 - $review['rating']) ?>
                  </div>
               </div>
            </div>
         </div>
      <?php } ?>
   </div>
</section>

<!-- reviews section ends -->

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>