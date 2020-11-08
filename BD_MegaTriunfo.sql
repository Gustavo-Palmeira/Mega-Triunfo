CREATE DATABASE BD_MegaTriunfo;

GO

USE BD_MegaTriunfo;

CREATE TABLE deck (
	deckId BIGINT NOT NULL PRIMARY KEY IDENTITY(1,1),
	deckName VARCHAR(255) UNIQUE,
	deckAtt1Name VARCHAR(255),
	deckAtt2Name VARCHAR(255),
	deckAtt3Name VARCHAR(255),
	deckAtt4Name VARCHAR(255),
	deckPhoto VARBINARY(MAX)
);

CREATE TABLE card (
	cardId BIGINT NOT NULL PRIMARY KEY IDENTITY(1,1),
	cardName VARCHAR(255),
	cardAtt1Value TINYINT,
	cardAtt2Value TINYINT,
	cardAtt3Value TINYINT,
	cardAtt4Value TINYINT,
	cardPhoto VARBINARY(MAX),
	deckId BIGINT FOREIGN KEY REFERENCES deck(deckId)
);

CREATE TABLE specialAttribute (
	specialAttId BIGINT NOT NULL PRIMARY KEY IDENTITY(1,1),
	specialAttName VARCHAR(255),
	specialAttReference VARCHAR(13),
	specialAttValue TINYINT,
	cardId BIGINT NOT NULL FOREIGN KEY REFERENCES card(cardId)
)

CREATE TABLE userLogin (
	userId BIGINT NOT NULL PRIMARY KEY IDENTITY(1,1),
	userName VARCHAR(255) UNIQUE,
	userPassword VARCHAR(255),
	userEmail VARCHAR(255) UNIQUE,
	userLevel TINYINT CHECK (userLevel >=1 AND userLevel<=3)
	);

INSERT INTO userLogin (userName, userPassword, userEmail, userLevel)
VALUES ('admin','admin','gabsato02@gmail.com',1);

INSERT INTO deck (deckName, deckAtt1Name, deckAtt2Name, deckAtt3Name, deckAtt4Name, deckPhoto)
VALUES ('Deck de Teste', 'Atributo de Deck 1', 'Atributo de Deck 2', 'Atributo de Deck 3', 'Atributo de Deck 4', CAST ('Caminho da foto do deck' AS VARBINARY));

INSERT INTO card (cardName, cardAtt1Value, cardAtt2Value, cardAtt3Value, cardAtt4Value, cardPhoto, deckId)
VALUES ('Card de Teste', 10, 20, 30, 40, CAST ('Caminho da foto do card' AS VARBINARY), 1);

INSERT INTO specialAttribute (specialAttName, specialAttReference, specialAttValue, cardId)
VALUES ('Atributo especial de teste', 'Atributo refe', 10, 1);