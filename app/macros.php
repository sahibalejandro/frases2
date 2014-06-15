<?php
/**
 * Generit REST API response
 */
use Acme\Validators\InputValidationException;

Response::macro('api', function ($data = null, $message = '', $success = true, $httpCode = 200)
{
	return Response::json([
		'success' => $success,
		'message' => $message,
		'data'    => $data,
	], $httpCode);
});

/**
 * Resource not found
 */
Response::macro('apiNotFound', function ()
{
    return Response::api(null, 'Resource not found.', false, 404);
});

/**
 * Validation errors
 */
Response::macro('apiValidationErrors', function (InputValidationException $e)
{
    return Response::api(['errors' => $e->getValidationErrors()], $e->getMessage(), false);
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
    return Response::api(null, 'This user account is blocked.', false, 401);
});
