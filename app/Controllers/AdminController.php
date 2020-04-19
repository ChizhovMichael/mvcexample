<?php
namespace App\Controllers;
use App\Models\TaskModel as Tasks;
use Rakit\Validation\Validator;
/**
 * 
 */
class AdminController extends Controller
{
	
	public function __construct()
	{
		//
	}

	public function index()
	{
		$tasks = new Tasks;
		$tasks = $tasks->gettasks();
		krsort($tasks);

		return $this->printView('admin', [
			'tasks'		=> $tasks
		]);
	}

	public function successTask($id)
	{
		$tasks = new Tasks;
		$tasks->editStatus($id);

		return header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function editTaskPage($id)
	{
		
		$tasks = new Tasks;
		$task = $tasks->gettasks($id);

		return $this->printView('single', [
			'task'		=> $task,
			'id'		=> $id
		]);
	}

	public function editTask($request)
	{
		$validator = new Validator;
		$validation = $validator->validate($request, [
		    'name'			=> 'required',
		    'email'			=> 'required|email',
		    'description'	=> 'required',
		]);


		if ($validation->fails()) {
			$errors = $validation->errors();
			$_SESSION['errors'] = $errors->firstOfAll();
			return header('Location: ' . $_SERVER['HTTP_REFERER']);			
		} else {
			$tasks = new Tasks;
			$tasks->editSingleTask($request);
			return header('Location: /admin');
		}

		
	}
}