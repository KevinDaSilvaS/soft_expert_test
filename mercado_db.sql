PGDMP                         x            mercado    9.4.26    12.3     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16393    mercado    DATABASE     �   CREATE DATABASE mercado WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Portuguese_Brazil.1252' LC_CTYPE = 'Portuguese_Brazil.1252';
    DROP DATABASE mercado;
                postgres    false                        2615    16404    market    SCHEMA        CREATE SCHEMA market;
    DROP SCHEMA market;
                postgres    false            �           0    0    SCHEMA public    ACL     �   REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;
                   postgres    false    6            �            1259    16416    product    TABLE     �   CREATE TABLE market.product (
    id integer NOT NULL,
    product_name character varying NOT NULL,
    type_id integer NOT NULL,
    price double precision DEFAULT 0 NOT NULL
);
    DROP TABLE market.product;
       market            postgres    false    8            �            1259    16414    product_id_seq    SEQUENCE     w   CREATE SEQUENCE market.product_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE market.product_id_seq;
       market          postgres    false    8    179            �           0    0    product_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE market.product_id_seq OWNED BY market.product.id;
          market          postgres    false    178            �            1259    16407    product_type    TABLE     �   CREATE TABLE market.product_type (
    id integer NOT NULL,
    type character varying NOT NULL,
    tax_amount double precision NOT NULL
);
     DROP TABLE market.product_type;
       market            postgres    false    8            �            1259    16405    product_type_id_seq    SEQUENCE     |   CREATE SEQUENCE market.product_type_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE market.product_type_id_seq;
       market          postgres    false    177    8            �           0    0    product_type_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE market.product_type_id_seq OWNED BY market.product_type.id;
          market          postgres    false    176            i           2604    16419 
   product id    DEFAULT     h   ALTER TABLE ONLY market.product ALTER COLUMN id SET DEFAULT nextval('market.product_id_seq'::regclass);
 9   ALTER TABLE market.product ALTER COLUMN id DROP DEFAULT;
       market          postgres    false    178    179    179            h           2604    16410    product_type id    DEFAULT     r   ALTER TABLE ONLY market.product_type ALTER COLUMN id SET DEFAULT nextval('market.product_type_id_seq'::regclass);
 >   ALTER TABLE market.product_type ALTER COLUMN id DROP DEFAULT;
       market          postgres    false    177    176    177            �          0    16416    product 
   TABLE DATA           C   COPY market.product (id, product_name, type_id, price) FROM stdin;
    market          postgres    false    179   �       �          0    16407    product_type 
   TABLE DATA           <   COPY market.product_type (id, type, tax_amount) FROM stdin;
    market          postgres    false    177          �           0    0    product_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('market.product_id_seq', 4, true);
          market          postgres    false    178            �           0    0    product_type_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('market.product_type_id_seq', 6, true);
          market          postgres    false    176            �   P   x�3��MLN,*:�8�ӄӀˈ3 ��$Q!%��JR9̀�ƜE�nA��A�~!�@uz�\&�N�9����FF@^� B�      �   n   x�}�1�0 ��~L�u���:� KX�R[0�z�X��>V�D
׏]c�T�a��/�����=�����ި2�����~�{�H"zWU�������-��2�
"�'     