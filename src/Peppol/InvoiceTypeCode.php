<?php

namespace UBL\Peppol;

/**
 * @source https://docs.peppol.eu/poacc/billing/3.0/codelist/UNCL1001-inv/
 */
enum InvoiceTypeCode: string
{
    /*
     * Request for payment
     */
    case UNCL1001_INV_71 = "71";
    /*
     * Debit note related to goods or services
     */
    case UNCL1001_INV_80 = "80";
    /*
     * Metered services invoice
     */
    case UNCL1001_INV_82 = "82";
    /*
     * Debit note related to financial adjustments
     */
    case UNCL1001_INV_84 = "84";
    /*
     * Tax notification
     */
    case UNCL1001_INV_102 = "102";
    /*
     * Final payment request based on completion of work
     */
    case UNCL1001_INV_218 = "218";
    /*
     * Payment request for completed units
     */
    case UNCL1001_INV_219 = "219";
    /*
     * Partial invoice
     */
    case UNCL1001_INV_326 = "326";
    /*
     * Commercial invoice which includes a packing list
     */
    case UNCL1001_INV_331 = "331";
    /*
     * Commercial invoice
     */
    case UNCL1001_INV_380 = "380";
    /*
     * Commission note
     */
    case UNCL1001_INV_382 = "382";
    /*
     * Debit note
     */
    case UNCL1001_INV_383 = "383";
    /*
     * Corrected invoice
     */
    case UNCL1001_INV_384 = "384";
    /*
     * Prepayment invoice
     */
    case UNCL1001_INV_386 = "386";
    /*
     * Tax invoice
     */
    case UNCL1001_INV_388 = "388";
    /*
     * Self-billed invoice
     */
    case UNCL1001_INV_389 = "389";
    /*
     * Factored invoice
     */
    case UNCL1001_INV_393 = "393";
    /*
     * Consignment invoice
     */
    case UNCL1001_INV_395 = "395";
    /*
     * Forwarder's invoice discrepancy report
     */
    case UNCL1001_INV_553 = "553";
    /*
     * Insurer's invoice
     */
    case UNCL1001_INV_575 = "575";
    /*
     * Forwarder's invoice
     */
    case UNCL1001_INV_623 = "623";
    /*
     * Freight invoice
     */
    case UNCL1001_INV_780 = "780";
    /*
     * Claim notification
     */
    case UNCL1001_INV_817 = "817";
    /*
     * Consular invoice
     */
    case UNCL1001_INV_870 = "870";
    /*
     * Partial construction invoice
     */
    case UNCL1001_INV_875 = "875";
    /*
     * Partial final construction invoice
     */
    case UNCL1001_INV_876 = "876";
    /*
     * Final construction invoice
     */
    case UNCL1001_INV_877 = "877";
}
