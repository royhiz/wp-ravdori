<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="<?php echo TEMPLATE; ?>/images/general/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="<?php echo TEMPLATE; ?>/images/general/favicon.ico" type="image/x-icon">

<!-- Facebook Open Graph API -->
<meta property="fb:app_id" content="666465286777871"/>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<title><?php wp_title(' | ', true, 'left'); ?></title>

<!-- Google Fonts -->
<?php
	global $google_fonts;
	
	if ($google_fonts) : foreach ($google_fonts as $key => $val) :
		printf ("<link href='%s' rel='stylesheet'>", $val);
	endforeach; endif;
?>