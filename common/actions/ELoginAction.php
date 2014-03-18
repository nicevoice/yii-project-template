<?php
/**
 * Author: Rogee<rogeecn@gmail.com>
 * Date: 2013-12-04 15:52
 * Project: zhiyuanyun
 */

class ELoginAction extends CAction
{
    public function run ()
    {
        if ( H::isPost() && Administrator::Login( 'LoginForm' ) ) {
            $this->controller->redirect( '/index' );
        }


        $is_admin = defined( "_ADMIN_" ) && _ADMIN_;

        if ( H::Controller()->action->getId() != 'login' ) {
            if ( $is_admin && !H::getState( 'admin_login' ) ) {
                $this->redirect( '/login' );
            } else {
                if ( H::isGuest() ) {
                    $this->redirect( '/login' );
                } else {
                    $this->controller->redirect( '/user/home' );
                }
            }
        } else {
            if ( !$is_admin && !H::isGuest() ) {
                $this->controller->redirect( '/user/home' );
            }
        }

        $this->controller->layout = "//layouts/login";
        $this->controller->render( "//public/login" );
    }
} 