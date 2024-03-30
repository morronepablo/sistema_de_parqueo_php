CREATE TABLE tb_informaciones(
    id_informacion      INT (11)        NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
    nombre_parqueo      VARCHAR (255)   NULL,
    actividad_empresa   VARCHAR (100)   NULL,
    sucursal            VARCHAR (255)   NULL,
    direccion           VARCHAR (255)   NULL,
    zona                VARCHAR (255)   NULL,
    telefono            VARCHAR (255)   NULL,
    provincia           VARCHAR (255)   NULL,
    pais                VARCHAR (255)   NULL,

    fyh_creacion        DATETIME        NULL,
    fyh_actualizacion   DATETIME        NULL,
    fyh_eliminacion     DATETIME        NULL,
    estado              VARCHAR (10)
);