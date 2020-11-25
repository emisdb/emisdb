<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "providers".
 *
 * @property int $id
 * @property string|null $category
 * @property string $brand_name
 * @property string $brand_name_en
 * @property string $description
 * @property string $phone
 * @property string $address
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string $email
 * @property string $web
 * @property int|null $handicapped
 */
class Providers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'providers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'description'], 'string'],
            [['brand_name', 'brand_name_en', 'description', 'phone', 'address', 'email', 'web'], 'required'],
            [['handicapped'], 'integer'],
            [['brand_name', 'brand_name_en'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 40],
            [['address', 'email'], 'string', 'max' => 120],
            [['latitude', 'longitude'], 'string', 'max' => 30],
            [['web'], 'string', 'max' => 250],
            [['email'], 'unique'],
            [['web'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'brand_name' => 'Brand Name',
            'brand_name_en' => 'Brand Name En',
            'description' => 'Description',
            'phone' => 'Phone',
            'address' => 'Address',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'email' => 'Email',
            'web' => 'Web',
            'handicapped' => 'Handicapped',
        ];
    }
}
