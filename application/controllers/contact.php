<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        //se carga la libreria de vailidacion
        $this->load->library('form_validation');
    }
    
    public function index(){
        $data = $formData = array();
        
        // si la consulta es emitida
        if($this->input->post('contactSubmit')){
            
            // obtiene los datos del formulario
            $formData = $this->input->post();
            
            // reglas de validacion
            $this->form_validation->set_rules('name', 'Nombre', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('subject', 'Motivo', 'required');
            $this->form_validation->set_rules('message', 'Mensaje', 'required');
            $this->form_validation->set_message('required', 'El %s es obligatorio');
            
            // si los datos son validos
            if($this->form_validation->run() == true){
                
                // definir los datos del email
                $mailData = array(
                    'name' => $formData['name'],
                    'email' => $formData['email'],
                    'subject' => $formData['subject'],
                    'message' => $formData['message']
                );
                
                // Enviar el email
                $send = $this->sendEmail($mailData);
                
                // verifica el estado del envio
                if($send){
                    // elimina los datos el formulario
                    $formData = array();
                    
                    $data['status'] = array(
                        'type' => 'success',
                        'msg' => 'Su mensaje fue enviado exitosamente.'
                    );
                }else{
                    $data['status'] = array(
                        'type' => 'error',
                        'msg' => 'Algun error ha ocurrido, por favor intentelo nuevamente.'
                    );
                }
            }
        }
        
        // envia los datos POST a la vista
        $data['postData'] = $formData;
        
        // pasa los datos a la vista
        $this->load->view('contacto', $data);
    }
    
    private function sendEmail($mailData){
        // se carga la libreria email
        $this->load->library('email');
        
        // configuracion 
        $to = 'fedesmi@gmail.com';
        $from = 'fedesmi@gmail.com';
        $fromName = 'Federico';
        $mailSubject = 'Mensaje de contacto de '.$mailData['name'];
        
        // contenido del email
        $mailContent = '
            <h2>Contact Request Submitted</h2>
            <p><b>Name: </b>'.$mailData['name'].'</p>
            <p><b>Email: </b>'.$mailData['email'].'</p>
            <p><b>Subject: </b>'.$mailData['subject'].'</p>
            <p><b>Message: </b>'.$mailData['message'].'</p>
        ';
            
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($to);
        $this->email->from($from, $fromName);
        $this->email->subject($mailSubject);
        $this->email->message($mailContent);
        
        // envia el email y devuelve el estado
        return $this->email->send()?true:false;
    }
    
}