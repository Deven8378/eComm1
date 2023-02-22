<?php $this->view('shared/header','Register your account'); ?>
User Profile!!!
<a href='/Profile/index'> </a>
<h1> Messages</h1>

<h2> My messages </h2>

<h2> Send a message </h2>
<table> <tr> <th> sender </th> <th> receiver </th> <th> message </th> <th> time </th> <th> actions </th> </tr>
<?php
//display all messages
foreach ($data as $message) {
	echo " <tr>
	<td> $message->sender_name </td>
	 <td> $message->receiver_name </td>
	  <td> $message->message </td>
	   <td> $message->timestamp </td>
	    <td> <a href='/Message/delete/$message->message_id'> DELETE </a> </td>
	     </tr>";
}
?>
</table>

<p> Send a message using the following form </p> 
<form action="/Message/send" method='post'>
	<label> To: <input type="text" name="receiver"> </label>
	<br/>
	<label> Message: <textarea name="message"> </textarea>
		<br/> <input type="submit" name="action" value="Send Message">
</form>

<a href='/User/logout'> Logout</a>

<?php $this->view('shared/footer'); ?>