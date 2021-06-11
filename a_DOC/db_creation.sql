CREATE DATABASE certificaciones;

USE certificaciones;

CREATE TABLE admin (
    id_admin int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    cedula varchar(11) UNIQUE KEY,
    apellido varchar(80),
    nombre varchar(80),
    pass varchar(50),
    foto varchar(10)
);

CREATE TABLE informacion (
    id_informacion int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    institucion_nombre varchar(80),
    institucion_siglas varchar(20),
    institucion_ciudad varchar(50),
    institucion_rector_nombre varchar(80),
    institucion_rector_nivel_nombre varchar(80),
    institucion_rector_nivel_siglas varchar(20),
    pagina_nombre varchar(80),
    copyright longtext,
    ubicacion text
);

CREATE TABLE contacto (
    id_contacto int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre varchar(80),
    url varchar(100),
    logo varchar(10)
);

CREATE TABLE instituciones (
    id_instituciones int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre varchar(150),
    siglas varchar(50),
    logo varchar(10)
);

CREATE TABLE area (
    id_area int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    codigo varchar(2),
    descripcion text
);

CREATE TABLE especificacion (
    id_especificacion int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    codigo varchar(2),
    descripcion text,
    id_area int,
    FOREIGN KEY (id_area) REFERENCES area(id_area)
);

CREATE TABLE alineacion (
    id_alineacion int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    descripcion text
);

CREATE TABLE tipo_participante (
    id_tipo_participante int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    descripcion text
);

CREATE TABLE modalidad (
    id_modalidad int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    descripcion text
);

CREATE TABLE duracion (
    id_duracion int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    descripcion text
);

CREATE TABLE profesor (
    id_profesor int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    cedula varchar(11) UNIQUE KEY,
    apellido varchar(80),
    nombre varchar(80),
    indice_dactilar varchar(50),
    pass varchar(50),
    foto varchar(10),
    firma varchar(10)
);

/*TABLA CENTRAL "CURSO" / INICIO*/
CREATE TABLE modelo_curso (
    id_modelo_curso int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre varchar(50),
    hora_teorica int,
    hora_practica int,
    id_area int,
    id_alineacion int,
    id_tipo_participante int,
    id_modalidad int,
    id_duracion int,
    id_profesor int,
    FOREIGN KEY (id_area) REFERENCES area(id_area),
    FOREIGN KEY (id_alineacion) REFERENCES alineacion(id_alineacion),
    FOREIGN KEY (id_tipo_participante) REFERENCES tipo_participante(id_tipo_participante),
    FOREIGN KEY (id_modalidad) REFERENCES modalidad(id_modalidad),
    FOREIGN KEY (id_duracion) REFERENCES duracion(id_duracion),
    FOREIGN KEY (id_profesor) REFERENCES profesor(id_profesor)
);

CREATE TABLE curso (
    id_curso int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre varchar(50),
    fecha_inicio varchar(50),
    fecha_fin varchar(50),
    numero_cupos int,
    link_whatsapp text,
    foto varchar(10),
    id_modelo_curso int,
    FOREIGN KEY (id_modelo_curso) REFERENCES modelo_curso(id_modelo_curso)
);

CREATE TABLE participante (
    id_participante int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    cedula varchar(11) UNIQUE KEY,
    apellido varchar(80),
    nombre varchar(80),
    sexo varchar(10),
    nivel_instruccion varchar(10),
    direccion varchar(100),
    email varchar(50),
    celular varchar(15),
    telefono varchar(15),
    descripcion text,
    empresa_nombre varchar(80),
    empresa_actividad varchar(80),
    empresa_direccion varchar(100),
    empresa_telefono varchar(15)
);

CREATE TABLE matricula (
    id_matricula int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    estado varchar(15),
    id_participante int,
    id_curso int,
    certificado_nombre_participante varchar(100),
    certificado_cedula_participante varchar(15),
    certificado_nombre_curso varchar(80),
    certificado_nombre_institucion varchar(50),
    certificado_ciudad_institucion varchar(50),
    certificado_rector_institucion varchar(100),
    certificado_cordinador_institucion varchar(100),
    certificado_fecha_curso varchar(50),
    certificado_horas_curso int,
    certificado_lugar_fecha_emision varchar(100),
    certificado_codigo varchar(100),
    UNIQUE(id_participante, id_curso),
    FOREIGN KEY (id_participante) REFERENCES participante(id_participante),
    FOREIGN KEY (id_curso) REFERENCES curso(id_curso)
);

CREATE TABLE tipo_certificado (
    id_tipo_certificado int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre varchar(80)
);

CREATE TABLE certificado (
    id_certificado int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    cedula varchar(11),
    apellido varchar(80),
    nombre varchar(80),
    codigo varchar(50),
    foto varchar(10),
    id_tipo_certificado int,
    id_participante int,
    FOREIGN KEY (id_tipo_certificado) REFERENCES tipo_certificado(id_tipo_certificado),
    FOREIGN KEY (id_participante) REFERENCES participante(id_participante)
);

/*TABLA CENTRAL "CURSO" / FIN*/
/*DEPENDIENTES DE CURSO / INICIO*/
CREATE TABLE requisito (
    id_requisito int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    descripcion text,
    id_modelo_curso int,
    FOREIGN KEY (id_modelo_curso) REFERENCES modelo_curso(id_modelo_curso)
);

CREATE TABLE objetivo (
    id_objetivo int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    descripcion text,
    id_modelo_curso int,
    FOREIGN KEY (id_modelo_curso) REFERENCES modelo_curso(id_modelo_curso)
);

CREATE TABLE contenido_primario (
    id_contenido_primario int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    descripcion text,
    id_modelo_curso int,
    FOREIGN KEY (id_modelo_curso) REFERENCES modelo_curso(id_modelo_curso)
);

CREATE TABLE contenido_secundario (
    id_contenido_secundario int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    descripcion text,
    id_modelo_curso int,
    FOREIGN KEY (id_modelo_curso) REFERENCES modelo_curso(id_modelo_curso)
);

CREATE TABLE contenido_transversal (
    id_contenido_transversal int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    descripcion text,
    id_modelo_curso int,
    FOREIGN KEY (id_modelo_curso) REFERENCES modelo_curso(id_modelo_curso)
);

CREATE TABLE estrategia (
    id_estrategia int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    descripcion text,
    id_modelo_curso int,
    FOREIGN KEY (id_modelo_curso) REFERENCES modelo_curso(id_modelo_curso)
);

CREATE TABLE evaluacion_diagnostica (
    id_evaluacion_diagnostica int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    tecnica varchar(100),
    instrumento varchar(100),
    descripcion text,
    id_modelo_curso int,
    FOREIGN KEY (id_modelo_curso) REFERENCES modelo_curso(id_modelo_curso)
);

CREATE TABLE evaluacion_formativa (
    id_evaluacion_formativa int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    tecnica varchar(100),
    instrumento varchar(100),
    descripcion text,
    id_modelo_curso int,
    FOREIGN KEY (id_modelo_curso) REFERENCES modelo_curso(id_modelo_curso)
);

CREATE TABLE evaluacion_final (
    id_evaluacion_final int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    tecnica varchar(100),
    instrumento varchar(100),
    descripcion text,
    id_modelo_curso int,
    FOREIGN KEY (id_modelo_curso) REFERENCES modelo_curso(id_modelo_curso)
);

CREATE TABLE bibliografia (
    id_bibliografia int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    descripcion longtext,
    id_modelo_curso int,
    FOREIGN KEY (id_modelo_curso) REFERENCES modelo_curso(id_modelo_curso)
);

CREATE TABLE entorno_aprendizaje (
    id_entorno_aprendizaje int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    instalaciones varchar(100),
    teorica varchar(100),
    practica varchar(100),
    id_modelo_curso int,
    FOREIGN KEY (id_modelo_curso) REFERENCES modelo_curso(id_modelo_curso)
);

/*DEPENDIENTES DE CURSO / FIN*/
/*INDEPENDIENTES / INICIO*/
CREATE TABLE contenido_historial (
    id_contenido_historial int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    descripcion text
);

/*INDEPENDIENTES / FIN*/