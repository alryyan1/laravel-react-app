<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DiagnosisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('diagnosis')->delete();
        
        \DB::table('diagnosis')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Achillies tendinopathy',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Acne',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Acute cholecystitis',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Acute lymphoblastic leukaemia',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Acute lymphoblastic leukaemia: Children',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Acute lymphoblastic leukaemia: Teenagers and young adults',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'Acute myeloid leukaemia',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'Acute myeloid leukaemia: Children',
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'Acute myeloid leukaemia: Teenagers and young adults',
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'Acute pancreatitis',
            ),
            10 => 
            array (
                'id' => 12,
                'name' => 'Addison’s disease',
            ),
            11 => 
            array (
                'id' => 13,
                'name' => 'Adenomyosis',
            ),
            12 => 
            array (
                'id' => 14,
                'name' => 'Alcohol-related liver disease',
            ),
            13 => 
            array (
                'id' => 15,
                'name' => 'Allergic rhinitis',
            ),
            14 => 
            array (
                'id' => 16,
                'name' => 'Allergies',
            ),
            15 => 
            array (
                'id' => 17,
                'name' => 'Alzheimer’s disease',
            ),
            16 => 
            array (
                'id' => 18,
                'name' => 'Anal cancer',
            ),
            17 => 
            array (
                'id' => 19,
                'name' => 'Anaphylaxis',
            ),
            18 => 
            array (
                'id' => 20,
                'name' => 'Angina',
            ),
            19 => 
            array (
                'id' => 21,
                'name' => 'Angioedema',
            ),
            20 => 
            array (
                'id' => 22,
                'name' => 'Ankle sprain',
            ),
            21 => 
            array (
                'id' => 23,
                'name' => 'Ankylosing spondylitis',
            ),
            22 => 
            array (
                'id' => 24,
                'name' => 'Anorexia nervosa',
            ),
            23 => 
            array (
                'id' => 25,
                'name' => 'Anxiety',
            ),
            24 => 
            array (
                'id' => 26,
                'name' => 'Anxiety disorders in children',
            ),
            25 => 
            array (
                'id' => 27,
                'name' => 'Appendicitis',
            ),
            26 => 
            array (
                'id' => 28,
                'name' => 'Arterial thrombosis',
            ),
            27 => 
            array (
                'id' => 29,
                'name' => 'Arthritis',
            ),
            28 => 
            array (
                'id' => 30,
                'name' => 'Asbestosis',
            ),
            29 => 
            array (
                'id' => 31,
                'name' => 'Asthma',
            ),
            30 => 
            array (
                'id' => 32,
                'name' => 'Ataxia',
            ),
            31 => 
            array (
                'id' => 33,
                'name' => 'Atopic eczema',
            ),
            32 => 
            array (
                'id' => 34,
                'name' => 'Atrial fibrillation',
            ),
            33 => 
            array (
                'id' => 35,
            'name' => 'Attention deficit hyperactivity disorder (ADHD)',
            ),
            34 => 
            array (
                'id' => 36,
            'name' => 'Autistic spectrum disorder (ASD)',
            ),
            35 => 
            array (
                'id' => 37,
                'name' => 'Bacterial vaginosis',
            ),
            36 => 
            array (
                'id' => 38,
                'name' => 'Benign prostate enlargement',
            ),
            37 => 
            array (
                'id' => 39,
            'name' => 'Bile duct cancer (cholangiocarcinoma)',
            ),
            38 => 
            array (
                'id' => 40,
                'name' => 'Binge eating',
            ),
            39 => 
            array (
                'id' => 41,
                'name' => 'Bipolar disorder',
            ),
            40 => 
            array (
                'id' => 42,
                'name' => 'Bladder cancer',
            ),
            41 => 
            array (
                'id' => 43,
            'name' => 'Blood poisoning (sepsis)',
            ),
            42 => 
            array (
                'id' => 44,
                'name' => 'Bone cancer',
            ),
            43 => 
            array (
                'id' => 45,
                'name' => 'Bone cancer: Teenagers and young adults',
            ),
            44 => 
            array (
                'id' => 46,
                'name' => 'Bowel cancer',
            ),
            45 => 
            array (
                'id' => 47,
                'name' => 'Bowel incontinence',
            ),
            46 => 
            array (
                'id' => 48,
                'name' => 'Bowel polyps',
            ),
            47 => 
            array (
                'id' => 49,
                'name' => 'Brain stem death',
            ),
            48 => 
            array (
                'id' => 50,
                'name' => 'Brain tumours',
            ),
            49 => 
            array (
                'id' => 51,
                'name' => 'Brain tumours: Children',
            ),
            50 => 
            array (
                'id' => 52,
                'name' => 'Brain tumours: Teenagers and young adults',
            ),
            51 => 
            array (
                'id' => 53,
            'name' => 'Breast cancer (female)',
            ),
            52 => 
            array (
                'id' => 54,
            'name' => 'Breast cancer (male)',
            ),
            53 => 
            array (
                'id' => 55,
                'name' => 'Bronchiectasis',
            ),
            54 => 
            array (
                'id' => 56,
                'name' => 'Bronchitis',
            ),
            55 => 
            array (
                'id' => 57,
                'name' => 'Bulimia',
            ),
            56 => 
            array (
                'id' => 58,
                'name' => 'Bunion',
            ),
            57 => 
            array (
                'id' => 59,
                'name' => 'Carcinoid syndrome and carcinoid tumours',
            ),
            58 => 
            array (
                'id' => 60,
                'name' => 'Cardiovascular disease',
            ),
            59 => 
            array (
                'id' => 61,
                'name' => 'Carpal tunnel syndrome',
            ),
            60 => 
            array (
                'id' => 62,
                'name' => 'Catarrh',
            ),
            61 => 
            array (
                'id' => 63,
                'name' => 'Cellulitis',
            ),
            62 => 
            array (
                'id' => 64,
                'name' => 'Cerebral palsy',
            ),
            63 => 
            array (
                'id' => 65,
                'name' => 'Cervical cancer',
            ),
            64 => 
            array (
                'id' => 66,
                'name' => 'Cervical spondylosis',
            ),
            65 => 
            array (
                'id' => 67,
                'name' => 'Chest and rib injury',
            ),
            66 => 
            array (
                'id' => 68,
                'name' => 'Chest infection',
            ),
            67 => 
            array (
                'id' => 69,
                'name' => 'Chickenpox',
            ),
            68 => 
            array (
                'id' => 70,
                'name' => 'Chilblains',
            ),
            69 => 
            array (
                'id' => 71,
                'name' => 'Chlamydia',
            ),
            70 => 
            array (
                'id' => 72,
                'name' => 'Chronic fatigue syndrome',
            ),
            71 => 
            array (
                'id' => 73,
                'name' => 'Chronic kidney disease',
            ),
            72 => 
            array (
                'id' => 74,
                'name' => 'Chronic lymphocytic leukaemia',
            ),
            73 => 
            array (
                'id' => 75,
                'name' => 'Chronic myeloid leukaemia',
            ),
            74 => 
            array (
                'id' => 76,
            'name' => 'Chronic obstructive pulmonary disease (COPD)',
            ),
            75 => 
            array (
                'id' => 77,
                'name' => 'Chronic pain',
            ),
            76 => 
            array (
                'id' => 78,
                'name' => 'Chronic pancreatitis',
            ),
            77 => 
            array (
                'id' => 79,
                'name' => 'Cirrhosis',
            ),
            78 => 
            array (
                'id' => 80,
                'name' => 'Clostridium difficile',
            ),
            79 => 
            array (
                'id' => 81,
                'name' => 'Coeliac disease',
            ),
            80 => 
            array (
                'id' => 82,
                'name' => 'Cold sore',
            ),
            81 => 
            array (
                'id' => 83,
                'name' => 'Coma',
            ),
            82 => 
            array (
                'id' => 84,
                'name' => 'Common cold',
            ),
            83 => 
            array (
                'id' => 85,
                'name' => 'Congenital heart disease',
            ),
            84 => 
            array (
                'id' => 86,
                'name' => 'Conjunctivitis',
            ),
            85 => 
            array (
                'id' => 87,
                'name' => 'Constipation',
            ),
            86 => 
            array (
                'id' => 88,
                'name' => 'Coronary heart disease',
            ),
            87 => 
            array (
                'id' => 89,
            'name' => 'Coronavirus (COVID-19)',
            ),
            88 => 
            array (
                'id' => 90,
            'name' => 'Coronavirus (COVID-19): Longer-term effects (long COVID)',
            ),
            89 => 
            array (
                'id' => 91,
                'name' => 'Costochondritis',
            ),
            90 => 
            array (
                'id' => 92,
                'name' => 'Cough',
            ),
            91 => 
            array (
                'id' => 93,
                'name' => 'Crohn’s disease',
            ),
            92 => 
            array (
                'id' => 94,
                'name' => 'Croup',
            ),
            93 => 
            array (
                'id' => 95,
                'name' => 'Cystic fibrosis',
            ),
            94 => 
            array (
                'id' => 96,
                'name' => 'Cystitis',
            ),
            95 => 
            array (
                'id' => 97,
                'name' => 'Deafblindness',
            ),
            96 => 
            array (
                'id' => 98,
                'name' => 'Deep vein thrombosis',
            ),
            97 => 
            array (
                'id' => 99,
                'name' => 'Degenerative Cervical Myelopathy',
            ),
            98 => 
            array (
                'id' => 100,
                'name' => 'Dehydration',
            ),
            99 => 
            array (
                'id' => 101,
                'name' => 'Delirium',
            ),
            100 => 
            array (
                'id' => 102,
                'name' => 'Dementia',
            ),
            101 => 
            array (
                'id' => 103,
                'name' => 'Dental abscess',
            ),
            102 => 
            array (
                'id' => 104,
                'name' => 'Depression',
            ),
            103 => 
            array (
                'id' => 105,
                'name' => 'Dermatitis herpetiformis',
            ),
            104 => 
            array (
                'id' => 106,
                'name' => 'Diabetes',
            ),
            105 => 
            array (
                'id' => 107,
                'name' => 'Diabetic retinopathy',
            ),
            106 => 
            array (
                'id' => 108,
                'name' => 'Diarrhoea',
            ),
            107 => 
            array (
                'id' => 109,
                'name' => 'Discoid eczema',
            ),
            108 => 
            array (
                'id' => 110,
                'name' => 'Diverticular disease and diverticulitis',
            ),
            109 => 
            array (
                'id' => 111,
            'name' => 'Dizziness (Lightheadedness)',
            ),
            110 => 
            array (
                'id' => 112,
                'name' => 'Down’s syndrome',
            ),
            111 => 
            array (
                'id' => 113,
                'name' => 'Dry mouth',
            ),
            112 => 
            array (
                'id' => 114,
            'name' => 'Dysphagia (swallowing problems)',
            ),
            113 => 
            array (
                'id' => 115,
                'name' => 'Dystonia',
            ),
            114 => 
            array (
                'id' => 116,
                'name' => 'Earache',
            ),
            115 => 
            array (
                'id' => 117,
                'name' => 'Earwax build-up',
            ),
            116 => 
            array (
                'id' => 118,
                'name' => 'Ebola virus disease',
            ),
            117 => 
            array (
                'id' => 119,
                'name' => 'Ectopic pregnancy',
            ),
            118 => 
            array (
                'id' => 120,
                'name' => 'Edwards’ syndrome',
            ),
            119 => 
            array (
                'id' => 121,
                'name' => 'Endometriosis',
            ),
            120 => 
            array (
                'id' => 122,
                'name' => 'Epilepsy',
            ),
            121 => 
            array (
                'id' => 123,
            'name' => 'Erectile dysfunction (impotence)',
            ),
            122 => 
            array (
                'id' => 124,
            'name' => 'Escherichia coli (E. coli) O157',
            ),
            123 => 
            array (
                'id' => 125,
                'name' => 'Ewing sarcoma',
            ),
            124 => 
            array (
                'id' => 126,
                'name' => 'Ewing sarcoma: Children',
            ),
            125 => 
            array (
                'id' => 127,
                'name' => 'Eye cancer',
            ),
            126 => 
            array (
                'id' => 128,
                'name' => 'Farting',
            ),
            127 => 
            array (
                'id' => 129,
                'name' => 'Febrile seizures',
            ),
            128 => 
            array (
                'id' => 130,
            'name' => 'Feeling of something in your throat (Globus)',
            ),
            129 => 
            array (
                'id' => 131,
                'name' => 'Fever in adults',
            ),
            130 => 
            array (
                'id' => 132,
                'name' => 'Fever in children',
            ),
            131 => 
            array (
                'id' => 133,
                'name' => 'Fibroids',
            ),
            132 => 
            array (
                'id' => 134,
                'name' => 'Fibromyalgia',
            ),
            133 => 
            array (
                'id' => 135,
                'name' => 'Flu',
            ),
            134 => 
            array (
                'id' => 136,
                'name' => 'Foetal alcohol syndrome',
            ),
            135 => 
            array (
                'id' => 137,
                'name' => 'Food allergy',
            ),
            136 => 
            array (
                'id' => 138,
                'name' => 'Food poisoning',
            ),
            137 => 
            array (
                'id' => 139,
                'name' => 'Frozen shoulder',
            ),
            138 => 
            array (
                'id' => 140,
            'name' => 'Functional neurological disorder (FND)',
            ),
            139 => 
            array (
                'id' => 141,
                'name' => 'Fungal nail infection',
            ),
            140 => 
            array (
                'id' => 142,
                'name' => 'Gallbladder cancer',
            ),
            141 => 
            array (
                'id' => 143,
                'name' => 'Gallstones',
            ),
            142 => 
            array (
                'id' => 144,
                'name' => 'Ganglion cyst',
            ),
            143 => 
            array (
                'id' => 145,
                'name' => 'Gastroenteritis',
            ),
            144 => 
            array (
                'id' => 146,
            'name' => 'Gastro-oesophageal reflux disease (GORD)',
            ),
            145 => 
            array (
                'id' => 147,
                'name' => 'Genital herpes',
            ),
            146 => 
            array (
                'id' => 148,
                'name' => 'Genital symptoms',
            ),
            147 => 
            array (
                'id' => 149,
                'name' => 'Genital warts',
            ),
            148 => 
            array (
                'id' => 150,
                'name' => 'Germ cell tumours',
            ),
            149 => 
            array (
                'id' => 151,
                'name' => 'Glandular fever',
            ),
            150 => 
            array (
                'id' => 152,
                'name' => 'Golfers elbow',
            ),
            151 => 
            array (
                'id' => 153,
                'name' => 'Gonorrhoea',
            ),
            152 => 
            array (
                'id' => 154,
                'name' => 'Gout',
            ),
            153 => 
            array (
                'id' => 155,
                'name' => 'Greater trochanteric pain syndrome',
            ),
            154 => 
            array (
                'id' => 156,
                'name' => 'Gum disease',
            ),
            155 => 
            array (
                'id' => 157,
            'name' => 'Haemorrhoids (piles)',
            ),
            156 => 
            array (
                'id' => 158,
                'name' => 'Hand, foot and mouth disease',
            ),
            157 => 
            array (
                'id' => 159,
                'name' => 'Hay fever',
            ),
            158 => 
            array (
                'id' => 160,
                'name' => 'Head and neck cancer',
            ),
            159 => 
            array (
                'id' => 161,
                'name' => 'Head lice and nits',
            ),
            160 => 
            array (
                'id' => 162,
                'name' => 'Headaches',
            ),
            161 => 
            array (
                'id' => 163,
                'name' => 'Hearing loss',
            ),
            162 => 
            array (
                'id' => 164,
                'name' => 'Heart attack',
            ),
            163 => 
            array (
                'id' => 165,
                'name' => 'Heart block',
            ),
            164 => 
            array (
                'id' => 166,
                'name' => 'Heart failure',
            ),
            165 => 
            array (
                'id' => 167,
                'name' => 'Heart palpitations',
            ),
            166 => 
            array (
                'id' => 168,
                'name' => 'Hepatitis A',
            ),
            167 => 
            array (
                'id' => 169,
                'name' => 'Hepatitis B',
            ),
            168 => 
            array (
                'id' => 170,
                'name' => 'Hepatitis C',
            ),
            169 => 
            array (
                'id' => 171,
                'name' => 'Hiatus hernia',
            ),
            170 => 
            array (
                'id' => 172,
            'name' => 'High blood pressure (hypertension)',
            ),
            171 => 
            array (
                'id' => 173,
                'name' => 'High cholesterol',
            ),
            172 => 
            array (
                'id' => 174,
                'name' => 'HIV',
            ),
            173 => 
            array (
                'id' => 175,
                'name' => 'Hodgkin lymphoma',
            ),
            174 => 
            array (
                'id' => 176,
                'name' => 'Hodgkin lymphoma: Children',
            ),
            175 => 
            array (
                'id' => 177,
                'name' => 'Hodgkin lymphoma: Teenagers and young adults',
            ),
            176 => 
            array (
                'id' => 178,
                'name' => 'Huntington’s disease',
            ),
            177 => 
            array (
                'id' => 179,
            'name' => 'Hyperglycaemia (high blood sugar)',
            ),
            178 => 
            array (
                'id' => 180,
                'name' => 'Hyperhidrosis',
            ),
            179 => 
            array (
                'id' => 181,
            'name' => 'Hypoglycaemia (low blood sugar)',
            ),
            180 => 
            array (
                'id' => 182,
                'name' => 'Idiopathic pulmonary fibrosis',
            ),
            181 => 
            array (
                'id' => 183,
                'name' => 'If your child has cold or flu symptoms',
            ),
            182 => 
            array (
                'id' => 184,
                'name' => 'Impetigo',
            ),
            183 => 
            array (
                'id' => 185,
                'name' => 'Indigestion',
            ),
            184 => 
            array (
                'id' => 186,
                'name' => 'Ingrown toenail',
            ),
            185 => 
            array (
                'id' => 187,
                'name' => 'Infertility',
            ),
            186 => 
            array (
                'id' => 188,
            'name' => 'Inflammatory bowel disease (IBD)',
            ),
            187 => 
            array (
                'id' => 189,
                'name' => 'Inherited heart conditions',
            ),
            188 => 
            array (
                'id' => 190,
                'name' => 'Insomnia',
            ),
            189 => 
            array (
                'id' => 191,
                'name' => 'Iron deficiency anaemia',
            ),
            190 => 
            array (
                'id' => 192,
            'name' => 'Irritable bowel syndrome (IBS)',
            ),
            191 => 
            array (
                'id' => 193,
                'name' => 'Itching',
            ),
            192 => 
            array (
                'id' => 194,
                'name' => 'Itchy bottom',
            ),
            193 => 
            array (
                'id' => 195,
                'name' => 'Itchy skin',
            ),
            194 => 
            array (
                'id' => 196,
                'name' => 'Joint hypermobility',
            ),
            195 => 
            array (
                'id' => 197,
                'name' => 'Kaposi’s sarcoma',
            ),
            196 => 
            array (
                'id' => 198,
                'name' => 'Kidney cancer',
            ),
            197 => 
            array (
                'id' => 199,
                'name' => 'Kidney infection',
            ),
            198 => 
            array (
                'id' => 200,
                'name' => 'Kidney stones',
            ),
            199 => 
            array (
                'id' => 201,
                'name' => 'Labyrinthitis',
            ),
            200 => 
            array (
                'id' => 202,
                'name' => 'Lactose intolerance',
            ),
            201 => 
            array (
                'id' => 203,
            'name' => 'Laryngeal (larynx) cancer',
            ),
            202 => 
            array (
                'id' => 204,
                'name' => 'Laryngitis',
            ),
            203 => 
            array (
                'id' => 205,
                'name' => 'Leg cramps',
            ),
            204 => 
            array (
                'id' => 206,
                'name' => 'Lichen planus',
            ),
            205 => 
            array (
                'id' => 207,
                'name' => 'Lipoedema',
            ),
            206 => 
            array (
                'id' => 208,
                'name' => 'Liver cancer',
            ),
            207 => 
            array (
                'id' => 209,
                'name' => 'Liver disease',
            ),
            208 => 
            array (
                'id' => 210,
                'name' => 'Liver tumours',
            ),
            209 => 
            array (
                'id' => 211,
                'name' => 'Long-term effects of COVID-19',
            ),
            210 => 
            array (
                'id' => 212,
                'name' => 'Loss of libido',
            ),
            211 => 
            array (
                'id' => 213,
            'name' => 'Low blood pressure (hypotension)',
            ),
            212 => 
            array (
                'id' => 214,
                'name' => 'Lumbar stenosis',
            ),
            213 => 
            array (
                'id' => 215,
                'name' => 'Lung cancer',
            ),
            214 => 
            array (
                'id' => 216,
                'name' => 'Lupus',
            ),
            215 => 
            array (
                'id' => 217,
                'name' => 'Lyme disease',
            ),
            216 => 
            array (
                'id' => 218,
                'name' => 'Lymphoedema',
            ),
            217 => 
            array (
                'id' => 219,
            'name' => 'Lymphogranuloma venereum (LGV)',
            ),
            218 => 
            array (
                'id' => 220,
                'name' => 'Malaria',
            ),
            219 => 
            array (
                'id' => 221,
            'name' => 'Malignant brain tumour (cancerous)',
            ),
            220 => 
            array (
                'id' => 222,
                'name' => 'Malnutrition',
            ),
            221 => 
            array (
                'id' => 223,
                'name' => 'Managing genital symptoms',
            ),
            222 => 
            array (
                'id' => 224,
                'name' => 'Measles',
            ),
            223 => 
            array (
                'id' => 225,
                'name' => 'Meningitis',
            ),
            224 => 
            array (
                'id' => 226,
                'name' => 'Meniere’s disease',
            ),
            225 => 
            array (
                'id' => 227,
                'name' => 'Menopause',
            ),
            226 => 
            array (
                'id' => 228,
                'name' => 'Mesothelioma',
            ),
            227 => 
            array (
                'id' => 229,
            'name' => 'Middle ear infection (otitis media)',
            ),
            228 => 
            array (
                'id' => 230,
                'name' => 'Migraine',
            ),
            229 => 
            array (
                'id' => 231,
                'name' => 'Miscarriage',
            ),
            230 => 
            array (
                'id' => 232,
            'name' => 'Motor neurone disease (MND)',
            ),
            231 => 
            array (
                'id' => 233,
                'name' => 'Mouth cancer',
            ),
            232 => 
            array (
                'id' => 234,
                'name' => 'Mouth ulcer',
            ),
            233 => 
            array (
                'id' => 235,
                'name' => 'Multiple myeloma',
            ),
            234 => 
            array (
                'id' => 236,
            'name' => 'Multiple sclerosis (MS)',
            ),
            235 => 
            array (
                'id' => 237,
            'name' => 'Multiple system atrophy (MSA)',
            ),
            236 => 
            array (
                'id' => 238,
                'name' => 'Mumps',
            ),
            237 => 
            array (
                'id' => 239,
                'name' => 'Munchausen’s syndrome',
            ),
            238 => 
            array (
                'id' => 240,
            'name' => 'Myalgic encephalomyelitis (ME) or chronic fatigue syndrome (CFS)',
            ),
            239 => 
            array (
                'id' => 241,
                'name' => 'Myasthenia gravis',
            ),
            240 => 
            array (
                'id' => 242,
                'name' => 'Nasal and sinus cancer',
            ),
            241 => 
            array (
                'id' => 243,
                'name' => 'Nasopharyngeal cancer',
            ),
            242 => 
            array (
                'id' => 244,
                'name' => 'Neck problems',
            ),
            243 => 
            array (
                'id' => 245,
                'name' => 'Neuroblastoma: Children',
            ),
            244 => 
            array (
                'id' => 246,
                'name' => 'Neuroendocrine tumours',
            ),
            245 => 
            array (
                'id' => 247,
            'name' => 'Non-alcoholic fatty liver disease (NAFLD)',
            ),
            246 => 
            array (
                'id' => 248,
                'name' => 'Non-Hodgkin lymphoma',
            ),
            247 => 
            array (
                'id' => 249,
                'name' => 'Non-Hodgkin lymphoma: Children',
            ),
            248 => 
            array (
                'id' => 250,
                'name' => 'Norovirus',
            ),
            249 => 
            array (
                'id' => 251,
                'name' => 'Nosebleed',
            ),
            250 => 
            array (
                'id' => 252,
                'name' => 'Obesity',
            ),
            251 => 
            array (
                'id' => 253,
            'name' => 'Obsessive compulsive disorder (OCD)',
            ),
            252 => 
            array (
                'id' => 254,
                'name' => 'Obstructive sleep apnoea',
            ),
            253 => 
            array (
                'id' => 255,
                'name' => 'Oesophageal cancer',
            ),
            254 => 
            array (
                'id' => 256,
                'name' => 'Oral thrush in adults',
            ),
            255 => 
            array (
                'id' => 257,
                'name' => 'Osteoarthritis',
            ),
            256 => 
            array (
                'id' => 258,
                'name' => 'Osteoarthritis of the hip',
            ),
            257 => 
            array (
                'id' => 259,
                'name' => 'Osteoarthritis of the knee',
            ),
            258 => 
            array (
                'id' => 260,
                'name' => 'Osteoarthritis of the thumb',
            ),
            259 => 
            array (
                'id' => 261,
                'name' => 'Osteoporosis',
            ),
            260 => 
            array (
                'id' => 262,
                'name' => 'Osteosarcoma',
            ),
            261 => 
            array (
                'id' => 263,
            'name' => 'Outer ear infection (otitis externa)',
            ),
            262 => 
            array (
                'id' => 264,
                'name' => 'Ovarian cancer',
            ),
            263 => 
            array (
                'id' => 265,
                'name' => 'Ovarian cancer: Teenagers and young adults',
            ),
            264 => 
            array (
                'id' => 266,
                'name' => 'Ovarian cyst',
            ),
            265 => 
            array (
                'id' => 267,
                'name' => 'Overactive thyroid',
            ),
            266 => 
            array (
                'id' => 268,
                'name' => 'Pain in the ball of the foot',
            ),
            267 => 
            array (
                'id' => 269,
                'name' => 'Paget’s disease of the nipple',
            ),
            268 => 
            array (
                'id' => 270,
                'name' => 'Pancreatic cancer',
            ),
            269 => 
            array (
                'id' => 271,
                'name' => 'Panic disorder',
            ),
            270 => 
            array (
                'id' => 272,
                'name' => 'Parkinson’s disease',
            ),
            271 => 
            array (
                'id' => 273,
                'name' => 'Patau’s syndrome',
            ),
            272 => 
            array (
                'id' => 274,
                'name' => 'Patellofemoral pain syndrome',
            ),
            273 => 
            array (
                'id' => 275,
                'name' => 'Pelvic inflammatory disease',
            ),
            274 => 
            array (
                'id' => 276,
                'name' => 'Pelvic organ prolapse',
            ),
            275 => 
            array (
                'id' => 277,
                'name' => 'Penile cancer',
            ),
            276 => 
            array (
                'id' => 278,
                'name' => 'Peripheral neuropathy',
            ),
            277 => 
            array (
                'id' => 279,
                'name' => 'Personality disorder',
            ),
            278 => 
            array (
                'id' => 280,
                'name' => 'PIMS',
            ),
            279 => 
            array (
                'id' => 281,
                'name' => 'Plantar heel pain',
            ),
            280 => 
            array (
                'id' => 282,
                'name' => 'Pleurisy',
            ),
            281 => 
            array (
                'id' => 283,
                'name' => 'Pneumonia',
            ),
            282 => 
            array (
                'id' => 284,
                'name' => 'Polio',
            ),
            283 => 
            array (
                'id' => 285,
            'name' => 'Polycystic ovary syndrome (PCOS)',
            ),
            284 => 
            array (
                'id' => 286,
                'name' => 'Polymyalgia rheumatica',
            ),
            285 => 
            array (
                'id' => 287,
                'name' => 'Post-polio syndrome',
            ),
            286 => 
            array (
                'id' => 288,
            'name' => 'Post-traumatic stress disorder (PTSD)',
            ),
            287 => 
            array (
                'id' => 289,
            'name' => 'Postural orthostatic tachycardia syndrome (PoTS)',
            ),
            288 => 
            array (
                'id' => 290,
                'name' => 'Postnatal depression',
            ),
            289 => 
            array (
                'id' => 291,
                'name' => 'Pregnancy and baby',
            ),
            290 => 
            array (
                'id' => 292,
                'name' => 'Pressure ulcers',
            ),
            291 => 
            array (
                'id' => 293,
            'name' => 'Progressive supranuclear palsy (PSP)',
            ),
            292 => 
            array (
                'id' => 294,
                'name' => 'Prostate cancer',
            ),
            293 => 
            array (
                'id' => 295,
                'name' => 'Psoriasis',
            ),
            294 => 
            array (
                'id' => 296,
                'name' => 'Psoriatic arthritis',
            ),
            295 => 
            array (
                'id' => 297,
                'name' => 'Psychosis',
            ),
            296 => 
            array (
                'id' => 298,
                'name' => 'Pubic lice',
            ),
            297 => 
            array (
                'id' => 299,
                'name' => 'Pulmonary hypertension',
            ),
            298 => 
            array (
                'id' => 300,
                'name' => 'Rare conditions',
            ),
            299 => 
            array (
                'id' => 301,
                'name' => 'Rare tumours',
            ),
            300 => 
            array (
                'id' => 302,
                'name' => 'Raynaud’s phenomenon',
            ),
            301 => 
            array (
                'id' => 303,
                'name' => 'Reactive arthritis',
            ),
            302 => 
            array (
                'id' => 304,
                'name' => 'Restless legs syndrome',
            ),
            303 => 
            array (
                'id' => 305,
            'name' => 'Respiratory syncytial virus (RSV)',
            ),
            304 => 
            array (
                'id' => 306,
                'name' => 'Retinoblastoma: Children',
            ),
            305 => 
            array (
                'id' => 307,
                'name' => 'Rhabdomyosarcoma',
            ),
            306 => 
            array (
                'id' => 308,
                'name' => 'Rheumatoid arthritis',
            ),
            307 => 
            array (
                'id' => 309,
                'name' => 'Ringworm and other fungal infections',
            ),
            308 => 
            array (
                'id' => 310,
                'name' => 'Rosacea',
            ),
            309 => 
            array (
                'id' => 311,
                'name' => 'Scabies',
            ),
            310 => 
            array (
                'id' => 312,
                'name' => 'Scarlet fever',
            ),
            311 => 
            array (
                'id' => 313,
                'name' => 'Schizophrenia',
            ),
            312 => 
            array (
                'id' => 314,
                'name' => 'Sciatica',
            ),
            313 => 
            array (
                'id' => 315,
                'name' => 'Scoliosis',
            ),
            314 => 
            array (
                'id' => 316,
            'name' => 'Seasonal affective disorder (SAD)',
            ),
            315 => 
            array (
                'id' => 317,
                'name' => 'Sepsis',
            ),
            316 => 
            array (
                'id' => 318,
                'name' => 'Septic shock',
            ),
            317 => 
            array (
                'id' => 319,
                'name' => 'Shingles',
            ),
            318 => 
            array (
                'id' => 320,
                'name' => 'Shortness of breath',
            ),
            319 => 
            array (
                'id' => 321,
                'name' => 'Sickle cell disease',
            ),
            320 => 
            array (
                'id' => 322,
                'name' => 'Sinusitis',
            ),
            321 => 
            array (
                'id' => 323,
                'name' => 'Sjogren’s syndrome',
            ),
            322 => 
            array (
                'id' => 324,
            'name' => 'Skin cancer (melanoma)',
            ),
            323 => 
            array (
                'id' => 325,
            'name' => 'Skin cancer (non-melanoma)',
            ),
            324 => 
            array (
                'id' => 326,
            'name' => 'Skin light sensitivity (photosensitivity)',
            ),
            325 => 
            array (
                'id' => 327,
                'name' => 'Skin rashes in children',
            ),
            326 => 
            array (
                'id' => 328,
                'name' => 'Slapped cheek syndrome',
            ),
            327 => 
            array (
                'id' => 329,
                'name' => 'Soft tissue sarcomas',
            ),
            328 => 
            array (
                'id' => 330,
                'name' => 'Soft tissue sarcomas: Teenagers and young adults',
            ),
            329 => 
            array (
                'id' => 331,
                'name' => 'Sore throat',
            ),
            330 => 
            array (
                'id' => 332,
                'name' => 'Spleen problems and spleen removal',
            ),
            331 => 
            array (
                'id' => 333,
                'name' => 'Stillbirth',
            ),
            332 => 
            array (
                'id' => 334,
                'name' => 'Stomach ache and abdominal pain',
            ),
            333 => 
            array (
                'id' => 335,
                'name' => 'Stomach cancer',
            ),
            334 => 
            array (
                'id' => 336,
                'name' => 'Stomach ulcer',
            ),
            335 => 
            array (
                'id' => 337,
            'name' => 'Streptococcus A (strep A)',
            ),
            336 => 
            array (
                'id' => 338,
                'name' => 'Stress, anxiety and low mood',
            ),
            337 => 
            array (
                'id' => 339,
                'name' => 'Stroke',
            ),
            338 => 
            array (
                'id' => 340,
                'name' => 'Subacromial pain syndrome',
            ),
            339 => 
            array (
                'id' => 341,
            'name' => 'Sudden infant death syndrome (SIDS)',
            ),
            340 => 
            array (
                'id' => 342,
                'name' => 'Suicide',
            ),
            341 => 
            array (
                'id' => 343,
                'name' => 'Sunburn',
            ),
            342 => 
            array (
                'id' => 344,
                'name' => 'Supraventricular tachycardia',
            ),
            343 => 
            array (
                'id' => 345,
                'name' => 'Swollen glands',
            ),
            344 => 
            array (
                'id' => 346,
                'name' => 'Syphilis',
            ),
            345 => 
            array (
                'id' => 347,
                'name' => 'Tennis elbow',
            ),
            346 => 
            array (
                'id' => 348,
                'name' => 'Testicular cancer',
            ),
            347 => 
            array (
                'id' => 349,
                'name' => 'Testicular cancer: Teenagers and young adults',
            ),
            348 => 
            array (
                'id' => 350,
                'name' => 'Testicular lumps and swellings',
            ),
            349 => 
            array (
                'id' => 351,
                'name' => 'Thirst',
            ),
            350 => 
            array (
                'id' => 352,
                'name' => 'Threadworms',
            ),
            351 => 
            array (
                'id' => 353,
                'name' => 'Thrush',
            ),
            352 => 
            array (
                'id' => 354,
                'name' => 'Thyroid cancer',
            ),
            353 => 
            array (
                'id' => 355,
                'name' => 'Thyroid cancer: Teenagers and young adults',
            ),
            354 => 
            array (
                'id' => 356,
                'name' => 'Tick bites',
            ),
            355 => 
            array (
                'id' => 357,
                'name' => 'Tinnitus',
            ),
            356 => 
            array (
                'id' => 358,
                'name' => 'Tonsillitis',
            ),
            357 => 
            array (
                'id' => 359,
                'name' => 'Tooth decay',
            ),
            358 => 
            array (
                'id' => 360,
                'name' => 'Toothache',
            ),
            359 => 
            array (
                'id' => 361,
                'name' => 'Tourette’s syndrome',
            ),
            360 => 
            array (
                'id' => 362,
            'name' => 'Transient ischaemic attack (TIA)',
            ),
            361 => 
            array (
                'id' => 363,
                'name' => 'Transverse myelitis',
            ),
            362 => 
            array (
                'id' => 364,
                'name' => 'Trichomonas infection',
            ),
            363 => 
            array (
                'id' => 365,
                'name' => 'Trigeminal neuralgia',
            ),
            364 => 
            array (
                'id' => 366,
            'name' => 'Tuberculosis (TB)',
            ),
            365 => 
            array (
                'id' => 367,
                'name' => 'Type 1 diabetes',
            ),
            366 => 
            array (
                'id' => 368,
                'name' => 'Type 2 diabetes',
            ),
            367 => 
            array (
                'id' => 369,
                'name' => 'Ulcerative colitis',
            ),
            368 => 
            array (
                'id' => 370,
                'name' => 'Underactive thyroid',
            ),
            369 => 
            array (
                'id' => 371,
                'name' => 'Urinary incontinence',
            ),
            370 => 
            array (
                'id' => 372,
                'name' => 'Urinary incontinence in women',
            ),
            371 => 
            array (
                'id' => 373,
            'name' => 'Urinary tract infection (UTI)',
            ),
            372 => 
            array (
                'id' => 374,
            'name' => 'Urinary tract infection (UTI) in children',
            ),
            373 => 
            array (
                'id' => 375,
            'name' => 'Urticaria (hives)',
            ),
            374 => 
            array (
                'id' => 376,
                'name' => 'Vaginal cancer',
            ),
            375 => 
            array (
                'id' => 377,
                'name' => 'Vaginal discharge',
            ),
            376 => 
            array (
                'id' => 378,
                'name' => 'Varicose eczema',
            ),
            377 => 
            array (
                'id' => 379,
                'name' => 'Varicose veins',
            ),
            378 => 
            array (
                'id' => 380,
                'name' => 'Venous leg ulcer',
            ),
            379 => 
            array (
                'id' => 381,
                'name' => 'Vertigo',
            ),
            380 => 
            array (
                'id' => 382,
                'name' => 'Vitamin B12 or folate deficiency anaemia',
            ),
            381 => 
            array (
                'id' => 383,
                'name' => 'Vomiting in adults',
            ),
            382 => 
            array (
                'id' => 384,
                'name' => 'Vomiting in children and babies',
            ),
            383 => 
            array (
                'id' => 385,
                'name' => 'Vulval cancer',
            ),
            384 => 
            array (
                'id' => 386,
                'name' => 'Warts and verrucas',
            ),
            385 => 
            array (
                'id' => 387,
                'name' => 'Whiplash',
            ),
            386 => 
            array (
                'id' => 388,
                'name' => 'Whooping cough',
            ),
            387 => 
            array (
                'id' => 389,
                'name' => 'Wilms’ tumour',
            ),
            388 => 
            array (
                'id' => 390,
                'name' => 'Wolff-Parkinson-White syndrome',
            ),
            389 => 
            array (
                'id' => 391,
            'name' => 'Womb (uterus) cancer',
            ),
            390 => 
            array (
                'id' => 392,
                'name' => 'Yellow fever',
            ),
        ));
        
        
    }
}