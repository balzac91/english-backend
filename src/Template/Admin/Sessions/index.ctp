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
                            <li><?= $this->Html->link(__('New Session'), ['action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center"><?= $this->Paginator->sort('id'); ?></th>
                        <th class="text-center"><?= $this->Paginator->sort('user_id'); ?></th>
                        <th class="text-center"><?= $this->Paginator->sort('valid_to'); ?></th>
                        <th class="text-center"><?= $this->Paginator->sort('created'); ?></th>
                        <th class="text-center"><?= $this->Paginator->sort('modified'); ?></th>
                        <th class="text-center"><?= __('Actions'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sessions as $session): ?>
                        <tr>
                            <td class="text-center"><?= h($session->id) ?></td>
                            <td class="text-center"><?= $session->has('user') ? $this->Html->link($session->user->id, ['controller' => 'Users', 'action' => 'view', $session->user->id]) : '' ?></td>
                            <td class="text-center"><?= h($session->valid_to) ?></td>
                            <td class="text-center"><?= h($session->created) ?></td>
                            <td class="text-center"><?= h($session->modified) ?></td>
                            <td class="text-center">
                                <?= $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), ['action' => 'view', $session->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view']); ?>
                                <?= $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), ['action' => 'edit', $session->id], ['class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit']); ?>
                                <?= $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), ['action' => 'delete', $session->id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->id), 'class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete']); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-4">
                        <div class="dataTables_info pagination"><?= $this->Paginator->counter('Showing {{start}} to {{end}} of {{count}} entries'); ?></div>
                    </div>
                    <div class="col-xs-8">
                        <div class="dataTables_paginate paging_simple_numbers">
                            <ul class="pagination pull-right">
                                <li class="paginate_button previous disabled">
                                    <?= $this->Paginator->prev('← ' . __('Previous')); ?>
                                </li>
                                <?= $this->Paginator->numbers() ?>
                                <li class="paginate_button next">
                                    <?= $this->Paginator->next(__('Next') . ' →'); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
