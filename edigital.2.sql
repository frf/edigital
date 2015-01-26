-- Robson 21/01/2014
-- Table: chamados

-- DROP TABLE chamados;

CREATE TABLE chamados
(
  id serial NOT NULL,
  usuario character varying(255) NOT NULL,
  categoria integer NOT NULL,
  titulo character varying(255) NOT NULL,
  status integer NOT NULL,
  mensagem character varying(255) NOT NULL,
  data character varying(255) NOT NULL,
  created_at timestamp without time zone NOT NULL,
  updated_at timestamp without time zone NOT NULL,
  email character varying(255) NOT NULL,
  CONSTRAINT chamados_pkey PRIMARY KEY (id)
);

-- Table: cat_chamados

-- DROP TABLE cat_chamados;

CREATE TABLE cat_chamados
(
  id serial NOT NULL,
  cat_chamado character varying(255) NOT NULL,
  created_at timestamp without time zone NOT NULL,
  updated_at timestamp without time zone NOT NULL,
  CONSTRAINT cat_chamados_pkey PRIMARY KEY (id)
);

-- Table: status_chamados

-- DROP TABLE status_chamados;

CREATE TABLE status_chamados
(
  id serial NOT NULL,
  status_chamado character varying(255) NOT NULL,
  created_at timestamp without time zone NOT NULL,
  updated_at timestamp without time zone NOT NULL,
  CONSTRAINT status_chamado_pkey PRIMARY KEY (id)
);

-- Table: mensagens

-- DROP TABLE mensagens;

CREATE TABLE mensagens
(
  id serial NOT NULL,
  mensagem text NOT NULL,
  id_chamado integer NOT NULL,
  no_usuario character varying(255) NOT NULL,
  data character varying(255) NOT NULL,
  created_at timestamp without time zone NOT NULL,
  updated_at timestamp without time zone NOT NULL,
  CONSTRAINT mensagens_pkey PRIMARY KEY (id)
);







