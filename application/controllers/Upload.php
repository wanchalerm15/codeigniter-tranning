<?php

class Upload extends CI_Controller {

    public function index()
    {
        $this->load->view('upload');
    }

    public function upload_file()
    {
        $upload_path = APPPATH . 'uploads';
        if(!file_exists($upload_path)) mkdir($upload_path);
        if(!$_FILES) redirect(base_url('upload'));
        $this->load->library('upload', [
            'upload_path' => $upload_path,
            'allowed_types' => 'jpg'
        ]);
        if($this->upload->do_upload('file')) 
        {
            return $this->load->view('upload', [
                'data' => $this->upload->data()
            ]);
        }
        return $this->load->view('upload', [
            'error' => $this->upload->display_errors()
        ]);
    }
}