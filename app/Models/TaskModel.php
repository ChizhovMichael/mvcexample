<?php
namespace App\Models;
/**
 * 
 */
class TaskModel extends Model
{
	
	public $file;
	
	public function __construct()
	{
		$this->file = $_SERVER["DOCUMENT_ROOT"] . "/tasks.dat";
	}

	public function gettasks($id = null) 
	{		
		if (!file_exists($this->file)) return [];
		
	    $result = unserialize(file_get_contents($this->file)); 
	    if ($id || $id == '0') {
	    	$result = $result[$id];
	    }
	    return @$result;
	}

	public function addtask($param) 
	{
		$tasks = $this->gettasks();
		$param['status'] = 'off';
		$param['edit'] = 'no';
		$tasks[] = $param;
		$result = file_put_contents($this->file, serialize($tasks));
		return $result;
	}

	public function editStatus($id)
	{
		$tasks = $this->gettasks();
		$tasks[$id]['status'] = 'on';
		$result = file_put_contents($this->file, serialize($tasks));
		return $result;
	}

	public function editSingleTask($request) 
	{
		$tasks = $this->gettasks();

		$percname = strcmp($tasks[$request['id']]['name'], $request['name']);
		$percemail = strcmp($tasks[$request['id']]['email'], $request['email']);
		$percdescription = strcmp($tasks[$request['id']]['description'], $request['description']);

		if ($percname != 0 ||
			$percemail != 0  ||
			$percdescription != 0) {
			$tasks[$request['id']]['name'] = $request['name'];
			$tasks[$request['id']]['email'] = $request['email'];
			$tasks[$request['id']]['description'] = $request['description'];
			$tasks[$request['id']]['edit'] = 'yes';
		}

		$result = file_put_contents($this->file, serialize($tasks));

		return $result;

	}
}