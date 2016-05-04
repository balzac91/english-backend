<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= __('Sessions'); ?></h3>

                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <?= __('Actions'); ?>&nbsp;
                            <span class="fa fa-caret-down"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><?= $this->Html->link(__('Edit Session'), ['action' => 'edit', $session->id]); ?></li>
                            <li><?= $this->Form->postLink(__('Delete Session'), ['action' => 'delete', $session->id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->id)]); ?></li>
                            <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Session'), ['action' => 'add']); ?></li>
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
                        <td><?= h($session->id); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('User'); ?></th>
                        <td><?= $session->has('user') ? $this->Html->link($session->user->email, ['controller' => 'Users', 'action' => 'view', $session->user->id]) : ''; ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Valid To'); ?></th>
                        <td><?= h($session->valid_to); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created'); ?></th>
                        <td><?= h($session->created); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified'); ?></th>
                        <td><?= h($session->modified); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
