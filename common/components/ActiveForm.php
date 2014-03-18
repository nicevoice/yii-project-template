<?php
class ActiveForm extends CActiveForm
{
    public function hintEx ( $model , $label )
    {
        return sprintf('<p class="help-block"><span class="muted">%s</span></p>', $model->getHint( $label ));
    }

    public function errorEx ( $model , $label , $htmlOptions = array() , $enableAjaxValidation = TRUE , $enableClientValidation = TRUE )
    {
        $_htmlOptions = array(
            'class' => 'help-inline text-error' ,
        );

        if ( isset( $htmlOptions[ 'class' ] ) ) {
            $htmlOptions[ 'class' ] .= " " . $_htmlOptions[ 'class' ];
        } else {
            $htmlOptions[ 'class' ] = $_htmlOptions[ 'class' ];
        }


        return $this->error( $model , $label , $htmlOptions , $enableAjaxValidation , $enableClientValidation );
    }
}