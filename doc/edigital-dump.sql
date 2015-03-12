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
-- Name: categorias; Type: TABLE; Schema: public; Owner: edigital; Tablespace: 
--

CREATE TABLE categorias (
    id integer NOT NULL,
    id_cliente integer NOT NULL,
    nomecategoria character varying NOT NULL
);


ALTER TABLE public.categorias OWNER TO edigital;

--
-- Name: categorias_id_seq; Type: SEQUENCE; Schema: public; Owner: edigital
--

CREATE SEQUENCE categorias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    MINVALUE 0
    CACHE 1;


ALTER TABLE public.categorias_id_seq OWNER TO edigital;

--
-- Name: categorias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE categorias_id_seq OWNED BY categorias.id;


--
-- Name: categorias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('categorias_id_seq', 20, true);


--
-- Name: chamados; Type: TABLE; Schema: public; Owner: edigital; Tablespace: 
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

SELECT pg_catalog.setval('chamados_id_seq', 12, true);


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
    NO MAXVALUE
    MINVALUE 0
    CACHE 1;


ALTER TABLE public.cliente_id_seq OWNER TO edigital;

--
-- Name: cliente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE cliente_id_seq OWNED BY cliente.id;


--
-- Name: cliente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('cliente_id_seq', 4, true);


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
    nota character varying(200),
    dtpagamento timestamp without time zone
);


ALTER TABLE public.cliente_pgtos OWNER TO edigital;

--
-- Name: cliente_pgtos_id_seq; Type: SEQUENCE; Schema: public; Owner: edigital
--

CREATE SEQUENCE cliente_pgtos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.cliente_pgtos_id_seq OWNER TO edigital;

--
-- Name: cliente_pgtos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE cliente_pgtos_id_seq OWNED BY cliente_pgtos.id;


--
-- Name: cliente_pgtos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('cliente_pgtos_id_seq', 27, true);


--
-- Name: documentos; Type: TABLE; Schema: public; Owner: edigital; Tablespace: 
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


ALTER TABLE public.documentos OWNER TO edigital;

--
-- Name: documentos_downloads; Type: TABLE; Schema: public; Owner: edigital; Tablespace: 
--

CREATE TABLE documentos_downloads (
    iddocumento integer NOT NULL,
    idusuario integer NOT NULL,
    dtdownload timestamp without time zone,
    id integer NOT NULL
);


ALTER TABLE public.documentos_downloads OWNER TO edigital;

--
-- Name: documentos_downloads_id_seq; Type: SEQUENCE; Schema: public; Owner: edigital
--

CREATE SEQUENCE documentos_downloads_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.documentos_downloads_id_seq OWNER TO edigital;

--
-- Name: documentos_downloads_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE documentos_downloads_id_seq OWNED BY documentos_downloads.id;


--
-- Name: documentos_downloads_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('documentos_downloads_id_seq', 3, true);


--
-- Name: documentos_id_seq; Type: SEQUENCE; Schema: public; Owner: edigital
--

CREATE SEQUENCE documentos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.documentos_id_seq OWNER TO edigital;

--
-- Name: documentos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE documentos_id_seq OWNED BY documentos.id;


--
-- Name: documentos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('documentos_id_seq', 18, true);


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
    data character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    idusuario integer
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

SELECT pg_catalog.setval('mensagens_id_seq', 10, true);


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
    NO MAXVALUE
    MINVALUE 0
    CACHE 1;


ALTER TABLE public.moeda_id_seq OWNER TO edigital;

--
-- Name: moeda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE moeda_id_seq OWNED BY moeda.id;


--
-- Name: moeda_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('moeda_id_seq', 2, true);


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
    idcliente integer,
    tipo character(1)
);


ALTER TABLE public.produtos OWNER TO edigital;

--
-- Name: produtos_id_seq; Type: SEQUENCE; Schema: public; Owner: edigital
--

CREATE SEQUENCE produtos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    MINVALUE 0
    CACHE 1;


ALTER TABLE public.produtos_id_seq OWNER TO edigital;

--
-- Name: produtos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE produtos_id_seq OWNED BY produtos.id;


--
-- Name: produtos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('produtos_id_seq', 1, true);


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
    isdelete boolean DEFAULT false,
    lang character(2),
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
    MINVALUE 0
    CACHE 1;


ALTER TABLE public.usuarios_id_seq OWNER TO edigital;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: edigital
--

ALTER SEQUENCE usuarios_id_seq OWNED BY usuarios.id;


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: edigital
--

SELECT pg_catalog.setval('usuarios_id_seq', 3, true);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY cat_chamados ALTER COLUMN id SET DEFAULT nextval('cat_chamados_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY categorias ALTER COLUMN id SET DEFAULT nextval('categorias_id_seq'::regclass);


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

ALTER TABLE ONLY documentos ALTER COLUMN id SET DEFAULT nextval('documentos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY documentos_downloads ALTER COLUMN id SET DEFAULT nextval('documentos_downloads_id_seq'::regclass);


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
-- Data for Name: categorias; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY categorias (id, id_cliente, nomecategoria) FROM stdin;
1	1	Suporte
2	1	Boleto
3	1	INSS
4	1	IRPF
5	1	Tabelas
6	2	Suporte
7	2	Boleto
8	2	INSS
9	2	IRPF
10	2	Tabelas
11	3	Suporte
12	3	Boleto
13	3	INSS
14	3	IRPF
15	3	Tabelas
16	4	Suporte
17	4	Boleto
18	4	INSS
19	4	IRPF
20	4	Tabelas
\.


--
-- Data for Name: chamados; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY chamados (id, categoria, titulo, status, mensagem, data, created_at, updated_at, idusuario) FROM stdin;
2	1	 currículo dela não aparece site	3	Bom dia, Fábio, Mariana quer saber porque o currículo dela não aparece no site. Eu vi que ela preencheu em configurações.\r\nE quando podemos marcar nossa reunião? Quinta?\r\nAbraços	11/02/2015 16:31:46	2015-02-11 16:31:46	2015-02-11 16:33:33	3
3	1	Erro ao salvar convênio. Avise ao suporte.	1	Erro ao salvar convênio. Avise ao suporte.\r\n\r\nhttp://agenda.interna.nutrate.com.br/profissional/adicionar/co_profissional/21	24/02/2015 16:24:05	2015-02-24 16:24:05	2015-02-24 16:24:05	3
5	1	Atualizar Procedimento Fevereiro	3	vc pode por favor atualizar os lotes da Amil de Fevereiro com o valor de 39,64?14:54\r\nobrigada14:54\r\nme dê o ok14:54\r\nporque eles já colocaram esse valor para as guias de Fevereiro14:54\r\ne nossos lotes saíram com valor antigo	09/03/2015 23:41:44	2015-03-09 23:41:44	2015-03-09 23:42:25	3
4	1	alterar status	3	Fábio vc pode fazer o favor de marcar o status  de atendido no paciente  da Cintia Camila Carneiro da Silva Fiore do dia 03/3 que ela esqueceu	09/03/2015 09:38:05	2015-03-09 09:38:05	2015-03-09 23:42:43	3
6	3	Implementação Lote separado Psicologia	1	O lote da psicologia deverá ser separado.	10/03/2015 01:20:04	2015-03-10 01:20:04	2015-03-10 01:20:04	3
7	3	Implementação Lote separado Psicologia	1	Implementação Lote separado Psicologia	10/03/2015 01:31:04	2015-03-10 01:31:04	2015-03-10 01:31:04	3
8	1	Permissão de Acesso	3	Fábio, entra por favor no login da Daianne e veja que em lotes ainda está aparecendo o valor.\r\nTira por favor e me avise, abraços.	10/03/2015 11:18:05	2015-03-10 11:18:05	2015-03-10 11:19:09	3
12	1	Desmarcar Paciente	3	Rosangela Amaro 12/02	11/03/2015 22:37:22	2015-03-11 22:37:22	2015-03-11 22:38:41	3
11	1	Marcar Paciente	3	Marcar Alexandre Ferreira Moura 12/02	11/03/2015 22:36:54	2015-03-11 22:36:54	2015-03-11 22:38:59	3
10	1	Internet Caindo e Central Fora	3	Internet fora do ar e central telefonica fora ja foi reiniciada e teve pico de luz.\r\n\r\nNobreak não esta funcionando	11/03/2015 22:33:08	2015-03-11 22:33:08	2015-03-11 22:40:47	3
9	1	Impressora não imprime	3	Impressora da daiane não imprime	11/03/2015 22:32:17	2015-03-11 22:32:17	2015-03-11 22:41:11	3
\.


--
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY cliente (id, nome, ativo, email, obscontrato) FROM stdin;
1	FSI Tecnologia	t	contato@fsitecnologia.com.br	\N
2	Nutrate Nutrição e Clínica Médica	t	contato@nutrate.com.br	
3	Thayane Rocha	t	thayane@thayanerocha.adv.br	
4	Kranunion	t	flavia.farias@kranunion.de	
\.


--
-- Data for Name: cliente_pgtos; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY cliente_pgtos (id, valor, idproduto, idcliente, idmoeda, descricao, ispaid, nota, dtpagamento) FROM stdin;
27	180.00	1	1	1		t	\N	2015-03-12 11:10:30
\.


--
-- Data for Name: documentos; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY documentos (id, idcategoria, idcliente, caminhodoc, datainclusao, nomedocumento, descricao, nomefisicodocumento) FROM stdin;
\.


--
-- Data for Name: documentos_downloads; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY documentos_downloads (iddocumento, idusuario, dtdownload, id) FROM stdin;
\.


--
-- Data for Name: idoc; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY idoc (id, nome, idcliente, file) FROM stdin;
\.


--
-- Data for Name: mensagens; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY mensagens (id, mensagem, id_chamado, data, created_at, updated_at, idusuario) FROM stdin;
3	Reslvido usuário ativado no site.	2	11/02/2015 16:33:33	2015-02-11 16:33:33	2015-02-11 16:33:33	2
4	Atualizado com sucesso!	5	09/03/2015 23:42:25	2015-03-09 23:42:25	2015-03-09 23:42:25	2
5	Alterado com sucesso!	4	09/03/2015 23:42:43	2015-03-09 23:42:43	2015-03-09 23:42:43	2
6	Concluido feita alteração no totalizado para dar permissão somente a administradores.	8	10/03/2015 11:19:09	2015-03-10 11:19:09	2015-03-10 11:19:09	2
7	Realizado com sucesso!	12	11/03/2015 22:38:41	2015-03-11 22:38:41	2015-03-11 22:38:41	2
8	Realizado com sucesso	11	11/03/2015 22:38:59	2015-03-11 22:38:59	2015-03-11 22:38:59	2
9	Será necessário comprar um novo nobreak.\r\n\r\nO problema esta na GVT tem que abrir um chamado e agendar atendimento em conjunto.	10	11/03/2015 22:40:47	2015-03-11 22:40:47	2015-03-11 22:40:47	2
10	Problema de configuração, após reconfigurar funcionou.	9	11/03/2015 22:41:11	2015-03-11 22:41:11	2015-03-11 22:41:11	2
\.


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
-- Data for Name: password_reminders; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY password_reminders (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: produtos; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY produtos (id, nome, valor, idmoeda, idcliente, tipo) FROM stdin;
1	Visita técnica sem contrato	180.00	1	1	\N
\.


--
-- Data for Name: status_chamados; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY status_chamados (id, status_chamado, created_at, updated_at) FROM stdin;
1	Aberto	2015-01-23 11:19:11	2015-01-23 11:19:11
2	Em Andamento	2015-01-23 11:19:11	2015-01-23 11:19:11
3	Fechado	2015-01-23 11:19:11	2015-01-23 11:19:11
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: edigital
--

COPY usuarios (id, email, senha, nome, tipo, remember_token, created_at, updated_at, idcliente, isdelete, lang) FROM stdin;
1	cliente@cliente.com.br	$2y$10$DGQlegAjL22WJhFty8yKyugq8knf1aYs8ACzXjBcR6HlSoFHCgjYe	Nome do Cliente	cliente	\N	2015-02-11 12:24:30	2015-02-11 12:24:30	1	f	\N
3	contato@nutrate.com.br	$2y$10$6hXNb913fzqC/9Cndkm.8.9XE12VBpFKwgUbfUeICRxYwLxKGlZCW	Nutrate	cliente	gUiEuZC0YQFaDeDRjnjK5yBaiFKBkU1S6ZmvfjvzmQsCu7CvqmyNDv09VkKv	2015-02-11 16:30:33	2015-03-10 11:18:34	2	f	pt
2	admin@edigital.com.br	$2y$10$yLkJ3JZ0.pqIjh1ac2qSe.rxUykALsJ0pVBEpoaA./fG53T5xWBPu	Administrador	admin	i0jXJMoP41HiXplzpaa9aNm2gVgMYxiHk0S1bd8DgkGoomfrV8MRieKlWoD1	2015-02-11 12:24:30	2015-03-10 11:19:25	\N	f	\N
\.


--
-- Name: cat_chamados_pkey; Type: CONSTRAINT; Schema: public; Owner: edigital; Tablespace: 
--

ALTER TABLE ONLY cat_chamados
    ADD CONSTRAINT cat_chamados_pkey PRIMARY KEY (id);


--
-- Name: categorias_pkey; Type: CONSTRAINT; Schema: public; Owner: edigital; Tablespace: 
--

ALTER TABLE ONLY categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (id);


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
-- Name: documentos_downloads_pkey; Type: CONSTRAINT; Schema: public; Owner: edigital; Tablespace: 
--

ALTER TABLE ONLY documentos_downloads
    ADD CONSTRAINT documentos_downloads_pkey PRIMARY KEY (id);


--
-- Name: documentos_pkey; Type: CONSTRAINT; Schema: public; Owner: edigital; Tablespace: 
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT documentos_pkey PRIMARY KEY (id);


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
-- Name: categorias_id_cliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY categorias
    ADD CONSTRAINT categorias_id_cliente_fkey FOREIGN KEY (id_cliente) REFERENCES cliente(id);


--
-- Name: chamados_idusuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY chamados
    ADD CONSTRAINT chamados_idusuario_fkey FOREIGN KEY (idusuario) REFERENCES usuarios(id);


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
-- Name: documentos_downloads_iddocumento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY documentos_downloads
    ADD CONSTRAINT documentos_downloads_iddocumento_fkey FOREIGN KEY (iddocumento) REFERENCES documentos(id);


--
-- Name: documentos_downloads_idusuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY documentos_downloads
    ADD CONSTRAINT documentos_downloads_idusuario_fkey FOREIGN KEY (idusuario) REFERENCES usuarios(id);


--
-- Name: documentos_idcategoria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT documentos_idcategoria_fkey FOREIGN KEY (idcategoria) REFERENCES categorias(id);


--
-- Name: documentos_idcliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT documentos_idcliente_fkey FOREIGN KEY (idcliente) REFERENCES cliente(id);


--
-- Name: idoc_idcliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY idoc
    ADD CONSTRAINT idoc_idcliente_fkey FOREIGN KEY (idcliente) REFERENCES cliente(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: mensagens_idusuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: edigital
--

ALTER TABLE ONLY mensagens
    ADD CONSTRAINT mensagens_idusuario_fkey FOREIGN KEY (idusuario) REFERENCES usuarios(id);


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

