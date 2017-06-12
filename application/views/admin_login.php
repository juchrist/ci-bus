
<form class="form-signin" method="POST" action="adminLogin">
<?php if(isset($_GET['msg'])){
 echo '<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Alert!</h4>
     '.$_GET['msg'].'</div>';
} ?>
<label style="">Email</label>
<input name="username" type="text" class="form-control" style="height:38px"><br/>
<label style="">Password</label>
<input name="password" type="password" class="form-control" style="height:38px">
<br/><br/>
        <button style="width:300px;" class="btn btn-primary btn-block" type="submit">Login</button>
        </form>
<p align="center"><a href="signUp">Sign Up Here</a> </p>
<br/>
    