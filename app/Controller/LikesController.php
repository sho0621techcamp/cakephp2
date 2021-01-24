<?php
App::uses('AppController', 'Controller');
class LikeController extends AppController {


  public function add()
  {
    $like = $this->Like->create();

    if ($this->request->is('ajax')) {
      $received_data = $this->request->data;

      $like->user_id = $this->request->data['Like']['user_id'];
      $like->remark_id = $this->request->data['Like']['remark_id'];

      if ($this->Like->save($like)) {
        $count = $this->Like->countLike($like->remark_id)->count();

        $this->response->body(json_encode(array(
          'received_data' => $received_data,
          'count' => $count
        )));
        return;
      }
      $this->Flash->error(__('いいね！できませんでした。もう一度試してください。'));
    }
  }

  public function delete()
  {
    if ($this->request->is('ajax')) {
      $received_data = $this->request->data;

      $param = array(
        'user_id' => $this->request->data['Like']['user_id'],
        'remark_id' => $this->request->data['Like']['remark_id']
      );

      if ($this->Like->deleteAll($param)) {
        $count = $this->Like->countLike($this->request->data['Like']['remark_id'])->count();

        $this->response->body(json_encode(array(
          'received_data' => $received_data,
          'count' => $count
        )));
        return;
      } else {
        $this->Flash->error(__('いいね！の取り消しに失敗しました。'));
      }
    }
  }
}
?>