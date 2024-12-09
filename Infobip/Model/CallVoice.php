<?php

declare(strict_types=1);

/**
 * Infobip Client API Libraries OpenAPI Specification
 *
 * OpenAPI specification containing public endpoints supported in client API libraries.
 *
 * Contact: support@infobip.com
 *
 * This class is auto generated from the Infobip OpenAPI specification through the OpenAPI Specification Client API libraries (Re)Generator (OSCAR), powered by the OpenAPI Generator (https://openapi-generator.tech).
 *
 * Do not edit manually. To learn how to raise an issue, see the CONTRIBUTING guide or contact us @ support@infobip.com.
 */

namespace Infobip\Model;

use InvalidArgumentException;

final class CallVoice implements EnumInterface
{
    public const ZEINA = 'Zeina';
    public const AISHA__BETA = 'Aisha (beta)';
    public const FAROOQ__BETA = 'Farooq (beta)';
    public const HUSSEIN__BETA = 'Hussein (beta)';
    public const AMAL__BETA = 'Amal (beta)';
    public const SAYAN__BETA = 'Sayan (beta)';
    public const SUSHMITA__BETA = 'Sushmita (beta)';
    public const DARINA = 'Darina';
    public const CONCHITA = 'Conchita';
    public const ZHIYU = 'Zhiyu';
    public const LIU__BETA = 'Liu (beta)';
    public const WANG__BETA = 'Wang (beta)';
    public const ZHANG__BETA = 'Zhang (beta)';
    public const LIN__BETA = 'Lin (beta)';
    public const AKEMI__BETA = 'Akemi (beta)';
    public const CHEN__BETA = 'Chen (beta)';
    public const HUANG__BETA = 'Huang (beta)';
    public const FANG = 'Fang';
    public const CHAO = 'Chao';
    public const MING = 'Ming';
    public const ANETA = 'Aneta';
    public const NAJA = 'Naja';
    public const MADS = 'Mads';
    public const RUBEN = 'Ruben';
    public const LOTTE = 'Lotte';
    public const JOANNA = 'Joanna';
    public const IVY = 'Ivy';
    public const KENDRA = 'Kendra';
    public const KIMBERLY = 'Kimberly';
    public const SALLI = 'Salli';
    public const JOEY = 'Joey';
    public const JUSTIN = 'Justin';
    public const MATTHEW = 'Matthew';
    public const RUSSELL = 'Russell';
    public const NICOLE = 'Nicole';
    public const BRIAN = 'Brian';
    public const AMY = 'Amy';
    public const EMMA = 'Emma';
    public const ADITI = 'Aditi';
    public const RAVEENA = 'Raveena';
    public const GERAINT = 'Geraint';
    public const EVELIN__BETA = 'Evelin (beta)';
    public const CELINE = 'Celine';
    public const LEA = 'Lea';
    public const MATHIEU = 'Mathieu';
    public const CHANTAL = 'Chantal';
    public const VICKI = 'Vicki';
    public const HANS = 'Hans';
    public const MARLENE = 'Marlene';
    public const SOPHIA__BETA = 'Sophia (beta)';
    public const DINESH__BETA = 'Dinesh (beta)';
    public const LEELA__BETA = 'Leela (beta)';
    public const ABIGAIL = 'Abigail';
    public const MEIRA = 'Meira';
    public const IDAN = 'Idan';
    public const YOSEF = 'Yosef';
    public const AADITA = 'Aadita';
    public const AARUSHI__BETA = 'Aarushi (beta)';
    public const AKASH__BETA = 'Akash (beta)';
    public const DAMAN__BETA = 'Daman (beta)';
    public const DIVYA__BETA = 'Divya (beta)';
    public const AGOTA = 'Agota';
    public const DORA = 'Dora';
    public const KARL = 'Karl';
    public const INDAH__BETA = 'Indah (beta)';
    public const ARIF__BETA = 'Arif (beta)';
    public const REZA__BETA = 'Reza (beta)';
    public const NURUL__BETA = 'Nurul (beta)';
    public const GIANNA__BETA = 'Gianna (beta)';
    public const CARLA = 'Carla';
    public const BIANCA = 'Bianca';
    public const GIORGIO = 'Giorgio';
    public const TAKUMI = 'Takumi';
    public const MIZUKI = 'Mizuki';
    public const SHASHANK__BETA = 'Shashank (beta)';
    public const NAMRATHA__BETA = 'Namratha (beta)';
    public const SEOYEON = 'Seoyeon';
    public const SUMI__BETA = 'Sumi (beta)';
    public const JINA__BETA = 'Jina (beta)';
    public const HIMCHAN__BETA = 'Himchan (beta)';
    public const MINHO__BETA = 'Minho (beta)';
    public const AMEERA = 'Ameera';
    public const NURIN = 'Nurin';
    public const NIJAT = 'Nijat';
    public const FUAAD = 'Fuaad';
    public const VISHNU__BETA = 'Vishnu (beta)';
    public const KIRTI__BETA = 'Kirti (beta)';
    public const LIV = 'Liv';
    public const EWA = 'Ewa';
    public const MAJA = 'Maja';
    public const JACEK = 'Jacek';
    public const JAN = 'Jan';
    public const CRISTIANO = 'Cristiano';
    public const INES = 'Ines';
    public const ABRIELLE__BETA = 'Abrielle (beta)';
    public const HENRIQUES__BETA = 'Henriques (beta)';
    public const JERALDO__BETA = 'Jeraldo (beta)';
    public const JACINDA__BETA = 'Jacinda (beta)';
    public const CAMILA = 'Camila';
    public const RICARDO = 'Ricardo';
    public const VITORIA = 'Vitoria';
    public const CARMEN = 'Carmen';
    public const MAXIM = 'Maxim';
    public const TATYANA = 'Tatyana';
    public const NATALIA = 'Natalia';
    public const MIGUEL = 'Miguel';
    public const LINDA = 'Linda';
    public const ENRIQUE = 'Enrique';
    public const GABRIELA__BETA = 'Gabriela (beta)';
    public const LUPE = 'Lupe';
    public const PENELOPE = 'Penelope';
    public const MIA = 'Mia';
    public const ASTRID = 'Astrid';
    public const GANESH__BETA = 'Ganesh (beta)';
    public const SHRUTI__BETA = 'Shruti (beta)';
    public const VIJAY__BETA = 'Vijay (beta)';
    public const SAMANTHA__BETA = 'Samantha (beta)';
    public const NATCHAYA__BETA = 'Natchaya (beta)';
    public const FILIZ = 'Filiz';
    public const ULYANA = 'Ulyana';
    public const LIEN__BETA = 'Lien (beta)';
    public const QUAN__BETA = 'Quan (beta)';
    public const MAI__BETA = 'Mai (beta)';
    public const TUAN__BETA = 'Tuan (beta)';
    public const GWYNETH = 'Gwyneth';
    public const HAMED__NEURAL = 'Hamed (neural)';
    public const SALMA__NEURAL = 'Salma (neural)';
    public const SHAKIR__NEURAL = 'Shakir (neural)';
    public const ZARIYAH__NEURAL = 'Zariyah (neural)';
    public const BASHKAR__NEURAL = 'Bashkar (neural)';
    public const TANISHAA__NEURAL = 'Tanishaa (neural)';
    public const BORISLAV__NEURAL = 'Borislav (neural)';
    public const KALINA__NEURAL = 'Kalina (neural)';
    public const ALBA__NEURAL = 'Alba (neural)';
    public const ENRIC__NEURAL = 'Enric (neural)';
    public const JOANA__NEURAL = 'Joana (neural)';
    public const XIAOCHEN__NEURAL = 'Xiaochen (neural)';
    public const XIAOHAN__NEURAL = 'Xiaohan (neural)';
    public const XIAOMENG__NEURAL = 'Xiaomeng (neural)';
    public const XIAOMO__NEURAL = 'Xiaomo (neural)';
    public const XIAOQIU__NEURAL = 'Xiaoqiu (neural)';
    public const XIAOROU__NEURAL = 'Xiaorou (neural)';
    public const XIAORUI__NEURAL = 'Xiaorui (neural)';
    public const XIAOXIAO__NEURAL = 'Xiaoxiao (neural)';
    public const XIAOYAN__NEURAL = 'Xiaoyan (neural)';
    public const XIAOYI__NEURAL = 'Xiaoyi (neural)';
    public const XIAOZHEN__NEURAL = 'Xiaozhen (neural)';
    public const YUNFENG__NEURAL = 'Yunfeng (neural)';
    public const YUNHAO__NEURAL = 'Yunhao (neural)';
    public const YUNJIAN__NEURAL = 'Yunjian (neural)';
    public const YUNJIE__NEURAL = 'Yunjie (neural)';
    public const YUNXI__NEURAL = 'Yunxi (neural)';
    public const YUNXIA__NEURAL = 'Yunxia (neural)';
    public const YUNYANG__NEURAL = 'Yunyang (neural)';
    public const YUNYE__NEURAL = 'Yunye (neural)';
    public const YUNZE__NEURAL = 'Yunze (neural)';
    public const HIU_GAAI__NEURAL = 'HiuGaai (neural)';
    public const HIU_MAAN__NEURAL = 'HiuMaan (neural)';
    public const HSIAO_CHEN__NEURAL = 'HsiaoChen (neural)';
    public const HSIAO_YU__NEURAL = 'HsiaoYu (neural)';
    public const WAN_LUNG__NEURAL = 'WanLung (neural)';
    public const YUN_JHE__NEURAL = 'YunJhe (neural)';
    public const GABRIJELA__NEURAL = 'Gabrijela (neural)';
    public const SRECKO__NEURAL = 'Srecko (neural)';
    public const ANTONIN__NEURAL = 'Antonin (neural)';
    public const VLASTA__NEURAL = 'Vlasta (neural)';
    public const CHRISTEL__NEURAL = 'Christel (neural)';
    public const JEPPE__NEURAL = 'Jeppe (neural)';
    public const COLETTE__NEURAL = 'Colette (neural)';
    public const FENNA__NEURAL = 'Fenna (neural)';
    public const MAARTEN__NEURAL = 'Maarten (neural)';
    public const AMBER__NEURAL = 'Amber (neural)';
    public const ANDREW__NEURAL = 'Andrew (neural)';
    public const ARIA__NEURAL = 'Aria (neural)';
    public const ASHLEY__NEURAL = 'Ashley (neural)';
    public const AVA__NEURAL = 'Ava (neural)';
    public const BRANDON__NEURAL = 'Brandon (neural)';
    public const BRIAN__NEURAL = 'Brian (neural)';
    public const CHRISTOPHER__NEURAL = 'Christopher (neural)';
    public const CORA__NEURAL = 'Cora (neural)';
    public const DAVIS__NEURAL = 'Davis (neural)';
    public const ELIZABETH__NEURAL = 'Elizabeth (neural)';
    public const EMMA__NEURAL = 'Emma (neural)';
    public const ERIC__NEURAL = 'Eric (neural)';
    public const GUY__NEURAL = 'Guy (neural)';
    public const JACOB__NEURAL = 'Jacob (neural)';
    public const JANE__NEURAL = 'Jane (neural)';
    public const JASON__NEURAL = 'Jason (neural)';
    public const JENNY__NEURAL = 'Jenny (neural)';
    public const MICHELLE__NEURAL = 'Michelle (neural)';
    public const MONICA__NEURAL = 'Monica (neural)';
    public const NANCY__NEURAL = 'Nancy (neural)';
    public const ROGER__NEURAL = 'Roger (neural)';
    public const SARA__NEURAL = 'Sara (neural)';
    public const STEFFAN__NEURAL = 'Steffan (neural)';
    public const TONY__NEURAL = 'Tony (neural)';
    public const ANNETTE__NEURAL = 'Annette (neural)';
    public const CARLY__NEURAL = 'Carly (neural)';
    public const DARREN__NEURAL = 'Darren (neural)';
    public const DUNCAN__NEURAL = 'Duncan (neural)';
    public const ELSIE__NEURAL = 'Elsie (neural)';
    public const FREYA__NEURAL = 'Freya (neural)';
    public const JOANNE__NEURAL = 'Joanne (neural)';
    public const KEN__NEURAL = 'Ken (neural)';
    public const KIM__NEURAL = 'Kim (neural)';
    public const NATASHA__NEURAL = 'Natasha (neural)';
    public const NEIL__NEURAL = 'Neil (neural)';
    public const TIM__NEURAL = 'Tim (neural)';
    public const TINA__NEURAL = 'Tina (neural)';
    public const WILLIAM__NEURAL = 'William (neural)';
    public const ABBI__NEURAL = 'Abbi (neural)';
    public const ALFIE__NEURAL = 'Alfie (neural)';
    public const BELLA__NEURAL = 'Bella (neural)';
    public const ELLIOT__NEURAL = 'Elliot (neural)';
    public const ETHAN__NEURAL = 'Ethan (neural)';
    public const HOLLIE__NEURAL = 'Hollie (neural)';
    public const LIBBY__NEURAL = 'Libby (neural)';
    public const NOAH__NEURAL = 'Noah (neural)';
    public const OLIVER__NEURAL = 'Oliver (neural)';
    public const OLIVIA__NEURAL = 'Olivia (neural)';
    public const RYAN__NEURAL = 'Ryan (neural)';
    public const SONIA__NEURAL = 'Sonia (neural)';
    public const THOMAS__NEURAL = 'Thomas (neural)';
    public const CLARA__NEURAL = 'Clara (neural)';
    public const LIAM__NEURAL = 'Liam (neural)';
    public const NEERJA__NEURAL = 'Neerja (neural)';
    public const PRABHAT__NEURAL = 'Prabhat (neural)';
    public const CONNOR__NEURAL = 'Connor (neural)';
    public const EMILY__NEURAL = 'Emily (neural)';
    public const ANGELO__NEURAL = 'Angelo (neural)';
    public const BLESSICA__NEURAL = 'Blessica (neural)';
    public const HARRI__NEURAL = 'Harri (neural)';
    public const NOORA__NEURAL = 'Noora (neural)';
    public const SELMA__NEURAL = 'Selma (neural)';
    public const ALAIN__NEURAL = 'Alain (neural)';
    public const BRIGITTE__NEURAL = 'Brigitte (neural)';
    public const CELESTE__NEURAL = 'Celeste (neural)';
    public const CLAUDE__NEURAL = 'Claude (neural)';
    public const CORALIE__NEURAL = 'Coralie (neural)';
    public const DENISE__NEURAL = 'Denise (neural)';
    public const HENRI__NEURAL = 'Henri (neural)';
    public const JACQUELINE__NEURAL = 'Jacqueline (neural)';
    public const JEROME__NEURAL = 'Jerome (neural)';
    public const JOSEPHINE__NEURAL = 'Josephine (neural)';
    public const MAURICE__NEURAL = 'Maurice (neural)';
    public const VIVIENNE__NEURAL = 'Vivienne (neural)';
    public const YVES__NEURAL = 'Yves (neural)';
    public const YVETTE__NEURAL = 'Yvette (neural)';
    public const ANTOINE__NEURAL = 'Antoine (neural)';
    public const JEAN__NEURAL = 'Jean (neural)';
    public const SYLVIE__NEURAL = 'Sylvie (neural)';
    public const THIERRY__NEURAL = 'Thierry (neural)';
    public const ARIANE__NEURAL = 'Ariane (neural)';
    public const FABRICE__NEURAL = 'Fabrice (neural)';
    public const AMALA__NEURAL = 'Amala (neural)';
    public const BERND__NEURAL = 'Bernd (neural)';
    public const CHRISTOPH__NEURAL = 'Christoph (neural)';
    public const CONRAD__NEURAL = 'Conrad (neural)';
    public const ELKE__NEURAL = 'Elke (neural)';
    public const KASPER__NEURAL = 'Kasper (neural)';
    public const KATJA__NEURAL = 'Katja (neural)';
    public const KILLIAN__NEURAL = 'Killian (neural)';
    public const KLARISSA__NEURAL = 'Klarissa (neural)';
    public const KLAUS__NEURAL = 'Klaus (neural)';
    public const LOUISA__NEURAL = 'Louisa (neural)';
    public const MAJA__NEURAL = 'Maja (neural)';
    public const RALF__NEURAL = 'Ralf (neural)';
    public const SERAPHINA__NEURAL = 'Seraphina (neural)';
    public const TANJA__NEURAL = 'Tanja (neural)';
    public const INGRID__NEURAL = 'Ingrid (neural)';
    public const JONAS__NEURAL = 'Jonas (neural)';
    public const JAN__NEURAL = 'Jan (neural)';
    public const LENI__NEURAL = 'Leni (neural)';
    public const ATHINA__NEURAL = 'Athina (neural)';
    public const NESTORAS__NEURAL = 'Nestoras (neural)';
    public const DHWANI__NEURAL = 'Dhwani (neural)';
    public const NIRANJAN__NEURAL = 'Niranjan (neural)';
    public const AVRI__NEURAL = 'Avri (neural)';
    public const HILA__NEURAL = 'Hila (neural)';
    public const MADHUR__NEURAL = 'Madhur (neural)';
    public const SWARA__NEURAL = 'Swara (neural)';
    public const NOEMI__NEURAL = 'Noemi (neural)';
    public const TAMAS__NEURAL = 'Tamas (neural)';
    public const GUDRUN__NEURAL = 'Gudrun (neural)';
    public const GUNNAR__NEURAL = 'Gunnar (neural)';
    public const ARDI__NEURAL = 'Ardi (neural)';
    public const GADIS__NEURAL = 'Gadis (neural)';
    public const BENIGNO__NEURAL = 'Benigno (neural)';
    public const CALIMERO__NEURAL = 'Calimero (neural)';
    public const CATALDO__NEURAL = 'Cataldo (neural)';
    public const DIEGO__NEURAL = 'Diego (neural)';
    public const ELSA__NEURAL = 'Elsa (neural)';
    public const FABIOLA__NEURAL = 'Fabiola (neural)';
    public const FIAMMA__NEURAL = 'Fiamma (neural)';
    public const GIANNI__NEURAL = 'Gianni (neural)';
    public const GIUSEPPE__NEURAL = 'Giuseppe (neural)';
    public const IMELDA__NEURAL = 'Imelda (neural)';
    public const IRMA__NEURAL = 'Irma (neural)';
    public const ISABELLA__NEURAL = 'Isabella (neural)';
    public const LISANDRO__NEURAL = 'Lisandro (neural)';
    public const PALMIRA__NEURAL = 'Palmira (neural)';
    public const PIERINA__NEURAL = 'Pierina (neural)';
    public const RINALDO__NEURAL = 'Rinaldo (neural)';
    public const AOI__NEURAL = 'Aoi (neural)';
    public const DAICHI__NEURAL = 'Daichi (neural)';
    public const KEITA__NEURAL = 'Keita (neural)';
    public const MAYU__NEURAL = 'Mayu (neural)';
    public const NANAMI__NEURAL = 'Nanami (neural)';
    public const NAOKI__NEURAL = 'Naoki (neural)';
    public const SHIORI__NEURAL = 'Shiori (neural)';
    public const GAGAN__NEURAL = 'Gagan (neural)';
    public const SAPNA__NEURAL = 'Sapna (neural)';
    public const BONG_JIN__NEURAL = 'BongJin (neural)';
    public const GOOK_MIN__NEURAL = 'GookMin (neural)';
    public const HYUNSU__NEURAL = 'Hyunsu (neural)';
    public const IN_JOON__NEURAL = 'InJoon (neural)';
    public const JI_MIN__NEURAL = 'JiMin (neural)';
    public const SEO_HYEON__NEURAL = 'SeoHyeon (neural)';
    public const SOON_BOK__NEURAL = 'SoonBok (neural)';
    public const SUN_HI__NEURAL = 'SunHi (neural)';
    public const YU_JIN__NEURAL = 'YuJin (neural)';
    public const OSMAN__NEURAL = 'Osman (neural)';
    public const YASMIN__NEURAL = 'Yasmin (neural)';
    public const MIDHUN__NEURAL = 'Midhun (neural)';
    public const SOBHANA__NEURAL = 'Sobhana (neural)';
    public const FINN__NEURAL = 'Finn (neural)';
    public const ISELIN__NEURAL = 'Iselin (neural)';
    public const PERNILLE__NEURAL = 'Pernille (neural)';
    public const AGNIESZKA__NEURAL = 'Agnieszka (neural)';
    public const MAREK__NEURAL = 'Marek (neural)';
    public const ZOFIA__NEURAL = 'Zofia (neural)';
    public const DUARTE__NEURAL = 'Duarte (neural)';
    public const FERNANDA__NEURAL = 'Fernanda (neural)';
    public const RAQUEL__NEURAL = 'Raquel (neural)';
    public const ANTONIO__NEURAL = 'Antonio (neural)';
    public const BRENDA__NEURAL = 'Brenda (neural)';
    public const DONATO__NEURAL = 'Donato (neural)';
    public const ELZA__NEURAL = 'Elza (neural)';
    public const FABIO__NEURAL = 'Fabio (neural)';
    public const FRANCISCA__NEURAL = 'Francisca (neural)';
    public const GIOVANNA__NEURAL = 'Giovanna (neural)';
    public const HUMBERTO__NEURAL = 'Humberto (neural)';
    public const JULIO__NEURAL = 'Julio (neural)';
    public const LEILA__NEURAL = 'Leila (neural)';
    public const LETICIA__NEURAL = 'Leticia (neural)';
    public const MANUELA__NEURAL = 'Manuela (neural)';
    public const NICOLAU__NEURAL = 'Nicolau (neural)';
    public const THALITA__NEURAL = 'Thalita (neural)';
    public const VALERIO__NEURAL = 'Valerio (neural)';
    public const YARA__NEURAL = 'Yara (neural)';
    public const ALINA__NEURAL = 'Alina (neural)';
    public const EMIL__NEURAL = 'Emil (neural)';
    public const DARIYA__NEURAL = 'Dariya (neural)';
    public const DMITRY__NEURAL = 'Dmitry (neural)';
    public const SVETLANA__NEURAL = 'Svetlana (neural)';
    public const LUKAS__NEURAL = 'Lukas (neural)';
    public const VIKTORIA__NEURAL = 'Viktoria (neural)';
    public const PETRA__NEURAL = 'Petra (neural)';
    public const ROK__NEURAL = 'Rok (neural)';
    public const ABRIL__NEURAL = 'Abril (neural)';
    public const ALONSO__NEURAL = 'Alonso (neural)';
    public const ALVARO__NEURAL = 'Alvaro (neural)';
    public const ARNAU__NEURAL = 'Arnau (neural)';
    public const DARIO__NEURAL = 'Dario (neural)';
    public const ELIAS__NEURAL = 'Elias (neural)';
    public const ELVIRA__NEURAL = 'Elvira (neural)';
    public const ESTRELLA__NEURAL = 'Estrella (neural)';
    public const IRENE__NEURAL = 'Irene (neural)';
    public const LAIA__NEURAL = 'Laia (neural)';
    public const LIA__NEURAL = 'Lia (neural)';
    public const NIL__NEURAL = 'Nil (neural)';
    public const PALOMA__NEURAL = 'Paloma (neural)';
    public const SAUL__NEURAL = 'Saul (neural)';
    public const TEO__NEURAL = 'Teo (neural)';
    public const TRIANA__NEURAL = 'Triana (neural)';
    public const VERA__NEURAL = 'Vera (neural)';
    public const XIMENA__NEURAL = 'Ximena (neural)';
    public const BEATRIZ__NEURAL = 'Beatriz (neural)';
    public const CANDELA__NEURAL = 'Candela (neural)';
    public const CARLOTA__NEURAL = 'Carlota (neural)';
    public const CECILIO__NEURAL = 'Cecilio (neural)';
    public const DALIA__NEURAL = 'Dalia (neural)';
    public const GERARDO__NEURAL = 'Gerardo (neural)';
    public const JORGE__NEURAL = 'Jorge (neural)';
    public const LARISSA__NEURAL = 'Larissa (neural)';
    public const LIBERTO__NEURAL = 'Liberto (neural)';
    public const LUCIANO__NEURAL = 'Luciano (neural)';
    public const MARINA__NEURAL = 'Marina (neural)';
    public const NURIA__NEURAL = 'Nuria (neural)';
    public const PELAYO__NEURAL = 'Pelayo (neural)';
    public const RENATA__NEURAL = 'Renata (neural)';
    public const YAGO__NEURAL = 'Yago (neural)';
    public const HILLEVI__NEURAL = 'Hillevi (neural)';
    public const MATTIAS__NEURAL = 'Mattias (neural)';
    public const SOFIE__NEURAL = 'Sofie (neural)';
    public const PALLAVI__NEURAL = 'Pallavi (neural)';
    public const VALLUVAR__NEURAL = 'Valluvar (neural)';
    public const MOHAN__NEURAL = 'Mohan (neural)';
    public const SHRUTI__NEURAL = 'Shruti (neural)';
    public const ACHARA__NEURAL = 'Achara (neural)';
    public const NIWAT__NEURAL = 'Niwat (neural)';
    public const PREMWADEE__NEURAL = 'Premwadee (neural)';
    public const AHMET__NEURAL = 'Ahmet (neural)';
    public const EMEL__NEURAL = 'Emel (neural)';
    public const OSTAP__NEURAL = 'Ostap (neural)';
    public const POLINA__NEURAL = 'Polina (neural)';
    public const HOAI_MY__NEURAL = 'HoaiMy (neural)';
    public const NAM_MINH__NEURAL = 'NamMinh (neural)';
    public const ALED__NEURAL = 'Aled (neural)';
    public const NIA__NEURAL = 'Nia (neural)';
    public const MOUNA__NEURAL = 'Mouna (neural)';
    public const JAMAL__NEURAL = 'Jamal (neural)';
    public const UZMA__NEURAL = 'Uzma (neural)';
    public const ASAD__NEURAL = 'Asad (neural)';

    public const ALLOWED_VALUES = [
        'Zeina',
        'Aisha (beta)',
        'Farooq (beta)',
        'Hussein (beta)',
        'Amal (beta)',
        'Sayan (beta)',
        'Sushmita (beta)',
        'Darina',
        'Conchita',
        'Zhiyu',
        'Liu (beta)',
        'Wang (beta)',
        'Zhang (beta)',
        'Lin (beta)',
        'Akemi (beta)',
        'Chen (beta)',
        'Huang (beta)',
        'Fang',
        'Chao',
        'Ming',
        'Aneta',
        'Naja',
        'Mads',
        'Ruben',
        'Lotte',
        'Joanna',
        'Ivy',
        'Kendra',
        'Kimberly',
        'Salli',
        'Joey',
        'Justin',
        'Matthew',
        'Russell',
        'Nicole',
        'Brian',
        'Amy',
        'Emma',
        'Aditi',
        'Raveena',
        'Geraint',
        'Evelin (beta)',
        'Celine',
        'Lea',
        'Mathieu',
        'Chantal',
        'Vicki',
        'Hans',
        'Marlene',
        'Sophia (beta)',
        'Dinesh (beta)',
        'Leela (beta)',
        'Abigail',
        'Meira',
        'Idan',
        'Yosef',
        'Aadita',
        'Aarushi (beta)',
        'Akash (beta)',
        'Daman (beta)',
        'Divya (beta)',
        'Agota',
        'Dora',
        'Karl',
        'Indah (beta)',
        'Arif (beta)',
        'Reza (beta)',
        'Nurul (beta)',
        'Gianna (beta)',
        'Carla',
        'Bianca',
        'Giorgio',
        'Takumi',
        'Mizuki',
        'Shashank (beta)',
        'Namratha (beta)',
        'Seoyeon',
        'Sumi (beta)',
        'Jina (beta)',
        'Himchan (beta)',
        'Minho (beta)',
        'Ameera',
        'Nurin',
        'Nijat',
        'Fuaad',
        'Vishnu (beta)',
        'Kirti (beta)',
        'Liv',
        'Ewa',
        'Maja',
        'Jacek',
        'Jan',
        'Cristiano',
        'Ines',
        'Abrielle (beta)',
        'Henriques (beta)',
        'Jeraldo (beta)',
        'Jacinda (beta)',
        'Camila',
        'Ricardo',
        'Vitoria',
        'Carmen',
        'Maxim',
        'Tatyana',
        'Natalia',
        'Miguel',
        'Linda',
        'Enrique',
        'Gabriela (beta)',
        'Lupe',
        'Penelope',
        'Mia',
        'Astrid',
        'Ganesh (beta)',
        'Shruti (beta)',
        'Vijay (beta)',
        'Samantha (beta)',
        'Natchaya (beta)',
        'Filiz',
        'Ulyana',
        'Lien (beta)',
        'Quan (beta)',
        'Mai (beta)',
        'Tuan (beta)',
        'Gwyneth',
        'Hamed (neural)',
        'Salma (neural)',
        'Shakir (neural)',
        'Zariyah (neural)',
        'Bashkar (neural)',
        'Tanishaa (neural)',
        'Borislav (neural)',
        'Kalina (neural)',
        'Alba (neural)',
        'Enric (neural)',
        'Joana (neural)',
        'Xiaochen (neural)',
        'Xiaohan (neural)',
        'Xiaomeng (neural)',
        'Xiaomo (neural)',
        'Xiaoqiu (neural)',
        'Xiaorou (neural)',
        'Xiaorui (neural)',
        'Xiaoxiao (neural)',
        'Xiaoyan (neural)',
        'Xiaoyi (neural)',
        'Xiaozhen (neural)',
        'Yunfeng (neural)',
        'Yunhao (neural)',
        'Yunjian (neural)',
        'Yunjie (neural)',
        'Yunxi (neural)',
        'Yunxia (neural)',
        'Yunyang (neural)',
        'Yunye (neural)',
        'Yunze (neural)',
        'HiuGaai (neural)',
        'HiuMaan (neural)',
        'HsiaoChen (neural)',
        'HsiaoYu (neural)',
        'WanLung (neural)',
        'YunJhe (neural)',
        'Gabrijela (neural)',
        'Srecko (neural)',
        'Antonin (neural)',
        'Vlasta (neural)',
        'Christel (neural)',
        'Jeppe (neural)',
        'Colette (neural)',
        'Fenna (neural)',
        'Maarten (neural)',
        'Amber (neural)',
        'Andrew (neural)',
        'Aria (neural)',
        'Ashley (neural)',
        'Ava (neural)',
        'Brandon (neural)',
        'Brian (neural)',
        'Christopher (neural)',
        'Cora (neural)',
        'Davis (neural)',
        'Elizabeth (neural)',
        'Emma (neural)',
        'Eric (neural)',
        'Guy (neural)',
        'Jacob (neural)',
        'Jane (neural)',
        'Jason (neural)',
        'Jenny (neural)',
        'Michelle (neural)',
        'Monica (neural)',
        'Nancy (neural)',
        'Roger (neural)',
        'Sara (neural)',
        'Steffan (neural)',
        'Tony (neural)',
        'Annette (neural)',
        'Carly (neural)',
        'Darren (neural)',
        'Duncan (neural)',
        'Elsie (neural)',
        'Freya (neural)',
        'Joanne (neural)',
        'Ken (neural)',
        'Kim (neural)',
        'Natasha (neural)',
        'Neil (neural)',
        'Tim (neural)',
        'Tina (neural)',
        'William (neural)',
        'Abbi (neural)',
        'Alfie (neural)',
        'Bella (neural)',
        'Elliot (neural)',
        'Ethan (neural)',
        'Hollie (neural)',
        'Libby (neural)',
        'Noah (neural)',
        'Oliver (neural)',
        'Olivia (neural)',
        'Ryan (neural)',
        'Sonia (neural)',
        'Thomas (neural)',
        'Clara (neural)',
        'Liam (neural)',
        'Neerja (neural)',
        'Prabhat (neural)',
        'Connor (neural)',
        'Emily (neural)',
        'Angelo (neural)',
        'Blessica (neural)',
        'Harri (neural)',
        'Noora (neural)',
        'Selma (neural)',
        'Alain (neural)',
        'Brigitte (neural)',
        'Celeste (neural)',
        'Claude (neural)',
        'Coralie (neural)',
        'Denise (neural)',
        'Henri (neural)',
        'Jacqueline (neural)',
        'Jerome (neural)',
        'Josephine (neural)',
        'Maurice (neural)',
        'Vivienne (neural)',
        'Yves (neural)',
        'Yvette (neural)',
        'Antoine (neural)',
        'Jean (neural)',
        'Sylvie (neural)',
        'Thierry (neural)',
        'Ariane (neural)',
        'Fabrice (neural)',
        'Amala (neural)',
        'Bernd (neural)',
        'Christoph (neural)',
        'Conrad (neural)',
        'Elke (neural)',
        'Kasper (neural)',
        'Katja (neural)',
        'Killian (neural)',
        'Klarissa (neural)',
        'Klaus (neural)',
        'Louisa (neural)',
        'Maja (neural)',
        'Ralf (neural)',
        'Seraphina (neural)',
        'Tanja (neural)',
        'Ingrid (neural)',
        'Jonas (neural)',
        'Jan (neural)',
        'Leni (neural)',
        'Athina (neural)',
        'Nestoras (neural)',
        'Dhwani (neural)',
        'Niranjan (neural)',
        'Avri (neural)',
        'Hila (neural)',
        'Madhur (neural)',
        'Swara (neural)',
        'Noemi (neural)',
        'Tamas (neural)',
        'Gudrun (neural)',
        'Gunnar (neural)',
        'Ardi (neural)',
        'Gadis (neural)',
        'Benigno (neural)',
        'Calimero (neural)',
        'Cataldo (neural)',
        'Diego (neural)',
        'Elsa (neural)',
        'Fabiola (neural)',
        'Fiamma (neural)',
        'Gianni (neural)',
        'Giuseppe (neural)',
        'Imelda (neural)',
        'Irma (neural)',
        'Isabella (neural)',
        'Lisandro (neural)',
        'Palmira (neural)',
        'Pierina (neural)',
        'Rinaldo (neural)',
        'Aoi (neural)',
        'Daichi (neural)',
        'Keita (neural)',
        'Mayu (neural)',
        'Nanami (neural)',
        'Naoki (neural)',
        'Shiori (neural)',
        'Gagan (neural)',
        'Sapna (neural)',
        'BongJin (neural)',
        'GookMin (neural)',
        'Hyunsu (neural)',
        'InJoon (neural)',
        'JiMin (neural)',
        'SeoHyeon (neural)',
        'SoonBok (neural)',
        'SunHi (neural)',
        'YuJin (neural)',
        'Osman (neural)',
        'Yasmin (neural)',
        'Midhun (neural)',
        'Sobhana (neural)',
        'Finn (neural)',
        'Iselin (neural)',
        'Pernille (neural)',
        'Agnieszka (neural)',
        'Marek (neural)',
        'Zofia (neural)',
        'Duarte (neural)',
        'Fernanda (neural)',
        'Raquel (neural)',
        'Antonio (neural)',
        'Brenda (neural)',
        'Donato (neural)',
        'Elza (neural)',
        'Fabio (neural)',
        'Francisca (neural)',
        'Giovanna (neural)',
        'Humberto (neural)',
        'Julio (neural)',
        'Leila (neural)',
        'Leticia (neural)',
        'Manuela (neural)',
        'Nicolau (neural)',
        'Thalita (neural)',
        'Valerio (neural)',
        'Yara (neural)',
        'Alina (neural)',
        'Emil (neural)',
        'Dariya (neural)',
        'Dmitry (neural)',
        'Svetlana (neural)',
        'Lukas (neural)',
        'Viktoria (neural)',
        'Petra (neural)',
        'Rok (neural)',
        'Abril (neural)',
        'Alonso (neural)',
        'Alvaro (neural)',
        'Arnau (neural)',
        'Dario (neural)',
        'Elias (neural)',
        'Elvira (neural)',
        'Estrella (neural)',
        'Irene (neural)',
        'Laia (neural)',
        'Lia (neural)',
        'Nil (neural)',
        'Paloma (neural)',
        'Saul (neural)',
        'Teo (neural)',
        'Triana (neural)',
        'Vera (neural)',
        'Ximena (neural)',
        'Beatriz (neural)',
        'Candela (neural)',
        'Carlota (neural)',
        'Cecilio (neural)',
        'Dalia (neural)',
        'Gerardo (neural)',
        'Jorge (neural)',
        'Larissa (neural)',
        'Liberto (neural)',
        'Luciano (neural)',
        'Marina (neural)',
        'Nuria (neural)',
        'Pelayo (neural)',
        'Renata (neural)',
        'Yago (neural)',
        'Hillevi (neural)',
        'Mattias (neural)',
        'Sofie (neural)',
        'Pallavi (neural)',
        'Valluvar (neural)',
        'Mohan (neural)',
        'Shruti (neural)',
        'Achara (neural)',
        'Niwat (neural)',
        'Premwadee (neural)',
        'Ahmet (neural)',
        'Emel (neural)',
        'Ostap (neural)',
        'Polina (neural)',
        'HoaiMy (neural)',
        'NamMinh (neural)',
        'Aled (neural)',
        'Nia (neural)',
        'Mouna (neural)',
        'Jamal (neural)',
        'Uzma (neural)',
        'Asad (neural)',
    ];

    private string $value;

    public function __construct(string $value)
    {
        if (!\in_array($value, self::ALLOWED_VALUES)) {
            throw new InvalidArgumentException(
                sprintf(
                    'Invalid value: %s, allowed values: %s',
                    $value,
                    implode(', ', self::ALLOWED_VALUES)
                )
            );
        }

        $this->value = $value;
    }

    public static function ZEINA(): CallVoice
    {
        return new self('Zeina');
    }

    public static function AISHA__BETA(): CallVoice
    {
        return new self('Aisha (beta)');
    }

    public static function FAROOQ__BETA(): CallVoice
    {
        return new self('Farooq (beta)');
    }

    public static function HUSSEIN__BETA(): CallVoice
    {
        return new self('Hussein (beta)');
    }

    public static function AMAL__BETA(): CallVoice
    {
        return new self('Amal (beta)');
    }

    public static function SAYAN__BETA(): CallVoice
    {
        return new self('Sayan (beta)');
    }

    public static function SUSHMITA__BETA(): CallVoice
    {
        return new self('Sushmita (beta)');
    }

    public static function DARINA(): CallVoice
    {
        return new self('Darina');
    }

    public static function CONCHITA(): CallVoice
    {
        return new self('Conchita');
    }

    public static function ZHIYU(): CallVoice
    {
        return new self('Zhiyu');
    }

    public static function LIU__BETA(): CallVoice
    {
        return new self('Liu (beta)');
    }

    public static function WANG__BETA(): CallVoice
    {
        return new self('Wang (beta)');
    }

    public static function ZHANG__BETA(): CallVoice
    {
        return new self('Zhang (beta)');
    }

    public static function LIN__BETA(): CallVoice
    {
        return new self('Lin (beta)');
    }

    public static function AKEMI__BETA(): CallVoice
    {
        return new self('Akemi (beta)');
    }

    public static function CHEN__BETA(): CallVoice
    {
        return new self('Chen (beta)');
    }

    public static function HUANG__BETA(): CallVoice
    {
        return new self('Huang (beta)');
    }

    public static function FANG(): CallVoice
    {
        return new self('Fang');
    }

    public static function CHAO(): CallVoice
    {
        return new self('Chao');
    }

    public static function MING(): CallVoice
    {
        return new self('Ming');
    }

    public static function ANETA(): CallVoice
    {
        return new self('Aneta');
    }

    public static function NAJA(): CallVoice
    {
        return new self('Naja');
    }

    public static function MADS(): CallVoice
    {
        return new self('Mads');
    }

    public static function RUBEN(): CallVoice
    {
        return new self('Ruben');
    }

    public static function LOTTE(): CallVoice
    {
        return new self('Lotte');
    }

    public static function JOANNA(): CallVoice
    {
        return new self('Joanna');
    }

    public static function IVY(): CallVoice
    {
        return new self('Ivy');
    }

    public static function KENDRA(): CallVoice
    {
        return new self('Kendra');
    }

    public static function KIMBERLY(): CallVoice
    {
        return new self('Kimberly');
    }

    public static function SALLI(): CallVoice
    {
        return new self('Salli');
    }

    public static function JOEY(): CallVoice
    {
        return new self('Joey');
    }

    public static function JUSTIN(): CallVoice
    {
        return new self('Justin');
    }

    public static function MATTHEW(): CallVoice
    {
        return new self('Matthew');
    }

    public static function RUSSELL(): CallVoice
    {
        return new self('Russell');
    }

    public static function NICOLE(): CallVoice
    {
        return new self('Nicole');
    }

    public static function BRIAN(): CallVoice
    {
        return new self('Brian');
    }

    public static function AMY(): CallVoice
    {
        return new self('Amy');
    }

    public static function EMMA(): CallVoice
    {
        return new self('Emma');
    }

    public static function ADITI(): CallVoice
    {
        return new self('Aditi');
    }

    public static function RAVEENA(): CallVoice
    {
        return new self('Raveena');
    }

    public static function GERAINT(): CallVoice
    {
        return new self('Geraint');
    }

    public static function EVELIN__BETA(): CallVoice
    {
        return new self('Evelin (beta)');
    }

    public static function CELINE(): CallVoice
    {
        return new self('Celine');
    }

    public static function LEA(): CallVoice
    {
        return new self('Lea');
    }

    public static function MATHIEU(): CallVoice
    {
        return new self('Mathieu');
    }

    public static function CHANTAL(): CallVoice
    {
        return new self('Chantal');
    }

    public static function VICKI(): CallVoice
    {
        return new self('Vicki');
    }

    public static function HANS(): CallVoice
    {
        return new self('Hans');
    }

    public static function MARLENE(): CallVoice
    {
        return new self('Marlene');
    }

    public static function SOPHIA__BETA(): CallVoice
    {
        return new self('Sophia (beta)');
    }

    public static function DINESH__BETA(): CallVoice
    {
        return new self('Dinesh (beta)');
    }

    public static function LEELA__BETA(): CallVoice
    {
        return new self('Leela (beta)');
    }

    public static function ABIGAIL(): CallVoice
    {
        return new self('Abigail');
    }

    public static function MEIRA(): CallVoice
    {
        return new self('Meira');
    }

    public static function IDAN(): CallVoice
    {
        return new self('Idan');
    }

    public static function YOSEF(): CallVoice
    {
        return new self('Yosef');
    }

    public static function AADITA(): CallVoice
    {
        return new self('Aadita');
    }

    public static function AARUSHI__BETA(): CallVoice
    {
        return new self('Aarushi (beta)');
    }

    public static function AKASH__BETA(): CallVoice
    {
        return new self('Akash (beta)');
    }

    public static function DAMAN__BETA(): CallVoice
    {
        return new self('Daman (beta)');
    }

    public static function DIVYA__BETA(): CallVoice
    {
        return new self('Divya (beta)');
    }

    public static function AGOTA(): CallVoice
    {
        return new self('Agota');
    }

    public static function DORA(): CallVoice
    {
        return new self('Dora');
    }

    public static function KARL(): CallVoice
    {
        return new self('Karl');
    }

    public static function INDAH__BETA(): CallVoice
    {
        return new self('Indah (beta)');
    }

    public static function ARIF__BETA(): CallVoice
    {
        return new self('Arif (beta)');
    }

    public static function REZA__BETA(): CallVoice
    {
        return new self('Reza (beta)');
    }

    public static function NURUL__BETA(): CallVoice
    {
        return new self('Nurul (beta)');
    }

    public static function GIANNA__BETA(): CallVoice
    {
        return new self('Gianna (beta)');
    }

    public static function CARLA(): CallVoice
    {
        return new self('Carla');
    }

    public static function BIANCA(): CallVoice
    {
        return new self('Bianca');
    }

    public static function GIORGIO(): CallVoice
    {
        return new self('Giorgio');
    }

    public static function TAKUMI(): CallVoice
    {
        return new self('Takumi');
    }

    public static function MIZUKI(): CallVoice
    {
        return new self('Mizuki');
    }

    public static function SHASHANK__BETA(): CallVoice
    {
        return new self('Shashank (beta)');
    }

    public static function NAMRATHA__BETA(): CallVoice
    {
        return new self('Namratha (beta)');
    }

    public static function SEOYEON(): CallVoice
    {
        return new self('Seoyeon');
    }

    public static function SUMI__BETA(): CallVoice
    {
        return new self('Sumi (beta)');
    }

    public static function JINA__BETA(): CallVoice
    {
        return new self('Jina (beta)');
    }

    public static function HIMCHAN__BETA(): CallVoice
    {
        return new self('Himchan (beta)');
    }

    public static function MINHO__BETA(): CallVoice
    {
        return new self('Minho (beta)');
    }

    public static function AMEERA(): CallVoice
    {
        return new self('Ameera');
    }

    public static function NURIN(): CallVoice
    {
        return new self('Nurin');
    }

    public static function NIJAT(): CallVoice
    {
        return new self('Nijat');
    }

    public static function FUAAD(): CallVoice
    {
        return new self('Fuaad');
    }

    public static function VISHNU__BETA(): CallVoice
    {
        return new self('Vishnu (beta)');
    }

    public static function KIRTI__BETA(): CallVoice
    {
        return new self('Kirti (beta)');
    }

    public static function LIV(): CallVoice
    {
        return new self('Liv');
    }

    public static function EWA(): CallVoice
    {
        return new self('Ewa');
    }

    public static function MAJA(): CallVoice
    {
        return new self('Maja');
    }

    public static function JACEK(): CallVoice
    {
        return new self('Jacek');
    }

    public static function JAN(): CallVoice
    {
        return new self('Jan');
    }

    public static function CRISTIANO(): CallVoice
    {
        return new self('Cristiano');
    }

    public static function INES(): CallVoice
    {
        return new self('Ines');
    }

    public static function ABRIELLE__BETA(): CallVoice
    {
        return new self('Abrielle (beta)');
    }

    public static function HENRIQUES__BETA(): CallVoice
    {
        return new self('Henriques (beta)');
    }

    public static function JERALDO__BETA(): CallVoice
    {
        return new self('Jeraldo (beta)');
    }

    public static function JACINDA__BETA(): CallVoice
    {
        return new self('Jacinda (beta)');
    }

    public static function CAMILA(): CallVoice
    {
        return new self('Camila');
    }

    public static function RICARDO(): CallVoice
    {
        return new self('Ricardo');
    }

    public static function VITORIA(): CallVoice
    {
        return new self('Vitoria');
    }

    public static function CARMEN(): CallVoice
    {
        return new self('Carmen');
    }

    public static function MAXIM(): CallVoice
    {
        return new self('Maxim');
    }

    public static function TATYANA(): CallVoice
    {
        return new self('Tatyana');
    }

    public static function NATALIA(): CallVoice
    {
        return new self('Natalia');
    }

    public static function MIGUEL(): CallVoice
    {
        return new self('Miguel');
    }

    public static function LINDA(): CallVoice
    {
        return new self('Linda');
    }

    public static function ENRIQUE(): CallVoice
    {
        return new self('Enrique');
    }

    public static function GABRIELA__BETA(): CallVoice
    {
        return new self('Gabriela (beta)');
    }

    public static function LUPE(): CallVoice
    {
        return new self('Lupe');
    }

    public static function PENELOPE(): CallVoice
    {
        return new self('Penelope');
    }

    public static function MIA(): CallVoice
    {
        return new self('Mia');
    }

    public static function ASTRID(): CallVoice
    {
        return new self('Astrid');
    }

    public static function GANESH__BETA(): CallVoice
    {
        return new self('Ganesh (beta)');
    }

    public static function SHRUTI__BETA(): CallVoice
    {
        return new self('Shruti (beta)');
    }

    public static function VIJAY__BETA(): CallVoice
    {
        return new self('Vijay (beta)');
    }

    public static function SAMANTHA__BETA(): CallVoice
    {
        return new self('Samantha (beta)');
    }

    public static function NATCHAYA__BETA(): CallVoice
    {
        return new self('Natchaya (beta)');
    }

    public static function FILIZ(): CallVoice
    {
        return new self('Filiz');
    }

    public static function ULYANA(): CallVoice
    {
        return new self('Ulyana');
    }

    public static function LIEN__BETA(): CallVoice
    {
        return new self('Lien (beta)');
    }

    public static function QUAN__BETA(): CallVoice
    {
        return new self('Quan (beta)');
    }

    public static function MAI__BETA(): CallVoice
    {
        return new self('Mai (beta)');
    }

    public static function TUAN__BETA(): CallVoice
    {
        return new self('Tuan (beta)');
    }

    public static function GWYNETH(): CallVoice
    {
        return new self('Gwyneth');
    }

    public static function HAMED__NEURAL(): CallVoice
    {
        return new self('Hamed (neural)');
    }

    public static function SALMA__NEURAL(): CallVoice
    {
        return new self('Salma (neural)');
    }

    public static function SHAKIR__NEURAL(): CallVoice
    {
        return new self('Shakir (neural)');
    }

    public static function ZARIYAH__NEURAL(): CallVoice
    {
        return new self('Zariyah (neural)');
    }

    public static function BASHKAR__NEURAL(): CallVoice
    {
        return new self('Bashkar (neural)');
    }

    public static function TANISHAA__NEURAL(): CallVoice
    {
        return new self('Tanishaa (neural)');
    }

    public static function BORISLAV__NEURAL(): CallVoice
    {
        return new self('Borislav (neural)');
    }

    public static function KALINA__NEURAL(): CallVoice
    {
        return new self('Kalina (neural)');
    }

    public static function ALBA__NEURAL(): CallVoice
    {
        return new self('Alba (neural)');
    }

    public static function ENRIC__NEURAL(): CallVoice
    {
        return new self('Enric (neural)');
    }

    public static function JOANA__NEURAL(): CallVoice
    {
        return new self('Joana (neural)');
    }

    public static function XIAOCHEN__NEURAL(): CallVoice
    {
        return new self('Xiaochen (neural)');
    }

    public static function XIAOHAN__NEURAL(): CallVoice
    {
        return new self('Xiaohan (neural)');
    }

    public static function XIAOMENG__NEURAL(): CallVoice
    {
        return new self('Xiaomeng (neural)');
    }

    public static function XIAOMO__NEURAL(): CallVoice
    {
        return new self('Xiaomo (neural)');
    }

    public static function XIAOQIU__NEURAL(): CallVoice
    {
        return new self('Xiaoqiu (neural)');
    }

    public static function XIAOROU__NEURAL(): CallVoice
    {
        return new self('Xiaorou (neural)');
    }

    public static function XIAORUI__NEURAL(): CallVoice
    {
        return new self('Xiaorui (neural)');
    }

    public static function XIAOXIAO__NEURAL(): CallVoice
    {
        return new self('Xiaoxiao (neural)');
    }

    public static function XIAOYAN__NEURAL(): CallVoice
    {
        return new self('Xiaoyan (neural)');
    }

    public static function XIAOYI__NEURAL(): CallVoice
    {
        return new self('Xiaoyi (neural)');
    }

    public static function XIAOZHEN__NEURAL(): CallVoice
    {
        return new self('Xiaozhen (neural)');
    }

    public static function YUNFENG__NEURAL(): CallVoice
    {
        return new self('Yunfeng (neural)');
    }

    public static function YUNHAO__NEURAL(): CallVoice
    {
        return new self('Yunhao (neural)');
    }

    public static function YUNJIAN__NEURAL(): CallVoice
    {
        return new self('Yunjian (neural)');
    }

    public static function YUNJIE__NEURAL(): CallVoice
    {
        return new self('Yunjie (neural)');
    }

    public static function YUNXI__NEURAL(): CallVoice
    {
        return new self('Yunxi (neural)');
    }

    public static function YUNXIA__NEURAL(): CallVoice
    {
        return new self('Yunxia (neural)');
    }

    public static function YUNYANG__NEURAL(): CallVoice
    {
        return new self('Yunyang (neural)');
    }

    public static function YUNYE__NEURAL(): CallVoice
    {
        return new self('Yunye (neural)');
    }

    public static function YUNZE__NEURAL(): CallVoice
    {
        return new self('Yunze (neural)');
    }

    public static function HIU_GAAI__NEURAL(): CallVoice
    {
        return new self('HiuGaai (neural)');
    }

    public static function HIU_MAAN__NEURAL(): CallVoice
    {
        return new self('HiuMaan (neural)');
    }

    public static function HSIAO_CHEN__NEURAL(): CallVoice
    {
        return new self('HsiaoChen (neural)');
    }

    public static function HSIAO_YU__NEURAL(): CallVoice
    {
        return new self('HsiaoYu (neural)');
    }

    public static function WAN_LUNG__NEURAL(): CallVoice
    {
        return new self('WanLung (neural)');
    }

    public static function YUN_JHE__NEURAL(): CallVoice
    {
        return new self('YunJhe (neural)');
    }

    public static function GABRIJELA__NEURAL(): CallVoice
    {
        return new self('Gabrijela (neural)');
    }

    public static function SRECKO__NEURAL(): CallVoice
    {
        return new self('Srecko (neural)');
    }

    public static function ANTONIN__NEURAL(): CallVoice
    {
        return new self('Antonin (neural)');
    }

    public static function VLASTA__NEURAL(): CallVoice
    {
        return new self('Vlasta (neural)');
    }

    public static function CHRISTEL__NEURAL(): CallVoice
    {
        return new self('Christel (neural)');
    }

    public static function JEPPE__NEURAL(): CallVoice
    {
        return new self('Jeppe (neural)');
    }

    public static function COLETTE__NEURAL(): CallVoice
    {
        return new self('Colette (neural)');
    }

    public static function FENNA__NEURAL(): CallVoice
    {
        return new self('Fenna (neural)');
    }

    public static function MAARTEN__NEURAL(): CallVoice
    {
        return new self('Maarten (neural)');
    }

    public static function AMBER__NEURAL(): CallVoice
    {
        return new self('Amber (neural)');
    }

    public static function ANDREW__NEURAL(): CallVoice
    {
        return new self('Andrew (neural)');
    }

    public static function ARIA__NEURAL(): CallVoice
    {
        return new self('Aria (neural)');
    }

    public static function ASHLEY__NEURAL(): CallVoice
    {
        return new self('Ashley (neural)');
    }

    public static function AVA__NEURAL(): CallVoice
    {
        return new self('Ava (neural)');
    }

    public static function BRANDON__NEURAL(): CallVoice
    {
        return new self('Brandon (neural)');
    }

    public static function BRIAN__NEURAL(): CallVoice
    {
        return new self('Brian (neural)');
    }

    public static function CHRISTOPHER__NEURAL(): CallVoice
    {
        return new self('Christopher (neural)');
    }

    public static function CORA__NEURAL(): CallVoice
    {
        return new self('Cora (neural)');
    }

    public static function DAVIS__NEURAL(): CallVoice
    {
        return new self('Davis (neural)');
    }

    public static function ELIZABETH__NEURAL(): CallVoice
    {
        return new self('Elizabeth (neural)');
    }

    public static function EMMA__NEURAL(): CallVoice
    {
        return new self('Emma (neural)');
    }

    public static function ERIC__NEURAL(): CallVoice
    {
        return new self('Eric (neural)');
    }

    public static function GUY__NEURAL(): CallVoice
    {
        return new self('Guy (neural)');
    }

    public static function JACOB__NEURAL(): CallVoice
    {
        return new self('Jacob (neural)');
    }

    public static function JANE__NEURAL(): CallVoice
    {
        return new self('Jane (neural)');
    }

    public static function JASON__NEURAL(): CallVoice
    {
        return new self('Jason (neural)');
    }

    public static function JENNY__NEURAL(): CallVoice
    {
        return new self('Jenny (neural)');
    }

    public static function MICHELLE__NEURAL(): CallVoice
    {
        return new self('Michelle (neural)');
    }

    public static function MONICA__NEURAL(): CallVoice
    {
        return new self('Monica (neural)');
    }

    public static function NANCY__NEURAL(): CallVoice
    {
        return new self('Nancy (neural)');
    }

    public static function ROGER__NEURAL(): CallVoice
    {
        return new self('Roger (neural)');
    }

    public static function SARA__NEURAL(): CallVoice
    {
        return new self('Sara (neural)');
    }

    public static function STEFFAN__NEURAL(): CallVoice
    {
        return new self('Steffan (neural)');
    }

    public static function TONY__NEURAL(): CallVoice
    {
        return new self('Tony (neural)');
    }

    public static function ANNETTE__NEURAL(): CallVoice
    {
        return new self('Annette (neural)');
    }

    public static function CARLY__NEURAL(): CallVoice
    {
        return new self('Carly (neural)');
    }

    public static function DARREN__NEURAL(): CallVoice
    {
        return new self('Darren (neural)');
    }

    public static function DUNCAN__NEURAL(): CallVoice
    {
        return new self('Duncan (neural)');
    }

    public static function ELSIE__NEURAL(): CallVoice
    {
        return new self('Elsie (neural)');
    }

    public static function FREYA__NEURAL(): CallVoice
    {
        return new self('Freya (neural)');
    }

    public static function JOANNE__NEURAL(): CallVoice
    {
        return new self('Joanne (neural)');
    }

    public static function KEN__NEURAL(): CallVoice
    {
        return new self('Ken (neural)');
    }

    public static function KIM__NEURAL(): CallVoice
    {
        return new self('Kim (neural)');
    }

    public static function NATASHA__NEURAL(): CallVoice
    {
        return new self('Natasha (neural)');
    }

    public static function NEIL__NEURAL(): CallVoice
    {
        return new self('Neil (neural)');
    }

    public static function TIM__NEURAL(): CallVoice
    {
        return new self('Tim (neural)');
    }

    public static function TINA__NEURAL(): CallVoice
    {
        return new self('Tina (neural)');
    }

    public static function WILLIAM__NEURAL(): CallVoice
    {
        return new self('William (neural)');
    }

    public static function ABBI__NEURAL(): CallVoice
    {
        return new self('Abbi (neural)');
    }

    public static function ALFIE__NEURAL(): CallVoice
    {
        return new self('Alfie (neural)');
    }

    public static function BELLA__NEURAL(): CallVoice
    {
        return new self('Bella (neural)');
    }

    public static function ELLIOT__NEURAL(): CallVoice
    {
        return new self('Elliot (neural)');
    }

    public static function ETHAN__NEURAL(): CallVoice
    {
        return new self('Ethan (neural)');
    }

    public static function HOLLIE__NEURAL(): CallVoice
    {
        return new self('Hollie (neural)');
    }

    public static function LIBBY__NEURAL(): CallVoice
    {
        return new self('Libby (neural)');
    }

    public static function NOAH__NEURAL(): CallVoice
    {
        return new self('Noah (neural)');
    }

    public static function OLIVER__NEURAL(): CallVoice
    {
        return new self('Oliver (neural)');
    }

    public static function OLIVIA__NEURAL(): CallVoice
    {
        return new self('Olivia (neural)');
    }

    public static function RYAN__NEURAL(): CallVoice
    {
        return new self('Ryan (neural)');
    }

    public static function SONIA__NEURAL(): CallVoice
    {
        return new self('Sonia (neural)');
    }

    public static function THOMAS__NEURAL(): CallVoice
    {
        return new self('Thomas (neural)');
    }

    public static function CLARA__NEURAL(): CallVoice
    {
        return new self('Clara (neural)');
    }

    public static function LIAM__NEURAL(): CallVoice
    {
        return new self('Liam (neural)');
    }

    public static function NEERJA__NEURAL(): CallVoice
    {
        return new self('Neerja (neural)');
    }

    public static function PRABHAT__NEURAL(): CallVoice
    {
        return new self('Prabhat (neural)');
    }

    public static function CONNOR__NEURAL(): CallVoice
    {
        return new self('Connor (neural)');
    }

    public static function EMILY__NEURAL(): CallVoice
    {
        return new self('Emily (neural)');
    }

    public static function ANGELO__NEURAL(): CallVoice
    {
        return new self('Angelo (neural)');
    }

    public static function BLESSICA__NEURAL(): CallVoice
    {
        return new self('Blessica (neural)');
    }

    public static function HARRI__NEURAL(): CallVoice
    {
        return new self('Harri (neural)');
    }

    public static function NOORA__NEURAL(): CallVoice
    {
        return new self('Noora (neural)');
    }

    public static function SELMA__NEURAL(): CallVoice
    {
        return new self('Selma (neural)');
    }

    public static function ALAIN__NEURAL(): CallVoice
    {
        return new self('Alain (neural)');
    }

    public static function BRIGITTE__NEURAL(): CallVoice
    {
        return new self('Brigitte (neural)');
    }

    public static function CELESTE__NEURAL(): CallVoice
    {
        return new self('Celeste (neural)');
    }

    public static function CLAUDE__NEURAL(): CallVoice
    {
        return new self('Claude (neural)');
    }

    public static function CORALIE__NEURAL(): CallVoice
    {
        return new self('Coralie (neural)');
    }

    public static function DENISE__NEURAL(): CallVoice
    {
        return new self('Denise (neural)');
    }

    public static function HENRI__NEURAL(): CallVoice
    {
        return new self('Henri (neural)');
    }

    public static function JACQUELINE__NEURAL(): CallVoice
    {
        return new self('Jacqueline (neural)');
    }

    public static function JEROME__NEURAL(): CallVoice
    {
        return new self('Jerome (neural)');
    }

    public static function JOSEPHINE__NEURAL(): CallVoice
    {
        return new self('Josephine (neural)');
    }

    public static function MAURICE__NEURAL(): CallVoice
    {
        return new self('Maurice (neural)');
    }

    public static function VIVIENNE__NEURAL(): CallVoice
    {
        return new self('Vivienne (neural)');
    }

    public static function YVES__NEURAL(): CallVoice
    {
        return new self('Yves (neural)');
    }

    public static function YVETTE__NEURAL(): CallVoice
    {
        return new self('Yvette (neural)');
    }

    public static function ANTOINE__NEURAL(): CallVoice
    {
        return new self('Antoine (neural)');
    }

    public static function JEAN__NEURAL(): CallVoice
    {
        return new self('Jean (neural)');
    }

    public static function SYLVIE__NEURAL(): CallVoice
    {
        return new self('Sylvie (neural)');
    }

    public static function THIERRY__NEURAL(): CallVoice
    {
        return new self('Thierry (neural)');
    }

    public static function ARIANE__NEURAL(): CallVoice
    {
        return new self('Ariane (neural)');
    }

    public static function FABRICE__NEURAL(): CallVoice
    {
        return new self('Fabrice (neural)');
    }

    public static function AMALA__NEURAL(): CallVoice
    {
        return new self('Amala (neural)');
    }

    public static function BERND__NEURAL(): CallVoice
    {
        return new self('Bernd (neural)');
    }

    public static function CHRISTOPH__NEURAL(): CallVoice
    {
        return new self('Christoph (neural)');
    }

    public static function CONRAD__NEURAL(): CallVoice
    {
        return new self('Conrad (neural)');
    }

    public static function ELKE__NEURAL(): CallVoice
    {
        return new self('Elke (neural)');
    }

    public static function KASPER__NEURAL(): CallVoice
    {
        return new self('Kasper (neural)');
    }

    public static function KATJA__NEURAL(): CallVoice
    {
        return new self('Katja (neural)');
    }

    public static function KILLIAN__NEURAL(): CallVoice
    {
        return new self('Killian (neural)');
    }

    public static function KLARISSA__NEURAL(): CallVoice
    {
        return new self('Klarissa (neural)');
    }

    public static function KLAUS__NEURAL(): CallVoice
    {
        return new self('Klaus (neural)');
    }

    public static function LOUISA__NEURAL(): CallVoice
    {
        return new self('Louisa (neural)');
    }

    public static function MAJA__NEURAL(): CallVoice
    {
        return new self('Maja (neural)');
    }

    public static function RALF__NEURAL(): CallVoice
    {
        return new self('Ralf (neural)');
    }

    public static function SERAPHINA__NEURAL(): CallVoice
    {
        return new self('Seraphina (neural)');
    }

    public static function TANJA__NEURAL(): CallVoice
    {
        return new self('Tanja (neural)');
    }

    public static function INGRID__NEURAL(): CallVoice
    {
        return new self('Ingrid (neural)');
    }

    public static function JONAS__NEURAL(): CallVoice
    {
        return new self('Jonas (neural)');
    }

    public static function JAN__NEURAL(): CallVoice
    {
        return new self('Jan (neural)');
    }

    public static function LENI__NEURAL(): CallVoice
    {
        return new self('Leni (neural)');
    }

    public static function ATHINA__NEURAL(): CallVoice
    {
        return new self('Athina (neural)');
    }

    public static function NESTORAS__NEURAL(): CallVoice
    {
        return new self('Nestoras (neural)');
    }

    public static function DHWANI__NEURAL(): CallVoice
    {
        return new self('Dhwani (neural)');
    }

    public static function NIRANJAN__NEURAL(): CallVoice
    {
        return new self('Niranjan (neural)');
    }

    public static function AVRI__NEURAL(): CallVoice
    {
        return new self('Avri (neural)');
    }

    public static function HILA__NEURAL(): CallVoice
    {
        return new self('Hila (neural)');
    }

    public static function MADHUR__NEURAL(): CallVoice
    {
        return new self('Madhur (neural)');
    }

    public static function SWARA__NEURAL(): CallVoice
    {
        return new self('Swara (neural)');
    }

    public static function NOEMI__NEURAL(): CallVoice
    {
        return new self('Noemi (neural)');
    }

    public static function TAMAS__NEURAL(): CallVoice
    {
        return new self('Tamas (neural)');
    }

    public static function GUDRUN__NEURAL(): CallVoice
    {
        return new self('Gudrun (neural)');
    }

    public static function GUNNAR__NEURAL(): CallVoice
    {
        return new self('Gunnar (neural)');
    }

    public static function ARDI__NEURAL(): CallVoice
    {
        return new self('Ardi (neural)');
    }

    public static function GADIS__NEURAL(): CallVoice
    {
        return new self('Gadis (neural)');
    }

    public static function BENIGNO__NEURAL(): CallVoice
    {
        return new self('Benigno (neural)');
    }

    public static function CALIMERO__NEURAL(): CallVoice
    {
        return new self('Calimero (neural)');
    }

    public static function CATALDO__NEURAL(): CallVoice
    {
        return new self('Cataldo (neural)');
    }

    public static function DIEGO__NEURAL(): CallVoice
    {
        return new self('Diego (neural)');
    }

    public static function ELSA__NEURAL(): CallVoice
    {
        return new self('Elsa (neural)');
    }

    public static function FABIOLA__NEURAL(): CallVoice
    {
        return new self('Fabiola (neural)');
    }

    public static function FIAMMA__NEURAL(): CallVoice
    {
        return new self('Fiamma (neural)');
    }

    public static function GIANNI__NEURAL(): CallVoice
    {
        return new self('Gianni (neural)');
    }

    public static function GIUSEPPE__NEURAL(): CallVoice
    {
        return new self('Giuseppe (neural)');
    }

    public static function IMELDA__NEURAL(): CallVoice
    {
        return new self('Imelda (neural)');
    }

    public static function IRMA__NEURAL(): CallVoice
    {
        return new self('Irma (neural)');
    }

    public static function ISABELLA__NEURAL(): CallVoice
    {
        return new self('Isabella (neural)');
    }

    public static function LISANDRO__NEURAL(): CallVoice
    {
        return new self('Lisandro (neural)');
    }

    public static function PALMIRA__NEURAL(): CallVoice
    {
        return new self('Palmira (neural)');
    }

    public static function PIERINA__NEURAL(): CallVoice
    {
        return new self('Pierina (neural)');
    }

    public static function RINALDO__NEURAL(): CallVoice
    {
        return new self('Rinaldo (neural)');
    }

    public static function AOI__NEURAL(): CallVoice
    {
        return new self('Aoi (neural)');
    }

    public static function DAICHI__NEURAL(): CallVoice
    {
        return new self('Daichi (neural)');
    }

    public static function KEITA__NEURAL(): CallVoice
    {
        return new self('Keita (neural)');
    }

    public static function MAYU__NEURAL(): CallVoice
    {
        return new self('Mayu (neural)');
    }

    public static function NANAMI__NEURAL(): CallVoice
    {
        return new self('Nanami (neural)');
    }

    public static function NAOKI__NEURAL(): CallVoice
    {
        return new self('Naoki (neural)');
    }

    public static function SHIORI__NEURAL(): CallVoice
    {
        return new self('Shiori (neural)');
    }

    public static function GAGAN__NEURAL(): CallVoice
    {
        return new self('Gagan (neural)');
    }

    public static function SAPNA__NEURAL(): CallVoice
    {
        return new self('Sapna (neural)');
    }

    public static function BONG_JIN__NEURAL(): CallVoice
    {
        return new self('BongJin (neural)');
    }

    public static function GOOK_MIN__NEURAL(): CallVoice
    {
        return new self('GookMin (neural)');
    }

    public static function HYUNSU__NEURAL(): CallVoice
    {
        return new self('Hyunsu (neural)');
    }

    public static function IN_JOON__NEURAL(): CallVoice
    {
        return new self('InJoon (neural)');
    }

    public static function JI_MIN__NEURAL(): CallVoice
    {
        return new self('JiMin (neural)');
    }

    public static function SEO_HYEON__NEURAL(): CallVoice
    {
        return new self('SeoHyeon (neural)');
    }

    public static function SOON_BOK__NEURAL(): CallVoice
    {
        return new self('SoonBok (neural)');
    }

    public static function SUN_HI__NEURAL(): CallVoice
    {
        return new self('SunHi (neural)');
    }

    public static function YU_JIN__NEURAL(): CallVoice
    {
        return new self('YuJin (neural)');
    }

    public static function OSMAN__NEURAL(): CallVoice
    {
        return new self('Osman (neural)');
    }

    public static function YASMIN__NEURAL(): CallVoice
    {
        return new self('Yasmin (neural)');
    }

    public static function MIDHUN__NEURAL(): CallVoice
    {
        return new self('Midhun (neural)');
    }

    public static function SOBHANA__NEURAL(): CallVoice
    {
        return new self('Sobhana (neural)');
    }

    public static function FINN__NEURAL(): CallVoice
    {
        return new self('Finn (neural)');
    }

    public static function ISELIN__NEURAL(): CallVoice
    {
        return new self('Iselin (neural)');
    }

    public static function PERNILLE__NEURAL(): CallVoice
    {
        return new self('Pernille (neural)');
    }

    public static function AGNIESZKA__NEURAL(): CallVoice
    {
        return new self('Agnieszka (neural)');
    }

    public static function MAREK__NEURAL(): CallVoice
    {
        return new self('Marek (neural)');
    }

    public static function ZOFIA__NEURAL(): CallVoice
    {
        return new self('Zofia (neural)');
    }

    public static function DUARTE__NEURAL(): CallVoice
    {
        return new self('Duarte (neural)');
    }

    public static function FERNANDA__NEURAL(): CallVoice
    {
        return new self('Fernanda (neural)');
    }

    public static function RAQUEL__NEURAL(): CallVoice
    {
        return new self('Raquel (neural)');
    }

    public static function ANTONIO__NEURAL(): CallVoice
    {
        return new self('Antonio (neural)');
    }

    public static function BRENDA__NEURAL(): CallVoice
    {
        return new self('Brenda (neural)');
    }

    public static function DONATO__NEURAL(): CallVoice
    {
        return new self('Donato (neural)');
    }

    public static function ELZA__NEURAL(): CallVoice
    {
        return new self('Elza (neural)');
    }

    public static function FABIO__NEURAL(): CallVoice
    {
        return new self('Fabio (neural)');
    }

    public static function FRANCISCA__NEURAL(): CallVoice
    {
        return new self('Francisca (neural)');
    }

    public static function GIOVANNA__NEURAL(): CallVoice
    {
        return new self('Giovanna (neural)');
    }

    public static function HUMBERTO__NEURAL(): CallVoice
    {
        return new self('Humberto (neural)');
    }

    public static function JULIO__NEURAL(): CallVoice
    {
        return new self('Julio (neural)');
    }

    public static function LEILA__NEURAL(): CallVoice
    {
        return new self('Leila (neural)');
    }

    public static function LETICIA__NEURAL(): CallVoice
    {
        return new self('Leticia (neural)');
    }

    public static function MANUELA__NEURAL(): CallVoice
    {
        return new self('Manuela (neural)');
    }

    public static function NICOLAU__NEURAL(): CallVoice
    {
        return new self('Nicolau (neural)');
    }

    public static function THALITA__NEURAL(): CallVoice
    {
        return new self('Thalita (neural)');
    }

    public static function VALERIO__NEURAL(): CallVoice
    {
        return new self('Valerio (neural)');
    }

    public static function YARA__NEURAL(): CallVoice
    {
        return new self('Yara (neural)');
    }

    public static function ALINA__NEURAL(): CallVoice
    {
        return new self('Alina (neural)');
    }

    public static function EMIL__NEURAL(): CallVoice
    {
        return new self('Emil (neural)');
    }

    public static function DARIYA__NEURAL(): CallVoice
    {
        return new self('Dariya (neural)');
    }

    public static function DMITRY__NEURAL(): CallVoice
    {
        return new self('Dmitry (neural)');
    }

    public static function SVETLANA__NEURAL(): CallVoice
    {
        return new self('Svetlana (neural)');
    }

    public static function LUKAS__NEURAL(): CallVoice
    {
        return new self('Lukas (neural)');
    }

    public static function VIKTORIA__NEURAL(): CallVoice
    {
        return new self('Viktoria (neural)');
    }

    public static function PETRA__NEURAL(): CallVoice
    {
        return new self('Petra (neural)');
    }

    public static function ROK__NEURAL(): CallVoice
    {
        return new self('Rok (neural)');
    }

    public static function ABRIL__NEURAL(): CallVoice
    {
        return new self('Abril (neural)');
    }

    public static function ALONSO__NEURAL(): CallVoice
    {
        return new self('Alonso (neural)');
    }

    public static function ALVARO__NEURAL(): CallVoice
    {
        return new self('Alvaro (neural)');
    }

    public static function ARNAU__NEURAL(): CallVoice
    {
        return new self('Arnau (neural)');
    }

    public static function DARIO__NEURAL(): CallVoice
    {
        return new self('Dario (neural)');
    }

    public static function ELIAS__NEURAL(): CallVoice
    {
        return new self('Elias (neural)');
    }

    public static function ELVIRA__NEURAL(): CallVoice
    {
        return new self('Elvira (neural)');
    }

    public static function ESTRELLA__NEURAL(): CallVoice
    {
        return new self('Estrella (neural)');
    }

    public static function IRENE__NEURAL(): CallVoice
    {
        return new self('Irene (neural)');
    }

    public static function LAIA__NEURAL(): CallVoice
    {
        return new self('Laia (neural)');
    }

    public static function LIA__NEURAL(): CallVoice
    {
        return new self('Lia (neural)');
    }

    public static function NIL__NEURAL(): CallVoice
    {
        return new self('Nil (neural)');
    }

    public static function PALOMA__NEURAL(): CallVoice
    {
        return new self('Paloma (neural)');
    }

    public static function SAUL__NEURAL(): CallVoice
    {
        return new self('Saul (neural)');
    }

    public static function TEO__NEURAL(): CallVoice
    {
        return new self('Teo (neural)');
    }

    public static function TRIANA__NEURAL(): CallVoice
    {
        return new self('Triana (neural)');
    }

    public static function VERA__NEURAL(): CallVoice
    {
        return new self('Vera (neural)');
    }

    public static function XIMENA__NEURAL(): CallVoice
    {
        return new self('Ximena (neural)');
    }

    public static function BEATRIZ__NEURAL(): CallVoice
    {
        return new self('Beatriz (neural)');
    }

    public static function CANDELA__NEURAL(): CallVoice
    {
        return new self('Candela (neural)');
    }

    public static function CARLOTA__NEURAL(): CallVoice
    {
        return new self('Carlota (neural)');
    }

    public static function CECILIO__NEURAL(): CallVoice
    {
        return new self('Cecilio (neural)');
    }

    public static function DALIA__NEURAL(): CallVoice
    {
        return new self('Dalia (neural)');
    }

    public static function GERARDO__NEURAL(): CallVoice
    {
        return new self('Gerardo (neural)');
    }

    public static function JORGE__NEURAL(): CallVoice
    {
        return new self('Jorge (neural)');
    }

    public static function LARISSA__NEURAL(): CallVoice
    {
        return new self('Larissa (neural)');
    }

    public static function LIBERTO__NEURAL(): CallVoice
    {
        return new self('Liberto (neural)');
    }

    public static function LUCIANO__NEURAL(): CallVoice
    {
        return new self('Luciano (neural)');
    }

    public static function MARINA__NEURAL(): CallVoice
    {
        return new self('Marina (neural)');
    }

    public static function NURIA__NEURAL(): CallVoice
    {
        return new self('Nuria (neural)');
    }

    public static function PELAYO__NEURAL(): CallVoice
    {
        return new self('Pelayo (neural)');
    }

    public static function RENATA__NEURAL(): CallVoice
    {
        return new self('Renata (neural)');
    }

    public static function YAGO__NEURAL(): CallVoice
    {
        return new self('Yago (neural)');
    }

    public static function HILLEVI__NEURAL(): CallVoice
    {
        return new self('Hillevi (neural)');
    }

    public static function MATTIAS__NEURAL(): CallVoice
    {
        return new self('Mattias (neural)');
    }

    public static function SOFIE__NEURAL(): CallVoice
    {
        return new self('Sofie (neural)');
    }

    public static function PALLAVI__NEURAL(): CallVoice
    {
        return new self('Pallavi (neural)');
    }

    public static function VALLUVAR__NEURAL(): CallVoice
    {
        return new self('Valluvar (neural)');
    }

    public static function MOHAN__NEURAL(): CallVoice
    {
        return new self('Mohan (neural)');
    }

    public static function SHRUTI__NEURAL(): CallVoice
    {
        return new self('Shruti (neural)');
    }

    public static function ACHARA__NEURAL(): CallVoice
    {
        return new self('Achara (neural)');
    }

    public static function NIWAT__NEURAL(): CallVoice
    {
        return new self('Niwat (neural)');
    }

    public static function PREMWADEE__NEURAL(): CallVoice
    {
        return new self('Premwadee (neural)');
    }

    public static function AHMET__NEURAL(): CallVoice
    {
        return new self('Ahmet (neural)');
    }

    public static function EMEL__NEURAL(): CallVoice
    {
        return new self('Emel (neural)');
    }

    public static function OSTAP__NEURAL(): CallVoice
    {
        return new self('Ostap (neural)');
    }

    public static function POLINA__NEURAL(): CallVoice
    {
        return new self('Polina (neural)');
    }

    public static function HOAI_MY__NEURAL(): CallVoice
    {
        return new self('HoaiMy (neural)');
    }

    public static function NAM_MINH__NEURAL(): CallVoice
    {
        return new self('NamMinh (neural)');
    }

    public static function ALED__NEURAL(): CallVoice
    {
        return new self('Aled (neural)');
    }

    public static function NIA__NEURAL(): CallVoice
    {
        return new self('Nia (neural)');
    }

    public static function MOUNA__NEURAL(): CallVoice
    {
        return new self('Mouna (neural)');
    }

    public static function JAMAL__NEURAL(): CallVoice
    {
        return new self('Jamal (neural)');
    }

    public static function UZMA__NEURAL(): CallVoice
    {
        return new self('Uzma (neural)');
    }

    public static function ASAD__NEURAL(): CallVoice
    {
        return new self('Asad (neural)');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
