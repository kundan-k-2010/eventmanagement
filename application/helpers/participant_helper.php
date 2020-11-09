<?php
/**********************************************************************************/
/*Purpose 		: Model of the Event management.
/*Created By 	: Kundan kumar.
----------------------------------------------------------------------------------
Revision History :
----------------------------------------------------------------------------------
Updated By					Date of Upload			Comments
----------------------------------------------------------------------------------
Kundan Kumar.				11-08-2020 				Created
Kundan Kumar.				11-08-2020 				getParticipants() method for participant list.
Kundan Kumar.				11-08-2020  			getParticipantById() method for get participant values by id.
Kundan Kumar.				11-08-2020  			saveParticipantInData() method for save participant value
Kundan Kumar.				11-08-2020 				editParticipantInData() method for Edit participant value.
Kundan Kumar.				11-08-2020 				softDelete() method for Soft delete participant.

/**********************************************************************************/
class Participant {
	public function __construct(){        
        $this->ci = &get_instance();
		$this->ci->load->model('Common','',true);
		/* Load the encryption library  */
		$this->ci->load->library('encryption');		
    }
	/***************************************************************************************
	* Purpose 		: Get participant List.
	* Inputs 		: searchData,limit,start.
	* Returns 		: list.
	* Created By 	: Kundan Kumar
	***************************************************************************************/
	public function getParticipants($searchData,$limit,$start)
	{
		/**** Define variable ***/
		$searchname = $searchlocality = '';
		/**** If Name is available ***/
		if(!empty($searchData['name'])){
			$searchname = 'name like "%'.$searchData['name'].'%" AND ';
		}
		/**** If locality is available ***/
		if(!empty($searchData['locality'])){
			$searchlocality = 'locality like "%'.$searchData['locality'].'%" AND';
		}
		$participantData = $this->ci->Common->bind_query('SELECT id,name,age,dob,profession,locality,guest_number,address FROM participant WHERE '.$searchname.$searchlocality.' deleted = 0 ORDER BY id DESC LIMIT '.$start.','.$limit.'');
		return $participantData;
	}
	/***************************************************************************************
	* Purpose 		: Get count of participant List.
	* Inputs 		: searchData.
	* Returns 		: List.
	* Created By 	: Kundan Kumar
	***************************************************************************************/
	public function getCountParticipants($searchData)
	{
		/**** Define variable ***/
		$searchname = $searchlocality = '';
		/**** If Name is available ***/
		if(!empty($searchData['name'])){
			$searchname = 'name like "%'.$searchData['name'].'%" AND ';
		}
		/**** If locality is available ***/
		if(!empty($searchData['locality'])){
			$searchlocality = 'locality like "%'.$searchData['locality'].'%" AND';
		}
		$participantCountData = $this->ci->Common->bind_query('SELECT count(id) as totalCount FROM participant WHERE '.$searchname.$searchlocality.' deleted = 0 ORDER BY id DESC');
		//echo '<pre>';
		//print_r($participantCountData);exit;
		return $participantCountData[0]->totalCount;
	}
	/***************************************************************************************
	* Purpose 		: Get participant value by id.
	* Inputs 		: participantId.
	* Returns 		: All participant data.
	* Created By 	: Kundan Kumar
	***************************************************************************************/
	public function getParticipantById($participantId = '')
	{
		$participantData = $this->ci->Common->bind_query('SELECT id,name,age,dob,profession,locality,guest_number,address FROM participant WHERE id = '.$participantId.' AND deleted = 0');
		return $participantData;
	}
	/***************************************************************************************
	* Purpose 		: Save participant value .
	* Inputs 		: All participant data.
	* Returns 		: participant id.
	* Created By 	: Kundan Kumar
	***************************************************************************************/
	public function saveParticipantInData($participantDetails = array())
	{
		$data = array(
			'name'=>$participantDetails['name'],
			'age'=>$participantDetails['age'],
			'dob'=>$participantDetails['dob'],
			'profession'=>$participantDetails['profession'],
			'locality'=>$participantDetails['locality'],				
			'guest_number'=>$participantDetails['guest_number'],
			'address'=>$participantDetails['address'],
			'created' => date('Ymdhis')
		);
		$participantId = $this->ci->Common->insert_data('participant',$data);
	}
	/***************************************************************************************
	* Purpose 		: Edit participant value.
	* Inputs 		: participant Details.
	* Returns 		: participant id.
	* Created By 	: Kundan Kumar
	***************************************************************************************/
	public function editParticipantInData($participantDetails = array())
	{		
		$data = array(
				'id'=>$participantDetails['id'],
				'name'=>$participantDetails['name'],
				'age'=>$participantDetails['age'],
				'dob'=>$participantDetails['dob'],
				'profession'=>$participantDetails['profession'],
				'locality'=>$participantDetails['locality'],				
				'guest_number'=>$participantDetails['guest_number'],
				'address'=>$participantDetails['address'],
				'modified' => date('Ymdhis')
			);
			$participantId = $this->ci->Common->update_data('participant',$data,$participantDetails['id']);
	}
	/***************************************************************************************
	* Purpose 		: Soft delete participant.
	* Inputs 		: None.
	* Returns 		: None.
	* Created By 	: Kundan Kumar
	***************************************************************************************/
	public function softDelete($participantId = ''){
		$data = array(
			'deleted'=>'1',
			'modified' => date('Ymdhis')
		);
		$this->ci->Common->soft_delete('participant',$data,$participantId);
	}
}
