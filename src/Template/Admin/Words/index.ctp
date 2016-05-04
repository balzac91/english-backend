<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= __('Words'); ?></h3>

                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <?= __('Actions'); ?>&nbsp;
                            <span class="fa fa-caret-down"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><?= $this->Html->link(__('New Word'), ['action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Proposed Translations'), ['controller' => 'ProposedTranslations', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Proposed Translation'), ['controller' => 'ProposedTranslations', 'action' => 'add']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center"><?= $this->Paginator->sort('id'); ?></th>
                        <th class="text-center"><?= $this->Paginator->sort('category_id'); ?></th>
                        <th class="text-center"><?= $this->Paginator->sort('level_id'); ?></th>
                        <th class="text-center"><?= $this->Paginator->sort('polish'); ?></th>
                        <th class="text-center"><?= $this->Paginator->sort('english'); ?></th>
                        <th class="text-center"><?= $this->Paginator->sort('created'); ?></th>
                        <th class="text-center"><?= $this->Paginator->sort('modified'); ?></th>
                        <th class="text-center"><?= __('Actions'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($words as $word): ?>
                        <tr>
                            <td class="text-center"><?= $this->Number->format($word->id) ?></td>
                            <td class="text-center"><?= $word->has('category') ? $this->Html->link($word->category->name, ['controller' => 'Categories', 'action' => 'view', $word->category->id]) : '' ?></td>
                            <td class="text-center"><?= $word->has('level') ? $this->Html->link($word->level->name, ['controller' => 'Levels', 'action' => 'view', $word->level->id]) : '' ?></td>
                            <td class="text-center"><?= h($word->polish) ?></td>
                            <td class="text-center"><?= h($word->english) ?></td>
                            <td class="text-center"><?= h($word->created) ?></td>
                            <td class="text-center"><?= h($word->modified) ?></td>
                            <td class="text-center">
                                <?= $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), ['action' => 'view', $word->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view']); ?>
                                <?= $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), ['action' => 'edit', $word->id], ['class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit']); ?>
                                <?= $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), ['action' => 'delete', $word->id], ['confirm' => __('Are you sure you want to delete # {0}?', $word->id), 'class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete']); ?>
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
