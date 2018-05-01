DROP TABLE IF EXISTS Habitat CASCADE;
DROP SEQUENCE IF EXISTS habit_seq;

CREATE SEQUENCE habit_seq;
CREATE TABLE Habitat (
  Habitat_ID int NOT NULL DEFAULT NEXTVAL ('habit_seq'),
  Temperature char(50) NOT NULL DEFAULT ' Celsius',
  Pressure char(50) NOT NULL DEFAULT ' bar',
  Salinity char(50) NOT NULL DEFAULT ' %',
  Volume char(50) NOT NULL DEFAULT ' L',
  PRIMARY KEY (Habitat_ID)
);

INSERT INTO Habitat (Temperature, Pressure, Salinity, Volume)
VALUES ('9 Celsius', '450 bar', '70%', '20000000L'),
('2 Celsius', '1235.5 bar', '80%', '70000000L'),
('40 Celsius', '6.1 bar', '63%', '4500000L'),
('8 Celsius', '425 bar', '69%', '19500000L'),
('17 Celsius', '101 bar', '65%', '6500000L'),
('6 Celsius', '680 bar', '75%', '60500000L'),
('4 Celsius', '1235.5 bar', '76%', '76500000L'),
('37 Celsius', '6.1 bar', '62%', '4000000L'),
('13 Celsius', '98 bar', '68%', '7000000L');

DROP TABLE IF EXISTS Aquariums CASCADE;
DROP SEQUENCE IF EXISTS aqua_seq;

CREATE SEQUENCE aqua_seq;
CREATE TABLE Aquariums (
  Name char(50) NOT NULL DEFAULT 'AQUARIUM',
  Location char(50) NOT NULL DEFAULT 'SIDE OF THE ROAD',
  Aqua_ID int NOT NULL DEFAULT NEXTVAL ('aqua_seq'),
  Display_ID int NOT NULL,
  PRIMARY KEY (Aqua_ID),
  FOREIGN KEY (Display_ID) REFERENCES Habitat (Habitat_ID)
);

INSERT INTO Aquariums (Name, Location, Display_ID)
VALUES ('Fraser Center of Marine Life', '1234 FrontRow Ln', 5),
('Copeland Aquarium', '5678 Buhber Row', 9),
('Kahlils Crazy Aquarium', '9087 Gibran St', 3),
('Ventures to the Deep Blue', '65432 Redrock Ct', 7),
('Tlaloc Bay Aquarium', '1765 Kippen Ln', 1);

DROP TABLE IF EXISTS Animals CASCADE;

CREATE TYPE depthname AS ENUM ('Epipelagic Zone', 'Mesopelagic Zone', 'Bathypelagic Zone', 'Abyssopelagic Zone', 'Hadalpelagic Zone');
CREATE TYPE skeletontype AS ENUM ('Invertebrate', 'Vertebrate', 'Cartilaginous', 'None');
CREATE TABLE Animals (
  Latin_Name char(50) NOT NULL,
  English_Name char(50) NOT NULL,
  Colour char(50) NOT NULL DEFAULT 'none',
  Discovery_Year int NOT NULL DEFAULT '2018',
  Special_Attr char(50) NOT NULL DEFAULT 'nothing',
  Skeletal_Type skeletontype NOT NULL,
  Loaned_To int,
  Found_In depthname NOT NULL,
  CHECK (Discovery_Year < 2019),
  PRIMARY KEY (Latin_Name),
  FOREIGN KEY (Loaned_To) REFERENCES Aquariums (Aqua_ID)
);

INSERT INTO Animals (Latin_Name, English_Name, Colour, Discovery_Year, Special_Attr, Skeletal_Type, Loaned_To, Found_In)
VALUES ('Alicella gigantea', 'Super-Giant Amphipod', 'Transparent', 1899, 'See-through skin', 'None', 4, 'Hadalpelagic Zone'),
('Ophiura ophiura', 'Brittle Star', 'Tan', 1840, 'Spiny Skin', 'Invertebrate', NULL, 'Abyssopelagic Zone'),
('Vampyroteuthis infernalis', 'Vampire Squid', 'Maroon', 1903, 'Luminescent Fins', 'Invertebrate',5,'Bathypelagic Zone'),
('Physeter macrocephalus', 'Sperm Whale', 'Blue', 1758, 'Giant Head', 'Vertebrate', 2, 'Mesopelagic Zone'),
('Mola mola', 'Ocean Sunfish', 'Grey', 1758, 'No Tail', 'Cartilaginous', 3, 'Epipelagic Zone'),
('Grammatostomias flagellibarba', 'Snake Dragon Fish', 'Dark Brown', 2004,'Light-up Barbel', 'Vertebrate', NULL, 'Bathypelagic Zone'),
('Scyliorhinus hesperius', 'Catshark', 'Spotted', 1862, 'Cat Eyes', 'Cartilaginous', 1, 'Mesopelagic Zone'),
('Physalia physalis', 'Portugese Man-O-War', 'Purple', 1758, 'Deadly Sting', 'None', NULL, 'Epipelagic Zone');

DROP TABLE IF EXISTS Scientist CASCADE;

CREATE TYPE gendertype AS ENUM ('M', 'F');
CREATE TABLE Scientist (
  Name char(50) NOT NULL,
  Concentration char(50),
  Gender gendertype NOT NULL,
  PRIMARY KEY (Name, Concentration)
);

INSERT INTO Scientist (Name, Concentration, Gender)
VALUES ('Carl Chun', 'Teuthology', 'M'),
('Tracey Sutton', 'Fish Ecology', 'M'),
('Eduard Chevreux', 'Amphipods', 'M'),
('Carl Linnaeus', 'Zoology', 'M'),
('John Gray', 'Echinoderms', 'M'),
('Theodore Gill', 'Ichthyology', 'M');

DROP TABLE IF EXISTS Discovery CASCADE;

CREATE TABLE Discovery (
  Species_Name char(50) NOT NULL,
  Scientist_Name char(50) NOT NULL,
  Year int NOT NULL DEFAULT ('2018'),
  Skeletal_Type skeletontype,
  Science_Concentration char(50),
  CHECK (year < 2019),
  PRIMARY KEY (Species_Name, Scientist_Name),
  FOREIGN KEY (Species_Name) REFERENCES Animals (Latin_Name),
  FOREIGN KEY (Scientist_Name, Science_Concentration) REFERENCES Scientist (Name, Concentration)
);

INSERT INTO Discovery (Species_Name, Scientist_Name, Year, Skeletal_Type, Science_Concentration)
VALUES ('Vampyroteuthis infernalis', 'Carl Chun', 1903, 'Invertebrate', 'Teuthology'),
('Grammatostomias flagellibarba', 'Tracey Sutton', 2004, 'Vertebrate', 'Fish Ecology'),
('Alicella gigantea', 'Eduard Chevreux', 1899, 'None', 'Amphipods'),
('Mola mola', 'Carl Linnaeus', 1758, 'Cartilaginous', 'Zoology'),
('Physalia physalis', 'Carl Linnaeus', 1758, 'None', 'Zoology'),
('Ophiura ophiura', 'John Gray', 1840, 'Invertebrate', 'Echinoderms'),
('Physeter macrocephalus', 'Carl Linnaeus', 1758, 'Vertebrate', 'Zoology'),
('Scyliorhinus hesperius', 'Theodore Gill', 1862, 'Cartilaginous', 'Ichthyology');

DROP TABLE IF EXISTS Predators CASCADE;

CREATE TABLE Predators (
  Latin_Name char(50) NOT NULL,
  English_Name char(50) NOT NULL,
  Prey char(50) NOT NULL,
  Ferocity int NOT NULL,
  FOREIGN KEY (Prey) REFERENCES Animals (Latin_Name)
);

INSERT INTO Predators (Latin_Name, English_Name, Prey, Ferocity)
VALUES ('Phocidae', 'Seals', 'Vampyroteuthis infernalis', 1),
('Ophidiidae', 'Cusk-eel', 'Vampyroteuthis infernalis', 2),
('Gadiformes', 'Rattail', 'Vampyroteuthis infernalis', 2),
('Chauliodus', 'Viper Fish', 'Grammatostomias flagellibarba', 3),
('Cetacea delphinidae', 'Killer Whale', 'Mola mola', 2),
('Mola mola', 'Ocean Sunfish', 'Physalia physalis', 4);

DROP TABLE IF EXISTS Ocean_Layers;

CREATE TABLE Ocean_Layers (
  Official_Name depthname NOT NULL,
  Common_Name char(50) NOT NULL,
  Depth_Range char(50) NOT NULL DEFAULT ('0-11000m'),
  Pressure char(50) NOT NULL DEFAULT (' bar'),
  Effect char(50) NOT NULL
);

INSERT INTO Ocean_Layers (Official_Name, Common_Name, Depth_Range, Pressure, Effect)
VALUES ('Hadalpelagic Zone', 'The Trenches', '6000-11000m', '1235.5 bar', 'Obliteration'),
('Abyssopelagic Zone', 'The Abyss', '4000-6000m', '681.1 bar', 'Immediate Crushing'),
('Bathypelagic Zone', 'The Midnight Zone', '1000-4000m', '451.7 bar', 'Slow Crushing'),
('Mesopelagic Zone', 'The Twilight Zone', '200-1000m', '101.4 bar', 'Painstakingly Slow Crushing'),
('Epipelagic Zone', 'The Sunlight Zone', '0-200m', '6.1 bar', 'Minor Inconvenience');
