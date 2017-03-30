<!-- facialexpression/templates/index.html -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>facialexpression!</title>
	<style>
body {
        background-image: url("https://wallpaperscraft.com/image/baby_boy_laugh_smile_67441_1920x1080.jpg ");
         background-size:cover;
} 
 
</style>
    </head>
    <body>
        <h1> <font color="white">
hey i am gonna guess your expression</h1></font>

<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
$res="none";
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"/tmp/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit" value="upload"/><br/>
</form>
<form action="run.php" method="POST">
 <input type="submit" value="result"/><br/>
 <?php
   session_start();
   $filepath='/tmp/'.$file_name;
   $_SESSION['passfile'] = $filepath;  // first script
   //header('location:run.php');
  ?>
   
   </form>

  
   
   </body>
</html>


