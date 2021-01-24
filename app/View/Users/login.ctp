<?php  echo $this->Html->css('cake.generic');?>
<div class="container">
  <h1>ログイン</h1>
  <div class="user-form">
    <?php
      echo $this->Form->create('User');
      echo $this->Form->input('name');
      echo $this->Form->hidden('user_id');
      echo $this->Form->end(__('Login'), array('class' => 'btn btn-primary'));
    ?>
  </div>

</div>