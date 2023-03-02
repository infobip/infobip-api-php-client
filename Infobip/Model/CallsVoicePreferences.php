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

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

class CallsVoicePreferences implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsVoicePreferences';

    public const OPENAPI_FORMATS = [
        'voiceGender' => null,
        'voiceName' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\Choice(['FEMALE','MALE',])]

    protected ?string $voiceGender = null,
        #[Assert\Choice(['Hoda','Zeina','Naayf','Aisha (beta)','Farooq (beta)','Hussein (beta)','Amal (beta)','Sayan (beta)','Sushmita (beta)','Ivan','Conchita','Herena','Huihui','Zhiyu','Yaoyao','Kangkang','Liu (beta)','Wang (beta)','Zhang (beta)','Lin (beta)','Akemi (beta)','Chen (beta)','Huang (beta)','Danny','Tracy','Hanhan','Zhiwei','Yating','Matej','Jakub','Helle','Naja','Mads','Ruben','Lotte','Hanna','Joanna','Zira','Ivy','Kendra','Kimberly','Salli','Joey','Justin','Matthew','Benjamin','Jessica','Jane','Guy','Russell','Catherine','Nicole','Hayley','Brian','Hazel','Amy','Emma','Rosie','George','Heather','Alice','Heera','Aditi','Raveena','Priya','Ravi','Sean','Geraint','Heidi','Evelin (beta)','Hortense','Celine','Lea','Mathieu','Juliette','Picard','Caroline','Harmonie','Chantal','Guillaume','Vicki','Hans','Stefan','Marlene','Hedda','Angela','Michael','Karsten','Stefanos','Sophia (beta)','Dinesh (beta)','Leela (beta)','Asaf','Aadita','Kalpana','Hemant','Szabolcs','Dora','Karl','Indah (beta)','Arif (beta)','Reza (beta)','Andika','Nurul (beta)','Gianna (beta)','Cosimo','Carla','Bianca','Giorgio','Lucia','Takumi','Haruka','Ichiro','Mizuki','Ayumi','Shashank (beta)','Namratha (beta)','Seoyeon','Heami','Sumi (beta)','Jina (beta)','Himchan (beta)','Minho (beta)','Rizwan','Vishnu (beta)','Kirti (beta)','Hulda','Liv','Ewa','Paulina','Maja','Jacek','Jan','Cristiano','Helia','Ines','Abrielle (beta)','Henriques (beta)','Jeraldo (beta)','Jacinda (beta)','Camila','Ricardo','Daniel','Vitoria','Heloisa','Carmen','Andrei','Maxim','Ekaterina','Pavel','Tatyana','Irina','Filip','Lado','Miguel','Linda','Enrique','Juana','Pablo','Gabriela (beta)','Lupe','Laura','Penelope','Hilda','Raul','Mia','Hedvig','Astrid','Valluvar','Ganesh (beta)','Shruti (beta)','Chitra','Vijay (beta)','Samantha (beta)','Natchaya (beta)','Pattara','Seda','Filiz','Ulyana','An','Lien (beta)','Quan (beta)','Mai (beta)','Tuan (beta)','Gwyneth',])]

    protected ?string $voiceName = null,
    ) {
    }

    #[Ignore]
    public function getModelName(): string
    {
        return self::OPENAPI_MODEL_NAME;
    }

    #[Ignore]
    public static function getDiscriminator(): ?string
    {
        return self::DISCRIMINATOR;
    }

    public function getVoiceGender(): mixed
    {
        return $this->voiceGender;
    }

    public function setVoiceGender($voiceGender): self
    {
        $this->voiceGender = $voiceGender;
        return $this;
    }

    public function getVoiceName(): mixed
    {
        return $this->voiceName;
    }

    public function setVoiceName($voiceName): self
    {
        $this->voiceName = $voiceName;
        return $this;
    }
}
