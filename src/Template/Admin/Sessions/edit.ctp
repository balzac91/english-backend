<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= __('Edit Session') ?></h3>

                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <?= __('Actions'); ?>&nbsp;
                            <span class="fa fa-caret-down"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><?= $this->Form->postLink(__('Delete'),
                                    ['action' => 'delete', $session->id],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $session->id)]); ?></li>
                            <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <?= $this->Form->create($session); ?>
                <div class="form-group">
                    <?= $this->Form->input('user_id', ['options' => $users, 'class' => 'form-control']); ?>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <?= $this->Form->input('valid_to', ['type' => 'text', 'class' => 'form-control bootstrap-datetimepicker']); ?>
                    </div>
                </div>

                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary pull-right']); ?>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
