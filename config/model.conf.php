<?php
$BELONGS_TO = 'CBelongsToRelation';
$HAS_ONE    = 'CHasOneRelation';
$HAS_MANY   = 'CHasManyRelation';
$MANY_MANY  = 'CManyManyRelation';
$STAT       = 'CStatRelation';

$Administrator = array(
    'rule'     => array(
        array( 'create_date, update_date' , 'numerical' , 'integerOnly' => TRUE ) ,
        array( 'username' , 'length' , 'max' => 45 ) ,
        array( 'password' , 'length' , 'max' => 32 ) ,
        array( 'salt' , 'length' , 'max' => 4 ) ,
        array( 'id, username, password, salt, create_date, update_date' , 'safe' , 'on' => 'search' ) ,
    ) ,
    'relation' => array() ,
    'label'    => array(
        'id'          => 'ID' ,
        'username'    => 'Username' ,
        'password'    => 'Password' ,
        'salt'        => 'Salt' ,
        'create_date' => 'Create Date' ,
        'update_date' => 'Update Date' ,
    )
);
$Honor         = array(
    'rule'     => array(
        array( 'creator, name' , 'required' ) ,
        array( 'creator, create_date, update_date' , 'numerical' , 'integerOnly' => TRUE ) ,
        array( 'name' , 'length' , 'max' => 255 ) ,
        array( 'description' , 'safe' ) ,
        array( 'id, creator, name, description, create_date, update_date' , 'safe' , 'on' => 'search' ) ,
    ) ,
    'relation' => array(
    ) ,
    'label'    => array(
        'id'          => 'ID' ,
        'creator'     => 'Creator' ,
        'name'        => '名称' ,
        'description' => '描述' ,
        'create_date' => 'Create Date' ,
        'update_date' => 'Update Date' ,
    )
);

$Hooks    = array(
    'rule'     => array(
        array( 'hook_id, hook_function' , 'required' ) ,
        array( 'create_date, update_date' , 'numerical' , 'integerOnly' => TRUE ) ,
        array( 'hook_id' , 'length' , 'max' => 10 ) ,
        array( 'hook_function' , 'length' , 'max' => 255 ) ,
        array( 'id, hook_id, hook_function, create_date, update_date' , 'safe' , 'on' => 'search' ) ,
    ) ,
    'relation' => array() ,
    'label'    => array(
        'id'            => 'ID' ,
        'hook_id'       => 'Hook' ,
        'hook_function' => 'Hook Function' ,
        'create_date'   => 'Create Date' ,
        'update_date'   => 'Update Date' ,
    )
);
$Projects = array(
    'rule'     => array(
        array( 'name, begin_date, end_date, location, hours, contact, , description' , 'required' ) ,
        array( 'begin_date, end_date' , 'date' , 'format' => 'yyyy-MM-dd H:m' ) ,
        array( 'creator,hours, create_date, update_date' , 'numerical' , 'integerOnly' => TRUE ) ,
        array( 'name' , 'length' , 'max' => 250 ) ,
        array( 'hours' , 'checkHours' ) ,
        array( 'contact' , 'length' , 'max' => 45 ) ,
        //array( 'contact_phone' , 'length' , 'max' => 11 ) ,
        array( 'contact_phone' , 'safe' ) ,
        array( 'id, creator, name, begin_date, end_date, location, hours, contact, contact_phone, description, create_date, update_date' , 'safe' , 'on' => 'search' ) ,
    ) ,
    'relation' => array() ,
    'label'    => array(
        'creator'       => 'Creator' ,
        'name'          => '活动名称' ,
        'begin_date'    => '开始时间' ,
        'end_date'      => '结束时间' ,
        'location'      => '活动地址' ,
        'hours'         => '服务时长' ,
        'contact'       => '联系人' ,
        'contact_phone' => '联系电话' ,
        'description'   => '活动描述' ,
        'create_date'   => 'Create Date' ,
        'update_date'   => 'Update Date' ,
    ) ,
    'hint'     => array(
        'begin_date'    => '格式：2013-9-9 12:10' ,
        'end_date'      => '格式：2013-9-9 12:10' ,
        'hours'         => '参加项目每人可获得的服务时长。' ,
        'contact'       => '请准确填写' ,
        'contact_phone' => '请准确填写'
    )
);

$ProjectUser = array(
    'rule'     => array(
        array( 'project_id, user_id' , 'required' ) ,
        array( 'project_id, user_id, hour, create_date, update_date' , 'numerical' , 'integerOnly' => TRUE ) ,
        array( 'hour' , 'checkHourRange' ) ,
        array( 'memo' , 'safe' ) ,
        array( 'id, project_id, user_id, hour, memo, create_date, update_date' , 'safe' , 'on' => 'search' ) ,
    ) ,
    'relation' => array(
        'projectInfo' => array( $BELONGS_TO , 'Projects' , 'project_id' ) ,
    ) ,
    'label'    => array(
        'project_id'  => 'Project' ,
        'user_id'     => 'User' ,
        'hour'        => '时长' ,
        'memo'        => '备注' ,
        'create_date' => 'Create Date' ,
        'update_date' => 'Update Date' ,
    )
);
$UserHonor   = array(
    'rule'     => array(
        array( 'user_id, honor_id' , 'required' ) ,
        array( 'user_id, honor_id, create_date, update_date' , 'numerical' , 'integerOnly' => TRUE ) ,
        array( 'id, user_id, honor_id, create_date, update_date' , 'safe' , 'on' => 'search' ) ,
    ) ,
    'relation' => array(
        'honor' => array( $BELONGS_TO , "Honor" , 'honor_id' )
    ) ,
    'label'    => array(
        'id'          => 'ID' ,
        'user_id'     => 'User' ,
        'honor_id'    => 'Honor' ,
        'create_date' => 'Create Date' ,
        'update_date' => 'Update Date' ,
    )
);
$Vip         = array(
    'rule'     => array(
        array( 'host, name, admin_email,hook' , 'required' ) ,
        array( 'admin_email' , 'email' ) ,
        array( 'host' , 'url' , 'pattern' => '/^([\w\-]+\.)?[\w\-]+\.\w+$/' ) ,
        array( 'create_date, update_date' , 'numerical' , 'integerOnly' => TRUE ) ,
        array( 'host, admin_email' , 'length' , 'max' => 255 ) ,
        array( 'name' , 'length' , 'max' => 45 ) ,
        array( 'backgroundimage' , 'safe' ) ,
        array( 'id, host, name, backgroundimage, create_date, update_date' , 'safe' , 'on' => 'search' ) ,
    ) ,
    'relation' => array() ,
    'label'    => array(
        'id'              => 'ID' ,
        'host'            => '绑定域名' ,
        'name'            => 'VIP名称' ,
        'admin_email'     => '管理员Email' ,
        'backgroundimage' => 'Backgroundimage' ,
        'create_date'     => 'Create Date' ,
        'update_date'     => 'Update Date' ,
    ) ,
    'hint'     => array(
        'host'            => '绑定域名，不带http://' ,
        'name'            => 'VIP客户名称' ,
        'admin_email'     => '管理员登陆Email' ,
        'backgroundimage' => 'Backgroundimage' ,
    )
);

$UserList = array(
    'rule'     => array(
        array( 'user_id, org_id, user_name, status' , 'required' ) ,
        array( 'user_id, org_id, status, create_date, update_date' , 'numerical' , 'integerOnly' => TRUE ) ,
        array( 'memo, apply_info, deny_info' , 'safe' ) ,
        array( 'id, user_id, org_id, memo, status, create_date, update_date' , 'safe' , 'on' => 'search' ) ,
    ) ,
    'relation' => array() ,
    'label'    => array(
        'id'          => 'ID' ,
        'user_id'     => 'User' ,
        'org_id'      => 'Org' ,
        'memo'        => '备注' ,
        'user_name'   => '姓名' ,
        'deny_info'   => '拒绝理由' ,
        'status'      => 'Status' ,
        'create_date' => 'Create Date' ,
        'update_date' => 'Update Date' ,
    )
);

$HookNameList = array(
    'rule'     => array(
        array( 'name, description' , 'required' ) ,
        array( 'create_date, update_date' , 'numerical' , 'integerOnly' => TRUE ) ,
        array( 'name, description' , 'length' , 'max' => 255 ) ,
        array( 'id, name, description, create_date, update_date' , 'safe' , 'on' => 'search' ) ,
    ) ,
    'relation' => array() ,
    'label'    => array(
        'id'          => 'ID' ,
        'name'        => '名称' ,
        'description' => '描述' ,
        'create_date' => 'Create Date' ,
        'update_date' => 'Update Date' ,
    ) ,
    'hint'     => array(
        'name'        => 'Hook名称' ,
        'description' => '描述下此Hook的作用，及使用方式等'
    )
);

$ExtraFormColumn = array(
    'rule'     => array(
        array( 'org_id, create_date, update_date' , 'numerical' , 'integerOnly' => TRUE ) ,
        array( 'columns' , 'safe' ) ,
        array( 'id, org_id, columns, create_date, update_date' , 'safe' , 'on' => 'search' ) ,
    ) ,
    'relation' => array() ,
    'label'    => array(
        'id'          => 'ID' ,
        'org_id'      => 'Org' ,
        'columns'     => '其它字段' ,
        'create_date' => 'Create Date' ,
        'update_date' => 'Update Date' ,
    ) ,
    'hint'     => array(
        'columns' => '请补充其它需要填写的信息字段名称，如不需要请留空。' ,
    )
);
$OrgVolunteer    = array(
    'rule'     => array(
        array( 'user_id, org_id, status' , 'required' ) ,
        array( 'user_id, org_id, status, create_date, update_date' , 'numerical' , 'integerOnly' => TRUE ) ,
        array( 'id, user_id, org_id, status, create_date, update_date' , 'safe' , 'on' => 'search' ) ,
    ) ,
    'relation' => array() ,
    'label'    => array(
        'id'          => 'ID' ,
        'user_id'     => 'User' ,
        'org_id'      => 'Org' ,
        'status'      => 'Status' ,
        'create_date' => 'Create Date' ,
        'update_date' => 'Update Date' ,
    )
);

$TmpUserInfo  = array(
    'rule'     => array(
        array( 'uid, sex, province, city' , 'numerical' , 'integerOnly' => TRUE ) ,
        array( 'real_name, affiliation, nation, max_level' , 'length' , 'max' => 45 ) ,
        array( 'identify_code' , 'length' , 'max' => 18 ) ,
        array( 'phone' , 'length' , 'max' => 11 ) ,
        array( 'work_for' , 'length' , 'max' => 120 ) ,
        array( 'location' , 'length' , 'max' => 255 ) ,
        array( 'photo' , 'length' , 'max' => 65 ) ,
        array( 'create_date, update_date' , 'safe' ) ,
        array( 'id, uid, real_name, sex, affiliation, nation, identify_code, phone, max_level, work_for, province, city, location, photo, create_date, update_date' , 'safe' , 'on' => 'search' ) ,
    ) ,
    'relation' => array() ,
    'label'    => array(
        'id'            => 'ID' ,
        'uid'           => 'Uid' ,
        'real_name'     => 'Real Name' ,
        'sex'           => 'Sex' ,
        'affiliation'   => 'Affiliation' ,
        'nation'        => 'Nation' ,
        'identify_code' => 'Identify Code' ,
        'phone'         => 'Phone' ,
        'max_level'     => 'Max Level' ,
        'work_for'      => 'Work For' ,
        'province'      => 'Province' ,
        'city'          => 'City' ,
        'location'      => 'Location' ,
        'photo'         => 'Photo' ,
        'create_date'   => 'Create Date' ,
        'update_date'   => 'Update Date' ,
    )
);
$Notification = array(
    'rule'     => array(
        array( 'user_id, notification' , 'required' ) ,
        array( 'create_date, update_date' , 'numerical' , 'integerOnly' => TRUE ) ,
        array( 'user_id' , 'length' , 'max' => 10 ) ,
        array( 'id, user_id, notification, create_date, update_date' , 'safe' , 'on' => 'search' ) ,
    ) ,
    'relation' => array() ,
    'label'    => array(
        'id'           => 'ID' ,
        'user_id'      => 'User' ,
        'notification' => 'Notification' ,
        'create_date'  => 'Create Date' ,
        'update_date'  => 'Update Date' ,
    )
);

$WenlianAttributes = array(
    'rule'     => array(
        array( 'create_date, update_date' , 'numerical' , 'integerOnly' => TRUE ) ,
        array( 'name' , 'length' , 'max' => 45 ) ,
        array( 'id, name, create_date, update_date' , 'safe' , 'on' => 'search' ) ,
    ) ,
    'relation' => array() ,
    'label'    => array(
        'id'          => 'ID' ,
        'name'        => 'Name' ,
        'create_date' => 'Create Date' ,
        'update_date' => 'Update Date' ,
    )
);

$WenlianOrgAttributes = array(
    'rule'     => array(
        array( 'org_id, attr_id,level, create_date, update_date' , 'numerical' , 'integerOnly' => TRUE ) ,
        array( 'id, org_id, attr_id, create_date, update_date' , 'safe' , 'on' => 'search' ) ,
    ) ,
    'relation' => array() ,
    'label'    => array(
        'id'          => 'ID' ,
        'level'       => '级别' ,
        'org_id'      => 'Org' ,
        'attr_id'     => 'Attr' ,
        'create_date' => 'Create Date' ,
        'update_date' => 'Update Date' ,
    )
);


$WenlianOrgList = array(
    'rule'     => array(
        array( 'org_id,status,message' , 'required' ) ,
        array( 'org_id, status, create_date, update_date' , 'numerical' , 'integerOnly' => TRUE ) ,
        array( 'message, create_date, update_date' , 'safe' ) ,
    ) ,
    'relation' => array() ,
    'label'    => array(
        'id'          => 'ID' ,
        'org_id'      => 'Org' ,
        'message'     => '拒绝理由' ,
        'status'      => 'Status' ,
        'create_date' => 'Create Date' ,
        'update_date' => 'Update Date' ,
    )
);
$conf           = array(
    'Administrator'        => $Administrator ,
    'Honor'                => $Honor ,
    'Hooks'                => $Hooks ,
    'Projects'             => $Projects ,
    'ProjectUser'          => $ProjectUser ,
    'UserHonor'            => $UserHonor ,
    'Vip'                  => $Vip ,
    'UserList'             => $UserList ,
    'HookNameList'         => $HookNameList ,
    'ExtraFormColumn'      => $ExtraFormColumn ,
    'OrgVolunteer'         => $OrgVolunteer ,
    'TmpUserInfo'          => $TmpUserInfo ,
    'Notification'         => $Notification ,
    'WenlianAttributes'    => $WenlianAttributes ,
    'WenlianOrgAttributes' => $WenlianOrgAttributes ,
    'WenlianOrgList'       => $WenlianOrgList ,
);

return $conf;
