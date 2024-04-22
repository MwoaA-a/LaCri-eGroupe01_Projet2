<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240420175307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE peche');
        $this->addSql('DROP TABLE qualite');
        $this->addSql('ALTER TABLE etat_lots CHANGE Label label VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE facture ADD id_lot INT NOT NULL');
        $this->addSql('ALTER TABLE lots ADD equa INT DEFAULT NULL, DROP IdQualite');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE peche (idDatepeche DATE NOT NULL, idBateau INT NOT NULL, INDEX idBateau (idBateau), PRIMARY KEY(idDatepeche, idBateau)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE qualite (id CHAR(1) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, libelle VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('ALTER TABLE facture DROP id_lot');
        $this->addSql('ALTER TABLE etat_lots CHANGE label Label VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE lots ADD IdQualite VARCHAR(1) DEFAULT NULL, DROP equa');
    }
}
