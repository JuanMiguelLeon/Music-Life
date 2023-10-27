REM -- 																			BASE DE DATOS - MUSIC DDBB		

REM --					 CREACION DE BASE DE DATOS
--CREATE DATABASE Music_life_DDBB ;
-- Comentado de momento
  --connect system/system
  --set serveroutput on

  --ALTER SESSION SET NLS_DATE_FORMAT='DD/MM/YYYY';

REM --					 BORRADO DE TABLAS

DROP TABLE USUARIOS CASCADE CONSTRAINT;
DROP TABLE PLAYLISTS CASCADE CONSTRAINT;
DROP TABLE COMENTARIOS CASCADE CONSTRAINT;
DROP TABLE CANCIONES CASCADE CONSTRAINT;

REM --					 CREACION DE TABLAS

REM --	USUARIOS
CREATE TABLE USUARIOS(
	ID NUMBER(6) CONSTRAINT PK_USUARIOS PRIMARY KEY,
	NOMBRE VARCHAR2(26) NOT NULL,
	EMAIL VARCHAR2(50) NOT NULL UNIQUE,
	CONTRASENA VARCHAR2(20) NOT NULL
);

REM --  PLAYLISTS
CREATE TABLE PLAYLISTS(
  ID_PL NUMBER(6) CONSTRAINT PK_PLAYLISTS PRIMARY KEY,
  NOMBRE VARCHAR2(26) NOT NULL,
  CREADOR_ID NUMBER(6) NOT NULL,
  CONSTRAINT FK_CREADORID_PLAY FOREIGN KEY (CREADOR_ID) REFERENCES USUARIOS(ID) ON DELETE CASCADE,
  CONSTRAINT FK_CANCIONID_PLAY FOREIGN KEY (CANCION_ID) REFERENCES CANCIONES(CANCION_ID) ON DELETE CASCADE
);

REM --  COMENTARIOS
CREATE TABLE COMENTARIOS(
  COMENTARIO_ID NUMBER(6) CONSTRAINT PK_COMENTARIOS PRIMARY KEY,
  COMENTARIO VARCHAR2(200) NOT NULL, -- 200 caracteres máximo?
  USUARIO_ID NUMBER(6) NOT NULL,
  PLAYLIST_ID NUMBER(6) NOT NULL,
  CONSTRAINT FK_USUARIOID_COM FOREIGN KEY (USUARIO_ID) REFERENCES USUARIOS(ID) ON DELETE CASCADE,
  CONSTRAINT FK_PLAYLISTID_COM FOREIGN KEY (PLAYLIST_ID) REFERENCES PLAYLIST(ID_PL) ON DELETE CASCADE
);

REM --  CANCIONES En principio de eso se encarga la API
--CREATE TABLE CANCIONES(
--   CANCION_ID NUMBER(6) CONSTRAINT PK_CANCION PRIMARY KEY,
--    TITULO VARCHAR(20),
--    ARTISTA VARCHAR(20)
--);

REM -- 						BORRADO DE FILAS
DELETE USUARIOS;
DELETE PLAYLISTS;
DELETE COMENTARIOS;
DELETE CANCIONES;

REM --					 CREACION DE TRIGGERS

CREATE OR REPLACE TRIGGER usuarios_insertados
  BEFORE INSERT ON USUARIOS
  FOR EACH ROW
BEGIN
  SELECT usuarios_secuencia.nextval
  INTO :NEW.ID
  FROM dual;
END;

REM -- TRIGGER: INCREMENTAR ID USUARIOS AUTOMATICAMENTE - Tal vez no sea necesario, al menos de momento
CREATE SEQUENCE usuarios_secuencia;

CREATE OR REPLACE TRIGGER comentarios_insertados
  BEFORE INSERT ON COMENTARIOS
  FOR EACH ROW
BEGIN
  SELECT comentarios_secuencia.nextval
  INTO :NEW.ID
  FROM dual;
END;

REM -- TRIGGER: INCREMENTAR ID COMENTARIOS AUTOMATICAMENTE - si no guardamos fecha-hora, sería la manera d epoder ordenarlos cronoglógicamente
CREATE SEQUENCE comentarios_secuencia;

REM -- 						CREACION DE FILAS
-- REM DATOS USUARIOS
INSERT INTO USUARIOS (NOMBRE, EMAIL, CONTRASENA) VALUES('Sergio','email1@mail.es','1234');
INSERT INTO USUARIOS (NOMBRE, EMAIL, CONTRASENA) VALUES('Maki','email2@mail.es','1234');
INSERT INTO USUARIOS (NOMBRE, EMAIL, CONTRASENA) VALUES('Miguel','email3@mail.es','1234');
COMMIT;


-- Queda por saber cómo va a funcionar la api, en cuanto a cómo afecta a la base de datos las playlists y canciones, las guardamos en nuestra base o nos la da la api?