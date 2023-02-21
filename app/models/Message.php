<?php
namespace app\models;

class Message extends \app\core\Model {
	public $message_id;
	public $sender;
	public $receiver;
	public $message;
	public $timestamp;

	public function insert() {
		# the data we want to insert
		$SQL = "INSERT INTO message (message,sender,receiver) value (:message,:sender,:receiver)";

		$STH = $this->connection->prepare($SQL);
		$data = ['sender'=>$this->sender,
		 		'receiver'=>$this->receiver,
		 		'message'=>$this->message];
		$STH->execute($data);

		$this->message_id = $this->connection->lastInsertId();
		//TODO: if needed ge the timestamp
	}

	public function getAllForUser($user_id) {
		# the data we want to insert
		$SQL = "SELECT * FROM message WHERE sender=:sender OR receiver=:receiver";

		$STH = $this->connection->prepare($SQL);
		$data = ['receiver'=>$user_id, 'sender'->$user_id];

		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Message');
		return $STH->fetchAll();

	public function delete($message_id, $user_id) {
		//TODO: only allow this operation as a receiver
		$SQL = "DELETE FROM message WHERE message_id=:message_id AND :receiver";
		$STH = $this->connection->prepare($SQL);
		$data = ['message_id'=>$message_id, 'receiver'=>$user_id];
		$STH->execute($data);
	}

		


}