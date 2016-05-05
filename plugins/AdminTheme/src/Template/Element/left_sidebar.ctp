<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header"><?= __('MAIN NAVIGATION'); ?></li>

            <li class="<?= (isset($adminDashboard)) ? 'active' : ''; ?>">
                <?= $this->Html->link(__('<i class="fa fa-dashboard"></i> <span>Dashboard</span>'), ['plugin' => false, 'controller' => 'Dashboard', 'action' => 'index', 'prefix' => 'admin'], ['escape' => false]); ?>
            </li>

            <li class="<?= (isset($adminProposedTranslations)) ? 'active' : ''; ?>">
                <?= $this->Html->link(__('<i class="fa fa-book"></i> <span>Proposed Translations</span>'), ['plugin' => false, 'controller' => 'ProposedTranslations', 'action' => 'index', 'prefix' => 'admin'], ['escape' => false]); ?>
            </li>

            <li class="<?= (isset($adminAnswers)) ? 'active' : ''; ?>">
                <?= $this->Html->link(__('<i class="fa fa-language"></i> <span>Answers</span>'), ['plugin' => false, 'controller' => 'Answers', 'action' => 'index', 'prefix' => 'admin'], ['escape' => false]); ?>
            </li>

            <li class="treeview <?= (isset($adminMenu)) ? 'active' : ''; ?>">
                <?= $this->Html->link(__('<i class="fa fa-cogs"></i> <span>General</span>') . '<i class="fa fa-angle-left pull-right"></i>', ['#'], ['escape' => false]); ?>
                <ul class="treeview-menu">
                    <li class="<?= (isset($adminMenu['levels'])) ? 'active' : ''; ?>">
                        <?= $this->Html->link(__('<span>Levels</span>'), ['plugin' => false, 'controller' => 'Levels', 'action' => 'index', 'prefix' => 'admin'], ['escape' => false]); ?>
                    </li>
                    <li class="<?= (isset($adminMenu['categories'])) ? 'active' : ''; ?>">
                        <?= $this->Html->link(__('<span>Categories</span>'), ['plugin' => false, 'controller' => 'Categories', 'action' => 'index', 'prefix' => 'admin'], ['escape' => false]); ?>
                    </li>
                    <li class="<?= (isset($adminMenu['words'])) ? 'active' : ''; ?>">
                        <?= $this->Html->link(__('<span>Words</span>'), ['plugin' => false, 'controller' => 'Words', 'action' => 'index', 'prefix' => 'admin'], ['escape' => false]); ?>
                    </li>
                    <li class="<?= (isset($adminMenu['roles'])) ? 'active' : ''; ?>">
                        <?= $this->Html->link(__('<span>Roles</span>'), ['plugin' => false, 'controller' => 'Roles', 'action' => 'index', 'prefix' => 'admin'], ['escape' => false]); ?>
                    </li>
                    <li class="<?= (isset($adminMenu['users'])) ? 'active' : ''; ?>">
                        <?= $this->Html->link(__('<span>Users</span>'), ['plugin' => false, 'controller' => 'Users', 'action' => 'index', 'prefix' => 'admin'], ['escape' => false]); ?>
                    </li>
                    <li class="<?= (isset($adminMenu['translationTypes'])) ? 'active' : ''; ?>">
                        <?= $this->Html->link(__('<span>Translation Types</span>'), ['plugin' => false, 'controller' => 'TranslationTypes', 'action' => 'index', 'prefix' => 'admin'], ['escape' => false]); ?>
                    </li>
                    <li class="<?= (isset($adminMenu['sessions'])) ? 'active' : ''; ?>">
                        <?= $this->Html->link(__('<span>Sessions</span>'), ['plugin' => false, 'controller' => 'Sessions', 'action' => 'index', 'prefix' => 'admin'], ['escape' => false]); ?>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
</aside>