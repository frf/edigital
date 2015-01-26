PGDMP         0    	             s           edigital    9.1.13    9.1.13 A    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            �           1262    32920    edigital    DATABASE     z   CREATE DATABASE edigital WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'pt_BR.UTF-8' LC_CTYPE = 'pt_BR.UTF-8';
    DROP DATABASE edigital;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            �           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    6            �           0    0    public    ACL     �   REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;
                  postgres    false    6            �            3079    11681    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            �           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    177            �            1259    32998    cat_chamados    TABLE     �   CREATE TABLE cat_chamados (
    id integer NOT NULL,
    cat_chamado character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);
     DROP TABLE public.cat_chamados;
       public         postgres    false    6            �            1259    32996    cat_chamados_id_seq    SEQUENCE     u   CREATE SEQUENCE cat_chamados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.cat_chamados_id_seq;
       public       postgres    false    171    6            �           0    0    cat_chamados_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE cat_chamados_id_seq OWNED BY cat_chamados.id;
            public       postgres    false    170            �            1259    32987    chamados    TABLE     ^  CREATE TABLE chamados (
    id integer NOT NULL,
    categoria integer NOT NULL,
    titulo character varying(255) NOT NULL,
    status integer NOT NULL,
    mensagem character varying(255) NOT NULL,
    data character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);
    DROP TABLE public.chamados;
       public         postgres    false    6            �            1259    32985    chamados_id_seq    SEQUENCE     q   CREATE SEQUENCE chamados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.chamados_id_seq;
       public       postgres    false    169    6            �           0    0    chamados_id_seq    SEQUENCE OWNED BY     5   ALTER SEQUENCE chamados_id_seq OWNED BY chamados.id;
            public       postgres    false    168            �            1259    32938    cliente    TABLE     �   CREATE TABLE cliente (
    id integer NOT NULL,
    nome character varying(255),
    login character varying(150),
    senha character varying(25),
    ativo boolean DEFAULT false
);
    DROP TABLE public.cliente;
       public         robson    false    1836    6            �            1259    32942    cliente_id_seq    SEQUENCE     p   CREATE SEQUENCE cliente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.cliente_id_seq;
       public       robson    false    161    6            �           0    0    cliente_id_seq    SEQUENCE OWNED BY     3   ALTER SEQUENCE cliente_id_seq OWNED BY cliente.id;
            public       robson    false    162            �            1259    32944    idoc    TABLE     �   CREATE TABLE idoc (
    id integer NOT NULL,
    nome character varying(255),
    idcliente bigint,
    file character varying(255)
);
    DROP TABLE public.idoc;
       public         robson    false    6            �            1259    32950    idoc_id_seq    SEQUENCE     m   CREATE SEQUENCE idoc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.idoc_id_seq;
       public       robson    false    6    163            �           0    0    idoc_id_seq    SEQUENCE OWNED BY     -   ALTER SEQUENCE idoc_id_seq OWNED BY idoc.id;
            public       robson    false    164            �            1259    33014 	   mensagens    TABLE     "  CREATE TABLE mensagens (
    id integer NOT NULL,
    mensagem text NOT NULL,
    id_chamado integer NOT NULL,
    status integer NOT NULL,
    data character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);
    DROP TABLE public.mensagens;
       public         postgres    false    6            �            1259    33012    mensagens_id_seq    SEQUENCE     r   CREATE SEQUENCE mensagens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.mensagens_id_seq;
       public       postgres    false    6    175            �           0    0    mensagens_id_seq    SEQUENCE OWNED BY     7   ALTER SEQUENCE mensagens_id_seq OWNED BY mensagens.id;
            public       postgres    false    174            �            1259    33024 
   migrations    TABLE     g   CREATE TABLE migrations (
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         postgres    false    6            �            1259    32952    password_reminders    TABLE     �   CREATE TABLE password_reminders (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL
);
 &   DROP TABLE public.password_reminders;
       public         robson    false    6            �            1259    33006    status_chamados    TABLE     �   CREATE TABLE status_chamados (
    id integer NOT NULL,
    status_chamado character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);
 #   DROP TABLE public.status_chamados;
       public         postgres    false    6            �            1259    33004    status_chamado_id_seq    SEQUENCE     w   CREATE SEQUENCE status_chamado_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.status_chamado_id_seq;
       public       postgres    false    173    6            �           0    0    status_chamado_id_seq    SEQUENCE OWNED BY     B   ALTER SEQUENCE status_chamado_id_seq OWNED BY status_chamados.id;
            public       postgres    false    172            �            1259    32958    usuarios    TABLE       CREATE TABLE usuarios (
    id integer NOT NULL,
    email character varying(255) NOT NULL,
    senha character varying(60) NOT NULL,
    nome character varying(255) NOT NULL,
    tipo character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    CONSTRAINT usuarios_tipo_check CHECK (((tipo)::text = ANY (ARRAY[('admin'::character varying)::text, ('autor'::character varying)::text])))
);
    DROP TABLE public.usuarios;
       public         robson    false    1840    6            �            1259    32965    usuarios_id_seq    SEQUENCE     q   CREATE SEQUENCE usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.usuarios_id_seq;
       public       robson    false    166    6            �           0    0    usuarios_id_seq    SEQUENCE OWNED BY     5   ALTER SEQUENCE usuarios_id_seq OWNED BY usuarios.id;
            public       robson    false    167            2           2604    33001    id    DEFAULT     d   ALTER TABLE ONLY cat_chamados ALTER COLUMN id SET DEFAULT nextval('cat_chamados_id_seq'::regclass);
 >   ALTER TABLE public.cat_chamados ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    171    170    171            1           2604    32990    id    DEFAULT     \   ALTER TABLE ONLY chamados ALTER COLUMN id SET DEFAULT nextval('chamados_id_seq'::regclass);
 :   ALTER TABLE public.chamados ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    168    169    169            -           2604    32967    id    DEFAULT     Z   ALTER TABLE ONLY cliente ALTER COLUMN id SET DEFAULT nextval('cliente_id_seq'::regclass);
 9   ALTER TABLE public.cliente ALTER COLUMN id DROP DEFAULT;
       public       robson    false    162    161            .           2604    32968    id    DEFAULT     T   ALTER TABLE ONLY idoc ALTER COLUMN id SET DEFAULT nextval('idoc_id_seq'::regclass);
 6   ALTER TABLE public.idoc ALTER COLUMN id DROP DEFAULT;
       public       robson    false    164    163            4           2604    33017    id    DEFAULT     ^   ALTER TABLE ONLY mensagens ALTER COLUMN id SET DEFAULT nextval('mensagens_id_seq'::regclass);
 ;   ALTER TABLE public.mensagens ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    174    175    175            3           2604    33009    id    DEFAULT     i   ALTER TABLE ONLY status_chamados ALTER COLUMN id SET DEFAULT nextval('status_chamado_id_seq'::regclass);
 A   ALTER TABLE public.status_chamados ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    173    172    173            /           2604    32969    id    DEFAULT     \   ALTER TABLE ONLY usuarios ALTER COLUMN id SET DEFAULT nextval('usuarios_id_seq'::regclass);
 :   ALTER TABLE public.usuarios ALTER COLUMN id DROP DEFAULT;
       public       robson    false    167    166            �          0    32998    cat_chamados 
   TABLE DATA               H   COPY cat_chamados (id, cat_chamado, created_at, updated_at) FROM stdin;
    public       postgres    false    171    1981   �D       �           0    0    cat_chamados_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('cat_chamados_id_seq', 7, true);
            public       postgres    false    170            �          0    32987    chamados 
   TABLE DATA               b   COPY chamados (id, categoria, titulo, status, mensagem, data, created_at, updated_at) FROM stdin;
    public       postgres    false    169    1981   @E       �           0    0    chamados_id_seq    SEQUENCE SET     6   SELECT pg_catalog.setval('chamados_id_seq', 4, true);
            public       postgres    false    168            �          0    32938    cliente 
   TABLE DATA               9   COPY cliente (id, nome, login, senha, ativo) FROM stdin;
    public       robson    false    161    1981   F       �           0    0    cliente_id_seq    SEQUENCE SET     5   SELECT pg_catalog.setval('cliente_id_seq', 3, true);
            public       robson    false    162            �          0    32944    idoc 
   TABLE DATA               2   COPY idoc (id, nome, idcliente, file) FROM stdin;
    public       robson    false    163    1981   `F       �           0    0    idoc_id_seq    SEQUENCE SET     3   SELECT pg_catalog.setval('idoc_id_seq', 1, false);
            public       robson    false    164            �          0    33014 	   mensagens 
   TABLE DATA               \   COPY mensagens (id, mensagem, id_chamado, status, data, created_at, updated_at) FROM stdin;
    public       postgres    false    175    1981   }F       �           0    0    mensagens_id_seq    SEQUENCE SET     7   SELECT pg_catalog.setval('mensagens_id_seq', 3, true);
            public       postgres    false    174            �          0    33024 
   migrations 
   TABLE DATA               /   COPY migrations (migration, batch) FROM stdin;
    public       postgres    false    176    1981   ?G       �          0    32952    password_reminders 
   TABLE DATA               ?   COPY password_reminders (email, token, created_at) FROM stdin;
    public       robson    false    165    1981   \G       �           0    0    status_chamado_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('status_chamado_id_seq', 3, true);
            public       postgres    false    172            �          0    33006    status_chamados 
   TABLE DATA               N   COPY status_chamados (id, status_chamado, created_at, updated_at) FROM stdin;
    public       postgres    false    173    1981   yG       �          0    32958    usuarios 
   TABLE DATA               a   COPY usuarios (id, email, senha, nome, tipo, remember_token, created_at, updated_at) FROM stdin;
    public       robson    false    166    1981   �G       �           0    0    usuarios_id_seq    SEQUENCE SET     6   SELECT pg_catalog.setval('usuarios_id_seq', 1, true);
            public       robson    false    167            B           2606    33003    cat_chamados_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY cat_chamados
    ADD CONSTRAINT cat_chamados_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.cat_chamados DROP CONSTRAINT cat_chamados_pkey;
       public         postgres    false    171    171    1982            @           2606    32995    chamados_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY chamados
    ADD CONSTRAINT chamados_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.chamados DROP CONSTRAINT chamados_pkey;
       public         postgres    false    169    169    1982            6           2606    32971    cliente_pkey 
   CONSTRAINT     K   ALTER TABLE ONLY cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.cliente DROP CONSTRAINT cliente_pkey;
       public         robson    false    161    161    1982            8           2606    32973 	   idoc_pkey 
   CONSTRAINT     E   ALTER TABLE ONLY idoc
    ADD CONSTRAINT idoc_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.idoc DROP CONSTRAINT idoc_pkey;
       public         robson    false    163    163    1982            F           2606    33022    mensagens_pkey 
   CONSTRAINT     O   ALTER TABLE ONLY mensagens
    ADD CONSTRAINT mensagens_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.mensagens DROP CONSTRAINT mensagens_pkey;
       public         postgres    false    175    175    1982            D           2606    33011    status_chamado_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY status_chamados
    ADD CONSTRAINT status_chamado_pkey PRIMARY KEY (id);
 M   ALTER TABLE ONLY public.status_chamados DROP CONSTRAINT status_chamado_pkey;
       public         postgres    false    173    173    1982            <           2606    32975    usuarios_email_unique 
   CONSTRAINT     S   ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_email_unique UNIQUE (email);
 H   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_email_unique;
       public         robson    false    166    166    1982            >           2606    32977    usuarios_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_pkey;
       public         robson    false    166    166    1982            9           1259    32978    password_reminders_email_index    INDEX     W   CREATE INDEX password_reminders_email_index ON password_reminders USING btree (email);
 2   DROP INDEX public.password_reminders_email_index;
       public         robson    false    165    1982            :           1259    32979    password_reminders_token_index    INDEX     W   CREATE INDEX password_reminders_token_index ON password_reminders USING btree (token);
 2   DROP INDEX public.password_reminders_token_index;
       public         robson    false    165    1982            G           2606    32980    idoc_idcliente_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY idoc
    ADD CONSTRAINT idoc_idcliente_fkey FOREIGN KEY (idcliente) REFERENCES cliente(id) ON UPDATE CASCADE ON DELETE CASCADE;
 B   ALTER TABLE ONLY public.idoc DROP CONSTRAINT idoc_idcliente_fkey;
       public       robson    false    161    163    1845    1982            �   M   x�3�t-*��4204�50�54U04�24�20�&�e��_T�zx����k2�t�)I-J$M�9�ob^iIji�b���� �1�      �   �   x�}�1�0E��� ��MAYA����j<T�u.�����T�����~~�0bG!hpt"��(ņB��x����!��C�v��B�E����Um�R<��ҳY��1�d%�b�-N�er�:��d����3d%�����t�8^�}u�)R?�&� ��)��L�)����;�L�?���V�X���~.�| ��a�      �   <   x�3�t��L�+IU0�L��4�442�L�2�t�TIM����O�L�L+�,A� �b���� g?Q      �      x������ � �      �   �   x��NI�0<'���8!B���#Ә�C[�@?ā��c�HU%�b{F�Au�|cm�����u�gj�,�UF��j�L�p��v�58m�!WJ#�x�%��?A}�Y#�� S�a4C�A�؇8�p����K9op]����ss!ɚWGaO��4�wλ���������`W      �      x������ � �      �      x������ � �      �   A   x�3�tLJ-*��4204�50�54U04�24�20�&�e�霘�����B�cN���Rt��qqq :�       �   �   x��ˎ�0 �u�
l���Vd��D�8ub��KyI����_?�,���V�m��"��`���A3�j�>\����c��6�+��ǧ#�~���@�mS��E�L��AEi���6�B�~nkz ������"u�Z��<���k�f]�>����F���v!NN(��1��\�	�	��5p�ϯ8�     