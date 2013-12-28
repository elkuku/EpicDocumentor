<?php
/**
 * User: elkuku
 * Date: 21.12.13
 * Time: 17:40
 */

?>
<h1>EpicDocumentor</h1>

<h2>Projects</h2>

<p>
	<a class="btn btn-success" href="<?= $this->uri->base->path ?>epicdoc/new">New Project</a>
</p>

<?php if (!$this->projects) : ?>
	<div class="alert alert-warning">No projects found!</div>
<?php else : ?>
	<div class="well">

		<ul class="list-unstyled">
			<?php foreach ($this->projects as $project) : ?>
				<li>
					<a href="<?= $this->uri->base->path . 'epicdoc/' . $project ?>">
						<?= $project ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>

	</div>
<?php endif ?>
