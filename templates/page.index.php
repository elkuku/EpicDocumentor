<?php
/**
 * User: elkuku
 * Date: 21.12.13
 * Time: 17:40
 */

$basePath = $this->uri->base->path . 'vendor/epiceditor/epiceditor';
?>
<h1>EpicDocumentor</h1>

<h2><?= $this->project ?> - <?= $this->page ?></h2>

<textarea id="eeditor" style="display: none"><?= $this->item ?></textarea>
<div id="epiceditor"></div>

<script src="<?= $basePath ?>/js/epiceditor.js"></script>

<script>
	jQuery(document).ready(function () {

		var opts = {
			basePath : '<?= $basePath ?>',
			container: 'epiceditor',
			textarea : 'eeditor'
		};

		var editor = new EpicEditor(opts).load();
	});
</script>