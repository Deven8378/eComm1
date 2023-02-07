<?php
namespace app\models;

define('LOG_FILE', 'log.txt');

class UserLog {
	public $name;

	public function insert() {
		//ToDo: lock the file
			$fh = fopen(LOG_FILE, 'a');
			flock($fh, LOCK_EX); //need an exlcusive lock to write
			fwrite($fh, "$this->name has visited!\n");
			fclose($fh); //release resource and the lock
		}
		public function getAll() {
			$contents = file(LOG_FILE);
			return $contents;
		}

		public function delete($LineNumber) {
			//read the file
			$contents = $this->getAll();

			//write the file for each line that does not have this number
			$fh = fopen(LOG_FILE,'w'); //overwrite the file
			flock($fh, LOCK_EX);
			
			foreach ($contents as $lineNum => $entry) {
				if ($lineNum != $LineNumber) {
					fwrite($fh, $entry);
				}
			}
			fclose($fh);
		}
}