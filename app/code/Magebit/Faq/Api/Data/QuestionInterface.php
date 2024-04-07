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

/**
 * Interface for the FAQ question data.
 */
interface QuestionInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ID         = 'id';
    const QUESTION   = 'question';
    const ANSWER     = 'answer';
    const STATUS     = 'status';
    const POSITION   = 'position';
    const UPDATED_AT = 'updated_at';
    /**#@-*/

    /**
     * Constants for status values.
     */
    const STATUS_ENABLED  = 1;
    const STATUS_DISABLED = 0;

    /**
     * Get ID
     *
     * @return int|null Unique identifier for the FAQ entry (null if not saved yet).
     */
    public function getId();

    /**
     * Get question text
     *
     * @return string
     */
    public function getQuestion();

    /**
     * Set question text
     *
     * @param string $question
     * @return $this
     */
    public function setQuestion($question);

    /**
     * Get answer text
     *
     * @return string
     */
    public function getAnswer();

    /**
     * Set answer text
     *
     * @param string $answer
     * @return $this
     */
    public function setAnswer($answer);

    /**
     * Get the status
     *
     * @return int Status of the FAQ entry (e.g., enabled or disabled).
     */
    public function getStatus();

    /**
     * Set the status
     *
     * @param int $status
     * @return $this
     */
    public function setStatus($status);

    /**
     * Get the position
     *
     * @return int
     */
    public function getPosition();

    /**
     * Set the position
     *
     * @param int $position Position of FAQ entry in the list.
     * @return $this
     */
    public function setPosition($position);

    /**
     * Get update timestamp
     *
     * @return string|null Timestamp of the last update.
     */
    public function getUpdatedAt();
}
