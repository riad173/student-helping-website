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

   // $video = $_FILES['video']['name'];
   // $video = filter_var($video, FILTER_SANITIZE_STRING);
   // $video_ext = pathinfo($video, PATHINFO_EXTENSION);
   // $rename_video = unique_id().'.'.$video_ext;
   // $video_tmp_name = $_FILES['video']['tmp_name'];
   // $video_folder = '../uploaded_files/app/'.$rename_video;

   // upload for thml

   $html = $_FILES['html_file']['name'];
   $html = filter_var($html, FILTER_SANITIZE_STRING);
   $html_ext = pathinfo($html, PATHINFO_EXTENSION);
   $rename_html = unique_id().'.'.$html_ext;
   $html_tmp_name = $_FILES['html_file']['tmp_name'];
   $html_folder = '../uploaded_files/app/'.$rename_html;

   // upload for html end

   // upload for css
   $css = $_FILES['css_file']['name'];
   $css = filter_var($css, FILTER_SANITIZE_STRING);
   $css_ext = pathinfo($css, PATHINFO_EXTENSION);
   $rename_css = unique_id().'.'.$css_ext;
   $css_tmp_name = $_FILES['css_file']['tmp_name'];
   $css_folder = '../uploaded_files/app/'.$rename_css;
   // upload for css end

   // upload for js
   $js = $_FILES['js_file']['name'];
   $js = filter_var($js, FILTER_SANITIZE_STRING);
   $js_ext = pathinfo($js, PATHINFO_EXTENSION);
   $rename_js = unique_id().'.'.$js_ext;
   $js_tmp_name = $_FILES['js_file']['tmp_name'];
   $js_folder = '../uploaded_files/app/'.$rename_js;
   // upload for js end

   // upload for images
  // upload for images
$images = $_FILES['image_file'];
$image_folder = '../uploaded_files/app/';
foreach ($images['tmp_name'] as $key => $tmp_name) {
    $image = $images['name'][$key];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $rename_image = unique_id().'.'.$image_ext;
    $image_tmp_name = $images['tmp_name'][$key];
    $image_folder_path = $image_folder . $rename_image;
    
    move_uploaded_file($image_tmp_name, $image_folder_path);
}

   // upload for images end

   if($thumb_size > 2000000){
      $message[] = 'image size is too large!';
   }else{
      $add_playlist = $conn->prepare("INSERT INTO `app_upload`(id, tutor_id, playlist_id, title, description, thumb, status, html, css, js, image) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
      $add_playlist->execute([$id, $tutor_id, $playlist, $title, $description, $rename_thumb, $status, $rename_html, $rename_css, $rename_js, $rename_image]);
      move_uploaded_file($thumb_tmp_name, $thumb_folder);
      move_uploaded_file($html_tmp_name, $html_folder);
      move_uploaded_file($css_tmp_name, $css_folder);
      move_uploaded_file($js_tmp_name, $js_folder);
      move_uploaded_file($image_tmp_name, $image_folder);
      $message[] = 'new app uploaded!';
   }

   

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Upload App</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>
   
<section class="video-form">

   <h1 class="heading">upload App</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <p>App status <span>*</span></p>
      <select name="status" class="box" required>
         <option value="" selected disabled>-- select status</option>
         <option value="active">active</option>
         <option value="deactive">deactive</option>
      </select>
      <p>App title <span>*</span></p>
      <input type="text" name="title" maxlength="100" required placeholder="enter app title" class="box">
      <p>App description <span>*</span></p>
      <textarea name="description" class="box" required placeholder="write description" maxlength="1000" cols="30" rows="10"></textarea>
      <p>App playlist <span>*</span></p>
      <select name="playlist" class="box" required>
         <option value="" disabled selected>--select playlist</option>
         <?php
         $select_playlists = $conn->prepare("SELECT * FROM `app` WHERE tutor_id = ?");
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
      <!-- <p>select app <span>*</span></p> -->
      <!-- <input type="file" name="video" accept="html/*" required class="box"> -->
      <p>select html file <span>*</span></p>
      <input type="file" name="html_file" required class="box">
      <p>select css file <span>*</span></p>
      <input type="file" name="css_file" required class="box">
      <p>select javascript file <span>*</span></p>
      <input type="file" name="js_file" required class="box">
      <p>select website images file</p>
      <input type="file" name="image_file[]" multiple class="box">
      <input type="submit" value="upload app" name="submit" class="btn">
   </form>

</section>















<?php include '../components/footer.php'; ?>

<script src="../js/admin_script.js"></script>

</body>
</html>