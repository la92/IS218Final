<?php
//place this code in the pages, which you need to authenticate
session_start();
if(!$_SESSION['username']){
header("location:index.php");
}
$username = $_SESSION['username'];
?>

<?php include ('header.php'); ?> 

<?php
$update = $_GET['update'];
$username =$_POST['username'];
$username = strip_tags($username);
$full_name = $_POST['full_name'];
$full_name = strip_tags($full_name);
$gender = $_POST['gender'];
$email = $_POST['email'];
$email = strip_tags($email);

if($update == 1 && !empty($_POST)) // Checks if the form is submitted or not
{
$success_update = mysql_query("UPDATE users SET
username='$username',fullname='$full_name',gender='$gender',email='$email' WHERE username='$username'");
if($success_update) { 
echo '
<div class="alert alert-success">
Account Successfully updated!
</div>
';
} 

else {
echo '
<div class="alert">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
Failed to update
</div>
';


}

}

$document_get = mysql_query("SELECT * FROM users WHERE username='$username'");
$match_value = mysql_fetch_array($document_get);
$fullname = $match_value['fullname'];
$gender = $match_value['gender'];
$DOB = $match_value['DOB'];

?>
<br/>

 <div style="float:right"> <a class="btn btn-info" href="dashboard.php" > Account </a>  <a class="btn btn-danger logout" href="logout.php" > Logout</a> </div>

 <fieldset>
    <legend>Welcome <?php echo $username; ?>, </legend>
	
	<br/>
	<br/>
<form action="settings.php?update=1" method="post" name="myForm" onsubmit="return(validate());">
  <fieldset>
    <legend>Settings</legend>
	<label>Username *</label>
	<input name="username" type="text" placeholder="Enter New Username" value="<?php echo
	$username; ?>">
	</br>
	<label>Full Name *</label>
    <input name="full_name" type="text" placeholder="Type something" value="<?php echo $fullname; ?>" >
	<br/>
	<label>Email *</label>
	<input name="email" type="text" placeholder="Update email" value="<?php echo $email;
	?>"></br>
	<label>Gender </label>
    <select name="gender">
  <option <?php if($gender == Male) echo 'selected'; ?> >Male</option>
  <option <?php if($gender == Female) echo 'selected'; ?> >Female</option>
</select>
   
	<br/>
    <button type="submit" class="btn">Update</button>
  </fieldset>
</form>
 </fieldset>
 
 
 <script>
 
 function validate()
{

   
   if( document.myForm.full_name.value == "" )
   {
     alert( "Please provide your full name!" );
     document.myForm.full_name.focus() ;
     return false;
   }
   
   return( true );
}


 $('.logout').click(function(){
    return confirm("Are you sure you want to Logout?");
})
</script>
<?php include ('footer.php'); ?> 
