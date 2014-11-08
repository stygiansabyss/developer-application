<?php

class ApplicationController extends BaseController {

	public function getIndex()
	{
		return Redirect::route('app.submit');
	}

	public function getSubmit()
	{
		return View::make('submit');
	}

	public function postSubmit()
	{
		
	}

}
