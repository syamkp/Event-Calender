<h2>Add Event</h2>

<form method="post" action="<?php echo base_url('event/save');?>">
  <div class="form-group">
    <label for="event_details">Event Details</label></br>

    <textarea name = 'event_details' class="form-control" id="event_details"  placeholder="Enter Event Details"></textarea></br>

    <input type='hidden' name='date' value="<?php echo $_GET['date']; ?>"/>
    
  </div>

  <button type="submit" class="btn btn-primary">Add</button>
</form>