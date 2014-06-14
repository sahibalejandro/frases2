<?php
/**
 * Generit REST API response
 */
Response::macro('api', function ($data = null, $message = '', $success = true)
{
	return Response::json([
		'success' => $success,
		'message' => $message,
		'data'    => $data,
	]);
});

/**
 * Resource not found
 */
Response::macro('apiNotFound', function ()
{
    return Response::api(['code' => 404], 'Resource not found.', false);
});

/**
 * Validation errors
 */
Response::macro('apiValidationErrors', function ($errors, $message)
{
    return Response::api(['errors' => $errors], $message, false);
});

/**
 * Resource deleted succesfully
 */
Response::macro('apiDeleted', function ()
{
    return Response::api(null, 'Resource deleted.');
});

/**
 * User account is blocked
 */
Response::macro('apiUserAccountBlocked', function ()
{
    return Response::api(null, 'This user account is blocked.', false);
});
