<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contacto</title>
</head>

<body>

   <div style="color: white; background-color: #212121; padding: 10px 20px; font-size:200%;">
      Formulario de envío de Email
   </div>
  <?php echo '<p><a href="' . site_url('/articulos_plantilla') . '">Volver</a></p>'; ?>

  <div class="content-frm">
    <!-- Muestra el mensaje del estado de envio del mensaje -->
    <?php if(!empty($status)){ ?>
    <div class="status <?php echo $status['type']; ?>"><?php echo $status['msg']; ?></div>
    <?php } ?>
    
    <!-- formulario de contacto -->
    <form action="" method="post">
        <div class="form-cw">
            <h2>Contáctenos<img style="with:30px; height:30px;" src="<?php echo base_url('assets/images/mail.png'); ?>"></h2>
            <div class="clear"></div>
        </div>
        
        <div class="input-group">
            <input type="text" name="name" value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>" placeholder="NOMBRE">
            <?php echo form_error('name','<p class="field-error">','</p>'); ?>
        </div>
        
        <div class="input-group">
            <input type="email" name="email" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" placeholder="EMAIL">
            <?php echo form_error('email','<p class="field-error">','</p>'); ?>
        </div>
        
        <div class="input-group">
            <input type="text" name="subject" value="<?php echo !empty($postData['subject'])?$postData['subject']:''; ?>" placeholder="MOTIVO">
            <?php echo form_error('subject','<p class="field-error">','</p>'); ?>
        </div>
        
        <div class="input-group">
            <textarea name="message" placeholder="SU MENSAJE"><?php echo !empty($postData['message'])?$postData['message']:''; ?></textarea>
            <?php echo form_error('message','<p class="field-error">','</p>'); ?>
        </div>
        
        <input type="submit" name="contactSubmit" class="frm-submit" value="Enviar">
    </form>
</div>
</body>
</html>
