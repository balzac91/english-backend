<?php

use Phinx\Migration\AbstractMigration;

class Levels extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */

    public function up()
    {
        $levels = $this->table('levels');
        $levels->insert(array(
            array('id' => null, 'name' => 'a1'),
            array('id' => null, 'name' => 'a2'),
            array('id' => null, 'name' => 'b1'),
            array('id' => null, 'name' => 'b2'),
            array('id' => null, 'name' => 'c1'),
            array('id' => null, 'name' => 'c2'),
        ));
        $levels->saveData();
    }

    public function down()
    {
        $this->execute('TRUNCATE levels');
    }
}
