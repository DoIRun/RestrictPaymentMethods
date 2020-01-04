<?php
 namespace DoIRun\RestrictPaymentMethods\Plugin\Payment\Method\Checkmo;

 use Magento\Customer\Model\Session as CustomerSession;
 use Magento\Backend\Model\Auth\Session as BackendSession;
 use Magento\OfflinePayments\Model\Checkmo;

 class Available
 {
     protected $customerSession;

     protected $backendSession;

     public function __construct(
        CustomerSession $customerSession,
        BackendSession $backendSession
     ) {
        $this->customerSession = $customerSession;
         $this->backendSession = $backendSession;
     }

     public function afterIsAvailable(Checkmo $subject, $result)
     {
         if ($this->backendSession->isLoggedIn()) {
             return $result;
         }
         else {
             return false;
         }
     }
 }