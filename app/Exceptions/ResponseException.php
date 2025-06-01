<?php

namespace App\Exceptions;

use Exception;

class ResponseException extends Exception
{
    public const STATUS_SUCCESS = 'success';
    public const STATUS_ERROR = 'error';
    public const STATUS_WARNING = 'warning';
    public const STATUS_INFO = 'info';

    public const HTTP_OK = 200;
    public const HTTP_CREATED = 201;
    public const HTTP_ACCEPTED = 202;
    public const HTTP_BAD_REQUEST = 400;
    public const HTTP_UNAUTHORIZED = 401;
    public const HTTP_FORBIDDEN = 403;
    public const HTTP_NOT_FOUND = 404;
    public const HTTP_UNPROCESSABLE_ENTITY = 422;
    public const HTTP_SERVER_ERROR = 500;

    protected $status = self::STATUS_ERROR;
    protected $responseMessage;
    protected $redirectUrl;
    protected $data;
    protected $statusCode;

    public function __construct(
        $message = '', 
        $statusCode = self::HTTP_BAD_REQUEST, 
        $status = self::STATUS_ERROR, 
        $redirectUrl = null, 
        $data = null
    ) {
        parent::__construct($message);
        
        $this->responseMessage = $message;
        $this->status = $status;
        $this->redirectUrl = $redirectUrl;
        $this->data = $data;
        $this->statusCode = $statusCode;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getResponseMessage()
    {
        return $this->responseMessage;
    }

    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }
} 