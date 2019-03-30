<?php
session_start();
$_SESSION['alogin']=="";
session_unset();
//session_destroy();
// $_SESSION['errmsg']="You have successfully loggedout"; //// TODO: Have to add this message in the login page
?>
<script language="javascript">
document.location="login";
</script>
