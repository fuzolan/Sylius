<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Component\Grid\DataExtractor;

use Sylius\Component\Grid\Definition\Field;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;

/**
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
final class PropertyAccessDataExtractor implements DataExtractorInterface
{
    /**
     * @var PropertyAccessorInterface
     */
    private $propertyAccessor;

    /**
     * @param PropertyAccessorInterface $propertyAccessor
     */
    public function __construct(PropertyAccessorInterface $propertyAccessor)
    {
        $this->propertyAccessor = $propertyAccessor;
    }

    /**
     * {@inheritdoc}
     */
    public function get(Field $field, $data)
    {
        return $this->propertyAccessor->getValue($data, $field->getPath());
    }
}
