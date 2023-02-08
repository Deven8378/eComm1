<?php $this->view('shared/header','List of clients'); ?>
<a href='/Client/create'> Create a new client</a>
<table>
		<tr><th> First Name </th> <th> Last Name </th> <th> Middle Name </th> <th> actions </th> </tr>
<?php
//$data is an array of client objects
foreach ($data as $client) { ?>

	<tr> <td> <?= htmlentities($client->first_name) ?> </td>
		<td> <?= htmlentities($client->last_name) ?> </td>
		<td> <?= htmlentities($clien->middle_name) ?> </td>
	 <td> <a href='/Client/delete/<?=$client->client_id?>'> delete </a> </td> </tr>
<?php
}
?>

</table>
<?php $this->view('shared/footer'); ?>