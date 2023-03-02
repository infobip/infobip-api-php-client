<?php

// phpcs:ignorefile

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
    public const HODA = 'Hoda';
    public const ZEINA = 'Zeina';
    public const NAAYF = 'Naayf';
    public const AISHA__BETA = 'Aisha (beta)';
    public const FAROOQ__BETA = 'Farooq (beta)';
    public const HUSSEIN__BETA = 'Hussein (beta)';
    public const AMAL__BETA = 'Amal (beta)';
    public const SAYAN__BETA = 'Sayan (beta)';
    public const SUSHMITA__BETA = 'Sushmita (beta)';
    public const IVAN = 'Ivan';
    public const CONCHITA = 'Conchita';
    public const HERENA = 'Herena';
    public const HUIHUI = 'Huihui';
    public const ZHIYU = 'Zhiyu';
    public const YAOYAO = 'Yaoyao';
    public const KANGKANG = 'Kangkang';
    public const LIU__BETA = 'Liu (beta)';
    public const WANG__BETA = 'Wang (beta)';
    public const ZHANG__BETA = 'Zhang (beta)';
    public const LIN__BETA = 'Lin (beta)';
    public const AKEMI__BETA = 'Akemi (beta)';
    public const CHEN__BETA = 'Chen (beta)';
    public const HUANG__BETA = 'Huang (beta)';
    public const DANNY = 'Danny';
    public const TRACY = 'Tracy';
    public const HANHAN = 'Hanhan';
    public const ZHIWEI = 'Zhiwei';
    public const YATING = 'Yating';
    public const MATEJ = 'Matej';
    public const JAKUB = 'Jakub';
    public const HELLE = 'Helle';
    public const NAJA = 'Naja';
    public const MADS = 'Mads';
    public const RUBEN = 'Ruben';
    public const LOTTE = 'Lotte';
    public const HANNA = 'Hanna';
    public const JOANNA = 'Joanna';
    public const ZIRA = 'Zira';
    public const IVY = 'Ivy';
    public const KENDRA = 'Kendra';
    public const KIMBERLY = 'Kimberly';
    public const SALLI = 'Salli';
    public const JOEY = 'Joey';
    public const JUSTIN = 'Justin';
    public const MATTHEW = 'Matthew';
    public const BENJAMIN = 'Benjamin';
    public const JESSICA = 'Jessica';
    public const JANE = 'Jane';
    public const GUY = 'Guy';
    public const RUSSELL = 'Russell';
    public const CATHERINE = 'Catherine';
    public const NICOLE = 'Nicole';
    public const HAYLEY = 'Hayley';
    public const BRIAN = 'Brian';
    public const HAZEL = 'Hazel';
    public const AMY = 'Amy';
    public const EMMA = 'Emma';
    public const ROSIE = 'Rosie';
    public const GEORGE = 'George';
    public const HEATHER = 'Heather';
    public const ALICE = 'Alice';
    public const HEERA = 'Heera';
    public const ADITI = 'Aditi';
    public const RAVEENA = 'Raveena';
    public const PRIYA = 'Priya';
    public const RAVI = 'Ravi';
    public const SEAN = 'Sean';
    public const GERAINT = 'Geraint';
    public const HEIDI = 'Heidi';
    public const EVELIN__BETA = 'Evelin (beta)';
    public const HORTENSE = 'Hortense';
    public const CELINE = 'Celine';
    public const LEA = 'Lea';
    public const MATHIEU = 'Mathieu';
    public const JULIETTE = 'Juliette';
    public const PICARD = 'Picard';
    public const CAROLINE = 'Caroline';
    public const HARMONIE = 'Harmonie';
    public const CHANTAL = 'Chantal';
    public const GUILLAUME = 'Guillaume';
    public const VICKI = 'Vicki';
    public const HANS = 'Hans';
    public const STEFAN = 'Stefan';
    public const MARLENE = 'Marlene';
    public const HEDDA = 'Hedda';
    public const ANGELA = 'Angela';
    public const MICHAEL = 'Michael';
    public const KARSTEN = 'Karsten';
    public const STEFANOS = 'Stefanos';
    public const SOPHIA__BETA = 'Sophia (beta)';
    public const DINESH__BETA = 'Dinesh (beta)';
    public const LEELA__BETA = 'Leela (beta)';
    public const ASAF = 'Asaf';
    public const AADITA = 'Aadita';
    public const KALPANA = 'Kalpana';
    public const HEMANT = 'Hemant';
    public const SZABOLCS = 'Szabolcs';
    public const DORA = 'Dora';
    public const KARL = 'Karl';
    public const INDAH__BETA = 'Indah (beta)';
    public const ARIF__BETA = 'Arif (beta)';
    public const REZA__BETA = 'Reza (beta)';
    public const ANDIKA = 'Andika';
    public const NURUL__BETA = 'Nurul (beta)';
    public const GIANNA__BETA = 'Gianna (beta)';
    public const COSIMO = 'Cosimo';
    public const CARLA = 'Carla';
    public const BIANCA = 'Bianca';
    public const GIORGIO = 'Giorgio';
    public const LUCIA = 'Lucia';
    public const TAKUMI = 'Takumi';
    public const HARUKA = 'Haruka';
    public const ICHIRO = 'Ichiro';
    public const MIZUKI = 'Mizuki';
    public const AYUMI = 'Ayumi';
    public const SHASHANK__BETA = 'Shashank (beta)';
    public const NAMRATHA__BETA = 'Namratha (beta)';
    public const SEOYEON = 'Seoyeon';
    public const HEAMI = 'Heami';
    public const SUMI__BETA = 'Sumi (beta)';
    public const JINA__BETA = 'Jina (beta)';
    public const HIMCHAN__BETA = 'Himchan (beta)';
    public const MINHO__BETA = 'Minho (beta)';
    public const RIZWAN = 'Rizwan';
    public const VISHNU__BETA = 'Vishnu (beta)';
    public const KIRTI__BETA = 'Kirti (beta)';
    public const HULDA = 'Hulda';
    public const LIV = 'Liv';
    public const EWA = 'Ewa';
    public const PAULINA = 'Paulina';
    public const MAJA = 'Maja';
    public const JACEK = 'Jacek';
    public const JAN = 'Jan';
    public const CRISTIANO = 'Cristiano';
    public const HELIA = 'Helia';
    public const INES = 'Ines';
    public const ABRIELLE__BETA = 'Abrielle (beta)';
    public const HENRIQUES__BETA = 'Henriques (beta)';
    public const JERALDO__BETA = 'Jeraldo (beta)';
    public const JACINDA__BETA = 'Jacinda (beta)';
    public const CAMILA = 'Camila';
    public const RICARDO = 'Ricardo';
    public const DANIEL = 'Daniel';
    public const VITORIA = 'Vitoria';
    public const HELOISA = 'Heloisa';
    public const CARMEN = 'Carmen';
    public const ANDREI = 'Andrei';
    public const MAXIM = 'Maxim';
    public const EKATERINA = 'Ekaterina';
    public const PAVEL = 'Pavel';
    public const TATYANA = 'Tatyana';
    public const IRINA = 'Irina';
    public const FILIP = 'Filip';
    public const LADO = 'Lado';
    public const MIGUEL = 'Miguel';
    public const LINDA = 'Linda';
    public const ENRIQUE = 'Enrique';
    public const JUANA = 'Juana';
    public const PABLO = 'Pablo';
    public const GABRIELA__BETA = 'Gabriela (beta)';
    public const LUPE = 'Lupe';
    public const LAURA = 'Laura';
    public const PENELOPE = 'Penelope';
    public const HILDA = 'Hilda';
    public const RAUL = 'Raul';
    public const MIA = 'Mia';
    public const HEDVIG = 'Hedvig';
    public const ASTRID = 'Astrid';
    public const VALLUVAR = 'Valluvar';
    public const GANESH__BETA = 'Ganesh (beta)';
    public const SHRUTI__BETA = 'Shruti (beta)';
    public const CHITRA = 'Chitra';
    public const VIJAY__BETA = 'Vijay (beta)';
    public const SAMANTHA__BETA = 'Samantha (beta)';
    public const NATCHAYA__BETA = 'Natchaya (beta)';
    public const PATTARA = 'Pattara';
    public const SEDA = 'Seda';
    public const FILIZ = 'Filiz';
    public const ULYANA = 'Ulyana';
    public const AN = 'An';
    public const LIEN__BETA = 'Lien (beta)';
    public const QUAN__BETA = 'Quan (beta)';
    public const MAI__BETA = 'Mai (beta)';
    public const TUAN__BETA = 'Tuan (beta)';
    public const GWYNETH = 'Gwyneth';

    public const ALLOWED_VALUES = [
        'Hoda',
        'Zeina',
        'Naayf',
        'Aisha (beta)',
        'Farooq (beta)',
        'Hussein (beta)',
        'Amal (beta)',
        'Sayan (beta)',
        'Sushmita (beta)',
        'Ivan',
        'Conchita',
        'Herena',
        'Huihui',
        'Zhiyu',
        'Yaoyao',
        'Kangkang',
        'Liu (beta)',
        'Wang (beta)',
        'Zhang (beta)',
        'Lin (beta)',
        'Akemi (beta)',
        'Chen (beta)',
        'Huang (beta)',
        'Danny',
        'Tracy',
        'Hanhan',
        'Zhiwei',
        'Yating',
        'Matej',
        'Jakub',
        'Helle',
        'Naja',
        'Mads',
        'Ruben',
        'Lotte',
        'Hanna',
        'Joanna',
        'Zira',
        'Ivy',
        'Kendra',
        'Kimberly',
        'Salli',
        'Joey',
        'Justin',
        'Matthew',
        'Benjamin',
        'Jessica',
        'Jane',
        'Guy',
        'Russell',
        'Catherine',
        'Nicole',
        'Hayley',
        'Brian',
        'Hazel',
        'Amy',
        'Emma',
        'Rosie',
        'George',
        'Heather',
        'Alice',
        'Heera',
        'Aditi',
        'Raveena',
        'Priya',
        'Ravi',
        'Sean',
        'Geraint',
        'Heidi',
        'Evelin (beta)',
        'Hortense',
        'Celine',
        'Lea',
        'Mathieu',
        'Juliette',
        'Picard',
        'Caroline',
        'Harmonie',
        'Chantal',
        'Guillaume',
        'Vicki',
        'Hans',
        'Stefan',
        'Marlene',
        'Hedda',
        'Angela',
        'Michael',
        'Karsten',
        'Stefanos',
        'Sophia (beta)',
        'Dinesh (beta)',
        'Leela (beta)',
        'Asaf',
        'Aadita',
        'Kalpana',
        'Hemant',
        'Szabolcs',
        'Dora',
        'Karl',
        'Indah (beta)',
        'Arif (beta)',
        'Reza (beta)',
        'Andika',
        'Nurul (beta)',
        'Gianna (beta)',
        'Cosimo',
        'Carla',
        'Bianca',
        'Giorgio',
        'Lucia',
        'Takumi',
        'Haruka',
        'Ichiro',
        'Mizuki',
        'Ayumi',
        'Shashank (beta)',
        'Namratha (beta)',
        'Seoyeon',
        'Heami',
        'Sumi (beta)',
        'Jina (beta)',
        'Himchan (beta)',
        'Minho (beta)',
        'Rizwan',
        'Vishnu (beta)',
        'Kirti (beta)',
        'Hulda',
        'Liv',
        'Ewa',
        'Paulina',
        'Maja',
        'Jacek',
        'Jan',
        'Cristiano',
        'Helia',
        'Ines',
        'Abrielle (beta)',
        'Henriques (beta)',
        'Jeraldo (beta)',
        'Jacinda (beta)',
        'Camila',
        'Ricardo',
        'Daniel',
        'Vitoria',
        'Heloisa',
        'Carmen',
        'Andrei',
        'Maxim',
        'Ekaterina',
        'Pavel',
        'Tatyana',
        'Irina',
        'Filip',
        'Lado',
        'Miguel',
        'Linda',
        'Enrique',
        'Juana',
        'Pablo',
        'Gabriela (beta)',
        'Lupe',
        'Laura',
        'Penelope',
        'Hilda',
        'Raul',
        'Mia',
        'Hedvig',
        'Astrid',
        'Valluvar',
        'Ganesh (beta)',
        'Shruti (beta)',
        'Chitra',
        'Vijay (beta)',
        'Samantha (beta)',
        'Natchaya (beta)',
        'Pattara',
        'Seda',
        'Filiz',
        'Ulyana',
        'An',
        'Lien (beta)',
        'Quan (beta)',
        'Mai (beta)',
        'Tuan (beta)',
        'Gwyneth',
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

    public static function HODA(): CallVoice
    {
        return new self('Hoda');
    }

    public static function ZEINA(): CallVoice
    {
        return new self('Zeina');
    }

    public static function NAAYF(): CallVoice
    {
        return new self('Naayf');
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

    public static function IVAN(): CallVoice
    {
        return new self('Ivan');
    }

    public static function CONCHITA(): CallVoice
    {
        return new self('Conchita');
    }

    public static function HERENA(): CallVoice
    {
        return new self('Herena');
    }

    public static function HUIHUI(): CallVoice
    {
        return new self('Huihui');
    }

    public static function ZHIYU(): CallVoice
    {
        return new self('Zhiyu');
    }

    public static function YAOYAO(): CallVoice
    {
        return new self('Yaoyao');
    }

    public static function KANGKANG(): CallVoice
    {
        return new self('Kangkang');
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

    public static function DANNY(): CallVoice
    {
        return new self('Danny');
    }

    public static function TRACY(): CallVoice
    {
        return new self('Tracy');
    }

    public static function HANHAN(): CallVoice
    {
        return new self('Hanhan');
    }

    public static function ZHIWEI(): CallVoice
    {
        return new self('Zhiwei');
    }

    public static function YATING(): CallVoice
    {
        return new self('Yating');
    }

    public static function MATEJ(): CallVoice
    {
        return new self('Matej');
    }

    public static function JAKUB(): CallVoice
    {
        return new self('Jakub');
    }

    public static function HELLE(): CallVoice
    {
        return new self('Helle');
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

    public static function HANNA(): CallVoice
    {
        return new self('Hanna');
    }

    public static function JOANNA(): CallVoice
    {
        return new self('Joanna');
    }

    public static function ZIRA(): CallVoice
    {
        return new self('Zira');
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

    public static function BENJAMIN(): CallVoice
    {
        return new self('Benjamin');
    }

    public static function JESSICA(): CallVoice
    {
        return new self('Jessica');
    }

    public static function JANE(): CallVoice
    {
        return new self('Jane');
    }

    public static function GUY(): CallVoice
    {
        return new self('Guy');
    }

    public static function RUSSELL(): CallVoice
    {
        return new self('Russell');
    }

    public static function CATHERINE(): CallVoice
    {
        return new self('Catherine');
    }

    public static function NICOLE(): CallVoice
    {
        return new self('Nicole');
    }

    public static function HAYLEY(): CallVoice
    {
        return new self('Hayley');
    }

    public static function BRIAN(): CallVoice
    {
        return new self('Brian');
    }

    public static function HAZEL(): CallVoice
    {
        return new self('Hazel');
    }

    public static function AMY(): CallVoice
    {
        return new self('Amy');
    }

    public static function EMMA(): CallVoice
    {
        return new self('Emma');
    }

    public static function ROSIE(): CallVoice
    {
        return new self('Rosie');
    }

    public static function GEORGE(): CallVoice
    {
        return new self('George');
    }

    public static function HEATHER(): CallVoice
    {
        return new self('Heather');
    }

    public static function ALICE(): CallVoice
    {
        return new self('Alice');
    }

    public static function HEERA(): CallVoice
    {
        return new self('Heera');
    }

    public static function ADITI(): CallVoice
    {
        return new self('Aditi');
    }

    public static function RAVEENA(): CallVoice
    {
        return new self('Raveena');
    }

    public static function PRIYA(): CallVoice
    {
        return new self('Priya');
    }

    public static function RAVI(): CallVoice
    {
        return new self('Ravi');
    }

    public static function SEAN(): CallVoice
    {
        return new self('Sean');
    }

    public static function GERAINT(): CallVoice
    {
        return new self('Geraint');
    }

    public static function HEIDI(): CallVoice
    {
        return new self('Heidi');
    }

    public static function EVELIN__BETA(): CallVoice
    {
        return new self('Evelin (beta)');
    }

    public static function HORTENSE(): CallVoice
    {
        return new self('Hortense');
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

    public static function JULIETTE(): CallVoice
    {
        return new self('Juliette');
    }

    public static function PICARD(): CallVoice
    {
        return new self('Picard');
    }

    public static function CAROLINE(): CallVoice
    {
        return new self('Caroline');
    }

    public static function HARMONIE(): CallVoice
    {
        return new self('Harmonie');
    }

    public static function CHANTAL(): CallVoice
    {
        return new self('Chantal');
    }

    public static function GUILLAUME(): CallVoice
    {
        return new self('Guillaume');
    }

    public static function VICKI(): CallVoice
    {
        return new self('Vicki');
    }

    public static function HANS(): CallVoice
    {
        return new self('Hans');
    }

    public static function STEFAN(): CallVoice
    {
        return new self('Stefan');
    }

    public static function MARLENE(): CallVoice
    {
        return new self('Marlene');
    }

    public static function HEDDA(): CallVoice
    {
        return new self('Hedda');
    }

    public static function ANGELA(): CallVoice
    {
        return new self('Angela');
    }

    public static function MICHAEL(): CallVoice
    {
        return new self('Michael');
    }

    public static function KARSTEN(): CallVoice
    {
        return new self('Karsten');
    }

    public static function STEFANOS(): CallVoice
    {
        return new self('Stefanos');
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

    public static function ASAF(): CallVoice
    {
        return new self('Asaf');
    }

    public static function AADITA(): CallVoice
    {
        return new self('Aadita');
    }

    public static function KALPANA(): CallVoice
    {
        return new self('Kalpana');
    }

    public static function HEMANT(): CallVoice
    {
        return new self('Hemant');
    }

    public static function SZABOLCS(): CallVoice
    {
        return new self('Szabolcs');
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

    public static function ANDIKA(): CallVoice
    {
        return new self('Andika');
    }

    public static function NURUL__BETA(): CallVoice
    {
        return new self('Nurul (beta)');
    }

    public static function GIANNA__BETA(): CallVoice
    {
        return new self('Gianna (beta)');
    }

    public static function COSIMO(): CallVoice
    {
        return new self('Cosimo');
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

    public static function LUCIA(): CallVoice
    {
        return new self('Lucia');
    }

    public static function TAKUMI(): CallVoice
    {
        return new self('Takumi');
    }

    public static function HARUKA(): CallVoice
    {
        return new self('Haruka');
    }

    public static function ICHIRO(): CallVoice
    {
        return new self('Ichiro');
    }

    public static function MIZUKI(): CallVoice
    {
        return new self('Mizuki');
    }

    public static function AYUMI(): CallVoice
    {
        return new self('Ayumi');
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

    public static function HEAMI(): CallVoice
    {
        return new self('Heami');
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

    public static function RIZWAN(): CallVoice
    {
        return new self('Rizwan');
    }

    public static function VISHNU__BETA(): CallVoice
    {
        return new self('Vishnu (beta)');
    }

    public static function KIRTI__BETA(): CallVoice
    {
        return new self('Kirti (beta)');
    }

    public static function HULDA(): CallVoice
    {
        return new self('Hulda');
    }

    public static function LIV(): CallVoice
    {
        return new self('Liv');
    }

    public static function EWA(): CallVoice
    {
        return new self('Ewa');
    }

    public static function PAULINA(): CallVoice
    {
        return new self('Paulina');
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

    public static function HELIA(): CallVoice
    {
        return new self('Helia');
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

    public static function DANIEL(): CallVoice
    {
        return new self('Daniel');
    }

    public static function VITORIA(): CallVoice
    {
        return new self('Vitoria');
    }

    public static function HELOISA(): CallVoice
    {
        return new self('Heloisa');
    }

    public static function CARMEN(): CallVoice
    {
        return new self('Carmen');
    }

    public static function ANDREI(): CallVoice
    {
        return new self('Andrei');
    }

    public static function MAXIM(): CallVoice
    {
        return new self('Maxim');
    }

    public static function EKATERINA(): CallVoice
    {
        return new self('Ekaterina');
    }

    public static function PAVEL(): CallVoice
    {
        return new self('Pavel');
    }

    public static function TATYANA(): CallVoice
    {
        return new self('Tatyana');
    }

    public static function IRINA(): CallVoice
    {
        return new self('Irina');
    }

    public static function FILIP(): CallVoice
    {
        return new self('Filip');
    }

    public static function LADO(): CallVoice
    {
        return new self('Lado');
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

    public static function JUANA(): CallVoice
    {
        return new self('Juana');
    }

    public static function PABLO(): CallVoice
    {
        return new self('Pablo');
    }

    public static function GABRIELA__BETA(): CallVoice
    {
        return new self('Gabriela (beta)');
    }

    public static function LUPE(): CallVoice
    {
        return new self('Lupe');
    }

    public static function LAURA(): CallVoice
    {
        return new self('Laura');
    }

    public static function PENELOPE(): CallVoice
    {
        return new self('Penelope');
    }

    public static function HILDA(): CallVoice
    {
        return new self('Hilda');
    }

    public static function RAUL(): CallVoice
    {
        return new self('Raul');
    }

    public static function MIA(): CallVoice
    {
        return new self('Mia');
    }

    public static function HEDVIG(): CallVoice
    {
        return new self('Hedvig');
    }

    public static function ASTRID(): CallVoice
    {
        return new self('Astrid');
    }

    public static function VALLUVAR(): CallVoice
    {
        return new self('Valluvar');
    }

    public static function GANESH__BETA(): CallVoice
    {
        return new self('Ganesh (beta)');
    }

    public static function SHRUTI__BETA(): CallVoice
    {
        return new self('Shruti (beta)');
    }

    public static function CHITRA(): CallVoice
    {
        return new self('Chitra');
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

    public static function PATTARA(): CallVoice
    {
        return new self('Pattara');
    }

    public static function SEDA(): CallVoice
    {
        return new self('Seda');
    }

    public static function FILIZ(): CallVoice
    {
        return new self('Filiz');
    }

    public static function ULYANA(): CallVoice
    {
        return new self('Ulyana');
    }

    public static function AN(): CallVoice
    {
        return new self('An');
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

    public function __toString(): string
    {
        return $this->value;
    }
}
