<label class="error" id="messageDis"></label>
<div class="searchParticipant">
<table border="1" id="searchParticipant_prv"">
<tr><td><a class="" href="<?php echo base_url(); ?>event/addParticipant">Add Participant</a></td>
	<td colspan="7">
		<form>
		  <div class="container">
			  <table border="1" id="">
				<tr>
					<td colspan="2"><input type="text" placeholder="Search Name" name="searchname" id="searchname"></td>	
					<td colspan="2"><input type="text" placeholder="Search Locality" name="searchlocality" id="searchlocality"></td>			  
					<td><button type="button" class="registerbtn" id="searchParticipantData">Search</button></td>
				</tr>
			</table>
		  </div>
		</form>
	</td>	
</tr>
	<tr>
		<th>Sr.No.</th>
		<th>Name</th>
		<th>age</th>
		<th>Date of Birth</th>
		<th>Profession</th>
		<th>Locality</th>
		<th>Guest Number</th>
		<th>Address</th>
		<th>Action</th>
	</tr>
	<?php
	if($participant){
		$i = 1;
		foreach ($participant as $participantdata){
	?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $participantdata->name; ?></td>
			<td><?php echo $participantdata->age; ?></td>
			<td><?php echo date('d M Y',strtotime($participantdata->dob)); ?></td>
			<td><?php echo $participantdata->profession; ?></td>
			<td><?php echo $participantdata->locality; ?></td>
			<td><?php echo $participantdata->guest_number; ?></td>
			<td><?php echo $participantdata->address; ?></td>
			<td><a class="edit" href="<?php echo base_url(); ?>event/participantEdit/<?php echo $participantdata->id; ?>">Edit</a>&nbsp;&nbsp;
			<button type="button" class="" onclick="deleteParticipantData(<?php echo $participantdata->id; ?>);">Delete</button></td>
		</tr>
		<?php
		$i++;
		}}else{ ?>
			<tr>
				<td colspan="9"><?php echo 'Data not available'; ?></td>				
			</tr>		
	<?php } ?>	
</table>
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php echo $pagination; ?>
        </div>
    </div>
</div>
