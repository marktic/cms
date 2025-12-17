<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CmsSitesTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table_name = 'mkt_cms_site_links';
        $exists = $this->hasTable($table_name);
        if ($exists) {
            return;
        }
        $table = $this->table($table_name);
        $table
            ->addColumn('site_id', 'integer', ['null' => true])
            ->addColumn('link_type', 'string', ['null' => true])
            ->addColumn('link_id', 'integer', ['null' => true])
            ->addForeignKey('site_id', 'mkt_cms_sites', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
            ->addIndex(['site_id'])
            ->addIndex(['link_type', 'link_id'])
            ;

        $table->save();
    }
}
