<?php

class ApplicationController extends BaseController {

	public function getIndex()
	{
		return Redirect::route('app.submit');
	}

	public function getSubmit()
	{
		return View::make('submit')->withInfo(Session::get('info'))->withError(Session::get('error'));
	}

	public function postSubmit()
	{
		$data = Input::input();
		if (Input::hasFile('resume')) {
			$data['resume'] = '@'.Input::file('resume')->getPathname();
		}

		$client = new Guzzle\Http\Client('http://localhost:4567');
		$request = $client->post('submit', [], $data);
		$response = $request->send();
		if ($response->isSuccessful()) {
			return Redirect::route('app.submit')->withInfo('You have successfully submitted.');
		}
		else {
			return Redirect::route('app.submit')->withError('Your submission failed - try again, good luck.');
		}
	}

}
