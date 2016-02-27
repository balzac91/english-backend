<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= __('Users'); ?></h3>

                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <?= __('Actions'); ?>&nbsp;
                            <span class="fa fa-caret-down"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]); ?></li>
                            <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]); ?></li>
                            <li><?= $this->Html->link(__('List Users'), ['action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New User'), ['action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Proposed Translations'), ['controller' => 'ProposedTranslations', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Proposed Translation'), ['controller' => 'ProposedTranslations', 'action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?= __('Id'); ?></th>
                        <td><?= $this->Number->format($user->id); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Role'); ?></th>
                        <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : ''; ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Login'); ?></th>
                        <td><?= h($user->login); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Email'); ?></th>
                        <td><?= h($user->email); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Password'); ?></th>
                        <td><?= h($user->password); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created'); ?></th>
                        <td><?= h($user->created); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified'); ?></th>
                        <td><?= h($user->modified); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
