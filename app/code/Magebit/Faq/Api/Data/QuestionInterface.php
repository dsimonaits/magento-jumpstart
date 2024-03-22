<?php
/**
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 * @author info@magebit.com
 * @license GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Magebit\Faq\Api\Data;

interface QuestionInterface
{
    const ID = 'id';
    const QUESTION = 'question';
    const ANSWER = 'answer';
    const STATUS = 'status';
    const POSITION = 'position';
    const UPDATED_AT = 'updated_at';

    public function getId();
    public function getQuestion();
    public function setQuestion($question);
    public function getAnswer();
    public function setAnswer($answer);
    public function getStatus();
    public function setStatus($status);
    public function getPosition();
    public function setPosition($position);
    public function getUpdatedAt();
}
