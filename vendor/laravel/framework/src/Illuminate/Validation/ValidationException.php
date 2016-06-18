<?php

namespace Illuminate\Validation;

use Exception;

use Yuansir\Toastr\Facades\Toastr;

class ValidationException extends Exception
{
    /**
     * The validator instance.
     *
     * @var \Illuminate\Validation\Validator
     */
    public $validator;

    /**
     * The recommended response to send to the client.
     *
     * @var \Illuminate\Http\Response|null
     */
    public $response;

    /**
     * Create a new exception instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    public function __construct($validator, $response = null)
    {
        parent::__construct('The given data failed to pass validation.');

        $this->response = $response;
        $this->validator = $validator;
        
        if($this->validator){
        	$messages = $this->validator->messages();
        	$html = '';
        	foreach ($messages->all() as $message){
        		$html .= '<li>' . $message . '</li>';
        	}
        	Toastr::error($html,'Alert');
        }
    }

    /**
     * Get the underlying response instance.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getResponse()
    {
        return $this->response;
    }
    
    public function getValidator()
    {
    	return $this->validator;
    }
}
