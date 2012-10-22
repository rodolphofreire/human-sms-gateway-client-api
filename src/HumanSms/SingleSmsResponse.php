<?php

namespace HumanSms;

class SingleSmsResponse
{
    protected $hasError;
    
    protected $returnCode;
    
    protected $returnMessage;
    
    public function __construct($returnCode, $returnMessage) {
        $this->setReturnCode($returnCode);
        $this->setReturnMessage($returnMessage);
    }

    public function getHasError()
    {
        return $this->hasError;
    }

    public function setHasError($hasError)
    {
        $this->hasError = $hasError;
    }

    public function getReturnCode()
    {
        return $this->returnCode;
    }

    public function setReturnCode($returnCode)
    {
        $this->returnCode = $returnCode;
        if ($returnCode == 0) {
            $this->hasError = false;
        } else {
            $this->hasError = true;
        }
    }

    public function getReturnMessage()
    {
        return $this->returnMessage;
    }

    public function setReturnMessage($returnMessage)
    {
        $this->returnMessage = $returnMessage;
    }


}
