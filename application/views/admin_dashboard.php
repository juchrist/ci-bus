<div class="col col-md3"><b>Welcome</b>, <?php echo $this->session->userdata("admin_name"); ?></div>
<?php if(isset($_GET['msg'])){
 echo '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i>'.$_GET['msg'].'</h4>
     </div>';
} ?>
  <div class="container">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#booking"><span class="fa fa-graduation-cap"></span>View All Transactions</a></li>
      <li><a data-toggle="tab" href="#transaction_details">Add a new Vehicle</a></li>
      <li><a data-toggle="tab" href="#edit_profile">Manage Vehicles</a></li>
      <li><a data-toggle="tab" href="#add_route">Add Routes</a></li>
      <li><a data-toggle="tab" href="#set_prices">Set Prices</a></li>
    </ul>
    <div class="tab-content">
    <div id="booking" class="tab-pane fade in active">
          <h2>All Bookings</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>DATE</th>
                  <th>BOOKER</th>
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
                  <td><?php echo $iv->booker; ?></td>
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
    <div id="transaction_details" class="tab-pane fade">
          <h2>Add New Vehicle</h2>
        <form class="form-signin" method="POST" action="addVehicle">
            <label style="">Vehicle Name</label>
            <input name="vehicle" class="form-control" style="height:38px">
            <br/>
            <label>No of Seats</label>
            <input name="seats" class="form-control" style="height:38px" type="number"><br/>
            <label>Vehicle type</label>
            <select style="height:38px" name="type" class="form-control">
            <option value="Bus">Bus</option>
            <option value="Car">Car</option>
            </select><br/>
            
<br/><br/>
          <button style="width:300px;" class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
        </form>

      </div>
      <div id="edit_profile" class="tab-pane fade">
<p align="right" style="margin:1em;"><a href="resetAll"><button class="btn btn-danger">Reset All Buses</button></a></p>
 <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>BUS</th>
                  <th>NUMBER OF SEATS</th>
                  <th>Currently Occupied Seats</th>
                </tr> <!--2101852026 -->
              </thead>
            <?php
//             for($i=1;$i<100;$i++){
    $i = 0;
             foreach($infor as $it){
    $query4 = $this->db->query("SELECT * FROM `booking` WHERE booked='1' AND bus_name='$it->name'");
    $row = $query4->row();
    $count = $query4->num_rows();

             ?>
                <tr>
                <td><?php echo ++$i; ?></td>
                <td><?php echo $it->name;?></td>
                <td><?php echo $it->seat_nos; ?></td>
                <td><?php echo $count; ?> / <?php echo $it->seat_nos; ?></td>
                </tr>
            <?php } //} ?>
            </table>
            </div>
         </div>
    <div id="add_route" class="tab-pane fade">
          <h2>Add New Route</h2>
        <form class="form-signin" method="POST" action="addRoute">
            <label style="">Route Name</label>
            <input name="route" class="form-control" style="height:38px">
            <br/>
            
<br/><br/>
          <button style="width:300px;" class="btn btn-primary btn-block" type="submit">Add</button>
        </form>
    </div>

    <div id="set_prices" class="tab-pane fade">
          <h2>Set Prices</h2>
        <form class="form-signin" method="POST" action="setPrice">
            <label>From</label>
            <select style="height:38px" name="from" class="form-control">
             <?php foreach($inform as $iq){ ?>
            <option value="<?php echo $iq->city; ?>"><?php echo $iq->city; ?></option>
            <?php } ?>
            </select><br/>
            <label> To</label>
            <select style="height:38px" name="to" class="form-control">
             <?php foreach($inform as $iq){ ?>
            <option value="<?php echo $iq->city; ?>"><?php echo $iq->city; ?></option>
            <?php } ?>
           </select><br/>
            <label>Price</label>
            <input name="price" class="form-control" style="height:38px" type="number"><br/>

            <br/><br/>
          <button style="width:300px;" class="btn btn-primary btn-block" type="submit">Add</button>
        </form>
    </div>
         </div>
   
<div class="col col-md3"></div>
