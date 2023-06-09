
CREATE TABLE ALOJAMIENTO(
 NUMALOJ INTEGER AUTO_INCREMENT,
 ALOJAMIENTO CHAR(15),
 NOMBRECOMPLETO CHAR(40),
 RESPONSABLE CHAR(25),
 DIRECCION CHAR(30),
 DISTANCIA INTEGER,
 CONSTRAINT PK_ALOJAMIENTO
  PRIMARY KEY (NUMALOJ)
)
;

CREATE TABLE OFICIO(
 NUMOFICIO INTEGER(2) AUTO_INCREMENT,
 OFICIO CHAR(25),
 DESCRIPCION CHAR(80),
 SUELDOMINIMO INTEGER(4),
 CONSTRAINT PK_OFICIO
  PRIMARY KEY (NUMOFICIO)
)
;

CREATE TABLE EMPLEADO(
 NUMEMP INTEGER(2) AUTO_INCREMENT,
 NOMBRE CHAR(25),
 EDAD INTEGER,
 ALOJAMIENTO INTEGER(2),
 SUELDO INTEGER(5),
 CONSTRAINT PK_EMPLEADO
  PRIMARY KEY(NUMEMP),
 CONSTRAINT FK_EMPLEADO_ALOJAMIENTO
  FOREIGN KEY(ALOJAMIENTO) REFERENCES ALOJAMIENTO(NUMALOJ)
)
;

CREATE TABLE OFICIOEMPLEADO(
EMPLEADO INTEGER(2),
OFICIO INTEGER(2),
CALIFICACION CHAR(15),
CONSTRAINT PK_OFICIOEMPLEADO
PRIMARY KEY(EMPLEADO,OFICIO),
CONSTRAINT FK_OFICIOEMPLEADO_EMPLEADO
FOREIGN KEY(EMPLEADO)REFERENCES EMPLEADO(NUMEMP),
CONSTRAINT FK_OFICIOEMPLEADO_OFICIO
FOREIGN KEY(OFICIO)REFERENCES OFICIO(NUMOFICIO)
)
;
-- INSERTAMOS LOS ALOJAMIENTOS

INSERT INTO ALOJAMIENTO VALUES(1,'CRAMMER','CRAMMER RETREAT HOUSE','THOM CRANMER','HILL ST,BERKELEY',32);
INSERT INTO ALOJAMIENTO VALUES(2,'MATTS','MATTS LONG BUNK HOUSE','ROLAND BRANDT','3 MILE RD,KEENE',25);
INSERT INTO ALOJAMIENTO VALUES(3,'MULLERS','MULLERS COED LODGING','KEN MULLER','120 MAIN,EDMESTON',10);
INSERT INTO ALOJAMIENTO VALUES(4,'PAPA KING','PAPA KING ROOMING','WILLIAM KING','127 MAIN,EDMESTON',10);
INSERT INTO ALOJAMIENTO VALUES(5,'ROSE HILL','ROSE HILL FOR MEN','JOHN PELETIER','RFD 3,N.EDMESTON',12);
INSERT INTO ALOJAMIENTO VALUES(6,'WEITBROCHT','WEITBROCHT ROOMING','EUNICE BENSON','320 GENEVA,KEENE',26);

-- INSERTAMOS LOS OFICIOS
INSERT INTO OFICIO VALUES(1,'LE�ADOR','MARCAR Y TALAR ARBOLES, CORTAR, APILAR',50);
INSERT INTO OFICIO VALUES(2,'CONDUCTOR DE SEGADORA','CONDUCIR, AJUSTAR MAQUIA',100);
INSERT INTO OFICIO VALUES(3,'HERRERO','PREPARAR FUEGO, CORTAR, HERRAR CABALLOS',400);
INSERT INTO OFICIO VALUES(4,'PICADOR','CAVAR, PICAR, PALEAR, TAPAR',300);
INSERT INTO OFICIO VALUES(5,'LABRADOR','APAREJAR CABALLOS, PROFUNDIDAD DE REJA',250);
INSERT INTO OFICIO VALUES(6,'OBRERO','TRABAJO EN GENERAL',100);
                                                                                                 
-- INSERTAMOS LOS EMPLEADOS
INSERT INTO EMPLEADO VALUES(1,'ADAH TALBOT',23,4,100);                                                
INSERT INTO EMPLEADO VALUES(2,'ANDREW DYE',29,5,700);                                               
INSERT INTO EMPLEADO VALUES(3,'BART SARJEANT',22,1,700);                                            
INSERT INTO EMPLEADO VALUES(4,'DICK JONES',18,5,100);                                                 
INSERT INTO EMPLEADO VALUES(5,'DONALD ROLLO',16,2,700);                                             
INSERT INTO EMPLEADO VALUES(6,'ELBERT TALBOT',43,6,NULL);                                               
INSERT INTO EMPLEADO VALUES(7,'GEORGE OSCAR',41,5,125);                                            
INSERT INTO EMPLEADO VALUES(8,'GERHARDT KENTGEN',55,4,150);                                         
INSERT INTO EMPLEADO VALUES(9,'HELEN BRANDT',15,NULL,150);                                              
INSERT INTO EMPLEADO VALUES(10,'JED HOPKINS',33,2,175);                                            
INSERT INTO EMPLEADO VALUES(11,'JOHN PEARSON',27,5,400);                                              
INSERT INTO EMPLEADO VALUES(12,'KAY Y PALMER WALLBOM',NULL,5,NULL);                                         
INSERT INTO EMPLEADO VALUES(13,'PAT LAVAY',21,5,125);                                              
INSERT INTO EMPLEADO VALUES(14,'PETER LAWSON',25,1,125);                                           
INSERT INTO EMPLEADO VALUES(15,'RICHARD KOCH Y HERMANOS',NULL,6,NULL);                                      
INSERT INTO EMPLEADO VALUES(16,'ROLAND BRANDT',35,2,500);                                            
INSERT INTO EMPLEADO VALUES(17,'VICTORIA LYNN',32,3,100);                                             
INSERT INTO EMPLEADO VALUES(18,'WILFRED LOWELL',67,NULL,500);                                            
INSERT INTO EMPLEADO VALUES(19,'WILLIAM SWING',15,1,100);


-- INSERTAMOS LOS OFICIOS DE LOS EMPLEADOS
INSERT INTO OFICIOEMPLEADO VALUES(1,6,'BUENO');
INSERT INTO OFICIOEMPLEADO VALUES(4,3,'EXCELENTE');
INSERT INTO OFICIOEMPLEADO VALUES(6,5,'LENTO');
INSERT INTO OFICIOEMPLEADO VALUES(9,2,'MUY RAPIDO');
INSERT INTO OFICIOEMPLEADO VALUES(11,2,NULL);
INSERT INTO OFICIOEMPLEADO VALUES(11,1,'BUENO');
INSERT INTO OFICIOEMPLEADO VALUES(11,3,'NORMAL');
INSERT INTO OFICIOEMPLEADO VALUES(17,3,'PRECISO');
INSERT INTO OFICIOEMPLEADO VALUES(18,6,'NORMAL');
INSERT INTO OFICIOEMPLEADO VALUES(18,5,'NORMAL');
COMMIT;
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 