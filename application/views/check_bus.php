<h3 align="center">Book a Bus</h3>
<form action="book" method="post" class="form-signin" style="width:800px">
<p><label>From: </label> <?php echo $from; ?> 
<br/><br/><label>to: </label> <?php echo $to; ?> 
<br/><br/><label>cost: </label> N<?php echo $price; ?></p>
            <label>Available Seats:</label><br/>
            <?php foreach($seats as $seat){ ?>
              <input type="radio" name="seat" value="<?php echo $seat->seat_number; ?>"> <?php echo $seat->seat_number; ?>
            <?php } ?>
            <input type="radio" style="display:none" checked />
<br/><br/>
<input type="hidden" name="from" value="<?php echo $from; ?>" />
<input type="hidden" name="to" value="<?php echo $to; ?>" />
<input type="hidden" name="price" value="<?php echo $price; ?>" />
<input type="hidden" name="bus" value="<?php echo $bus; ?>" />
<input type="hidden" name="date" value="<?php echo $date; ?>" />

          <button style="width:300px;" class="btn btn-lg btn-primary btn-block" type="submit">Book</button>
</form>

