<?php
App::uses('AppController', 'Controller');

class RemarksController extends AppController {

  public $uses = ['User', 'Remark', 'Like'];

  public function index() {
    $remarks = $this->Remark->find('all', array(
      'contain' => 'User'
    ));
    $this->set(compact('remarks'));
  }

  public function add()
  {
    if ($this->request->is('post')) {
      $this->Remark->create($this->request->data);
      $this->request->data['Remark.user_id'] = $this->Auth->user('User.id');
      if ($this->Remark->save($this->request->data['Remark'])) {
        $this->Flash->success(__('投稿しました。'));
        return $this->redirect(array('action' => 'index'));
      }
      $this->Flash->error(__('投稿失敗しました。'));
     }
  }

  public function edit($id = null)
  {
    if (!$id) {
      throw new NotFoundException(__('Invalid remark'));
    }
    $remark = $this->Remark->findById($id);
    if (!$remark) {
      throw new NotFoundException(__('Invalid remark'));
    }
    if ($this->request->is('post', 'put')) {
      $this->Remark->id = $id;
      if ($this->Remark->save($this->request->data)) {
        $this->Flash->success(__('編集できました。'));
        return $this->redirect(array('action' => 'index'));
      }
      $this->Flash->error(__('編集に失敗しました。'));
    }
    if (!$this->request->data) {
      $this->request->data = $remark;
    }
  }

  public function delete($id)
  {
    if ($this->request->is('get')) {
      throw new MethodNotAllowedException();
    }

    if ($this->Remark->delete($id)) {
      $this->Flash->success(__('Remarkを削除しました。', h($id)));
    } else {
      $this->Flash->error(__('削除に失敗しました。', h($id)));
    }
    return $this->redirect(array('action' => 'index'));
  }

  public function isAuthorized($user)
  {
    if ($this->action === 'add') {
      return true;
    }

    if (in_array($this->action, array('edit', 'delete'))) {
      $remarkId = (int) $this->request->params['pass'][0];
      if ($this->Remark->isOwnedBy($remarkId, $user['id'])) {
        return true;
      }
    }

    return parent::isAuthorized($user);
  }
}
?>