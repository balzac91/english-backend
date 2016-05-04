<?php

use Phinx\Migration\AbstractMigration;

class FillTranslationTypes extends AbstractMigration
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
        $translationTypes = $this->table('translation_types');
        $translationTypes->insert(array(
            array('id' => null, 'name' => 'English to polish'),
            array('id' => null, 'name' => 'Polish to english')
        ));
        $translationTypes->saveData();
    }

    public function down()
    {
        $this->execute('TRUNCATE translation_types');
    }
}
