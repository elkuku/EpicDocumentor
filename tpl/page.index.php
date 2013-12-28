<?php
/**
 * User: elkuku
 * Date: 21.12.13
 * Time: 17:40
 */

$basePath    = $this->uri->base->path . 'vendor/epiceditor/epiceditor';
$projectPath = $this->uri->base->path . 'epicdoc/' . $this->project;

?>

<h1><a href="<?= $projectPath ?>"><?= $this->project ?></a><?= $this->page ? ' - ' . $this->page : ' New Page' ?></h1>

<form method="post" action="<?= $projectPath . '/save' ?>">
	<div class="form-group">
		<button type="submit" class="btn btn-success">Save</button>
	</div>

	<div class="form-group">
		<label for="page">Title</label>
		<input type="text" name="page" id="page" value="<?= $this->page ?>" class="form-control">
		<input type="hidden" name="old_page" value="<?= $this->page ?>">
	</div>

	<div class="form-group">
		<label for="text">Text</label>
		<textarea id="eeditor" name="text" id="text"
		          style="display: none; height: 100%;"><?= $this->item ? : 'New Page' ?></textarea>

		<div id="epiceditor" style="height: 100%; min-height: 400px;"></div>
	</div>

	<input type="hidden" name="project" value="<?= $this->project ?>"/>
</form>

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
