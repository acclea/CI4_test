--
-- PostgreSQL database dump
--

-- Dumped from database version 11.1
-- Dumped by pg_dump version 11.1

-- Started on 2019-04-30 09:58:40

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE ci4_test;
--
-- TOC entry 2830 (class 1262 OID 16400)
-- Name: ci4_test; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE ci4_test WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Chinese (Simplified)_China.936' LC_CTYPE = 'Chinese (Simplified)_China.936' TABLESPACE = ci4_demo;


ALTER DATABASE ci4_test OWNER TO postgres;

\connect ci4_test

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 2831 (class 0 OID 0)
-- Dependencies: 2830
-- Name: DATABASE ci4_test; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE ci4_test IS 'ci4框架练习';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 197 (class 1259 OID 16404)
-- Name: ci_admin; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ci_admin (
    id integer NOT NULL,
    name character varying(15),
    status smallint DEFAULT 1,
    addtime integer NOT NULL,
    uptime integer NOT NULL,
    group_id smallint DEFAULT 0 NOT NULL,
    pass character(40)
);


ALTER TABLE public.ci_admin OWNER TO postgres;

--
-- TOC entry 2832 (class 0 OID 0)
-- Dependencies: 197
-- Name: TABLE ci_admin; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.ci_admin IS '系统管理员';


--
-- TOC entry 2833 (class 0 OID 0)
-- Dependencies: 197
-- Name: COLUMN ci_admin.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.ci_admin.id IS '自增id（管理员id）';


--
-- TOC entry 2834 (class 0 OID 0)
-- Dependencies: 197
-- Name: COLUMN ci_admin.name; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.ci_admin.name IS '管理员名称';


--
-- TOC entry 2835 (class 0 OID 0)
-- Dependencies: 197
-- Name: COLUMN ci_admin.status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.ci_admin.status IS '管理员是否启用，1是，2否';


--
-- TOC entry 2836 (class 0 OID 0)
-- Dependencies: 197
-- Name: COLUMN ci_admin.addtime; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.ci_admin.addtime IS '添加时间';


--
-- TOC entry 2837 (class 0 OID 0)
-- Dependencies: 197
-- Name: COLUMN ci_admin.uptime; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.ci_admin.uptime IS '修改时间';


--
-- TOC entry 2838 (class 0 OID 0)
-- Dependencies: 197
-- Name: COLUMN ci_admin.group_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.ci_admin.group_id IS '分组id，默认不属于任何分组';


--
-- TOC entry 2839 (class 0 OID 0)
-- Dependencies: 197
-- Name: COLUMN ci_admin.pass; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.ci_admin.pass IS '密码';


--
-- TOC entry 196 (class 1259 OID 16402)
-- Name: ci_admin_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ci_admin_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ci_admin_id_seq OWNER TO postgres;

--
-- TOC entry 2840 (class 0 OID 0)
-- Dependencies: 196
-- Name: ci_admin_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ci_admin_id_seq OWNED BY public.ci_admin.id;


--
-- TOC entry 199 (class 1259 OID 24594)
-- Name: ci_admin_log; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ci_admin_log (
    id integer NOT NULL,
    describe character varying(200) NOT NULL,
    opera_id smallint NOT NULL,
    addtime integer NOT NULL,
    opera_ip inet NOT NULL
);


ALTER TABLE public.ci_admin_log OWNER TO postgres;

--
-- TOC entry 2841 (class 0 OID 0)
-- Dependencies: 199
-- Name: TABLE ci_admin_log; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.ci_admin_log IS '管理员日志';


--
-- TOC entry 2842 (class 0 OID 0)
-- Dependencies: 199
-- Name: COLUMN ci_admin_log.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.ci_admin_log.id IS '自增id';


--
-- TOC entry 2843 (class 0 OID 0)
-- Dependencies: 199
-- Name: COLUMN ci_admin_log.describe; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.ci_admin_log.describe IS '操作描述';


--
-- TOC entry 2844 (class 0 OID 0)
-- Dependencies: 199
-- Name: COLUMN ci_admin_log.opera_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.ci_admin_log.opera_id IS '操作id（1增——a，2删——d，3查——s，4改——u）';


--
-- TOC entry 2845 (class 0 OID 0)
-- Dependencies: 199
-- Name: COLUMN ci_admin_log.opera_ip; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.ci_admin_log.opera_ip IS '当前客户端IP';


--
-- TOC entry 198 (class 1259 OID 24592)
-- Name: ci_admin_log_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ci_admin_log_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ci_admin_log_id_seq OWNER TO postgres;

--
-- TOC entry 2846 (class 0 OID 0)
-- Dependencies: 198
-- Name: ci_admin_log_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ci_admin_log_id_seq OWNED BY public.ci_admin_log.id;


--
-- TOC entry 2692 (class 2604 OID 16407)
-- Name: ci_admin id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ci_admin ALTER COLUMN id SET DEFAULT nextval('public.ci_admin_id_seq'::regclass);


--
-- TOC entry 2695 (class 2604 OID 24597)
-- Name: ci_admin_log id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ci_admin_log ALTER COLUMN id SET DEFAULT nextval('public.ci_admin_log_id_seq'::regclass);


--
-- TOC entry 2822 (class 0 OID 16404)
-- Dependencies: 197
-- Data for Name: ci_admin; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.ci_admin (id, name, status, addtime, uptime, group_id, pass) VALUES (1, 'admin', 1, 1556423252, 1556529512, 0, '3582a9e8367e2cd386f6b01eff352562f9cf875d');


--
-- TOC entry 2824 (class 0 OID 24594)
-- Dependencies: 199
-- Data for Name: ci_admin_log; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.ci_admin_log (id, describe, opera_id, addtime, opera_ip) VALUES (1, 'admin 管理员登陆，时间：2019-04-29 17:08:09', 3, 1556528889, '127.0.0.1');
INSERT INTO public.ci_admin_log (id, describe, opera_id, addtime, opera_ip) VALUES (2, 'admin 管理员登陆，时间：2019-04-29 17:10:31', 3, 1556529031, '127.0.0.1');
INSERT INTO public.ci_admin_log (id, describe, opera_id, addtime, opera_ip) VALUES (3, 'admin 管理员登陆，时间：2019-04-29 17:12:05', 3, 1556529125, '127.0.0.1');
INSERT INTO public.ci_admin_log (id, describe, opera_id, addtime, opera_ip) VALUES (4, 'admin 管理员登陆，时间：2019-04-29 17:12:28', 3, 1556529148, '127.0.0.1');
INSERT INTO public.ci_admin_log (id, describe, opera_id, addtime, opera_ip) VALUES (5, 'admin 管理员登陆，时间：2019-04-29 17:18:32', 3, 1556529512, '127.0.0.1');


--
-- TOC entry 2847 (class 0 OID 0)
-- Dependencies: 196
-- Name: ci_admin_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ci_admin_id_seq', 1, false);


--
-- TOC entry 2848 (class 0 OID 0)
-- Dependencies: 198
-- Name: ci_admin_log_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ci_admin_log_id_seq', 5, true);


--
-- TOC entry 2699 (class 2606 OID 24602)
-- Name: ci_admin_log ci_admin_log_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ci_admin_log
    ADD CONSTRAINT ci_admin_log_pkey PRIMARY KEY (id);


--
-- TOC entry 2697 (class 2606 OID 16409)
-- Name: ci_admin ci_admin_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ci_admin
    ADD CONSTRAINT ci_admin_pkey PRIMARY KEY (id);


-- Completed on 2019-04-30 09:58:41

--
-- PostgreSQL database dump complete
--

