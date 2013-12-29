<?php
/**
 * User: elkuku
 * Date: 16.05.13
 * Time: 15:33
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="<?= $this->uri->base->path ?>vendor/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css"
	      href="<?= $this->uri->base->path ?>vendor/bootstrap/dist/css/bootstrap-theme.css">

	<link rel="stylesheet" type="text/css" href="<?= $this->uri->base->path ?>custom/epicdoc/css/template.css">

	<script
		src="<?= $this->uri->base->path ?>vendor/jquery/jquery<?= $this->debugMedia ? '' : '.min' ?>.js"></script>
	<script
		src="<?= $this->uri->base->path ?>vendor/bootstrap/dist/js/bootstrap<?= $this->debugMedia ? '' : '.min' ?>.js"></script>

	<script
		src="<?= $this->uri->base->path ?>custom/epicdoc/js/epicdoc<?= $this->debugMedia ? '' : '.min' ?>.js"></script>

	<title>EpicDocumentor</title>

	<link rel="shortcut icon" href="/favicon.ico">
</head>

<body>

<?php include __DIR__ . '/navbar.php' ?>

<div class="body">
	<div class="container">
		[[component]]
	</div>
</div>

<div class="footer container">
	<a href="https://github.com/elkuku/EpicDocumentor">EpicDocumentor</a> was made in 2013 by <a
		href="https:/>/github.com/elkuku">elkuku</a>
	<code>=;)</code>
</div>

</body>
</html>
