<?php
namespace common\models;

use Yii;
/**
 * This is the model class for table "square_webhook".
 *
 * @property integer $id
 * @property string $params
 * @property string $ip
 */

class SquareWebhook extends \yii\db\ActiveRecord
{

	public static function tableName()
	{
		return 'square_webhook';
	}

	public function rules()
	{
		return array(
			array(['params'], 'string', 'max' => 255),
			array(['ip'], 'string', 'max' => 15),
		);
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'params' => 'Parameters',
			'ip' => 'IP',
		];
	}

}