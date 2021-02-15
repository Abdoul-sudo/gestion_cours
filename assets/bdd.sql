#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: etudiant
#------------------------------------------------------------

CREATE TABLE etudiant(
        id_etudiant     Int  Auto_increment  NOT NULL ,
        nom_etudiant    Varchar (100) NOT NULL ,
        prenom_etudiant Varchar (100),
        email_etudiant  Varchar (100) NOT NULL ,
        mdp_etudiant    Varchar (500) NOT NULL ,
        tel_etudiant    Double  NOT NULL ,
        image_etudiant  Varchar (500) NOT NULL
	,CONSTRAINT etudiant_PK PRIMARY KEY (id_etudiant)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: categorie
#------------------------------------------------------------

CREATE TABLE categorie(
        id_cat          Int  Auto_increment  NOT NULL ,
        designation_cat Varchar (100) NOT NULL
	,CONSTRAINT categorie_PK PRIMARY KEY (id_cat)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: professeur
#------------------------------------------------------------

CREATE TABLE professeur(
        id_prof     Int  Auto_increment  NOT NULL ,
        nom_prof    Varchar (100) NOT NULL ,
        prenom_prof Varchar (100),
        email_prof  Varchar (100) NOT NULL ,
        mdp_prof    Varchar (500) NOT NULL ,
        tel_prof    Double NOT NULL ,
        image_prof  Varchar (500) NOT NULL
	,CONSTRAINT professeur_PK PRIMARY KEY (id_prof)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: cours
#------------------------------------------------------------

CREATE TABLE cours(
        id_cours  Int  Auto_increment  NOT NULL ,
        nom_cours Varchar (50) NOT NULL ,
        id_cat    Int NOT NULL ,
        id_prof   Int NOT NULL
	,CONSTRAINT cours_PK PRIMARY KEY (id_cours)

	,CONSTRAINT cours_categorie_FK FOREIGN KEY (id_cat) REFERENCES categorie(id_cat)
	,CONSTRAINT cours_professeur0_FK FOREIGN KEY (id_prof) REFERENCES professeur(id_prof)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: message
#------------------------------------------------------------

CREATE TABLE message(
        id_mess      Int  Auto_increment  NOT NULL ,
        date_mess    Datetime NOT NULL ,
        contenu_mess Text NOT NULL ,
        id_prof      Int NOT NULL ,
        id_etudiant  Int NOT NULL
	,CONSTRAINT message_PK PRIMARY KEY (id_mess)

	,CONSTRAINT message_professeur_FK FOREIGN KEY (id_prof) REFERENCES professeur(id_prof)
	,CONSTRAINT message_etudiant0_FK FOREIGN KEY (id_etudiant) REFERENCES etudiant(id_etudiant)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: specialite
#------------------------------------------------------------

CREATE TABLE specialite(
        id_specialite          Int  Auto_increment  NOT NULL ,
        designation_specialite Varchar (50) NOT NULL
	,CONSTRAINT specialite_PK PRIMARY KEY (id_specialite)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: recevoir
#------------------------------------------------------------

CREATE TABLE recevoir(
        id_etudiant Int NOT NULL ,
        id_mess     Int NOT NULL
	,CONSTRAINT recevoir_PK PRIMARY KEY (id_etudiant,id_mess)

	,CONSTRAINT recevoir_etudiant_FK FOREIGN KEY (id_etudiant) REFERENCES etudiant(id_etudiant)
	,CONSTRAINT recevoir_message0_FK FOREIGN KEY (id_mess) REFERENCES message(id_mess)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: apprendre
#------------------------------------------------------------

CREATE TABLE apprendre(
        id_cours    Int NOT NULL ,
        id_etudiant Int NOT NULL
	,CONSTRAINT apprendre_PK PRIMARY KEY (id_cours,id_etudiant)

	,CONSTRAINT apprendre_cours_FK FOREIGN KEY (id_cours) REFERENCES cours(id_cours)
	,CONSTRAINT apprendre_etudiant0_FK FOREIGN KEY (id_etudiant) REFERENCES etudiant(id_etudiant)
)ENGINE=InnoDB;
