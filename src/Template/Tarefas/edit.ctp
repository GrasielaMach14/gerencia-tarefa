<h1>Editar Tarefa</h1>
<?php
    echo $this->Form->create($tarefa);
    echo $this->Form->input('nome');
    echo $this->Form->input('descricao', ['label' => 'Descrição','rows' => '3']);
?>
<div class="container">
    <div class="row" style="display:flex;">
        <div class="col-sm">
            <?php
               $this->Form->templates(
                ['data_criacao' => '{{day}}{{month}}{{year}}']
              );
              echo $this->Form->input('data_criacao', ['label' => 'Data de criação:','type'=>'date', 'class' => 'label', 'style' => 'font-weight: bold;']);
            ?>
        </div>
        <div class="col-sm" style="margin-left: 25%;">
            <label class="labelS" style="font-weight: bold;">Correção da tarefa:</label>
            <?php
                echo $this->Form->radio('realizado', ['Pendente', 'Realizada']);
            ?>
        </div>
    </div>
</div>
<?php
    echo $this->Form->button(__('Alterar'));
    echo $this->Form->end();
?>  
<a href='../index'><button>Voltar</button></a>
