<?php

include '../components/connect.php';

if(isset($_COOKIE['tutor_id'])){
   $tutor_id = $_COOKIE['tutor_id'];
}else{
   $tutor_id = '';
   header('location:login.php');
}

if(isset($_POST['submit'])){

   $id = unique_id();
   $status = $_POST['status'];
   $status = filter_var($status, FILTER_SANITIZE_STRING);
   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);
   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   $playlist = $_POST['playlist'];
   $playlist = filter_var($playlist, FILTER_SANITIZE_STRING);

   $thumb = $_FILES['thumb']['name'];
   $thumb = filter_var($thumb, FILTER_SANITIZE_STRING);
   $thumb_ext = pathinfo($thumb, PATHINFO_EXTENSION);
   $rename_thumb = unique_id().'.'.$thumb_ext;
   $thumb_size = $_FILES['thumb']['size'];
   $thumb_tmp_name = $_FILES['thumb']['tmp_name'];
   $thumb_folder = '../uploaded_files/'.$rename_thumb;

   // $link = $_FILES['link']['name'];
   // $link = filter_var($link, FILTER_SANITIZE_STRING);
   // $link_ext = pathinfo($link, PATHINFO_EXTENSION);
   // $rename_link = unique_id().'.'.$link_ext;
   // $link_size = $_FILES['link']['size'];
   // $link_tmp_name = $_FILES['link']['tmp_name'];
   // $link_folder = '../uploaded_files/link/'.$rename_link;

   $link = $_POST['link'];

   if($thumb_size > 2000000){
      $message[] = 'image size is too large!';
   }else{
      $add_playlist = $conn->prepare("INSERT INTO `links_upload`(id, tutor_id, playlist_id, title, description, url, thumb, status) VALUES(?,?,?,?,?,?,?,?)");
      $add_playlist->execute([$id, $tutor_id, $playlist, $title, $description, $link, $rename_thumb, $status]);
      move_uploaded_file($thumb_tmp_name, $thumb_folder);
      $message[] = 'new link uploaded!';
   }

   

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Upload Links</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>
   
<section class="video-form">

   <h1 class="heading">upload links</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <p>link status <span>*</span></p>
      <select name="status" class="box" required>
         <option value="" selected disabled>-- select status</option>
         <option value="active">active</option>
         <option value="deactive">deactive</option>
      </select>
      <p>link title <span>*</span></p>
      <input type="text" name="title" maxlength="100" required placeholder="enter link title" class="box">
      <p>link description <span>*</span></p>
      <textarea name="description" class="box" required placeholder="write description" maxlength="1000" cols="30" rows="10"></textarea>
      <p>link playlist <span>*</span></p>
      <select name="playlist" class="box" required>
         <option value="" disabled selected>--select playlist</option>
         <?php
         $select_playlists = $conn->prepare("SELECT * FROM `links` WHERE tutor_id = ?");
         $select_playlists->execute([$tutor_id]);
         if($select_playlists->rowCount() > 0){
            while($fetch_playlist = $select_playlists->fetch(PDO::FETCH_ASSOC)){
         ?>
         <option value="<?= $fetch_playlist['id']; ?>"><?= $fetch_playlist['title']; ?></option>
         <?php
            }
         ?>
         <?php
         }else{
            echo '<option value="" disabled>no playlist created yet!</option>';
         }
         ?>
      </select>
      <p>select thumbnail <span>*</span></p>
      <input type="file" name="thumb" accept="image/*" required class="box">
      <p>Give link <span>*</span></p>
      <!-- <input type="url" name="link" required class="box"> -->
      <input type="url" name="link" required class="box">
      <input type="submit" value="upload link" name="submit" class="btn">
   </form>

</section>


<?php include '../components/footer.php'; ?>

<script src="../js/admin_script.js"></script>

</body>
</html>