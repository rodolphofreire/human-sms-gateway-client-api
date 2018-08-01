<?php

namespace HumanSms;

class Client
{
    const URL_SINGLE_SMS = 'https://api-http.zenvia.com/GatewayIntegration/msgSms.do';

    protected $account;
    protected $code;

    public function __construct($account, $code)
    {
        $this->account = $account;
        $this->code = $code;
    }

    /**
     * Send a single SMS message
     * 
     * @param type $phoneNumber
     * @param type $message
     * 
     * @return \HumanSms\SingleSmsResponse
     */
    public function sendSingleSms($phoneNumber, $message)
    {
        $singleSmsRequest = new SingleSmsRequest($phoneNumber, $message);
        $singleSmsRequest->setAccount($this->account);
        $singleSmsRequest->setCode($this->code);
        $singleSmsRequest->setTo($phoneNumber);
        $singleSmsRequest->setMsg($message);

        $formRequest = new \Buzz\Message\Form\FormRequest();
        $formRequest->setHost(self::URL_SINGLE_SMS);
        $formRequest->setResource('');
        $formRequest->setFields($singleSmsRequest->getPostParams());

        $formResponse = new \Buzz\Message\Response();

        $httpClient = new \Buzz\Client\FileGetContents();
        $httpClient->send($formRequest, $formResponse);
        $parsedResponse = $this->parseResponse($formResponse->getContent());
        
        return new SingleSmsResponse($parsedResponse['code'], $parsedResponse['message']);
    }
    
    protected function parseResponse($responseContent) {
        $responseParts = explode('-', $responseContent);
        $returnCode = trim($responseParts[0]);
        $returnMessage = trim($responseParts[1]);
        
        return array(
            'code' => $returnCode,
            'message' => $returnMessage
        );
    }

}
