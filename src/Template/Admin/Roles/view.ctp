<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= __('Roles'); ?></h3>

                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <?= __('Actions'); ?>&nbsp;
                            <span class="fa fa-caret-down"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id]); ?></li>
                            <li><?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]); ?></li>
                            <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Role'), ['action' => 'add']); ?></li>
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
                        <td><?= $this->Number->format($role->id); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Name'); ?></th>
                        <td><?= h($role->name); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
