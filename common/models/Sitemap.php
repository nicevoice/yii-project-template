<?php

/**
 * This is the model class for table "sitemap".
 * The followings are the available columns in table 'sitemap':
 * @property string  $id
 * @property integer $last_page
 */
class Sitemap extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'sitemap';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('page', 'numerical', 'integerOnly' => true),
            array('create_date, update_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, page', 'safe', 'on' => 'search'),
        );
    }

    public function beforeSave()
    {
        if ($this->isNewRecord) {

            $this->create_date = time();
            $this->update_date = $this->create_date;
        }

        $this->update_date = time();

        return parent::beforeSave();
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
            'id'        => 'ID',
            'last_page' => 'Last Page',
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
        $criteria->compare('page', $this->page);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Sitemap the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function incr($page = null)
    {
        if ($page === null) {
            $page = 1;
        }
        $old_page = $page;

        $page += 1;
        $model       = new Sitemap();
        $model->page = $page;
        if ($model->save()) {
            return $model;
        }

        return $old_page;
    }

    public static function updateUpdateMaxTime()
    {
        $criteria = new CDbCriteria();
        $criteria->order = 'page desc';
        $criteria->limit = 1;

        $model = self::model()->find($criteria);
        $model->udpate_date = time();
        return $model->save();
    }
}
