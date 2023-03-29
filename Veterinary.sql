-- Rohan Sikder 
-- G00389052

SET default_storage_engine=InnoDB;

Drop database if exists Veterinary;
create database Veterinary CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
Use Veterinary;
Show tables;

-- Animal Table
Drop table if exists Animal;
Create table Animal  (
    id integer NOT NULL auto_increment,
    animalName varchar(20) NOT NULL,
    breed varchar(25) NOT NULL,
    gender ENUM ('Male', 'Female') NOT NULL,
    picture LongBlob,
    picture_path varchar(20),
    address varchar(50) NOT NULL,
    weight FLOAT NOT NULL,
    PRIMARY KEY (id)
) COLLATE utf8mb4_general_ci, Engine=InnoDB;

describe Animal;

INSERT INTO Animal (animalName, breed, gender, picture, picture_path, address, weight) VALUES 
('DOG', 'AKITA', 'Male', load_file('C:/animals/animal1.jpg'),'/animal1.jpg', '123 Dog Street', 32),
('DOG', 'BULLDOG', 'Male', load_file('C:/animals/animal2.jpg'),'/animal2.jpg', '984 Station Street', 42),
('FISH', 'GOLDFISH', 'Male', load_file('C:/animals/animal3.jpg'),'/animal3.jpg', '375 Market Street', 0.2),
('CAT', 'BENGAL', 'Female', load_file('C:/animals/animal4.jpg'),'/animal4.jpg', '432 Shop Street', 12),
('BIRD', 'PARROT', 'Female', load_file('C:/animals/animal5.jpg'),'/animal5.jpg', '564 Riverview Street', 1),
('BIRD', 'PARRAKEET', 'Male', load_file('C:/animals/animal6.jpg'),'/animal6.jpg', '324 Mountain Street', 1.2);

select * from Animal;

-- Staff Table 
Drop table if exists Staff;
Create table Staff  (
    id integer NOT NULL auto_increment,
    fName varchar(20) NOT NULL,
    address varchar(50) NOT NULL,
    picture LongBlob,
    picture_path varchar(20),
    bio MEDIUMTEXT,
    salary FLOAT,
    iban TINYTEXT,
    PRIMARY KEY (id)
) COLLATE utf8mb4_general_ci, Engine=InnoDB;

describe Staff;

INSERT INTO Staff (fName, address, picture, picture_path, bio, salary, iban) VALUES 
('John', '123 Doctor Street', load_file('c:/staff/staff1.jpg'),'/staff1.jpg', 'Hi my name is John, I went to NUIG', 32321.38, 'NL06ABNA6099101268'),
('Mary', '123 Doctor Street', load_file('c:/staff/staff2.jpg'),'/staff2.jpg', 'Hi my name is Mary, I went to GMIT', 54354.45, 'IE65BOFI900017121751'),
('Lucy', '123 Doctor Street', load_file('c:/staff/staff3.jpg'),'/staff3.jpg', 'Hi my name is Lucy, I went to UL', 42342.83, 'IE45BOFI900017163239'),
('Amy', '123 Doctor Street', load_file('c:/staff/staff4.jpg'),'/staff4.jpg', 'Hi my name is Amy, I went to MIT', 23234.20, 'IE34BOFI900017538924'),
('Sean', '123 Doctor Street', load_file('c:/staff/staff5.jpg'),'/staff5.jpg', 'Hi my name is Sean, I went to DCU', 42344.12, 'IE25BOFI900017958514');

select * from Staff;

-- Food Table
Drop table if exists Food;
Create table Food  (
    id integer NOT NULL auto_increment,
    animal SET('DOG', 'CAT', 'BIRD', 'FISH'),
    supplier TINYTEXT,
    size ENUM('SMALL', 'MEDIUM', 'LARGE') NOT NULL,
    price FLOAT NOT NULL,
    quantity SMALLINT,
    PRIMARY KEY (id)
) COLLATE utf8mb4_general_ci, Engine=InnoDB;

describe Food;

INSERT INTO Food (animal, supplier, size, price, quantity) VALUES 
('DOG', 'PEDIGREE', 'SMALL', 23.99, 1),
('CAT', 'PUREE', 'SMALL', 19.99, 1),
('BIRD', 'BIRDDELIGHT', 'SMALL', 9.99, 1),
('FISH', 'FISHYSNACK', 'SMALL', 5.99, 1);

select * from Food;

-- Medication Table
Drop table if exists Medication;
Create TABLE Medication(
    id integer NOT NULL auto_increment,
    name varchar(30) NOT NULL,
    dataSheet LONGTEXT NOT NULL,
    price FLOAT NOT NULL,
    cause LONGTEXT NOT NULL,
    PRIMARY KEY(id)
) COLLATE utf8mb4_general_ci, Engine=InnoDB;

describe Medication;

INSERT INTO Medication (name,dataSheet,price,cause) VALUES 
('Benadryl','ProSense Dog Itch & Allergy Solutions Tablets, diphenhydramine is safe in most dogs if given in the recommended dosage of 1 mg of diphenhydramine per pound of body weight given by mouth.',59.99,'Allergies'),
('Panadol','To Relief Stomach pain',29.99,'diarrhea')

;

select * from Medication;

-- PetOwner Table
Drop table if exists PetOwner;
Create table PetOwner(
    id integer NOT NULL auto_increment,
    fname varchar(30) NOT NULL,
    lname varchar(30) NOT NULL,
    address varchar(50) NOT NULL,
    picture LongBlob,
    picture_path varchar(20),
    cc_details MEDIUMTEXT NOT NULL,
    PRIMARY KEY(id)
) COLLATE utf8mb4_general_ci, Engine=InnoDB;

describe PetOwner;

INSERT INTO PetOwner (fname, lname, address, picture, picture_path, cc_details) VALUES 
('Martin', 'Smith', '2 John Lane',  load_file('c:/petowners/petowner1.jpg'),'/petowner1.jpg', '4716314906300761'),
('Hugh', 'Smith', '32 John Lane',  load_file('c:/petowners/petowner2.jpg'),'/petowner2.jpg',  '4741993637969363'),
('Ben', 'Smith', '65 John Lane',  load_file('c:/petowners/petowner3.jpg'),'/petowner3.jpg',  '4736664327571226'),
('Zoe', 'Smith', '232 John Lane',  load_file('c:/petowners/petowner4.jpg'),'/petowner4.jpg',  '4741981992058963'),
('Shannon', 'Smith', '75 John Lane',  load_file('c:/petowners/petowner5.jpg'),'/petowner5.jpg',  '4544531008647702');

SELECT * from PetOwner;

-- Appointment Table
Drop table if exists Appointment;
Create table Appointment (
    id integer NOT NULL auto_increment,
    animalID integer NOT NULL,
    petOwnerID integer NOT NULL,
    staffID integer NOT NULL,
    appDate DATE NOT NULL,
    appTime TIME NOT NULL,
    location SET('GALWAY', 'CLARE', 'DUBLIN') NOT NULL, # First values is default 'GALWAY',
    symptoms MEDIUMTEXT NOT NULL,
    notes MEDIUMTEXT,
    PRIMARY KEY(id),
    FOREIGN KEY (animalID) REFERENCES Animal(id),
    FOREIGN KEY (petOwnerID) REFERENCES PetOwner(id),
    FOREIGN KEY (staffID) REFERENCES Staff(id)
) COLLATE utf8mb4_general_ci, Engine=InnoDB;

describe Appointment;

INSERT INTO Appointment (animalID,petOwnerID, staffID, appDate, appTime, location, symptoms, notes) VALUES 
(1,1,1,'2023-01-11', '13:30:00','GALWAY', 'Itchy Skin', 'Possible Food Allergies'),
(2,2,2,'2023-05-16', '14:50:00','CLARE', 'Vomiting', 'Possible Food Allergies'),
(3,3,3,'2023-08-21', '13:30:00','DUBLIN', 'Enlarged Belly', 'Air in belly'),
(4,4,4,'2023-11-12', '11:45:00','GALWAY', 'Broken Foot', 'Needs Cast'),
(5,5,5,'2023-12-27', '9:00:00','DUBLIN', 'Loosing Feather', 'Needs Vitamins'),
(6,5,5,'2023-12-28', '12:00:00','DUBLIN', 'Broken Beak', '');

select * from Appointment;

-- Billing Table
Drop table if exists Billing;
Create TABLE Billing(
    id integer NOT NULL auto_increment,
    appointmentID integer NOT NULL,
    foodID integer,
    medicationID integer,
    appDate DATE NOT NULL,
    paymentType ENUM('CARD', 'REVOLUT', 'CHEQUE') NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (appointmentID) REFERENCES Appointment(id),
    FOREIGN KEY (foodID) REFERENCES Food(id),
    FOREIGN KEY (medicationID) REFERENCES Medication(id)
    ) COLLATE utf8mb4_general_ci, Engine=InnoDB;

describe Billing;

INSERT INTO Billing (appointmentID,foodID,medicationID,appDate,paymentType) VALUES 
(1,1,1,'2023-01-21','CARD'),
(2,2,2,'2023-01-21','REVOLUT'),
(3,3,1,'2023-01-21','CHEQUE'),
(4,4,2,'2023-01-21','CARD'),
(5,4,1,'2023-01-21','REVOLUT');

select * from Billing;

show warnings;