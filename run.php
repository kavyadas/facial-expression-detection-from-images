<?php 
// second script
   session_start(); 
   $imagepath = $_SESSION['passfile'];
//$imagename='11.jpg';
//$myVar='/home/hbg32/images/'.$imagename;
$var='python /home/hbg32/tf_files/label_image.py '.$imagepath;
$result = (exec($var));
echo $result;
?>

<?php 
//$result = (exec('python /home/hbg32/tf_files/label_image.py /home/hbg32/images/3.jpeg'));
//echo $result;
?>
