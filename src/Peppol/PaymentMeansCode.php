<?php

namespace UBL\Peppol;

/**
 * @source https://docs.peppol.eu/poacc/billing/3.0/codelist/UNCL4461/
 */
enum PaymentMeansCode: string
{
    /**
     * Instrument not defined
     */
    case UNCL4461_1 = '1';

    /**
     * Automated clearing house credit
     */
    case UNCL4461_2 = '2';

    /**
     * Automated clearing house debit
     */
    case UNCL4461_3 = '3';

    /**
     * ACH demand debit reversal
     */
    case UNCL4461_4 = '4';

    /**
     * ACH demand credit reversal
     */
    case UNCL4461_5 = '5';

    /**
     * ACH demand credit
     */
    case UNCL4461_6 = '6';

    /**
     * ACH demand debit
     */
    case UNCL4461_7 = '7';

    /**
     * Hold
     */
    case UNCL4461_8 = '8';

    /**
     * National or regional clearing
     */
    case UNCL4461_9 = '9';

    /**
     * In cash
     */
    case UNCL4461_10 = '10';

    /**
     * ACH savings credit reversal
     */
    case UNCL4461_11 = '11';

    /**
     * ACH savings debit reversal
     */
    case UNCL4461_12 = '12';

    /**
     * ACH savings credit
     */
    case UNCL4461_13 = '13';

    /**
     * ACH savings debit
     */
    case UNCL4461_14 = '14';

    /**
     * Bookentry credit
     */
    case UNCL4461_15 = '15';

    /**
     * Bookentry debit
     */
    case UNCL4461_16 = '16';

    /**
     * ACH demand cash concentration/disbursement (CCD) credit
     */
    case UNCL4461_17 = '17';

    /**
     * ACH demand cash concentration/disbursement (CCD) debit
     */
    case UNCL4461_18 = '18';

    /**
     * ACH demand corporate trade payment (CTP) credit
     */
    case UNCL4461_19 = '19';

    /**
     * Cheque
     */
    case UNCL4461_20 = '20';

    /**
     * Banker's draft
     */
    case UNCL4461_21 = '21';

    /**
     * Certified banker's draft
     */
    case UNCL4461_22 = '22';

    /**
     * Bank cheque (issued by a banking or similar establishment)
     */
    case UNCL4461_23 = '23';

    /**
     * Bill of exchange awaiting acceptance
     */
    case UNCL4461_24 = '24';

    /**
     * Certified cheque
     */
    case UNCL4461_25 = '25';

    /**
     * Local cheque
     */
    case UNCL4461_26 = '26';

    /**
     * ACH demand corporate trade payment (CTP) debit
     */
    case UNCL4461_27 = '27';

    /**
     * ACH demand corporate trade exchange (CTX) credit
     */
    case UNCL4461_28 = '28';

    /**
     * ACH demand corporate trade exchange (CTX) debit
     */
    case UNCL4461_29 = '29';

    /**
     * Credit transfer
     */
    case UNCL4461_30 = '30';

    /**
     * Debit transfer
     */
    case UNCL4461_31 = '31';

    /**
     * ACH demand cash concentration/disbursement plus (CCD+)
     */
    case UNCL4461_32 = '32';

    /**
     * ACH demand cash concentration/disbursement plus (CCD+)
     */
    case UNCL4461_33 = '33';

    /**
     * ACH prearranged payment and deposit (PPD)
     */
    case UNCL4461_34 = '34';

    /**
     * ACH savings cash concentration/disbursement (CCD) credit
     */
    case UNCL4461_35 = '35';

    /**
     * ACH savings cash concentration/disbursement (CCD) debit
     */
    case UNCL4461_36 = '36';

    /**
     * ACH savings corporate trade payment (CTP) credit
     */
    case UNCL4461_37 = '37';

    /**
     * ACH savings corporate trade payment (CTP) debit
     */
    case UNCL4461_38 = '38';

    /**
     * ACH savings corporate trade exchange (CTX) credit
     */
    case UNCL4461_39 = '39';

    /**
     * ACH savings corporate trade exchange (CTX) debit
     */
    case UNCL4461_40 = '40';

    /**
     * ACH savings cash concentration/disbursement plus (CCD+)
     */
    case UNCL4461_41 = '41';

    /**
     * Payment to bank account
     */
    case UNCL4461_42 = '42';

    /**
     * ACH savings cash concentration/disbursement plus (CCD+)
     */
    case UNCL4461_43 = '43';

    /**
     * Accepted bill of exchange
     */
    case UNCL4461_44 = '44';

    /**
     * Referenced home-banking credit transfer
     */
    case UNCL4461_45 = '45';

    /**
     * Interbank debit transfer
     */
    case UNCL4461_46 = '46';

    /**
     * Home-banking debit transfer
     */
    case UNCL4461_47 = '47';

    /**
     * Bank card
     */
    case UNCL4461_48 = '48';

    /**
     * Direct debit
     */
    case UNCL4461_49 = '49';

    /**
     * Payment by postgiro
     */
    case UNCL4461_50 = '50';

    /**
     * FR, norme 6 97-Telereglement CFONB (French Organisation for
     */
    case UNCL4461_51 = '51';

    /**
     * Urgent commercial payment
     */
    case UNCL4461_52 = '52';

    /**
     * Urgent Treasury Payment
     */
    case UNCL4461_53 = '53';

    /**
     * Credit card
     */
    case UNCL4461_54 = '54';

    /**
     * Debit card
     */
    case UNCL4461_55 = '55';

    /**
     * Bankgiro
     */
    case UNCL4461_56 = '56';

    /**
     * Standing agreement
     */
    case UNCL4461_57 = '57';

    /**
     * SEPA credit transfer
     */
    case UNCL4461_58 = '58';

    /**
     * SEPA direct debit
     */
    case UNCL4461_59 = '59';

    /**
     * Promissory note
     */
    case UNCL4461_60 = '60';

    /**
     * Promissory note signed by the debtor
     */
    case UNCL4461_61 = '61';

    /**
     * Promissory note signed by the debtor and endorsed by a bank
     */
    case UNCL4461_62 = '62';

    /**
     * Promissory note signed by the debtor and endorsed by a
     */
    case UNCL4461_63 = '63';

    /**
     * Promissory note signed by a bank
     */
    case UNCL4461_64 = '64';

    /**
     * Promissory note signed by a bank and endorsed by another
     */
    case UNCL4461_65 = '65';

    /**
     * Promissory note signed by a third party
     */
    case UNCL4461_66 = '66';

    /**
     * Promissory note signed by a third party and endorsed by a
     */
    case UNCL4461_67 = '67';

    /**
     * Online payment service
     */
    case UNCL4461_68 = '68';

    /**
     * Transfer Advice
     */
    case UNCL4461_69 = '69';

    /**
     * Bill drawn by the creditor on the debtor
     */
    case UNCL4461_70 = '70';

    /**
     * Bill drawn by the creditor on a bank
     */
    case UNCL4461_74 = '74';

    /**
     * Bill drawn by the creditor, endorsed by another bank
     */
    case UNCL4461_75 = '75';

    /**
     * Bill drawn by the creditor on a bank and endorsed by a
     */
    case UNCL4461_76 = '76';

    /**
     * Bill drawn by the creditor on a third party
     */
    case UNCL4461_77 = '77';

    /**
     * Bill drawn by creditor on third party, accepted and
     */
    case UNCL4461_78 = '78';

    /**
     * Not transferable banker's draft
     */
    case UNCL4461_91 = '91';

    /**
     * Not transferable local cheque
     */
    case UNCL4461_92 = '92';

    /**
     * Reference giro
     */
    case UNCL4461_93 = '93';

    /**
     * Urgent giro
     */
    case UNCL4461_94 = '94';

    /**
     * Free format giro
     */
    case UNCL4461_95 = '95';

    /**
     * Requested method for payment was not used
     */
    case UNCL4461_96 = '96';

    /**
     * Clearing between partners
     */
    case UNCL4461_97 = '97';

    /**
     * JP, Electronically Recorded Monetary Claims
     */
    case UNCL4461_98 = '98';

    /**
     * Mutually defined
     */
    case UNCL4461_ZZZ = 'ZZZ';
}
