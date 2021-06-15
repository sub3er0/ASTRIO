<?php
namespace Astrio\TrainingModule1\Observer;

use Magento\Framework\Event\ObserverInterface;

class Task2Observer implements ObserverInterface
{
    private $logger;
    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
        // Observer initialization code...
        // You can use dependency injection to get any class this observer may need.
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        // Observer execution code...
        $request = $observer->getData('request');
        $this->logger->info("pathInfo = " . $request->getPathInfo());
    }
}
