var base_url = $('base').attr('href');
$(document).ready(function () {
	/***** Add Participant ****/
	$('#addParticipantData').click(function(){	
		var name = $("#name").val();
		var age = $("#age").val();
		var dob = $("#datepicker").val();
		//alert(dob);
		var profession = $("#profession").val();
		var locality = $("#locality").val();
		var guestNumber = $("#guest_number").val();
		var address = $("#address").val();
		var form_data = new FormData();
		form_data.append('name', name);		
		form_data.append('age', age);
		form_data.append('dob', dob);
		form_data.append('profession', profession);
		form_data.append('locality', locality);
		form_data.append('guest_number', guestNumber);
		form_data.append('address', address);
		$.ajax({
			url: base_url+"event/saveParticipant",
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			type: "POST",
			data: form_data,
			success: function(response){			
				window.location = base_url+"event";	
				$("#messageDis").html('Participant add successfully.');				
			}
		}); 	
	});
	/***** Edit Participant ****/
	$('#editParticipantData').click(function(){
		var participantId = $("#participant_id").val();
		var name = $("#name").val();
		var age = $("#age").val();
		var dob = $("#datepicker").val();
		var profession = $("#profession").val();
		var locality = $("#locality").val();
		var guestNumber = $("#guest_number").val();
		var address = $("#address").val();
		var form_data = new FormData();
		form_data.append('id', participantId);			
		form_data.append('name', name);		
		form_data.append('age', age);
		form_data.append('dob', dob);
		form_data.append('profession', profession);
		form_data.append('locality', locality);
		form_data.append('guest_number', guestNumber);
		form_data.append('address', address);
		$.ajax({
			url: base_url+"event/saveEditParticipant",
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			type: "POST",
			data: form_data,
			success: function(response){
				window.location = base_url+"event";
			}
		}); 	
	});
	/***** Validation for name ****/
	$("#name").keyup(function(){
		var fn = $("#name").val();
		if(fn === "") {
		   $("#nameerror").html('Please Enter name');
		   $("#name").focus();
		}else{
			var dataDetail = {'name':fn};		
			var letters = /^[A-Za-z ]+$/;
			if(fn.match(letters)) {
				$("#nameerror").html('');
			 }else{
				$("#nameerror").html('* only alphabets & space allowed in name');
				$("#name").focus();
			}
		}
	});
	/***** Validation for age ****/
	$("#age").keyup(function(){
		var age = $("#age").val();		
		if(age === ""){
		   $("#ageError").html('Please Enter age.');
		   $("#age").focus();
		}else if(age > 100){
		  $("#ageError").html('Age should be less than 100.');
		  $("#age").focus();   
		}else if(isNaN(age)){
		  $("#ageError").html('Age should be integer.');
		  $("#age").focus();
		}else{
			$("#ageError").html('');
		}
	});
	/***** Validation for dob ****/
	$("#datepicker").keyup(function(){
		var fn = $("#datepicker").val();
		if(fn === "") {
		   $("#doberror").html('Please Enter date of birth');
		   $("#datepicker").focus();
		}else{
			$("#doberror").html('');
		}
	});
	/***** Validation for locality ****/
	$("#locality").keyup(function(){
		var lo = $("#locality").val();
		if(lo === "") {
		   $("#localityerror").html('Please Enter locality.');
		   $("#locality").focus();
		}else{
			$("#localityerror").html('');
		}
	});
	/***** Validation for guest_number ****/
	$("#guest_number").keyup(function(){
		var pn = $("#guest_number").val();		
		if(pn === ""){
		   $("#guestNumberError").html('Please Enter Guest number.');
		   $("#guest_number").focus();
		}else if(isNaN(pn)){
		  $("#guestNumberError").html('Guest number should be integer.');
		  $("#guest_number").focus();
		}else if(pn > 2){
		  $("#guestNumberError").html('Max guest number should be two.');
		  $("#guest_number").focus();
		}else{
			$("#guestNumberError").html('');
		}
	});
	/***** Validation for address ****/
	$("#address").keyup(function(){
		var ad = $("#address").val();
		if(ad === "") {
		   $("#addresserror").html('Please Enter address.');
		   $("#address").focus();
		}else{
			$("#addresserror").html('');
		}
	});
	$('#searchParticipantData').click(function(){
		var name = $("#searchname").val();
		var locality = $("#searchlocality").val();
		$.ajax({
			url: base_url+"event/",
			type: "POST",
			data: {'name':name,'locality':locality},			
			success: function(response){
				$(".searchParticipant_prv").hide();		
				$(".searchParticipant").html(response);				
			}
		}); 	
	});
});

		
function deleteParticipantData(participantId){
	$.ajax({
		url: base_url+"event/participantDelete",
		type: "POST",
		data: {'participantId':participantId},
		success: function(response){
			window.location = base_url+"event";		
		}
	}); 
}