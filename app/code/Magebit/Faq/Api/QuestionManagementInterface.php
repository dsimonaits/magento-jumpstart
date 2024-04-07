<?php
/**
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 * @author info@magebit.com
 * @license GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Magebit\Faq\Api;

use Magebit\Faq\Api\Data\QuestionInterface;

/**
 * Interface QuestionManagementInterface
 *
 * @api
 */
interface QuestionManagementInterface
{
    /**
     * Enable a question.
     *
     * @param QuestionInterface $question
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function enableQuestion(QuestionInterface $question);

    /**
     * Disable a question.
     *
     * @param QuestionInterface $question
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function disableQuestion(QuestionInterface $question);
}
