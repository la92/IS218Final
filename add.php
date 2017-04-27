<?php
session_start();
//checks if the login session is true
if(!$_SESSION['username']){
header("location:index.php");
}
$username = $_SESSION['username'];

// --- Authenticate code ends here ---
?>
<?php include ('header.php'); ?> 
<?php
$document_get = mysql_query("SELECT * FROM users WHERE username='$username'");
$match_value = mysql_fetch_array($document_get);
$user_id = $match_value['id'];
?>
<br/>
 <div style="float:right"> <a class="btn btn-warning" href="dashboard.php">Dashboard</a>  <a class="btn btn-info" href="settings.php">Settings</a>  <a class="btn btn-danger logout" href="logout.php">Logout</a></div>

 <fieldset>
    <legend>Welcome <?php echo $username; ?>, </legend>
	<br/>
 </fieldset>

</script>
<?php
$task_name = $_POST['name'];
$des = $_POST['message'];
$start = $_POST['start'];
$due = $_POST['due'];
$success = mysql_query("INSERT INTO todolist(user_id, check_value,task, start, due, description) VALUES ('$user_id', 'false',
 '$task_name','$start','$due','$des')");

?>
<?php if (!isset($_POST['submit_val'])) { ?>
 <form method="post" action="add.php">
 <label>Task: </label><input type="text" name="name" value=""><br>
 <label>Description: </label><input type="text" name="message" value=""><br>
 <label>Start: </label><input type="date" name="start" value=""><br>
 <label>Due: </label><input type="date" name="due" value=""><br>
<input class="btn btn-success" type="submit" name="submit_val" value="Save" />
</form>
<?php } else { ?>
<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success! </strong> Your lists has been successfully added, please go to your <a href="dashboard.php">dashboard board</a>.
</div>
<?php
} 
?>
<script>
$('.logout').click(function(){
    return confirm("Are you sure you want to Logout?");
})
</script>
<?php include ('footer.php'); ?> 
