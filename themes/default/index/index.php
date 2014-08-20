<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'item',
    'itemsTagName' => 'ul'
));
?>
