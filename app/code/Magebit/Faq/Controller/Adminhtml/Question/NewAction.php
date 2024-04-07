<?php
/**
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 * @author info@magebit.com
 * @license GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Magebit\Faq\Controller\Adminhtml\Question;

class NewAction extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Magebit_Faq::manage';

    public function execute()
    {
        $this->_forward('edit');
    }
}
