<?php

namespace UBL\CommonAggregateComponents;

use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\TextType;

class CertificateType
{
    /**
     * @param TextType[] $remarks
     * @param DocumentReferenceType[] $documentReferences
     * @param SignatureType[] $signatures
     */
    public function __construct(
        protected ?IdentifierType $id = null,
        protected ?CodeType $certificateTypeCode = null,
        protected ?TextType $certificateType = null,
        protected array $remarks = [],
        protected ?PartyType $issuerParty = null,
        protected array $documentReferences = [],
        protected array $signatures = []
    )
    {
    }

    public function getId(): ?IdentifierType
    {
        return $this->id;
    }

    public function setId(?IdentifierType $id): void
    {
        $this->id = $id;
    }

    public function getCertificateTypeCode(): ?CodeType
    {
        return $this->certificateTypeCode;
    }

    public function setCertificateTypeCode(?CodeType $certificateTypeCode): void
    {
        $this->certificateTypeCode = $certificateTypeCode;
    }

    public function getCertificateType(): ?TextType
    {
        return $this->certificateType;
    }

    public function setCertificateType(?TextType $certificateType): void
    {
        $this->certificateType = $certificateType;
    }

    /**
     * @return TextType[]
     */
    public function getRemarks(): array
    {
        return $this->remarks;
    }

    /**
     * @param TextType[] $remarks
     * @return void
     */
    public function setRemarks(array $remarks): void
    {
        $this->remarks = [];
        foreach ($remarks as $remark) {
            $this->addRemark($remark);
        }
    }

    public function addRemark(TextType $remark): void
    {
        $this->remarks []= $remark;
    }

    public function getIssuerParty(): ?PartyType
    {
        return $this->issuerParty;
    }

    public function setIssuerParty(?PartyType $issuerParty): void
    {
        $this->issuerParty = $issuerParty;
    }

    /**
     * @return DocumentReferenceType[]
     */
    public function getDocumentReferences(): array
    {
        return $this->documentReferences;
    }

    public function setDocumentReferences(array $documentReferences): void
    {
        $this->documentReferences = [];
        foreach ($documentReferences as $documentReference) {
            $this->addDocumentReference($documentReference);
        }
    }

    public function addDocumentReference(DocumentReferenceType $documentReference): void
    {
        $this->documentReferences []= $documentReference;
    }

    /**
     * @return SignatureType[]
     */
    public function getSignatures(): array
    {
        return $this->signatures;
    }

    /**
     * @param SignatureType[] $signatures
     * @return void
     */
    public function setSignatures(array $signatures): void
    {
        $this->signatures = [];
        foreach ($signatures as $signature) {
            $this->addSignature($signature);
        }
    }

    public function addSignature(SignatureType $signature): void
    {
        $this->signatures []= $signature;
    }
}