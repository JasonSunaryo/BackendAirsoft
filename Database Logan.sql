PGDMP  *    *                |            mydb    16.3    16.3 O    P           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            Q           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            R           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            S           1262    16397    mydb    DATABASE     {   CREATE DATABASE mydb WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_Indonesia.1252';
    DROP DATABASE mydb;
                postgres    false            �            1259    32806    comments    TABLE     �   CREATE TABLE public.comments (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    comment text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.comments;
       public         heap    postgres    false            �            1259    32805    comments_id_seq    SEQUENCE     x   CREATE SEQUENCE public.comments_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.comments_id_seq;
       public          postgres    false    234            T           0    0    comments_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.comments_id_seq OWNED BY public.comments.id;
          public          postgres    false    233            �            1259    16424    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    postgres    false            �            1259    16423    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          postgres    false    221            U           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          postgres    false    220            �            1259    16448 	   mahasiswa    TABLE     C  CREATE TABLE public.mahasiswa (
    id bigint NOT NULL,
    nim character varying(255) NOT NULL,
    nama character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    jurusan character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.mahasiswa;
       public         heap    postgres    false            �            1259    16447    mahasiswa_id_seq    SEQUENCE     y   CREATE SEQUENCE public.mahasiswa_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.mahasiswa_id_seq;
       public          postgres    false    225            V           0    0    mahasiswa_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.mahasiswa_id_seq OWNED BY public.mahasiswa.id;
          public          postgres    false    224            �            1259    16399 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            �            1259    16398    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    216            W           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    215            �            1259    16416    password_reset_tokens    TABLE     �   CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 )   DROP TABLE public.password_reset_tokens;
       public         heap    postgres    false            �            1259    24589    password_resets    TABLE     �   CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         heap    postgres    false            �            1259    16436    personal_access_tokens    TABLE     �  CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.personal_access_tokens;
       public         heap    postgres    false            �            1259    16435    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public          postgres    false    223            X           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public          postgres    false    222            �            1259    24612    products    TABLE       CREATE TABLE public.products (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    price character varying(255) NOT NULL,
    stock character varying(255) NOT NULL,
    type character varying(255) NOT NULL,
    description text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    cost_price character varying(255) DEFAULT '0'::character varying NOT NULL,
    image character varying(255),
    deleted_at timestamp(0) without time zone
);
    DROP TABLE public.products;
       public         heap    postgres    false            �            1259    24611    products_id_seq    SEQUENCE     x   CREATE SEQUENCE public.products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.products_id_seq;
       public          postgres    false    228            Y           0    0    products_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.products_id_seq OWNED BY public.products.id;
          public          postgres    false    227            �            1259    32798    reports    TABLE     �   CREATE TABLE public.reports (
    id bigint NOT NULL,
    start_date date NOT NULL,
    end_date date NOT NULL,
    total_profit numeric(10,2) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.reports;
       public         heap    postgres    false            �            1259    32797    reports_id_seq    SEQUENCE     w   CREATE SEQUENCE public.reports_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.reports_id_seq;
       public          postgres    false    232            Z           0    0    reports_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.reports_id_seq OWNED BY public.reports.id;
          public          postgres    false    231            �            1259    32782 
   stock_logs    TABLE       CREATE TABLE public.stock_logs (
    id bigint NOT NULL,
    product_id bigint NOT NULL,
    change integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    profit numeric(10,2) DEFAULT '0'::numeric NOT NULL
);
    DROP TABLE public.stock_logs;
       public         heap    postgres    false            �            1259    32781    stock_logs_id_seq    SEQUENCE     z   CREATE SEQUENCE public.stock_logs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.stock_logs_id_seq;
       public          postgres    false    230            [           0    0    stock_logs_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.stock_logs_id_seq OWNED BY public.stock_logs.id;
          public          postgres    false    229            �            1259    16406    users    TABLE     �  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    role character varying(255) DEFAULT 'customer'::character varying NOT NULL
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    16405    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    218            \           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    217            �           2604    32809    comments id    DEFAULT     j   ALTER TABLE ONLY public.comments ALTER COLUMN id SET DEFAULT nextval('public.comments_id_seq'::regclass);
 :   ALTER TABLE public.comments ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    233    234    234            �           2604    16427    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    220    221    221            �           2604    16451    mahasiswa id    DEFAULT     l   ALTER TABLE ONLY public.mahasiswa ALTER COLUMN id SET DEFAULT nextval('public.mahasiswa_id_seq'::regclass);
 ;   ALTER TABLE public.mahasiswa ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    225    224    225            �           2604    16402    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    215    216            �           2604    16439    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    222    223    223            �           2604    24615    products id    DEFAULT     j   ALTER TABLE ONLY public.products ALTER COLUMN id SET DEFAULT nextval('public.products_id_seq'::regclass);
 :   ALTER TABLE public.products ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    228    227    228            �           2604    32801 
   reports id    DEFAULT     h   ALTER TABLE ONLY public.reports ALTER COLUMN id SET DEFAULT nextval('public.reports_id_seq'::regclass);
 9   ALTER TABLE public.reports ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    232    231    232            �           2604    32785    stock_logs id    DEFAULT     n   ALTER TABLE ONLY public.stock_logs ALTER COLUMN id SET DEFAULT nextval('public.stock_logs_id_seq'::regclass);
 <   ALTER TABLE public.stock_logs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    230    229    230            �           2604    16409    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    217    218            M          0    32806    comments 
   TABLE DATA           P   COPY public.comments (id, user_id, comment, created_at, updated_at) FROM stdin;
    public          postgres    false    234   >^       @          0    16424    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public          postgres    false    221   �^       D          0    16448 	   mahasiswa 
   TABLE DATA           Z   COPY public.mahasiswa (id, nim, nama, email, jurusan, created_at, updated_at) FROM stdin;
    public          postgres    false    225   �^       ;          0    16399 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    216   �^       >          0    16416    password_reset_tokens 
   TABLE DATA           I   COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
    public          postgres    false    219   5`       E          0    24589    password_resets 
   TABLE DATA           C   COPY public.password_resets (email, token, created_at) FROM stdin;
    public          postgres    false    226   �`       B          0    16436    personal_access_tokens 
   TABLE DATA           �   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
    public          postgres    false    223   �`       G          0    24612    products 
   TABLE DATA           �   COPY public.products (id, title, price, stock, type, description, created_at, updated_at, cost_price, image, deleted_at) FROM stdin;
    public          postgres    false    228   �`       K          0    32798    reports 
   TABLE DATA           a   COPY public.reports (id, start_date, end_date, total_profit, created_at, updated_at) FROM stdin;
    public          postgres    false    232   Xe       I          0    32782 
   stock_logs 
   TABLE DATA           \   COPY public.stock_logs (id, product_id, change, created_at, updated_at, profit) FROM stdin;
    public          postgres    false    230   �e       =          0    16406    users 
   TABLE DATA           {   COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at, role) FROM stdin;
    public          postgres    false    218   �f       ]           0    0    comments_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.comments_id_seq', 3, true);
          public          postgres    false    233            ^           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          postgres    false    220            _           0    0    mahasiswa_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.mahasiswa_id_seq', 1, false);
          public          postgres    false    224            `           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 18, true);
          public          postgres    false    215            a           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public          postgres    false    222            b           0    0    products_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.products_id_seq', 33, true);
          public          postgres    false    227            c           0    0    reports_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.reports_id_seq', 7, true);
          public          postgres    false    231            d           0    0    stock_logs_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.stock_logs_id_seq', 17, true);
          public          postgres    false    229            e           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 9, true);
          public          postgres    false    217            �           2606    32813    comments comments_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.comments
    ADD CONSTRAINT comments_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.comments DROP CONSTRAINT comments_pkey;
       public            postgres    false    234            �           2606    16432    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            postgres    false    221            �           2606    16434 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            postgres    false    221            �           2606    16455    mahasiswa mahasiswa_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.mahasiswa
    ADD CONSTRAINT mahasiswa_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.mahasiswa DROP CONSTRAINT mahasiswa_pkey;
       public            postgres    false    225            �           2606    16404    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    216            �           2606    16422 0   password_reset_tokens password_reset_tokens_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);
 Z   ALTER TABLE ONLY public.password_reset_tokens DROP CONSTRAINT password_reset_tokens_pkey;
       public            postgres    false    219            �           2606    16443 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public            postgres    false    223            �           2606    16446 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public            postgres    false    223            �           2606    24619    products products_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.products DROP CONSTRAINT products_pkey;
       public            postgres    false    228            �           2606    32803    reports reports_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.reports
    ADD CONSTRAINT reports_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.reports DROP CONSTRAINT reports_pkey;
       public            postgres    false    232            �           2606    32787    stock_logs stock_logs_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.stock_logs
    ADD CONSTRAINT stock_logs_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.stock_logs DROP CONSTRAINT stock_logs_pkey;
       public            postgres    false    230            �           2606    16415    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            postgres    false    218            �           2606    16413    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    218            �           1259    24594    password_resets_email_index    INDEX     X   CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);
 /   DROP INDEX public.password_resets_email_index;
       public            postgres    false    226            �           1259    16444 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public            postgres    false    223    223            �           2606    32814 !   comments comments_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.comments
    ADD CONSTRAINT comments_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;
 K   ALTER TABLE ONLY public.comments DROP CONSTRAINT comments_user_id_foreign;
       public          postgres    false    218    4754    234            �           2606    32788 (   stock_logs stock_logs_product_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.stock_logs
    ADD CONSTRAINT stock_logs_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.products(id) ON DELETE CASCADE;
 R   ALTER TABLE ONLY public.stock_logs DROP CONSTRAINT stock_logs_product_id_foreign;
       public          postgres    false    228    4770    230            M   S   x�3�4��IL��4202�50�52V04�22�24�&�e�i�Y�Z�)gb�M��hP�BRfq"�c�d1#+c�%�\1z\\\ |��      @      x������ � �      D      x������ � �      ;   J  x����n�0F����b�x�IV
n�
�J�������j\ ���q���	$��/����9Dݡ�����o>48�H�?�E5�ɒ��F<���~�!���O!��Ú������5Ǹ2���X�I6Z���ٻo�xs���8K}%�\?��0+�7���-7����Վ��!�44�>���� �((�V ���� ����1m�N�B)�U�b�@��e�8��L�?-x%@g�$Dc��#5����EP2��T
�f"��t _��l��*cͺ�����1��Rk���y�����Q��%��x����\�ק��=w      >   w   x��J,��+.�K,��70tH�M���K���T1�T14P�q�(��ԏ0r6,��L6��L-���J
��4/�pIuv͍���svN����	I�4202�50�52V0��20�22����� � �      E      x������ � �      B      x������ � �      G   R  x��T�v�8�Ƨ���U��$�ZsA������՛H"F!PZz5�1�7O2Ajm�۵F],���og�Ȃ9���?L�7��+p�.]�gK�E�Yor���a��}OPTX}Y"���	ޖ�+n � �E��qx\ʂ�4��Ә݀��1�qBR�|2�&*�8B9�ArZ�-��$%l��EKQ��u���<�8 -Pu�����?Y53B!����hHs�� ��U��@���@p���G�3�.
)�Z��yW��>Ni@��bLB�p�p��2`��߂Z .���5/�4J�����u��rT��I�'U;Q����?o���>1��w� u!����3Jr�"0G)���	JJ��Pbǀ��(5I�l��PUA�u�bR���~�ݎ���n�K��M�.=�|�8��&%��,����Q�JX <���]Z&�Z�*��u4���p��{�<��U�t���y<�����c�X��5E�|��#�_� ���T�!�"�Ӹ�<<!�y<�m�_L�Ӽ�������>	�Zc�C����CnHPq�nN3�E�K*#�|���	O͆�/�jQ�"�&��ua������a�.G�rJ^sFǁ��.�96��[�h풓�m�tܿLw"�b�?ں*U��0���,fR"b�P4C�\!���"g���p!��=��'�=��Օ�=�oX�
�YygR�.�$%Y���
Q�04'�� �	���{M3Y���;�U��Y���w
�0��,_�zq�A~�2���a�d�^nh�v�z����:�N]϶�����:�El~Q�۪���S�D�Á��=��3^�~UfJ��;y7ט9y<$TN�U�B�,��!B�e�p�D�>�b�쥵 4ɀʗ�h@^㫮r���%)�z��-��u�%O����0�=鶭��Z¯�]`�xb�n̅�oi�J���ρ�k�b?�۷gGw�������3e�t�'u��F�o����J�wNZ]�mȒ���#��(���YA��P�Z��d<�6\.�ǥn+%��ި�E�T�E�h�d����P��� D���V�sk�*W��z���2ؕ؛�d߇a�N���ϋ�����t%���3��V���,K[�      K   i   x��λ�0�ښ�8��d͒��8�88	ܤ�@����Q���Ԧ���գi��L��h�L���Jդ� �G3k�n/#�M���Gm�,_��o�k�y���X6�      I   �   x�u��� E�5T��H�Q-鿎`HBl?���3B]q�$�Ax�jIL6ډ|�$ �pkt�C'')�D�f��Ʊ�G�'�`�����1�dJ���`�i�ehlӈ��(l�ľ	d�+�m�t���@�m�k֝��m�qR�Ҍ�X����|�7��u���+�~�      =   \  x�u�I��@���+<xU���4�#�#8,�/(�Ԧq�׏�ă�KU�K*��=Ęɳ�K��\�LrS�!x����v�9f�ӆU�m���!�* �=��%���9���r�7\��a�K��\�Kz����ot��<;<�@���U^n���9�ά�h!>d�	�ЈC �¤2�DI~���є�tۺ=����#_�gC�F�T��͔6�(*D�^p����(Ȯ�0��zG#��9>*�E:�\b����M�s3�H�v�z!�3����)�R�B�
�
�F���h�
���u��MiG.�J�0��퉓ʺo�.����.��L*N�����;�}�T �����\�.˲(�S     