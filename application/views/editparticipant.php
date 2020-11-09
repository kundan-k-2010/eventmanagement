<form>
  <div class="container">
	<span><a class="" href="<?php echo base_url(); ?>event">Participant List</a></span>
    <h1>Edit Participant</h1>
    <hr>
	<label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" id="name" value="<?php echo $participantData[0]->name; ?>" autocomplete="off" required>
	<label class="error" id="nameerror"></label><br/>
	<label for="age"><b>Age</b></label>
    <input type="text" placeholder="Enter Age" name="age" id="age" value="<?php echo $participantData[0]->age; ?>" autocomplete="off" required>
	<label class="error" id="ageError"></label><br/>
	<label for="dob"><b>Date of Birth</b></label>
    <input type="text" placeholder="Enter DOB" name="dob" id="datepicker" value="<?php echo $participantData[0]->dob; ?>" autocomplete="off" required>
	<label class="error" id="doberror"></label><br/>
	<label for="profession"><b>Choose Profession</b></label>
	<?php
	$empSelected = $stuSelected = '';
	if($participantData[0]->profession == 'Employed'){
		$empSelected = 'selected = "selected"';
	}else{
		$stuSelected = 'selected = "selected"';
	}
	?>
	<select name="profession" class="" id="profession">
		<option value="">Select one</option>
		<option value="Employed" <?php echo $empSelected; ?>>Employed</option>
		<option value="Student" <?php echo $stuSelected; ?>>Student</option>
	</select><br/>
	<label for="locality"><b>Locality</b></label>
    <input type="text" placeholder="Enter Locality" name="locality" id="locality" value="<?php echo $participantData[0]->locality; ?>" required>
	<label class="error" id="localityerror"></label><br/>
	<label for="guest_number"><b>Number of Guest</b></label>
    <input type="text" placeholder="Enter Number of Guest" name="guest_number" id="guest_number" value="<?php echo $participantData[0]->guest_number; ?>" autocomplete="off" required>
	<label class="error" id="guestNumberError"></label><br/>
	<label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter address" name="address" id="address" value="<?php echo $participantData[0]->address; ?>" autocomplete="off" required>
	<label class="error" id="addresserror"></label><br/>
	<input type="hidden" name="participant_id" id="participant_id" value="<?php echo $participantData[0]->id; ?>">
    <button type="button" class="registerbtn" id="editParticipantData">Edit</button>
  </div>
</form>