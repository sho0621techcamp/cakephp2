<?php  echo $this->Html->css('cake.generic');?>


<div class="container my-5">
  <h5>Remark編集</h5>
  <div class="remark-form">
    <?php
      
      echo $this->Form->create('Remark');
      echo $this->Form->input('remarks');
      echo $this->Form->hidden('Remark.User_id');
      echo $this->Form->end(__('Edit Remark'));
    ?>
  </div>
  <button><a href="/cakephp2/Remarks/">戻る</a></button>
</div>