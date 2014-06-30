-- Create Table: HistoricoMedicaciones
--------------------------------------------------------------------------------
CREATE TABLE HistoricoMedicaciones
(
	`idHistorico` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (idHistorico)
	,`idMedicamento` INT NOT NULL 
	,`horarioTomado` DATETIME NOT NULL 
)
ENGINE=INNODB



-- Create Table: Medicamentos
--------------------------------------------------------------------------------
CREATE TABLE Medicamentos
(
	`idMedicamento` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (idMedicamento)
	,`nombre` VARCHAR(250) NOT NULL 
	,`stock` INT NOT NULL 
)
ENGINE=INNODB



-- Create Table: Usuario
--------------------------------------------------------------------------------
CREATE TABLE Usuario
(
	`idUsuario` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (idUsuario)
	,`password` VARCHAR(250) NOT NULL 
	,`nombreUsuario` VARCHAR(250) NOT NULL 
	,`idRol` INT NOT NULL 
)
ENGINE=INNODB



-- Create Table: Rol
--------------------------------------------------------------------------------
CREATE TABLE Rol
(
	`idRol` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (idRol)
	,`tipoRol` VARCHAR(250)  NULL 
)
ENGINE=INNODB



-- Create Table: PlanMedicaciones
--------------------------------------------------------------------------------
CREATE TABLE PlanMedicaciones
(
	`idPlanMedicaciones` INT NOT NULL AUTO_INCREMENT
	,PRIMARY KEY (idPlanMedicaciones)
	,`idMedicamento` INT NOT NULL 
	,`fechayHora` DATETIME NOT NULL 
	,`dosis` INT NOT NULL 
	,`seRepite` BIT NOT NULL 
	,`fechaFin` DATETIME  NULL 
)
ENGINE=INNODB



-- Create Foreign Key: PlanMedicaciones.idMedicamento -> Medicamentos.idMedicamento
ALTER TABLE PlanMedicaciones ADD FOREIGN KEY (idMedicamento) REFERENCES Medicamentos(idMedicamento);


-- Create Foreign Key: Usuario.idRol -> Rol.idRol
ALTER TABLE Usuario ADD FOREIGN KEY (idRol) REFERENCES Rol(idRol);


-- Create Foreign Key: HistoricoMedicaciones.idMedicamento -> Medicamentos.idMedicamento
ALTER TABLE HistoricoMedicaciones ADD FOREIGN KEY (idMedicamento) REFERENCES Medicamentos(idMedicamento);
