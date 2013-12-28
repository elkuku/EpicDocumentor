<?php
/**
 * User: elkuku
 * Date: 21.12.13
 * Time: 17:40
 */

?>
<h1><?= $this->project ?></h1>

<p>
	<a class="btn btn-success" href="<?= $this->uri->base->path . 'epicdoc/' . $this->project ?>/new">New Page</a>
	<a class="btn btn-warning" href="<?= $this->uri->base->path . 'epicdoc/' . $this->project ?>/edit">Edit Project</a>
</p>

<?php if (!$this->pages) : ?>
	<div class="alert alert-warning">No pages found in project.</div>
<?php else : ?>

	<ul class="list-unstyled">
		<?php foreach ($this->pages as $page) : ?>
			<li>
				<a href="<?= $this->uri->base->path . 'epicdoc/' . $this->project . '/' . $page ?>">
					<?= $page ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>

<?php endif ?>
