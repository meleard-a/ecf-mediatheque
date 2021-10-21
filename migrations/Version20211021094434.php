<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021094434 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_CBE5A331D4C006C8');
        $this->addSql('DROP INDEX IDX_CBE5A331C54C8C93');
        $this->addSql('DROP INDEX IDX_CBE5A331F675F31B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__book AS SELECT id, author_id, type_id, borrow_id, title, cover, publication_date, description FROM book');
        $this->addSql('DROP TABLE book');
        $this->addSql('CREATE TABLE book (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER NOT NULL, type_id INTEGER NOT NULL, borrow_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, cover VARCHAR(80) NOT NULL COLLATE BINARY, publication_date DATE NOT NULL, description VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_CBE5A331F675F31B FOREIGN KEY (author_id) REFERENCES author (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_CBE5A331C54C8C93 FOREIGN KEY (type_id) REFERENCES type_book (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_CBE5A331D4C006C8 FOREIGN KEY (borrow_id) REFERENCES borrow (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO book (id, author_id, type_id, borrow_id, title, cover, publication_date, description) SELECT id, author_id, type_id, borrow_id, title, cover, publication_date, description FROM __temp__book');
        $this->addSql('DROP TABLE __temp__book');
        $this->addSql('CREATE INDEX IDX_CBE5A331D4C006C8 ON book (borrow_id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331C54C8C93 ON book (type_id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331F675F31B ON book (author_id)');
        $this->addSql('ALTER TABLE user ADD COLUMN firstname VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD COLUMN lastname VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD COLUMN birthdate VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD COLUMN address VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD COLUMN zipcode INTEGER NOT NULL');
        $this->addSql('ALTER TABLE user ADD COLUMN city VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_CBE5A331F675F31B');
        $this->addSql('DROP INDEX IDX_CBE5A331C54C8C93');
        $this->addSql('DROP INDEX IDX_CBE5A331D4C006C8');
        $this->addSql('CREATE TEMPORARY TABLE __temp__book AS SELECT id, author_id, type_id, borrow_id, title, cover, publication_date, description FROM book');
        $this->addSql('DROP TABLE book');
        $this->addSql('CREATE TABLE book (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER NOT NULL, type_id INTEGER NOT NULL, borrow_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, cover VARCHAR(80) NOT NULL, publication_date DATE NOT NULL, description VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO book (id, author_id, type_id, borrow_id, title, cover, publication_date, description) SELECT id, author_id, type_id, borrow_id, title, cover, publication_date, description FROM __temp__book');
        $this->addSql('DROP TABLE __temp__book');
        $this->addSql('CREATE INDEX IDX_CBE5A331F675F31B ON book (author_id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331C54C8C93 ON book (type_id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331D4C006C8 ON book (borrow_id)');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, email, roles, password FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO user (id, email, roles, password) SELECT id, email, roles, password FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }
}
