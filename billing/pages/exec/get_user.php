<?php
include('config.php');
if(!empty($_POST["user_id"]))
{
 $id=intval($_POST['user_id']);
$query=mysqli_query($con,"SELECT * FROM users WHERE id=$id");
?>

<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['email']); ?>" hidden><?php echo htmlentities($row['email']); ?></option>
  <?php
 }
}
?>
