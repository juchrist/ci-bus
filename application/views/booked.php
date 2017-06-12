<p align="left"><button class="user_panel">Back</button>
<p align="right">Ticket  ID: <?php echo $ticket_id; ?></p>
<div class="form-signin">

<label>Dear <?php echo $booker; ?>, Your Seat have been booked. Please Check and Print the following datails.</label>
<br/>
<label>Bus Name: <?php echo $bus_id; ?></label>
<br/>
<label>From: </label><?php echo $source; ?>
<br/>
<label>To: </label>
<?php echo $destination; ?>
<br/>
<label>Price: </label>
N<?php echo $price; ?>
<br/>
<label>Date: </label>
<?php echo $date; ?>
<br/>

<p style="color:red;">* Note:   Please bring along with you a means of identification e.g Your Student ID Card, National ID Card, Driving License, e.t.c</p>
<br/><br/><button onclick="window.print()" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> Print</button>