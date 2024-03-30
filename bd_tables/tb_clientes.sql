CREATE TABLE tb_clientes(
    id_cliente          INT (11)        NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
    nombres_cliente     VARCHAR (255)   NULL,
    dni_cliente         VARCHAR (50)    NULL,
    placa_auto          VARCHAR (50)    NULL,

    fyh_creacion        DATETIME        NULL,
    fyh_actualizacion   DATETIME        NULL,
    fyh_eliminacion     DATETIME        NULL,
    estado              VARCHAR (10)
);