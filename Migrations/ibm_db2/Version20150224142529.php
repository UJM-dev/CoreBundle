<?php

namespace Claroline\CoreBundle\Migrations\ibm_db2;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated migration based on mapping information: modify it with caution
 *
 * Generation date: 2015/02/24 02:25:30
 */
class Version20150224142529 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("
            ALTER TABLE claro_bundle 
            ADD COLUMN \"type\" VARCHAR(50) NOT NULL WITH DEFAULT 
            ADD COLUMN authors CLOB(1M) NOT NULL WITH DEFAULT 
            ADD COLUMN description CLOB(1M) DEFAULT NULL 
            ADD COLUMN targetDir CLOB(1M) NOT NULL WITH DEFAULT 
            ADD COLUMN basePath CLOB(1M) NOT NULL WITH DEFAULT 
            ADD COLUMN license CLOB(1M) NOT NULL WITH DEFAULT 
            ADD COLUMN isInstalled SMALLINT NOT NULL WITH DEFAULT
        ");
        $this->addSql("
            COMMENT ON COLUMN claro_bundle.authors IS '(DC2Type:json_array)'
        ");
        $this->addSql("
            COMMENT ON COLUMN claro_bundle.license IS '(DC2Type:json_array)'
        ");
    }

    public function down(Schema $schema)
    {
        $this->addSql("
            ALTER TABLE claro_bundle 
            DROP COLUMN \"type\" 
            DROP COLUMN authors 
            DROP COLUMN description 
            DROP COLUMN targetDir 
            DROP COLUMN basePath 
            DROP COLUMN license 
            DROP COLUMN isInstalled
        ");
        $this->addSql("
            CALL SYSPROC.ADMIN_CMD ('REORG TABLE claro_bundle')
        ");
    }
}