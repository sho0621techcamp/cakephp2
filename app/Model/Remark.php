<?php
  class Remark extends AppModel {

   public $belongsTo = array(
     'User' => array(
       'className' => 'User',
       'foreignKey' => 'user_id',
       'type' => 'INNER'
     )
   );

   public $hasMany = array(
     'Like' => array(
      'className' => 'Like'
     )
    );




    public function isOwnedBy($remark, $user) {
      return $this->field('id', array('id' => $remark, 'user_id' => $user)) !== false;
    }
 }
?>