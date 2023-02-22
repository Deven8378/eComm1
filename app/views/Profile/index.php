<?php $this->view('shared/header','Your Profile'); ?>
<dl>

<dt> First Name </dt>
<dd> <?=$data->first_name?> </dd>

<dt> Last Name </dt>
<dd> <?=$data->last?> </dd>	

<dt> Middle Name </dt>
<dd> <?=$data->middle_name?> </dd>

<dl>	


<a href='/Profile/edit'> Edit the Profile </a>
<a href='/User/profile'> Edit the Profile </a>

<?php $this->view('shared/footer'); ?>