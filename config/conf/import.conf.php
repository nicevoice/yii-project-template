<?php
    $import = array(
        'common.models.*' ,
        'common.hook.*' ,
        'common.components.*' ,
        'common.components.Image.*' ,
        'common.hook.Notification.*',
        'common.hook.Notification.Notificationhooks.*',
        'common.hook.vipHooks.*',
    );
    if ( defined( '_ADMIN_' ) ) {
        $import[ ] = 'admin.components.*';
    } elseif ( defined( '_FRONT_' ) ) {
        $import[ ] = 'front.components.*';

    }
    return $import;