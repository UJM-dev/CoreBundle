<?php

namespace Claroline\CoreBundle\Migrations\ibm_db2;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated migration based on mapping information: modify it with caution
 *
 * Generation date: 2015/04/01 03:39:52
 */
class Version20150401153949 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("
            CREATE TABLE claro_home_tab_roles (
                hometab_id INTEGER NOT NULL, 
                role_id INTEGER NOT NULL, 
                PRIMARY KEY(hometab_id, role_id)
            )
        ");
        $this->addSql("
            CREATE INDEX IDX_B81359F3CCE862F ON claro_home_tab_roles (hometab_id)
        ");
        $this->addSql("
            CREATE INDEX IDX_B81359F3D60322AC ON claro_home_tab_roles (role_id)
        ");
        $this->addSql("
            ALTER TABLE claro_home_tab_roles 
            ADD CONSTRAINT FK_B81359F3CCE862F FOREIGN KEY (hometab_id) 
            REFERENCES claro_home_tab (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            ALTER TABLE claro_home_tab_roles 
            ADD CONSTRAINT FK_B81359F3D60322AC FOREIGN KEY (role_id) 
            REFERENCES claro_role (id) 
            ON DELETE CASCADE
        ");
    }

    public function down(Schema $schema)
    {
        $this->addSql("
            DROP TABLE claro_home_tab_roles
        ");
    }
}