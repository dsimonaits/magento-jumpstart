<?php
namespace Magebit\Faq\Model\Question\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    public function toOptionArray(): array
    {
        $options = [
            ['value' => 1, 'label' => 'Enabled'],
            ['value' => 0, 'label' => 'Disabled'],
        ];

        // Log the options array to var/log/system.log
        \Magento\Framework\App\ObjectManager::getInstance()->get(\Psr\Log\LoggerInterface::class)->debug(print_r($options, true));

        return $options;
    }
}
