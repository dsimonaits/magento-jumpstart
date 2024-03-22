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

interface QuestionManagementInterface
{
    public function enableQuestion(QuestionInterface $question);
    public function disableQuestion(QuestionInterface $question);
}
