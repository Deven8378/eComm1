<?php $this->view('shared/header', 'Greetings Page' . $data); ?>

	Hi<?= $data ?>!<br>
	Hi <?php echo $data; ?>!<br>
	<?php $this->view('shared/footer'); ?>