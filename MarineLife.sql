DROP DATABASE IF EXISTS MarineLife_DB;
CREATE DATABASE IF NOT EXISTS MarineLife_DB;
USE MarineLife_DB;

DROP TABLE IF EXISTS Habitat, Aquariums, Animals, Scientist, Discovery, Predators, Ocean_Layers;

CREATE TABLE Habitat (
	Habitat_ID	INTEGER	PRIMARY KEY	NOT NULL,
	Temperature	VARCHAR(50)	NOT NULL,
	Pressure	VARCHAR(50)	NOT NULL,
	Salinity	VARCHAR(50)	NOT NULL,
	Volume		VARCHAR(50)	NOT NULL
);

CREATE TABLE Aquariums (
	Name	VARCHAR(50)	NOT NULL,
	Location	VARCHAR(50)	NOT NULL,
	Aqua_ID	INTEGER	PRIMARY KEY	NOT NULL,
	Display_ID	INTEGER	NOT NULL,
	FOREIGN KEY (Display_ID) REFERENCES Habitat(Habitat_ID)
);

CREATE TABLE Animals (
	Latin_Name	VARCHAR(50)	PRIMARY KEY	NOT NULL,
	English_Name	VARCHAR(50)	NOT NULL,
	Colour	VARCHAR(50)	NOT NULL,
	Discovery_Year	INTEGER,
	Special_Attr	VARCHAR(50)	NOT NULL,
	Skeletal_Type	VARCHAR(50),
	Loaned_To	INTEGER,
	Found_In	VARCHAR(50)	NOT NULL,
	check (Discovery_Year < 2019),
	check (Skeletal_Type in ('Invertebrate', 'Vertebrate', 'Cartilaginous', 'None')),
	FOREIGN KEY (Loaned_To) REFERENCES Aquariums(Aqua_ID)
);

CREATE TABLE Scientist (
	Name	VARCHAR(50)	NOT NULL,
	Concentration	VARCHAR(50)	NOT NULL,
	Gender	CHAR(1),
	check (Gender in ('M', 'F')),
	PRIMARY KEY (Name, Concentration)
);

CREATE TABLE Discovery (
	Species_Name	VARCHAR(50)	NOT NULL,
	Scientist_Name	VARCHAR(50)	NOT NULL,
	Year	INTEGER,
	Skeletal_Type	VARCHAR(50),
	Science_Concentration	VARCHAR(50)	NOT NULL,
	check (Year < 2019),
	check (Skeletal_Type in ('Invertebrate', 'Vertebrate', 'Cartilaginous', 'None')),
	PRIMARY KEY (Species_Name, Scientist_Name),
	FOREIGN KEY (Species_Name) REFERENCES Animals(Latin_Name),
	FOREIGN KEY	(Scientist_Name, Science_Concentration) REFERENCES Scientist(Name, Concentration)
);

CREATE TABLE Predators (
	Latin_Name	VARCHAR(50)	PRIMARY KEY	NOT NULL,
	English_Name	VARCHAR(50)	NOT NULL,
	Prey	VARCHAR(50)	NOT NULL,
	Ferocity	INTEGER	NOT NULL,
	FOREIGN KEY (Prey) REFERENCES Animals(Latin_Name)
);

CREATE TABLE Ocean_Layers (
	Official_Name	VARCHAR(50)	PRIMARY KEY,
	Common_Name	VARCHAR(50)	NOT NULL,
	Depth_Range	VARCHAR(50)	NOT NULL,
	Pressure	VARCHAR(50)	NOT NULL,
	Effect	VARCHAR(50)	NOT NULL,
	check(Official_Name in ('Epipelagic', 'Mesopelagic', 'Bathypelagic', 'Abyssopelagic', 'Hadalpelagic'))
);

INSERT INTO Habitat
	VALUES
		(1, '9 Celsius', '450 bar', '70%', '20000000L'),
		(2, '2 Celsius', '1235.5 bar', '80%', '70000000L'),
		(3, '40 Celsius', '6.1 bar', '63%', '4500000L'),
		(4, '8 Celsius', '425 bar', '69%', '19500000L'),
		(5, '17 Celsius', '101 bar', '65%', '6500000L'),
		(6, '6 Celsius', '680 bar', '75%', '60500000L'),
		(7, '4 Celsius', '1235.5 bar', '76%', '76500000L'),
		(8, '37 Celsius', '6.1 bar', '62%', '4000000L'),
		(9, '13 Celsius', '98 bar', '68%', '7000000L');

INSERT INTO Aquariums
	VALUES
		('Fraser Center of Marine Life', '1234 FrontRow Ln', 1, 5),
		('Copeland Aquarium', '5678 Buhber Row', 2, 9),
		('Kahlils Crazy Aquarium', '9087 Gibran St', 3, 3),
		('Ventures to the Deep Blue', '65432 Redrock Ct', 4, 7),
		('Tlaloc Bay Aquarium', '1765 Kippen Ln', 5, 1);

INSERT INTO Animals
	VALUES
		('Alicella gigantea', 'Super-Giant Amphipod', 'Transparent', 1899, 'See-through skin', 'None', 4, 'Hadalpelagic Zone'),
		('Ophiura ophiura', 'Brittle Star', 'Tan', 1840, 'Spiny Skin', 'Invertebrate', NULL, 'Abyssopelagic Zone'),
		('Vampyroteuthis infernalis', 'Vampire Squid', 'Maroon', 1903, 'Luminescent Fins', 'Invertebrate',5,'Bathypelagic Zone'),
		('Physeter macrocephalus', 'Sperm Whale', 'Blue', 1758, 'Giant Head', 'Vertebrate', 2, 'Mesopelagic Zone'),
		('Mola mola', 'Ocean Sunfish', 'Grey', 1758, 'No Tail', 'Cartilaginous', 3, 'Epipelagic Zone'),
		('Grammatostomias flagellibarba', 'Snake Dragon Fish', 'Dark Brown', 2004,'Light-up Barbel', 'Vertebrate', NULL, 'Bathypelagic Zone'),
		('Scyliorhinus hesperius', 'Catshark', 'Spotted', 1862, 'Cat Eyes', 'Cartilaginous', 1, 'Mesopelagic Zone'),
		('Physalia physalis', 'Portugese Man-O-War', 'Purple', 1758, 'Deadly Sting', 'None', NULL, 'Epipelagic Zone');

INSERT INTO Scientist
	VALUES
		('Carl Chun', 'Teuthology', 'M'),
		('Tracey Sutton', 'Fish Ecology', 'M'),
		('Eduard Chevreux', 'Amphipods', 'M'),
		('Carl Linnaeus', 'Zoology', 'M'),
		('John Gray', 'Echinoderms', 'M'),
		('Theodore Gill', 'Ichthyology', 'M');

INSERT INTO Discovery
	VALUES
		('Vampyroteuthis infernalis', 'Carl Chun', 1903, 'Invertebrate', 'Teuthology'),
		('Grammatostomias flagellibarba', 'Tracey Sutton', 2004, 'Vertebrate', 'Fish Ecology'),
		('Alicella gigantea', 'Eduard Chevreux', 1899, 'None', 'Amphipods'),
		('Mola mola', 'Carl Linnaeus', 1758, 'Cartilaginous', 'Zoology'),
		('Physalia physalis', 'Carl Linnaeus', 1758, 'None', 'Zoology'),
		('Ophiura ophiura', 'John Gray', 1840, 'Invertebrate', 'Echinoderms'),
		('Physeter macrocephalus', 'Carl Linnaeus', 1758, 'Vertebrate', 'Zoology'),
		('Scyliorhinus hesperius', 'Theodore Gill', 1862, 'Cartilaginous', 'Ichthyology');

INSERT INTO Predators
	VALUES
		('Phocidae', 'Seals', 'Vampyroteuthis infernalis', 1),
		('Ophidiidae', 'Cusk-eel', 'Vampyroteuthis infernalis', 2),
		('Gadiformes', 'Rattail', 'Vampyroteuthis infernalis', 2),
		('Chauliodus', 'Viper Fish', 'Grammatostomias flagellibarba', 3),
		('Cetacea delphinidae', 'Killer Whale', 'Mola mola', 2),
		('Mola mola', 'Ocean Sunfish', 'Physalia physalis', 4);

INSERT INTO Ocean_Layers
	VALUES
		('Hadalpelagic Zone', 'The Trenches', '6000-11000m', '1235.5 bar', 'Obliteration'),
		('Abyssopelagic Zone', 'The Abyss', '4000-6000m', '681.1 bar', 'Immediate Crushing'),
		('Bathypelagic Zone', 'The Midnight Zone', '1000-4000m', '451.7 bar', 'Slow Crushing'),
		('Mesopelagic Zone', 'The Twilight Zone', '200-1000m', '101.4 bar', 'Painstakingly Slow Crushing'),
		('Epipelagic Zone', 'The Sunlight Zone', '0-200m', '6.1 bar', 'Minor Inconvenience');
