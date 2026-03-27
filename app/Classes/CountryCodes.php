<?php

namespace App\Classes;

/**
 * Sia240712 Added 'special_prefix' for special mobile number prefix handling; such as digi broadband sim card
 */
class CountryCodes
{
    public static function getCountryData()
    {
        return self::$data;
    }

    public static function getCountryCollection()
    {
        return collect(self::$data);
    }

    private static $data = array(
        0 =>
        array(
            'alpha2' => 'US',
            'alpha3' => 'USA',
            'country_code'  => '1',
            'country_name'  => 'United States',
            'cn'            => '美国',
            'my'            => 'Amerika Syarikat',
            'id'            => 'Amerika Syarikat',
            'timezone'      => 'America/Los_Angeles',
            'mobile_begin_with' =>
            array(
                '201',
                '202',
                '203',
                '205',
                '206',
                '207',
                '208',
                '209',
                '210',
                '212',
                '213',
                '214',
                '215',
                '216',
                '217',
                '218',
                '219',
                '220',
                '223',
                '224',
                '225',
                '227',
                '228',
                '229',
                '231',
                '234',
                '235',
                '239',
                '240',
                '248',
                '251',
                '252',
                '253',
                '254',
                '256',
                '260',
                '262',
                '267',
                '269',
                '270',
                '272',
                '274',
                '276',
                '278',
                '279',
                '281',
                '283',
                '301',
                '302',
                '303',
                '304',
                '305',
                '307',
                '308',
                '309',
                '310',
                '312',
                '313',
                '314',
                '315',
                '316',
                '317',
                '318',
                '319',
                '320',
                '321',
                '323',
                '324',
                '325',
                '326',
                '327',
                '329',
                '330',
                '331',
                '332',
                '334',
                '336',
                '337',
                '339',
                '341',
                '346',
                '347',
                '350',
                '351',
                '352',
                '353',
                '360',
                '361',
                '363',
                '364',
                '369',
                '380',
                '385',
                '386',
                '401',
                '402',
                '404',
                '405',
                '406',
                '407',
                '408',
                '409',
                '410',
                '412',
                '413',
                '414',
                '415',
                '417',
                '419',
                '423',
                '424',
                '425',
                '430',
                '432',
                '434',
                '435',
                '436',
                '440',
                '442',
                '443',
                '445',
                '447',
                '458',
                '463',
                '464',
                '469',
                '470',
                '472',
                '475',
                '478',
                '479',
                '480',
                '484',
                '501',
                '502',
                '503',
                '504',
                '505',
                '507',
                '508',
                '509',
                '510',
                '512',
                '513',
                '515',
                '516',
                '517',
                '518',
                '520',
                '526',
                '527',
                '528',
                '529',
                '530',
                '531',
                '534',
                '539',
                '540',
                '541',
                '551',
                '557',
                '559',
                '561',
                '562',
                '563',
                '564',
                '567',
                '570',
                '571',
                '572',
                '573',
                '574',
                '575',
                '580',
                '582',
                '585',
                '586',
                '601',
                '602',
                '603',
                '605',
                '606',
                '607',
                '608',
                '609',
                '610',
                '612',
                '614',
                '615',
                '616',
                '617',
                '618',
                '619',
                '620',
                '623',
                '624',
                '626',
                '627',
                '628',
                '629',
                '630',
                '631',
                '636',
                '640',
                '641',
                '645',
                '646',
                '650',
                '651',
                '656',
                '657',
                '659',
                '660',
                '661',
                '662',
                '667',
                '669',
                '678',
                '679',
                '680',
                '681',
                '682',
                '686',
                '689',
                '701',
                '702',
                '703',
                '704',
                '706',
                '707',
                '708',
                '710',
                '712',
                '713',
                '714',
                '715',
                '716',
                '717',
                '718',
                '719',
                '720',
                '724',
                '725',
                '726',
                '727',
                '728',
                '730',
                '731',
                '732',
                '734',
                '737',
                '738',
                '740',
                '743',
                '747',
                '752',
                '754',
                '757',
                '760',
                '762',
                '763',
                '764',
                '765',
                '769',
                '770',
                '771',
                '772',
                '773',
                '774',
                '775',
                '779',
                '781',
                '785',
                '786',
                '801',
                '802',
                '803',
                '804',
                '805',
                '806',
                '808',
                '810',
                '812',
                '813',
                '814',
                '815',
                '816',
                '817',
                '818',
                '820',
                '821',
                '826',
                '828',
                '830',
                '831',
                '832',
                '835',
                '838',
                '839',
                '840',
                '843',
                '845',
                '847',
                '848',
                '850',
                '854',
                '856',
                '857',
                '858',
                '859',
                '860',
                '861',
                '862',
                '863',
                '864',
                '865',
                '870',
                '872',
                '878',
                '901',
                '903',
                '904',
                '906',
                '907',
                '908',
                '909',
                '910',
                '912',
                '913',
                '914',
                '915',
                '916',
                '917',
                '918',
                '919',
                '920',
                '924',
                '925',
                '927',
                '928',
                '929',
                '930',
                '931',
                '934',
                '935',
                '936',
                '937',
                '938',
                '940',
                '941',
                '943',
                '945',
                '947',
                '948',
                '949',
                '951',
                '952',
                '954',
                '956',
                '957',
                '959',
                '970',
                '971',
                '972',
                '973',
                '975',
                '978',
                '979',
                '980',
                '983',
                '984',
                '985',
                '986',
                '989',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        1 =>
        array(
            'alpha2' => 'AW',
            'alpha3' => 'ABW',
            'country_code'  => '297',
            'country_name'  => 'Aruba',
            'cn'            => '阿鲁巴岛',
            'my'            => 'Aruba',
            'id'            => 'Aruba',
            'timezone'      => 'America/Aruba',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '6',
                2 => '7',
                3 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        2 =>
        array(
            'alpha2' => 'AF',
            'alpha3' => 'AFG',
            'country_code'  => '93',
            'country_name'  => 'Afghanistan',
            'cn'            => '阿富汗',
            'my'            => 'Afghanistan',
            'id'            => 'Afghanistan',
            'timezone'      => 'Asia/Kabul',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        3 =>
        array(
            'alpha2' => 'AO',
            'alpha3' => 'AGO',
            'country_code'  => '244',
            'country_name'  => 'Angola',
            'cn'            => '安哥拉',
            'my'            => 'Angola',
            'id'            => 'Angola',
            'timezone'      => 'Africa/Luanda',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        4 =>
        array(
            'alpha2' => 'AI',
            'alpha3' => 'AIA',
            'country_code'  => '1',
            'country_name'  => 'Anguilla',
            'cn'            => '安圭拉',
            'my'            => 'Anguilla',
            'id'            => 'Anguilla',
            'timezone'      => 'America/Anguilla',
            'mobile_begin_with' =>
            array(
                0 => '264',
                // 0 => '5',
                // 1 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        5 =>
        array(
            'alpha2' => 'AX',
            'alpha3' => 'ALA',
            'country_code'  => '358',
            'country_name'  => 'Aland Islands',
            'cn'            => '奥兰群岛',
            'my'            => 'Kepulauan Aland',
            'id'            => 'Kepulauan Aland',
            'timezone'      => 'Finlandia',
            'mobile_begin_with' =>
            array(
                0 => '18',
            ),
            'phone_number_lengths' =>
            array(
                0 => 6,
                1 => 7,
                2 => 8,
            ),
        ),
        6 =>
        array(
            'alpha2' => 'AL',
            'alpha3' => 'ALB',
            'country_code'  => '355',
            'country_name'  => 'Albania',
            'cn'            => '阿尔巴尼亚',
            'my'            => 'Albania',
            'id'            => 'Albania',
            'timezone'      => 'Europe/Tirane',
            'mobile_begin_with' =>
            array(
                0 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        7 =>
        array(
            'alpha2' => 'AD',
            'alpha3' => 'AND',
            'country_code'  => '376',
            'country_name'  => 'Andorra',
            'cn'            => '安道尔',
            'my'            => 'Andorra',
            'id'            => 'Andorra',
            'timezone'      => 'Europe/Belgrade',
            'mobile_begin_with' =>
            array(
                0 => '3',
                1 => '4',
                2 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 6,
            ),
        ),
        8 =>
        array(
            'alpha2' => 'AE',
            'alpha3' => 'ARE',
            'country_code' => '971',
            'country_name' => 'United Arab Emirates',
            'cn'            => '阿拉伯联合酋长国',
            'my'            => 'Emiriah Arab Bersatu',
            'id'            => 'Emiriah Arab Besatu',
            'timezone'      => 'Abu Dhabi',
            'mobile_begin_with' =>
            array(
                0 => '5',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        9 =>
        array(
            'alpha2' => 'AR',
            'alpha3' => 'ARG',
            'country_code' => '54',
            'country_name' => 'Argentina',
            'cn'            => '阿根廷',
            'my'            => 'Argentina',
            'id'            => 'Argentina',
            'timezone'      => 'America/Argentina/Buenos_Aires',
            'mobile_begin_with' =>
            array(
                0 => '15',
            ),
            'phone_number_lengths' =>
            array(
                0 => 6,
                1 => 7,
                2 => 8,
                3 => 9,
                4 => 10,
            ),
        ),
        10 =>
        array(
            'alpha2' => 'AM',
            'alpha3' => 'ARM',
            'country_code'  => '374',
            'country_name'  => 'Armenia',
            'cn'            => '亚美尼亚',
            'my'            => 'Armenia',
            'id'            => 'Armenia',
            'timezone'      => 'Asia/Yerevan',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '7',
                2 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        11 =>
        array(
            'alpha2' => 'AS',
            'alpha3' => 'ASM',
            'country_code'  => '1',
            'country_name'  => 'American Samoa',
            'cn'            => '美属萨摩亚',
            'my'            => 'American Samoa',
            'id'            => 'American Samoa',
            'timezone'      => 'America/Los_Angeles',
            'mobile_begin_with' =>
            array(
                0 => '684',
                // 0 => '733',
                // 1 => '258',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        12 =>
        array(
            'alpha2' => 'AG',
            'alpha3' => 'ATG',
            'country_code'  => '1',
            'country_name'  => 'Antigua and Barbuda',
            'cn'            => '安提瓜和巴布达',
            'my'            => 'Antigua dan Barbuda',
            'id'            => 'Antigua dan Barbuda',
            'timezone'      => 'America/Antigua',
            'mobile_begin_with' =>
            array(
                0 => '268',
                // 0 => '4',
                // 1 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        13 =>
        array(
            'alpha2' => 'AU',
            'alpha3' => 'AUS',
            'country_code' => '61',
            'country_name' => 'Australia',
            'cn'            => '澳大利亚',
            'my'            => 'Australia',
            'id'            => 'Australia',
            'timezone'      => 'Australia/Sydney',
            'mobile_begin_with' =>
            array(
                0 => '4',
                1 => '8', // for cocos island and christmas iland
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        14 =>
        array(
            'alpha2' => 'AT',
            'alpha3' => 'AUT',
            'country_code'  => '43',
            'country_name'  => 'Austria',
            'cn'            => '奥地利',
            'my'            => 'Austria',
            'id'            => 'Austria',
            'timezone'      => 'Europe/Vienna',
            'mobile_begin_with' =>
            array(
                0 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        15 =>
        array(
            'alpha2' => 'AZ',
            'alpha3' => 'AZE',
            'country_code'  => '994',
            'country_name'  => 'Azerbaijan',
            'cn'            => '阿塞拜疆',
            'my'            => 'Azerbaijan',
            'id'            => 'Azerbaijan',
            'timezone'      => 'Asia/Baku',
            'mobile_begin_with' =>
            array(
                0 => '4',
                1 => '5',
                2 => '6',
                3 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        16 =>
        array(
            'alpha2' => 'BI',
            'alpha3' => 'BDI',
            'country_code'  => '257',
            'country_name'  => 'Burundi',
            'cn'            => '布隆迪',
            'my'            => 'Burundi',
            'id'            => 'Burundi',
            'timezone'      => 'Africa/Bujumbura',
            'mobile_begin_with' =>
            array(
                0 => '7',
                1 => '29',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        17 =>
        array(
            'alpha2' => 'BE',
            'alpha3' => 'BEL',
            'country_code'  => '32',
            'country_name'  => 'Belgium',
            'cn'            => '比利时',
            'my'            => 'Belgium',
            'id'            => 'Belgium',
            'timezone'      => 'Europe/Brussels',
            'mobile_begin_with' =>
            array(
                0 => '4',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        18 =>
        array(
            'alpha2' => 'BJ',
            'alpha3' => 'BEN',
            'country_code'  => '229',
            'country_name'  => 'Benin',
            'cn'            => '贝宁',
            'my'            => 'Benin',
            'id'            => 'Benin',
            'timezone'      => 'Africa/Porto-Novo',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        19 =>
        array(
            'alpha2' => 'BF',
            'alpha3' => 'BFA',
            'country_code'  => '226',
            'country_name'  => 'Burkina Faso',
            'cn'            => '布基纳法索',
            'my'            => 'Burkina Faso',
            'id'            => 'Burkina Faso',
            'timezone'      => 'Africa/Ouagadougou',
            'mobile_begin_with' =>
            array(
                0 => '6',
                1 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        20 =>
        array(
            'alpha2' => 'BD',
            'alpha3' => 'BGD',
            'country_code'  => '880',
            'country_name'  => 'Bangladesh',
            'cn'            => '孟加拉国',
            'my'            => 'Bangladesh',
            'id'            => 'Bangladesh',
            'timezone'      => 'Asia/Dhaka',
            'mobile_begin_with' =>
            array(
                0 => '1',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
                1 => 9,
                2 => 10,
            ),
        ),
        21 =>
        array(
            'alpha2' => 'BG',
            'alpha3' => 'BGR',
            'country_code'  => '359',
            'country_name'  => 'Bulgaria',
            'cn'            => '保加利亚',
            'my'            => 'Bulgaria',
            'id'            => 'Bulgaria',
            'timezone'      => 'Europe/Sofia ',
            'mobile_begin_with' =>
            array(
                0 => '87',
                1 => '88',
                2 => '89',
                3 => '98',
                4 => '99',
                5 => '43',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
                1 => 9,
            ),
        ),
        22 =>
        array(
            'alpha2' => 'BH',
            'alpha3' => 'BHR',
            'country_code'  => '973',
            'country_name'  => 'Bahrain',
            'cn'            => '巴林',
            'my'            => 'Bahrain',
            'id'            => 'Bahrain',
            'timezone'      => 'Asia/Bahrain ',
            'mobile_begin_with' =>
            array(
                0 => '3',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        23 =>
        array(
            'alpha2' => 'BS',
            'alpha3' => 'BHS',
            'country_code'  => '1',
            'country_name'  => 'Bahamas',
            'cn'            => '巴哈马',
            'my'            => 'Bahamas',
            'id'            => 'Bahamas',
            'timezone'      => 'America/Nassau',
            'mobile_begin_with' =>
            array(
                0 => '242',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        24 =>
        array(
            'alpha2' => 'BA',
            'alpha3' => 'BIH',
            'country_code'  => '387',
            'country_name'  => 'Bosnia and Herzegovina',
            'cn'            => '波斯尼亚和黑塞哥维那',
            'my'            => 'Bosnia dan Herzegovina',
            'id'            => 'Bosnia dan Herzegovina',
            'timezone'      => 'Europe/Sarajevo',
            'mobile_begin_with' =>
            array(
                0 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        25 =>
        array(
            'alpha2' => 'BY',
            'alpha3' => 'BLR',
            'country_code'  => '375',
            'country_name'  => 'Belarus',
            'cn'            => '白俄罗斯',
            'my'            => 'Belarus',
            'id'            => 'Belarus',
            'timezone'      => 'Europe/Minsk',
            'mobile_begin_with' =>
            array(
                0 => '25',
                1 => '29',
                2 => '33',
                3 => '44',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        26 =>
        array(
            'alpha2' => 'BZ',
            'alpha3' => 'BLZ',
            'country_code'  => '501',
            'country_name'  => 'Belize',
            'cn'            => '伯利兹',
            'my'            => 'Belize',
            'id'            => 'Belize',
            'timezone'      => 'America/Belize',
            'mobile_begin_with' =>
            array(
                0 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        27 =>
        array(
            'alpha2' => 'BM',
            'alpha3' => 'BMU',
            'country_code'  => '1',
            'country_name'  => 'Bermuda',
            'cn'            => '百慕大',
            'my'            => 'Bermuda',
            'id'            => 'Bermuda',
            'timezone'      => 'Atlantic',
            'mobile_begin_with' =>
            array(
                0 => '441',
                // 0 => '3',
                // 1 => '5',
                // 2 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        28 =>
        array(
            'alpha2' => 'BO',
            'alpha3' => 'BOL',
            'country_code'  => '591',
            'country_name'  => 'Bolivia',
            'cn'            => '玻利维亚',
            'my'            => 'Bolivia',
            'id'            => 'Bolivia',
            'timezone'      => 'America/La_Paz',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        29 =>
        array(
            'alpha2' => 'BR',
            'alpha3' => 'BRA',
            'country_code'  => '55',
            'country_name'  => 'Brazil',
            'cn'            => '巴西',
            'my'            => 'Brazil',
            'id'            => 'Brazil',
            'timezone'      => 'America/Noronha',
            'mobile_begin_with' =>
            array(
                0 => '119',
                1 => '129',
                2 => '139',
                3 => '149',
                4 => '159',
                5 => '169',
                6 => '179',
                7 => '189',
                8 => '199',
                9 => '219',
                10 => '229',
                11 => '249',
                12 => '279',
                13 => '289',
                14 => '31',
                15 => '32',
                16 => '34',
                17 => '38',
                18 => '41',
                19 => '43',
                20 => '44',
                21 => '45',
                22 => '47',
                23 => '48',
                24 => '51',
                25 => '53',
                26 => '54',
                27 => '55',
                28 => '61',
                29 => '62',
                30 => '65',
                31 => '67',
                32 => '68',
                33 => '69',
                34 => '71',
                35 => '73',
                36 => '75',
                37 => '77',
                38 => '79',
                39 => '81',
                40 => '82',
                41 => '83',
                42 => '84',
                43 => '85',
                44 => '86',
                45 => '91',
                46 => '92',
                47 => '95',
                48 => '96',
                49 => '98',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
                1 => 11,
            ),
        ),
        30 =>
        array(
            'alpha2' => 'BB',
            'alpha3' => 'BRB',
            'country_code'  => '1',
            'country_name'  => 'Barbados',
            'cn'            => '巴巴多斯',
            'my'            => 'Barbados',
            'id'            => 'Barbados',
            'timezone'      => 'America/Barbados',
            'mobile_begin_with' =>
            array(
                0 => '246',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        31 =>
        array(
            'alpha2' => 'BN',
            'alpha3' => 'BRN',
            'country_code'  => '673',
            'country_name'  => 'Brunei Darussalam',
            'preg_match' => '/brunei\s?darussalam|brunei/i', //Sia240711-add preg_match pattern to brunei
            'cn'            => '文莱达鲁萨兰国',
            'my'            => 'Brunei Darussalam',
            'id'            => 'Brunei Darussalam',
            'timezone'      => 'Asia/Brunei',
            'mobile_begin_with' =>
            array(
                0 => '7',
                1 => '8',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        32 =>
        array(
            'alpha2' => 'BT',
            'alpha3' => 'BTN',
            'country_code'  => '975',
            'country_name'  => 'Bhutan',
            'cn'            => '不丹',
            'my'            => 'Bhutan',
            'id'            => 'Bhutan',
            'timezone'      => 'Asia/Thimphu',
            'mobile_begin_with' =>
            array(
                0 => '17',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        33 =>
        array(
            'alpha2' => 'BW',
            'alpha3' => 'BWA',
            'country_code'  => '267',
            'country_name'  => 'Botswana',
            'cn'            => '博茨瓦纳',
            'my'            => 'Botswana',
            'id'            => 'Botswana',
            'timezone'      => 'Africa/Gaborone',
            'mobile_begin_with' =>
            array(
                0 => '71',
                1 => '72',
                2 => '73',
                3 => '74',
                4 => '75',
                5 => '76',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        34 =>
        array(
            'alpha2' => 'CF',
            'alpha3' => 'CAF',
            'country_code'  => '236',
            'country_name'  => 'Central African Republic',
            'cn'            => '中非共和国',
            'my'            => 'Republik Afrika Tengah',
            'id'            => 'Republik Afrika Tengah',
            'timezone'      => 'Africa/Bangui',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        35 =>
        array(
            'alpha2' => 'CA',
            'alpha3' => 'CAN',
            'country_code'  => '1',
            'country_name'  => 'Canada',
            'cn'            => '加拿大',
            'my'            => 'Kanada',
            'id'            => 'Kanada',
            'timezone'      => 'America/Toronto',
            'mobile_begin_with' =>
            array(
                '204',
                '226',
                '236',
                '249',
                '250',
                '263',
                '289',
                '306',
                '343',
                '354',
                '365',
                '367',
                '368',
                '382',
                '403',
                '416',
                '418',
                '428',
                '431',
                '437',
                '438',
                '450',
                '468',
                '474',
                '506',
                '514',
                '519',
                '548',
                '579',
                '581',
                '584',
                '587',
                '600',
                '604',
                '613',
                '622',
                '633',
                '639',
                '647',
                '672',
                '683',
                '705',
                '709',
                '742',
                '753',
                '778',
                '780',
                '782',
                '807',
                '819',
                '825',
                '867',
                '873',
                '879',
                '902',
                '905',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        36 =>
        array(
            'alpha2' => 'CH',
            'alpha3' => 'CHE',
            'country_code'  => '41',
            'country_name'  => 'Switzerland',
            'cn'            => '瑞士',
            'my'            => 'Switzerland',
            'id'            => 'Switzerland',
            'timezone'      => 'Europe/Zurich',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        37 =>
        array(
            'alpha2' => 'CL',
            'alpha3' => 'CHL',
            'country_code'  => '56',
            'country_name'  => 'Chile',
            'cn'            => '智利',
            'my'            => 'Chile',
            'id'            => 'Chile',
            'timezone'      => 'America/Santiago',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        38 =>
        array(
            'alpha2' => 'CN',
            'alpha3' => 'CHN',
            'country_code'  => '86',
            'country_name'  => 'China',
            'cn'            => '中国',
            'my'            => 'China',
            'id'            => 'China',
            'timezone'      => 'Asia/Shanghai',
            'mobile_begin_with' =>
            array(
                0 => '13',
                1 => '14',
                2 => '15',
                3 => '16',
                4 => '17',
                5 => '18',
                6 => '19',
            ),
            'phone_number_lengths' =>
            array(
                0 => 11,
            ),
        ),
        39 =>
        array(
            'alpha2' => 'CI',
            'alpha3' => 'CIV',
            'country_code'  => '225',
            'country_name'  => 'Ivory Coast',
            'cn'            => '象牙海岸',
            'my'            => 'Ivory Coast',
            'id'            => 'Ivory Coast',
            'timezone'      => 'Africa/Abidjan',
            'mobile_begin_with' =>
            array(
                0 => '0',
                1 => '4',
                2 => '5',
                3 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        40 =>
        array(
            'alpha2' => 'CM',
            'alpha3' => 'CMR',
            'country_code'  => '237',
            'country_name'  => 'Cameroon',
            'cn'            => '喀麦隆',
            'my'            => 'Cameroon',
            'id'            => 'Cameroon',
            'timezone'      => 'Africa/Douala',
            'mobile_begin_with' =>
            array(
                0 => '7',
                1 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        41 =>
        array(
            'alpha2' => 'CD',
            'alpha3' => 'COD',
            'country_code'  => '243',
            'country_name'  => 'Democratic Republic of the Congo',
            'cn'            => '刚果民主共和国',
            'my'            => 'Republik Demokratik Congo',
            'id'            => 'Republik Demokratik Congo',
            'timezone'      => 'Africa/Brazzaville',
            'mobile_begin_with' =>
            array(
                0 => '8',
                1 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        42 =>
        array(
            'alpha2' => 'CG',
            'alpha3' => 'COG',
            'country_code'  => '242',
            'country_name'  => 'Congo',
            'cn'            => '刚果',
            'my'            => 'Congo',
            'id'            => 'Congo',
            'timezone'      => 'Africa/Kinshasa',
            array(
                0 => '0',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        43 =>
        array(
            'alpha2' => 'CK',
            'alpha3' => 'COK',
            'country_code'  => '682',
            'country_name'  => 'Cook Islands',
            'cn'            => '库克群岛',
            'my'            => 'Kepulauan Cook',
            'id'            => 'Kepulauan Cook',
            'timezone'      => 'Pacific/Rarotonga',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 5,
            ),
        ),
        44 =>
        array(
            'alpha2' => 'CO',
            'alpha3' => 'COL',
            'country_code'  => '57',
            'country_name'  => 'Colombia',
            'cn'            => '哥伦比亚',
            'my'            => 'Colombia',
            'id'            => 'Colombia',
            'timezone'      => 'America/Bogota',
            'mobile_begin_with' =>
            array(
                0 => '3',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        45 =>
        array(
            'alpha2' => 'KM',
            'alpha3' => 'COM',
            'country_code'  => '269',
            'country_name'  => 'Comoros',
            'cn'            => '科摩罗',
            'my'            => 'Comoros',
            'id'            => 'Comoros',
            'timezone'      => 'Indian/Comoro',
            'mobile_begin_with' =>
            array(
                0 => '3',
                1 => '76',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        46 =>
        array(
            'alpha2' => 'CV',
            'alpha3' => 'CPV',
            'country_code'  => '238',
            'country_name'  => 'Cape Verde',
            'cn'            => '佛得角',
            'my'            => 'Cape Verde',
            'id'            => 'Cape Verde',
            'timezone'      => 'Atlantic/Cape_Verde',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        47 =>
        array(
            'alpha2' => 'CR',
            'alpha3' => 'CRI',
            'country_code' => '506',
            'country_name' => 'Costa Rica',
            'cn'            => '哥斯达黎加',
            'my'            => 'Costa Rica',
            'id'            => 'Costa Rica',
            'timezone'      => 'America/Costa_Rica',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '6',
                2 => '7',
                3 => '8',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        48 =>
        array(
            'alpha2' => 'CU',
            'alpha3' => 'CUB',
            'country_code'  => '53',
            'country_name'  => 'Cuba',
            'cn'            => '古巴',
            'my'            => 'Cuba',
            'id'            => 'Cuba',
            'timezone'      => 'America/Havana',
            'mobile_begin_with' =>
            array(
                0 => '5',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        49 =>
        array(
            'alpha2' => 'KY',
            'alpha3' => 'CYM',
            'country_code'  => '1',
            'country_name'  => 'Cayman Islands',
            'cn'            => '开曼群岛',
            'my'            => 'Pulau Cayman',
            'id'            => 'Pulau Cayman',
            'timezone'      => 'America/Cayman',
            'mobile_begin_with' =>
            array(
                0 => '345',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        50 =>
        array(
            'alpha2' => 'CY',
            'alpha3' => 'CYP',
            'country_code'  => '357',
            'country_name'  => 'Cyprus',
            'cn'            => '塞浦路斯',
            'my'            => 'Cyprus',
            'id'            => 'Cyprus',
            'timezone'      => 'Asia/Nicosia',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        51 =>
        array(
            'alpha2' => 'CZ',
            'alpha3' => 'CZE',
            'country_code'  => '420',
            'country_name'  => 'Czech Republic',
            'cn'            => '捷克共和国',
            'my'            => 'Republik Czech',
            'id'            => 'Republik Czech',
            'timezone'      => 'Europe/Prague',
            'mobile_begin_with' =>
            array(
                0 => '6',
                1 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        52 =>
        array(
            'alpha2' => 'DE',
            'alpha3' => 'DEU',
            'country_code'  => '49',
            'country_name'  => 'Germany',
            'cn'            => '德国',
            'my'            => 'Germany',
            'id'            => 'germany',
            'timezone'      => 'Europe/Berlin',
            'mobile_begin_with' =>
            array(
                0 => '15',
                1 => '16',
                2 => '17',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
                1 => 11,
            ),
        ),
        53 =>
        array(
            'alpha2' => 'DJ',
            'alpha3' => 'DJI',
            'country_code'  => '253',
            'country_name'  => 'Djibouti',
            'cn'            => '吉布提',
            'my'            => 'Djibouti',
            'id'            => 'Djibouti',
            'timezone'      => 'Africa/Djibouti',
            'mobile_begin_with' =>
            array(
                0 => '77',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        54 =>
        array(
            'alpha2' => 'DM',
            'alpha3' => 'DMA',
            'country_code'  => '1',
            'country_name'  => 'Dominica',
            'cn'            => '多米尼克',
            'my'            => 'Dominica',
            'id'            => 'Dominica',
            'timezone'      => 'America/Dominica',
            'mobile_begin_with' =>
            array(
                0 => '767',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        55 =>
        array(
            'alpha2' => 'DK',
            'alpha3' => 'DNK',
            'country_code'  => '45',
            'country_name'  => 'Denmark',
            'cn'            => '丹麦',
            'my'            => 'Denmark',
            'id'            => 'Denmark',
            'timezone'      => 'Europe/Copenhagen',
            'mobile_begin_with' =>
            array(
                0 => '2',
                1 => '30',
                2 => '31',
                3 => '40',
                4 => '41',
                5 => '42',
                6 => '50',
                7 => '51',
                8 => '52',
                9 => '53',
                10 => '60',
                11 => '61',
                12 => '71',
                13 => '81',
                14 => '91',
                15 => '92',
                16 => '93',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        56 =>
        array(
            'alpha2' => 'DO',
            'alpha3' => 'DOM',
            'country_code'  => '1',
            'country_name'  => 'Dominican Republic',
            'cn'            => '多明尼加共和国',
            'my'            => 'Republik Dominican',
            'id'            => 'Republik Dominican',
            'timezone'      => 'America/Santo_Domingo',
            'mobile_begin_with' =>
            array(
                0 => '809',
                1 => '829',
                2 => '849',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        57 =>
        array(
            'alpha2' => 'DZ',
            'alpha3' => 'DZA',
            'country_code'  => '213',
            'country_name'  => 'Algeria',
            'cn'            => '阿尔及利亚',
            'my'            => 'Algeria',
            'id'            => 'Algeria',
            'timezone'      => 'Africa/Algiers',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '6',
                2 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        58 =>
        array(
            'alpha2' => 'EC',
            'alpha3' => 'ECU',
            'country_code' => '593',
            'country_name' => 'Ecuador',
            'cn'            => '厄瓜多尔',
            'my'            => 'Ecuador',
            'id'            => 'Ecuador',
            'timezone'      => 'America/Guayaquil',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        59 =>
        array(
            'alpha2' => 'EG',
            'alpha3' => 'EGY',
            'country_code'  => '20',
            'country_name'  => 'Egypt',
            'cn'            => '埃及',
            'my'            => 'Egypt',
            'id'            => 'Egypt',
            'timezone'      => 'Africa/Cairo',
            'mobile_begin_with' =>
            array(
                0 => '1',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        60 =>
        array(
            'alpha2' => 'ER',
            'alpha3' => 'ERI',
            'country_code'  => '291',
            'country_name'  => 'Eritrea',
            'cn'            => '厄立特里亚',
            'my'            => 'Eritrea',
            'id'            => 'Eritrea',
            'timezone'      => 'Africa/Asmara',
            'mobile_begin_with' =>
            array(
                0 => '1',
                1 => '7',
                2 => '8',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        61 =>
        array(
            'alpha2' => 'ES',
            'alpha3' => 'ESP',
            'country_code'  => '34',
            'country_name'  => 'Spain',
            'cn'            => '西班牙',
            'my'            => 'Spain',
            'id'            => 'Spain',
            'timezone'      => 'Europe/Madrid',
            'mobile_begin_with' =>
            array(
                0 => '6',
                1 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        62 =>
        array(
            'alpha2' => 'EE',
            'alpha3' => 'EST',
            'country_code'  => '372',
            'country_name'  => 'Estonia',
            'cn'            => '爱沙尼亚',
            'my'            => 'Estonia',
            'id'            => 'Estonia',
            'timezone'      => 'Europe/Tallinn',
            'mobile_begin_with' =>
            array(
                0 => '5',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        63 =>
        array(
            'alpha2' => 'ET',
            'alpha3' => 'ETH',
            'country_code'  => '251',
            'country_name'  => 'Ethiopia',
            'cn'            => '埃塞俄比亚',
            'my'            => 'Ethiopia',
            'id'            => 'Ethiopia',
            'timezone'      => 'Africa/Addis_Ababa',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        64 =>
        array(
            'alpha2' => 'FI',
            'alpha3' => 'FIN',
            'country_code'  => '358',
            'country_name'  => 'Finland',
            'cn'            => '芬兰',
            'my'            => 'Finland',
            'id'            => 'Finland',
            'timezone'      => 'Europe/Helsinki',
            array(
                0 => '4',
                1 => '5',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        65 =>
        array(
            'alpha2' => 'FJ',
            'alpha3' => 'FJI',
            'country_code'  => '679',
            'country_name'  => 'Fiji',
            'cn'            => '斐济',
            'my'            => 'Fiji',
            'id'            => 'Fiji',
            'timezone'      => 'Pacific/Fiji',
            'mobile_begin_with' =>
            array(
                0 => '7',
                1 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        66 =>
        array(
            'alpha2' => 'FK',
            'alpha3' => 'FLK',
            'country_code'  => '500',
            'country_name'  => 'Falkland Islands (Malvinas)',
            'cn'            => '福克兰群岛(马尔维纳斯)',
            'my'            => 'Kepulauan Falkland (Malvinas)',
            'id'            => 'Kepulauan Falkland (Malvinas)',
            'timezone'      => 'Atlantic/Stanley',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 5,
            ),
        ),
        67 =>
        array(
            'alpha2' => 'FR',
            'alpha3' => 'FRA',
            'country_code'  => '33',
            'country_name'  => 'France',
            'cn'            => '法国',
            'my'            => 'France',
            'id'            => 'France',
            'timezone'      => 'Europe/Paris',
            'mobile_begin_with' =>
            array(
                0 => '6',
                1 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        68 =>
        array(
            'alpha2' => 'FO',
            'alpha3' => 'FRO',
            'country_code'  => '298',
            'country_name'  => 'Faroe Islands',
            'cn'            => '法罗群岛',
            'my'            => 'Pulau Faroe',
            'id'            => 'Pulau Faroe',
            'timezone'      => 'Atlantic/Faroe',
            'mobile_begin_with' =>
            array(
                0 => '12',
                1 => '19',
            ),
            'phone_number_lengths' =>
            array(
                0 => 6,
            ),
        ),
        69 =>
        array(
            'alpha2' => 'FM',
            'alpha3' => 'FSM',
            'country_code'  => '691',
            'country_name'  => 'Micronesia',
            'cn'            => '密克罗尼西亚',
            'my'            => 'Mikronesia',
            'id'            => 'Mikronesia',
            'timezone'      => 'Pacific/Pohnpei',
            'mobile_begin_with' =>
            array(
                0 => '92',
                1 => '93',
                2 => '95',
                3 => '97',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        70 =>
        array(
            'alpha2' => 'GA',
            'alpha3' => 'GAB',
            'country_code'  => '241',
            'country_name'  => 'Gabon',
            'cn'            => '加蓬',
            'my'            => 'Gabon',
            'id'            => 'Gabon',
            'timezone'      => 'Africa/Libreville',
            'mobile_begin_with' =>
            array(
                0 => '05',
                1 => '06',
                2 => '07',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        71 =>
        array(
            'alpha2' => 'GB',
            'alpha3' => 'GBR',
            'country_code'  => '44',
            'country_name'  => 'United Kingdom',
            'cn'            => '英国',
            'my'            => 'United Kingdom',
            'id'            => 'United Kingdom',
            'timezone'      => 'Europe/London',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        72 =>
        array(
            'alpha2' => 'GE',
            'alpha3' => 'GEO',
            'country_code'  => '995',
            'country_name'  => 'Georgia',
            'cn'            => '乔治亚州',
            'my'            => 'Georgia',
            'id'            => 'Georgia',
            'timezone'      => 'Asia/Tbilisi',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        73 =>
        array(
            'alpha2' => 'GH',
            'alpha3' => 'GHA',
            'country_code'  => '233',
            'country_name'  => 'Ghana',
            'cn'            => '加纳',
            'my'            => 'Ghana',
            'id'            => 'Ghana',
            'timezone'      => 'Africa/Accra',
            'mobile_begin_with' =>
            array(
                0 => '2',
                1 => '5',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        74 =>
        array(
            'alpha2' => 'GI',
            'alpha3' => 'GIB',
            'country_code'  => '350',
            'country_name'  => 'Gibraltar',
            'cn'            => '直布罗陀',
            'my'            => 'Gibraltar',
            'id'            => 'Gibraltar',
            'timezone'      => 'Europe/Gibraltar',
            'mobile_begin_with' =>
            array(
                0 => '5',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        75 =>
        array(
            'alpha2' => 'GN',
            'alpha3' => 'GIN',
            'country_code'  => '224',
            'country_name'  => 'Guinea',
            'cn'            => '几内亚',
            'my'            => 'Guinea',
            'id'            => 'Guinea',
            'timezone'      => 'Africa/Conakry',
            'mobile_begin_with' =>
            array(
                0 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        76 =>
        array(
            'alpha2' => 'GP',
            'alpha3' => 'GLP',
            'country_code'  => '590',
            'country_name'  => 'Guadeloupe',
            'cn'            => '瓜德罗普',
            'my'            => 'Guadeloupe',
            'id'            => 'Guadeloupe',
            'timezone'      => 'America/Guadeloupe',
            'mobile_begin_with' =>
            array(
                0 => '690',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        77 =>
        array(
            'alpha2' => 'GM',
            'alpha3' => 'GMB',
            'country_code'  => '220',
            'country_name'  => 'Gambia',
            'cn'            => '冈比亚',
            'my'            => 'Gambia',
            'id'            => 'Gambia',
            'timezone'      => 'Africa/Banjul',
            'mobile_begin_with' =>
            array(
                0 => '7',
                1 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        78 =>
        array(
            'alpha2' => 'GW',
            'alpha3' => 'GNB',
            'country_code'  => '245',
            'country_name'  => 'Guinea-Bissau',
            'cn'            => '几内亚比绍',
            'my'            => 'Guinea-Bissau',
            'id'            => 'Guinea-Bissau',
            'timezone'      => 'Africa/Bissau',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '6',
                2 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        79 =>
        array(
            'alpha2' => 'GQ',
            'alpha3' => 'GNQ',
            'country_code'  => '240',
            'country_name'  => 'Equatorial Guinea',
            'cn'            => '赤道几内亚',
            'my'            => 'Equatorial Guinea',
            'id'            => 'Equatorial Guinea',
            'timezone'      => 'Africa/Malabo',
            'mobile_begin_with' =>
            array(
                0 => '222',
                1 => '551',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        80 =>
        array(
            'alpha2' => 'GR',
            'alpha3' => 'GRC',
            'country_code'  => '30',
            'country_name'  => 'Greece',
            'cn'            => '希腊',
            'my'            => 'Greece',
            'id'            => 'Greece',
            'timezone'      => 'Europe/Athens',
            'mobile_begin_with' =>
            array(
                0 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        81 =>
        array(
            'alpha2' => 'GD',
            'alpha3' => 'GRD',
            'country_code'  => '1',
            'country_name'  => 'Grenada',
            'cn'            => '格林纳达',
            'my'            => 'Grenada',
            'id'            => 'Grenada',
            'timezone'      => 'America/Grenada',
            'mobile_begin_with' =>
            array(
                0 => '473',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        82 =>
        array(
            'alpha2' => 'GL',
            'alpha3' => 'GRL',
            'country_code'  => '299',
            'country_name'  => 'Greenland',
            'cn'            => '格陵兰',
            'my'            => 'Greenland',
            'id'            => 'Greenland',
            'timezone'      => 'America/Danmarkshavn',
            'mobile_begin_with' =>
            array(
                0 => '4',
                1 => '5',
            ),
            'phone_number_lengths' =>
            array(
                0 => 6,
            ),
        ),
        83 =>
        array(
            'alpha2' => 'GT',
            'alpha3' => 'GTM',
            'country_code'  => '502',
            'country_name'  => 'Guatemala',
            'cn'            => '危地马拉',
            'my'            => 'Guatemala',
            'id'            => 'Guatemala',
            'timezone'      => 'America/Guatemala',
            'mobile_begin_with' =>
            array(
                0 => '3',
                1 => '4',
                2 => '5',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        84 =>
        array(
            'alpha2' => 'GF',
            'alpha3' => 'GUF',
            'country_code'  => '594',
            'country_name'  => 'French Guiana',
            'cn'            => '法属圭亚那',
            'my'            => 'French Guiana',
            'id'            => 'French Guiana',
            'timezone'      => 'America/Cayenne',
            'mobile_begin_with' =>
            array(
                0 => '694',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        85 =>
        array(
            'alpha2' => 'GU',
            'alpha3' => 'GUM',
            'country_code'  => '1',
            'country_name'  => 'Guam',
            'cn'            => '关岛',
            'my'            => 'Guam',
            'id'            => 'Guam',
            'timezone'      => 'Pacific/Guam',
            'mobile_begin_with' =>
            array(
                0 => '671',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        86 =>
        array(
            'alpha2' => 'GY',
            'alpha3' => 'GUY',
            'country_code'  => '592',
            'country_name'  => 'Guyana',
            'cn'            => '圭亚那',
            'my'            => 'Guyana',
            'id'            => 'Guyana',
            'timezone'      => 'America/Guyana',
            'mobile_begin_with' =>
            array(
                0 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        87 =>
        array(
            'alpha2' => 'HK',
            'alpha3' => 'HKG',
            'country_code'  => '852',
            'country_name'  => 'Hong Kong',
            'cn'            => '香港',
            'my'            => 'Hong Kong',
            'id'            => 'Hong Kong',
            'timezone'      => 'Asia/Hong_Kong',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '6',
                2 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        88 =>
        array(
            'alpha2' => 'HN',
            'alpha3' => 'HND',
            'country_code'  => '504',
            'country_name'  => 'Honduras',
            'cn'            => '洪都拉斯',
            'my'            => 'Honduras',
            'id'            => 'Honduras',
            'timezone'      => 'America/Tegucigalpa',
            'mobile_begin_with' =>
            array(
                0 => '3',
                1 => '7',
                2 => '8',
                3 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        89 =>
        array(
            'alpha2' => 'HR',
            'alpha3' => 'HRV',
            'country_code'  => '385',
            'country_name'  => 'Croatia',
            'cn'            => '克罗地亚',
            'my'            => 'Croatia',
            'id'            => 'Croatia',
            'timezone'      => 'Europe/Zagreb',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
                1 => 9,
            ),
        ),
        90 =>
        array(
            'alpha2' => 'HT',
            'alpha3' => 'HTI',
            'country_code'  => '509',
            'country_name'  => 'Haiti',
            'cn'            => '海地',
            'my'            => 'Haiti',
            'id'            => 'Haiti',
            'timezone'      => 'America/Port-au-Prince',
            'mobile_begin_with' =>
            array(
                0 => '3',
                1 => '4',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        91 =>
        array(
            'alpha2' => 'HU',
            'alpha3' => 'HUN',
            'country_code'  => '36',
            'country_name'  => 'Hungary',
            'cn'            => '匈牙利',
            'my'            => 'Hungary',
            'id'            => 'Hungary',
            'timezone'      => 'Europe/Budapes',
            'mobile_begin_with' =>
            array(
                0 => '20',
                1 => '30',
                2 => '31',
                3 => '70',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        92 =>
        array(
            'alpha2' => 'ID',
            'alpha3' => 'IDN',
            'country_code'  => '62',
            'country_name'  => 'Indonesia',
            'cn'            => '印度尼西亚',
            'my'            => 'Indonesia',
            'id'            => 'Indonesia',
            'timezone'      => 'Asia/Jakarta',
            'mobile_begin_with' =>
            array(
                0 => '8',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
                1 => 10,
                2 => 11,
            ),
        ),
        93 =>
        array(
            'alpha2' => 'IN',
            'alpha3' => 'IND',
            'country_code'  => '91',
            'country_name'  => 'India',
            'cn'            => '印度',
            'my'            => 'India',
            'id'            => 'India',
            'timezone'      => 'Asia/Calcutta',
            'mobile_begin_with' =>
            array(
                0 => '7',
                1 => '8',
                2 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        94 =>
        array(
            'alpha2' => 'IE',
            'alpha3' => 'IRL',
            'country_code'  => '353',
            'country_name'  => 'Ireland',
            'cn'            => '爱尔兰',
            'my'            => 'Ireland',
            'id'            => 'Ireland',
            'timezone'      => 'Europe/Dublin',
            'mobile_begin_with' =>
            array(
                0 => '82',
                1 => '83',
                2 => '84',
                3 => '85',
                4 => '86',
                5 => '87',
                6 => '88',
                7 => '89',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        95 =>
        array(
            'alpha2' => 'IR',
            'alpha3' => 'IRN',
            'country_code'  => '98',
            'country_name'  => 'Iran',
            'cn'            => '伊朗',
            'my'            => 'Iran',
            'id'            => 'Iran',
            'timezone'      => 'Asia/Tehran',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        96 =>
        array(
            'alpha2' => 'IQ',
            'alpha3' => 'IRQ',
            'country_code'  => '964',
            'country_name'  => 'Iraq',
            'cn'            => '伊拉克',
            'my'            => 'Iraq',
            'id'            => 'Iraq',
            'timezone'      => 'Asia/Baghdad',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        97 =>
        array(
            'alpha2' => 'IS',
            'alpha3' => 'ISL',
            'country_code'  => '354',
            'country_name'  => 'Iceland',
            'cn'            => '冰岛',
            'my'            => 'Iceland',
            'id'            => 'Iceland',
            'timezone'      => 'Atlantic/Reykjavik',
            'mobile_begin_with' =>
            array(
                0 => '6',
                1 => '7',
                2 => '8',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        98 =>
        array(
            'alpha2' => 'IL',
            'alpha3' => 'ISR',
            'country_code'  => '972',
            'country_name'  => 'Israel',
            'cn'            => '以色列',
            'my'            => 'Israel',
            'id'            => 'Israel',
            'timezone'      => 'Asia/Jerusalem',
            'mobile_begin_with' =>
            array(
                0 => '5',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        99 =>
        array(
            'alpha2' => 'IT',
            'alpha3' => 'ITA',
            'country_code'  => '39',
            'country_name'  => 'Italy',
            'cn'            => '意大利',
            'my'            => 'Itali',
            'id'            => 'Itali',
            'timezone'      => 'Europe/Rome',
            'mobile_begin_with' =>
            array(
                0 => '3',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        100 =>
        array(
            'alpha2' => 'JM',
            'alpha3' => 'JAM',
            'country_code'  => '1',
            'country_name'  => 'Jamaica',
            'cn'            => '牙买加',
            'my'            => 'Jamaica',
            'id'            => 'Jamaica',
            'timezone'      => 'America/Jamaica',
            'mobile_begin_with' =>
            array(
                '658',
                '876',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        101 =>
        array(
            'alpha2' => 'JO',
            'alpha3' => 'JOR',
            'country_code'  => '962',
            'country_name'  => 'Jordan',
            'cn'            => '约旦',
            'my'            => 'Jordan',
            'id'            => 'Jordan',
            'timezone'      => 'Asia/Amman',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        102 =>
        array(
            'alpha2' => 'JP',
            'alpha3' => 'JPN',
            'country_code'  => '81',
            'country_name'  => 'Japan',
            'cn'            => '日本',
            'my'            => 'Jepun',
            'id'            => 'Jepun',
            'timezone'      => 'Asia/Tokyo',
            'mobile_begin_with' =>
            array(
                0 => '70',
                1 => '80',
                2 => '90',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        103 =>
        array(
            'alpha2' => 'KZ',
            'alpha3' => 'KAZ',
            'country_code'  => '7',
            'country_name'  => 'Kazakhstan',
            'cn'            => '哈萨克斯坦',
            'my'            => 'Kazakhstan',
            'id'            => 'Kazakhstan',
            'timezone'      => 'Asia/Almaty',
            'mobile_begin_with' =>
            array(
                0 => '70',
                1 => '74',
                2 => '77',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        104 =>
        array(
            'alpha2' => 'KE',
            'alpha3' => 'KEN',
            'country_code'  => '254',
            'country_name'  => 'Kenya',
            'cn'            => '肯尼亚',
            'my'            => 'Kenya',
            'id'            => 'Kenya',
            'timezone'      => 'Africa/Nairobi',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        105 =>
        array(
            'alpha2' => 'KG',
            'alpha3' => 'KGZ',
            'country_code'  => '996',
            'country_name'  => 'Kyrgyzstan',
            'cn'            => '吉尔吉斯斯坦',
            'my'            => 'Kyrgyzstan',
            'id'            => 'Kyrgyzstan',
            'timezone'      => 'Asia/Bishkek',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        106 =>
        array(
            'alpha2' => 'KH',
            'alpha3' => 'KHM',
            'country_code'  => '855',
            'country_name'  => 'Cambodia',
            'cn'            => '柬埔寨',
            'my'            => 'Kemboja',
            'id'            => 'Kemboja',
            'timezone'      => 'Asia/Phnom_Penh',
            'mobile_begin_with' =>
            array(
                0 => '1',
                1 => '6',
                2 => '7',
                3 => '8',
                4 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
                1 => 9,
            ),
        ),
        107 =>
        array(
            'alpha2' => 'KI',
            'alpha3' => 'KIR',
            'country_code'  => '686',
            'country_name'  => 'Kiribati',
            'cn'            => '基里巴斯',
            'my'            => 'Kiribati',
            'id'            => 'Kiribati',
            'timezone'      => 'Pacific/Kiritimati',
            'mobile_begin_with' =>
            array(
                0 => '9',
                1 => '30',
            ),
            'phone_number_lengths' =>
            array(
                0 => 5,
            ),
        ),
        108 =>
        array(
            'alpha2' => 'KN',
            'alpha3' => 'KNA',
            'country_code'  => '1',
            'country_name'  => 'Saint Kitts And Nevis',
            'cn'            => '圣基茨和尼维斯',
            'my'            => 'Saint Kitts Dan Nevis',
            'id'            => 'Saint Kitts Dan Nevis',
            'timezone'      => 'America/St_Kitts',
            'mobile_begin_with' =>
            array(
                0 => '869',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        109 =>
        array(
            'alpha2' => 'KR',
            'alpha3' => 'KOR',
            'country_code'  => '82',
            'country_name'  => 'South Korea',
            'cn'            => '韩国',
            'my'            => 'Korea',
            'id'            => 'Korea',
            'timezone'      => 'Asia/Seoul',
            'mobile_begin_with' =>
            array(
                0 => '1',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
                1 => 10,
            ),
        ),
        110 =>
        array(
            'alpha2' => 'KW',
            'alpha3' => 'KWT',
            'country_code'  => '965',
            'country_name'  => 'Kuwait',
            'cn'            => '科威特',
            'my'            => 'Kuwait',
            'id'            => 'Kuwait',
            'timezone'      => 'Asia/Kuwait',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '6',
                2 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        111 =>
        array(
            'alpha2' => 'LA',
            'alpha3' => 'LAO',
            'country_code'  => '856',
            'country_name'  => 'Laos',
            'cn'            => '老挝',
            'my'            => 'Laos',
            'id'            => 'Laos',
            'timezone'      => 'Asia/Vientiane',
            'mobile_begin_with' =>
            array(
                0 => '20',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        112 =>
        array(
            'alpha2' => 'LB',
            'alpha3' => 'LBN',
            'country_code'  => '961',
            'country_name'  => 'Lebanon',
            'cn'            => '黎巴嫩',
            'my'            => 'Lubnan',
            'id'            => 'Lubnan',
            'timezone'      => 'Asia/Beirut',
            'mobile_begin_with' =>
            array(
                0 => '3',
                1 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
                1 => 8,
            ),
        ),
        113 =>
        array(
            'alpha2' => 'LR',
            'alpha3' => 'LBR',
            'country_code'  => '231',
            'country_name'  => 'Liberia',
            'cn'            => '利比里亚',
            'my'            => 'Liberia',
            'id'            => 'Liberia',
            'timezone'      => 'Africa/Monrovia',
            'mobile_begin_with' =>
            array(
                0 => '4',
                1 => '5',
                2 => '6',
                3 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
                1 => 8,
            ),
        ),
        114 =>
        array(
            'alpha2' => 'LY',
            'alpha3' => 'LBY',
            'country_code'  => '218',
            'country_name'  => 'Libyan Arab Jamahiriya',
            'cn'            => '阿拉伯利比亚民众国',
            'my'            => 'Jamahiriya Arab Libya',
            'id'            => 'Jamahiriya Arab Libya',
            'timezone'      => 'Africa/Tripoli',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        115 =>
        array(
            'alpha2' => 'LC',
            'alpha3' => 'LCA',
            'country_code'  => '1',
            'country_name'  => 'Saint Lucia',
            'cn'            => '圣卢西亚',
            'my'            => 'Saint Lucia',
            'id'            => 'Saint Lucia',
            'timezone'      => 'America/St_Lucia',
            'mobile_begin_with' =>
            array(
                0 => '758',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        116 =>
        array(
            'alpha2' => 'LI',
            'alpha3' => 'LIE',
            'country_code'  => '423',
            'country_name'  => 'Liechtenstein',
            'cn'            => '列支敦士登',
            'my'            => 'Liechtenstein',
            'id'            => 'Liechtenstein',
            'timezone'      => 'Europe/Vaduz',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        117 =>
        array(
            'alpha2' => 'LK',
            'alpha3' => 'LKA',
            'country_code'  => '94',
            'country_name'  => 'Sri Lanka',
            'cn'            => '斯里兰卡',
            'my'            => 'Sri Lanka',
            'id'            => 'Sri Lanka',
            'timezone'      => 'Asia/Colombo',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        118 =>
        array(
            'alpha2' => 'LS',
            'alpha3' => 'LSO',
            'country_code'  => '266',
            'country_name'  => 'Lesotho',
            'cn'            => '莱索托',
            'my'            => 'Lesotho',
            'id'            => 'Lesotho',
            'timezone'      => 'Africa/Maseru',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        119 =>
        array(
            'alpha2' => 'LT',
            'alpha3' => 'LTU',
            'country_code'  => '370',
            'country_name'  => 'Lithuania',
            'cn'            => '立陶宛',
            'my'            => 'Lithuania',
            'id'            => 'Lithuania',
            'timezone'      => 'Europe/Vilnius',
            'mobile_begin_with' =>
            array(
                0 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        120 =>
        array(
            'alpha2' => 'LU',
            'alpha3' => 'LUX',
            'country_code'  => '352',
            'country_name'  => 'Luxembourg',
            'cn'            => '卢森堡',
            'my'            => 'Luxembourg',
            'id'            => 'Luxembourg',
            'timezone'      => 'Europe/Luxembourg',
            'mobile_begin_with' =>
            array(
                0 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        121 =>
        array(
            'alpha2' => 'LV',
            'alpha3' => 'LVA',
            'country_code'  => '371',
            'country_name'  => 'Latvia',
            'cn'            => '拉脱维亚',
            'my'            => 'Latvia',
            'id'            => 'Latvia',
            'timezone'      => 'Europe/Riga',
            'mobile_begin_with' =>
            array(
                0 => '2',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        122 =>
        array(
            'alpha2' => 'MO',
            'alpha3' => 'MAC',
            'country_code'  => '853',
            'country_name'  => 'Macao',
            'cn'            => '澳门',
            'my'            => 'Macau',
            'id'            => 'Macau',
            'timezone'      => 'Asia/Macau',
            'mobile_begin_with' =>
            array(
                0 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        123 =>
        array(
            'alpha2' => 'MA',
            'alpha3' => 'MAR',
            'country_code'  => '212',
            'country_name'  => 'Morocco',
            'cn'            => '摩洛哥',
            'my'            => 'Morocco',
            'id'            => 'Morocco',
            'timezone'      => 'Africa/Casablanca',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '6',
                2 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        124 =>
        array(
            'alpha2' => 'MC',
            'alpha3' => 'MCO',
            'country_code'  => '377',
            'country_name'  => 'Monaco',
            'cn'            => '摩纳哥',
            'my'            => 'Monaco',
            'id'            => 'Monaco',
            'timezone'      => 'Europe/Monaco',
            'mobile_begin_with' =>
            array(
                0 => '4',
                1 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
                1 => 9,
            ),
        ),
        125 =>
        array(
            'alpha2' => 'MD',
            'alpha3' => 'MDA',
            'country_code'  => '373',
            'country_name'  => 'Moldova',
            'cn'            => '摩尔多瓦',
            'my'            => 'Moldova',
            'id'            => 'Moldova',
            'timezone'      => 'Europe/Chisinau',
            'mobile_begin_with' =>
            array(
                0 => '6',
                1 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        126 =>
        array(
            'alpha2' => 'MG',
            'alpha3' => 'MDG',
            'country_code'  => '261',
            'country_name'  => 'Madagascar',
            'cn'            => '马达加斯加',
            'my'            => 'Madagascar',
            'id'            => 'Madagascar',
            'timezone'      => 'Indian/Antananarivo',
            'mobile_begin_with' =>
            array(
                0 => '3',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        127 =>
        array(
            'alpha2' => 'MV',
            'alpha3' => 'MDV',
            'country_code'  => '960',
            'country_name'  => 'Maldives',
            'cn'            => '马尔代夫',
            'my'            => 'Maldives',
            'id'            => 'Maldives',
            'timezone'      => 'Indian/Maldives',
            'mobile_begin_with' =>
            array(
                0 => '7',
                1 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        128 =>
        array(
            'alpha2' => 'MX',
            'alpha3' => 'MEX',
            'country_code'  => '52',
            'country_name'  => 'Mexico',
            'cn'            => '墨西哥',
            'my'            => 'Mexico',
            'id'            => 'Mexico',
            'timezone'      => 'America/Mexico_City',
            'mobile_begin_with' =>
            array(
                0 => '55',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
                1 => 11,
            ),
        ),
        129 =>
        array(
            'alpha2' => 'MH',
            'alpha3' => 'MHL',
            'country_code'  => '692',
            'country_name'  => 'Marshall Islands',
            'cn'            => '马绍尔群岛',
            'my'            => 'Pulau Marshall',
            'id'            => 'Pulau Marshall',
            'timezone'      => 'Pacific/Majuro',
            'mobile_begin_with' =>
            array(
                0 => '235',
                1 => '247',
                2 => '329',
                3 => '455',
                4 => '456',
                5 => '528',
                6 => '5451',
                7 => '5452',
                8 => '5453',
                9 => '5454',
                10 => '625',
                11 => '635',
                12 => '9997',
                13 => '9998'
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        130 =>
        array(
            'alpha2' => 'MK',
            'alpha3' => 'MKD',
            'country_code'  => '389',
            'country_name'  => 'Macedonia',
            'cn'            => '马其顿',
            'my'            => 'Macedonia',
            'id'            => 'Macedonia',
            'timezone'      => 'Europe/Skopje',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        131 =>
        array(
            'alpha2' => 'ML',
            'alpha3' => 'MLI',
            'country_code'  => '223',
            'country_name'  => 'Mali',
            'cn'            => '马里',
            'my'            => 'Mali',
            'id'            => 'Mali',
            'timezone'      => 'Africa/Bamako',
            'mobile_begin_with' =>
            array(
                0 => '6',
                1 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        132 =>
        array(
            'alpha2' => 'MT',
            'alpha3' => 'MLT',
            'country_code'  => '356',
            'country_name'  => 'Malta',
            'cn'            => '马耳他',
            'my'            => 'Malta',
            'id'            => 'Malta',
            'timezone'      => 'Europe/Malta',
            'mobile_begin_with' =>
            array(
                0 => '79',
                1 => '99',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        133 =>
        array(
            'alpha2' => 'MM',
            'alpha3' => 'MMR',
            'country_code'  => '95',
            'country_name'  => 'Myanmar',
            'cn'            => '缅甸',
            'my'            => 'Myanmar',
            'id'            => 'Myanmar',
            'timezone'      => 'Asia/Yangon',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        134 =>
        array(
            'alpha2' => 'ME',
            'alpha3' => 'MNE',
            'country_code'  => '382',
            'country_name'  => 'Montenegro',
            'cn'            => '黑山',
            'my'            => 'Montenegro',
            'id'            => 'Montenegro',
            'timezone'      => 'Europe/Podgorica',
            'mobile_begin_with' =>
            array(
                0 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        135 =>
        array(
            'alpha2' => 'MN',
            'alpha3' => 'MNG',
            'country_code'  => '976',
            'country_name'  => 'Mongolia',
            'cn'            => '蒙古',
            'my'            => 'Mongolia',
            'id'            => 'Mongolia',
            'timezone'      => 'Asia/Ulaanbaatar',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '8',
                2 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        136 =>
        array(
            'alpha2' => 'MP',
            'alpha3' => 'MNP',
            'country_code'  => '1',
            'country_name'  => 'Northern Mariana Islands',
            'cn'            => '北马里亚纳群岛',
            'my'            => 'Kepulauan Mariana Utara',
            'id'            => 'Kepulauan Mariana Utara',
            'timezone'      => 'Pacific/Saipan',
            'mobile_begin_with' =>
            array(
                0 => '670',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        137 =>
        array(
            'alpha2' => 'MZ',
            'alpha3' => 'MOZ',
            'country_code'  => '258',
            'country_name'  => 'Mozambique',
            'cn'            => '莫桑比克',
            'my'            => 'Mozambique',
            'id'            => 'Mozambique',
            'timezone'      => 'Africa/Maputo',
            'mobile_begin_with' =>
            array(
                0 => '8',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        138 =>
        array(
            'alpha2' => 'MR',
            'alpha3' => 'MRT',
            'country_code'  => '222',
            'country_name'  => 'Mauritania',
            'cn'            => '毛里塔尼亚',
            'my'            => 'Mauritania',
            'id'            => 'Mauritania',
            'timezone'      => 'Africa/Nouakchott',
            'mobile_begin_with' =>
            array(
                0 => 5,
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        139 =>
        array(
            'alpha2' => 'MS',
            'alpha3' => 'MSR',
            'country_code'  => '1',
            'country_name'  => 'Montserrat',
            'cn'            => '蒙特塞拉特',
            'my'            => 'Montserrat',
            'id'            => 'Montserrat',
            'timezone'      => 'America/Montserrat',
            'mobile_begin_with' =>
            array(
                0 => '664',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        140 =>
        array(
            'alpha2' => 'MQ',
            'alpha3' => 'MTQ',
            'country_code'  => '596',
            'country_name'  => 'Martinique',
            'cn'            => '马提尼克岛',
            'my'            => 'Martinik',
            'id'            => 'Martinik',
            'timezone'      => 'America/Martinique',
            'mobile_begin_with' =>
            array(
                0 => '696',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        141 =>
        array(
            'alpha2' => 'MU',
            'alpha3' => 'MUS',
            'country_code'  => '230',
            'country_name'  => 'Mauritius',
            'cn'            => '毛里求斯',
            'my'            => 'Mauritius',
            'id'            => 'Mauritius',
            'timezone'      => 'Indian/Mauritius',
            'mobile_begin_with' =>
            array(
                0 => '5',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        142 =>
        array(
            'alpha2' => 'MW',
            'alpha3' => 'MWI',
            'country_code'  => '265',
            'country_name'  => 'Malawi',
            'cn'            => '马拉维',
            'my'            => 'Malawi',
            'id'            => 'Malawi',
            'timezone'      => 'Africa/Blantyre',
            'mobile_begin_with' =>
            array(
                0 => '77',
                1 => '88',
                2 => '99',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        143 =>
        array(
            'alpha2' => 'MY',
            'alpha3' => 'MYS',
            'country_code'  => '60',
            'country_name'  => 'Malaysia',
            'cn'            => '马来西亚',
            'my'            => 'Malaysia',
            'id'            => 'Malaysia',
            'timezone'      => 'Asia/Kuala_Lumpur',
            'mobile_begin_with' =>
            array(
                0 => '10',
                1 => '11',
                2 => '12',
                3 => '13',
                4 => '14',
                5 => '15',
                6 => '16',
                7 => '17',
                8 => '18',
                9 => '19',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
                1 => 10,
            ),
            'special_prefix' => [
                'digi'  => '/^60159(1[0-4]|16|6[0-4])/',
                'celcom' => '/^601592[0-9]/',
                'webe' => '/^6015484[89]/',
                'maxis' => '/^60154851/',
                'others' => '/^6015(1|2|3|46(0[0-9]|1[0-3])|4821|484[01]|4870).*$/'
            ],
            'invalid_range' => [
                '/^6010(0|1)[0-9]{6}$/',        // MK250803 6010 000 0000 - 6010 199 9999 are all invalid range
                /*
                Invalid Range - Checked on 250803 [from our dipping records]
                60100000000 - 60101999999
                60104700000 - 60104999999
                60106700000 - 60106999999
                60107200000 - 60107599999
                60109900000 - 60109999999
                60110000000 - 60119999999
                60120000000 - 60121999999
                60130000000 - 60131999999
                60140000000 - 60141999999
                60144010000 - 60144999999
                60160000000 - 60161999999
                60170000000 - 60171999999
                60180000000 - 60181999999
                60184750000 - 60185699999
                60187200000 - 60187599999
                60188750000 - 60188999999
                60189900000 - 60189999999
                60190000000 - 60191999999
                601000000000 - 601099999999
                601100000000 - 601109999999
                601175800000 - 601175899999
                601175900000 - 601175999999
                601175999999 - 601179999999
                601180000000 - 601188859999
                601188900000 - 601188999999
                601189000000 - 601189999999
                601190000000 - 601199999999
                601200000000 - 601590999999
                601597000000 - 601597999999
                601598000000 - 601598999999
                601599000000 - 601599999999
                601600000000 - 601699999999
                601700000000 - 601799999999
                601800000000 - 601899999999
                601900000000 - 601999999999

                */
            ],
        ),
        144 =>
        array(
            'alpha2' => 'YT',
            'alpha3' => 'MYT',
            'country_code'  => '269',
            'country_name'  => 'Mayotte',
            'cn'            => '马约特',
            'my'            => 'Mayotte',
            'id'            => 'Mayotte',
            'timezone'      => 'Indian/Mayotte',
            'mobile_begin_with' =>
            array(
                0 => '639',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        145 =>
        array(
            'alpha2' => 'NA',
            'alpha3' => 'NAM',
            'country_code'  => '264',
            'country_name'  => 'Namibia',
            'cn'            => '纳米比亚',
            'my'            => 'Namibia',
            'id'            => 'Namibia',
            'timezone'      => 'Africa/Windhoek',
            'mobile_begin_with' =>
            array(
                0 => '60',
                1 => '81',
                2 => '82',
                3 => '85',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        146 =>
        array(
            'alpha2' => 'NC',
            'alpha3' => 'NCL',
            'country_code'  => '687',
            'country_name'  => 'New Caledonia',
            'cn'            => '新喀里多尼亚',
            'my'            => 'New Caledonia',
            'id'            => 'New Caledonia',
            'timezone'      => 'Pacific/Noumea',
            'mobile_begin_with' =>
            array(
                0 => 5,
                1 => 7,
                2 => 8,
                3 => 9,
            ),
            'phone_number_lengths' =>
            array(
                0 => 6,
            ),
        ),
        147 =>
        array(
            'alpha2' => 'NE',
            'alpha3' => 'NER',
            'country_code'  => '227',
            'country_name'  => 'Niger',
            'cn'            => '尼日尔',
            'my'            => 'Niger',
            'id'            => 'Niger',
            'timezone'      => 'Africa/Niamey',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        148 =>
        array(
            'alpha2' => 'NF',
            'alpha3' => 'NFK',
            'country_code'  => '672',
            'country_name'  => 'Norfolk Island',
            'cn'            => '诺福克岛',
            'my'            => 'Pulau Norfolk',
            'id'            => 'Pulau Norfolk',
            'timezone'      => 'Pacific/Norfolk',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '8',
            ),
            'phone_number_lengths' =>
            array(
                0 => 5,
            ),
        ),
        149 =>
        array(
            'alpha2' => 'NG',
            'alpha3' => 'NGA',
            'country_code'  => '234',
            'country_name'  => 'Nigeria',
            'cn'            => '尼日利亚',
            'my'            => 'Nigeria',
            'id'            => 'Nigeria',
            'timezone'      => 'Africa/Lagos',
            'mobile_begin_with' =>
            array(
                0 => '70',
                1 => '80',
                2 => '81',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        150 =>
        array(
            'alpha2' => 'NI',
            'alpha3' => 'NIC',
            'country_code'  => '505',
            'country_name'  => 'Nicaragua',
            'cn'            => '尼加拉瓜',
            'my'            => 'Nicaragua',
            'id'            => 'Nicaragua',
            'timezone'      => 'America/Managua',
            'mobile_begin_with' =>
            array(
                0 => '8',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        151 =>
        array(
            'alpha2' => 'NU',
            'alpha3' => 'NIU',
            'country_code'  => '683',
            'country_name'  => 'Niue',
            'cn'            => '纽埃',
            'my'            => 'Niue',
            'id'            => 'Niue',
            'timezone'      => 'Pacific/Niue',
            'mobile_begin_with' =>
            array(
                0 => '1',
                1 => '3',
                2 => '4',
            ),
            'phone_number_lengths' =>
            array(
                0 => 4,
            ),
        ),
        152 =>
        array(
            'alpha2' => 'NL',
            'alpha3' => 'NLD',
            'country_code'  => '31',
            'country_name'  => 'Netherlands',
            'cn'            => '荷兰',
            'my'            => 'Netherlands',
            'id'            => 'Netherlands',
            'timezone'      => 'Europe/Amsterdam',
            'mobile_begin_with' =>
            array(
                0 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        153 =>
        array(
            'alpha2' => 'NO',
            'alpha3' => 'NOR',
            'country_code'  => '47',
            'country_name'  => 'Norway',
            'cn'            => '挪威',
            'my'            => 'Norway',
            'id'            => 'Norway',
            'timezone'      => 'Europe/Oslo',
            'mobile_begin_with' =>
            array(
                0 => '4',
                1 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        154 =>
        array(
            'alpha2' => 'NP',
            'alpha3' => 'NPL',
            'country_code'  => '977',
            'country_name'  => 'Nepal',
            'cn'            => '尼泊尔',
            'my'            => 'Nepal',
            'id'            => 'Nepal',
            'timezone'      => 'Asia/Kathmandu',
            'mobile_begin_with' =>
            array(
                0 => '97',
                1 => '98',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        155 =>
        array(
            'alpha2' => 'NR',
            'alpha3' => 'NRU',
            'country_code'  => '674',
            'country_name'  => 'Nauru',
            'cn'            => '瑙鲁',
            'my'            => 'Nauru',
            'id'            => 'Nauru',
            'timezone'      => 'Pacific/Nauru',
            'mobile_begin_with' =>
            array(
                0 => '555',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        156 =>
        array(
            'alpha2' => 'NZ',
            'alpha3' => 'NZL',
            'country_code'  => '64',
            'country_name'  => 'New Zealand',
            'cn'            => '新西兰',
            'my'            => 'New Zealand',
            'id'            => 'New Zealand',
            'timezone'      => 'Pacific/Auckland',
            'mobile_begin_with' =>
            array(
                0 => '2',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
                1 => 9,
                2 => 10,
            ),
        ),
        157 =>
        array(
            'alpha2' => 'OM',
            'alpha3' => 'OMN',
            'country_code'  => '968',
            'country_name'  => 'Oman',
            'cn'            => '阿曼',
            'my'            => 'Oman',
            'id'            => 'Oman',
            'timezone'      => 'Asia/Musca',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        158 =>
        array(
            'alpha2' => 'PK',
            'alpha3' => 'PAK',
            'country_code'  => '92',
            'country_name'  => 'Pakistan',
            'cn'            => '巴基斯坦',
            'my'            => 'Pakistan',
            'id'            => 'Pakistan',
            'timezone'      => 'Asia/Karachi',
            'mobile_begin_with' =>
            array(
                0 => '3',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        159 =>
        array(
            'alpha2' => 'PA',
            'alpha3' => 'PAN',
            'country_code'  => '507',
            'country_name'  => 'Panama',
            'cn'            => '巴拿马',
            'my'            => 'Panama',
            'id'            => 'Panama',
            'timezone'      => 'America/Panama',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        160 =>
        array(
            'alpha2' => 'PE',
            'alpha3' => 'PER',
            'country_code'  => '51',
            'country_name'  => 'Peru',
            'cn'            => '秘鲁',
            'my'            => 'Peru',
            'id'            => 'Peru',
            'timezone'      => 'America/Lima',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        161 =>
        array(
            'alpha2' => 'PH',
            'alpha3' => 'PHL',
            'country_code'  => '63',
            'country_name'  => 'Philippines',
            'cn'            => '菲律宾',
            'my'            => 'Filipina',
            'id'            => 'Filipina',
            'timezone'      => 'Asia/Manila',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        162 =>
        array(
            'alpha2' => 'PW',
            'alpha3' => 'PLW',
            'country_code'  => '680',
            'country_name'  => 'Palau',
            'cn'            => '帕劳',
            'my'            => 'Palau',
            'id'            => 'Palau',
            'timezone'      => 'Pacific/Palau',
            'mobile_begin_with' =>
            array(
                0 => '544',
                1 => '587',
                2 => '277',
                3 => '876',
                4 => '488',
                5 => '654',
                6 => '824',
                7 => '855',
                8 => '747',
                9 => '535',
                10 => '622',
                11 => '733',
                12 => '679',
                13 => '345',
                14 => '255',
                15 => '255',
                16 => '880',
                17 => '881',
                18 => '882',
                19 => '883',
                20 => '884',
                21 => '770',
                22 => '771',
                23 => '772',
                24 => '773',
                25 => '774',
                26 => '775',
                27 => '776',
                28 => '777',
                29 => '778',
                30 => '620',
                31 => '630',
                32 => '640',
                33 => '660',
                34 => '680',
                35 => '690',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        163 =>
        array(
            'alpha2' => 'PG',
            'alpha3' => 'PNG',
            'country_code'  => '675',
            'country_name'  => 'Papua New Guinea',
            'cn'            => '巴布亚新几内亚',
            'my'            => 'Papua New Guinea',
            'id'            => 'Papua New Guinea',
            'timezone'      => 'Pacific/Port_Moresby',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        164 =>
        array(
            'alpha2' => 'PL',
            'alpha3' => 'POL',
            'country_code'  => '48',
            'country_name'  => 'Poland',
            'cn'            => '波兰',
            'my'            => 'Poland',
            'id'            => 'Poland',
            'timezone'      => 'Europe/Warsaw',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '6',
                2 => '7',
                3 => '8',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        165 =>
        array(
            'alpha2' => 'PR',
            'alpha3' => 'PRI',
            'country_code'  => '1',
            'country_name'  => 'Puerto Rico',
            'cn'            => '波多黎各',
            'my'            => 'Puerto Rico',
            'id'            => 'Puerto Rico',
            'timezone'      => 'America/Puerto_Rico',
            'mobile_begin_with' =>
            array(
                0 => '787',
                1 => '939',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        166 =>
        array(
            'alpha2' => 'PT',
            'alpha3' => 'PRT',
            'country_code'  => '351',
            'country_name'  => 'Portugal',
            'cn'            => '葡萄牙',
            'my'            => 'Portugal',
            'id'            => 'Portugal',
            'timezone'      => 'Europe/Lisbon',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        167 =>
        array(
            'alpha2' => 'PY',
            'alpha3' => 'PRY',
            'country_code'  => '595',
            'country_name'  => 'Paraguay',
            'cn'            => '巴拉圭',
            'my'            => 'Paraguay',
            'id'            => 'Paraguay',
            'timezone'      => 'America/Asuncion',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        168 =>
        array(
            'alpha2' => 'PS',
            'alpha3' => 'PSE',
            'country_code'  => '970',
            'country_name'  => 'Palestinian Territory',
            'cn'            => '巴勒斯坦领土',
            'my'            => 'Wilayah Palestin',
            'id'            => 'Wilayah Palestin',
            'timezone'      => 'Asia/Gaza',
            'mobile_begin_with' =>
            array(
                0 => '5',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        169 =>
        array(
            'alpha2' => 'PF',
            'alpha3' => 'PYF',
            'country_code'  => '689',
            'country_name'  => 'French Polynesia',
            'cn'            => '法属波利尼西亚',
            'my'            => 'French Polynesia',
            'id'            => 'French Polynesia',
            'timezone'      => 'Pacific/Tahiti',
            'mobile_begin_with' =>
            array(
                0 => '40',
                1 => '49',
                2 => '87',
                3 => '88',
                4 => '89',
            ),
            'phone_number_lengths' =>
            array(
                0 => 6,
            ),
        ),
        170 =>
        array(
            'alpha2' => 'QA',
            'alpha3' => 'QAT',
            'country_code'  => '974',
            'country_name'  => 'Qatar',
            'cn'            => '卡塔尔',
            'my'            => 'Qatar',
            'id'            => 'Qatar',
            'timezone'      => 'Asia/Qatar',
            'mobile_begin_with' =>
            array(
                0 => '33',
                1 => '55',
                2 => '66',
                3 => '77',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        171 =>
        array(
            'alpha2' => 'RE',
            'alpha3' => 'REU',
            'country_code'  => '262',
            'country_name'  => 'Reunion',
            'cn'            => '留尼汪',
            'my'            => 'Reunion',
            'id'            => 'Reunion',
            'timezone'      => 'Indian/Reunion',
            'mobile_begin_with' =>
            array(
                0 => '692',
                1 => '693',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        172 =>
        array(
            'alpha2' => 'RO',
            'alpha3' => 'ROU',
            'country_code'  => '40',
            'country_name'  => 'Romania',
            'cn'            => '罗马尼亚',
            'my'            => 'Romania',
            'id'            => 'Romania',
            'timezone'      => 'Europe/Bucharest',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        173 =>
        array(
            'alpha2' => 'RU',
            'alpha3' => 'RUS',
            'country_code'  => '7',
            'country_name'  => 'Russian Federation',
            'cn'            => '俄罗斯联邦',
            'my'            => 'Russian Federation',
            'id'            => 'Russian Federation',
            'timezone'      => 'Europe/Moscow',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        174 =>
        array(
            'alpha2' => 'RW',
            'alpha3' => 'RWA',
            'country_code'  => '250',
            'country_name'  => 'Rwanda',
            'cn'            => '卢旺达',
            'my'            => 'Rwanda',
            'id'            => 'Rwanda',
            'timezone'      => 'Africa/Kigali',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        175 =>
        array(
            'alpha2' => 'SA',
            'alpha3' => 'SAU',
            'country_code'  => '966',
            'country_name'  => 'Saudi Arabia',
            'cn'            => '沙特阿拉伯',
            'my'            => 'Arab Saudi',
            'id'            => 'Arab Saudi',
            'timezone'      => 'Asia/Riyadh',
            'mobile_begin_with' =>
            array(
                0 => '5',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        176 =>
        array(
            'alpha2' => 'SD',
            'alpha3' => 'SDN',
            'country_code'  => '249',
            'country_name'  => 'Sudan',
            'cn'            => '苏丹',
            'my'            => 'Sudan',
            'id'            => 'Sudan',
            'timezone'      => 'Africa/Khartoum',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        177 =>
        array(
            'alpha2' => 'SN',
            'alpha3' => 'SEN',
            'country_code'  => '221',
            'country_name'  => 'Senegal',
            'cn'            => '塞内加尔',
            'my'            => 'Senegal',
            'id'            => 'Senegal',
            'timezone'      => 'Africa/Dakar',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        178 =>
        array(
            'alpha2' => 'SG',
            'alpha3' => 'SGP',
            'country_code'  => '65',
            'country_name'  => 'Singapore',
            'cn'            => '新加坡',
            'my'            => 'Singapura',
            'id'            => 'Singapura',
            'timezone'      => 'Asia/Singapore',
            'mobile_begin_with' =>
            array(
                0 => '8',
                1 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        179 =>
        array(
            'alpha2' => 'SH',
            'alpha3' => 'SHN',
            'country_code'  => '290',
            'country_name'  => 'Saint Helena',
            'cn'            => '圣赫勒拿',
            'my'            => 'Saint Helena',
            'id'            => 'Saint Helena',
            'timezone'      => 'Atlantic/St_Helena',
            'mobile_begin_with' =>
            array(
                0 => '1',
                1 => '3',
                2 => '4',
                3 => '5',
                4 => '6',
                5 => '7',
                6 => '8',
                7 => '9',
                8 => '20',
                9 => '21',
                10 => '22',
                11 => '23',
                12 => '24',
                13 => '25',
                14 => '260',
                15 => '261',
                16 => '262',
                17 => '263',
                18 => '264',
                19 => '29',
            ),
            'phone_number_lengths' =>
            array(
                0 => 4,
            ),
        ),
        180 =>
        array(
            'alpha2' => 'SJ',
            'alpha3' => 'SJM',
            'country_code'  => '47',
            'country_name'  => 'Svalbard And Jan Mayen',
            'cn'            => '斯瓦尔巴和扬马延',
            'my'            => 'Svalbard Dan Jan Mayen',
            'id'            => 'Svalbard Dan Jan Mayen',
            'timezone'      => 'Arctic/Longyearbyen',
            'mobile_begin_with' =>
            array(
                0 => '7'
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        181 =>
        array(
            'alpha2' => 'SB',
            'alpha3' => 'SLB',
            'country_code'  => '677',
            'country_name'  => 'Solomon Islands',
            'cn'            => '所罗门群岛',
            'my'            => 'Solomon Islands',
            'id'            => 'Solomon Islands',
            'timezone'      => 'Pacific/Guadalcanal',
            'mobile_begin_with' =>
            array(
                0 => '7',
                1 => '8',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        182 =>
        array(
            'alpha2' => 'SL',
            'alpha3' => 'SLE',
            'country_code'  => '232',
            'country_name'  => 'Sierra Leone',
            'cn'            => '塞拉利昂',
            'my'            => 'Sierra Leone',
            'id'            => 'Sierra Leone',
            'timezone'      => 'Africa/Freetown',
            'mobile_begin_with' =>
            array(
                0 => '21',
                1 => '25',
                2 => '30',
                3 => '33',
                4 => '34',
                5 => '40',
                6 => '44',
                7 => '50',
                8 => '55',
                9 => '76',
                10 => '77',
                11 => '78',
                12 => '79',
                13 => '88',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        183 =>
        array(
            'alpha2' => 'SV',
            'alpha3' => 'SLV',
            'country_code'  => '503',
            'country_name'  => 'El Salvador',
            'cn'            => '萨尔瓦多',
            'my'            => 'El Salvador',
            'id'            => 'El Salvador',
            'timezone'      => 'America/El_Salvador',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        184 =>
        array(
            'alpha2' => 'SM',
            'alpha3' => 'SMR',
            'country_code'  => '378',
            'country_name'  => 'San Marino',
            'cn'            => '圣马力诺',
            'my'            => 'San Marino',
            'id'            => 'San Marino',
            'timezone'      => 'Europe/San_Marino',
            'mobile_begin_with' =>
            array(
                0 => '3',
                1 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        185 =>
        array(
            'alpha2' => 'SO',
            'alpha3' => 'SOM',
            'country_code'  => '252',
            'country_name'  => 'Somalia',
            'cn'            => '索马里',
            'my'            => 'Somalia',
            'id'            => 'Somalia',
            'timezone'      => 'Africa/Mogadishu',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        186 =>
        array(
            'alpha2' => 'PM',
            'alpha3' => 'SPM',
            'country_code'  => '508',
            'country_name'  => 'Saint Pierre And Miquelon',
            'cn'            => '圣皮埃尔和密克隆',
            'my'            => 'Saint Pierre Dan Miquelon',
            'id'            => 'Saint Pierre Dan Miquelon',
            'timezone'      => 'America/Miquelon',
            'mobile_begin_with' =>
            array(
                0 => '55',
            ),
            'phone_number_lengths' =>
            array(
                0 => 6,
            ),
        ),
        187 =>
        array(
            'alpha2' => 'RS',
            'alpha3' => 'SRB',
            'country_code'  => '381',
            'country_name'  => 'Serbia',
            'cn'            => '塞尔维亚',
            'my'            => 'Serbia',
            'id'            => 'Serbia',
            'timezone'      => 'Europe/Belgrade',
            'mobile_begin_with' =>
            array(
                0 => '6',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
                1 => 9,
            ),
        ),
        188 =>
        array(
            'alpha2' => 'ST',
            'alpha3' => 'STP',
            'country_code'  => '239',
            'country_name'  => 'Sao Tome and Principe',
            'cn'            => '圣多美和普林西比',
            'my'            => 'Sao Tome dan Principe',
            'id'            => 'Sao Tome dan Principe',
            'timezone'      => 'Africa/Sao_Tome',
            'mobile_begin_with' =>
            array(
                0 => '98',
                1 => '99',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        189 =>
        array(
            'alpha2' => 'SR',
            'alpha3' => 'SUR',
            'country_code'  => '597',
            'country_name'  => 'Suriname',
            'cn'            => '苏里南',
            'my'            => 'Suriname',
            'id'            => 'Suriname',
            'timezone'      => 'America/Paramaribo',
            'mobile_begin_with' =>
            array(
                0 => '6',
                1 => '7',
                2 => '8',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        190 =>
        array(
            'alpha2' => 'SK',
            'alpha3' => 'SVK',
            'country_code'  => '421',
            'country_name'  => 'Slovakia',
            'cn'            => '斯洛伐克',
            'my'            => 'Slovakia',
            'id'            => 'Slovakia',
            'timezone'      => 'Europe/Bratislava',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        191 =>
        array(
            'alpha2' => 'SI',
            'alpha3' => 'SVN',
            'country_code'  => '386',
            'country_name'  => 'Slovenia',
            'cn'            => '斯洛文尼亚',
            'my'            => 'Slovenia',
            'id'            => 'Slovenia',
            'timezone'      => 'Europe/Ljubljana',
            'mobile_begin_with' =>
            array(
                0 => '3',
                1 => '4',
                2 => '5',
                3 => '6',
                4 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        192 =>
        array(
            'alpha2' => 'SE',
            'alpha3' => 'SWE',
            'country_code'  => '46',
            'country_name'  => 'Sweden',
            'cn'            => '瑞典',
            'my'            => 'Sweden',
            'id'            => 'Sweden',
            'timezone'      => 'Europe/Stockholm',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        193 =>
        array(
            'alpha2' => 'SC',
            'alpha3' => 'SYC',
            'country_code'  => '248',
            'country_name'  => 'Seychelles',
            'cn'            => '塞舌尔',
            'my'            => 'Seychelles',
            'id'            => 'Seychelles',
            'timezone'      => 'Indian/Mahe',
            'mobile_begin_with' =>
            array(
                0 => '2',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        194 =>
        array(
            'alpha2' => 'SY',
            'alpha3' => 'SYR',
            'country_code'  => '963',
            'country_name'  => 'Syrian Arab Republic',
            'cn'            => '阿拉伯叙利亚共和国',
            'my'            => 'Republik Arab Syria',
            'id'            => 'Republik Arab Syria',
            'timezone'      => 'Asia/Damascus',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        195 =>
        array(
            'alpha2' => 'TC',
            'alpha3' => 'TCA',
            'country_code'  => '1',
            'country_name'  => 'Turks and Caicos Islands',
            'cn'            => '特克斯和凯科斯群岛',
            'my'            => 'Kepulauan Turks dan Caicos',
            'id'            => 'Kepulauan Turks dan Caicos',
            'timezone'      => 'America/Grand_Turk',
            'mobile_begin_with' =>
            array(
                0 => '649',
                // 0 => '2',
                // 1 => '3',
                // 2 => '4',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        196 =>
        array(
            'alpha2' => 'TD',
            'alpha3' => 'TCD',
            'country_code'  => '235',
            'country_name'  => 'Chad',
            'cn'            => '乍得',
            'my'            => 'Chad',
            'id'            => 'Chad',
            'timezone'      => 'Africa/Ndjamena',
            'mobile_begin_with' =>
            array(
                0 => '6',
                1 => '7',
                2 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        197 =>
        array(
            'alpha2' => 'TG',
            'alpha3' => 'TGO',
            'country_code'  => '228',
            'country_name'  => 'Togo',
            'cn'            => '多哥',
            'my'            => 'Togo',
            'id'            => 'Togo',
            'timezone'      => 'Africa/Lome',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        198 =>
        array(
            'alpha2' => 'TH',
            'alpha3' => 'THA',
            'country_code'  => '66',
            'country_name'  => 'Thailand',
            'cn'            => '泰国',
            'my'            => 'Thailand',
            'id'            => 'Thailand',
            'timezone'      => 'Asia/Bangkok',
            'mobile_begin_with' =>
            array(
                0 => '8',
                1 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        199 =>
        array(
            'alpha2' => 'TJ',
            'alpha3' => 'TJK',
            'country_code'  => '992',
            'country_name'  => 'Tajikistan',
            'cn'            => '塔吉克斯坦',
            'my'            => 'Tajikistan',
            'id'            => 'Tajikistan',
            'timezone'      => 'Asia/Dushanbe',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        200 =>
        array(
            'alpha2' => 'TK',
            'alpha3' => 'TKL',
            'country_code'  => '690',
            'country_name'  => 'Tokelau',
            'cn'            => '托克劳',
            'my'            => 'Tokelau',
            'id'            => 'Tokelau',
            'timezone'      => 'Pacific/Fakaofo',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 4,
            ),
        ),
        201 =>
        array(
            'alpha2' => 'TM',
            'alpha3' => 'TKM',
            'country_code'  => '993',
            'country_name'  => 'Turkmenistan',
            'cn'            => '土库曼斯坦',
            'my'            => 'Turkmenistan',
            'id'            => 'Turkmenistan',
            'timezone'      => 'Asia/Ashgabat',
            'mobile_begin_with' =>
            array(
                0 => '61',
                1 => '62',
                2 => '63',
                3 => '64',
                4 => '65',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        202 =>
        array(
            'alpha2' => 'TL',
            'alpha3' => 'TLS',
            'country_code'  => '670',
            'country_name'  => 'Timor-Leste',
            'cn'            => '东帝汶',
            'my'            => 'Timor-Leste',
            'id'            => 'Timor-Leste',
            'timezone'      => 'Asia/Dili',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        203 =>
        array(
            'alpha2' => 'TO',
            'alpha3' => 'TON',
            'country_code'  => '676',
            'country_name'  => 'Tonga',
            'cn'            => '汤加',
            'my'            => 'Tonga',
            'id'            => 'Tonga',
            'timezone'      => 'Pacific/Tongatapu',
            'mobile_begin_with' =>
            array(
                0 => '87',
                1 => '88',
                2 => '89',
            ),
            'phone_number_lengths' =>
            array(
                0 => 5,
            ),
        ),
        204 =>
        array(
            'alpha2' => 'TT',
            'alpha3' => 'TTO',
            'country_code'  => '1',
            'country_name'  => 'Trinidad and Tobago',
            'cn'            => '特立尼达和多巴哥',
            'my'            => 'Trinidad dan Tobago',
            'id'            => 'Trinidad dan Tobago',
            'timezone'      => 'America/Port_of_Spain',
            'mobile_begin_with' =>
            array(
                0 => '868',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        205 =>
        array(
            'alpha2' => 'TN',
            'alpha3' => 'TUN',
            'country_code'  => '216',
            'country_name'  => 'Tunisia',
            'cn'            => '突尼斯',
            'my'            => 'Tunisia',
            'id'            => 'Tunisia',
            'timezone'      => 'Africa/Tunis',
            'mobile_begin_with' =>
            array(
                0 => '2',
                1 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        206 =>
        array(
            'alpha2' => 'TR',
            'alpha3' => 'TUR',
            'country_code'  => '90',
            'country_name'  => 'Turkey',
            'cn'            => '土耳其',
            'my'            => 'Turki',
            'id'            => 'Turki',
            'timezone'      => 'Europe/Istanbul',
            'mobile_begin_with' =>
            array(
                0 => '5',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        207 =>
        array(
            'alpha2' => 'TV',
            'alpha3' => 'TUV',
            'country_code'  => '688',
            'country_name'  => 'Tuvalu',
            'cn'            => '图瓦卢',
            'my'            => 'Tuvalu',
            'id'            => 'Tuvalu',
            'timezone'      => 'Pacific/Funafuti',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 5,
            ),
        ),
        208 =>
        array(
            'alpha2' => 'TW',
            'alpha3' => 'TWN',
            'country_code'  => '886',
            'country_name'  => 'Taiwan',
            'cn'            => '台湾',
            'my'            => 'Taiwan',
            'id'            => 'Taiwan',
            'timezone'      => 'Asia/Taipei',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        209 =>
        array(
            'alpha2' => 'TZ',
            'alpha3' => 'TZA',
            'country_code'  => '255',
            'country_name'  => 'Tanzania',
            'cn'            => '坦桑尼亚',
            'my'            => 'Tanzania',
            'id'            => 'Tanzania',
            'timezone'      => 'Africa/Dar_es_Salaam',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        210 =>
        array(
            'alpha2' => 'UG',
            'alpha3' => 'UGA',
            'country_code'  => '256',
            'country_name'  => 'Uganda',
            'cn'            => '乌干达',
            'my'            => 'Uganda',
            'id'            => 'Uganda',
            'timezone'      => 'Africa/Kampala',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        211 =>
        array(
            'alpha2' => 'UA',
            'alpha3' => 'UKR',
            'country_code'  => '380',
            'country_name'  => 'Ukraine',
            'cn'            => '乌克兰',
            'my'            => 'Ukraine',
            'id'            => 'Ukraine',
            'timezone'      => 'Europe/Kyiv',
            'mobile_begin_with' =>
            array(
                0 => '39',
                1 => '50',
                2 => '63',
                3 => '66',
                4 => '67',
                5 => '68',
                6 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        212 =>
        array(
            'alpha2' => 'UY',
            'alpha3' => 'URY',
            'country_code'  => '598',
            'country_name'  => 'Uruguay',
            'cn'            => '乌拉圭',
            'my'            => 'Uruguay',
            'id'            => 'Uruguay',
            'timezone'      => 'America/Montevideo',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        213 =>
        array(
            'alpha2' => 'UZ',
            'alpha3' => 'UZB',
            'country_code'  => '998',
            'country_name'  => 'Uzbekistan',
            'cn'            => '乌兹别克斯坦',
            'my'            => 'Uzbekistan',
            'id'            => 'Uzbekistan',
            'timezone'      => 'Asia/Tashkent',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        214 =>
        array(
            'alpha2' => 'VC',
            'alpha3' => 'VCT',
            'country_code'  => '1',
            'country_name'  => 'Saint Vincent And The Grenedines',
            'cn'            => '圣文森特和格林纳丁斯',
            'my'            => 'Saint Vincent dan Grenadines',
            'id'            => 'Saint Vincent dan Grenadines',
            'timezone'      => 'America/St_Vincent',
            'mobile_begin_with' =>
            array(
                0 => '784',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        215 =>
        array(
            'alpha2' => 'VE',
            'alpha3' => 'VEN',
            'country_code'  => '58',
            'country_name'  => 'Venezuela',
            'cn'            => '委内瑞拉',
            'my'            => 'Vaenezuel',
            'id'            => 'Vaenezuel',
            'timezone'      => 'America/Caracas',
            'mobile_begin_with' =>
            array(
                0 => '4',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        216 =>
        array(
            'alpha2' => 'VG',
            'alpha3' => 'VGB',
            'country_code'  => '1',
            'country_name'  => 'Virgin Islands British',
            'cn'            => '英属维尔京群岛',
            'my'            => 'Kepulauan Virgin British',
            'id'            => 'Kepulauan Virgin British',
            'timezone'      => 'America/Tortola',
            'mobile_begin_with' =>
            array(
                0 => '284',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        217 =>
        array(
            'alpha2' => 'VI',
            'alpha3' => 'VIR',
            'country_code'  => '1',
            'country_name'  => 'Virgin Islands US',
            'cn'            => '美国维尔京群岛',
            'my'            => 'Kepulauan Virgin US',
            'id'            => 'Kepulauan Virgin US',
            'timezone'      => 'America/St_Thomas',
            'mobile_begin_with' =>
            array(
                0 => '340',
            ),
            'phone_number_lengths' =>
            array(
                0 => 10,
            ),
        ),
        218 =>
        array(
            'alpha2' => 'VN',
            'alpha3' => 'VNM',
            'country_code'  => '84',
            'country_name'  => 'Viet Nam',
            'preg_match' => '/viet\s?nam|vietnam/i', //Sia240711-add preg_match pattern for vietnam
            'cn'            => '越南',
            'my'            => 'Vietnam',
            'id'            => 'Vietnam',
            'timezone'      => 'Asia/Ho_Chi_Minh',
            'mobile_begin_with' =>
            array(
                0 => '9',
                1 => '1',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
                1 => 10,
            ),
        ),
        219 =>
        array(
            'alpha2' => 'VU',
            'alpha3' => 'VUT',
            'country_code'  => '678',
            'country_name'  => 'Vanuatu',
            'cn'            => '瓦努阿图',
            'my'            => 'Vanuatu',
            'id'            => 'Vietnam',
            'timezone'      => 'Pacific/Efate',
            'mobile_begin_with' =>
            array(
                0 => '5',
                1 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        220 =>
        array(
            'alpha2' => 'WF',
            'alpha3' => 'WLF',
            'country_code'  => '681',
            'country_name'  => 'Wallis and Futuna',
            'cn'            => '瓦利斯和富图纳',
            'my'            => 'Wallis dan Futuna',
            'id'            => 'Wallis dan Futuna',
            'timezone'      => 'Pacific/Wallis',
            'mobile_begin_with' =>
            array(
                0 => '40',
                1 => '499',
                2 => '80',
                3 => '82',
                4 => '83',
            ),
            'phone_number_lengths' =>
            array(
                0 => 6,
            ),
        ),
        221 =>
        array(
            'alpha2' => 'WS',
            'alpha3' => 'WSM',
            'country_code'  => '685',
            'country_name'  => 'Samoa',
            'cn'            => '萨摩亚',
            'my'            => 'Samoa',
            'id'            => 'Samoa',
            'timezone'      => 'Pacific/Apia',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        222 =>
        array(
            'alpha2' => 'YE',
            'alpha3' => 'YEM',
            'country_code'  => '967',
            'country_name'  => 'Yemen',
            'cn'            => '也门',
            'my'            => 'Yaman',
            'id'            => 'Yaman',
            'timezone'      => 'Asia/Aden',
            'mobile_begin_with' =>
            array(
                0 => '7',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        223 =>
        array(
            'alpha2' => 'ZA',
            'alpha3' => 'ZAF',
            'country_code'  => '27',
            'country_name'  => 'South Africa',
            'cn'            => '南非',
            'my'            => 'Afrika Selatan',
            'id'            => 'Afrika Selatan',
            'timezone'      => 'Africa/Johannesburg',
            'mobile_begin_with' =>
            array(
                0 => '6',
                1 => '7',
                2 => '8',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        224 =>
        array(
            'alpha2' => 'ZM',
            'alpha3' => 'ZMB',
            'country_code'  => '260',
            'country_name'  => 'Zambia',
            'cn'            => '赞比亚',
            'my'            => 'Zambia',
            'id'            => 'Zambia',
            'timezone'      => 'Africa/Lusaka',
            'mobile_begin_with' =>
            array(
                0 => '9',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        225 =>
        array(
            'alpha2' => 'ZW',
            'alpha3' => 'ZWE',
            'country_code'  => '263',
            'country_name'  => 'Zimbabwe',
            'cn'            => '津巴布韦',
            'my'            => 'Zimbabwe',
            'id'            => 'Zimbabwe',
            'timezone'      => 'Africa/Harare',
            'mobile_begin_with' =>
            array(
                0 => '71',
                1 => '73',
                2 => '77',
            ),
            'phone_number_lengths' =>
            array(
                0 => 9,
            ),
        ),
        226 =>
        array(
            'alpha2' => 'SZ',
            'alpha3' => 'SWZ',
            'country_code'  => '268',
            'country_name'  => 'Eswatini',
            'cn'            => '斯威士兰',
            'my'            => 'Eswatini',
            'mobile_begin_with' =>
            array(
                0 => '22',
                1 => '23',
                2 => '24',
                3 => '25',
                4 => '76',
                5 => '77',
                6 => '78',
                7 => '79',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
            ),
        ),
        227 =>
        array(
            'alpha2' => 'SS',
            'alpha3' => 'SSD',
            'country_code'  => '211',
            'country_name'  => 'South Sudan',
            'cn'            => '南苏丹',
            'my'            => 'Sudan Selatan',
            'mobile_begin_with' =>
            array(
                0 => '12',
                1 => '18',
                2 => '16',
                3 => '17',
                4 => '19',
            ),
            'phone_number_lengths' =>
            array(
                0 => 7,
            ),
        ),
        228 =>
        array(
            'alpha2' => 'KP',
            'alpha3' => 'PRK',
            'country_code'  => '850',
            'country_name'  => 'North Korea',
            'cn'            => '北朝鲜',
            'my'            => 'Korea Utara',
            'mobile_begin_with' =>
            array(
                0 => '2',
            ),
            'phone_number_lengths' =>
            array(
                0 => 8,
                0 => 10,
            ),
        ),
        229 =>
        array(
            'alpha2' => 'ALL',
            'alpha3' => 'ALL',
            'country_code'  => '0',
            'country_name'  => 'All Countries',
            'cn'            => '所有国家',
            'my'            => 'Semua Negara',
            'id'            => 'Semua Negara',
            'timezone'      => 'Semua Negara',
            'mobile_begin_with' =>
            array(),
            'phone_number_lengths' =>
            array(),
        ),

    );
}
