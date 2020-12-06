<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Food Entity
 *
 * @property int $id
 * @property string $name
 * @property string $details
 * @property float $price
 * @property float $delivery_cost
 * @property string $food_image
 * @property \Cake\I18n\FrozenTime $created_at
 */
class Food extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'details' => true,
        'price' => true,
        'delivery_cost' => true,
        'food_image' => true,
        'created_at' => true,
    ];
}
