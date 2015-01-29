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
-- Name: cat_chamados; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE cat_chamados (
    id integer NOT NULL,
    cat_chamado character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


--
-- Name: cat_chamados_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE cat_chamados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: cat_chamados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE cat_chamados_id_seq OWNED BY cat_chamados.id;


--
-- Name: chamados; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE chamados (
    id integer NOT NULL,
    categoria integer NOT NULL,
    titulo character varying(255) NOT NULL,
    status integer NOT NULL,
    mensagem character varying(255) NOT NULL,
    data character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    idusuario integer
);


--
-- Name: chamados_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE chamados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: chamados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE chamados_id_seq OWNED BY chamados.id;


--
-- Name: cliente; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE cliente (
    id integer NOT NULL,
    nome character varying(255),
    ativo boolean DEFAULT false,
    email character varying(200),
    obscontrato text
);


--
-- Name: cliente_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE cliente_id_seq
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;


--
-- Name: cliente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE cliente_id_seq OWNED BY cliente.id;


--
-- Name: cliente_pgtos; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE cliente_pgtos (
    id integer NOT NULL,
    valor numeric(10,2),
    idproduto integer,
    idcliente integer,
    idmoeda integer,
    descricao character varying(200),
    ispaid boolean DEFAULT false,
    nota character varying(200),
    dtpagamento timestamp without time zone
);


--
-- Name: cliente_pgtos_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE cliente_pgtos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: cliente_pgtos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE cliente_pgtos_id_seq OWNED BY cliente_pgtos.id;


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
-- Name: mensagens; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE mensagens (
    id integer NOT NULL,
    mensagem text NOT NULL,
    id_chamado integer NOT NULL,
    data character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    idusuario integer
);


--
-- Name: mensagens_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE mensagens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: mensagens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE mensagens_id_seq OWNED BY mensagens.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE migrations (
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


--
-- Name: moeda; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE moeda (
    id integer NOT NULL,
    nome character varying(100),
    simbolo character varying(100),
    codigo character varying(100),
    sigla character varying(10)
);


--
-- Name: moeda_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE moeda_id_seq
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;


--
-- Name: moeda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE moeda_id_seq OWNED BY moeda.id;


--
-- Name: password_reminders; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE password_reminders (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL
);


--
-- Name: produtos; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE produtos (
    id integer NOT NULL,
    nome character varying(200),
    valor numeric(10,2),
    idmoeda integer,
    idcliente integer,
    tipo character(1)
);


--
-- Name: produtos_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE produtos_id_seq
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;


--
-- Name: produtos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE produtos_id_seq OWNED BY produtos.id;


--
-- Name: status_chamados; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE status_chamados (
    id integer NOT NULL,
    status_chamado character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


--
-- Name: status_chamados_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE status_chamados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: status_chamados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE status_chamados_id_seq OWNED BY status_chamados.id;


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
    idcliente integer,
    isdelete boolean DEFAULT false,
    lang character(2),
    CONSTRAINT usuarios_tipo_check CHECK (((tipo)::text = ANY (ARRAY[('admin'::character varying)::text, ('cliente'::character varying)::text])))
);


--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;


--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE usuarios_id_seq OWNED BY usuarios.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY cat_chamados ALTER COLUMN id SET DEFAULT nextval('cat_chamados_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY chamados ALTER COLUMN id SET DEFAULT nextval('chamados_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY cliente ALTER COLUMN id SET DEFAULT nextval('cliente_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY cliente_pgtos ALTER COLUMN id SET DEFAULT nextval('cliente_pgtos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY idoc ALTER COLUMN id SET DEFAULT nextval('idoc_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY mensagens ALTER COLUMN id SET DEFAULT nextval('mensagens_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY moeda ALTER COLUMN id SET DEFAULT nextval('moeda_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY produtos ALTER COLUMN id SET DEFAULT nextval('produtos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY status_chamados ALTER COLUMN id SET DEFAULT nextval('status_chamados_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY usuarios ALTER COLUMN id SET DEFAULT nextval('usuarios_id_seq'::regclass);


--
-- Data for Name: cat_chamados; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO cat_chamados VALUES (1, 'Suporte', '2015-01-23 11:19:11', '2015-01-23 11:19:11');
INSERT INTO cat_chamados VALUES (2, 'Dúvida', '2015-01-23 11:19:11', '2015-01-23 11:19:11');
INSERT INTO cat_chamados VALUES (3, 'Solicitação', '2015-01-23 11:19:11', '2015-01-23 11:19:11');


--
-- Name: cat_chamados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('cat_chamados_id_seq', 1, false);


--
-- Data for Name: chamados; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO chamados VALUES (1, 3, 'ddddddd', 2, 'ddddddddddd', '28/01/2015 16:17:24', '2015-01-28 16:17:24', '2015-01-28 16:50:36', 6);


--
-- Name: chamados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('chamados_id_seq', 1, true);


--
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO cliente VALUES (1, 'FSI Tecnologia', true, 'contato@fsitecnologia.com.br', 'Atendimento no horário comercial 7:30 h às 17:30 h, fora dele a CONTRATADA acrescerá 25% sobre o valor cobrado por hora presencial ou à distância, 50% aos sábado, bem como 100% aos domingos.');
INSERT INTO cliente VALUES (7, 'Kranunion', true, 'flavia.farias@kranunion.de', '');


--
-- Name: cliente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('cliente_id_seq', 7, true);


--
-- Data for Name: cliente_pgtos; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO cliente_pgtos VALUES (25, 300.00, NULL, 7, 1, 'Atendimento', true, NULL, '2015-01-28 18:00:00');
INSERT INTO cliente_pgtos VALUES (26, 111.00, NULL, 1, 1, 'dddd', false, '1_bfd5422fb2a112bdeb6456428188a111.pdf', NULL);


--
-- Name: cliente_pgtos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('cliente_pgtos_id_seq', 26, true);


--
-- Data for Name: idoc; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- Name: idoc_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('idoc_id_seq', 1, false);


--
-- Data for Name: mensagens; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO mensagens VALUES (1, 'vvvvvvvvvvvvvvvvv', 1, '28/01/2015 16:21:10', '2015-01-28 16:21:10', '2015-01-28 16:21:10', 6);
INSERT INTO mensagens VALUES (2, 'Sra Flavia,

Estamos providenciando a analise e retornamos o mais breve possivel.', 1, '28/01/2015 16:50:36', '2015-01-28 16:50:36', '2015-01-28 16:50:36', 2);


--
-- Name: mensagens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('mensagens_id_seq', 2, true);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO migrations VALUES ('2014_12_30_184246_criar_usuario', 1);
INSERT INTO migrations VALUES ('2014_12_30_184338_create_password_reminders_table', 1);


--
-- Data for Name: moeda; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO moeda VALUES (1, NULL, 'R$', NULL, 'BRL');
INSERT INTO moeda VALUES (2, NULL, '$', NULL, 'USD');


--
-- Name: moeda_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('moeda_id_seq', 2, true);


--
-- Data for Name: password_reminders; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- Data for Name: produtos; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- Name: produtos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('produtos_id_seq', 2, true);


--
-- Data for Name: status_chamados; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO status_chamados VALUES (1, 'Aberto', '2015-01-23 11:19:11', '2015-01-23 11:19:11');
INSERT INTO status_chamados VALUES (2, 'Em Andamento', '2015-01-23 11:19:11', '2015-01-23 11:19:11');
INSERT INTO status_chamados VALUES (3, 'Fechado', '2015-01-23 11:19:11', '2015-01-23 11:19:11');


--
-- Name: status_chamados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('status_chamados_id_seq', 1, false);


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO usuarios VALUES (1, 'cliente@cliente.com.br', '$2y$10$AthyydEb/ar2cnkppjQ8t..yBaZL/yhQfwJrH0qKEo0zDV4IpC2/6', 'Cliente', 'cliente', NULL, '2015-01-23 15:47:46', '2015-01-23 15:47:46', 1, false, NULL);
INSERT INTO usuarios VALUES (2, 'admin@edigital.com.br', '$2y$10$uK9dUoKcELBRQRbGkWYv5ucmbuDL.XfG43fvBfA6DJXbnmAi9/1a2', 'Administrador', 'admin', 'VMbjBbvY9hvlxJXjNBddAWsuqCQw4rn78MSGrzY65YxiMv5dQjlCetX7EQpw', '2015-01-23 15:47:46', '2015-01-29 17:29:52', NULL, false, NULL);
INSERT INTO usuarios VALUES (6, 'flavia.farias@kranunion.de', '$2y$10$NHmsV6BSdoPdd9yD.Da0..IMHQ5O1e7TeJf.jaxAJh7zAnA7IP/aW', 'Flavia Farias', 'cliente', 'e9LZWoqbdvBTjl4DY0HEQwytnLdotzXx7oeKCvtW7tmyuPUVzJqRxT0LEmtD', '2015-01-28 16:12:26', '2015-01-28 18:24:46', 7, false, 'en');
INSERT INTO usuarios VALUES (7, 'fff', '$2y$10$BnK305DDxNCN.WTyN7QD8.lXj71Dspg2fMZU8SKJQc3dVlc/.taEm', 'XXXXX', 'cliente', NULL, '2015-01-29 17:52:58', '2015-01-29 17:52:58', 7, false, 'en');
INSERT INTO usuarios VALUES (8, 'dasdas', '$2y$10$NkYSa9AlKmBMQqRGlhZqjOJsZpncsvxOxapMqYnUtxCDuOybRQwRy', 'sadsad', 'cliente', NULL, '2015-01-29 17:53:51', '2015-01-29 17:53:51', 7, false, 'pt');


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('usuarios_id_seq', 8, true);


--
-- Name: cat_chamados_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cat_chamados
    ADD CONSTRAINT cat_chamados_pkey PRIMARY KEY (id);


--
-- Name: chamados_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY chamados
    ADD CONSTRAINT chamados_pkey PRIMARY KEY (id);


--
-- Name: cliente_pgtos_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cliente_pgtos
    ADD CONSTRAINT cliente_pgtos_pkey PRIMARY KEY (id);


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
-- Name: mensagens_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mensagens
    ADD CONSTRAINT mensagens_pkey PRIMARY KEY (id);


--
-- Name: moeda_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY moeda
    ADD CONSTRAINT moeda_pkey PRIMARY KEY (id);


--
-- Name: produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY produtos
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (id);


--
-- Name: status_chamado_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY status_chamados
    ADD CONSTRAINT status_chamado_pkey PRIMARY KEY (id);


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
-- Name: chamados_idusuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY chamados
    ADD CONSTRAINT chamados_idusuario_fkey FOREIGN KEY (idusuario) REFERENCES usuarios(id);


--
-- Name: cliente_pgtos_idcliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cliente_pgtos
    ADD CONSTRAINT cliente_pgtos_idcliente_fkey FOREIGN KEY (idcliente) REFERENCES cliente(id);


--
-- Name: cliente_pgtos_idmoeda_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cliente_pgtos
    ADD CONSTRAINT cliente_pgtos_idmoeda_fkey FOREIGN KEY (idmoeda) REFERENCES moeda(id);


--
-- Name: cliente_pgtos_idproduto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cliente_pgtos
    ADD CONSTRAINT cliente_pgtos_idproduto_fkey FOREIGN KEY (idproduto) REFERENCES produtos(id);


--
-- Name: idoc_idcliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY idoc
    ADD CONSTRAINT idoc_idcliente_fkey FOREIGN KEY (idcliente) REFERENCES cliente(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: mensagens_idusuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY mensagens
    ADD CONSTRAINT mensagens_idusuario_fkey FOREIGN KEY (idusuario) REFERENCES usuarios(id);


--
-- Name: produtos_idcliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY produtos
    ADD CONSTRAINT produtos_idcliente_fkey FOREIGN KEY (idcliente) REFERENCES cliente(id);


--
-- Name: produtos_idmoeda_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY produtos
    ADD CONSTRAINT produtos_idmoeda_fkey FOREIGN KEY (idmoeda) REFERENCES moeda(id);


--
-- Name: usuarios_idcliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_idcliente_fkey FOREIGN KEY (idcliente) REFERENCES cliente(id);


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

