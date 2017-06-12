<div class="col col-md3"><b>Welcome</b>, <?php echo $this->session->userdata('name'); ?></div>

  <div class="container">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#booking"><span class="fa fa-graduation-cap"></span>Book A bus</a></li>
      <li><a data-toggle="tab" href="#transaction_details">View Transaction Details</a></li>
      <li><a data-toggle="tab" href="#edit_profile">Edit Profile</a></li>
    </ul>
    <div class="tab-content">
    <div id="booking" class="tab-pane fade in active">
        <form class="form-signin" method="POST" action="bookBus">
            <label style="">Bus</label>
            <select name="bus" class="form-control" style="height:38px">
            <option value="">--Select Bus--</option>
            <?php foreach($infor as $it){ ?>
            <option value="<?php echo $it->name; ?>"><?php echo $it->name; ?></option>
            <?php } ?>
            </select><br/>
            <label>From</label>
            <select name="from" class="form-control" style="height:38px">
            <option value="">--Select Source--</option>
            <?php foreach($inform as $iq){ ?>
            <option value="<?php echo $iq->city; ?>"><?php echo $iq->city; ?></option>
            <?php } ?>
            </select><br/>
            <label style="">To</label>
            <select name="to" class="form-control" style="height:38px">
            <option value="">--Select Destination--</option>
            <?php foreach($inform as $iq){ ?>
            <option value="<?php echo $iq->city; ?>"><?php echo $iq->city; ?></option>
            <?php } ?>
            </select><br/>
            <label>Date</label>
            <input type="date" name="date" class="form-control">
<br/><br/>
          <button style="width:300px;" class="btn btn-primary btn-block" type="submit">Check</button>
        </form>
      </div>
    <div id="transaction_details" class="tab-pane fade">
          <h2>Your Transaction Details</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>DATE</th>
                  <th>FROM</th>
                  <th>TO</th>
                  <th>TICKET ID</th>
                  <th>SEAT N<u>O</u>S</th>
                  <th>PRICE (N)</th>
                  <th>BUS NAME</th>
                </tr>
              </thead>
              <tbody>
       <?php $i=0; foreach($info as $iv){ ?>
                 <tr>
                  <td><?php echo ++$i; ?></td>
                  <td><?php echo $iv->date; ?></td>
                  <td><?php echo $iv->source; ?></td>
                  <td><?php echo $iv->destination; ?></td>
                  <td><?php echo $iv->ticket_id; ?></td>
                  <td><?php echo $iv->seat_nos; ?></td>
                  <td><?php echo $iv->price; ?></td>
                  <td><?php echo $iv->bus_id; ?></td>
               </tr>
       <?php } ?>
                            </tbody>
            </table>
          </div>

      </div>
      <div id="edit_profile" class="tab-pane fade">
      <form class="form-signin"  method="POST" action="loginController?type=staff">
      <?php foreach($informa as $iu) { ?>
        <label for="inputEmail" class="sr-only">Staff ID</label>
        <br/><input name="name" type="text" id="inputEmail" class="form-control" value="<?php echo $iu->name; ?>" autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <br/><input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password Hidden">
        <br/><input name="email" type="email" id="inputPassword" class="form-control" value="<?php echo $iu->email; ?>"><br/>
        <select style="height:38px" name="gender" class="form-control">
        <option value="Male">Male</option>
        <option vlaue="female">Female</option>
        </select><br/>
        <br/><input name="phone" type="email" id="inputPassword" class="form-control" value="<?php echo $iu->phone; ?>"><br/>
      <?php } ?>
        <!--div class="radio">
          <label>
            <input type="radio" value="remember-me"> Remember me
          </label>
        </div-->
        <button class="btn btn-primary btn-block" type="submit" style="width:300px;">Sign in</button>
      </form>
</div>

<div class="col col-md3"></div>

