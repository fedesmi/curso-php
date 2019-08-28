<?php 
foreach ($detalleArticulo as $articulo)
	{
		echo '<h1>'.$articulo['titulo'].'</h1>'; 
		echo '<blockquote><b>'.$articulo['descripcion'].'</b></blockquote>';
		echo nl2br($articulo['cuerpo']);
		echo '<p><a href="' . site_url('/articulos_plantilla') . '">Volver</a></p>';
   
	}
?>

