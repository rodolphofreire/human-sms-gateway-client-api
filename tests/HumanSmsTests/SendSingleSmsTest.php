<?php

namespace HumanSmsTests;

/**
 * Send Single SMS Test
 *
 * @author ccima
 */
class SendSingleSmsTest extends AbstractTest
{
    public function testSendSingleSms() {
        $apiClient = new \HumanSms\Client(self::HUMAN_ACCOUNT, self::HUMAN_CODE);
        $singleSmsMessageResponse = $apiClient->sendSingleSms(self::TEST_MOBILE_PHONE_NUMBER, 'SMS Test');
        
        $this->assertFalse($singleSmsMessageResponse->getHasError());
        $this->assertEquals('000', $singleSmsMessageResponse->getReturnCode());
    }
    
}
