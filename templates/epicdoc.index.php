<?php
/**
 * User: elkuku
 * Date: 21.12.13
 * Time: 17:40
 */

?>
<h1>EpicDocumentor</h1>

<ul>
<?php foreach ($this->items as $item) : ?>
	<li>
		<a href="<?= $this->uri->base->path . 'epicdoc/' . $item ?>">
			<?= $item ?>
		</a>
	</li>
<?php endforeach; ?>
</ul>
