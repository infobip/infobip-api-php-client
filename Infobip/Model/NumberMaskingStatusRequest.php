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


class NumberMaskingStatusRequest
{
    /**
     */
    public function __construct(
        protected ?string $action = null,
        protected ?string $from = null,
        protected ?string $to = null,
        protected ?string $transferTo = null,
        protected ?int $duration = null,
        protected ?string $status = null,
        protected ?string $nmCorrelationId = null,
        protected ?string $fileID = null,
        protected ?string $fileUrl = null,
        protected ?string $ringingTime = null,
        protected ?string $answeredTime = null,
        protected ?string $correlationId = null,
        protected ?int $inboundDuration = null,
        protected ?int $calculatedDuration = null,
        protected ?float $pricePerSecond = null,
        protected ?string $currency = null,
        protected ?string $recordingFileId = null,
        protected ?bool $recordCalleeAnnouncement = null,
        protected ?string $recordingStatus = null,
        protected ?string $clientReferenceId = null,
    ) {

    }


    public function getAction(): string|null
    {
        return $this->action;
    }

    public function setAction(?string $action): self
    {
        $this->action = $action;
        return $this;
    }

    public function getFrom(): string|null
    {
        return $this->from;
    }

    public function setFrom(?string $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getTo(): string|null
    {
        return $this->to;
    }

    public function setTo(?string $to): self
    {
        $this->to = $to;
        return $this;
    }

    public function getTransferTo(): string|null
    {
        return $this->transferTo;
    }

    public function setTransferTo(?string $transferTo): self
    {
        $this->transferTo = $transferTo;
        return $this;
    }

    public function getDuration(): int|null
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;
        return $this;
    }

    public function getStatus(): string|null
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getNmCorrelationId(): string|null
    {
        return $this->nmCorrelationId;
    }

    public function setNmCorrelationId(?string $nmCorrelationId): self
    {
        $this->nmCorrelationId = $nmCorrelationId;
        return $this;
    }

    public function getFileID(): string|null
    {
        return $this->fileID;
    }

    public function setFileID(?string $fileID): self
    {
        $this->fileID = $fileID;
        return $this;
    }

    public function getFileUrl(): string|null
    {
        return $this->fileUrl;
    }

    public function setFileUrl(?string $fileUrl): self
    {
        $this->fileUrl = $fileUrl;
        return $this;
    }

    public function getRingingTime(): string|null
    {
        return $this->ringingTime;
    }

    public function setRingingTime(?string $ringingTime): self
    {
        $this->ringingTime = $ringingTime;
        return $this;
    }

    public function getAnsweredTime(): string|null
    {
        return $this->answeredTime;
    }

    public function setAnsweredTime(?string $answeredTime): self
    {
        $this->answeredTime = $answeredTime;
        return $this;
    }

    public function getCorrelationId(): string|null
    {
        return $this->correlationId;
    }

    public function setCorrelationId(?string $correlationId): self
    {
        $this->correlationId = $correlationId;
        return $this;
    }

    public function getInboundDuration(): int|null
    {
        return $this->inboundDuration;
    }

    public function setInboundDuration(?int $inboundDuration): self
    {
        $this->inboundDuration = $inboundDuration;
        return $this;
    }

    public function getCalculatedDuration(): int|null
    {
        return $this->calculatedDuration;
    }

    public function setCalculatedDuration(?int $calculatedDuration): self
    {
        $this->calculatedDuration = $calculatedDuration;
        return $this;
    }

    public function getPricePerSecond(): float|null
    {
        return $this->pricePerSecond;
    }

    public function setPricePerSecond(?float $pricePerSecond): self
    {
        $this->pricePerSecond = $pricePerSecond;
        return $this;
    }

    public function getCurrency(): string|null
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    public function getRecordingFileId(): string|null
    {
        return $this->recordingFileId;
    }

    public function setRecordingFileId(?string $recordingFileId): self
    {
        $this->recordingFileId = $recordingFileId;
        return $this;
    }

    public function getRecordCalleeAnnouncement(): bool|null
    {
        return $this->recordCalleeAnnouncement;
    }

    public function setRecordCalleeAnnouncement(?bool $recordCalleeAnnouncement): self
    {
        $this->recordCalleeAnnouncement = $recordCalleeAnnouncement;
        return $this;
    }

    public function getRecordingStatus(): mixed
    {
        return $this->recordingStatus;
    }

    public function setRecordingStatus($recordingStatus): self
    {
        $this->recordingStatus = $recordingStatus;
        return $this;
    }

    public function getClientReferenceId(): string|null
    {
        return $this->clientReferenceId;
    }

    public function setClientReferenceId(?string $clientReferenceId): self
    {
        $this->clientReferenceId = $clientReferenceId;
        return $this;
    }
}
