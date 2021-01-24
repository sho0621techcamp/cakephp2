<?php
class Like extends AppModel {
  public $belongsTo = array(
    'User' => array(
      'className' => 'User',
      'foreignKey' => 'user_id',
      'type' => 'INNER'
    ),
      'Remark' => array(
        'className' => 'Remark',
        'foreignKey' => 'remark_id'
      )
  );

  public function countLike(int $remark_id)
  {
    $query = $this->find();
    $query->where(array(
      'remark_id' => $remark_id
    ));
    return $query;
  }
}

?>