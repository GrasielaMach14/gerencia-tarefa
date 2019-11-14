<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TarefasTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('nome')
            ->notEmpty('descricao');

        return $validator;
    }
    public function isOwnedBy($tarefaId, $userId)
    {
        return $this->exists(['id' => $tarefaId, 'user_id' => $userId]);
    }
}
?>