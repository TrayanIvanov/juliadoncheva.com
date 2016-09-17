<!DOCTYPE html>
<html>
<head>
	<title><?=$SeoTitle?></title>

	<meta name="Keywords" content="<?=$SeoKeywords?>" />
	<meta name="Description" content="<?=$SeoDescription?>" />

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="Generator" content="EditPlus" />
	<meta name="robots" content="index, follow, all" />

	<meta name="Revisit-After" content="5 days" /> 
	<meta name="author" content="Trayan Ivanov" />

	<meta property="og:title" content="<?=$ogTitle?>" />
	<meta property="og:description" content="<?=$ogDescription?>" />
	<meta property="og:image" content="<?=$ogImage?>" />
	<meta property="og:url" content="<?=$ogUrl?>" />

	<link rel="shortcut icon" href="favicon.ico" />

	<link rel="stylesheet" href="css/default.css" />
		
	<script src="js/jquery-1.9.1.min.js"></script>

	<link href='http://fonts.googleapis.com/css?family=Didact+Gothic&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	
	<script src='https://www.google.com/recaptcha/api.js'></script>

	<?php
		if($Page == 4)
		{
		?>
			<script src="js/jquery.fancybox.js"></script>
			<script>
				$(document).ready(function() {
					$("a.fancybox").fancybox({
						'nextEffect'	:	'fade',
						'prevEffect'	:	'fade',
						'openSpeed'		:	600, 
						'closeSpeed'	:	200,
						helpers : {
							title : {
								type : 'over'
							}
						}
					});
				});
			</script>
		<?php
		}
	?>
</head>
