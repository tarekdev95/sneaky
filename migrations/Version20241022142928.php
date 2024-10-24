<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241022142928 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, user_name_id INT NOT NULL, orderdate DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_F5299398291A82DC (user_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_articles (order_id INT NOT NULL, articles_id INT NOT NULL, INDEX IDX_5E25D3D98D9F6D38 (order_id), INDEX IDX_5E25D3D91EBAF6CC (articles_id), PRIMARY KEY(order_id, articles_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, fullname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, phone_number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398291A82DC FOREIGN KEY (user_name_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE order_articles ADD CONSTRAINT FK_5E25D3D98D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_articles ADD CONSTRAINT FK_5E25D3D91EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398291A82DC');
        $this->addSql('ALTER TABLE order_articles DROP FOREIGN KEY FK_5E25D3D98D9F6D38');
        $this->addSql('ALTER TABLE order_articles DROP FOREIGN KEY FK_5E25D3D91EBAF6CC');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_articles');
        $this->addSql('DROP TABLE users');
    }
}
