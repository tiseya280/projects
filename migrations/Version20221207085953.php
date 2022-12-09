<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221207085953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auteur (id INT AUTO_INCREMENT NOT NULL, compte_id INT DEFAULT NULL, date_naissance VARCHAR(200) NOT NULL, ville VARCHAR(100) NOT NULL, photo VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_55AB140F2C56620 (compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE auteur_c (id INT AUTO_INCREMENT NOT NULL, date_naissance VARCHAR(200) NOT NULL, ville VARCHAR(100) NOT NULL, photo VARCHAR(100) NOT NULL, nb_livre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE auteur_d (id INT AUTO_INCREMENT NOT NULL, date_naissance VARCHAR(200) NOT NULL, ville VARCHAR(100) NOT NULL, photo VARCHAR(100) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(100) NOT NULL, mot_de_passe VARCHAR(100) NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, msg VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, livre_id INT DEFAULT NULL, int_genre VARCHAR(200) NOT NULL, UNIQUE INDEX UNIQ_835033F837D925CB (livre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre (id INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, genre_id INT DEFAULT NULL, contact_id INT DEFAULT NULL, titre VARCHAR(100) NOT NULL, edition VARCHAR(100) NOT NULL, nb_pages INT NOT NULL, INDEX IDX_AC634F9960BB6FE6 (auteur_id), INDEX IDX_AC634F994296D31F (genre_id), INDEX IDX_AC634F99E7A1254A (contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE auteur ADD CONSTRAINT FK_55AB140F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE genre ADD CONSTRAINT FK_835033F837D925CB FOREIGN KEY (livre_id) REFERENCES livre (id)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F9960BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F994296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE auteur DROP FOREIGN KEY FK_55AB140F2C56620');
        $this->addSql('ALTER TABLE genre DROP FOREIGN KEY FK_835033F837D925CB');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F9960BB6FE6');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F994296D31F');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F99E7A1254A');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE auteur_c');
        $this->addSql('DROP TABLE auteur_d');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
