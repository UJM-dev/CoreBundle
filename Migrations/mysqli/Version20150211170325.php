<?php

namespace Claroline\CoreBundle\Migrations\mysqli;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated migration based on mapping information: modify it with caution
 *
 * Generation date: 2015/02/11 05:03:27
 */
class Version20150211170325 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("
            CREATE TABLE claro_panel_facet (
                id INT AUTO_INCREMENT NOT NULL, 
                facet_id INT NOT NULL, 
                name VARCHAR(255) NOT NULL, 
                position INT NOT NULL, 
                isDefaultCollapsed TINYINT(1) NOT NULL, 
                INDEX IDX_DA3985FFC889F24 (facet_id), 
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            ALTER TABLE claro_panel_facet 
            ADD CONSTRAINT FK_DA3985FFC889F24 FOREIGN KEY (facet_id) 
            REFERENCES claro_facet (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            ALTER TABLE claro_field_facet 
            DROP FOREIGN KEY FK_F6C21DB2FC889F24
        ");
        $this->addSql("
            DROP INDEX IDX_F6C21DB2FC889F24 ON claro_field_facet
        ");
        $this->addSql("
            ALTER TABLE claro_field_facet CHANGE facet_id panelFacet_id INT NOT NULL
        ");
        $this->addSql("
            ALTER TABLE claro_field_facet 
            ADD CONSTRAINT FK_F6C21DB2E99038C0 FOREIGN KEY (panelFacet_id) 
            REFERENCES claro_panel_facet (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            CREATE INDEX IDX_F6C21DB2E99038C0 ON claro_field_facet (panelFacet_id)
        ");
    }

    public function down(Schema $schema)
    {
        $this->addSql("
            ALTER TABLE claro_field_facet 
            DROP FOREIGN KEY FK_F6C21DB2E99038C0
        ");
        $this->addSql("
            DROP TABLE claro_panel_facet
        ");
        $this->addSql("
            DROP INDEX IDX_F6C21DB2E99038C0 ON claro_field_facet
        ");
        $this->addSql("
            ALTER TABLE claro_field_facet CHANGE panelfacet_id facet_id INT NOT NULL
        ");
        $this->addSql("
            ALTER TABLE claro_field_facet 
            ADD CONSTRAINT FK_F6C21DB2FC889F24 FOREIGN KEY (facet_id) 
            REFERENCES claro_facet (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            CREATE INDEX IDX_F6C21DB2FC889F24 ON claro_field_facet (facet_id)
        ");
    }
}