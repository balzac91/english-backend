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
                            <li><?= $this->Html->link(__('New Role'), ['action' => 'add']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center"><?= $this->Paginator->sort('id'); ?></th>
                        <th class="text-center"><?= $this->Paginator->sort('name'); ?></th>
                        <th class="text-center"><?= __('Actions'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($roles as $role): ?>
                        <tr>
                            <td class="text-center"><?= $this->Number->format($role->id) ?></td>
                            <td class="text-center"><?= h($role->name) ?></td>
                            <td class="text-center">
                                <?= $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), ['action' => 'view', $role->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view']); ?>
                                <?= $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), ['action' => 'edit', $role->id], ['class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit']); ?>
                                <?= $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id), 'class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete']); ?>
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
