<?php
class ActiveRecord extends CActiveRecord
{
    private $_class;

    public function __construct ( $scenario = 'insert' )
    {
        $this->_class = self::getRealClass( get_called_class() );;
        parent::__construct( $scenario );
    }

    public function getModelName ()
    {
        return $this->_class;
    }

    public static function model ( $class = __CLASS__ )
    {
        if ( get_called_class() != FALSE ) {
            $class = self::getRealClass( get_called_class() );
        }

        return parent::model( $class );
    }

    private static function getRealClass ( $class )
    {
        if ( substr( $class , 0 , 6 ) == 'Admin_' ) {
            return substr( $class , 6 , 1000 );
        }

        return $class;
    }

    public function tableName ()
    {
        $class = self::getRealClass( self::getRealClass( get_called_class() ) );
        $array = range( 'A' , 'Z' );

        $table = '';
        for ( $i = 0 ; $i < strlen( $class ) ; $i++ ) {
            if ( in_array( $class{$i} , $array ) && $i != 0 ) {
                $table .= '_' . strtolower( $class{$i} );
            } else {
                $table .= strtolower( $class{$i} );
            }
        }
        $table = sprintf( '{{%s}}' , $table );

        return trim( $table , '_' );
    }

    /**
     * 封装 findByPk
     * @param       $id
     * @param array $params
     *
     * @return array|CActiveRecord|mixed|null
     */
    public static function _Pk ( $id , $params = array() )
    {
        return self::model()->findByPk( intval( $id ) , $params );
    }

    public function rules ()
    {
        $conf   = include( PATH_BASE . '/common/config/model.conf.php' );
        $result = $conf[ self::getRealClass( get_called_class() ) ][ 'rule' ];
        if ( empty( $result ) ) {
            return array();
        }

        return $result;
    }

    public function relations ()
    {
        $conf   = include( PATH_BASE . '/common/config/model.conf.php' );
        $result = $conf[ self::getRealClass( get_called_class() ) ][ 'relation' ];

        if ( empty( $result ) ) {
            return array();
        }

        return $result;
    }

    public function attributeLabels ()
    {
        $conf = include( PATH_BASE . '/common/config/model.conf.php' );

        $result = $conf[ self::getRealClass( get_called_class() ) ][ 'label' ];
        if ( empty( $result ) ) {
            return array();
        }

        return $result;
    }

    public function getHint ( $attribute )
    {
        $conf = include( PATH_BASE . '/common/config/model.conf.php' );

        if ( isset( $conf[ self::getRealClass( get_called_class() ) ][ 'hint' ][ $attribute ] ) ) {
            $result = $conf[ self::getRealClass( get_called_class() ) ][ 'hint' ][ $attribute ];
        } else {
            $result = array();
        }

        if ( !empty( $result ) ) {
            return $result;
        }

        return FALSE;
    }

    public function scopes ()
    {
        $conf   = include( PATH_BASE . '/common/config/model.conf.php' );
        $result = isset( $conf[ self::getRealClass( get_called_class() ) ][ 'scope' ] ) ? $conf[ self::getRealClass( get_called_class() ) ][ 'scope' ] : array();
        if ( empty( $result ) ) {
            return array();
        }

        return $result;
    }


    public function beforeSave ()
    {
        if ( $this->isNewRecord ) {
            $this->create_date = CDateTime::getCurTimeStamp();
            $this->update_date = $this->create_date;
        } else {
            $this->update_date = CDateTime::getCurTimeStamp();
        }

        return parent::beforeSave();
    }

    /**
     * 数据存储
     * @return bool
     */
    public function saveData ()
    {
        $class = get_called_class();
        if ( isset( $_POST[ $class ] ) && !empty( $_POST[ $class ] ) ) {
            $this->setAttributes( $_POST[ $class ] );

            if ( $this->save() ) {
                return TRUE;
            }

            return FALSE;
        }
    }
}