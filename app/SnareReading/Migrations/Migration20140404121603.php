<?php

namespace SnareReading\Migrations;

use Neptune\Database\Migration\AbstractMigration;

class Migration20140404121603 extends AbstractMigration {

    protected $description = 'Create scores table';

    public function up()
    {
        $sql = 'CREATE TABLE scores (';
        $sql .= 'id int not null auto_increment,';
        $sql .= 'PRIMARY KEY(id),';
        $sql .= 'title varchar(255) not null,';
        $sql .= 'notes text not null)';
        $this->addSql($sql);
    }

    public function down()
    {
        $sql = 'DROP TABLE scores';
        $this->addSql($sql);
    }

}
