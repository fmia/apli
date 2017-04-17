CREATE TABLE comunidades_autonomas (
	cod_com_autonoma int(4) PRIMARY KEY,
	nombre_com_autonoma varchar(50) 
) ENGINE=InnoDB;

INSERT INTO comunidades_autonomas VALUES(01,"ANDALUCIA");
INSERT INTO comunidades_autonomas VALUES(02,"ARAGON");
INSERT INTO comunidades_autonomas VALUES(03,"ASTURIAS, PRINCIPADO DE");
INSERT INTO comunidades_autonomas VALUES(04,"BALEARS, ILLES");
INSERT INTO comunidades_autonomas VALUES(05,"CANARIAS");
INSERT INTO comunidades_autonomas VALUES(06,"CANTABRIA");
INSERT INTO comunidades_autonomas VALUES(07,"CASTILLA Y LEON");
INSERT INTO comunidades_autonomas VALUES(08,"CASTILLA-LA MANCHA");
INSERT INTO comunidades_autonomas VALUES(09,"CATALUNYA");
INSERT INTO comunidades_autonomas VALUES(10,"COMUNITAT VALENCIANA");
INSERT INTO comunidades_autonomas VALUES(11,"EXTREMADURA");
INSERT INTO comunidades_autonomas VALUES(12,"GALICIA");
INSERT INTO comunidades_autonomas VALUES(13,"MADRID, COMUNIDAD DE ");
INSERT INTO comunidades_autonomas VALUES(14,"MURCIA, REGION DE");
INSERT INTO comunidades_autonomas VALUES(15,"NAVARRA, COMUNIDAD FORAL DE ");
INSERT INTO comunidades_autonomas VALUES(16,"PAIS VASCO");
INSERT INTO comunidades_autonomas VALUES(17,"RIOJA, LA");
INSERT INTO comunidades_autonomas VALUES(18,"CEUTA");
INSERT INTO comunidades_autonomas VALUES(19,"MELILLA");

CREATE TABLE provincias (
	id_provincia int(6) PRIMARY KEY,
	provincia varchar(30),
	cod_com_autonoma int(4)
) ENGINE=InnoDB;

ALTER TABLE provincias ADD CONSTRAINT fk_provincias FOREIGN KEY (cod_com_autonoma) REFERENCES comunidades_autonomas(cod_com_autonoma);

INSERT INTO provincias VALUES
	(2,'Albacete', 08),
	(3,'Alicante/Alacant', 10),
	(4,'Almería', 01),
	(1,'Araba/Álava', 16),
	(33,'Asturias', 03),
	(5,'Ávila', 07),
	(6,'Badajoz', 11),
	(7,'Balears, Illes',04),
	(8,'Barcelona', 09),
	(48,'Bizkaia', 16),
	(9,'Burgos', 07),
	(10,'Cáceres', 11),
	(11,'Cádiz', 01),
	(39,'Cantabria',06 ),
	(12,'Castellón/Castelló', 10),
	(51,'Ceuta', 18),
	(13,'Ciudad Real',08 ),
	(14,'Córdoba', 01),
	(15,'Coruña, A', 12),
	(16,'Cuenca', 08),
	(20,'Gipuzkoa', 16),
	(17,'Girona', 09),
	(18,'Granada', 01),
	(19,'Guadalajara', 08),
	(21,'Huelva', 01),
	(22,'Huesca', 02),
	(23,'Jaén',01),
	(24,'León',07 ),
	(27,'Lugo', 12),
	(25,'Lleida', 09),
	(28,'Madrid', 13),
	(29,'Málaga', 01),
	(52,'Melilla', 19),
	(30,'Murcia', 14),
	(31,'Navarra', 15),
	(32,'Ourense', 12),
	(34,'Palencia', 07),
	(35,'Palmas, Las', 05),
	(36,'Pontevedra', 12),
	(26,'Rioja, La', 17),
	(37,'Salamanca', 07),
	(38,'Santa Cruz de Tenerife', 05),
	(40,'Segovia', 07),
	(41,'Sevilla', 01),
	(42,'Soria', 07),
	(43,'Tarragona', 09),
	(44,'Teruel', 02),
	(45,'Toledo', 08),
	(46,'Valencia/València', 10),
	(47,'Valladolid', 07),
	(49,'Zamora', 07),
	(50,'Zaragoza', 02);
	
CREATE TABLE carriers (
	idcarriers int(11) PRIMARY KEY AUTO_INCREMENT,
	nombre varchar(255)
) ENGINE=InnoDB;

INSERT INTO carriers VALUES (1, 'SEUR');
INSERT INTO carriers VALUES (2, 'ASM');
INSERT INTO carriers VALUES (3, 'REDUR');
INSERT INTO carriers VALUES (4, 'DHL');
INSERT INTO carriers VALUES (5, 'AND. TRANSPORTA');

CREATE TABLE zonaA_redur (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO zonaa_redur VALUES ('', 3, 5, 3.33);
INSERT INTO zonaa_redur VALUES ('', 3, 10, 3.33);
INSERT INTO zonaa_redur VALUES ('', 3, 20, 3.33);
INSERT INTO zonaa_redur VALUES ('', 3, 30, 3.74);
INSERT INTO zonaa_redur VALUES ('', 3, 40, 4.37);
INSERT INTO zonaa_redur VALUES ('', 3, 50, 4.98);
INSERT INTO zonaa_redur VALUES ('', 3, 60, 5.56);
INSERT INTO zonaa_redur VALUES ('', 3, 70, 6.20);
INSERT INTO zonaa_redur VALUES ('', 3, 80, 6.82);
INSERT INTO zonaa_redur VALUES ('', 3, 90, 7.46);
INSERT INTO zonaa_redur VALUES ('', 3, 100, 8.10);
INSERT INTO zonaa_redur VALUES ('', 3, 125, 9.12);
INSERT INTO zonaa_redur VALUES ('', 3, 150, 10.70);
INSERT INTO zonaa_redur VALUES ('', 3, 175, 11.65);
INSERT INTO zonaa_redur VALUES ('', 3, 200, 13.06);
INSERT INTO zonaa_redur VALUES ('', 3, 250, 14.84);
INSERT INTO zonaa_redur VALUES ('', 3, 300, 16.67);
INSERT INTO zonaa_redur VALUES ('', 3, 350, 18.56);
INSERT INTO zonaa_redur VALUES ('', 3, 400, 20.45);
INSERT INTO zonaa_redur VALUES ('', 3, 450, 22.14);
INSERT INTO zonaa_redur VALUES ('', 3, 500, 23.93);
INSERT INTO zonaa_redur VALUES ('', 3, 600, 27.39);
INSERT INTO zonaa_redur VALUES ('', 3, 700, 30.78);
INSERT INTO zonaa_redur VALUES ('', 3, 800, 33.94);
INSERT INTO zonaa_redur VALUES ('', 3, 900, 37.41);
INSERT INTO zonaa_redur VALUES ('', 3, 1000, 41.26);

CREATE TABLE zonaB_redur (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO zonab_redur VALUES ('', 3, 5, 3.33);
INSERT INTO zonab_redur VALUES ('', 3, 10, 3.33);
INSERT INTO zonab_redur VALUES ('', 3, 20, 3.47);
INSERT INTO zonab_redur VALUES ('', 3, 30, 4.27);
INSERT INTO zonab_redur VALUES ('', 3, 40, 5.05);
INSERT INTO zonab_redur VALUES ('', 3, 50, 5.78);
INSERT INTO zonab_redur VALUES ('', 3, 60, 6.61);
INSERT INTO zonab_redur VALUES ('', 3, 70, 7.35);
INSERT INTO zonab_redur VALUES ('', 3, 80, 8.10);
INSERT INTO zonab_redur VALUES ('', 3, 90, 8.34);
INSERT INTO zonab_redur VALUES ('', 3, 100, 9.07);
INSERT INTO zonab_redur VALUES ('', 3, 125, 10.25);
INSERT INTO zonab_redur VALUES ('', 3, 150, 11.96);
INSERT INTO zonab_redur VALUES ('', 3, 175, 13.06);
INSERT INTO zonab_redur VALUES ('', 3, 200, 14.61);
INSERT INTO zonab_redur VALUES ('', 3, 250, 16.63);
INSERT INTO zonab_redur VALUES ('', 3, 300, 18.71);
INSERT INTO zonab_redur VALUES ('', 3, 350, 20.90);
INSERT INTO zonab_redur VALUES ('', 3, 400, 22.92);
INSERT INTO zonab_redur VALUES ('', 3, 450, 25.09);
INSERT INTO zonab_redur VALUES ('', 3, 500, 27.24);
INSERT INTO zonab_redur VALUES ('', 3, 600, 30.78);
INSERT INTO zonab_redur VALUES ('', 3, 700, 34.73);
INSERT INTO zonab_redur VALUES ('', 3, 800, 38.53);
INSERT INTO zonab_redur VALUES ('', 3, 900, 42.58);
INSERT INTO zonab_redur VALUES ('', 3, 1000, 47.11);

CREATE TABLE zonaC_redur (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO zonac_redur VALUES ('', 3, 5, 3.33);
INSERT INTO zonac_redur VALUES ('', 3, 10, 3.33);
INSERT INTO zonac_redur VALUES ('', 3, 20, 3.75);
INSERT INTO zonac_redur VALUES ('', 3, 30, 4.87);
INSERT INTO zonac_redur VALUES ('', 3, 40, 5.86);
INSERT INTO zonac_redur VALUES ('', 3, 50, 6.71);
INSERT INTO zonac_redur VALUES ('', 3, 60, 7.56);
INSERT INTO zonac_redur VALUES ('', 3, 70, 8.42);
INSERT INTO zonac_redur VALUES ('', 3, 80, 9.27);
INSERT INTO zonac_redur VALUES ('', 3, 90, 10.09);
INSERT INTO zonac_redur VALUES ('', 3, 100, 10.99);
INSERT INTO zonac_redur VALUES ('', 3, 125, 12.50);
INSERT INTO zonac_redur VALUES ('', 3, 150, 14.54);
INSERT INTO zonac_redur VALUES ('', 3, 175, 15.85);
INSERT INTO zonac_redur VALUES ('', 3, 200, 17.74);
INSERT INTO zonac_redur VALUES ('', 3, 250, 20.19);
INSERT INTO zonac_redur VALUES ('', 3, 300, 22.81);
INSERT INTO zonac_redur VALUES ('', 3, 350, 25.59);
INSERT INTO zonac_redur VALUES ('', 3, 400, 28.28);
INSERT INTO zonac_redur VALUES ('', 3, 450, 30.99);
INSERT INTO zonac_redur VALUES ('', 3, 500, 33.83);
INSERT INTO zonac_redur VALUES ('', 3, 600, 40.95);
INSERT INTO zonac_redur VALUES ('', 3, 700, 46.60);
INSERT INTO zonac_redur VALUES ('', 3, 800, 52.29);
INSERT INTO zonac_redur VALUES ('', 3, 900, 58.09);
INSERT INTO zonac_redur VALUES ('', 3, 1000, 64.68);

CREATE TABLE zonaD_redur (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO zonad_redur VALUES (' ', 3, 5, 3.33);
INSERT INTO zonad_redur VALUES (' ', 3, 10, 3.33);
INSERT INTO zonad_redur VALUES (' ', 3, 20, 4.50);
INSERT INTO zonad_redur VALUES (' ', 3, 30, 5.84);
INSERT INTO zonad_redur VALUES (' ', 3, 40, 7.03);
INSERT INTO zonad_redur VALUES (' ', 3, 50, 8.05);
INSERT INTO zonad_redur VALUES (' ', 3, 60, 9.08);
INSERT INTO zonad_redur VALUES (' ', 3, 70, 10.10);
INSERT INTO zonad_redur VALUES (' ', 3, 80, 11.12);
INSERT INTO zonad_redur VALUES (' ', 3, 90, 12.12);
INSERT INTO zonad_redur VALUES (' ', 3, 100, 13.18);
INSERT INTO zonad_redur VALUES (' ', 3, 125, 14.99);
INSERT INTO zonad_redur VALUES (' ', 3, 150, 17.45);
INSERT INTO zonad_redur VALUES (' ', 3, 175, 19.02);
INSERT INTO zonad_redur VALUES (' ', 3, 200, 21.28);
INSERT INTO zonad_redur VALUES (' ', 3, 250, 24.22);
INSERT INTO zonad_redur VALUES (' ', 3, 300, 27.37);
INSERT INTO zonad_redur VALUES (' ', 3, 350, 30.71);
INSERT INTO zonad_redur VALUES (' ', 3, 400, 33.93);
INSERT INTO zonad_redur VALUES (' ', 3, 450, 37.19);
INSERT INTO zonad_redur VALUES (' ', 3, 500, 40.59);
INSERT INTO zonad_redur VALUES (' ', 3, 600, 49.13);
INSERT INTO zonad_redur VALUES (' ', 3, 700, 55.90);
INSERT INTO zonad_redur VALUES (' ', 3, 800, 62.74);
INSERT INTO zonad_redur VALUES (' ', 3, 900, 69.69);
INSERT INTO zonad_redur VALUES (' ', 3, 1000, 77.63);

CREATE TABLE zonaE_redur (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO zonae_redur VALUES ('', 3, 5, 3.34);
INSERT INTO zonae_redur VALUES ('', 3, 10, 3.57);
INSERT INTO zonae_redur VALUES ('', 3, 20, 5.13);
INSERT INTO zonae_redur VALUES ('', 3, 30, 6.65);
INSERT INTO zonae_redur VALUES ('', 3, 40, 8.01);
INSERT INTO zonae_redur VALUES ('', 3, 50, 9.16);
INSERT INTO zonae_redur VALUES ('', 3, 60, 10.33);
INSERT INTO zonae_redur VALUES ('', 3, 70, 11.50);
INSERT INTO zonae_redur VALUES ('', 3, 80, 12.67);
INSERT INTO zonae_redur VALUES ('', 3, 90, 13.78);
INSERT INTO zonae_redur VALUES ('', 3, 100, 15.01);
INSERT INTO zonae_redur VALUES ('', 3, 125, 17.07);
INSERT INTO zonae_redur VALUES ('', 3, 150, 19.88);
INSERT INTO zonae_redur VALUES ('', 3, 175, 21.66);
INSERT INTO zonae_redur VALUES ('', 3, 200, 24.22);
INSERT INTO zonae_redur VALUES ('', 3, 250, 27.59);
INSERT INTO zonae_redur VALUES ('', 3, 300, 31.18);
INSERT INTO zonae_redur VALUES ('', 3, 350, 34.97);
INSERT INTO zonae_redur VALUES ('', 3, 400, 38.64);
INSERT INTO zonae_redur VALUES ('', 3, 450, 42.36);
INSERT INTO zonae_redur VALUES ('', 3, 500, 46.25);
INSERT INTO zonae_redur VALUES ('', 3, 600, 55.95);
INSERT INTO zonae_redur VALUES ('', 3, 700, 63.67);
INSERT INTO zonae_redur VALUES ('', 3, 800, 71.47);
INSERT INTO zonae_redur VALUES ('', 3, 900, 79.39);
INSERT INTO zonae_redur VALUES ('', 3, 1000, 88.42);

CREATE TABLE zonaf_redur (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO zonaf_redur VALUES ('', 3, 5, 3.66);
INSERT INTO zonaf_redur VALUES ('', 3, 10, 3.92);
INSERT INTO zonaf_redur VALUES ('', 3, 20, 5.63);
INSERT INTO zonaf_redur VALUES ('', 3, 30, 7.29);
INSERT INTO zonaf_redur VALUES ('', 3, 40, 8.79);
INSERT INTO zonaf_redur VALUES ('', 3, 50, 10.07);
INSERT INTO zonaf_redur VALUES ('', 3, 60, 11.34);
INSERT INTO zonaf_redur VALUES ('', 3, 70, 12.63);
INSERT INTO zonaf_redur VALUES ('', 3, 80, 13.92);
INSERT INTO zonaf_redur VALUES ('', 3, 90, 15.13);
INSERT INTO zonaf_redur VALUES ('', 3, 100, 16.46);
INSERT INTO zonaf_redur VALUES ('', 3, 125, 18.73);
INSERT INTO zonaf_redur VALUES ('', 3, 150, 21.80);
INSERT INTO zonaf_redur VALUES ('', 3, 175, 23.76);
INSERT INTO zonaf_redur VALUES ('', 3, 200, 26.60);
INSERT INTO zonaf_redur VALUES ('', 3, 250, 30.30);
INSERT INTO zonaf_redur VALUES ('', 3, 300, 34.22);
INSERT INTO zonaf_redur VALUES ('', 3, 350, 38.38);
INSERT INTO zonaf_redur VALUES ('', 3, 400, 42.41);
INSERT INTO zonaf_redur VALUES ('', 3, 450, 46.49);
INSERT INTO zonaf_redur VALUES ('', 3, 500, 50.76);
INSERT INTO zonaf_redur VALUES ('', 3, 600, 61.42);
INSERT INTO zonaf_redur VALUES ('', 3, 700, 69.89);
INSERT INTO zonaf_redur VALUES ('', 3, 800, 78.45);
INSERT INTO zonaf_redur VALUES ('', 3, 900, 87.14);
INSERT INTO zonaf_redur VALUES ('', 3, 1000, 97.04);

CREATE TABLE zonaG_redur (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO zonag_redur VALUES ('', 3, 5, 3.92);
INSERT INTO zonag_redur VALUES ('', 3, 10, 4.17);
INSERT INTO zonag_redur VALUES ('', 3, 20, 6.01);
INSERT INTO zonag_redur VALUES ('', 3, 30, 7.79);
INSERT INTO zonag_redur VALUES ('', 3, 40, 9.39);
INSERT INTO zonag_redur VALUES ('', 3, 50, 10.73);
INSERT INTO zonag_redur VALUES ('', 3, 60, 12.09);
INSERT INTO zonag_redur VALUES ('', 3, 70, 13.47);
INSERT INTO zonag_redur VALUES ('', 3, 80, 14.84);
INSERT INTO zonag_redur VALUES ('', 3, 90, 16.16);
INSERT INTO zonag_redur VALUES ('', 3, 100, 17.58);
INSERT INTO zonag_redur VALUES ('', 3, 125, 19.98);
INSERT INTO zonag_redur VALUES ('', 3, 150, 23.27);
INSERT INTO zonag_redur VALUES ('', 3, 175, 25.36);
INSERT INTO zonag_redur VALUES ('', 3, 200, 28.37);
INSERT INTO zonag_redur VALUES ('', 3, 250, 32.31);
INSERT INTO zonag_redur VALUES ('', 3, 300, 36.50);
INSERT INTO zonag_redur VALUES ('', 3, 350, 40.95);
INSERT INTO zonag_redur VALUES ('', 3, 400, 45.26);
INSERT INTO zonag_redur VALUES ('', 3, 450, 49.60);
INSERT INTO zonag_redur VALUES ('', 3, 500, 54.15);
INSERT INTO zonag_redur VALUES ('', 3, 600, 65.53);
INSERT INTO zonag_redur VALUES ('', 3, 700, 74.56);
INSERT INTO zonag_redur VALUES ('', 3, 800, 83.69);
INSERT INTO zonag_redur VALUES ('', 3, 900, 92.97);
INSERT INTO zonag_redur VALUES ('', 3, 1000, 103.54);

CREATE TABLE zonaH_redur (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO zonah_redur VALUES ('', 3, 5, 4.16);
INSERT INTO zonah_redur  VALUES ('', 3, 10, 4.43);
INSERT INTO zonah_redur  VALUES ('', 3, 20, 6.39);
INSERT INTO zonah_redur  VALUES ('', 3, 30, 8.27);
INSERT INTO zonah_redur  VALUES ('', 3, 40, 9.97);
INSERT INTO zonah_redur  VALUES ('', 3, 50, 11.40);
INSERT INTO zonah_redur VALUES ('', 3, 60, 12.85);
INSERT INTO zonah_redur  VALUES ('', 3, 70, 14.30);
INSERT INTO zonah_redur  VALUES ('', 3, 80, 15.76);
INSERT INTO zonah_redur  VALUES ('', 3, 90, 17.15);
INSERT INTO zonah_redur  VALUES ('', 3, 100, 18.67);
INSERT INTO zonah_redur  VALUES ('', 3, 125, 21.23);
INSERT INTO zonah_redur  VALUES ('', 3, 150, 24.72);
INSERT INTO zonah_redur  VALUES ('', 3, 175, 26.94);
INSERT INTO zonah_redur  VALUES ('', 3, 200, 30.14);
INSERT INTO zonah_redur  VALUES ('', 3, 250, 34.33);
INSERT INTO zonah_redur  VALUES ('', 3, 300, 38.78);
INSERT INTO zonah_redur VALUES ('', 3, 350, 43.51);
INSERT INTO zonah_redur  VALUES ('', 3, 400, 48.07);
INSERT INTO zonah_redur  VALUES ('', 3, 450, 52.70);
INSERT INTO zonah_redur  VALUES ('', 3, 500, 57.53);
INSERT INTO zonah_redur  VALUES ('', 3, 600, 69.62);
INSERT INTO zonah_redur VALUES ('', 3, 700, 79.19);
INSERT INTO zonah_redur  VALUES ('', 3, 800, 88.92);
INSERT INTO zonah_redur  VALUES ('', 3, 900, 98.75);
INSERT INTO zonah_redur  VALUES ('', 3, 1000, 109.99);

CREATE TABLE zonaI_redur (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO zonai_redur VALUES ('', 3, 5, 6.72);
INSERT INTO zonai_redur  VALUES ('', 3, 10, 7.17);
INSERT INTO zonai_redur  VALUES ('', 3, 20, 10.33);
INSERT INTO zonai_redur  VALUES ('', 3, 30, 13.38);
INSERT INTO zonai_redur  VALUES ('', 3, 40, 16.11);
INSERT INTO zonai_redur  VALUES ('', 3, 50, 18.45);
INSERT INTO zonai_redur VALUES ('', 3, 60, 20.79);
INSERT INTO zonai_redur  VALUES ('', 3, 70, 23.14);
INSERT INTO zonai_redur  VALUES ('', 3, 80, 25.50);
INSERT INTO zonai_redur  VALUES ('', 3, 90, 27.72);
INSERT INTO zonai_redur  VALUES ('', 3, 100, 30.19);
INSERT INTO zonai_redur  VALUES ('', 3, 125, 34.34);
INSERT INTO zonai_redur  VALUES ('', 3, 150, 39.98);
INSERT INTO zonai_redur  VALUES ('', 3, 175, 43.57);
INSERT INTO zonai_redur  VALUES ('', 3, 200, 48.74);
INSERT INTO zonai_redur  VALUES ('', 3, 250, 55.50);
INSERT INTO zonai_redur  VALUES ('', 3, 300, 62.71);
INSERT INTO zonai_redur VALUES ('', 3, 350, 70.35);
INSERT INTO zonai_redur  VALUES ('', 3, 400, 77.74);
INSERT INTO zonai_redur  VALUES ('', 3, 450, 85.22);
INSERT INTO zonai_redur  VALUES ('', 3, 500, 93.02);
INSERT INTO zonai_redur  VALUES ('', 3, 600, 112.57);
INSERT INTO zonai_redur VALUES ('', 3, 700, 128.08);
INSERT INTO zonai_redur  VALUES ('', 3, 800, 143.78);
INSERT INTO zonai_redur  VALUES ('', 3, 900, 159.70);
INSERT INTO zonai_redur  VALUES ('', 3, 1000, 177.85);

CREATE TABLE zona1_dhl (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO zona1_dhl  VALUES ('', 4, 5, 3.60);
INSERT INTO zona1_dhl  VALUES ('', 4, 10, 3.60);
INSERT INTO zona1_dhl  VALUES ('', 4, 20, 3.60);
INSERT INTO zona1_dhl  VALUES ('', 4, 30, 3.60);
INSERT INTO zona1_dhl  VALUES ('', 4, 40, 4.05);
INSERT INTO zona1_dhl  VALUES ('', 4, 50, 4.62);
INSERT INTO zona1_dhl  VALUES ('', 4, 60, 5.17);
INSERT INTO zona1_dhl  VALUES ('', 4, 70, 5.75);
INSERT INTO zona1_dhl  VALUES ('', 4, 80, 6.33);
INSERT INTO zona1_dhl  VALUES ('', 4, 90, 6.93);
INSERT INTO zona1_dhl  VALUES ('', 4, 100, 7.52);
INSERT INTO zona1_dhl  VALUES ('', 4, 125, 8.47);
INSERT INTO zona1_dhl  VALUES ('', 4, 150, 9.92);
INSERT INTO zona1_dhl  VALUES ('', 4, 175, 12.43);
INSERT INTO zona1_dhl  VALUES ('', 4, 200, 13.94);
INSERT INTO zona1_dhl  VALUES ('', 4, 250, 15.84);
INSERT INTO zona1_dhl  VALUES ('', 4, 300, 17.79);
INSERT INTO zona1_dhl  VALUES ('', 4, 350, 20.30);
INSERT INTO zona1_dhl  VALUES ('', 4, 400, 22.38);
INSERT INTO zona1_dhl  VALUES ('', 4, 450, 24.22);
INSERT INTO zona1_dhl  VALUES ('', 4, 500, 26.19);
INSERT INTO zona1_dhl  VALUES ('', 4, 600, 29.97);
INSERT INTO zona1_dhl  VALUES ('', 4, 700, 33.68);
INSERT INTO zona1_dhl  VALUES ('', 4, 800, 37.14);
INSERT INTO zona1_dhl  VALUES ('', 4, 900, 40.94);
INSERT INTO zona1_dhl  VALUES ('', 4, 1000, 45.14);

CREATE TABLE zona2_dhl (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO zona2_dhl  VALUES ('', 4, 5, 3.60);
INSERT INTO zona2_dhl  VALUES ('', 4, 10, 3.60);
INSERT INTO zona2_dhl  VALUES ('', 4, 20, 3.60);
INSERT INTO zona2_dhl  VALUES ('', 4, 30, 3.97);
INSERT INTO zona2_dhl  VALUES ('', 4, 40, 4.69);
INSERT INTO zona2_dhl  VALUES ('', 4, 50, 5.36);
INSERT INTO zona2_dhl VALUES ('', 4, 60, 6.13);
INSERT INTO zona2_dhl  VALUES ('', 4, 70, 6.82);
INSERT INTO zona2_dhl  VALUES ('', 4, 80, 7.52);
INSERT INTO zona2_dhl  VALUES ('', 4, 90, 7.74);
INSERT INTO zona2_dhl  VALUES ('', 4, 100, 8.42);
INSERT INTO zona2_dhl  VALUES ('', 4, 125, 9.51);
INSERT INTO zona2_dhl  VALUES ('', 4, 150, 11.11);
INSERT INTO zona2_dhl  VALUES ('', 4, 175, 13.94);
INSERT INTO zona2_dhl  VALUES ('', 4, 200, 15.60);
INSERT INTO zona2_dhl  VALUES ('', 4, 250, 17.75);
INSERT INTO zona2_dhl  VALUES ('', 4, 300, 19.98);
INSERT INTO zona2_dhl  VALUES ('', 4, 350, 22.86);
INSERT INTO zona2_dhl  VALUES ('', 4, 400, 25.09);
INSERT INTO zona2_dhl  VALUES ('', 4, 450, 27.45);
INSERT INTO zona2_dhl  VALUES ('', 4, 500, 29.80);
INSERT INTO zona2_dhl  VALUES ('', 4, 600, 33.68);
INSERT INTO zona2_dhl VALUES ('', 4, 700, 38.01);
INSERT INTO zona2_dhl  VALUES ('', 4, 800, 42.16);
INSERT INTO zona2_dhl  VALUES ('', 4, 900, 46.58);
INSERT INTO zona2_dhl  VALUES ('', 4, 1000, 51.54);

CREATE TABLE zona3_dhl (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO zona3_dhl  VALUES ('', 4, 5, 3.60);
INSERT INTO zona3_dhl  VALUES ('', 4, 10, 3.60);
INSERT INTO zona3_dhl  VALUES ('', 4, 20, 3.60);
INSERT INTO zona3_dhl  VALUES ('', 4, 30, 4.51);
INSERT INTO zona3_dhl  VALUES ('', 4, 40, 5.44);
INSERT INTO zona3_dhl  VALUES ('', 4, 50, 6.22);
INSERT INTO zona3_dhl VALUES ('', 4, 60, 7.01);
INSERT INTO zona3_dhl  VALUES ('', 4, 70, 7.82);
INSERT INTO zona3_dhl  VALUES ('', 4, 80, 8.61);
INSERT INTO zona3_dhl  VALUES ('', 4, 90, 9.37);
INSERT INTO zona3_dhl  VALUES ('', 4, 100, 10.20);
INSERT INTO zona3_dhl  VALUES ('', 4, 125, 11.60);
INSERT INTO zona3_dhl  VALUES ('', 4, 150, 13.50);
INSERT INTO zona3_dhl  VALUES ('', 4, 175, 16.92);
INSERT INTO zona3_dhl  VALUES ('', 4, 200, 18.93);
INSERT INTO zona3_dhl  VALUES ('', 4, 250, 21.55);
INSERT INTO zona3_dhl  VALUES ('', 4, 300, 24.36);
INSERT INTO zona3_dhl  VALUES ('', 4, 350, 28.00);
INSERT INTO zona3_dhl  VALUES ('', 4, 400, 30.94);
INSERT INTO zona3_dhl  VALUES ('', 4, 450, 33.92);
INSERT INTO zona3_dhl  VALUES ('', 4, 500, 37.02);
INSERT INTO zona3_dhl  VALUES ('', 4, 600, 44.80);
INSERT INTO zona3_dhl VALUES ('', 4, 700, 50.99);
INSERT INTO zona3_dhl  VALUES ('', 4, 800, 57.21);
INSERT INTO zona3_dhl  VALUES ('', 4, 900, 63.55);
INSERT INTO zona3_dhl  VALUES ('', 4, 1000, 70.77);

CREATE TABLE zona4_dhl (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO zona4_dhl  VALUES ('', 4, 5, 3.60);
INSERT INTO zona4_dhl  VALUES ('', 4, 10, 3.60);
INSERT INTO zona4_dhl  VALUES ('', 4, 20, 4.18);
INSERT INTO zona4_dhl  VALUES ('', 4, 30, 5.42);
INSERT INTO zona4_dhl  VALUES ('', 4, 40, 6.53);
INSERT INTO zona4_dhl  VALUES ('', 4, 50, 7.47);
INSERT INTO zona4_dhl VALUES ('', 4, 60, 8.43);
INSERT INTO zona4_dhl VALUES ('', 4, 70, 9.38);
INSERT INTO zona4_dhl  VALUES ('', 4, 80, 10.33);
INSERT INTO zona4_dhl  VALUES ('', 4, 90, 11.24);
INSERT INTO zona4_dhl VALUES ('', 4, 100, 12.23);
INSERT INTO zona4_dhl  VALUES ('', 4, 125, 13.91);
INSERT INTO zona4_dhl  VALUES ('', 4, 150, 16.20);
INSERT INTO zona4_dhl  VALUES ('', 4, 175, 20.30);
INSERT INTO zona4_dhl  VALUES ('', 4, 200, 22.72);
INSERT INTO zona4_dhl  VALUES ('', 4, 250, 25.86);
INSERT INTO zona4_dhl  VALUES ('', 4, 300, 29.22);
INSERT INTO zona4_dhl  VALUES ('', 4, 350, 33.60);
INSERT INTO zona4_dhl  VALUES ('', 4, 400, 37.13);
INSERT INTO zona4_dhl  VALUES ('', 4, 450, 40.69);
INSERT INTO zona4_dhl  VALUES ('', 4, 500, 44.42);
INSERT INTO zona4_dhl  VALUES ('', 4, 600, 53.75);
INSERT INTO zona4_dhl VALUES ('', 4, 700, 61.16);
INSERT INTO zona4_dhl  VALUES ('', 4, 800, 68.65);
INSERT INTO zona4_dhl  VALUES ('', 4, 900, 76.26);
INSERT INTO zona4_dhl  VALUES ('', 4, 1000, 84.94);

CREATE TABLE zona5_dhl (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO zona5_dhl  VALUES ('', 4, 5, 3.60);
INSERT INTO zona5_dhl  VALUES ('', 4, 10, 3.60);
INSERT INTO zona5_dhl  VALUES ('', 4, 20, 4.77);
INSERT INTO zona5_dhl  VALUES ('', 4, 30, 6.17);
INSERT INTO zona5_dhl  VALUES ('', 4, 40, 7.44);
INSERT INTO zona5_dhl  VALUES ('', 4, 50, 8.50);
INSERT INTO zona5_dhl VALUES ('', 4, 60, 9.59);
INSERT INTO zona5_dhl VALUES ('', 4, 70, 10.67);
INSERT INTO zona5_dhl  VALUES ('', 4, 80, 11.76);
INSERT INTO zona5_dhl  VALUES ('', 4, 90, 12.79);
INSERT INTO zona5_dhl VALUES ('', 4, 100, 13.93);
INSERT INTO zona5_dhl  VALUES ('', 4, 125, 15.84);
INSERT INTO zona5_dhl  VALUES ('', 4, 150, 18.45);
INSERT INTO zona5_dhl  VALUES ('', 4, 175, 23.12);
INSERT INTO zona5_dhl  VALUES ('', 4, 200, 25.86);
INSERT INTO zona5_dhl  VALUES ('', 4, 250, 29.45);
INSERT INTO zona5_dhl  VALUES ('', 4, 300, 33.28);
INSERT INTO zona5_dhl  VALUES ('', 4, 350, 38.27);
INSERT INTO zona5_dhl  VALUES ('', 4, 400, 42.28);
INSERT INTO zona5_dhl  VALUES ('', 4, 450, 46.35);
INSERT INTO zona5_dhl  VALUES ('', 4, 500, 50.60);
INSERT INTO zona5_dhl  VALUES ('', 4, 600, 61.22);
INSERT INTO zona5_dhl VALUES ('', 4, 700, 69.67);
INSERT INTO zona5_dhl  VALUES ('', 4, 800, 78.20);
INSERT INTO zona5_dhl  VALUES ('', 4, 900, 86.87);
INSERT INTO zona5_dhl  VALUES ('', 4, 1000, 96.74);

CREATE TABLE zona6_dhl (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO zona6_dhl  VALUES ('', 4, 5, 3.60);
INSERT INTO zona6_dhl  VALUES ('', 4, 10, 3.64);
INSERT INTO zona6_dhl  VALUES ('', 4, 20, 5.23);
INSERT INTO zona6_dhl  VALUES ('', 4, 30, 6.77);
INSERT INTO zona6_dhl  VALUES ('', 4, 40, 8.16);
INSERT INTO zona6_dhl  VALUES ('', 4, 50, 9.34);
INSERT INTO zona6_dhl VALUES ('', 4, 60, 10.53);
INSERT INTO zona6_dhl VALUES ('', 4, 70, 11.72);
INSERT INTO zona6_dhl VALUES ('', 4, 80, 12.92);
INSERT INTO zona6_dhl  VALUES ('', 4, 90, 14.05);
INSERT INTO zona6_dhl VALUES ('', 4, 100, 15.28);
INSERT INTO zona6_dhl  VALUES ('', 4, 125, 17.39);
INSERT INTO zona6_dhl  VALUES ('', 4, 150, 20.24);
INSERT INTO zona6_dhl  VALUES ('', 4, 175, 25.36);
INSERT INTO zona6_dhl  VALUES ('', 4, 200, 28.39);
INSERT INTO zona6_dhl  VALUES ('', 4, 250, 32.34);
INSERT INTO zona6_dhl  VALUES ('', 4, 300, 36.53);
INSERT INTO zona6_dhl  VALUES ('', 4, 350, 41.99);
INSERT INTO zona6_dhl  VALUES ('', 4, 400, 46.41);
INSERT INTO zona6_dhl  VALUES ('', 4, 450, 50.87);
INSERT INTO zona6_dhl  VALUES ('', 4, 500, 55.54);
INSERT INTO zona6_dhl  VALUES ('', 4, 600, 67.21);
INSERT INTO zona6_dhl VALUES ('', 4, 700, 76.48);
INSERT INTO zona6_dhl  VALUES ('', 4, 800, 85.84);
INSERT INTO zona6_dhl  VALUES ('', 4, 900, 95.35);
INSERT INTO zona6_dhl  VALUES ('', 4, 1000, 106.17);

CREATE TABLE zona7_dhl (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO zona7_dhl  VALUES ('', 4, 5, 3.64);
INSERT INTO zona7_dhl  VALUES ('', 4, 10, 3.87);
INSERT INTO zona7_dhl  VALUES ('', 4, 20, 5.58);
INSERT INTO zona7_dhl  VALUES ('', 4, 30, 7.24);
INSERT INTO zona7_dhl  VALUES ('', 4, 40, 8.71);
INSERT INTO zona7_dhl  VALUES ('', 4, 50, 9.96);
INSERT INTO zona7_dhl VALUES ('', 4, 60, 11.22);
INSERT INTO zona7_dhl VALUES ('', 4, 70, 12.50);
INSERT INTO zona7_dhl VALUES ('', 4, 80, 13.77);
INSERT INTO zona7_dhl  VALUES ('', 4, 90, 15.00);
INSERT INTO zona7_dhl VALUES ('', 4, 100, 16.32);
INSERT INTO zona7_dhl  VALUES ('', 4, 125, 18.54);
INSERT INTO zona7_dhl  VALUES ('', 4, 150, 21.60);
INSERT INTO zona7_dhl  VALUES ('', 4, 175, 27.07);
INSERT INTO zona7_dhl  VALUES ('', 4, 200, 30.29);
INSERT INTO zona7_dhl  VALUES ('', 4, 250, 34.50);
INSERT INTO zona7_dhl  VALUES ('', 4, 300, 38.97);
INSERT INTO zona7_dhl  VALUES ('', 4, 350, 44.80);
INSERT INTO zona7_dhl  VALUES ('', 4, 400, 49.52);
INSERT INTO zona7_dhl  VALUES ('', 4, 450, 54.27);
INSERT INTO zona7_dhl  VALUES ('', 4, 500, 59.25);
INSERT INTO zona7_dhl  VALUES ('', 4, 600, 71.70);
INSERT INTO zona7_dhl VALUES ('', 4, 700, 81.58);
INSERT INTO zona7_dhl  VALUES ('', 4, 800, 91.58);
INSERT INTO zona7_dhl  VALUES ('', 4, 900, 101.73);
INSERT INTO zona7_dhl  VALUES ('', 4, 1000, 113.28);

CREATE TABLE zona8_dhl (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO zona8_dhl  VALUES ('', 4, 5, 3.86);
INSERT INTO zona8_dhl  VALUES ('', 4, 10, 4.11);
INSERT INTO zona8_dhl  VALUES ('', 4, 20, 5.93);
INSERT INTO zona8_dhl  VALUES ('', 4, 30, 7.68);
INSERT INTO zona8_dhl  VALUES ('', 4, 40, 9.25);
INSERT INTO zona8_dhl  VALUES ('', 4, 50, 10.58);
INSERT INTO zona8_dhl VALUES ('', 4, 60, 11.93);
INSERT INTO zona8_dhl VALUES ('', 4, 70, 13.28);
INSERT INTO zona8_dhl VALUES ('', 4, 80, 14.63);
INSERT INTO zona8_dhl  VALUES ('', 4, 90, 15.92);
INSERT INTO zona8_dhl VALUES ('', 4, 100, 17.33);
INSERT INTO zona8_dhl  VALUES ('', 4, 125, 19.70);
INSERT INTO zona8_dhl  VALUES ('', 4, 150, 22.95);
INSERT INTO zona8_dhl  VALUES ('', 4, 175, 28.76);
INSERT INTO zona8_dhl  VALUES ('', 4, 200, 32.18);
INSERT INTO zona8_dhl  VALUES ('', 4, 250, 36.64);
INSERT INTO zona8_dhl  VALUES ('', 4, 300, 41.40);
INSERT INTO zona8_dhl  VALUES ('', 4, 350, 47.60);
INSERT INTO zona8_dhl  VALUES ('', 4, 400, 52.59);
INSERT INTO zona8_dhl  VALUES ('', 4, 450, 57.67);
INSERT INTO zona8_dhl  VALUES ('', 4, 500, 62.94);
INSERT INTO zona8_dhl  VALUES ('', 4, 600, 76.18);
INSERT INTO zona8_dhl VALUES ('', 4, 700, 86.65);
INSERT INTO zona8_dhl  VALUES ('', 4, 800, 97.28);
INSERT INTO zona8_dhl  VALUES ('', 4, 900, 108.06);
INSERT INTO zona8_dhl  VALUES ('', 4, 1000, 120.35);

CREATE TABLE zona9_dhl (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO zona9_dhl  VALUES ('', 4, 5, 6.23);
INSERT INTO zona9_dhl  VALUES ('', 4, 10, 6.66);
INSERT INTO zona9_dhl  VALUES ('', 4, 20, 9.59);
INSERT INTO zona9_dhl  VALUES ('', 4, 30, 12.42);
INSERT INTO zona9_dhl  VALUES ('', 4, 40, 14.96);
INSERT INTO zona9_dhl  VALUES ('', 4, 50, 17.12);
INSERT INTO zona9_dhl VALUES ('', 4, 60, 19.29);
INSERT INTO zona9_dhl VALUES ('', 4, 70, 21.47);
INSERT INTO zona9_dhl VALUES ('', 4, 80, 23.67);
INSERT INTO zona9_dhl  VALUES ('', 4, 90, 25.74);
INSERT INTO zona9_dhl VALUES ('', 4, 100, 28.02);
INSERT INTO zona9_dhl  VALUES ('', 4, 125, 31.87);
INSERT INTO zona9_dhl  VALUES ('', 4, 150, 37.12);
INSERT INTO zona9_dhl  VALUES ('', 4, 175, 46.50);
INSERT INTO zona9_dhl  VALUES ('', 4, 200, 52.03);
INSERT INTO zona9_dhl  VALUES ('', 4, 250, 59.25);
INSERT INTO zona9_dhl  VALUES ('', 4, 300, 66.94);
INSERT INTO zona9_dhl  VALUES ('', 4, 350, 76.97);
INSERT INTO zona9_dhl  VALUES ('', 4, 400, 85.07);
INSERT INTO zona9_dhl  VALUES ('', 4, 450, 93.25);
INSERT INTO zona9_dhl  VALUES ('', 4, 500, 101.77);
INSERT INTO zona9_dhl  VALUES ('', 4, 600, 123.17);
INSERT INTO zona9_dhl VALUES ('', 4, 700, 140.14);
INSERT INTO zona9_dhl  VALUES ('', 4, 800, 157.32);
INSERT INTO zona9_dhl  VALUES ('', 4, 900, 174.74);
INSERT INTO zona9_dhl  VALUES ('', 4, 1000, 194.60);

CREATE TABLE provincial_asm (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO provincial_asm  VALUES ('', 2, 1, 3.14);
INSERT INTO provincial_asm  VALUES ('', 2, 3, 3.20);
INSERT INTO provincial_asm  VALUES ('', 2, 5, 3.30);
INSERT INTO provincial_asm  VALUES ('', 2, 10, 3.45);
INSERT INTO provincial_asm  VALUES ('', 2, 15, 3.70);
INSERT INTO provincial_asm  VALUES ('', 2, 20, 4.30);

CREATE TABLE regional_asm (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO regional_asm  VALUES ('', 2, 1, 3.35);
INSERT INTO regional_asm  VALUES ('', 2, 3, 3.54);
INSERT INTO regional_asm VALUES ('', 2, 5, 3.60);
INSERT INTO regional_asm  VALUES ('', 2, 10, 3.90);
INSERT INTO regional_asm  VALUES ('', 2, 15, 4.90);
INSERT INTO regional_asm  VALUES ('', 2, 20, 5.50);

CREATE TABLE peninsular_asm (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO peninsular_asm  VALUES ('', 2, 1, 3.50);
INSERT INTO peninsular_asm VALUES ('', 2, 3, 3.70);
INSERT INTO peninsular_asm VALUES ('', 2, 5, 4.05);
INSERT INTO peninsular_asm  VALUES ('', 2, 10, 4.30);
INSERT INTO peninsular_asm  VALUES ('', 2, 15, 5.15);
INSERT INTO peninsular_asm  VALUES ('', 2, 20, 7.00);

CREATE TABLE regional_AT (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO  regional_AT  VALUES ('', 5, 5, 2.28);
INSERT INTO  regional_AT  VALUES ('', 5, 10, 2.50);
INSERT INTO  regional_AT  VALUES ('', 5, 20, 3.35);
INSERT INTO  regional_AT  VALUES ('', 5, 30, 4.07);
INSERT INTO  regional_AT  VALUES ('', 5, 40, 4.82);
INSERT INTO regional_AT  VALUES ('', 5, 50, 5.52);
INSERT INTO  regional_AT VALUES ('', 5, 60, 6.32);
INSERT INTO  regional_AT VALUES ('', 5, 70, 7.02);
INSERT INTO regional_AT VALUES ('', 5, 80, 7.76);
INSERT INTO  regional_AT  VALUES ('', 5, 90, 8.03);
INSERT INTO  regional_AT VALUES ('', 5, 100, 8.67);
INSERT INTO  regional_AT  VALUES ('', 5, 125, 9.85);
INSERT INTO  regional_AT  VALUES ('', 5, 150, 11.52);
INSERT INTO  regional_AT  VALUES ('', 5, 175, 14.46);
INSERT INTO  regional_AT  VALUES ('', 5, 200, 16.23);
INSERT INTO  regional_AT  VALUES ('', 5, 250, 18.47);
INSERT INTO  regional_AT  VALUES ('', 5, 300, 20.78);

CREATE TABLE provincial_AT (
	idcarriertamanos int PRIMARY KEY AUTO_INCREMENT,
	idcarrier int(5),
	peso int(4),
	importe float(5,2)
) ENGINE=InnoDB;

INSERT INTO  provincial_AT  VALUES ('', 5, 5, 2.20);
INSERT INTO  provincial_AT  VALUES ('', 5, 10, 2.36);
INSERT INTO  provincial_AT VALUES ('', 5, 20, 2.95);
INSERT INTO  provincial_AT  VALUES ('', 5, 30, 3.54);
INSERT INTO  provincial_AT  VALUES ('', 5, 40, 4.18);
INSERT INTO provincial_AT  VALUES ('', 5, 50, 4.77);
INSERT INTO  provincial_AT VALUES ('', 5, 60, 5.35);
INSERT INTO  provincial_AT VALUES ('', 5, 70, 5.94);
INSERT INTO provincial_AT VALUES ('', 5, 80, 6.53);
INSERT INTO  provincial_AT  VALUES ('', 5, 90, 7.17);
INSERT INTO  provincial_AT VALUES ('', 5, 100, 7.76);
INSERT INTO  provincial_AT  VALUES ('', 5, 125, 8.82);
INSERT INTO  provincial_AT  VALUES ('', 5, 150, 10.34);
INSERT INTO  provincial_AT  VALUES ('', 5, 175, 12.85);
INSERT INTO  provincial_AT  VALUES ('', 5, 200, 14.46);
INSERT INTO  provincial_AT  VALUES ('', 5, 250, 16.45);
INSERT INTO  provincial_AT  VALUES ('', 5, 300, 18.47);

CREATE TABLE users (
	nombre varchar(25),
	email varchar(100) PRIMARY KEY,
	password varchar(100)
) ENGINE=InnoDB;

INSERT INTO users VALUES ('juan','juan@admin.es','juan');