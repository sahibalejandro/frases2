<?php
Response::macro('api', function ($data = null, $message = '', $success = true) {
	return Response::json([
		'success' => $success,
		'message' => $message,
		'data'    => $data,
	]);
});