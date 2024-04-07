<?php
/**
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 * @author info@magebit.com
 * @license GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Magebit\Faq\Model;

use Magento\Framework\Model\AbstractModel;
use Magebit\Faq\Api\Data\QuestionInterface;
use Magebit\Faq\Model\ResourceModel\Question as QuestionResource;

/**
 * Class Question
 *
 * @package Magebit\Faq\Model
 */
class Question extends AbstractModel implements QuestionInterface
{
    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init(QuestionResource::class);
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function getQuestion()
    {
        return $this->getData(self::QUESTION);
    }

    public function setQuestion($question)
    {
        return $this->setData(self::QUESTION, $question);
    }

    public function getAnswer()
    {
        return $this->getData(self::ANSWER);
    }

    public function setAnswer($answer)
    {
        return $this->setData(self::ANSWER, $answer);
    }

    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    public function getPosition()
    {
        return $this->getData(self::POSITION);
    }

    public function setPosition($position)
    {
        return $this->setData(self::POSITION, $position);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }
}
