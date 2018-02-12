<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $products_id
 * @property string $products_ean
 * @property int $products_quantity
 * @property int $products_quantity_min
 * @property int $products_quantity_max
 * @property int $products_shippingtime
 * @property string $products_model
 * @property int $group_permission_0
 * @property int $group_permission_1
 * @property int $group_permission_2
 * @property int $group_permission_3
 * @property int $products_sort
 * @property string $products_image
 * @property string $products_image_description
 * @property string $products_price
 * @property string $products_discount_allowed
 * @property string $products_date_added
 * @property string $products_last_modified
 * @property string $products_date_available
 * @property string $products_weight
 * @property string $products_volume_tmp
 * @property int $products_status
 * @property int $products_tax_class_id
 * @property string $product_template
 * @property string $options_template
 * @property int $manufacturers_id
 * @property int $products_ordered
 * @property int $products_fsk18
 * @property int $products_vpe
 * @property int $products_vpe_status
 * @property string $products_vpe_value
 * @property int $products_startpage
 * @property int $products_startpage_sort
 * @property int $products_to_xml
 * @property string $yml_bid
 * @property string $yml_cbid
 * @property string $products_page_url
 * @property int $group_permission_4
 * @property int $group_permission_5
 * @property int $group_permission_6
 * @property int $group_permission_7
 * @property int $group_permission_8
 * @property int $group_permission_9
 * @property int $group_permission_10
 * @property int $group_permission_11
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['products_quantity', 'products_quantity_min', 'products_quantity_max', 'products_shippingtime', 'group_permission_0', 'group_permission_1', 'group_permission_2', 'group_permission_3', 'products_price', 'products_date_added', 'products_status', 'products_tax_class_id', 'products_vpe', 'products_vpe_value', 'group_permission_4', 'group_permission_5', 'group_permission_6', 'group_permission_7', 'group_permission_8', 'group_permission_9', 'group_permission_10', 'group_permission_11'], 'required'],
            [['products_quantity', 'products_quantity_min', 'products_quantity_max', 'products_shippingtime', 'group_permission_0', 'group_permission_1', 'group_permission_2', 'group_permission_3', 'products_sort', 'products_status', 'products_tax_class_id', 'manufacturers_id', 'products_ordered', 'products_fsk18', 'products_vpe', 'products_vpe_status', 'products_startpage', 'products_startpage_sort', 'products_to_xml', 'group_permission_4', 'group_permission_5', 'group_permission_6', 'group_permission_7', 'group_permission_8', 'group_permission_9', 'group_permission_10', 'group_permission_11'], 'integer'],
            [['products_image_description'], 'string'],
            [['products_price', 'products_discount_allowed', 'products_weight', 'products_volume_tmp', 'products_vpe_value'], 'number'],
            [['products_date_added', 'products_last_modified', 'products_date_available'], 'safe'],
            [['products_ean', 'products_model', 'products_image', 'products_page_url'], 'string', 'max' => 255],
            [['product_template', 'options_template'], 'string', 'max' => 64],
            [['yml_bid', 'yml_cbid'], 'string', 'max' => 4],
            [['products_model'], 'unique'],
        ];
    }

}
