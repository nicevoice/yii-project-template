<?php

/**
 * This is the model class for table "article".
 * The followings are the available columns in table 'article':
 * @property integer $id
 * @property string  $title
 * @property integer $user_id
 * @property string  $description
 * @property string  $content
 * @property string  $clean_content
 * @property string  $field_id
 * @property integer $create_date
 * @property integer $update_date
 * @property string  $img
 * @property string  $keywords
 */
class Article extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'article';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, user_id, description, content, field_id', 'required'),
            array('user_id, create_date, update_date', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 120),
            array('field_id', 'length', 'max' => 60),
            array('keywords', 'length', 'max' => 255),
            array('clean_content, img', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, user_id, description, content, clean_content, field_id, create_date, update_date, img, keywords', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'user' => array(self::BELONGS_TO, 'PublicUser', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'            => 'ID',
            'title'         => 'Title',
            'user_id'       => 'User',
            'description'   => 'Description',
            'content'       => 'Content',
            'clean_content' => 'Clean Content',
            'field_id'      => 'Field',
            'create_date'   => 'Create Date',
            'update_date'   => 'Update Date',
            'img'           => 'Img',
            'keywords'      => 'Keywords',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('clean_content', $this->clean_content, true);
        $criteria->compare('field_id', $this->field_id, true);
        $criteria->compare('create_date', $this->create_date);
        $criteria->compare('update_date', $this->update_date);
        $criteria->compare('img', $this->img, true);
        $criteria->compare('keywords', $this->keywords, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * 获取最新发布的N个文章
     * @param int $cnt
     * @return array|CActiveRecord|mixed|null
     */
    public static function getLatestArticles($cnt = 10)
    {
        $criteria = new CDbCriteria();
        $criteria->order = 'id desc';
        $criteria->limit = $cnt;

        return self::model()->findAll($criteria);
    }

    /**
     * 获取截取后的字符串
     * @param int $char
     * @return string
     */
    public function getCutTitle($char = 15)
    {
        return mb_substr($this->title, 0, $char, 'utf-8').'...';
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Article the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * 获取人性化时间显示
     * @return bool|string
     */
    public function getPostDate()
    {
        $delta = time() - $this->create_date;
        if ($delta < 30 && $delta >= 0) {
            return "刚刚";
        }

        if ($delta < 60 && $delta > 30) {
            return $delta . '秒前';
        }

        if ($delta > 60 * 60 * 24) {
            $word = sprintf("%s天前", intval($delta / (60 * 60 * 24)));

            return $word;
        }

        if ($delta > 60 * 60 * 12) {
            $word = sprintf("半天前");

            return $word;
        }

        if ($delta > 60 * 60) {
            $word = sprintf("%s 小时 %s分钟前", intval($delta / (60 * 60)), intval($delta % 60));

            return $word;
        }

        if ($delta > 60) {
            $word = sprintf("%s 分钟前", intval($delta / 60));

            return $word;
        }

        return date("Y-m-d H:i", $this->create_date);

    }
}
