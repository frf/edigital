--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

--
-- Name: plpgsql; Type: PROCEDURAL LANGUAGE; Schema: -; Owner: postgres
--

CREATE PROCEDURAL LANGUAGE plpgsql;


ALTER PROCEDURAL LANGUAGE plpgsql OWNER TO postgres;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: cat_chamados; Type: TABLE; Schema: public; Owner: edigital; Tablespace: 
--

CREATE TABLE cat_chamados (
    id integer NOT NULL,
    cat_chamado character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.cat_chamados OWNER TO edigital;

--
-- Name: cat_chamados_id_seq; Type: SEQUENCE; Schema: public; Owner: edigital
--

CREATE SEQUENCE cat_chamados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.cat_chamados_id_seq OWNER TO edigital;

--
-- Name: cat_chamados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE cat_chamados_id_seq OWNED BY cat_chamados.id;


--
-- Name: cat_chamados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('cat_chamados_id_seq', 1, false);


--
-- Name: chamados; Type: TABLE; Schema: public; Owner: edigital; Tablespace: 
--

CREATE TABLE chamados (
    id integer NOT NULL,
    usuario character varying(255) NOT NULL,
    categoria integer NOT NULL,
    titulo character varying(255) NOT NULL,
    status integer NOT NULL,
    mensagem character varying(255) NOT NULL,
    data character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.chamados OWNER TO edigital;

--
-- Name: chamados_id_seq; Type: SEQUENCE; Schema: public; Owner: edigital
--

CREATE SEQUENCE chamados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.chamados_id_seq OWNER TO edigital;

--
-- Name: chamados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE chamados_id_seq OWNED BY chamados.id;


--
-- Name: chamados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('chamados_id_seq', 1, false);


--
-- Name: cliente; Type: TABLE; Schema: public; Owner: edigital; Tablespace: 
--

CREATE TABLE cliente (
    id integer NOT NULL,
    nome character varying(255),
    ativo boolean DEFAULT false,
    email character varying(200)
);


ALTER TABLE public.cliente OWNER TO edigital;

--
-- Name: cliente_id_seq; Type: SEQUENCE; Schema: public; Owner: edigital
--

CREATE SEQUENCE cliente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.cliente_id_seq OWNER TO edigital;

--
-- Name: cliente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE cliente_id_seq OWNED BY cliente.id;


--
-- Name: cliente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('cliente_id_seq', 3, true);


--
-- Name: idoc; Type: TABLE; Schema: public; Owner: edigital; Tablespace: 
--

CREATE TABLE idoc (
    id integer NOT NULL,
    nome character varying(255),
    idcliente bigint,
    file character varying(255)
);


ALTER TABLE public.idoc OWNER TO edigital;

--
-- Name: idoc_id_seq; Type: SEQUENCE; Schema: public; Owner: edigital
--

CREATE SEQUENCE idoc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.idoc_id_seq OWNER TO edigital;

--
-- Name: idoc_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE idoc_id_seq OWNED BY idoc.id;


--
-- Name: idoc_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('idoc_id_seq', 1, false);


--
-- Name: mensagens; Type: TABLE; Schema: public; Owner: edigital; Tablespace: 
--

CREATE TABLE mensagens (
    id integer NOT NULL,
    mensagem text NOT NULL,
    id_chamado integer NOT NULL,
    no_usuario character varying(255) NOT NULL,
    data character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.mensagens OWNER TO edigital;

--
-- Name: mensagens_id_seq; Type: SEQUENCE; Schema: public; Owner: edigital
--

CREATE SEQUENCE mensagens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.mensagens_id_seq OWNER TO edigital;

--
-- Name: mensagens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE mensagens_id_seq OWNED BY mensagens.id;


--
-- Name: mensagens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('mensagens_id_seq', 1, false);


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: edigital; Tablespace: 
--

CREATE TABLE migrations (
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO edigital;

--
-- Name: password_reminders; Type: TABLE; Schema: public; Owner: edigital; Tablespace: 
--

CREATE TABLE password_reminders (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL
);


ALTER TABLE public.password_reminders OWNER TO edigital;

--
-- Name: status_chamados; Type: TABLE; Schema: public; Owner: edigital; Tablespace: 
--

CREATE TABLE status_chamados (
    id integer NOT NULL,
    status_chamado character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.status_chamados OWNER TO edigital;

--
-- Name: status_chamados_id_seq; Type: SEQUENCE; Schema: public; Owner: edigital
--

CREATE SEQUENCE status_chamados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.status_chamados_id_seq OWNER TO edigital;

--
-- Name: status_chamados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE status_chamados_id_seq OWNED BY status_chamados.id;


--
-- Name: status_chamados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('status_chamados_id_seq', 1, false);


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: edigital; Tablespace: 
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
    idcliente integer,
    CONSTRAINT usuarios_tipo_check CHECK (((tipo)::text = ANY (ARRAY[('admin'::character varying)::text, ('cliente'::character varying)::text])))
);


ALTER TABLE public.usuarios OWNER TO edigital;

--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: edigital
--

CREATE SEQUENCE usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.usuarios_id_seq OWNER TO edigital;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE usuarios_id_seq OWNED BY usuarios.id;


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('usuarios_id_seq', 1, true);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY cat_chamados ALTER COLUMN id SET DEFAULT nextval('cat_chamados_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY chamados ALTER COLUMN id SET DEFAULT nextval('chamados_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY cliente ALTER COLUMN id SET DEFAULT nextval('cliente_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY idoc ALTER COLUMN id SET DEFAULT nextval('idoc_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY mensagens ALTER COLUMN id SET DEFAULT nextval('mensagens_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY status_chamados ALTER COLUMN id SET DEFAULT nextval('status_chamados_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY usuarios ALTER COLUMN id SET DEFAULT nextval('usuarios_id_seq'::regclass);


--
-- Data for Name: cat_chamados; Type: TABLE DATA; Schema: public; Owner: edigital
--



--
-- Data for Name: chamados; Type: TABLE DATA; Schema: public; Owner: edigital
--



--
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: edigital
--

INSERT INTO cliente (id, nome, ativo, email) VALUES (3, 'Cliente 3', false, NULL);
INSERT INTO cliente (id, nome, ativo, email) VALUES (1, 'FSI Tecnologia', false, NULL);


--
-- Data for Name: idoc; Type: TABLE DATA; Schema: public; Owner: edigital
--



--
-- Data for Name: mensagens; Type: TABLE DATA; Schema: public; Owner: edigital
--



--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: edigital
--

INSERT INTO migrations (migration, batch) VALUES ('2014_12_30_184246_criar_usuario', 1);
INSERT INTO migrations (migration, batch) VALUES ('2014_12_30_184338_create_password_reminders_table', 1);


--
-- Data for Name: password_reminders; Type: TABLE DATA; Schema: public; Owner: edigital
--



--
-- Data for Name: status_chamados; Type: TABLE DATA; Schema: public; Owner: edigital
--



--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: edigital
--

INSERT INTO usuarios (id, email, senha, nome, tipo, remember_token, created_at, updated_at, idcliente) VALUES (1, 'seu@email.com', '$2y$10$dIN4d.hnSfD/Il/7aLHp5uTYqSDgt8GNpzl/31jPhl46.NoihfCum', 'Seu Nome', 'admin', 'jDc19ReePLTr6B52kUa1Uf5vlnWQm2vVYrJTT7zkmTfzYQTeIw3Vk69PQwSz', '2014-12-30 18:50:45', '2014-12-30 19:02:01', NULL);


--
-- Name: cat_chamados_pkey; Type: CONSTRAINT; Schema: public; Owner: edigital; Tablespace: 
--

ALTER TABLE ONLY cat_chamados
    ADD CONSTRAINT cat_chamados_pkey PRIMARY KEY (id);


--
-- Name: chamados_pkey; Type: CONSTRAINT; Schema: public; Owner: edigital; Tablespace: 
--

ALTER TABLE ONLY chamados
    ADD CONSTRAINT chamados_pkey PRIMARY KEY (id);


--
-- Name: cliente_pkey; Type: CONSTRAINT; Schema: public; Owner: edigital; Tablespace: 
--

ALTER TABLE ONLY cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (id);


--
-- Name: idoc_pkey; Type: CONSTRAINT; Schema: public; Owner: edigital; Tablespace: 
--

ALTER TABLE ONLY idoc
    ADD CONSTRAINT idoc_pkey PRIMARY KEY (id);


--
-- Name: mensagens_pkey; Type: CONSTRAINT; Schema: public; Owner: edigital; Tablespace: 
--

ALTER TABLE ONLY mensagens
    ADD CONSTRAINT mensagens_pkey PRIMARY KEY (id);


--
-- Name: status_chamado_pkey; Type: CONSTRAINT; Schema: public; Owner: edigital; Tablespace: 
--

ALTER TABLE ONLY status_chamados
    ADD CONSTRAINT status_chamado_pkey PRIMARY KEY (id);


--
-- Name: usuarios_email_unique; Type: CONSTRAINT; Schema: public; Owner: edigital; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_email_unique UNIQUE (email);


--
-- Name: usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: edigital; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- Name: password_reminders_email_index; Type: INDEX; Schema: public; Owner: edigital; Tablespace: 
--

CREATE INDEX password_reminders_email_index ON password_reminders USING btree (email);


--
-- Name: password_reminders_token_index; Type: INDEX; Schema: public; Owner: edigital; Tablespace: 
--

CREATE INDEX password_reminders_token_index ON password_reminders USING btree (token);


--
-- Name: idoc_idcliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY idoc
    ADD CONSTRAINT idoc_idcliente_fkey FOREIGN KEY (idcliente) REFERENCES cliente(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: usuarios_idcliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_idcliente_fkey FOREIGN KEY (idcliente) REFERENCES cliente(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

