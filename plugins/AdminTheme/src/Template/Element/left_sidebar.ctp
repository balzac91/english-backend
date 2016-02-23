<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <?= $this->Html->image('user2-160x160.jpg', array('class' => 'img-circle', 'alt' => 'User Image')); ?>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <?= $this->Html->link('<i class="fa fa-circle text-success"></i> Online', array('#'), array('escape' => false)); ?>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header"><?= __('MAIN NAVIGATION'); ?></li>

            <li class="treeview <?= (isset($adminMenu)) ? 'active' : ''; ?>">
                <?= $this->Html->link(__('General') . '<i class="fa fa-angle-left pull-right"></i>', array('#'), array('escape' => false)); ?>
                <ul class="treeview-menu">
                    <li class="<?= (isset($adminMenu['levels'])) ? 'active' : ''; ?>">
                        <?= $this->Html->link(__('Levels'), array('plugin' => false, 'controller' => 'Levels', 'action' => 'index')); ?>
                    </li>
                    <li class="<?= (isset($adminMenu['categories'])) ? 'active' : ''; ?>">
                        <?= $this->Html->link(__('Categories'), array('plugin' => false, 'controller' => 'Categories', 'action' => 'index')); ?>
                    </li>
                    <li class="<?= (isset($adminMenu['words'])) ? 'active' : ''; ?>">
                        <?= $this->Html->link(__('Words'), array('plugin' => false, 'controller' => 'Words', 'action' => 'index')); ?>
                    </li>
                    <li class="<?= (isset($adminMenu['roles'])) ? 'active' : ''; ?>">
                        <?= $this->Html->link(__('Roles'), array('plugin' => false, 'controller' => 'Roles', 'action' => 'index')); ?>
                    </li>
                    <li class="<?= (isset($adminMenu['users'])) ? 'active' : ''; ?>">
                        <?= $this->Html->link(__('Users'), array('plugin' => false, 'controller' => 'Users', 'action' => 'index')); ?>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
</aside>