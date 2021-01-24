<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {

  public $uses = ['User','Remark', 'Like'];

  public function beforeFilter()
  {
    parent::beforeFilter();
    $this->Auth->allow('signup', 'logout', 'view', 'login');
  }

  public function signup()
  {
    if ($this->request->is('post')) {
      $this->User->create();
      if ($this->User->save($this->request->data)) {
        $this->Flash->success(__('登録完了しました'));
        return $this->redirect(array('controller' => 'Remarks', 'action' => 'index'));
      }
      $this->Flash->error(
        __('登録に失敗しました。もう一度お試しください。')
      );
    }
  }

  public function login()
  {
    if ($this->request->is('post')) {
      if ($this->Auth->login($this->request->data['User'])) {
        return $this->redirect($this->Auth->redirectUrl());
        $this->Flash->success(__('ログインしました'));
      } else {
        $this->Flash->error(__('ログインに失敗しました。もう一度試してください。'));
      }
    }
  }

  public function logout()
  {
    $this->redirect($this->Auth->logout());
  }

  public function view($id = null)
  {
    // $user = $this->User->find('all', array(
    //   'conditions' => array(
    //     'User.id' => $id
    //   ),
    //   'contain' => array(
    //     'Remarks', 'Users'
    // )));
    $this->User->id = $id;
    if (!$this->User->exists()) {
      throw new NotFoundException(__('Invalid user'));
    }
    $this->set('user', $this->User->findById($id));
  }



}

?>