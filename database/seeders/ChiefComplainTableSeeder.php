<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ChiefComplainTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('chief_complain')->delete();
        
        \DB::table('chief_complain')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'dyspnea ',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'anorexia',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'weight loss',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'cachexia ',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'chills and shivering',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'convulsions ',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'deformity',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'discharge',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'dizziness 
',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'fatigue ',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'malaise',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'asthenia',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'hypothermia ',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'jaundice ',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'muscle weakness ',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'pyrexia ',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'sweats',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'swelling',
            ),
            18 => 
            array (
                'id' => 19,
            'name' => 'swollen or painful lymph node(s) ',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'weight gain',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'arrhythmia',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'bradycardia ',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'chest pain ',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'claudication',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'palpitations ',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'tachycardia ',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'dry mouth ',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'epistaxis ',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'halitosis',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'hearing loss',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'nasal discharge',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'otalgia ',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'otorrhea ',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'sore throat',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'toothache',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'tinnitus ',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'trismus',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'abdominal pain ',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'bloating ',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'belching ',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'bleeding:',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Hematemesis',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'blood in stool: melena , hematochezia',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'constipation',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'diarrhea ',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'dysphagia ',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'dyspepsia ',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'fecal incontinence',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'flatulence ',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'heartburn',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'nausea ',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'odynophagia',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'proctalgia fugax',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'pyrosis ',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Rectal tenesmus',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'steatorrhea',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'vomiting ',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'alopecia',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'hirsutism',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'hypertrichosis',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'abrasion',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'anasarca',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'blister ',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'edema ',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'itching ',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'laceration',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'rash ',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'urticaria ',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'abnormal posturing',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'acalculia',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'agnosia',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'alexia',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'amnesia',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'anomia',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'anosognosia',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'aphasia and apraxia',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'apraxia',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'ataxia',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'cataplexy ',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'confusion',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'dysarthria',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'dysdiadochokinesia',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'dysgraphia',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'hallucination',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'headache',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'hypokinetic movement disorder',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'akinesia',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'bradykinesia',
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'hyperkinetic movement disorder',
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'akathisia',
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'athetosis',
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'ballismus',
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'blepharospasm',
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'chorea',
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'dystonia',
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'fasciculation',
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'muscle cramps ',
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'myoclonus',
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'opsoclonus',
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'tic',
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'tremor',
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'flapping tremor',
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'insomnia ',
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'loss of consciousness',
            ),
            104 => 
            array (
                'id' => 105,
            'name' => 'Syncope (medicine) ',
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'neck stiffness',
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'opisthotonus',
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'paralysis and paresis',
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'paresthesia ',
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'prosopagnosia',
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'somnolence ',
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'Obstetric 
',
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'abnormal vaginal bleeding',
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'vaginal bleeding in early pregnancy / miscarriage',
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'vaginal bleeding in late pregnancy',
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'amenorrhea',
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'infertility',
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'painful intercourse ',
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'pelvic pain',
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'vaginal discharge',
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'Ocular',
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'amaurosis fugax  and amaurosis',
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'blurred vision',
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'double vision ',
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'exophthalmos ',
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'mydriasis
',
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'nystagmus',
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'Psychiatric',
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'amusia',
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'anhedonia',
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'anxiety',
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'apathy',
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'confabulation',
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'depression',
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'delusion',
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'euphoria',
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'homicidal ideation',
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'irritability',
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'mania ',
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'paranoid ideation',
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'phobia:',
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'Main article: list of phobias',
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'suicidal ideation',
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'Pulmonary',
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'apnea and hypopnea',
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'cough ',
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'dyspnea ',
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'bradypnea and tachypnea ',
            ),
            148 => 
            array (
                'id' => 149,
                'name' => 'orthopnea and platypnea',
            ),
            149 => 
            array (
                'id' => 150,
                'name' => 'trepopnea',
            ),
            150 => 
            array (
                'id' => 151,
                'name' => 'hemoptysis ',
            ),
            151 => 
            array (
                'id' => 152,
                'name' => 'pleuritic chest pain',
            ),
            152 => 
            array (
                'id' => 153,
                'name' => 'sputum production ',
            ),
            153 => 
            array (
                'id' => 154,
                'name' => 'Rheumatologic',
            ),
            154 => 
            array (
                'id' => 155,
                'name' => 'arthralgia',
            ),
            155 => 
            array (
                'id' => 156,
                'name' => 'back pain',
            ),
            156 => 
            array (
                'id' => 157,
                'name' => 'sciatica',
            ),
            157 => 
            array (
                'id' => 158,
                'name' => 'Urologic',
            ),
            158 => 
            array (
                'id' => 159,
                'name' => 'dysuria ',
            ),
            159 => 
            array (
                'id' => 160,
                'name' => 'hematospermia',
            ),
            160 => 
            array (
                'id' => 161,
                'name' => 'hematuria ',
            ),
            161 => 
            array (
                'id' => 162,
                'name' => 'impotence ',
            ),
            162 => 
            array (
                'id' => 163,
                'name' => 'polyuria ',
            ),
            163 => 
            array (
                'id' => 164,
                'name' => 'retrograde ejaculation',
            ),
            164 => 
            array (
                'id' => 165,
                'name' => 'strangury',
            ),
            165 => 
            array (
                'id' => 166,
                'name' => 'urethral discharge',
            ),
            166 => 
            array (
                'id' => 167,
                'name' => 'urinary frequency ',
            ),
            167 => 
            array (
                'id' => 168,
                'name' => 'urinary incontinence ',
            ),
            168 => 
            array (
                'id' => 169,
                'name' => 'urinary retention',
            ),
            169 => 
            array (
                'id' => 170,
                'name' => 'Vertigo ',
            ),
            170 => 
            array (
                'id' => 171,
                'name' => 'Gynaecological',
            ),
            171 => 
            array (
                'id' => 172,
                'name' => 'miosis ',
            ),
            172 => 
            array (
                'id' => 173,
                'name' => 'fecal',
            ),
            173 => 
            array (
                'id' => 174,
                'name' => 'incontinence',
            ),
            174 => 
            array (
                'id' => 175,
                'name' => 'vomiting',
            ),
            175 => 
            array (
                'id' => 176,
                'name' => 'headache',
            ),
            176 => 
            array (
                'id' => 177,
                'name' => 'nausea',
            ),
            177 => 
            array (
                'id' => 178,
                'name' => '
fever',
            ),
            178 => 
            array (
                'id' => 179,
                'name' => 'itching',
            ),
            179 => 
            array (
                'id' => 180,
                'name' => 'swollen',
            ),
            180 => 
            array (
                'id' => 181,
                'name' => 'or',
            ),
            181 => 
            array (
                'id' => 182,
                'name' => 'painful',
            ),
            182 => 
            array (
                'id' => 183,
                'name' => 'lymph',
            ),
            183 => 
            array (
                'id' => 184,
            'name' => 'node(s)
dyspnea',
            ),
            184 => 
            array (
                'id' => 185,
                'name' => 'neck',
            ),
            185 => 
            array (
                'id' => 186,
                'name' => 'stiffness',
            ),
            186 => 
            array (
                'id' => 187,
                'name' => 'blurred',
            ),
            187 => 
            array (
                'id' => 188,
                'name' => 'vision',
            ),
            188 => 
            array (
                'id' => 189,
                'name' => 'sweats',
            ),
            189 => 
            array (
                'id' => 190,
                'name' => '
ejooja',
            ),
            190 => 
            array (
                'id' => 191,
                'name' => 'ejof',
            ),
            191 => 
            array (
                'id' => 192,
                'name' => 'karbanadaa',
            ),
            192 => 
            array (
                'id' => 193,
                'name' => 'karba',
            ),
            193 => 
            array (
                'id' => 194,
                'name' => 'tsabaeh-fadul-ali',
            ),
            194 => 
            array (
                'id' => 195,
                'name' => 'tachycardia',
            ),
            195 => 
            array (
                'id' => 196,
                'name' => 'hypertension',
            ),
            196 => 
            array (
                'id' => 197,
                'name' => 'vekasolia',
            ),
            197 => 
            array (
                'id' => 198,
                'name' => 'kk',
            ),
            198 => 
            array (
                'id' => 199,
                'name' => 'vitmain',
            ),
            199 => 
            array (
                'id' => 200,
                'name' => 'b12',
            ),
            200 => 
            array (
                'id' => 201,
                'name' => '
vomiting',
            ),
            201 => 
            array (
                'id' => 202,
                'name' => 'alryyan',
            ),
            202 => 
            array (
                'id' => 203,
                'name' => 'mahjoob',
            ),
            203 => 
            array (
                'id' => 204,
                'name' => 'osman',
            ),
            204 => 
            array (
                'id' => 205,
                'name' => 'heypertension',
            ),
            205 => 
            array (
                'id' => 206,
                'name' => 'and',
            ),
            206 => 
            array (
                'id' => 207,
                'name' => 'hyperlipidemia',
            ),
            207 => 
            array (
                'id' => 208,
                'name' => 'tetracyline',
            ),
            208 => 
            array (
                'id' => 209,
                'name' => 'wheat',
            ),
            209 => 
            array (
                'id' => 210,
                'name' => 'dfs',
            ),
            210 => 
            array (
                'id' => 211,
                'name' => 'hypothermia',
            ),
            211 => 
            array (
                'id' => 212,
                'name' => 'Rt',
            ),
            212 => 
            array (
                'id' => 213,
                'name' => 'cataract',
            ),
            213 => 
            array (
                'id' => 214,
                'name' => 'surgery',
            ),
            214 => 
            array (
                'id' => 215,
                'name' => 'Lt',
            ),
            215 => 
            array (
                'id' => 216,
                'name' => 'DV',
            ),
            216 => 
            array (
                'id' => 217,
                'name' => 'negitive',
            ),
            217 => 
            array (
                'id' => 218,
                'name' => 'NO',
            ),
            218 => 
            array (
                'id' => 219,
                'name' => '




Fundus:

Right',
            ),
            219 => 
            array (
                'id' => 220,
                'name' => 'eye',
            ),
            220 => 
            array (
                'id' => 221,
                'name' => 'NAD
Left',
            ),
            221 => 
            array (
                'id' => 222,
                'name' => 'veiw',
            ),
            222 => 
            array (
                'id' => 223,
                'name' => '
',
            ),
            223 => 
            array (
                'id' => 224,
                'name' => '______________',
            ),
            224 => 
            array (
                'id' => 225,
                'name' => '


Fundus:
Right',
            ),
            225 => 
            array (
                'id' => 226,
                'name' => '
IOP:
RT',
            ),
            226 => 
            array (
                'id' => 227,
                'name' => '13
LT',
            ),
            227 => 
            array (
                'id' => 228,
                'name' => '15',
            ),
            228 => 
            array (
                'id' => 229,
                'name' => '





















',
            ),
            229 => 
            array (
                'id' => 230,
                'name' => '



kulkjh

















',
            ),
            230 => 
            array (
                'id' => 231,
                'name' => 'نتلانوتلو',
            ),
            231 => 
            array (
                'id' => 232,
                'name' => 'DM',
            ),
            232 => 
            array (
                'id' => 233,
                'name' => 'HTN',
            ),
            233 => 
            array (
                'id' => 234,
                'name' => 'both',
            ),
            234 => 
            array (
                'id' => 235,
                'name' => '

',
            ),
            235 => 
            array (
                'id' => 236,
                'name' => 'Hezy',
            ),
            236 => 
            array (
                'id' => 237,
                'name' => '
Hezy',
            ),
            237 => 
            array (
                'id' => 238,
                'name' => 'Not',
            ),
            238 => 
            array (
                'id' => 239,
                'name' => 'known',
            ),
            239 => 
            array (
                'id' => 240,
                'name' => 'Psychiatricoly',
            ),
            240 => 
            array (
                'id' => 241,
                'name' => 'fresh',
            ),
            241 => 
            array (
                'id' => 242,
                'name' => 'ED
',
            ),
            242 => 
            array (
                'id' => 243,
                'name' => '
Moxiflox',
            ),
            243 => 
            array (
                'id' => 244,
                'name' => 'poly',
            ),
            244 => 
            array (
                'id' => 245,
                'name' => '
Not',
            ),
            245 => 
            array (
                'id' => 246,
                'name' => '________________',
            ),
            246 => 
            array (
                'id' => 247,
                'name' => '
DV
headache',
            ),
            247 => 
            array (
                'id' => 248,
                'name' => '

______________',
            ),
            248 => 
            array (
                'id' => 249,
                'name' => '2',
            ),
            249 => 
            array (
                'id' => 250,
                'name' => 'years
HTN',
            ),
            250 => 
            array (
                'id' => 251,
                'name' => '12',
            ),
            251 => 
            array (
                'id' => 252,
                'name' => 'optidex',
            ),
            252 => 
            array (
                'id' => 253,
                'name' => 'ED',
            ),
            253 => 
            array (
                'id' => 254,
                'name' => '
DV',
            ),
            254 => 
            array (
                'id' => 255,
                'name' => 'Myopia',
            ),
            255 => 
            array (
                'id' => 256,
                'name' => '
itching',
            ),
            256 => 
            array (
                'id' => 257,
                'name' => '
redness',
            ),
            257 => 
            array (
                'id' => 258,
                'name' => 'normal',
            ),
            258 => 
            array (
                'id' => 259,
                'name' => '---------------------',
            ),
            259 => 
            array (
                'id' => 260,
                'name' => '___________________',
            ),
            260 => 
            array (
                'id' => 261,
                'name' => '24',
            ),
            261 => 
            array (
                'id' => 262,
                'name' => '30',
            ),
            262 => 
            array (
                'id' => 263,
                'name' => 'XOLAMOL',
            ),
            263 => 
            array (
                'id' => 264,
                'name' => '
Diamox',
            ),
            264 => 
            array (
                'id' => 265,
                'name' => 'tab',
            ),
            265 => 
            array (
                'id' => 266,
                'name' => 'GLacoma',
            ),
            266 => 
            array (
                'id' => 267,
                'name' => 'upper',
            ),
            267 => 
            array (
                'id' => 268,
                'name' => 'lid',
            ),
            268 => 
            array (
                'id' => 269,
                'name' => 'swelling',
            ),
            269 => 
            array (
                'id' => 270,
                'name' => 'chalazion
LT',
            ),
            270 => 
            array (
                'id' => 271,
                'name' => 'chalazion',
            ),
            271 => 
            array (
                'id' => 272,
                'name' => 'for',
            ),
            272 => 
            array (
                'id' => 273,
                'name' => 'excision
عملية',
            ),
            273 => 
            array (
                'id' => 274,
                'name' => 'كلازيون',
            ),
            274 => 
            array (
                'id' => 275,
                'name' => 'شمال',
            ),
            275 => 
            array (
                'id' => 276,
                'name' => '-_-____________________',
            ),
            276 => 
            array (
                'id' => 277,
                'name' => '____________________',
            ),
            277 => 
            array (
                'id' => 278,
                'name' => 'CDR',
            ),
            278 => 
            array (
                'id' => 279,
                'name' => '0.9
',
            ),
            279 => 
            array (
                'id' => 280,
                'name' => 'DV
Tearing',
            ),
            280 => 
            array (
                'id' => 281,
                'name' => '_____________________',
            ),
            281 => 
            array (
                'id' => 282,
                'name' => '10',
            ),
            282 => 
            array (
                'id' => 283,
                'name' => 'years
',
            ),
            283 => 
            array (
                'id' => 284,
                'name' => '4',
            ),
            284 => 
            array (
                'id' => 285,
                'name' => 'truma',
            ),
            285 => 
            array (
                'id' => 286,
                'name' => '28',
            ),
            286 => 
            array (
                'id' => 287,
                'name' => '20',
            ),
            287 => 
            array (
                'id' => 288,
                'name' => 'XOLAMOLolamol',
            ),
            288 => 
            array (
                'id' => 289,
                'name' => '______________________',
            ),
            289 => 
            array (
                'id' => 290,
                'name' => '0.8',
            ),
            290 => 
            array (
                'id' => 291,
                'name' => '0.9',
            ),
            291 => 
            array (
                'id' => 292,
                'name' => 'Veiw
',
            ),
            292 => 
            array (
                'id' => 293,
                'name' => 'DR',
            ),
            293 => 
            array (
                'id' => 294,
                'name' => 'Exduate',
            ),
            294 => 
            array (
                'id' => 295,
                'name' => 'ITears',
            ),
            295 => 
            array (
                'id' => 296,
                'name' => 'Gel',
            ),
            296 => 
            array (
                'id' => 297,
                'name' => 'Dry',
            ),
            297 => 
            array (
                'id' => 298,
                'name' => 'cat',
            ),
            298 => 
            array (
                'id' => 299,
                'name' => '8',
            ),
            299 => 
            array (
                'id' => 300,
                'name' => '7',
            ),
            300 => 
            array (
                'id' => 301,
                'name' => '1',
            ),
            301 => 
            array (
                'id' => 302,
                'name' => 'clear',
            ),
            302 => 
            array (
                'id' => 303,
                'name' => 'Slight',
            ),
            303 => 
            array (
                'id' => 304,
                'name' => 'ALt',
            ),
            304 => 
            array (
                'id' => 305,
                'name' => 'exotropia
RT',
            ),
            305 => 
            array (
                'id' => 306,
                'name' => 'pheco',
            ),
            306 => 
            array (
                'id' => 307,
                'name' => '
---------------------',
            ),
            307 => 
            array (
                'id' => 308,
                'name' => '
-----------------------------',
            ),
            308 => 
            array (
                'id' => 309,
                'name' => 'CAT
LT',
            ),
            309 => 
            array (
                'id' => 310,
                'name' => 'VH',
            ),
            310 => 
            array (
                'id' => 311,
                'name' => 'Tering
DV
',
            ),
            311 => 
            array (
                'id' => 312,
                'name' => 'It',
            ),
            312 => 
            array (
                'id' => 313,
                'name' => 'Bil',
            ),
            313 => 
            array (
                'id' => 314,
                'name' => 'Gel
',
            ),
            314 => 
            array (
                'id' => 315,
                'name' => 'Redness
FB',
            ),
            315 => 
            array (
                'id' => 316,
                'name' => 'Sensition
',
            ),
            316 => 
            array (
                'id' => 317,
                'name' => '19',
            ),
            317 => 
            array (
                'id' => 318,
                'name' => '
optidex',
            ),
            318 => 
            array (
                'id' => 319,
                'name' => 'T',
            ),
            319 => 
            array (
                'id' => 320,
                'name' => '
Dexatrol',
            ),
            320 => 
            array (
                'id' => 321,
                'name' => 'EO',
            ),
            321 => 
            array (
                'id' => 322,
                'name' => 'folicular',
            ),
            322 => 
            array (
                'id' => 323,
                'name' => 'conj',
            ),
            323 => 
            array (
                'id' => 324,
                'name' => 'NAD
',
            ),
            324 => 
            array (
                'id' => 325,
                'name' => 'PSEUDOPHAKIA',
            ),
            325 => 
            array (
                'id' => 326,
                'name' => 'IMMATURE',
            ),
            326 => 
            array (
                'id' => 327,
                'name' => 'SENILE',
            ),
            327 => 
            array (
                'id' => 328,
                'name' => 'PHACO',
            ),
            328 => 
            array (
                'id' => 329,
                'name' => '(',
                ),
                329 => 
                array (
                    'id' => 330,
                    'name' => 'PT',
                ),
                330 => 
                array (
                    'id' => 331,
                    'name' => 'NEEDS',
                ),
                331 => 
                array (
                    'id' => 332,
                    'name' => 'THE',
                ),
                332 => 
                array (
                    'id' => 333,
                    'name' => 'BECAUSE',
                ),
                333 => 
                array (
                    'id' => 334,
                    'name' => 'OF',
                ),
                334 => 
                array (
                    'id' => 335,
                    'name' => 'HIS',
                ),
                335 => 
                array (
                    'id' => 336,
                    'name' => 'JOB',
                ),
                336 => 
                array (
                    'id' => 337,
                    'name' => 'REQUEST',
                ),
                337 => 
                array (
                    'id' => 338,
                    'name' => 'MAXIMUM',
                ),
                338 => 
                array (
                    'id' => 339,
                'name' => ')
',
            ),
            339 => 
            array (
                'id' => 340,
                'name' => '16',
            ),
            340 => 
            array (
                'id' => 341,
                'name' => '
NO',
            ),
            341 => 
            array (
                'id' => 342,
                'name' => 'FH',
            ),
            342 => 
            array (
                'id' => 343,
                'name' => 'YEARS',
            ),
            343 => 
            array (
                'id' => 344,
                'name' => 'TIA',
            ),
            344 => 
            array (
                'id' => 345,
                'name' => 'AGO',
            ),
            345 => 
            array (
                'id' => 346,
                'name' => 'ON',
            ),
            346 => 
            array (
                'id' => 347,
                'name' => 'WARFARIN',
            ),
            347 => 
            array (
                'id' => 348,
                'name' => '5',
            ),
            348 => 
            array (
                'id' => 349,
                'name' => 'MG',
            ),
            349 => 
            array (
                'id' => 350,
                'name' => 'ONCE',
            ),
            350 => 
            array (
                'id' => 351,
                'name' => 'DIALY',
            ),
            351 => 
            array (
                'id' => 352,
                'name' => 'DISC',
            ),
            352 => 
            array (
                'id' => 353,
                'name' => 'REFLEX',
            ),
            353 => 
            array (
                'id' => 354,
                'name' => '
CHEMICAL',
            ),
            354 => 
            array (
                'id' => 355,
                'name' => 'TRAUMA',
            ),
            355 => 
            array (
                'id' => 356,
                'name' => 'HISTORY',
            ),
            356 => 
            array (
                'id' => 357,
                'name' => 'ALLERGY',
            ),
            357 => 
            array (
                'id' => 358,
                'name' => '
DM',
            ),
            358 => 
            array (
                'id' => 359,
                'name' => 'NAD',
            ),
            359 => 
            array (
                'id' => 360,
                'name' => 'BILATERAL',
            ),
            360 => 
            array (
                'id' => 361,
                'name' => 'MATURE',
            ),
            361 => 
            array (
                'id' => 362,
                'name' => 'SENIE',
            ),
            362 => 
            array (
                'id' => 363,
                'name' => '
فيكو',
            ),
            363 => 
            array (
                'id' => 364,
                'name' => 'FAMILY',
            ),
            364 => 
            array (
                'id' => 365,
                'name' => 'PSEUDOPKAKIA',
            ),
            365 => 
            array (
                'id' => 366,
                'name' => '13
',
            ),
            366 => 
            array (
                'id' => 367,
                'name' => 'PHACO
فيكو',
            ),
            367 => 
            array (
                'id' => 368,
                'name' => 'فيكو',
            ),
            368 => 
            array (
                'id' => 369,
                'name' => 'SEWLLING',
            ),
            369 => 
            array (
                'id' => 370,
                'name' => 'I.TEARS',
            ),
            370 => 
            array (
                'id' => 371,
                'name' => 'TDS',
            ),
            371 => 
            array (
                'id' => 372,
                'name' => 'MOXIFLOX',
            ),
            372 => 
            array (
                'id' => 373,
                'name' => 'QDS',
            ),
            373 => 
            array (
                'id' => 374,
                'name' => 'HERNIATION',
            ),
            374 => 
            array (
                'id' => 375,
                'name' => 'ORBITAL',
            ),
            375 => 
            array (
                'id' => 376,
                'name' => 'FAT',
            ),
            376 => 
            array (
                'id' => 377,
                'name' => 'DONE',
            ),
            377 => 
            array (
                'id' => 378,
                'name' => 'ptosis',
            ),
            378 => 
            array (
                'id' => 379,
                'name' => 'drop',
            ),
            379 => 
            array (
                'id' => 380,
                'name' => 'eyelid',
            ),
            380 => 
            array (
                'id' => 381,
                'name' => 'no
',
            ),
            381 => 
            array (
                'id' => 382,
                'name' => 'CARE',
            ),
            382 => 
            array (
                'id' => 383,
                'name' => 'CAPS',
            ),
            383 => 
            array (
                'id' => 384,
                'name' => 'REFLAX',
            ),
            384 => 
            array (
                'id' => 385,
                'name' => 'DIABETIC',
            ),
            385 => 
            array (
                'id' => 386,
                'name' => 'HYPERTENSIVE',
            ),
            386 => 
            array (
                'id' => 387,
                'name' => 'CARTARAC',
            ),
            387 => 
            array (
                'id' => 388,
                'name' => '

FOR',
            ),
            388 => 
            array (
                'id' => 389,
                'name' => 'FOLLOW',
            ),
            389 => 
            array (
                'id' => 390,
                'name' => 'UP',
            ),
            390 => 
            array (
                'id' => 391,
                'name' => 'asinopia',
            ),
            391 => 
            array (
                'id' => 392,
                'name' => '
headache',
            ),
            392 => 
            array (
                'id' => 393,
                'name' => 'i',
            ),
            393 => 
            array (
                'id' => 394,
                'name' => 'tears',
            ),
            394 => 
            array (
                'id' => 395,
                'name' => 'EXOPHORIA',
            ),
            395 => 
            array (
                'id' => 396,
                'name' => 'FUNDUS',
            ),
            396 => 
            array (
                'id' => 397,
                'name' => 'CHANGE',
            ),
            397 => 
            array (
                'id' => 398,
                'name' => '
LE-cat',
            ),
            398 => 
            array (
                'id' => 399,
                'name' => 'LE-Cat
فيكو',
            ),
            399 => 
            array (
                'id' => 400,
                'name' => '9',
            ),
            400 => 
            array (
                'id' => 401,
                'name' => 'DV
',
            ),
            401 => 
            array (
                'id' => 402,
                'name' => '11',
            ),
            402 => 
            array (
                'id' => 403,
                'name' => 'BE',
            ),
            403 => 
            array (
                'id' => 404,
                'name' => '23',
            ),
            404 => 
            array (
                'id' => 405,
                'name' => '18',
            ),
            405 => 
            array (
                'id' => 406,
                'name' => 'Cuping',
            ),
            406 => 
            array (
                'id' => 407,
                'name' => 'Glantrim',
            ),
            407 => 
            array (
                'id' => 408,
                'name' => 'case',
            ),
            408 => 
            array (
                'id' => 409,
                'name' => 'glucoma',
            ),
            409 => 
            array (
                'id' => 410,
                'name' => '0.7',
            ),
            410 => 
            array (
                'id' => 411,
                'name' => 'TEAR',
            ),
            411 => 
            array (
                'id' => 412,
                'name' => 'شمال
BE',
            ),
            412 => 
            array (
                'id' => 413,
                'name' => 'CAT
',
            ),
            413 => 
            array (
                'id' => 414,
                'name' => '
BE',
            ),
            414 => 
            array (
                'id' => 415,
                'name' => 'DIPTIC',
            ),
            415 => 
            array (
                'id' => 416,
                'name' => 'RETNOPathy',
            ),
            416 => 
            array (
                'id' => 417,
                'name' => 'Dibtic',
            ),
            417 => 
            array (
                'id' => 418,
                'name' => '

fecal',
            ),
            418 => 
            array (
                'id' => 419,
                'name' => 'incontinence

fever

anorexia

vomiting
',
            ),
            419 => 
            array (
                'id' => 420,
                'name' => 'incontinence

fever

anorexia

vomiting

,waleeed',
            ),
            420 => 
            array (
                'id' => 421,
                'name' => 'waleeed',
            ),
        ));
        
        
    }
}