<?php 

namespace common\modules\extrafield\models\fields;

use Yii;
use yii\base\View;
use common\modules\extrafield\models\fields\FieldInterface;
use common\modules\extrafield\models\fields\InputList;



class InputListRadio extends InputList
{
	public static function type()
    {
        return FieldInterface::TYPE_LIST_INPUT_RADIO;
    }

    public  function getViewPath()
    {
        return FieldInterface::VIEW_PATH . "/input_radio.php";
    }
}