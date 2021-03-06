<?php
/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 22.07.2017
 * Time: 5:20
 */

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class OrderItems extends ActiveRecord
{
    public static function tableName()
    {
        return 'order_items';
    }

    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    public function rules()
    {

        return [
            [['order_id', 'product_id', 'name', 'price', 'qty_item', 'sum_item'], 'required'],
            [['order_id', 'product_id', 'qty_item'], 'integer'],
            [['price', 'sum_item'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];

    }


}