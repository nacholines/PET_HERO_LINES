CREATE SCHEMA `pet_hero`;

CREATE TABLE `guardians`(
	IdGuardian int NOT NULL AUTO_INCREMENT, 
    IdPerson int NOT NULL, 
    acceptedSizeId int NOT NULL,
    rate decimal(10,2), 
    availabilityStartDate date,
    availabilityEndDate date,
    PRIMARY KEY (IdKeeper),
    FOREIGN KEY (IdPerson)
    REFERENCES people(Id),
    FOREIGN KEY (acceptedSizeId)
    REFERENCES pet_sizes(IdPetSize)
) ;

CREATE TABLE `people` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `birthDate` date NOT NULL,
  `dni` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(45) NOT NULL,
  `userType` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ;

CREATE TABLE `pet_sizes` (
  `IdPetSize` int NOT NULL AUTO_INCREMENT,
  `size` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`IdPetSize`)
) ;


INSERT INTO `pet_sizes` (IdPetSize, size) 
VALUES
	(1, "Chico"),
    (2, "Mediano"),
    (3, "Grande");
    

CREATE TABLE `pets` (
  `IdPet` int NOT NULL AUTO_INCREMENT,
  `IdPerson` int NOT NULL,
  `IdPetType` int NOT NULL,
  `IdPetSize` int NOT NULL,
  `breed` varchar(100) NOT NULL,
  `petName` varchar(50) NOT NULL,
  `image` varchar(30) DEFAULT NULL,
  `vaccines` varchar(30) DEFAULT NULL,
  `comments` varchar(512) NOT NULL,
  `video` varchar(50) DEFAULT NULL,
  `active` bit(1) NOT NULL,
  PRIMARY KEY (`IdPet`),
  FOREIGN KEY (`IdPerson`) REFERENCES `people` (`Id`),
  FOREIGN KEY (`IdPetType`) REFERENCES `pet_types` (`IdType`),
  FOREIGN KEY (`IdPetSize`) REFERENCES `pet_sizes` (`IdPetSize`)
)

CREATE TABLE `reservation_statuses` (
  `IdReservationStatus` int NOT NULL AUTO_INCREMENT,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`IdReservationStatus`)
);



CREATE TABLE reservations (
	IdReservation INT NOT NULL AUTO_INCREMENT, 
    IdPet INT NOT NULL, 
    IdGuardian INT NOT NULL, 
    IdReservationStatus INT NOT NULL, 
    startDate DATE, 
    endDate DATE, 
    cost FLOAT,
    PRIMARY KEY (IdReservation), 
    FOREIGN KEY (IdPet) REFERENCES pets(IdPet),
    FOREIGN KEY (IdGuardian) REFERENCES guardians(IdGuardian),
    FOREIGN KEY (IdReservationStatus) REFERENCES reservation_statuses(IdReservationStatus)
);