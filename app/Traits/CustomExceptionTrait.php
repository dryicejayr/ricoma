<?php

namespace App\Traits;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use App\Exceptions\NoContentException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use Exception;

trait CustomExceptionTrait {

    public function apiException($request, Exception $exception){
        $errors = $exception->getMessage();
        
        if($this->isModel($exception)){
            return $this->ModelResponse($errors);
        }
        if($this->isNotFound($exception)){
            $errors = "Endpoint not found.";
            return $this->NotFoundResponse($errors);
        }
        if($this->isFormValidation($exception)){
            $errors = $exception->errors();
            return $this->FormValidationResponse(collect($errors)->flatten());
        }
        if($this->isMethodNotAllowed($exception)){
            $errors = "Method Not Allowed.";
            return $this->MethodNotAllowedResponse($errors);
        }
        if($this->isNoContent($exception)){
            return $this->NoContentResponse($errors);
        }
        if($this->isTokenInvalid($exception)){
            return $this->TokenInvalidResponse($errors);
        }
        if($this->isTokenExpired($exception)){
            return $this->TokenExpiredResponse($errors);
        }
        if($this->isTokenNotFound($exception)){
            return $this->TokenNotFoundResponse($errors);
        }
        if($this->isQueryException($exception)){
            $errors = "Bad Request.";
            return $this->QueryResponse($errors);
        }
        if($this->isGeneralException($exception)){
            return $this->GeneralResponse($errors);
        }

        return parent::render($request, $exception);
    }

    /*
    * Model Not Found Exception
    */
    public function isGeneralException($exception){
        return $exception instanceof Exception;
    }

    public function GeneralResponse($errors){
        return MessageResponse($errors, Response::HTTP_BAD_REQUEST);
    }

    /*
    * Model Not Found Exception
    */
    public function isModel($exception){
        return $exception instanceof ModelNotFoundException;
    }

    public function ModelResponse($errors){
        return MessageResponse($errors, Response::HTTP_NOT_FOUND);
    }

    /*
    * Endpoint Not Found Exception
    */
    public function isNotFound($exception){
        return $exception instanceof NotFoundHttpException;
    }

    public function NotFoundResponse($errors){
        return MessageResponse($errors, Response::HTTP_NOT_FOUND);
    }

    /*
    * Form Validation Exception
    */
    public function isFormValidation($exception){
        return $exception instanceof ValidationException;
    }

    public function FormValidationResponse($errors){
        return MessageResponse($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /*
    * Form Validation Exception
    */
    public function isMethodNotAllowed($exception){
        return $exception instanceof MethodNotAllowedHttpException;
    }

    public function MethodNotAllowedResponse($errors){
        return MessageResponse($errors, Response::HTTP_METHOD_NOT_ALLOWED);
    }

    /*
    * No Content Exception
    */
    public function isNoContent($exception){
        return $exception instanceof NoContentException;
    }

    public function NoContentResponse($errors){
        return MessageResponse($errors, Response::HTTP_NO_CONTENT);
    }

    /*
    * Token Invalid Exception
    */
    public function isTokenInvalid($exception){
        return $exception instanceof TokenInvalidException;
    }

    public function TokenInvalidResponse($errors){
        return MessageResponse($errors, Response::HTTP_UNAUTHORIZED);
    }

    /*
    * Token Expired Exception
    */
    public function isTokenExpired($exception){
        return $exception instanceof TokenExpiredException;
    }

    public function TokenExpiredResponse($errors){
        return MessageResponse($errors, Response::HTTP_UNAUTHORIZED);
    }

    /*
    * Token Not Found Exception
    */
    public function isTokenNotFound($exception){
        return $exception instanceof JWTException;
    }

    public function TokenNotFoundResponse($errors){
        return MessageResponse($errors, Response::HTTP_UNAUTHORIZED);
    }

    /*
    * Database Query Exception
    */
    public function isQueryException($exception){
        return $exception instanceof QueryException;
    }

    public function QueryResponse($errors){
        return MessageResponse($errors, Response::HTTP_BAD_REQUEST);
    }
}