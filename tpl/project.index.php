<?php
/**
 * User: elkuku
 * Date: 21.12.13
 * Time: 17:40
 */

?>
<h1>EpicDocumentor</h1>

<h2>
	<?= $this->project
		? 'Edit Project ' . '<a href="' . $this->uri->base->path . 'epicdoc/' . $this->project . '">' . $this->project . '</a>'
		: 'New Project' ?>
</h2>

<form method="post" action="<?= $this->uri->base->path ?>epicdoc/save" role="form">
	<p>
		<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
	</p>

	<div class="form-group">
		<label for="name">Name</label>
		<input id="name" type="text" name="name" value="<?= $this->project ?>" class="form-control">
		<input type="hidden" name="old_name" value="<?= $this->project ?>">
	</div>


</form>
