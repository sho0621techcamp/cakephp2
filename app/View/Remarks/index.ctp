<?php 
// echo $this->Html->css('layout');
echo $this->Html->css('cake.generic');
?>

<header class="top-wrapper">
  <div class="btn">
    <?php if($auth): ?>
      <?= h($auth['name']) ?>
      <!-- <?php echo $this->Html->link($auth['name'], array('controller' => 'Users', 'action' => 'view', $user_id)); ?> -->
      <button class="btn btn-outline-secondary ml-2">
        <?php echo $this->Html->link('ログアウト', array('controller' => 'Users', 'action' => 'logout')); ?>
      </button>
    <?php else: ?>
      <button class="btn btn-outline-secondary">
        <?php echo $this->Html->link('新規登録', array('controller' => 'Users', 'action' => 'signup')); ?>
      </button>
      <button class="btn btn-outline-secondary">
        <?php echo $this->Html->link('ログイン', array('controller' => 'Users', 'action' => 'login')); ?>
      </button>
    <?php endif; ?>
  </div>
</header>


<div class="main-wrapper">
  <div class="container">
    <h1 class="title">迷言一覧</h1>
    <div class="remarks">
      <?php foreach($remarks as $remark): ?>
        <div class="remark d-flex">
          <?php pr($this->Html->link($remark['Remark']['remarks'], array('controller' => 'Users', 'action' => 'view', $remark['User']['id']))); ?>
          <?php if($remark['Remark']['remarks']): ?>
            <div class="user-name d-flex">
              <span class="mx-2 mt-3">by</span>
              <p class="mt-3"><?php echo $this->Html->link($remark['User']['name'], array('controller' => 'Users', 'action' => 'view', $remark['User']['id'])); ?></p>
            </div>
          <?php endif; ?>
        </div>
        <div class="mt-0 mb-5">
          <?= $this->Form->create('', array(
            'url' => array(
              'controller' => 'Likes',
              'action' => 'add'
            ),
            'class' => 'like-form'
          ))?>
          <?= $this->Form->hidden('user_id', array('value' => $remark['User']['id']))?>
          <?= $this->Form->hidden('remark_id', array('value' => $remark['Remark']['id']))?>
          <?= $this->Form->button('いいね！', array('class' => 'like-btn btn btn-danger btn-sm', 'aria-disabled' => true))?>
          <?= $this->Form->end(); ?>
        </div>
       
      <?php endforeach; ?>
    </div>
    <button class="btn btn-primary mt-3 mb-5">
        <?php echo $this->Html->link('Add Remark', array('action' => 'add')); ?>
    </button>
  </div>
</div>