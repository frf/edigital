--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cat_chamados_id_seq OWNER TO edigital;

--
-- Name: cat_chamados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE cat_chamados_id_seq OWNED BY cat_chamados.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.chamados_id_seq OWNER TO edigital;

--
-- Name: chamados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE chamados_id_seq OWNED BY chamados.id;


--
-- Name: cliente; Type: TABLE; Schema: public; Owner: edigital; Tablespace: 
--

CREATE TABLE cliente (
    id integer NOT NULL,
    nome character varying(255),
    ativo boolean DEFAULT false,
    email character varying(200),
    obscontrato text
);


ALTER TABLE public.cliente OWNER TO edigital;

--
-- Name: cliente_id_seq; Type: SEQUENCE; Schema: public; Owner: edigital
--

CREATE SEQUENCE cliente_id_seq
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cliente_id_seq OWNER TO edigital;

--
-- Name: cliente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE cliente_id_seq OWNED BY cliente.id;


--
-- Name: cliente_pgtos; Type: TABLE; Schema: public; Owner: edigital; Tablespace: 
--

CREATE TABLE cliente_pgtos (
    id integer NOT NULL,
    valor numeric(10,2),
    idproduto integer,
    idcliente integer,
    idmoeda integer,
    descricao character varying(200),
    ispaid boolean DEFAULT false,
    nota character varying(200)
);


ALTER TABLE public.cliente_pgtos OWNER TO edigital;

--
-- Name: cliente_pgtos_id_seq; Type: SEQUENCE; Schema: public; Owner: edigital
--

CREATE SEQUENCE cliente_pgtos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cliente_pgtos_id_seq OWNER TO edigital;

--
-- Name: cliente_pgtos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE cliente_pgtos_id_seq OWNED BY cliente_pgtos.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.idoc_id_seq OWNER TO edigital;

--
-- Name: idoc_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE idoc_id_seq OWNED BY idoc.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mensagens_id_seq OWNER TO edigital;

--
-- Name: mensagens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE mensagens_id_seq OWNED BY mensagens.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: edigital; Tablespace: 
--

CREATE TABLE migrations (
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO edigital;

--
-- Name: moeda; Type: TABLE; Schema: public; Owner: edigital; Tablespace: 
--

CREATE TABLE moeda (
    id integer NOT NULL,
    nome character varying(100),
    simbolo character varying(100),
    codigo character varying(100),
    sigla character varying(10)
);


ALTER TABLE public.moeda OWNER TO edigital;

--
-- Name: moeda_id_seq; Type: SEQUENCE; Schema: public; Owner: edigital
--

CREATE SEQUENCE moeda_id_seq
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.moeda_id_seq OWNER TO edigital;

--
-- Name: moeda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE moeda_id_seq OWNED BY moeda.id;


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
-- Name: produtos; Type: TABLE; Schema: public; Owner: edigital; Tablespace: 
--

CREATE TABLE produtos (
    id integer NOT NULL,
    nome character varying(200),
    valor numeric(10,2),
    idmoeda integer,
    tipo character(1),
    idcliente integer
);


ALTER TABLE public.produtos OWNER TO edigital;

--
-- Name: produtos_id_seq; Type: SEQUENCE; Schema: public; Owner: edigital
--

CREATE SEQUENCE produtos_id_seq
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.produtos_id_seq OWNER TO edigital;

--
-- Name: produtos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE produtos_id_seq OWNED BY produtos.id;


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
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.status_chamados_id_seq OWNER TO edigital;

--
-- Name: status_chamados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE status_chamados_id_seq OWNED BY status_chamados.id;


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
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_id_seq OWNER TO edigital;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE usuarios_id_seq OWNED BY usuarios.id;


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

ALTER TABLE ONLY cliente_pgtos ALTER COLUMN id SET DEFAULT nextval('cliente_pgtos_id_seq'::regclass);


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

ALTER TABLE ONLY moeda ALTER COLUMN id SET DEFAULT nextval('moeda_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY produtos ALTER COLUMN id SET DEFAULT nextval('produtos_id_seq'::regclass);


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

COPY cat_chamados (id, cat_chamado, created_at, updated_at) FROM stdin;
1	Suporte	2015-01-23 11:19:11	2015-01-23 11:19:11
2	Dúvida	2015-01-23 11:19:11	2015-01-23 11:19:11
3	Solicitação	2015-01-23 11:19:11	2015-01-23 11:19:11
\.


--
-- Name: cat_chamados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('cat_chamados_id_seq', 1, false);


--
-- Data for Name: chamados; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY chamados (id, usuario, categoria, titulo, status, mensagem, data, created_at, updated_at) FROM stdin;
\.


--
-- Name: chamados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('chamados_id_seq', 1, false);


--
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY cliente (id, nome, ativo, email, obscontrato) FROM stdin;
1	FSI Tecnologia	t	contato@fsitecnologia.com.br	\N
\.


--
-- Name: cliente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('cliente_id_seq', 1, true);


--
-- Data for Name: cliente_pgtos; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY cliente_pgtos (id, valor, idproduto, idcliente, idmoeda, descricao, ispaid, nota) FROM stdin;
19	180.00	1	1	1	\N	f	\N
20	111.00	\N	1	1	Remocao de mouse	f	\N
\.


--
-- Name: cliente_pgtos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('cliente_pgtos_id_seq', 20, true);


--
-- Data for Name: idoc; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY idoc (id, nome, idcliente, file) FROM stdin;
\.


--
-- Name: idoc_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('idoc_id_seq', 1, false);


--
-- Data for Name: mensagens; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY mensagens (id, mensagem, id_chamado, no_usuario, data, created_at, updated_at) FROM stdin;
\.


--
-- Name: mensagens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('mensagens_id_seq', 1, false);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY migrations (migration, batch) FROM stdin;
2014_12_30_184246_criar_usuario	1
2014_12_30_184338_create_password_reminders_table	1
\.


--
-- Data for Name: moeda; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY moeda (id, nome, simbolo, codigo, sigla) FROM stdin;
1	\N	R$	\N	BRL
2	\N	$	\N	USD
\.


--
-- Name: moeda_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('moeda_id_seq', 2, true);


--
-- Data for Name: password_reminders; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY password_reminders (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: produtos; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY produtos (id, nome, valor, idmoeda, tipo, idcliente) FROM stdin;
1	Visita técnica sem contrato	180.00	1	\N	\N
\.


--
-- Name: produtos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('produtos_id_seq', 1, true);


--
-- Data for Name: status_chamados; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY status_chamados (id, status_chamado, created_at, updated_at) FROM stdin;
1	Aberto	2015-01-23 11:19:11	2015-01-23 11:19:11
2	Em Andamento	2015-01-23 11:19:11	2015-01-23 11:19:11
3	Fechado	2015-01-23 11:19:11	2015-01-23 11:19:11
\.


--
-- Name: status_chamados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('status_chamados_id_seq', 1, false);


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY usuarios (id, email, senha, nome, tipo, remember_token, created_at, updated_at, idcliente) FROM stdin;
1	cliente@cliente.com.br	$2y$10$NKCWZf2YOixbhJXuicsoEOUt20mxaKBAC878FxlRb.scUwD0IeReS	Cliente	cliente	\N	2015-01-28 00:16:26	2015-01-28 00:16:26	1
2	admin@edigital.com.br	$2y$10$Mb..CGIaWwTgPZkk11cfru5MFwdCn.huJmygXa.GhfEcB7i9Ec8tW	Administrador	admin	\N	2015-01-28 00:16:26	2015-01-28 00:16:26	\N
\.


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('usuarios_id_seq', 2, true);


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
-- Name: cliente_pgtos_pkey; Type: CONSTRAINT; Schema: public; Owner: edigital; Tablespace: 
--

ALTER TABLE ONLY cliente_pgtos
    ADD CONSTRAINT cliente_pgtos_pkey PRIMARY KEY (id);


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
-- Name: moeda_pkey; Type: CONSTRAINT; Schema: public; Owner: edigital; Tablespace: 
--

ALTER TABLE ONLY moeda
    ADD CONSTRAINT moeda_pkey PRIMARY KEY (id);


--
-- Name: produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: edigital; Tablespace: 
--

ALTER TABLE ONLY produtos
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (id);


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
-- Name: cliente_pgtos_idcliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY cliente_pgtos
    ADD CONSTRAINT cliente_pgtos_idcliente_fkey FOREIGN KEY (idcliente) REFERENCES cliente(id);


--
-- Name: cliente_pgtos_idmoeda_fkey; Type: FK CONSTRAINT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY cliente_pgtos
    ADD CONSTRAINT cliente_pgtos_idmoeda_fkey FOREIGN KEY (idmoeda) REFERENCES moeda(id);


--
-- Name: cliente_pgtos_idproduto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY cliente_pgtos
    ADD CONSTRAINT cliente_pgtos_idproduto_fkey FOREIGN KEY (idproduto) REFERENCES produtos(id);


--
-- Name: idoc_idcliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY idoc
    ADD CONSTRAINT idoc_idcliente_fkey FOREIGN KEY (idcliente) REFERENCES cliente(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: produtos_idcliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY produtos
    ADD CONSTRAINT produtos_idcliente_fkey FOREIGN KEY (idcliente) REFERENCES cliente(id);


--
-- Name: produtos_idmoeda_fkey; Type: FK CONSTRAINT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY produtos
    ADD CONSTRAINT produtos_idmoeda_fkey FOREIGN KEY (idmoeda) REFERENCES moeda(id);


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

