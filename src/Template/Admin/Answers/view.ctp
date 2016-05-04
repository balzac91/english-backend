<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= __('Answers'); ?></h3>

                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <?= __('Actions'); ?>&nbsp;
                            <span class="fa fa-caret-down"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><?= $this->Html->link(__('Edit Answer'), ['action' => 'edit', $answer->id]); ?></li>
                            <li><?= $this->Form->postLink(__('Delete Answer'), ['action' => 'delete', $answer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $answer->id)]); ?></li>
                            <li><?= $this->Html->link(__('List Answers'), ['action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Answer'), ['action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Words'), ['controller' => 'Words', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Word'), ['controller' => 'Words', 'action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?= __('Id'); ?></th>
                        <td><?= $this->Number->format($answer->id); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Type'); ?></th>
                        <td><?= $this->Number->format($answer->type); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Word'); ?></th>
                        <td><?= $answer->has('word') ? $this->Html->link($answer->word->id, ['controller' => 'Words', 'action' => 'view', $answer->word->id]) : ''; ?></td>
                    </tr>
                    <tr>
                        <th><?= __('User'); ?></th>
                        <td><?= $answer->has('user') ? $this->Html->link($answer->user->id, ['controller' => 'Users', 'action' => 'view', $answer->user->id]) : ''; ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created'); ?></th>
                        <td><?= h($answer->created); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified'); ?></th>
                        <td><?= h($answer->modified); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Correct'); ?></th>
                        <td><?= $answer->correct ? __('<i class="fa fa-check text-green"></i>') : __('<i class="fa fa-times text-red"></i>'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
