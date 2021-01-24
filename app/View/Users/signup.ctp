<div class="container">
  <h1>新規登録</h1>
  <div class="user-form">
    <?php
      echo $this->Form->create('User');
      echo $this->Form->input('name');
      echo $this->Form->end(__('Sign Up'), array('class' => 'btn btn-primary'));
    ?>
  </div>

</div>