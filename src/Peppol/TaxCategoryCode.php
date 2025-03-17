<?php /** @noinspection PhpUnused */

namespace UBL\Peppol;


/**
 * @source https://docs.peppol.eu/poacc/billing/3.0/codelist/UNCL5305/
 */
enum TaxCategoryCode: string
{
    case AE = 'AE';
    case E = 'E';
    case S = 'S';
    case Z = 'Z';
    case G = 'G';
    case O = 'O';
    case K = 'K';
    case L = 'L';
    case M = 'M';
    case B = 'B';
}