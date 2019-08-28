<h1>Listado de artículos</h1>
<p>Estos son los últimos artículos publicados.</p>
<?php
foreach ($Articulos as $articulo)
		{

			echo '<p>';
   			echo '<a href="' . site_url('/articulos_plantilla/muestra/' . $articulo['id']) . '">' . $articulo['titulo'] . '</a>';
   			echo '</p>';
		    
		}
?> 

