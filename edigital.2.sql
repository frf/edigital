--
-- PostgreSQL database dump
--
SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--
CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--
COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
SET search_path = public, pg_catalog;
SET default_tablespace = '';
SET default_with_oids = false;
--
-- Name: cliente; Type: TABLE; Schema: public; Owner: -; Tablespace:
--
CREATE TABLE cliente (
id integer NOT NULL,
nome character varying(255),
login character varying(150),
senha character varying(25),
ativo boolean DEFAULT false
);

ALTER TABLE cliente
  ADD COLUMN email character varying(200);


--
-- Name: cliente_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--
CREATE SEQUENCE cliente_id_seq
START WITH 1
INCREMENT BY 1
NO MINVALUE
NO MAXVALUE
CACHE 1;
--
-- Name: cliente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--
ALTER SEQUENCE cliente_id_seq OWNED BY cliente.id;
--
-- Name: idoc; Type: TABLE; Schema: public; Owner: -; Tablespace:
--
CREATE TABLE idoc (
id integer NOT NULL,
nome character varying(255),
idcliente bigint,
file character varying(255)
);
--
-- Name: idoc_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--
CREATE SEQUENCE idoc_id_seq
START WITH 1
INCREMENT BY 1
NO MINVALUE
NO MAXVALUE
CACHE 1;
--
-- Name: idoc_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--
ALTER SEQUENCE idoc_id_seq OWNED BY idoc.id;
--
-- Name: migrations; Type: TABLE; Schema: public; Owner: -; Tablespace:
--
CREATE TABLE migrations (
migration character varying(255) NOT NULL,
batch integer NOT NULL
);
--
-- Name: password_reminders; Type: TABLE; Schema: public; Owner: -; Tablespace:
--
CREATE TABLE password_reminders (
email character varying(255) NOT NULL,
token character varying(255) NOT NULL,
created_at timestamp without time zone NOT NULL
);
--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: -; Tablespace:
--
CREATE TABLE usuarios (
id integer NOT NULL,
email character varying(255) NOT NULL,
senha character varying(60) NOT NULL,
nome character varying(255) NOT NULL,
tipo character varying(255) NOT NULL,
remember_token character varying(100),
created_at timestamp without time zone NOT NULL,
updated_at timestamp without time zone NOT NULL,
CONSTRAINT usuarios_tipo_check CHECK (((tipo)::text = ANY ((ARRAY['admin'::character varying, 'autor'::character varying])::text[])))
);
--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--
CREATE SEQUENCE usuarios_id_seq
START WITH 1
INCREMENT BY 1
NO MINVALUE
NO MAXVALUE
CACHE 1;
--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--
ALTER SEQUENCE usuarios_id_seq OWNED BY usuarios.id;
--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--
ALTER TABLE ONLY cliente ALTER COLUMN id SET DEFAULT nextval('cliente_id_seq'::regclass);
--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--
ALTER TABLE ONLY idoc ALTER COLUMN id SET DEFAULT nextval('idoc_id_seq'::regclass);
--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--
ALTER TABLE ONLY usuarios ALTER COLUMN id SET DEFAULT nextval('usuarios_id_seq'::regclass);
--
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: -
--
INSERT INTO cliente VALUES (3, 'Cliente 3', 'cli3', '123', false);
INSERT INTO cliente VALUES (1, 'FSI Tecnologia', 'fsitecnologia', '123', false);
--
-- Name: cliente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--
SELECT pg_catalog.setval('cliente_id_seq', 3, true);
--
-- Data for Name: idoc; Type: TABLE DATA; Schema: public; Owner: -
--
--
-- Name: idoc_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--
SELECT pg_catalog.setval('idoc_id_seq', 1, false);
--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: -
--
INSERT INTO migrations VALUES ('2014_12_30_184246_criar_usuario', 1);
INSERT INTO migrations VALUES ('2014_12_30_184338_create_password_reminders_table', 1);
--
-- Data for Name: password_reminders; Type: TABLE DATA; Schema: public; Owner: -
--
--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: -
--
INSERT INTO usuarios VALUES (1, 'seu@email.com', '$2y$10$dIN4d.hnSfD/Il/7aLHp5uTYqSDgt8GNpzl/31jPhl46.NoihfCum', 'Seu Nome', 'admin', 'jDc19ReePLTr6B52kUa1Uf5vlnWQm2vVYrJTT7zkmTfzYQTeIw3Vk69PQwSz', '2014-12-30 18:50:45', '2014-12-30 19:02:01');
--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--
SELECT pg_catalog.setval('usuarios_id_seq', 1, true);
--
-- Name: cliente_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace:
--
ALTER TABLE ONLY cliente
ADD CONSTRAINT cliente_pkey PRIMARY KEY (id);
--
-- Name: idoc_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace:
--
ALTER TABLE ONLY idoc
ADD CONSTRAINT idoc_pkey PRIMARY KEY (id);
--
-- Name: usuarios_email_unique; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace:
--
ALTER TABLE ONLY usuarios
ADD CONSTRAINT usuarios_email_unique UNIQUE (email);
--
-- Name: usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace:
--
ALTER TABLE ONLY usuarios
ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);
--
-- Name: password_reminders_email_index; Type: INDEX; Schema: public; Owner: -; Tablespace:
--
CREATE INDEX password_reminders_email_index ON password_reminders USING btree (email);
--
-- Name: password_reminders_token_index; Type: INDEX; Schema: public; Owner: -; Tablespace:
--
CREATE INDEX password_reminders_token_index ON password_reminders USING btree (token);
--
-- Name: idoc_idcliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--
ALTER TABLE ONLY idoc
ADD CONSTRAINT idoc_idcliente_fkey FOREIGN KEY (idcliente) REFERENCES cliente(id) ON UPDATE CASCADE ON DELETE CASCADE;
--
-- Name: public; Type: ACL; Schema: -; Owner: -
--
REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;
--
-- PostgreSQL database dump complete
--

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
  CONSTRAINT chamados_pkey PRIMARY KEY (id)
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

-- Table: status_chamados

-- DROP TABLE status_chamados;

CREATE TABLE status_chamados
(
  id integer NOT NULL DEFAULT nextval('status_chamado_id_seq'::regclass),
  status_chamado character varying(255) NOT NULL,
  created_at timestamp without time zone NOT NULL,
  updated_at timestamp without time zone NOT NULL,
  CONSTRAINT status_chamado_pkey PRIMARY KEY (id)
);






