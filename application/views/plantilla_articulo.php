<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $titulo ?></title>
</head>

<body>

   <div style="color: white; background-color: #212121; padding: 10px 20px; font-size:200%;">
      Artículos de computacion
   </div>
   <div style="padding: 15px;">
      <?php echo $cuerpo ?>
   </div>
   <div style="background-color: #ccc; padding: 10px 20px; font-size:80%;">
   		 <?php echo '<a href="'.site_url('/contact/index').'">  Contacto </a>'; ?>
   </div>
</body>
</html>
