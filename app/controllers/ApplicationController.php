<?php

class ApplicationController extends BaseController {

	public function index()
	{
		return Redirect::route('app.submit');
	}

	public function submit()
	{
		return View::make('submit')->withInfo(Session::get('info'))->withError(Session::get('error'));
	}

	public function handleSubmit()
	{
		$data = array_merge(
			Input::input(), 
			$this->fileDetails('cover_letter'), 
			$this->fileDetails('resume')
			);

		$client = new Guzzle\Http\Client(Config::get('remote.submit-domain'));
		$request = $client->post('submit', [], $data);
		$response = $request->send();
		if ($response->isSuccessful()) {
			return Redirect::route('app.submit')->withInfo('You have successfully submitted.');
		}
		else {
			return Redirect::route('app.submit')->withError('Your submission failed - try again, good luck.');
		}
	}

	/* PRIVATE */

	private function fileDetails($name)
	{
		if (Input::hasFile($name)) {
			$file = Input::file($name);
			return [
				$name => '@'.$file->getPathname(),
				$name.'_filename' => $file->getClientOriginalName()
				];
		}
		return [];
	}

}
