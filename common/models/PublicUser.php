<?php

/**
 * This is the model class for table "public_user".
 * The followings are the available columns in table 'public_user':
 * @property string  $id
 * @property string  $username
 * @property string  $nickname
 * @property string  $fakename
 * @property integer $cat_id
 * @property integer $is_new
 * @property integer $create_date
 * @property integer $update_date
 * @property string  $signature
 */
class PublicUser extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'public_user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, nickname, fakename, cat_id', 'required'),
            array('cat_id, is_new, create_date, update_date', 'numerical', 'integerOnly' => true),
            array('username, nickname, fakename', 'length', 'max' => 60),
            array('signature', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, username, nickname, fakename, cat_id, is_new, create_date, update_date, signature', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'          => 'ID',
            'username'    => 'Username',
            'nickname'    => 'Nickname',
            'fakename'    => 'Fakename',
            'cat_id'      => 'Cat',
            'is_new'      => 'Is New',
            'create_date' => 'Create Date',
            'update_date' => 'Update Date',
            'signature'   => 'Signature',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('nickname', $this->nickname, true);
        $criteria->compare('fakename', $this->fakename, true);
        $criteria->compare('cat_id', $this->cat_id);
        $criteria->compare('is_new', $this->is_new);
        $criteria->compare('create_date', $this->create_date);
        $criteria->compare('update_date', $this->update_date);
        $criteria->compare('signature', $this->signature, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PublicUser the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }


    /**
     * 获取分类下的用户ID列表
     * @param $id
     * @return array
     */
    public static function getCatUserIdList($id)
    {
        $list = CHtml::listData(self::getCatUser($id), 'id', 'nickname');

        return array_keys($list);
    }

    public static function getCatUser($id)
    {
        $criteria = new CDbCriteria();
        $criteria->compare('cat_id', $id);

        return self::model()->findAll($criteria);
    }
}
