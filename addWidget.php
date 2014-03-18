<?php
$dir = $argv[1];
$view = $argv[2];
$cur_dir = dirname(__FILE__).'/common/extensions';

function recurse_chown_chgrp($mypath, $uid, $gid)
{
/*    chown($mypath, $uid);
    chgrp($mypath, $gid);
    chmod($mypath, 0775);*/
    $d = opendir ($mypath) ;
    while(($file = readdir($d)) !== false) {
        if ($file != "." && $file != "..") {

            $typepath = $mypath . "/" . $file ;

            //print $typepath. " : " . filetype ($typepath). "<BR>" ;
            if (filetype ($typepath) == 'dir') {
                recurse_chown_chgrp ($typepath, $uid, $gid);
            }

/*            chown($typepath, $uid);
            chgrp($typepath, $gid);
            chmod($typepath, 0775);*/
        }
    }

}

$create_file = 'E_' . ucfirst($dir);
$dir_name = $cur_dir . '/' . $create_file;
mkdir($dir_name, 0775);
if ( is_dir($dir_name))
    echo $dir_name ." Success Create \n";


$view_name = $dir_name . '/views';
mkdir($view_name, 0775);
if (is_dir($view_name))
    echo $view_name . " Success Create \n";

if (!empty($view))
{
    echo "Crete View File ... \n";
    $view_file = $view_name . '/' . $view;
    file_put_contents($view_file.'.php', '');
    if( is_file($view_file) )
        echo $view_file . " Success Create \n";

}
echo 'Chowning...'. "\n";


$file = <<<__FIL__
<?php
class $create_file extends Widget
{
    public function _preCall()
    {

    }

    public function _init()
    {

    }

    public function _run()
    {
        \$this->render("$view");
    }
}
__FIL__;
$main_file = $dir_name.'/'.$create_file.'.php';
file_put_contents($main_file, $file);
if( is_file($main_file) )
    echo $main_file . " Success Create \n";


recurse_chown_chgrp($dir_name, 'www-data', 'rogee');

