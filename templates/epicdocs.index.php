<?php
/**
 * User: elkuku
 * Date: 21.12.13
 * Time: 17:40
 */

?>
<h1>EpicDocumentor</h1>

<h2><?= $this->project ?></h2>

<ul>
<?php foreach ($this->items as $item) : ?>
	<li>
		<a href="<?= $this->uri->base->path . 'epicdoc/' . $this->project . '/' . $item ?>">
			<?= $item ?>
		</a>
	</li>
<?php endforeach; ?>
</ul>
