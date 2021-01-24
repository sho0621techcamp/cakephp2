<?php echo $this->Html->css('cake.generic')?>
<h5 class="title text-center">＜<?= h($user['User']['name']) ?>＞さんの投稿</h5>

<div class="main-wrapper">
  <div class="remarks text-center">
    <h5>『迷言』</h5>
    <?php foreach ($user['Remark'] as $remarkUser): ?>
      <div class="remark justify-content-center">
        <p class="m-5">
          <?= pr($remarkUser['remarks']) ?>
        </p>
          <button class="btn btn-success">
            <?= $this->Html->link('編集', 
            array('controller' => 'Remarks', 'action' => 'edit', $remarkUser['user_id']))?>
          </button>
          <button class="btn btn-danger ml-4">
            <?= $this->Form->postLink('削除',
              array('controller' => 'Remarks','action' => 'delete', $remarkUser['id']),
              array('confirm' => 'Remarkを削除しますか？')
            )?>
          </button>
      </div>
    <?php endforeach; ?>
    <button class="btn btn-outline-secondary mt-5">
      <?= $this->Html->link('戻る', array(
        'controller' => 'Remarks',
        'action' => 'index'
      ))?>
    </button>
  </div>
</div>