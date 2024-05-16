<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
   header('location:home.php');
}

if(isset($_POST['save_list'])){

   if($user_id != ''){
      
      $list_id = $_POST['list_id'];
      $list_id = filter_var($list_id, FILTER_SANITIZE_STRING);

      $select_list = $conn->prepare("SELECT * FROM `bookmark` WHERE user_id = ? AND playlist_id = ?");
      $select_list->execute([$user_id, $list_id]);

      if($select_list->rowCount() > 0){
         $remove_bookmark = $conn->prepare("DELETE FROM `bookmark` WHERE user_id = ? AND playlist_id = ?");
         $remove_bookmark->execute([$user_id, $list_id]);
         $message[] = 'playlist removed!';
      }else{
         $insert_bookmark = $conn->prepare("INSERT INTO `bookmark`(user_id, playlist_id) VALUES(?,?)");
         $insert_bookmark->execute([$user_id, $list_id]);
         $message[] = 'playlist saved!';
      }

   }else{
      $message[] = 'please login first!';
   }

}

if (isset($_POST['submit_review'])) {
   if ($user_id != '') {
       $rating = filter_var($_POST['rating'], FILTER_SANITIZE_NUMBER_INT);
       $review = filter_var($_POST['review'], FILTER_SANITIZE_STRING);
       
       $insert_review = $conn->prepare("INSERT INTO `reviews` (user_id, rating, review, date) VALUES (?, ?, ?, NOW())");
       $insert_review->execute([$user_id, $rating, $review]);

       $message[] = 'Review submitted successfully!';
       header("Location: playlist.php?get_id=$get_id");
       exit();
   } else {
       $message[] = 'Please login to submit a review!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>playlist</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- playlist section starts  -->

<section class="playlist">

   <h1 class="heading">playlist details</h1>

   <div class="row">

      <?php
         $select_playlist = $conn->prepare("SELECT * FROM `playlist_all` WHERE id = ? and status = ? LIMIT 1");
         $select_playlist->execute([$get_id, 'active']);
         if($select_playlist->rowCount() > 0){
            $fetch_playlist = $select_playlist->fetch(PDO::FETCH_ASSOC);

            $playlist_id = $fetch_playlist['id'];

            $count_videos = $conn->prepare("SELECT * FROM `content` WHERE playlist_id = ?");
            $count_videos->execute([$playlist_id]);
            $total_videos = $count_videos->rowCount();

            $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ? LIMIT 1");
            $select_tutor->execute([$fetch_playlist['tutor_id']]);
            $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);

            $select_bookmark = $conn->prepare("SELECT * FROM `bookmark` WHERE user_id = ? AND playlist_id = ?");
            $select_bookmark->execute([$user_id, $playlist_id]);

      ?>

      <div class="col">
         <form action="" method="post" class="save-list">
            <input type="hidden" name="list_id" value="<?= $playlist_id; ?>">
            <?php
               if($select_bookmark->rowCount() > 0){
            ?>
            <button type="submit" name="save_list"><i class="fas fa-bookmark"></i><span>saved</span></button>
            <?php
               }else{
            ?>
               <button type="submit" name="save_list"><i class="far fa-bookmark"></i><span>save playlist</span></button>
            <?php
               }
            ?>
         </form>
         <div class="thumb">
            <span><?= $total_videos; ?> videos</span>
            <img src="uploaded_files/<?= $fetch_playlist['thumb']; ?>" alt="">
         </div>
      </div>

      <div class="col">
         <div class="tutor">
            <img src="uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
            <div>
               <h3><?= $fetch_tutor['name']; ?></h3>
               <span><?= $fetch_tutor['profession']; ?></span>
            </div>
         </div>
         <div class="details">
            <h3><?= $fetch_playlist['title']; ?></h3>
            <p><?= $fetch_playlist['description']; ?></p>
            <div class="date"><i class="fas fa-calendar"></i><span><?= $fetch_playlist['date']; ?></span></div>
         </div>
      </div>

      <?php
         }else{
            echo '<p class="empty">this playlist was not found!</p>';
         }  
      ?>

   </div>

</section>

<!-- playlist section ends -->

<!-- videos container section starts  -->

<section class="videos-container">

   <h1 class="heading">playlist videos</h1>

   <div class="box-container">

      <?php
         $select_content = $conn->prepare("SELECT * FROM `video_upload` WHERE playlist_id = ? AND status = ? ORDER BY date DESC");
         $select_content->execute([$get_id, 'active']);
         if($select_content->rowCount() > 0){
            while($fetch_content = $select_content->fetch(PDO::FETCH_ASSOC)){  
      ?>
      <a href="watch_video.php?get_id=<?= $fetch_content['id']; ?>" class="box">
         <i class="fas fa-play"></i>
         <img src="uploaded_files/video/<?= $fetch_content['thumb']; ?>" alt="">
         <h3><?= $fetch_content['title']; ?></h3>
      </a>
      <?php
            }
         }else{
            echo '<p class="empty">no videos added yet!</p>';
         }
      ?>

   </div>

</section>

<!-- videos container section ends -->


<!-- app container section starts  -->

<section class="videos-container">

   <h1 class="heading">playlist app</h1>

   <div class="box-container">

      <?php
         $select_content = $conn->prepare("SELECT * FROM `app_upload` WHERE playlist_id = ? AND status = ? ORDER BY date DESC");
         $select_content->execute([$get_id, 'active']);
         if($select_content->rowCount() > 0){
            while($fetch_content = $select_content->fetch(PDO::FETCH_ASSOC)){  
      ?>
      <a href="use_app.php?get_id=<?= $fetch_content['id']; ?>" class="box">
         <img src="uploaded_files/<?= $fetch_content['thumb']; ?>" alt="">
         <h3><?= $fetch_content['title']; ?></h3>
      </a>
      <?php
            }
         }else{
            echo '<p class="empty">no app added yet!</p>';
         }
      ?>

   </div>

</section>

<!-- videos container section ends -->


<!-- videos container section starts  -->

<section class="videos-container">

   <h1 class="heading">playlist links</h1>

   <div class="box-container">

      <?php
         $select_content = $conn->prepare("SELECT * FROM `links_upload` WHERE playlist_id = ? AND status = ? ORDER BY date DESC");
         $select_content->execute([$get_id, 'active']);
         if($select_content->rowCount() > 0){
            while($fetch_content = $select_content->fetch(PDO::FETCH_ASSOC)){  
      ?>
      <a href="use_link.php?get_id=<?= $fetch_content['id']; ?>" class="box">
         <img src="uploaded_files/<?= $fetch_content['thumb']; ?>" alt="">
         <h3><?= $fetch_content['title']; ?></h3>
      </a>
      <?php
            }
         }else{
            echo '<p class="empty">no links added yet!</p>';
         }
      ?>

   </div>

</section>

<!-- videos container section ends -->

<section class="review-section">
   <h1 class="heading">Submit Your Review</h1>
   
   <form action="" method="post" class="review-form">
      <label for="rating">Rating:</label>
      <select name="rating" id="rating" required>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
      </select>
      <label for="review">Review:</label>
      <textarea name="review" id="review" rows="5" maxlength="600" required></textarea>
      <button type="submit" name="submit_review">Submit Review</button>
   </form>

<script>
   document.getElementById('review').addEventListener('input', function () {
      var review = this.value;
      var charCount = review.length;
      document.getElementById('charCount').textContent = charCount + '/500';
   });

   function validateReview() {
      var review = document.getElementById('review').value;
      if (review.length > 500) {
         alert('Review cannot exceed 500 characters.');
         return false;
      }
      return true;
   }
</script>

<style>
      .review-section {
         margin-top: 20px;
      }

      .review-form label {
         display: block;
         margin-bottom: 5px;
         font-size: 15px;
         font-weight: bold; 
         color: #fff;
      }

      .review-form select,
      .review-form textarea {
         width: 100%;
         padding: 8px;
         margin-bottom: 10px;
         border: 1px solid #ccc;
         border-radius: 4px;
         box-sizing: border-box;
      }

      .review-form button {
         background-color: #4CAF50;
         color: white;
         padding: 10px 20px;
         border: none;
         border-radius: 4px;
         cursor: pointer;
      }

      .review-form button:hover {
         background-color: #45a049;
      }
   </style>

   
</section>








<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>