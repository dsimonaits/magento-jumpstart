<?php
/**
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 * @author info@magebit.com
 * @license GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Magebit\FirstLayout\ViewModel;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class ProductViewModel implements ArgumentInterface
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProductBySku(string $sku): ?ProductInterface
    {
       try {
            return $this->productRepository->get($sku);
       }
       catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
           return null;
           }
    }
}
