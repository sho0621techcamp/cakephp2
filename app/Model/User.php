<?php
class User extends AppModel {
  public $validate = array(
    'name' => array(
      'required' => array(
        'rule' => 'notBlank',
        'message' => 'A name is required'
      )
    )
  );

  public $hasMany = array(
    'Remark' => array(
      'className' => 'Remark',
    ),
      'Like' => array(
        'className' => 'Like'
    )
  );
  
  public $actAs = array('Containable');
}

?>