<?php
/**********************************************************************************/
/*Purpose 		: Manage the Event management.
/*Created By 	: Kundan kumar.
----------------------------------------------------------------------------------
Revision History :
----------------------------------------------------------------------------------
Updated By					Date of Upload			Comments
----------------------------------------------------------------------------------
Kundan Kumar.				11-08-2020 				Created
Kundan Kumar.				11-08-2020 				index() method for participant list.
Kundan Kumar.				11-08-2020  			addParticipant() method Show add page of participant.
Kundan Kumar.				11-08-2020  			saveParticipant() method to Save participant value.
Kundan Kumar.				11-08-2020 				participantEdit() method for View edit page of participant.
Kundan Kumar.				11-08-2020 				saveEditParticipant() method for Save edited value of participant.
Kundan Kumar.				11-08-2020 				participantDelete() method for Soft delete the participant.
Kundan Kumar.				11-08-2020 				participan_view() method for View for all pages with header and footer.

/**********************************************************************************/
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
	 public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		// Load form helper library
		$this->load->helper('participant');
		$this->load->library('encryption');
		$this->load->library('pagination');		
	}
	/***************************************************************************************
	* Purpose 		: Show list of participant.
	* Inputs 		: None.
	* Returns 		: list.
	* Created By 	: Kundan Kumar
	***************************************************************************************/
	public function index()
	{	
		/*** Create object of helper ***/
		$objParticipant = new Participant();
		/*** Define search array ***/		
		$searchData =array();
		/***Search with name ***/
		if(!empty($this->input->post('name'))){
			$searchData['name'] = $this->input->post('name');
		}
		/***Search with locality ***/
		if(!empty($this->input->post('locality'))){
			$searchData['locality'] = $this->input->post('locality');
		}
		 //pagination settings
        $config['base_url'] = site_url('event/index');
        $config['total_rows'] = $objParticipant->getCountParticipants($searchData);
        $config['per_page'] = "2";
        $config["uri_segment"] = 1;
        $choice = $config["total_rows"]/$config["per_page"];
        $config["num_links"] = floor($choice);

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '«';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// get participant list
		$data['participant'] = $objParticipant->getParticipants($searchData,$config["per_page"], $data['page']);
		$data['pagination'] = $this->pagination->create_links();
		$this->participan_view('allparticipant',$data);
	}
	/***************************************************************************************
	* Purpose 		: Show add page of participant.
	* Inputs 		: None.
	* Returns 		: Add pade.
	* Created By 	: Kundan Kumar
	***************************************************************************************/
	public function addParticipant()
	{	
		$data = '';		
		$this->participan_view('addParticipant',$data);
	}
	/***************************************************************************************
	* Purpose 		: Save participant value.
	* Inputs 		: All post data.
	* Returns 		: None.
	* Created By 	: Kundan Kumar
	***************************************************************************************/
	public function saveParticipant(){
		/*** Create object of helper ***/
		$objParticipant = new Participant();
		/*** Save value of participant ***/
		$objParticipant->saveParticipantInData($this->input->post());
	}
	/***************************************************************************************
	* Purpose 		: View edit page of participant.
	* Inputs 		: participantId.
	* Returns 		: edit page.
	* Created By 	: Kundan Kumar
	***************************************************************************************/
	public function participantEdit($participantId = ''){
		/*** Create object of helper ***/
		$objParticipant = new Participant();
		/*** Get value of participant ***/
		$data['participantData'] = $objParticipant->getParticipantById($participantId);		
		$this->participan_view('editparticipant',$data);
	}
	/***************************************************************************************
	* Purpose 		: Save edited value of participant.
	* Inputs 		: All post value.
	* Returns 		: None.
	* Created By 	: Kundan Kumar
	***************************************************************************************/
	public function saveEditParticipant(){
		/*** Create object of helper ***/
		$objParticipant = new Participant();
		/*** Save edited value of participant ***/
		$objParticipant->editParticipantInData($this->input->post());			
	}
	/***************************************************************************************
	* Purpose 		: Soft delete the participant.
	* Inputs 		: participantId.
	* Returns 		: None.
	* Created By 	: Kundan Kumar
	***************************************************************************************/
	public function participantDelete(){
		$participantId = $this->input->post('participantId');
		/*** Create object of helper ***/
		$objParticipant = new Participant();
		/*** Soft delete the participant ***/
		$objParticipant->softDelete($participantId);
		echo 1;
	}
	/***************************************************************************************
	* Purpose 		: View for all pages with header and footer.
	* Inputs 		: page name,page data.
	* Returns 		: Displayed content page.
	* Created By 	: Kundan Kumar
	***************************************************************************************/
	function participan_view($view, $data=array()){		
		$dat['dview'] = $data;
		$this->load->view('required/header', $data);		  		
		$this->load->view($view);
		$this->load->view('required/footer');
	}	
}
