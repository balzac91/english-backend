<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= __('Add User') ?></h3>

                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <?= __('Actions'); ?>&nbsp;
                            <span class="fa fa-caret-down"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><?= $this->Html->link(__('List Users'), ['action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <?= $this->Form->create($user); ?>
                <div class="form-group">
                    <?= $this->Form->input('role_id', ['options' => $roles, 'class' => 'form-control']); ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->input('login', ['class' => 'form-control']); ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->input('email', ['class' => 'form-control']); ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->input('password', ['class' => 'form-control']); ?>
                </div>

                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary pull-right']); ?>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
