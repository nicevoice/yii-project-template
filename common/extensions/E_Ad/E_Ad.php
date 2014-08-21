<?php
/**
 * @author: Rogee<rogeeyang@gmail.com>
 */
class E_Ad extends CWidget {
    public $position;

    public function run()
    {
        $this->render($this->position);
    }
}