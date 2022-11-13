<?php
namespace Sb\DefaultQty\Ui\DataProvider\Product\Form\Modifier;

use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
use Magento\Catalog\Model\Locator\LocatorInterface;

class SetDefaultQtyModifier extends AbstractModifier
{

    private const DEFAULT_QTY = 40;

    /**
     * @var LocatorInterface
     */
    private LocatorInterface $locator;

    /**
     * Constructor
     *
     * @param LocatorInterface $locator
     */
    public function __construct(
        LocatorInterface $locator
    ) {
        $this->locator = $locator;
    }

    /**
     * Modify Data
     *
     * @param array $data
     * @return array
     */
    public function modifyData(array $data):array
    {
        $model = $this->locator->getProduct();
        $modelId = $model->getId();

        if (!isset($data[$modelId][self::DATA_SOURCE_DEFAULT]['quantity_and_stock_status']['qty'])) {
            $data[$modelId][self::DATA_SOURCE_DEFAULT]['quantity_and_stock_status']['qty'] = self::DEFAULT_QTY;
        }

        return $data;
    }

    /**
     * Modify Meta
     *
     * @param array $meta
     * @return array
     */
    public function modifyMeta(array $meta):array
    {
        return $meta;
    }
}
