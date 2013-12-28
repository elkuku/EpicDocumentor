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

	<link rel="stylesheet/less" type="text/css" href="<?= $this->uri->base->path ?>custom/epicdoc/css/styles.less">
	<link rel="stylesheet/less" type="text/css" href="<?= $this->uri->base->path ?>custom/epicdoc/css/template.css">
	<link rel="stylesheet" type="text/css"
	      href="<?= $this->uri->base->path ?>vendor/font-awesome/css/font-awesome<?= $this->debugMedia ? '' : '.min' ?>.css">

	<script src="<?= $this->uri->base->path ?>vendor/jquery/jquery<?= $this->debugMedia ? '' : '.min' ?>.js"></script>

	<script src="<?= $this->uri->base->path ?>vendor/bootstrap/js/collapse.js"></script>
	<script src="<?= $this->uri->base->path ?>vendor/bootstrap/js/dropdown.js"></script>
	<script src="<?= $this->uri->base->path ?>vendor/bootstrap/js/tab.js"></script>
	<script src="<?= $this->uri->base->path ?>vendor/bootstrap/js/tooltip.js"></script>
	<script src="<?= $this->uri->base->path ?>vendor/less/dist/less-1.5.0<?= $this->debugMedia ? '' : '.min' ?>.js"></script>

	<script src="<?= $this->uri->base->path ?>custom/epicdoc/js/epicdoc<?= $this->debugMedia ? '' : '.min' ?>.js"></script>

	<script type="text/javascript">jQuery('.hasTooltip').tooltip();</script>
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

<div class="footer center">
	<div class="container">
		<!--{% block footer %}-->
		<div class=" footer-menu">
		</div>
		<!--{% endblock %}-->
	</div>
</div>


</body>
</html>
