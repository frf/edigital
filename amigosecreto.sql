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
-- Name: amigo; Type: TABLE; Schema: public; Owner: amigosecreto; Tablespace: 
--

CREATE TABLE amigo (
    id integer NOT NULL,
    nome character varying(200),
    id_sorteado integer,
    dt_sorteio timestamp without time zone,
    foto character varying(200),
    mensagem text
);


ALTER TABLE public.amigo OWNER TO amigosecreto;

--
-- Name: amigo_id_seq; Type: SEQUENCE; Schema: public; Owner: amigosecreto
--

CREATE SEQUENCE amigo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.amigo_id_seq OWNER TO amigosecreto;

--
-- Name: amigo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: amigosecreto
--

ALTER SEQUENCE amigo_id_seq OWNED BY amigo.id;


--
-- Name: presente; Type: TABLE; Schema: public; Owner: amigosecreto; Tablespace: 
--

CREATE TABLE presente (
    id integer NOT NULL,
    produto character varying(250),
    idamigo integer
);


ALTER TABLE public.presente OWNER TO amigosecreto;

--
-- Name: presente_id_seq; Type: SEQUENCE; Schema: public; Owner: amigosecreto
--

CREATE SEQUENCE presente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.presente_id_seq OWNER TO amigosecreto;

--
-- Name: presente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: amigosecreto
--

ALTER SEQUENCE presente_id_seq OWNED BY presente.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: amigosecreto
--

ALTER TABLE ONLY amigo ALTER COLUMN id SET DEFAULT nextval('amigo_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: amigosecreto
--

ALTER TABLE ONLY presente ALTER COLUMN id SET DEFAULT nextval('presente_id_seq'::regclass);


--
-- Data for Name: amigo; Type: TABLE DATA; Schema: public; Owner: amigosecreto
--

COPY amigo (id, nome, id_sorteado, dt_sorteio, foto, mensagem) FROM stdin;
6	Helena	\N	\N	helena	Feliz Natal e um Próspero Ano Novo!
2	Jorgiane	\N	\N	jo	Feliz Natal e um Próspero Ano Novo!
3	Flavia	\N	\N	flavia	Feliz Natal e um Próspero Ano Novo!
4	Hart	\N	\N	hart	Feliz Natal e um Próspero Ano Novo!
11	Lethícia	\N	\N	lele	Feliz Natal e um Próspero Ano Novo!
12	Victória	\N	\N	vivi	Feliz Natal e um Próspero Ano Novo!
13	Selma	\N	\N	selma	Feliz Natal e um Próspero Ano Novo!
14	Carol	\N	\N	carol	Feliz Natal e um Próspero Ano Novo!
15	Rocha	\N	\N	rocha	Feliz Natal e um Próspero Ano Novo!
16	Sabrina	\N	\N	sabrina	Feliz Natal e um Próspero Ano Novo!
1	Fabio	\N	\N	fabio	Feliz Natal e um Próspero Ano Novo!
17	Thayane	\N	\N	thay	Feliz Natal e um Próspero Ano Novo!
18	Douglas	\N	\N	douglas	Feliz Natal e um Próspero Ano Novo!
19	Fernanda	\N	\N	fernanda	Feliz Natal e um Próspero Ano Novo!
20	Alexandre	\N	\N	alexandre	Feliz Natal e um Próspero Ano Novo!
21	Eliana	\N	\N	eliana	Feliz Natal e um Próspero Ano Novo!
\.


--
-- Name: amigo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: amigosecreto
--

SELECT pg_catalog.setval('amigo_id_seq', 16, true);


--
-- Data for Name: presente; Type: TABLE DATA; Schema: public; Owner: amigosecreto
--

COPY presente (id, produto, idamigo) FROM stdin;
2	Havaiana 41-42	1
3	Maquiagem	1
4	Sorvete	1
5	Camisa polo GG preta sem frescura	1
\.


--
-- Name: presente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: amigosecreto
--

SELECT pg_catalog.setval('presente_id_seq', 5, true);


--
-- Name: amigo_pkey; Type: CONSTRAINT; Schema: public; Owner: amigosecreto; Tablespace: 
--

ALTER TABLE ONLY amigo
    ADD CONSTRAINT amigo_pkey PRIMARY KEY (id);


--
-- Name: presente_pkey; Type: CONSTRAINT; Schema: public; Owner: amigosecreto; Tablespace: 
--

ALTER TABLE ONLY presente
    ADD CONSTRAINT presente_pkey PRIMARY KEY (id);


--
-- Name: fki_pk_amigo_presente; Type: INDEX; Schema: public; Owner: amigosecreto; Tablespace: 
--

CREATE INDEX fki_pk_amigo_presente ON presente USING btree (idamigo);


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

