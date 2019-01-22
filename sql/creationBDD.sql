CREATE DATABASE clairiere CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci';
USE clairiere;

#------------------------------------------------------------
# Table: userTypes
#------------------------------------------------------------

CREATE TABLE userTypes(
        id   Int  Auto_increment  NOT NULL ,
        userType Varchar (50) NOT NULL
	,CONSTRAINT userTypes_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Users
#------------------------------------------------------------

CREATE TABLE Users(
        id           Int  Auto_increment  NOT NULL ,
        nickName     Varchar (50) NOT NULL ,
        lastName     Varchar (50) NOT NULL ,
        firstName    Varchar (50) NOT NULL ,
        password     Varchar (200) NOT NULL ,
        mail         Varchar (50) NOT NULL ,
        id_userTypes Int NOT NULL
	,CONSTRAINT Users_PK PRIMARY KEY (id)

	,CONSTRAINT Users_userTypes_FK FOREIGN KEY (id_userTypes) REFERENCES userTypes(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: specialities
#------------------------------------------------------------

CREATE TABLE specialities(
        id         Int  Auto_increment  NOT NULL ,
        speciality Varchar (2000)
	,CONSTRAINT specialities_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: biography
#------------------------------------------------------------

CREATE TABLE biography(
        id              Int  Auto_increment  NOT NULL ,
        departement     Varchar (50) NOT NULL ,
        town            Varchar (50) ,
        present         Varchar (2000) ,
        profilePicture  Varchar (100) NOT NULL ,
        id_specialities Int NOT NULL ,
        id_Users        Int NOT NULL
	,CONSTRAINT biography_PK PRIMARY KEY (id)

	,CONSTRAINT biography_specialities_FK FOREIGN KEY (id_specialities) REFERENCES specialities(id)
	,CONSTRAINT biography_Users0_FK FOREIGN KEY (id_Users) REFERENCES Users(id)
	,CONSTRAINT biography_Users_AK UNIQUE (id_Users)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: artworks
#------------------------------------------------------------

CREATE TABLE artworks(
        id          Int  Auto_increment  NOT NULL ,
        title       Varchar (100) NOT NULL ,
        technic     Varchar (100) NOT NULL ,
        size        Varchar (50) NOT NULL ,
        weight      Varchar (50) NOT NULL ,
        `date`        Date NOT NULL ,
        description Varchar (200) NOT NULL ,
        picture     Varchar (100) NOT NULL ,
        id_Users    Int NOT NULL
	,CONSTRAINT artworks_PK PRIMARY KEY (id)

	,CONSTRAINT artworks_Users_FK FOREIGN KEY (id_Users) REFERENCES Users(id)
)ENGINE=InnoDB;

