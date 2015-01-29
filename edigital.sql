--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.5
-- Dumped by pg_dump version 9.3.5
-- Started on 2015-01-29 18:14:31 BRST

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 198 (class 3079 OID 11791)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2153 (class 0 OID 0)
-- Dependencies: 198
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 170 (class 1259 OID 34681)
-- Name: cat_chamados; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE cat_chamados (
    id integer NOT NULL,
    cat_chamado character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


--
-- TOC entry 171 (class 1259 OID 34684)
-- Name: cat_chamados_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE cat_chamados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2154 (class 0 OID 0)
-- Dependencies: 171
-- Name: cat_chamados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE cat_chamados_id_seq OWNED BY cat_chamados.id;


--
-- TOC entry 192 (class 1259 OID 34839)
-- Name: categorias; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE categorias (
    id integer NOT NULL,
    id_cliente integer NOT NULL,
    nomecategoria character varying NOT NULL
);


--
-- TOC entry 193 (class 1259 OID 34845)
-- Name: categorias_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE categorias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2155 (class 0 OID 0)
-- Dependencies: 193
-- Name: categorias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE categorias_id_seq OWNED BY categorias.id;


--
-- TOC entry 172 (class 1259 OID 34686)
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
-- TOC entry 173 (class 1259 OID 34692)
-- Name: chamados_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE chamados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2156 (class 0 OID 0)
-- Dependencies: 173
-- Name: chamados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE chamados_id_seq OWNED BY chamados.id;


--
-- TOC entry 174 (class 1259 OID 34694)
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
-- TOC entry 175 (class 1259 OID 34701)
-- Name: cliente_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE cliente_id_seq
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2157 (class 0 OID 0)
-- Dependencies: 175
-- Name: cliente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE cliente_id_seq OWNED BY cliente.id;


--
-- TOC entry 176 (class 1259 OID 34703)
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
-- TOC entry 177 (class 1259 OID 34707)
-- Name: cliente_pgtos_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE cliente_pgtos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2158 (class 0 OID 0)
-- Dependencies: 177
-- Name: cliente_pgtos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE cliente_pgtos_id_seq OWNED BY cliente_pgtos.id;


--
-- TOC entry 194 (class 1259 OID 34853)
-- Name: documentos; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE documentos (
    id integer NOT NULL,
    idcategoria integer,
    idcliente integer,
    caminhodoc character varying(200),
    datainclusao timestamp without time zone,
    nomedocumento character varying(200),
    descricao character varying(200),
    nomefisicodocumento character varying(255)
);


--
-- TOC entry 195 (class 1259 OID 34859)
-- Name: documentos_downloads; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE documentos_downloads (
    iddocumento integer NOT NULL,
    idusuario integer NOT NULL,
    dtdownload timestamp without time zone,
    id integer NOT NULL
);


--
-- TOC entry 196 (class 1259 OID 34862)
-- Name: documentos_downloads_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE documentos_downloads_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2159 (class 0 OID 0)
-- Dependencies: 196
-- Name: documentos_downloads_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE documentos_downloads_id_seq OWNED BY documentos_downloads.id;


--
-- TOC entry 197 (class 1259 OID 34864)
-- Name: documentos_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE documentos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2160 (class 0 OID 0)
-- Dependencies: 197
-- Name: documentos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE documentos_id_seq OWNED BY documentos.id;


--
-- TOC entry 178 (class 1259 OID 34709)
-- Name: idoc; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE idoc (
    id integer NOT NULL,
    nome character varying(255),
    idcliente bigint,
    file character varying(255)
);


--
-- TOC entry 179 (class 1259 OID 34715)
-- Name: idoc_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE idoc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2161 (class 0 OID 0)
-- Dependencies: 179
-- Name: idoc_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE idoc_id_seq OWNED BY idoc.id;


--
-- TOC entry 180 (class 1259 OID 34717)
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
-- TOC entry 181 (class 1259 OID 34723)
-- Name: mensagens_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE mensagens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2162 (class 0 OID 0)
-- Dependencies: 181
-- Name: mensagens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE mensagens_id_seq OWNED BY mensagens.id;


--
-- TOC entry 182 (class 1259 OID 34725)
-- Name: migrations; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE migrations (
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


--
-- TOC entry 183 (class 1259 OID 34728)
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
-- TOC entry 184 (class 1259 OID 34731)
-- Name: moeda_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE moeda_id_seq
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2163 (class 0 OID 0)
-- Dependencies: 184
-- Name: moeda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE moeda_id_seq OWNED BY moeda.id;


--
-- TOC entry 185 (class 1259 OID 34733)
-- Name: password_reminders; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE password_reminders (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL
);


--
-- TOC entry 186 (class 1259 OID 34739)
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
-- TOC entry 187 (class 1259 OID 34742)
-- Name: produtos_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE produtos_id_seq
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2164 (class 0 OID 0)
-- Dependencies: 187
-- Name: produtos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE produtos_id_seq OWNED BY produtos.id;


--
-- TOC entry 188 (class 1259 OID 34744)
-- Name: status_chamados; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE status_chamados (
    id integer NOT NULL,
    status_chamado character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


--
-- TOC entry 189 (class 1259 OID 34747)
-- Name: status_chamados_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE status_chamados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2165 (class 0 OID 0)
-- Dependencies: 189
-- Name: status_chamados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE status_chamados_id_seq OWNED BY status_chamados.id;


--
-- TOC entry 190 (class 1259 OID 34749)
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
-- TOC entry 191 (class 1259 OID 34757)
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2166 (class 0 OID 0)
-- Dependencies: 191
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE usuarios_id_seq OWNED BY usuarios.id;


--
-- TOC entry 1951 (class 2604 OID 34759)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY cat_chamados ALTER COLUMN id SET DEFAULT nextval('cat_chamados_id_seq'::regclass);


--
-- TOC entry 1965 (class 2604 OID 34866)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY categorias ALTER COLUMN id SET DEFAULT nextval('categorias_id_seq'::regclass);


--
-- TOC entry 1952 (class 2604 OID 34760)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY chamados ALTER COLUMN id SET DEFAULT nextval('chamados_id_seq'::regclass);


--
-- TOC entry 1954 (class 2604 OID 34761)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY cliente ALTER COLUMN id SET DEFAULT nextval('cliente_id_seq'::regclass);


--
-- TOC entry 1956 (class 2604 OID 34762)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY cliente_pgtos ALTER COLUMN id SET DEFAULT nextval('cliente_pgtos_id_seq'::regclass);


--
-- TOC entry 1966 (class 2604 OID 34868)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY documentos ALTER COLUMN id SET DEFAULT nextval('documentos_id_seq'::regclass);


--
-- TOC entry 1967 (class 2604 OID 34869)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY documentos_downloads ALTER COLUMN id SET DEFAULT nextval('documentos_downloads_id_seq'::regclass);


--
-- TOC entry 1957 (class 2604 OID 34763)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY idoc ALTER COLUMN id SET DEFAULT nextval('idoc_id_seq'::regclass);


--
-- TOC entry 1958 (class 2604 OID 34764)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY mensagens ALTER COLUMN id SET DEFAULT nextval('mensagens_id_seq'::regclass);


--
-- TOC entry 1959 (class 2604 OID 34765)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY moeda ALTER COLUMN id SET DEFAULT nextval('moeda_id_seq'::regclass);


--
-- TOC entry 1960 (class 2604 OID 34766)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY produtos ALTER COLUMN id SET DEFAULT nextval('produtos_id_seq'::regclass);


--
-- TOC entry 1961 (class 2604 OID 34767)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY status_chamados ALTER COLUMN id SET DEFAULT nextval('status_chamados_id_seq'::regclass);


--
-- TOC entry 1963 (class 2604 OID 34768)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY usuarios ALTER COLUMN id SET DEFAULT nextval('usuarios_id_seq'::regclass);


--
-- TOC entry 2119 (class 0 OID 34681)
-- Dependencies: 170
-- Data for Name: cat_chamados; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO cat_chamados (id, cat_chamado, created_at, updated_at) VALUES (1, 'Suporte', '2015-01-23 11:19:11', '2015-01-23 11:19:11');
INSERT INTO cat_chamados (id, cat_chamado, created_at, updated_at) VALUES (2, 'Dúvida', '2015-01-23 11:19:11', '2015-01-23 11:19:11');
INSERT INTO cat_chamados (id, cat_chamado, created_at, updated_at) VALUES (3, 'Solicitação', '2015-01-23 11:19:11', '2015-01-23 11:19:11');


--
-- TOC entry 2167 (class 0 OID 0)
-- Dependencies: 171
-- Name: cat_chamados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('cat_chamados_id_seq', 1, false);


--
-- TOC entry 2141 (class 0 OID 34839)
-- Dependencies: 192
-- Data for Name: categorias; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO categorias (id, id_cliente, nomecategoria) VALUES (1, 1, 'INSS');


--
-- TOC entry 2168 (class 0 OID 0)
-- Dependencies: 193
-- Name: categorias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('categorias_id_seq', 4, true);


--
-- TOC entry 2121 (class 0 OID 34686)
-- Dependencies: 172
-- Data for Name: chamados; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO chamados (id, categoria, titulo, status, mensagem, data, created_at, updated_at, idusuario) VALUES (1, 3, 'ddddddd', 2, 'ddddddddddd', '28/01/2015 16:17:24', '2015-01-28 16:17:24', '2015-01-28 16:50:36', 6);


--
-- TOC entry 2169 (class 0 OID 0)
-- Dependencies: 173
-- Name: chamados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('chamados_id_seq', 1, true);


--
-- TOC entry 2123 (class 0 OID 34694)
-- Dependencies: 174
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO cliente (id, nome, ativo, email, obscontrato) VALUES (1, 'FSI Tecnologia', true, 'contato@fsitecnologia.com.br', 'Atendimento no horário comercial 7:30 h às 17:30 h, fora dele a CONTRATADA acrescerá 25% sobre o valor cobrado por hora presencial ou à distância, 50% aos sábado, bem como 100% aos domingos.');
INSERT INTO cliente (id, nome, ativo, email, obscontrato) VALUES (7, 'Kranunion', true, 'flavia.farias@kranunion.de', '');


--
-- TOC entry 2170 (class 0 OID 0)
-- Dependencies: 175
-- Name: cliente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('cliente_id_seq', 7, true);


--
-- TOC entry 2125 (class 0 OID 34703)
-- Dependencies: 176
-- Data for Name: cliente_pgtos; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO cliente_pgtos (id, valor, idproduto, idcliente, idmoeda, descricao, ispaid, nota, dtpagamento) VALUES (25, 300.00, NULL, 7, 1, 'Atendimento', true, NULL, '2015-01-28 18:00:00');
INSERT INTO cliente_pgtos (id, valor, idproduto, idcliente, idmoeda, descricao, ispaid, nota, dtpagamento) VALUES (26, 111.00, NULL, 1, 1, 'dddd', false, '1_bfd5422fb2a112bdeb6456428188a111.pdf', NULL);


--
-- TOC entry 2171 (class 0 OID 0)
-- Dependencies: 177
-- Name: cliente_pgtos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('cliente_pgtos_id_seq', 26, true);


--
-- TOC entry 2143 (class 0 OID 34853)
-- Dependencies: 194
-- Data for Name: documentos; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2144 (class 0 OID 34859)
-- Dependencies: 195
-- Data for Name: documentos_downloads; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2172 (class 0 OID 0)
-- Dependencies: 196
-- Name: documentos_downloads_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('documentos_downloads_id_seq', 2, true);


--
-- TOC entry 2173 (class 0 OID 0)
-- Dependencies: 197
-- Name: documentos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('documentos_id_seq', 17, true);


--
-- TOC entry 2127 (class 0 OID 34709)
-- Dependencies: 178
-- Data for Name: idoc; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2174 (class 0 OID 0)
-- Dependencies: 179
-- Name: idoc_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('idoc_id_seq', 1, false);


--
-- TOC entry 2129 (class 0 OID 34717)
-- Dependencies: 180
-- Data for Name: mensagens; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO mensagens (id, mensagem, id_chamado, data, created_at, updated_at, idusuario) VALUES (1, 'vvvvvvvvvvvvvvvvv', 1, '28/01/2015 16:21:10', '2015-01-28 16:21:10', '2015-01-28 16:21:10', 6);
INSERT INTO mensagens (id, mensagem, id_chamado, data, created_at, updated_at, idusuario) VALUES (2, 'Sra Flavia,

Estamos providenciando a analise e retornamos o mais breve possivel.', 1, '28/01/2015 16:50:36', '2015-01-28 16:50:36', '2015-01-28 16:50:36', 2);


--
-- TOC entry 2175 (class 0 OID 0)
-- Dependencies: 181
-- Name: mensagens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('mensagens_id_seq', 2, true);


--
-- TOC entry 2131 (class 0 OID 34725)
-- Dependencies: 182
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO migrations (migration, batch) VALUES ('2014_12_30_184246_criar_usuario', 1);
INSERT INTO migrations (migration, batch) VALUES ('2014_12_30_184338_create_password_reminders_table', 1);


--
-- TOC entry 2132 (class 0 OID 34728)
-- Dependencies: 183
-- Data for Name: moeda; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO moeda (id, nome, simbolo, codigo, sigla) VALUES (1, NULL, 'R$', NULL, 'BRL');
INSERT INTO moeda (id, nome, simbolo, codigo, sigla) VALUES (2, NULL, '$', NULL, 'USD');


--
-- TOC entry 2176 (class 0 OID 0)
-- Dependencies: 184
-- Name: moeda_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('moeda_id_seq', 2, true);


--
-- TOC entry 2134 (class 0 OID 34733)
-- Dependencies: 185
-- Data for Name: password_reminders; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2135 (class 0 OID 34739)
-- Dependencies: 186
-- Data for Name: produtos; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 2177 (class 0 OID 0)
-- Dependencies: 187
-- Name: produtos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('produtos_id_seq', 2, true);


--
-- TOC entry 2137 (class 0 OID 34744)
-- Dependencies: 188
-- Data for Name: status_chamados; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO status_chamados (id, status_chamado, created_at, updated_at) VALUES (1, 'Aberto', '2015-01-23 11:19:11', '2015-01-23 11:19:11');
INSERT INTO status_chamados (id, status_chamado, created_at, updated_at) VALUES (2, 'Em Andamento', '2015-01-23 11:19:11', '2015-01-23 11:19:11');
INSERT INTO status_chamados (id, status_chamado, created_at, updated_at) VALUES (3, 'Fechado', '2015-01-23 11:19:11', '2015-01-23 11:19:11');


--
-- TOC entry 2178 (class 0 OID 0)
-- Dependencies: 189
-- Name: status_chamados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('status_chamados_id_seq', 1, false);


--
-- TOC entry 2139 (class 0 OID 34749)
-- Dependencies: 190
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO usuarios (id, email, senha, nome, tipo, remember_token, created_at, updated_at, idcliente, isdelete, lang) VALUES (1, 'cliente@cliente.com.br', '$2y$10$AthyydEb/ar2cnkppjQ8t..yBaZL/yhQfwJrH0qKEo0zDV4IpC2/6', 'Cliente', 'cliente', NULL, '2015-01-23 15:47:46', '2015-01-23 15:47:46', 1, false, NULL);
INSERT INTO usuarios (id, email, senha, nome, tipo, remember_token, created_at, updated_at, idcliente, isdelete, lang) VALUES (2, 'admin@edigital.com.br', '$2y$10$uK9dUoKcELBRQRbGkWYv5ucmbuDL.XfG43fvBfA6DJXbnmAi9/1a2', 'Administrador', 'admin', 'VMbjBbvY9hvlxJXjNBddAWsuqCQw4rn78MSGrzY65YxiMv5dQjlCetX7EQpw', '2015-01-23 15:47:46', '2015-01-29 17:29:52', NULL, false, NULL);
INSERT INTO usuarios (id, email, senha, nome, tipo, remember_token, created_at, updated_at, idcliente, isdelete, lang) VALUES (6, 'flavia.farias@kranunion.de', '$2y$10$NHmsV6BSdoPdd9yD.Da0..IMHQ5O1e7TeJf.jaxAJh7zAnA7IP/aW', 'Flavia Farias', 'cliente', 'e9LZWoqbdvBTjl4DY0HEQwytnLdotzXx7oeKCvtW7tmyuPUVzJqRxT0LEmtD', '2015-01-28 16:12:26', '2015-01-28 18:24:46', 7, false, NULL);


--
-- TOC entry 2179 (class 0 OID 0)
-- Dependencies: 191
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('usuarios_id_seq', 6, true);


--
-- TOC entry 1969 (class 2606 OID 34770)
-- Name: cat_chamados_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cat_chamados
    ADD CONSTRAINT cat_chamados_pkey PRIMARY KEY (id);


--
-- TOC entry 1993 (class 2606 OID 34871)
-- Name: categorias_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (id);


--
-- TOC entry 1971 (class 2606 OID 34772)
-- Name: chamados_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY chamados
    ADD CONSTRAINT chamados_pkey PRIMARY KEY (id);


--
-- TOC entry 1975 (class 2606 OID 34774)
-- Name: cliente_pgtos_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cliente_pgtos
    ADD CONSTRAINT cliente_pgtos_pkey PRIMARY KEY (id);


--
-- TOC entry 1973 (class 2606 OID 34776)
-- Name: cliente_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (id);


--
-- TOC entry 1997 (class 2606 OID 34873)
-- Name: documentos_downloads_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY documentos_downloads
    ADD CONSTRAINT documentos_downloads_pkey PRIMARY KEY (id);


--
-- TOC entry 1995 (class 2606 OID 34875)
-- Name: documentos_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT documentos_pkey PRIMARY KEY (id);


--
-- TOC entry 1977 (class 2606 OID 34778)
-- Name: idoc_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY idoc
    ADD CONSTRAINT idoc_pkey PRIMARY KEY (id);


--
-- TOC entry 1979 (class 2606 OID 34780)
-- Name: mensagens_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mensagens
    ADD CONSTRAINT mensagens_pkey PRIMARY KEY (id);


--
-- TOC entry 1981 (class 2606 OID 34782)
-- Name: moeda_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY moeda
    ADD CONSTRAINT moeda_pkey PRIMARY KEY (id);


--
-- TOC entry 1985 (class 2606 OID 34784)
-- Name: produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY produtos
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (id);


--
-- TOC entry 1987 (class 2606 OID 34786)
-- Name: status_chamado_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY status_chamados
    ADD CONSTRAINT status_chamado_pkey PRIMARY KEY (id);


--
-- TOC entry 1989 (class 2606 OID 34788)
-- Name: usuarios_email_unique; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_email_unique UNIQUE (email);


--
-- TOC entry 1991 (class 2606 OID 34790)
-- Name: usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- TOC entry 1982 (class 1259 OID 34791)
-- Name: password_reminders_email_index; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX password_reminders_email_index ON password_reminders USING btree (email);


--
-- TOC entry 1983 (class 1259 OID 34792)
-- Name: password_reminders_token_index; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX password_reminders_token_index ON password_reminders USING btree (token);


--
-- TOC entry 2007 (class 2606 OID 34896)
-- Name: categorias_id_cliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY categorias
    ADD CONSTRAINT categorias_id_cliente_fkey FOREIGN KEY (id_cliente) REFERENCES cliente(id);


--
-- TOC entry 1998 (class 2606 OID 34793)
-- Name: chamados_idusuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY chamados
    ADD CONSTRAINT chamados_idusuario_fkey FOREIGN KEY (idusuario) REFERENCES usuarios(id);


--
-- TOC entry 1999 (class 2606 OID 34798)
-- Name: cliente_pgtos_idcliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cliente_pgtos
    ADD CONSTRAINT cliente_pgtos_idcliente_fkey FOREIGN KEY (idcliente) REFERENCES cliente(id);


--
-- TOC entry 2000 (class 2606 OID 34803)
-- Name: cliente_pgtos_idmoeda_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cliente_pgtos
    ADD CONSTRAINT cliente_pgtos_idmoeda_fkey FOREIGN KEY (idmoeda) REFERENCES moeda(id);


--
-- TOC entry 2001 (class 2606 OID 34808)
-- Name: cliente_pgtos_idproduto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cliente_pgtos
    ADD CONSTRAINT cliente_pgtos_idproduto_fkey FOREIGN KEY (idproduto) REFERENCES produtos(id);


--
-- TOC entry 2010 (class 2606 OID 34876)
-- Name: documentos_downloads_iddocumento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY documentos_downloads
    ADD CONSTRAINT documentos_downloads_iddocumento_fkey FOREIGN KEY (iddocumento) REFERENCES documentos(id);


--
-- TOC entry 2011 (class 2606 OID 34881)
-- Name: documentos_downloads_idusuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY documentos_downloads
    ADD CONSTRAINT documentos_downloads_idusuario_fkey FOREIGN KEY (idusuario) REFERENCES usuarios(id);


--
-- TOC entry 2008 (class 2606 OID 34886)
-- Name: documentos_idcategoria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT documentos_idcategoria_fkey FOREIGN KEY (idcategoria) REFERENCES categorias(id);


--
-- TOC entry 2009 (class 2606 OID 34901)
-- Name: documentos_idcliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT documentos_idcliente_fkey FOREIGN KEY (idcliente) REFERENCES documentos(id);


--
-- TOC entry 2002 (class 2606 OID 34813)
-- Name: idoc_idcliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY idoc
    ADD CONSTRAINT idoc_idcliente_fkey FOREIGN KEY (idcliente) REFERENCES cliente(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2003 (class 2606 OID 34818)
-- Name: mensagens_idusuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY mensagens
    ADD CONSTRAINT mensagens_idusuario_fkey FOREIGN KEY (idusuario) REFERENCES usuarios(id);


--
-- TOC entry 2004 (class 2606 OID 34823)
-- Name: produtos_idcliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY produtos
    ADD CONSTRAINT produtos_idcliente_fkey FOREIGN KEY (idcliente) REFERENCES cliente(id);


--
-- TOC entry 2005 (class 2606 OID 34828)
-- Name: produtos_idmoeda_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY produtos
    ADD CONSTRAINT produtos_idmoeda_fkey FOREIGN KEY (idmoeda) REFERENCES moeda(id);


--
-- TOC entry 2006 (class 2606 OID 34833)
-- Name: usuarios_idcliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_idcliente_fkey FOREIGN KEY (idcliente) REFERENCES cliente(id);


-- Completed on 2015-01-29 18:14:31 BRST

--
-- PostgreSQL database dump complete
--

