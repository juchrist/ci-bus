
<form class="form-signin" method="POST" action="register">
<label style="">Full Name</label>
<input name="fullname" type="text" class="form-control" style="height:38px" required><br/>
<label style="">Email</label>
<input name="email" type="email" class="form-control" style="height:38px" required><br/>
<label style="">Password</label>
<input name="password" type="password" class="form-control" style="height:38px" required>
<label style="">Gender</label>
<select style="height:38px" name="gender" class="form-control" required>
<option value="Male">Male</option>
<option value="female">Female</option>
</select><br/>
<label style="">Phone Number</label>
<input name="phone" type="number" class="form-control" style="height:38px" required><br/>
<br/><br/>
          <button style="width:300px;" class="btn btn-primary btn-block" type="submit">Sign Up</button>
        </form>
<p align="center"><a href="<?php echo base_url(); ?>">Login Here</a> </p>
<br/>
    