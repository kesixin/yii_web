<?php

class Post extends CActiveRecord
{

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tbl_post';
    }

    public function relations()
    {
        return array(
            'user'=>array(self::BELONGS_TO,'User','user_id'),
            'categories'=>array(self::MANY_MANY,'Category','tbl_post_category(post_id,category_id)'),
        );
    }

}