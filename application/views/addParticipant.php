<form>
  <div class="container">
	<span><a class="" href="<?php echo base_url(); ?>event">Participant List</a></span>
    <h1>Add Participant</h1>	
    <hr>
	<label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" id="name" autocomplete="off" required>
	<label class="error" id="nameerror"></label><br/>
	<label for="age"><b>Age</b></label>
    <input type="text" placeholder="Enter Age" name="age" id="age" autocomplete="off" required>
	<label class="error" id="ageError"></label><br/>
	<label for="dob"><b>Date of Birth</b></label>
    <input type="text" placeholder="Enter DOB" name="dob" id="datepicker" autocomplete="off" required>
	<label class="error" id="doberror"></label><br/>
	<label for="profession"><b>Choose Profession</b></label>
	<select name="profession" class="" id="profession">
		<option value="">Select one</option>
		<option value="Employed">Employed</option>
		<option value="Student">Student</option>
	</select><br/>
	<label for="locality"><b>Locality</b></label>
    <input type="text" placeholder="Enter Locality" name="locality" id="locality" autocomplete="off" required>
	<label class="error" id="localityerror"></label><br/>
	<label for="guest_number"><b>Number of Guest</b></label>	
    <input type="text" placeholder="Enter Number of Guest" name="guest_number" id="guest_number" autocomplete="off" required>
	<label class="error" id="guestNumberError"></label><br/>
	<label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter address" name="address" id="address" autocomplete="off" required> 
	<label class="error" id="addresserror"></label><br/>	
    <button type="button" class="registerbtn" id="addParticipantData">Add</button>
  </div>
</form>
