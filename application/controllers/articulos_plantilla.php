<?php 
class Articulos_plantilla extends CI_Controller {
   function index(){
      
      //cargo el helper de url, con funciones para trabajo con URL del sitio
      $this->load->helper('url');
      
      //cargo el modelo de artículos
      $this->load->model('Articulo_model');
      
      //pido los ultimos artículos al modelo
	  $datos['Articulos'] = $this->Articulo_model->dame_ultimos_articulos();
      
      
      //cargo la vista pasando los datos de configuacion. el tercer parametro que por defecto es false hace que los datos de la vista 		      //sean enviados al navegador, si lo seteamos en true la vista hace un return de la misma
      $datos_plantilla["cuerpo"] = $this->load->view('listado_articulos', $datos, true);
      $datos_plantilla["titulo"] = "Portada de la aplicación de artículos";
      
      $this->load->view('plantilla_articulo', $datos_plantilla);
   }
   
   function muestra($id){
      //cargo el helper de url, con funciones para trabajo con URL del sitio
      $this->load->helper('url');
      
      //cargo el modelo de artículos
      $this->load->model('Articulo_model');
      
      //pido al modelo el artículo que se desea ver
      $datos['detalleArticulo'] = $this->Articulo_model->dame_articulo($id);
      
      //compruebo si he recibido un artículo
      if (!$datos['detalleArticulo']){
         //no he recibido ningún artículo
         //voy a lanzar un error 404 de página no encontrada
         show_404();
      }else{
         //he encontrado el artículo
         //muestro la vista de la página de mostrar un artículo pasando los datos del array del artículo
         $datos_plantilla["cuerpo"] = $this->load->view('cuerpo_articulo', $datos, true);
         
         $this->load->view('plantilla_articulo', $datos_plantilla);
      }
   }
   
}
?> 