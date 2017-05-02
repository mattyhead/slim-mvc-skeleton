<?php

namespace App\Controllers;

use App\Models\Update;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

/**
 * The user updates Controller Class
 * 
 * @filesource UpdateController.php
 * @author Tlotliso Mafantiri
 */ 
class UpdateController extends Controller
{
	/**
	 * Get all updates
	 * 
	 * @param object $request
	 * @param object $response
	 * @return object $response
	 */ 
	public function getUpdates($request, $response)
	{
		$updates = Update::all();

		$resp['code'] = 200;
		$resp['status'] = 'ok';
		$resp['updates'] = $updates;

		return $response->withStatus(200)
		        ->withHeader("Content-Type", "application/json")
		        ->write(json_encode($resp, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
	}

	/**
	 * Get an update at a specified id
	 * 
	 * @param object $request
	 * @param object $response
	 * @param array $args
	 * @return object $response
	 */ 
	public function getUpdate($request, $response, $args)
	{
		$update = Update::find($args['id']);

		$resp['code'] = 200;
		$resp['status'] = 'ok';
		$resp['updates'] = $update;

		return $response->withStatus(200)
		        ->withHeader("Content-Type", "application/json")
		        ->write(json_encode($resp, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
	}

	/**
	 * Post a new update
	 * 
	 * @param object $request
	 * @param object $response
	 * @return object $response
	 */ 
	public function postUpdate($request, $response)
	{
		$update = Update::create([
			'message' => $request->getParam('message')
		]);

		$resp['code'] = 201;
		$resp['status'] = 'ok';
		$resp['message'] = 'successfully created a new update';
		$resp['update'] = $update;

		return $response->withStatus(201)
		        ->withHeader("Content-Type", "application/json")
		        ->write(json_encode($resp, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
	}
}