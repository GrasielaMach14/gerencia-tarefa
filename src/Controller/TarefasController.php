<?php

namespace App\Controller;

class TarefasController extends AppController
{

    public function index()
    {
        $tarefas = $this->Tarefas->find('all');
        $this->set(compact('tarefas'));
    }
    public function view($id = null)
    {
        $tarefa = $this->Tarefas->get($id);
        $this->set(compact('tarefa'));
    }
    public function isAuthorized($user)
    {
        // Todos os usuários registrados podem adicionar artigos
        if ($this->request->getParam('action') === 'add') {
            return true;
        }
        // Apenas o proprietário do artigo pode editar e excluí
        if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            $tarefaId = (int)$this->request->getParam('pass.0');
            if ($this->Tarefas->isOwnedBy($tarefaId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
     public function add()
    {
        $tarefa = $this->Tarefas->newEntity();
        if ($this->request->is('post')) {
            $tarefa = $this->Tarefas->patchEntity($tarefa, $this->request->getData());
            $tarefa->user_id = $this->Auth->user('id');
            if ($this->Tarefas->save($tarefa)) {
                $this->Flash->success(__('Sua tarefa foi salva.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não é possível adicionar a sua tarefa.'));
        }
        $this->set('tarefa', $tarefa);
    }
    public function edit($id = null)
    {
        $tarefa = $this->Tarefas->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Tarefas->patchEntity($tarefa, $this->request->getData());
            if ($this->Tarefas->save($tarefa)) {
                $this->Flash->success(__('Sua tarefa foi atualizada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Sua tarefa não pôde ser atualizada.'));
        }

        $this->set('tarefa', $tarefa);
    }
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $tarefa = $this->Tarefas->get($id);
        if ($this->Tarefas->delete($tarefa)) {
            $this->Flash->success(__('A tarefa com id: {0} foi deletada.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
}
?>