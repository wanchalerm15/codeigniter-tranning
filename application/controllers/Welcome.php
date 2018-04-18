<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tb_test');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($id = null)
	{
		$this->save_item();
		$this->load->view('welcome_message', [
			'items' => $this->tb_test->get_items(),
			'item' => $this->tb_test->get_item_by_id($id)
		]);
	}

	public function delete($id)
	{
		$this->tb_test->delete_item($id);
		redirect(base_url('/'));
	}


	private function save_item() 
	{
		$this->load->library('form_validation');
		$input = $this->input->post();
		
		if(!empty($input)) {
			$this->form_validation->set_rules('name', 'ชื่อ', 'required');
			if($this->form_validation->run())
			{
				if(empty($input['id']))
				{
					// สร้างข้อมูลใหม่
					$this->tb_test->create_item($input);
				}
				else 
				{
					// แก้ไขข้อมูล
					$this->tb_test->update_item($input['id'], $input);
				}
	
				redirect(base_url('/'));
			}
		}
	}
}
