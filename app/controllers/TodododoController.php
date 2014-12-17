<?php

// app/controllers/TodododoController.php

class TodododoController extends BaseController
{
	public function __construct()
	{
		// Call the BaseController construct for CSRF filter
		parent::__construct();
	}

	public function Index()
	{
		// Display the landing page
		return View::make('index');
	}

	public function create()
	{
		// Display the create form
		return View::make('create');
	}

	public function manageCreate()
	{
		// Manage create form
	}

	public function edit(Task $task)
	{
		// Display the edit form
		return View::make('edit');
	}

	public function manageEdit()
	{
		// Manage the edit form
	}

	public function delete()
	{
		// Display the delete form
		return View::make('delete');
	}

	public function manageDelete()
	{
		// Manage the delete form
	}
}
