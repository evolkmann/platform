<?php declare(strict_types=1);

namespace Shopware\Core\Framework\Test\Event\EventData;

use PHPUnit\Framework\TestCase;
use Shopware\Core\Checkout\Customer\CustomerDefinition;
use Shopware\Core\Framework\Event\EventData\EntityType;
use Shopware\Core\Framework\Event\EventData\EventDataCollection;
use Shopware\Core\Framework\Event\EventData\ScalarValueType;

class EventDataCollectionTest extends TestCase
{
    public function testToArray()
    {
        $collection = (new EventDataCollection())
            ->add('customer', new EntityType(CustomerDefinition::class))
            ->add('myBool', new ScalarValueType(ScalarValueType::TYPE_BOOL))
            ;

        $expected = [
            'customer' => [
                'type' => 'entity',
                'entity' => CustomerDefinition::getEntityName(),
            ],
            'myBool' => [
                'type' => 'bool',
            ],
        ];

        static::assertEquals($expected, $collection->toArray());
    }
}
