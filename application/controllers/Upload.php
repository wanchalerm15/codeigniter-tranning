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

    public function upload_multiple_file()
    {
        $upload_path = APPPATH . 'uploads';
        if(!file_exists($upload_path)) mkdir($upload_path);
        if(!$_FILES) redirect(base_url('upload'));
        $this->load->library('upload', [
            'upload_path' => $upload_path,
            'allowed_types' => 'jpg'
        ]);
        $uploads = [];
        $files = $_FILES;
        $count = count($_FILES['file']['name']);
        // วนลูปหาแต่ล่ะไฟล์ อัพโหลด
        for($i = 0; $i < $count; $i++)
        {
            $_FILES['file']['name'] = $files['file']['name'][$i];
            $_FILES['file']['type'] = $files['file']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
            $_FILES['file']['size'] = $files['file']['size'][$i];
            $_FILES['file']['error'] = $files['file']['error'][$i];
            if($this->upload->do_upload('file')) 
            {
                // ถ้าไม่มีข้อผิดพลาด
                $uploads[] = [
                    'error' => false,
                    'file_name' => $this->upload->data()['file_name'],
                    'message' => null
                ];
            }
            else 
            {
                // ถ้าเกิดข้อผิดพลาด
                $uploads[] = [
                    'error' => true,
                    'file_name' => $_FILES['file']['name'],
                    'message' => $this->upload->display_errors('', '')
                ];
            }
        }
        $this->load->view('upload', [
            'uploads' => $uploads
        ]);
    }
}