<?php
/**
 * Created by PhpStorm.
 * User: calaraionut
 * Date: 12/5/18
 * Time: 3:57 PM
 */

namespace Paylike\Data;

class Currencies
{

    /**
     * Currencies constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $iso_code
     *
     * @return null
     */
    public function getCurrency($iso_code)
    {
        $currencies = $this->all();

        if (isset($currencies[ $iso_code ])) {
            return $currencies[ $iso_code ];
        }

        return null;
    }

    /**
     * Return the number that should be used to compute cents from the total amount
     *
     * @param $currency_iso_code
     *
     * @return int|number
     */
    public function getPaylikeMultiplier($currency_iso_code)
    {
        $currency = $this->getCurrency($currency_iso_code);

        if (isset($currency['exponent'])) {
            return pow(10, $currency['exponent']);
        } else {
            return pow(10, 2);
        }
    }

    /**
     * Return the number that should be used to compute the total amount from cents
     *
     * @param $currency_iso_code
     *
     * @return int|number
     */
    private function getPaylikeDivider($currency_iso_code)
    {
        return $this->getPaylikeMultiplier($currency_iso_code);
    }

    /**
     *
     * @param  $amount
     * @param  $currencyCode
     *
     * @return int
     */
    public function ceil($amount, $currencyCode)
    {
        // in some cases float numbers cannot represented directly so they still have so decimals even
        // those are not shown. That causes ceil to increment the minor amount so we are using round with 3 digits
        // to clear that issue.
        // see http://php.net/manual/ro/function.ceil.php#117341
        return ceil(round($amount, 3) * $this->getPaylikeMultiplier($currencyCode));
    }

    /**
     * @return array
     */
    public function all()
    {
        return [
            'AED' =>
                [
                    'code'     => 'AED',
                    'currency' => 'United Arab Emirates dirham',
                    'numeric'  => '784',
                    'exponent' => 2,
                ],
            'AFN' =>
                [
                    'code'     => 'AFN',
                    'currency' => 'Afghan afghani',
                    'numeric'  => '971',
                    'exponent' => 2,
                ],
            'ALL' =>
                [
                    'code'     => 'ALL',
                    'currency' => 'Albanian lek',
                    'numeric'  => '008',
                    'exponent' => 2,
                ],
            'AMD' =>
                [
                    'code'     => 'AMD',
                    'currency' => 'Armenian dram',
                    'numeric'  => '051',
                    'exponent' => 2,
                ],
            'ANG' =>
                [
                    'code'     => 'ANG',
                    'currency' => 'Netherlands Antillean guilder',
                    'numeric'  => '532',
                    'exponent' => 2,
                ],
            'AOA' =>
                [
                    'code'     => 'AOA',
                    'currency' => 'Angolan kwanza',
                    'numeric'  => '973',
                    'exponent' => 2,
                ],
            'ARS' =>
                [
                    'code'     => 'ARS',
                    'currency' => 'Argentine peso',
                    'numeric'  => '032',
                    'exponent' => 2,
                ],
            'AUD' =>
                [
                    'code'     => 'AUD',
                    'currency' => 'Australian dollar',
                    'numeric'  => '036',
                    'exponent' => 2,
                ],
            'AWG' =>
                [
                    'code'     => 'AWG',
                    'currency' => 'Aruban florin',
                    'numeric'  => '533',
                    'exponent' => 2,
                ],
            'AZN' =>
                [
                    'code'     => 'AZN',
                    'currency' => 'Azerbaijani manat',
                    'numeric'  => '944',
                    'exponent' => 2,
                ],
            'BAM' =>
                [
                    'code'     => 'BAM',
                    'currency' => 'Bosnia and Herzegovina convertible mark',
                    'numeric'  => '977',
                    'exponent' => 2,
                ],
            'BBD' =>
                [
                    'code'     => 'BBD',
                    'currency' => 'Barbados dollar',
                    'numeric'  => '052',
                    'exponent' => 2,
                ],
            'BDT' =>
                [
                    'code'     => 'BDT',
                    'currency' => 'Bangladeshi taka',
                    'numeric'  => '050',
                    'exponent' => 2,
                ],
            'BGN' =>
                [
                    'code'     => 'BGN',
                    'currency' => 'Bulgarian lev',
                    'numeric'  => '975',
                    'exponent' => 2,
                ],
            'BHD' =>
                [
                    'code'     => 'BHD',
                    'currency' => 'Bahraini dinar',
                    'numeric'  => '048',
                    'exponent' => 3,
                ],
            'BIF' =>
                [
                    'code'     => 'BIF',
                    'currency' => 'Burundian franc',
                    'numeric'  => '108',
                    'exponent' => 0,
                ],
            'BMD' =>
                [
                    'code'     => 'BMD',
                    'currency' => 'Bermudian dollar',
                    'numeric'  => '060',
                    'exponent' => 2,
                ],
            'BND' =>
                [
                    'code'     => 'BND',
                    'currency' => 'Brunei dollar',
                    'numeric'  => '096',
                    'exponent' => 2,
                ],
            'BOB' =>
                [
                    'code'     => 'BOB',
                    'currency' => 'Boliviano',
                    'numeric'  => '068',
                    'exponent' => 2,
                ],
            'BRL' =>
                [
                    'code'     => 'BRL',
                    'currency' => 'Brazilian real',
                    'numeric'  => '986',
                    'exponent' => 2,
                ],
            'BSD' =>
                [
                    'code'     => 'BSD',
                    'currency' => 'Bahamian dollar',
                    'numeric'  => '044',
                    'exponent' => 2,
                ],
            'BTN' =>
                [
                    'code'     => 'BTN',
                    'currency' => 'Bhutanese ngultrum',
                    'numeric'  => '064',
                    'exponent' => 2,
                ],
            'BWP' =>
                [
                    'code'     => 'BWP',
                    'currency' => 'Botswana pula',
                    'numeric'  => '072',
                    'exponent' => 2,
                ],
            'BYR' =>
                [
                    'code'     => 'BYR',
                    'currency' => 'Belarusian ruble',
                    'numeric'  => '974',
                    'exponent' => 0,
                ],
            'BZD' =>
                [
                    'code'     => 'BZD',
                    'currency' => 'Belize dollar',
                    'numeric'  => '084',
                    'exponent' => 2,
                ],
            'CAD' =>
                [
                    'code'     => 'CAD',
                    'currency' => 'Canadian dollar',
                    'numeric'  => '124',
                    'exponent' => 2,
                ],
            'CDF' =>
                [
                    'code'     => 'CDF',
                    'currency' => 'Congolese franc',
                    'numeric'  => '976',
                    'exponent' => 2,
                ],
            'CHF' =>
                [
                    'code'     => 'CHF',
                    'currency' => 'Swiss franc',
                    'numeric'  => '756',
                    'funding'  => true,
                    'exponent' => 2,
                ],
            'CLP' =>
                [
                    'code'     => 'CLP',
                    'currency' => 'Chilean peso',
                    'numeric'  => '152',
                    'exponent' => 0,
                ],
            'CNY' =>
                [
                    'code'     => 'CNY',
                    'currency' => 'Chinese yuan',
                    'numeric'  => '156',
                    'exponent' => 2,
                ],
            'COP' =>
                [
                    'code'     => 'COP',
                    'currency' => 'Colombian peso',
                    'numeric'  => '170',
                    'exponent' => 2,
                ],
            'CRC' =>
                [
                    'code'     => 'CRC',
                    'currency' => 'Costa Rican colon',
                    'numeric'  => '188',
                    'exponent' => 2,
                ],
            'CUP' =>
                [
                    'code'     => 'CUP',
                    'currency' => 'Cuban peso',
                    'numeric'  => '192',
                    'exponent' => 2,
                ],
            'CVE' =>
                [
                    'code'     => 'CVE',
                    'currency' => 'Cape Verde escudo',
                    'numeric'  => '132',
                    'exponent' => 2,
                ],
            'CZK' =>
                [
                    'code'     => 'CZK',
                    'currency' => 'Czech koruna',
                    'numeric'  => '203',
                    'exponent' => 2,
                ],
            'DJF' =>
                [
                    'code'     => 'DJF',
                    'currency' => 'Djiboutian franc',
                    'numeric'  => '262',
                    'exponent' => 0,
                ],
            'DKK' =>
                [
                    'code'     => 'DKK',
                    'currency' => 'Danish krone',
                    'numeric'  => '208',
                    'funding'  => true,
                    'exponent' => 2,
                ],
            'DOP' =>
                [
                    'code'     => 'DOP',
                    'currency' => 'Dominican peso',
                    'numeric'  => '214',
                    'exponent' => 2,
                ],
            'DZD' =>
                [
                    'code'     => 'DZD',
                    'currency' => 'Algerian dinar',
                    'numeric'  => '012',
                    'exponent' => 2,
                ],
            'EGP' =>
                [
                    'code'     => 'EGP',
                    'currency' => 'Egyptian pound',
                    'numeric'  => '818',
                    'exponent' => 2,
                ],
            'ERN' =>
                [
                    'code'     => 'ERN',
                    'currency' => 'Eritrean nakfa',
                    'numeric'  => '232',
                    'exponent' => 2,
                ],
            'ETB' =>
                [
                    'code'     => 'ETB',
                    'currency' => 'Ethiopian birr',
                    'numeric'  => '230',
                    'exponent' => 2,
                ],
            'EUR' =>
                [
                    'code'     => 'EUR',
                    'currency' => 'Euro',
                    'numeric'  => '978',
                    'funding'  => true,
                    'exponent' => 2,
                ],
            'FJD' =>
                [
                    'code'     => 'FJD',
                    'currency' => 'Fiji dollar',
                    'numeric'  => '242',
                    'exponent' => 2,
                ],
            'FKP' =>
                [
                    'code'     => 'FKP',
                    'currency' => 'Falkland Islands pound',
                    'numeric'  => '238',
                    'exponent' => 2,
                ],
            'GBP' =>
                [
                    'code'     => 'GBP',
                    'currency' => 'Pound sterling',
                    'numeric'  => '826',
                    'funding'  => true,
                    'exponent' => 2,
                ],
            'GEL' =>
                [
                    'code'     => 'GEL',
                    'currency' => 'Georgian lari',
                    'numeric'  => '981',
                    'exponent' => 2,
                ],
            'GHS' =>
                [
                    'code'     => 'GHS',
                    'currency' => 'Ghanaian cedi',
                    'numeric'  => '936',
                    'exponent' => 2,
                ],
            'GIP' =>
                [
                    'code'     => 'GIP',
                    'currency' => 'Gibraltar pound',
                    'numeric'  => '292',
                    'exponent' => 2,
                ],
            'GMD' =>
                [
                    'code'     => 'GMD',
                    'currency' => 'Gambian dalasi',
                    'numeric'  => '270',
                    'exponent' => 2,
                ],
            'GNF' =>
                [
                    'code'     => 'GNF',
                    'currency' => 'Guinean franc',
                    'numeric'  => '324',
                    'exponent' => 0,
                ],
            'GTQ' =>
                [
                    'code'     => 'GTQ',
                    'currency' => 'Guatemalan quetzal',
                    'numeric'  => '320',
                    'exponent' => 2,
                ],
            'GYD' =>
                [
                    'code'     => 'GYD',
                    'currency' => 'Guyanese dollar',
                    'numeric'  => '328',
                    'exponent' => 2,
                ],
            'HKD' =>
                [
                    'code'     => 'HKD',
                    'currency' => 'Hong Kong dollar',
                    'numeric'  => '344',
                    'exponent' => 2,
                ],
            'HNL' =>
                [
                    'code'     => 'HNL',
                    'currency' => 'Honduran lempira',
                    'numeric'  => '340',
                    'exponent' => 2,
                ],
            'HRK' =>
                [
                    'code'     => 'HRK',
                    'currency' => 'Croatian kuna',
                    'numeric'  => '191',
                    'exponent' => 2,
                ],
            'HTG' =>
                [
                    'code'     => 'HTG',
                    'currency' => 'Haitian gourde',
                    'numeric'  => '332',
                    'exponent' => 2,
                ],
            'HUF' =>
                [
                    'code'     => 'HUF',
                    'currency' => 'Hungarian forint',
                    'numeric'  => '348',
                    'funding'  => true,
                    'exponent' => 2,
                ],
            'IDR' =>
                [
                    'code'     => 'IDR',
                    'currency' => 'Indonesian rupiah',
                    'numeric'  => '360',
                    'exponent' => 2,
                ],
            'ILS' =>
                [
                    'code'     => 'ILS',
                    'currency' => 'Israeli new shekel',
                    'numeric'  => '376',
                    'exponent' => 2,
                ],
            'INR' =>
                [
                    'code'     => 'INR',
                    'currency' => 'Indian rupee',
                    'numeric'  => '356',
                    'exponent' => 2,
                ],
            'IQD' =>
                [
                    'code'     => 'IQD',
                    'currency' => 'Iraqi dinar',
                    'numeric'  => '368',
                    'exponent' => 3,
                ],
            'IRR' =>
                [
                    'code'     => 'IRR',
                    'currency' => 'Iranian rial',
                    'numeric'  => '364',
                    'exponent' => 2,
                ],
            'ISK' =>
                [
                    'code'     => 'ISK',
                    'currency' => 'Icelandic króna',
                    'numeric'  => '352',
                    'exponent' => 2,
                ],
            'JMD' =>
                [
                    'code'     => 'JMD',
                    'currency' => 'Jamaican dollar',
                    'numeric'  => '388',
                    'exponent' => 2,
                ],
            'JOD' =>
                [
                    'code'     => 'JOD',
                    'currency' => 'Jordanian dinar',
                    'numeric'  => '400',
                    'exponent' => 3,
                ],
            'JPY' =>
                [
                    'code'     => 'JPY',
                    'currency' => 'Japanese yen',
                    'numeric'  => '392',
                    'exponent' => 0,
                ],
            'KES' =>
                [
                    'code'     => 'KES',
                    'currency' => 'Kenyan shilling',
                    'numeric'  => '404',
                    'exponent' => 2,
                ],
            'KGS' =>
                [
                    'code'     => 'KGS',
                    'currency' => 'Kyrgyzstani som',
                    'numeric'  => '417',
                    'exponent' => 2,
                ],
            'KHR' =>
                [
                    'code'     => 'KHR',
                    'currency' => 'Cambodian riel',
                    'numeric'  => '116',
                    'exponent' => 2,
                ],
            'KMF' =>
                [
                    'code'     => 'KMF',
                    'currency' => 'Comoro franc',
                    'numeric'  => '174',
                    'exponent' => 0,
                ],
            'KPW' =>
                [
                    'code'     => 'KPW',
                    'currency' => 'North Korean won',
                    'numeric'  => '408',
                    'exponent' => 2,
                ],
            'KRW' =>
                [
                    'code'     => 'KRW',
                    'currency' => 'South Korean won',
                    'numeric'  => '410',
                    'exponent' => 0,
                ],
            'KWD' =>
                [
                    'code'     => 'KWD',
                    'currency' => 'Kuwaiti dinar',
                    'numeric'  => '414',
                    'exponent' => 3,
                ],
            'KYD' =>
                [
                    'code'     => 'KYD',
                    'currency' => 'Cayman Islands dollar',
                    'numeric'  => '136',
                    'exponent' => 2,
                ],
            'KZT' =>
                [
                    'code'     => 'KZT',
                    'currency' => 'Kazakhstani tenge',
                    'numeric'  => '398',
                    'exponent' => 2,
                ],
            'LAK' =>
                [
                    'code'     => 'LAK',
                    'currency' => 'Lao kip',
                    'numeric'  => '418',
                    'exponent' => 2,
                ],
            'LBP' =>
                [
                    'code'     => 'LBP',
                    'currency' => 'Lebanese pound',
                    'numeric'  => '422',
                    'exponent' => 2,
                ],
            'LKR' =>
                [
                    'code'     => 'LKR',
                    'currency' => 'Sri Lankan rupee',
                    'numeric'  => '144',
                    'exponent' => 2,
                ],
            'LRD' =>
                [
                    'code'     => 'LRD',
                    'currency' => 'Liberian dollar',
                    'numeric'  => '430',
                    'exponent' => 2,
                ],
            'LSL' =>
                [
                    'code'     => 'LSL',
                    'currency' => 'Lesotho loti',
                    'numeric'  => '426',
                    'exponent' => 2,
                ],
            'MAD' =>
                [
                    'code'     => 'MAD',
                    'currency' => 'Moroccan dirham',
                    'numeric'  => '504',
                    'exponent' => 2,
                ],
            'MDL' =>
                [
                    'code'     => 'MDL',
                    'currency' => 'Moldovan leu',
                    'numeric'  => '498',
                    'exponent' => 2,
                ],
            'MGA' =>
                [
                    'code'     => 'MGA',
                    'currency' => 'Malagasy ariary',
                    'numeric'  => '969',
                    'exponent' => 2,
                ],
            'MKD' =>
                [
                    'code'     => 'MKD',
                    'currency' => 'Macedonian denar',
                    'numeric'  => '807',
                    'exponent' => 2,
                ],
            'MMK' =>
                [
                    'code'     => 'MMK',
                    'currency' => 'Myanmar kyat',
                    'numeric'  => '104',
                    'exponent' => 2,
                ],
            'MNT' =>
                [
                    'code'     => 'MNT',
                    'currency' => 'Mongolian tögrög',
                    'numeric'  => '496',
                    'exponent' => 2,
                ],
            'MOP' =>
                [
                    'code'     => 'MOP',
                    'currency' => 'Macanese pataca',
                    'numeric'  => '446',
                    'exponent' => 2,
                ],
            'MRO' =>
                [
                    'code'     => 'MRO',
                    'currency' => 'Mauritanian ouguiya',
                    'numeric'  => '478',
                    'exponent' => 2,
                ],
            'MUR' =>
                [
                    'code'     => 'MUR',
                    'currency' => 'Mauritian rupee',
                    'numeric'  => '480',
                    'exponent' => 2,
                ],
            'MVR' =>
                [
                    'code'     => 'MVR',
                    'currency' => 'Maldivian rufiyaa',
                    'numeric'  => '462',
                    'exponent' => 2,
                ],
            'MWK' =>
                [
                    'code'     => 'MWK',
                    'currency' => 'Malawian kwacha',
                    'numeric'  => '454',
                    'exponent' => 2,
                ],
            'MXN' =>
                [
                    'code'     => 'MXN',
                    'currency' => 'Mexican peso',
                    'numeric'  => '484',
                    'exponent' => 2,
                ],
            'MYR' =>
                [
                    'code'     => 'MYR',
                    'currency' => 'Malaysian ringgit',
                    'numeric'  => '458',
                    'exponent' => 2,
                ],
            'MZN' =>
                [
                    'code'     => 'MZN',
                    'currency' => 'Mozambican metical',
                    'numeric'  => '943',
                    'exponent' => 2,
                ],
            'NAD' =>
                [
                    'code'     => 'NAD',
                    'currency' => 'Namibian dollar',
                    'numeric'  => '516',
                    'exponent' => 2,
                ],
            'NGN' =>
                [
                    'code'     => 'NGN',
                    'currency' => 'Nigerian naira',
                    'numeric'  => '566',
                    'exponent' => 2,
                ],
            'NIO' =>
                [
                    'code'     => 'NIO',
                    'currency' => 'Nicaraguan córdoba',
                    'numeric'  => '558',
                    'exponent' => 2,
                ],
            'NOK' =>
                [
                    'code'     => 'NOK',
                    'currency' => 'Norwegian krone',
                    'numeric'  => '578',
                    'funding'  => true,
                    'exponent' => 2,
                ],
            'NPR' =>
                [
                    'code'     => 'NPR',
                    'currency' => 'Nepalese rupee',
                    'numeric'  => '524',
                    'exponent' => 2,
                ],
            'NZD' =>
                [
                    'code'     => 'NZD',
                    'currency' => 'New Zealand dollar',
                    'numeric'  => '554',
                    'exponent' => 2,
                ],
            'OMR' =>
                [
                    'code'     => 'OMR',
                    'currency' => 'Omani rial',
                    'numeric'  => '512',
                    'exponent' => 3,
                ],
            'PAB' =>
                [
                    'code'     => 'PAB',
                    'currency' => 'Panamanian balboa',
                    'numeric'  => '590',
                    'exponent' => 2,
                ],
            'PEN' =>
                [
                    'code'     => 'PEN',
                    'currency' => 'Peruvian Sol',
                    'numeric'  => '604',
                    'exponent' => 2,
                ],
            'PGK' =>
                [
                    'code'     => 'PGK',
                    'currency' => 'Papua New Guinean kina',
                    'numeric'  => '598',
                    'exponent' => 2,
                ],
            'PHP' =>
                [
                    'code'     => 'PHP',
                    'currency' => 'Philippine peso',
                    'numeric'  => '608',
                    'exponent' => 2,
                ],
            'PKR' =>
                [
                    'code'     => 'PKR',
                    'currency' => 'Pakistani rupee',
                    'numeric'  => '586',
                    'exponent' => 2,
                ],
            'PLN' =>
                [
                    'code'     => 'PLN',
                    'currency' => 'Polish złoty',
                    'numeric'  => '985',
                    'funding'  => true,
                    'exponent' => 2,
                ],
            'PYG' =>
                [
                    'code'     => 'PYG',
                    'currency' => 'Paraguayan guaraní',
                    'numeric'  => '600',
                    'exponent' => 0,
                ],
            'QAR' =>
                [
                    'code'     => 'QAR',
                    'currency' => 'Qatari riyal',
                    'numeric'  => '634',
                    'exponent' => 2,
                ],
            'RON' =>
                [
                    'code'     => 'RON',
                    'currency' => 'Romanian leu',
                    'numeric'  => '946',
                    'funding'  => true,
                    'exponent' => 2,
                ],
            'RSD' =>
                [
                    'code'     => 'RSD',
                    'currency' => 'Serbian dinar',
                    'numeric'  => '941',
                    'exponent' => 2,
                ],
            'RUB' =>
                [
                    'code'     => 'RUB',
                    'currency' => 'Russian ruble',
                    'numeric'  => '643',
                    'exponent' => 2,
                ],
            'RWF' =>
                [
                    'code'     => 'RWF',
                    'currency' => 'Rwandan franc',
                    'numeric'  => '646',
                    'exponent' => 0,
                ],
            'SAR' =>
                [
                    'code'     => 'SAR',
                    'currency' => 'Saudi riyal',
                    'numeric'  => '682',
                    'exponent' => 2,
                ],
            'SBD' =>
                [
                    'code'     => 'SBD',
                    'currency' => 'Solomon Islands dollar',
                    'numeric'  => '090',
                    'exponent' => 2,
                ],
            'SCR' =>
                [
                    'code'     => 'SCR',
                    'currency' => 'Seychelles rupee',
                    'numeric'  => '690',
                    'exponent' => 2,
                ],
            'SDG' =>
                [
                    'code'     => 'SDG',
                    'currency' => 'Sudanese pound',
                    'numeric'  => '938',
                    'exponent' => 2,
                ],
            'SEK' =>
                [
                    'code'     => 'SEK',
                    'currency' => 'Swedish krona',
                    'numeric'  => '752',
                    'funding'  => true,
                    'exponent' => 2,
                ],
            'SGD' =>
                [
                    'code'     => 'SGD',
                    'currency' => 'Singapore dollar',
                    'numeric'  => '702',
                    'exponent' => 2,
                ],
            'SHP' =>
                [
                    'code'     => 'SHP',
                    'currency' => 'Saint Helena pound',
                    'numeric'  => '654',
                    'exponent' => 2,
                ],
            'SLL' =>
                [
                    'code'     => 'SLL',
                    'currency' => 'Sierra Leonean leone',
                    'numeric'  => '694',
                    'exponent' => 2,
                ],
            'SOS' =>
                [
                    'code'     => 'SOS',
                    'currency' => 'Somali shilling',
                    'numeric'  => '706',
                    'exponent' => 2,
                ],
            'SRD' =>
                [
                    'code'     => 'SRD',
                    'currency' => 'Surinamese dollar',
                    'numeric'  => '968',
                    'exponent' => 2,
                ],
            'STD' =>
                [
                    'code'     => 'STD',
                    'currency' => 'São Tomé and Príncipe dobra',
                    'numeric'  => '678',
                    'exponent' => 2,
                ],
            'SYP' =>
                [
                    'code'     => 'SYP',
                    'currency' => 'Syrian pound',
                    'numeric'  => '760',
                    'exponent' => 2,
                ],
            'SZL' =>
                [
                    'code'     => 'SZL',
                    'currency' => 'Swazi lilangeni',
                    'numeric'  => '748',
                    'exponent' => 2,
                ],
            'THB' =>
                [
                    'code'     => 'THB',
                    'currency' => 'Thai baht',
                    'numeric'  => '764',
                    'exponent' => 2,
                ],
            'TJS' =>
                [
                    'code'     => 'TJS',
                    'currency' => 'Tajikistani somoni',
                    'numeric'  => '972',
                    'exponent' => 2,
                ],
            'TMT' =>
                [
                    'code'     => 'TMT',
                    'currency' => 'Turkmenistani manat',
                    'numeric'  => '934',
                    'exponent' => 2,
                ],
            'TND' =>
                [
                    'code'     => 'TND',
                    'currency' => 'Tunisian dinar',
                    'numeric'  => '788',
                    'exponent' => 3,
                ],
            'TOP' =>
                [
                    'code'     => 'TOP',
                    'currency' => 'Tongan paʻanga',
                    'numeric'  => '776',
                    'exponent' => 2,
                ],
            'TRY' =>
                [
                    'code'     => 'TRY',
                    'currency' => 'Turkish lira',
                    'numeric'  => '949',
                    'exponent' => 2,
                ],
            'TTD' =>
                [
                    'code'     => 'TTD',
                    'currency' => 'Trinidad and Tobago dollar',
                    'numeric'  => '780',
                    'exponent' => 2,
                ],
            'TWD' =>
                [
                    'code'     => 'TWD',
                    'currency' => 'New Taiwan dollar',
                    'numeric'  => '901',
                    'exponent' => 2,
                ],
            'TZS' =>
                [
                    'code'     => 'TZS',
                    'currency' => 'Tanzanian shilling',
                    'numeric'  => '834',
                    'exponent' => 2,
                ],
            'UAH' =>
                [
                    'code'     => 'UAH',
                    'currency' => 'Ukrainian hryvnia',
                    'numeric'  => '980',
                    'exponent' => 2,
                ],
            'UGX' =>
                [
                    'code'     => 'UGX',
                    'currency' => 'Ugandan shilling',
                    'numeric'  => '800',
                    'exponent' => 0,
                ],
            'USD' =>
                [
                    'code'     => 'USD',
                    'currency' => 'United States dollar',
                    'numeric'  => '840',
                    'funding'  => true,
                    'exponent' => 2,
                ],
            'UYU' =>
                [
                    'code'     => 'UYU',
                    'currency' => 'Uruguayan peso',
                    'numeric'  => '858',
                    'exponent' => 2,
                ],
            'UZS' =>
                [
                    'code'     => 'UZS',
                    'currency' => 'Uzbekistan som',
                    'numeric'  => '860',
                    'exponent' => 2,
                ],
            'VEF' =>
                [
                    'code'     => 'VEF',
                    'currency' => 'Venezuelan bolívar',
                    'numeric'  => '937',
                    'exponent' => 2,
                ],
            'VND' =>
                [
                    'code'     => 'VND',
                    'currency' => 'Vietnamese dong',
                    'numeric'  => '704',
                    'exponent' => 0,
                ],
            'VUV' =>
                [
                    'code'     => 'VUV',
                    'currency' => 'Vanuatu vatu',
                    'numeric'  => '548',
                    'exponent' => 0,
                ],
            'WST' =>
                [
                    'code'     => 'WST',
                    'currency' => 'Samoan tala',
                    'numeric'  => '882',
                    'exponent' => 2,
                ],
            'XAF' =>
                [
                    'code'     => 'XAF',
                    'currency' => 'CFA franc BEAC',
                    'numeric'  => '950',
                    'exponent' => 0,
                ],
            'XCD' =>
                [
                    'code'     => 'XCD',
                    'currency' => 'East Caribbean dollar',
                    'numeric'  => '951',
                    'exponent' => 2,
                ],
            'XOF' =>
                [
                    'code'     => 'XOF',
                    'currency' => 'CFA franc BCEAO',
                    'numeric'  => '952',
                    'exponent' => 0,
                ],
            'XPF' =>
                [
                    'code'     => 'XPF',
                    'currency' => 'CFP franc',
                    'numeric'  => '953',
                    'exponent' => 0,
                ],
            'YER' =>
                [
                    'code'     => 'YER',
                    'currency' => 'Yemeni rial',
                    'numeric'  => '886',
                    'exponent' => 2,
                ],
            'ZAR' =>
                [
                    'code'     => 'ZAR',
                    'currency' => 'South African rand',
                    'numeric'  => '710',
                    'exponent' => 2,
                ],
            'ZMK' =>
                [
                    'code'     => 'ZMK',
                    'currency' => 'Zambian kwacha',
                    'numeric'  => '894',
                    'exponent' => 2,
                ],
            'ZWL' =>
                [
                    'code'     => 'ZWL',
                    'currency' => 'Zimbabwean dollar',
                    'numeric'  => '716',
                    'exponent' => 2,
                ],
        ];
    }
}
