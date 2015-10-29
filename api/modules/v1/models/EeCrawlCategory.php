<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "ee_crawl_category".
 *
 * @property integer $id
 * @property integer $marketplace_id
 * @property integer $cat_id
 * @property string $main_section
 * @property string $section
 * @property string $sub_section
 * @property string $category
 * @property string $URL
 * @property string $site_id
 * @property integer $active
 */
class EeCrawlCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_crawl_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['marketplace_id', 'cat_id', 'active'], 'integer'],
            [['main_section', 'section', 'sub_section', 'site_id'], 'string', 'max' => 50],
            [['category'], 'string', 'max' => 100],
            [['URL'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'marketplace_id' => 'Marketplace ID',
            'cat_id' => 'Cat ID',
            'main_section' => 'Main Section',
            'section' => 'Section',
            'sub_section' => 'Sub Section',
            'category' => 'Category',
            'URL' => 'Url',
            'site_id' => 'Site ID',
            'active' => 'Active',
        ];
    }
}
