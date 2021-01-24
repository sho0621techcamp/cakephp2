<?php  echo $this->Html->css('cake.generic');?>


<div class="container my-5">
  <h5>Remark投稿</h5>
  <div class="remark-form">
    <?php
      
      echo $this->Form->create('Remark');
      echo $this->Form->input('remarks');
      echo $this->Form->input('Remark.user_id', array('type' => 'hidden'));
      echo $this->Form->end(__('Add Remark'));
    ?>
  </div>
  <button><a href="/cakephp2/Remarks/">戻る</a></button>
</div>