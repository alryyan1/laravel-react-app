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
                'name' => 'Achillies tendinopathy',
            ),
            1 => 
            array (
                'name' => 'Acne',
            ),
            2 => 
            array (
                'name' => 'Acute cholecystitis',
            ),
            3 => 
            array (
                'name' => 'Acute lymphoblastic leukaemia',
            ),
            4 => 
            array (
                'name' => 'Acute lymphoblastic leukaemia: Children',
            ),
            5 => 
            array (
                'name' => 'Acute lymphoblastic leukaemia: Teenagers and young adults',
            ),
            6 => 
            array (
                'name' => 'Acute myeloid leukaemia',
            ),
            7 => 
            array (
                'name' => 'Acute myeloid leukaemia: Children',
            ),
            8 => 
            array (
                'name' => 'Acute myeloid leukaemia: Teenagers and young adults',
            ),
            9 => 
            array (
                'name' => 'Acute pancreatitis',
            ),
            10 => 
            array (
                'name' => 'Addison’s disease',
            ),
            11 => 
            array (
                'name' => 'Adenomyosis',
            ),
            12 => 
            array (
                'name' => 'Alcohol-related liver disease',
            ),
            13 => 
            array (
                'name' => 'Allergic rhinitis',
            ),
            14 => 
            array (
                'name' => 'Allergies',
            ),
            15 => 
            array (
                'name' => 'Alzheimer’s disease',
            ),
            16 => 
            array (
                'name' => 'Anal cancer',
            ),
            17 => 
            array (
                'name' => 'Anaphylaxis',
            ),
            18 => 
            array (
                'name' => 'Angina',
            ),
            19 => 
            array (
                'name' => 'Angioedema',
            ),
            20 => 
            array (
                'name' => 'Ankle sprain',
            ),
            21 => 
            array (
                'name' => 'Ankylosing spondylitis',
            ),
            22 => 
            array (
                'name' => 'Anorexia nervosa',
            ),
            23 => 
            array (
                'name' => 'Anxiety',
            ),
            24 => 
            array (
                'name' => 'Anxiety disorders in children',
            ),
            25 => 
            array (
                'name' => 'Appendicitis',
            ),
            26 => 
            array (
                'name' => 'Arterial thrombosis',
            ),
            27 => 
            array (
                'name' => 'Arthritis',
            ),
            28 => 
            array (
                'name' => 'Asbestosis',
            ),
            29 => 
            array (
                'name' => 'Asthma',
            ),
            30 => 
            array (
                'name' => 'Ataxia',
            ),
            31 => 
            array (
                'name' => 'Atopic eczema',
            ),
            32 => 
            array (
                'name' => 'Atrial fibrillation',
            ),
            33 => 
            array (
            'name' => 'Attention deficit hyperactivity disorder (ADHD)',
            ),
            34 => 
            array (
            'name' => 'Autistic spectrum disorder (ASD)',
            ),
            35 => 
            array (
                'name' => 'Bacterial vaginosis',
            ),
            36 => 
            array (
                'name' => 'Benign prostate enlargement',
            ),
            37 => 
            array (
            'name' => 'Bile duct cancer (cholangiocarcinoma)',
            ),
            38 => 
            array (
                'name' => 'Binge eating',
            ),
            39 => 
            array (
                'name' => 'Bipolar disorder',
            ),
            40 => 
            array (
                'name' => 'Bladder cancer',
            ),
            41 => 
            array (
            'name' => 'Blood poisoning (sepsis)',
            ),
            42 => 
            array (
                'name' => 'Bone cancer',
            ),
            43 => 
            array (
                'name' => 'Bone cancer: Teenagers and young adults',
            ),
            44 => 
            array (
                'name' => 'Bowel cancer',
            ),
            45 => 
            array (
                'name' => 'Bowel incontinence',
            ),
            46 => 
            array (
                'name' => 'Bowel polyps',
            ),
            47 => 
            array (
                'name' => 'Brain stem death',
            ),
            48 => 
            array (
                'name' => 'Brain tumours',
            ),
            49 => 
            array (
                'name' => 'Brain tumours: Children',
            ),
            50 => 
            array (
                'name' => 'Brain tumours: Teenagers and young adults',
            ),
            51 => 
            array (
            'name' => 'Breast cancer (female)',
            ),
            52 => 
            array (
            'name' => 'Breast cancer (male)',
            ),
            53 => 
            array (
                'name' => 'Bronchiectasis',
            ),
            54 => 
            array (
                'name' => 'Bronchitis',
            ),
            55 => 
            array (
                'name' => 'Bulimia',
            ),
            56 => 
            array (
                'name' => 'Bunion',
            ),
            57 => 
            array (
                'name' => 'Carcinoid syndrome and carcinoid tumours',
            ),
            58 => 
            array (
                'name' => 'Cardiovascular disease',
            ),
            59 => 
            array (
                'name' => 'Carpal tunnel syndrome',
            ),
            60 => 
            array (
                'name' => 'Catarrh',
            ),
            61 => 
            array (
                'name' => 'Cellulitis',
            ),
            62 => 
            array (
                'name' => 'Cerebral palsy',
            ),
            63 => 
            array (
                'name' => 'Cervical cancer',
            ),
            64 => 
            array (
                'name' => 'Cervical spondylosis',
            ),
            65 => 
            array (
                'name' => 'Chest and rib injury',
            ),
            66 => 
            array (
                'name' => 'Chest infection',
            ),
            67 => 
            array (
                'name' => 'Chickenpox',
            ),
            68 => 
            array (
                'name' => 'Chilblains',
            ),
            69 => 
            array (
                'name' => 'Chlamydia',
            ),
            70 => 
            array (
                'name' => 'Chronic fatigue syndrome',
            ),
            71 => 
            array (
                'name' => 'Chronic kidney disease',
            ),
            72 => 
            array (
                'name' => 'Chronic lymphocytic leukaemia',
            ),
            73 => 
            array (
                'name' => 'Chronic myeloid leukaemia',
            ),
            74 => 
            array (
            'name' => 'Chronic obstructive pulmonary disease (COPD)',
            ),
            75 => 
            array (
                'name' => 'Chronic pain',
            ),
            76 => 
            array (
                'name' => 'Chronic pancreatitis',
            ),
            77 => 
            array (
                'name' => 'Cirrhosis',
            ),
            78 => 
            array (
                'name' => 'Clostridium difficile',
            ),
            79 => 
            array (
                'name' => 'Coeliac disease',
            ),
            80 => 
            array (
                'name' => 'Cold sore',
            ),
            81 => 
            array (
                'name' => 'Coma',
            ),
            82 => 
            array (
                'name' => 'Common cold',
            ),
            83 => 
            array (
                'name' => 'Congenital heart disease',
            ),
            84 => 
            array (
                'name' => 'Conjunctivitis',
            ),
            85 => 
            array (
                'name' => 'Constipation',
            ),
            86 => 
            array (
                'name' => 'Coronary heart disease',
            ),
            87 => 
            array (
            'name' => 'Coronavirus (COVID-19)',
            ),
            88 => 
            array (
            'name' => 'Coronavirus (COVID-19): Longer-term effects (long COVID)',
            ),
            89 => 
            array (
                'name' => 'Costochondritis',
            ),
            90 => 
            array (
                'name' => 'Cough',
            ),
            91 => 
            array (
                'name' => 'Crohn’s disease',
            ),
            92 => 
            array (
                'name' => 'Croup',
            ),
            93 => 
            array (
                'name' => 'Cystic fibrosis',
            ),
            94 => 
            array (
                'name' => 'Cystitis',
            ),
            95 => 
            array (
                'name' => 'Deafblindness',
            ),
            96 => 
            array (
                'name' => 'Deep vein thrombosis',
            ),
            97 => 
            array (
                'name' => 'Degenerative Cervical Myelopathy',
            ),
            98 => 
            array (
                'name' => 'Dehydration',
            ),
            99 => 
            array (
                'name' => 'Delirium',
            ),
            100 => 
            array (
                'name' => 'Dementia',
            ),
            101 => 
            array (
                'name' => 'Dental abscess',
            ),
            102 => 
            array (
                'name' => 'Depression',
            ),
            103 => 
            array (
                'name' => 'Dermatitis herpetiformis',
            ),
            104 => 
            array (
                'name' => 'Diabetes',
            ),
            105 => 
            array (
                'name' => 'Diabetic retinopathy',
            ),
            106 => 
            array (
                'name' => 'Diarrhoea',
            ),
            107 => 
            array (
                'name' => 'Discoid eczema',
            ),
            108 => 
            array (
                'name' => 'Diverticular disease and diverticulitis',
            ),
            109 => 
            array (
            'name' => 'Dizziness (Lightheadedness)',
            ),
            110 => 
            array (
                'name' => 'Down’s syndrome',
            ),
            111 => 
            array (
                'name' => 'Dry mouth',
            ),
            112 => 
            array (
            'name' => 'Dysphagia (swallowing problems)',
            ),
            113 => 
            array (
                'name' => 'Dystonia',
            ),
            114 => 
            array (
                'name' => 'Earache',
            ),
            115 => 
            array (
                'name' => 'Earwax build-up',
            ),
            116 => 
            array (
                'name' => 'Ebola virus disease',
            ),
            117 => 
            array (
                'name' => 'Ectopic pregnancy',
            ),
            118 => 
            array (
                'name' => 'Edwards’ syndrome',
            ),
            119 => 
            array (
                'name' => 'Endometriosis',
            ),
            120 => 
            array (
                'name' => 'Epilepsy',
            ),
            121 => 
            array (
            'name' => 'Erectile dysfunction (impotence)',
            ),
            122 => 
            array (
            'name' => 'Escherichia coli (E. coli) O157',
            ),
            123 => 
            array (
                'name' => 'Ewing sarcoma',
            ),
            124 => 
            array (
                'name' => 'Ewing sarcoma: Children',
            ),
            125 => 
            array (
                'name' => 'Eye cancer',
            ),
            126 => 
            array (
                'name' => 'Farting',
            ),
            127 => 
            array (
                'name' => 'Febrile seizures',
            ),
            128 => 
            array (
            'name' => 'Feeling of something in your throat (Globus)',
            ),
            129 => 
            array (
                'name' => 'Fever in adults',
            ),
            130 => 
            array (
                'name' => 'Fever in children',
            ),
            131 => 
            array (
                'name' => 'Fibroids',
            ),
            132 => 
            array (
                'name' => 'Fibromyalgia',
            ),
            133 => 
            array (
                'name' => 'Flu',
            ),
            134 => 
            array (
                'name' => 'Foetal alcohol syndrome',
            ),
            135 => 
            array (
                'name' => 'Food allergy',
            ),
            136 => 
            array (
                'name' => 'Food poisoning',
            ),
            137 => 
            array (
                'name' => 'Frozen shoulder',
            ),
            138 => 
            array (
            'name' => 'Functional neurological disorder (FND)',
            ),
            139 => 
            array (
                'name' => 'Fungal nail infection',
            ),
            140 => 
            array (
                'name' => 'Gallbladder cancer',
            ),
            141 => 
            array (
                'name' => 'Gallstones',
            ),
            142 => 
            array (
                'name' => 'Ganglion cyst',
            ),
            143 => 
            array (
                'name' => 'Gastroenteritis',
            ),
            144 => 
            array (
            'name' => 'Gastro-oesophageal reflux disease (GORD)',
            ),
            145 => 
            array (
                'name' => 'Genital herpes',
            ),
            146 => 
            array (
                'name' => 'Genital symptoms',
            ),
            147 => 
            array (
                'name' => 'Genital warts',
            ),
            148 => 
            array (
                'name' => 'Germ cell tumours',
            ),
            149 => 
            array (
                'name' => 'Glandular fever',
            ),
            150 => 
            array (
                'name' => 'Golfers elbow',
            ),
            151 => 
            array (
                'name' => 'Gonorrhoea',
            ),
            152 => 
            array (
                'name' => 'Gout',
            ),
            153 => 
            array (
                'name' => 'Greater trochanteric pain syndrome',
            ),
            154 => 
            array (
                'name' => 'Gum disease',
            ),
            155 => 
            array (
            'name' => 'Haemorrhoids (piles)',
            ),
            156 => 
            array (
                'name' => 'Hand, foot and mouth disease',
            ),
            157 => 
            array (
                'name' => 'Hay fever',
            ),
            158 => 
            array (
                'name' => 'Head and neck cancer',
            ),
            159 => 
            array (
                'name' => 'Head lice and nits',
            ),
            160 => 
            array (
                'name' => 'Headaches',
            ),
            161 => 
            array (
                'name' => 'Hearing loss',
            ),
            162 => 
            array (
                'name' => 'Heart attack',
            ),
            163 => 
            array (
                'name' => 'Heart block',
            ),
            164 => 
            array (
                'name' => 'Heart failure',
            ),
            165 => 
            array (
                'name' => 'Heart palpitations',
            ),
            166 => 
            array (
                'name' => 'Hepatitis A',
            ),
            167 => 
            array (
                'name' => 'Hepatitis B',
            ),
            168 => 
            array (
                'name' => 'Hepatitis C',
            ),
            169 => 
            array (
                'name' => 'Hiatus hernia',
            ),
            170 => 
            array (
            'name' => 'High blood pressure (hypertension)',
            ),
            171 => 
            array (
                'name' => 'High cholesterol',
            ),
            172 => 
            array (
                'name' => 'HIV',
            ),
            173 => 
            array (
                'name' => 'Hodgkin lymphoma',
            ),
            174 => 
            array (
                'name' => 'Hodgkin lymphoma: Children',
            ),
            175 => 
            array (
                'name' => 'Hodgkin lymphoma: Teenagers and young adults',
            ),
            176 => 
            array (
                'name' => 'Huntington’s disease',
            ),
            177 => 
            array (
            'name' => 'Hyperglycaemia (high blood sugar)',
            ),
            178 => 
            array (
                'name' => 'Hyperhidrosis',
            ),
            179 => 
            array (
            'name' => 'Hypoglycaemia (low blood sugar)',
            ),
            180 => 
            array (
                'name' => 'Idiopathic pulmonary fibrosis',
            ),
            181 => 
            array (
                'name' => 'If your child has cold or flu symptoms',
            ),
            182 => 
            array (
                'name' => 'Impetigo',
            ),
            183 => 
            array (
                'name' => 'Indigestion',
            ),
            184 => 
            array (
                'name' => 'Ingrown toenail',
            ),
            185 => 
            array (
                'name' => 'Infertility',
            ),
            186 => 
            array (
            'name' => 'Inflammatory bowel disease (IBD)',
            ),
            187 => 
            array (
                'name' => 'Inherited heart conditions',
            ),
            188 => 
            array (
                'name' => 'Insomnia',
            ),
            189 => 
            array (
                'name' => 'Iron deficiency anaemia',
            ),
            190 => 
            array (
            'name' => 'Irritable bowel syndrome (IBS)',
            ),
            191 => 
            array (
                'name' => 'Itching',
            ),
            192 => 
            array (
                'name' => 'Itchy bottom',
            ),
            193 => 
            array (
                'name' => 'Itchy skin',
            ),
            194 => 
            array (
                'name' => 'Joint hypermobility',
            ),
            195 => 
            array (
                'name' => 'Kaposi’s sarcoma',
            ),
            196 => 
            array (
                'name' => 'Kidney cancer',
            ),
            197 => 
            array (
                'name' => 'Kidney infection',
            ),
            198 => 
            array (
                'name' => 'Kidney stones',
            ),
            199 => 
            array (
                'name' => 'Labyrinthitis',
            ),
            200 => 
            array (
                'name' => 'Lactose intolerance',
            ),
            201 => 
            array (
            'name' => 'Laryngeal (larynx) cancer',
            ),
            202 => 
            array (
                'name' => 'Laryngitis',
            ),
            203 => 
            array (
                'name' => 'Leg cramps',
            ),
            204 => 
            array (
                'name' => 'Lichen planus',
            ),
            205 => 
            array (
                'name' => 'Lipoedema',
            ),
            206 => 
            array (
                'name' => 'Liver cancer',
            ),
            207 => 
            array (
                'name' => 'Liver disease',
            ),
            208 => 
            array (
                'name' => 'Liver tumours',
            ),
            209 => 
            array (
                'name' => 'Long-term effects of COVID-19',
            ),
            210 => 
            array (
                'name' => 'Loss of libido',
            ),
            211 => 
            array (
            'name' => 'Low blood pressure (hypotension)',
            ),
            212 => 
            array (
                'name' => 'Lumbar stenosis',
            ),
            213 => 
            array (
                'name' => 'Lung cancer',
            ),
            214 => 
            array (
                'name' => 'Lupus',
            ),
            215 => 
            array (
                'name' => 'Lyme disease',
            ),
            216 => 
            array (
                'name' => 'Lymphoedema',
            ),
            217 => 
            array (
            'name' => 'Lymphogranuloma venereum (LGV)',
            ),
            218 => 
            array (
                'name' => 'Malaria',
            ),
            219 => 
            array (
            'name' => 'Malignant brain tumour (cancerous)',
            ),
            220 => 
            array (
                'name' => 'Malnutrition',
            ),
            221 => 
            array (
                'name' => 'Managing genital symptoms',
            ),
            222 => 
            array (
                'name' => 'Measles',
            ),
            223 => 
            array (
                'name' => 'Meningitis',
            ),
            224 => 
            array (
                'name' => 'Meniere’s disease',
            ),
            225 => 
            array (
                'name' => 'Menopause',
            ),
            226 => 
            array (
                'name' => 'Mesothelioma',
            ),
            227 => 
            array (
            'name' => 'Middle ear infection (otitis media)',
            ),
            228 => 
            array (
                'name' => 'Migraine',
            ),
            229 => 
            array (
                'name' => 'Miscarriage',
            ),
            230 => 
            array (
            'name' => 'Motor neurone disease (MND)',
            ),
            231 => 
            array (
                'name' => 'Mouth cancer',
            ),
            232 => 
            array (
                'name' => 'Mouth ulcer',
            ),
            233 => 
            array (
                'name' => 'Multiple myeloma',
            ),
            234 => 
            array (
            'name' => 'Multiple sclerosis (MS)',
            ),
            235 => 
            array (
            'name' => 'Multiple system atrophy (MSA)',
            ),
            236 => 
            array (
                'name' => 'Mumps',
            ),
            237 => 
            array (
                'name' => 'Munchausen’s syndrome',
            ),
            238 => 
            array (
            'name' => 'Myalgic encephalomyelitis (ME) or chronic fatigue syndrome (CFS)',
            ),
            239 => 
            array (
                'name' => 'Myasthenia gravis',
            ),
            240 => 
            array (
                'name' => 'Nasal and sinus cancer',
            ),
            241 => 
            array (
                'name' => 'Nasopharyngeal cancer',
            ),
            242 => 
            array (
                'name' => 'Neck problems',
            ),
            243 => 
            array (
                'name' => 'Neuroblastoma: Children',
            ),
            244 => 
            array (
                'name' => 'Neuroendocrine tumours',
            ),
            245 => 
            array (
            'name' => 'Non-alcoholic fatty liver disease (NAFLD)',
            ),
            246 => 
            array (
                'name' => 'Non-Hodgkin lymphoma',
            ),
            247 => 
            array (
                'name' => 'Non-Hodgkin lymphoma: Children',
            ),
            248 => 
            array (
                'name' => 'Norovirus',
            ),
            249 => 
            array (
                'name' => 'Nosebleed',
            ),
            250 => 
            array (
                'name' => 'Achillies tendinopathy',
            ),
            251 => 
            array (
                'name' => 'Acne',
            ),
            252 => 
            array (
                'name' => 'Acute cholecystitis',
            ),
            253 => 
            array (
                'name' => 'Acute lymphoblastic leukaemia',
            ),
            254 => 
            array (
                'name' => 'Acute lymphoblastic leukaemia: Children',
            ),
            255 => 
            array (
                'name' => 'Acute lymphoblastic leukaemia: Teenagers and young adults',
            ),
            256 => 
            array (
                'name' => 'Acute myeloid leukaemia',
            ),
            257 => 
            array (
                'name' => 'Acute myeloid leukaemia: Children',
            ),
            258 => 
            array (
                'name' => 'Acute myeloid leukaemia: Teenagers and young adults',
            ),
            259 => 
            array (
                'name' => 'Acute pancreatitis',
            ),
            260 => 
            array (
                'name' => 'Addison’s disease',
            ),
            261 => 
            array (
                'name' => 'Adenomyosis',
            ),
            262 => 
            array (
                'name' => 'Alcohol-related liver disease',
            ),
            263 => 
            array (
                'name' => 'Allergic rhinitis',
            ),
            264 => 
            array (
                'name' => 'Allergies',
            ),
            265 => 
            array (
                'name' => 'Alzheimer’s disease',
            ),
            266 => 
            array (
                'name' => 'Anal cancer',
            ),
            267 => 
            array (
                'name' => 'Anaphylaxis',
            ),
            268 => 
            array (
                'name' => 'Angina',
            ),
            269 => 
            array (
                'name' => 'Angioedema',
            ),
            270 => 
            array (
                'name' => 'Ankle sprain',
            ),
            271 => 
            array (
                'name' => 'Ankylosing spondylitis',
            ),
            272 => 
            array (
                'name' => 'Anorexia nervosa',
            ),
            273 => 
            array (
                'name' => 'Anxiety',
            ),
            274 => 
            array (
                'name' => 'Anxiety disorders in children',
            ),
            275 => 
            array (
                'name' => 'Appendicitis',
            ),
            276 => 
            array (
                'name' => 'Arterial thrombosis',
            ),
            277 => 
            array (
                'name' => 'Arthritis',
            ),
            278 => 
            array (
                'name' => 'Asbestosis',
            ),
            279 => 
            array (
                'name' => 'Asthma',
            ),
            280 => 
            array (
                'name' => 'Ataxia',
            ),
            281 => 
            array (
                'name' => 'Atopic eczema',
            ),
            282 => 
            array (
                'name' => 'Atrial fibrillation',
            ),
            283 => 
            array (
            'name' => 'Attention deficit hyperactivity disorder (ADHD)',
            ),
            284 => 
            array (
            'name' => 'Autistic spectrum disorder (ASD)',
            ),
            285 => 
            array (
                'name' => 'Bacterial vaginosis',
            ),
            286 => 
            array (
                'name' => 'Benign prostate enlargement',
            ),
            287 => 
            array (
            'name' => 'Bile duct cancer (cholangiocarcinoma)',
            ),
            288 => 
            array (
                'name' => 'Binge eating',
            ),
            289 => 
            array (
                'name' => 'Bipolar disorder',
            ),
            290 => 
            array (
                'name' => 'Bladder cancer',
            ),
            291 => 
            array (
            'name' => 'Blood poisoning (sepsis)',
            ),
            292 => 
            array (
                'name' => 'Bone cancer',
            ),
            293 => 
            array (
                'name' => 'Bone cancer: Teenagers and young adults',
            ),
            294 => 
            array (
                'name' => 'Bowel cancer',
            ),
            295 => 
            array (
                'name' => 'Bowel incontinence',
            ),
            296 => 
            array (
                'name' => 'Bowel polyps',
            ),
            297 => 
            array (
                'name' => 'Brain stem death',
            ),
            298 => 
            array (
                'name' => 'Brain tumours',
            ),
            299 => 
            array (
                'name' => 'Brain tumours: Children',
            ),
            300 => 
            array (
                'name' => 'Brain tumours: Teenagers and young adults',
            ),
            301 => 
            array (
            'name' => 'Breast cancer (female)',
            ),
            302 => 
            array (
            'name' => 'Breast cancer (male)',
            ),
            303 => 
            array (
                'name' => 'Bronchiectasis',
            ),
            304 => 
            array (
                'name' => 'Bronchitis',
            ),
            305 => 
            array (
                'name' => 'Bulimia',
            ),
            306 => 
            array (
                'name' => 'Bunion',
            ),
            307 => 
            array (
                'name' => 'Carcinoid syndrome and carcinoid tumours',
            ),
            308 => 
            array (
                'name' => 'Cardiovascular disease',
            ),
            309 => 
            array (
                'name' => 'Carpal tunnel syndrome',
            ),
            310 => 
            array (
                'name' => 'Catarrh',
            ),
            311 => 
            array (
                'name' => 'Cellulitis',
            ),
            312 => 
            array (
                'name' => 'Cerebral palsy',
            ),
            313 => 
            array (
                'name' => 'Cervical cancer',
            ),
            314 => 
            array (
                'name' => 'Cervical spondylosis',
            ),
            315 => 
            array (
                'name' => 'Chest and rib injury',
            ),
            316 => 
            array (
                'name' => 'Chest infection',
            ),
            317 => 
            array (
                'name' => 'Chickenpox',
            ),
            318 => 
            array (
                'name' => 'Chilblains',
            ),
            319 => 
            array (
                'name' => 'Chlamydia',
            ),
            320 => 
            array (
                'name' => 'Chronic fatigue syndrome',
            ),
            321 => 
            array (
                'name' => 'Chronic kidney disease',
            ),
            322 => 
            array (
                'name' => 'Chronic lymphocytic leukaemia',
            ),
            323 => 
            array (
                'name' => 'Chronic myeloid leukaemia',
            ),
            324 => 
            array (
            'name' => 'Chronic obstructive pulmonary disease (COPD)',
            ),
            325 => 
            array (
                'name' => 'Chronic pain',
            ),
            326 => 
            array (
                'name' => 'Chronic pancreatitis',
            ),
            327 => 
            array (
                'name' => 'Cirrhosis',
            ),
            328 => 
            array (
                'name' => 'Clostridium difficile',
            ),
            329 => 
            array (
                'name' => 'Coeliac disease',
            ),
            330 => 
            array (
                'name' => 'Cold sore',
            ),
            331 => 
            array (
                'name' => 'Coma',
            ),
            332 => 
            array (
                'name' => 'Common cold',
            ),
            333 => 
            array (
                'name' => 'Congenital heart disease',
            ),
            334 => 
            array (
                'name' => 'Conjunctivitis',
            ),
            335 => 
            array (
                'name' => 'Constipation',
            ),
            336 => 
            array (
                'name' => 'Coronary heart disease',
            ),
            337 => 
            array (
            'name' => 'Coronavirus (COVID-19)',
            ),
            338 => 
            array (
            'name' => 'Coronavirus (COVID-19): Longer-term effects (long COVID)',
            ),
            339 => 
            array (
                'name' => 'Costochondritis',
            ),
            340 => 
            array (
                'name' => 'Cough',
            ),
            341 => 
            array (
                'name' => 'Crohn’s disease',
            ),
            342 => 
            array (
                'name' => 'Croup',
            ),
            343 => 
            array (
                'name' => 'Cystic fibrosis',
            ),
            344 => 
            array (
                'name' => 'Cystitis',
            ),
            345 => 
            array (
                'name' => 'Deafblindness',
            ),
            346 => 
            array (
                'name' => 'Deep vein thrombosis',
            ),
            347 => 
            array (
                'name' => 'Degenerative Cervical Myelopathy',
            ),
            348 => 
            array (
                'name' => 'Dehydration',
            ),
            349 => 
            array (
                'name' => 'Delirium',
            ),
            350 => 
            array (
                'name' => 'Dementia',
            ),
            351 => 
            array (
                'name' => 'Dental abscess',
            ),
            352 => 
            array (
                'name' => 'Depression',
            ),
            353 => 
            array (
                'name' => 'Dermatitis herpetiformis',
            ),
            354 => 
            array (
                'name' => 'Diabetes',
            ),
            355 => 
            array (
                'name' => 'Diabetic retinopathy',
            ),
            356 => 
            array (
                'name' => 'Diarrhoea',
            ),
            357 => 
            array (
                'name' => 'Discoid eczema',
            ),
            358 => 
            array (
                'name' => 'Diverticular disease and diverticulitis',
            ),
            359 => 
            array (
            'name' => 'Dizziness (Lightheadedness)',
            ),
            360 => 
            array (
                'name' => 'Down’s syndrome',
            ),
            361 => 
            array (
                'name' => 'Dry mouth',
            ),
            362 => 
            array (
            'name' => 'Dysphagia (swallowing problems)',
            ),
            363 => 
            array (
                'name' => 'Dystonia',
            ),
            364 => 
            array (
                'name' => 'Earache',
            ),
            365 => 
            array (
                'name' => 'Earwax build-up',
            ),
            366 => 
            array (
                'name' => 'Ebola virus disease',
            ),
            367 => 
            array (
                'name' => 'Ectopic pregnancy',
            ),
            368 => 
            array (
                'name' => 'Edwards’ syndrome',
            ),
            369 => 
            array (
                'name' => 'Endometriosis',
            ),
            370 => 
            array (
                'name' => 'Epilepsy',
            ),
            371 => 
            array (
            'name' => 'Erectile dysfunction (impotence)',
            ),
            372 => 
            array (
            'name' => 'Escherichia coli (E. coli) O157',
            ),
            373 => 
            array (
                'name' => 'Ewing sarcoma',
            ),
            374 => 
            array (
                'name' => 'Ewing sarcoma: Children',
            ),
            375 => 
            array (
                'name' => 'Eye cancer',
            ),
            376 => 
            array (
                'name' => 'Farting',
            ),
            377 => 
            array (
                'name' => 'Febrile seizures',
            ),
            378 => 
            array (
            'name' => 'Feeling of something in your throat (Globus)',
            ),
            379 => 
            array (
                'name' => 'Fever in adults',
            ),
            380 => 
            array (
                'name' => 'Fever in children',
            ),
            381 => 
            array (
                'name' => 'Fibroids',
            ),
            382 => 
            array (
                'name' => 'Fibromyalgia',
            ),
            383 => 
            array (
                'name' => 'Flu',
            ),
            384 => 
            array (
                'name' => 'Foetal alcohol syndrome',
            ),
            385 => 
            array (
                'name' => 'Food allergy',
            ),
            386 => 
            array (
                'name' => 'Food poisoning',
            ),
            387 => 
            array (
                'name' => 'Frozen shoulder',
            ),
            388 => 
            array (
            'name' => 'Functional neurological disorder (FND)',
            ),
            389 => 
            array (
                'name' => 'Fungal nail infection',
            ),
            390 => 
            array (
                'name' => 'Gallbladder cancer',
            ),
            391 => 
            array (
                'name' => 'Gallstones',
            ),
            392 => 
            array (
                'name' => 'Ganglion cyst',
            ),
            393 => 
            array (
                'name' => 'Gastroenteritis',
            ),
            394 => 
            array (
            'name' => 'Gastro-oesophageal reflux disease (GORD)',
            ),
            395 => 
            array (
                'name' => 'Genital herpes',
            ),
            396 => 
            array (
                'name' => 'Genital symptoms',
            ),
            397 => 
            array (
                'name' => 'Genital warts',
            ),
            398 => 
            array (
                'name' => 'Germ cell tumours',
            ),
            399 => 
            array (
                'name' => 'Glandular fever',
            ),
            400 => 
            array (
                'name' => 'Golfers elbow',
            ),
            401 => 
            array (
                'name' => 'Gonorrhoea',
            ),
            402 => 
            array (
                'name' => 'Gout',
            ),
            403 => 
            array (
                'name' => 'Greater trochanteric pain syndrome',
            ),
            404 => 
            array (
                'name' => 'Gum disease',
            ),
            405 => 
            array (
            'name' => 'Haemorrhoids (piles)',
            ),
            406 => 
            array (
                'name' => 'Hand, foot and mouth disease',
            ),
            407 => 
            array (
                'name' => 'Hay fever',
            ),
            408 => 
            array (
                'name' => 'Head and neck cancer',
            ),
            409 => 
            array (
                'name' => 'Head lice and nits',
            ),
            410 => 
            array (
                'name' => 'Headaches',
            ),
            411 => 
            array (
                'name' => 'Hearing loss',
            ),
            412 => 
            array (
                'name' => 'Heart attack',
            ),
            413 => 
            array (
                'name' => 'Heart block',
            ),
            414 => 
            array (
                'name' => 'Heart failure',
            ),
            415 => 
            array (
                'name' => 'Heart palpitations',
            ),
            416 => 
            array (
                'name' => 'Hepatitis A',
            ),
            417 => 
            array (
                'name' => 'Hepatitis B',
            ),
            418 => 
            array (
                'name' => 'Hepatitis C',
            ),
            419 => 
            array (
                'name' => 'Hiatus hernia',
            ),
            420 => 
            array (
            'name' => 'High blood pressure (hypertension)',
            ),
            421 => 
            array (
                'name' => 'High cholesterol',
            ),
            422 => 
            array (
                'name' => 'HIV',
            ),
            423 => 
            array (
                'name' => 'Hodgkin lymphoma',
            ),
            424 => 
            array (
                'name' => 'Hodgkin lymphoma: Children',
            ),
            425 => 
            array (
                'name' => 'Hodgkin lymphoma: Teenagers and young adults',
            ),
            426 => 
            array (
                'name' => 'Huntington’s disease',
            ),
            427 => 
            array (
            'name' => 'Hyperglycaemia (high blood sugar)',
            ),
            428 => 
            array (
                'name' => 'Hyperhidrosis',
            ),
            429 => 
            array (
            'name' => 'Hypoglycaemia (low blood sugar)',
            ),
            430 => 
            array (
                'name' => 'Idiopathic pulmonary fibrosis',
            ),
            431 => 
            array (
                'name' => 'If your child has cold or flu symptoms',
            ),
            432 => 
            array (
                'name' => 'Impetigo',
            ),
            433 => 
            array (
                'name' => 'Indigestion',
            ),
            434 => 
            array (
                'name' => 'Ingrown toenail',
            ),
            435 => 
            array (
                'name' => 'Infertility',
            ),
            436 => 
            array (
            'name' => 'Inflammatory bowel disease (IBD)',
            ),
            437 => 
            array (
                'name' => 'Inherited heart conditions',
            ),
            438 => 
            array (
                'name' => 'Insomnia',
            ),
            439 => 
            array (
                'name' => 'Iron deficiency anaemia',
            ),
            440 => 
            array (
            'name' => 'Irritable bowel syndrome (IBS)',
            ),
            441 => 
            array (
                'name' => 'Itching',
            ),
            442 => 
            array (
                'name' => 'Itchy bottom',
            ),
            443 => 
            array (
                'name' => 'Itchy skin',
            ),
            444 => 
            array (
                'name' => 'Joint hypermobility',
            ),
            445 => 
            array (
                'name' => 'Kaposi’s sarcoma',
            ),
            446 => 
            array (
                'name' => 'Kidney cancer',
            ),
            447 => 
            array (
                'name' => 'Kidney infection',
            ),
            448 => 
            array (
                'name' => 'Kidney stones',
            ),
            449 => 
            array (
                'name' => 'Labyrinthitis',
            ),
            450 => 
            array (
                'name' => 'Lactose intolerance',
            ),
            451 => 
            array (
            'name' => 'Laryngeal (larynx) cancer',
            ),
            452 => 
            array (
                'name' => 'Laryngitis',
            ),
            453 => 
            array (
                'name' => 'Leg cramps',
            ),
            454 => 
            array (
                'name' => 'Lichen planus',
            ),
            455 => 
            array (
                'name' => 'Lipoedema',
            ),
            456 => 
            array (
                'name' => 'Liver cancer',
            ),
            457 => 
            array (
                'name' => 'Liver disease',
            ),
            458 => 
            array (
                'name' => 'Liver tumours',
            ),
            459 => 
            array (
                'name' => 'Long-term effects of COVID-19',
            ),
            460 => 
            array (
                'name' => 'Loss of libido',
            ),
            461 => 
            array (
            'name' => 'Low blood pressure (hypotension)',
            ),
            462 => 
            array (
                'name' => 'Lumbar stenosis',
            ),
            463 => 
            array (
                'name' => 'Lung cancer',
            ),
            464 => 
            array (
                'name' => 'Lupus',
            ),
            465 => 
            array (
                'name' => 'Lyme disease',
            ),
            466 => 
            array (
                'name' => 'Lymphoedema',
            ),
            467 => 
            array (
            'name' => 'Lymphogranuloma venereum (LGV)',
            ),
            468 => 
            array (
                'name' => 'Malaria',
            ),
            469 => 
            array (
            'name' => 'Malignant brain tumour (cancerous)',
            ),
            470 => 
            array (
                'name' => 'Malnutrition',
            ),
            471 => 
            array (
                'name' => 'Managing genital symptoms',
            ),
            472 => 
            array (
                'name' => 'Measles',
            ),
            473 => 
            array (
                'name' => 'Meningitis',
            ),
            474 => 
            array (
                'name' => 'Meniere’s disease',
            ),
            475 => 
            array (
                'name' => 'Menopause',
            ),
            476 => 
            array (
                'name' => 'Mesothelioma',
            ),
            477 => 
            array (
            'name' => 'Middle ear infection (otitis media)',
            ),
            478 => 
            array (
                'name' => 'Migraine',
            ),
            479 => 
            array (
                'name' => 'Miscarriage',
            ),
            480 => 
            array (
            'name' => 'Motor neurone disease (MND)',
            ),
            481 => 
            array (
                'name' => 'Mouth cancer',
            ),
            482 => 
            array (
                'name' => 'Mouth ulcer',
            ),
            483 => 
            array (
                'name' => 'Multiple myeloma',
            ),
            484 => 
            array (
            'name' => 'Multiple sclerosis (MS)',
            ),
            485 => 
            array (
            'name' => 'Multiple system atrophy (MSA)',
            ),
            486 => 
            array (
                'name' => 'Mumps',
            ),
            487 => 
            array (
                'name' => 'Munchausen’s syndrome',
            ),
            488 => 
            array (
            'name' => 'Myalgic encephalomyelitis (ME) or chronic fatigue syndrome (CFS)',
            ),
            489 => 
            array (
                'name' => 'Myasthenia gravis',
            ),
            490 => 
            array (
                'name' => 'Nasal and sinus cancer',
            ),
            491 => 
            array (
                'name' => 'Nasopharyngeal cancer',
            ),
            492 => 
            array (
                'name' => 'Neck problems',
            ),
            493 => 
            array (
                'name' => 'Neuroblastoma: Children',
            ),
            494 => 
            array (
                'name' => 'Neuroendocrine tumours',
            ),
            495 => 
            array (
            'name' => 'Non-alcoholic fatty liver disease (NAFLD)',
            ),
            496 => 
            array (
                'name' => 'Non-Hodgkin lymphoma',
            ),
            497 => 
            array (
                'name' => 'Non-Hodgkin lymphoma: Children',
            ),
            498 => 
            array (
                'name' => 'Norovirus',
            ),
            499 => 
            array (
                'name' => 'Nosebleed',
            ),
        ));
        \DB::table('diagnosis')->insert(array (
            0 => 
            array (
                'name' => 'Obesity',
            ),
            1 => 
            array (
            'name' => 'Obsessive compulsive disorder (OCD)',
            ),
            2 => 
            array (
                'name' => 'Obstructive sleep apnoea',
            ),
            3 => 
            array (
                'name' => 'Oesophageal cancer',
            ),
            4 => 
            array (
                'name' => 'Oral thrush in adults',
            ),
            5 => 
            array (
                'name' => 'Osteoarthritis',
            ),
            6 => 
            array (
                'name' => 'Osteoarthritis of the hip',
            ),
            7 => 
            array (
                'name' => 'Osteoarthritis of the knee',
            ),
            8 => 
            array (
                'name' => 'Osteoarthritis of the thumb',
            ),
            9 => 
            array (
                'name' => 'Osteoporosis',
            ),
            10 => 
            array (
                'name' => 'Osteosarcoma',
            ),
            11 => 
            array (
            'name' => 'Outer ear infection (otitis externa)',
            ),
            12 => 
            array (
                'name' => 'Ovarian cancer',
            ),
            13 => 
            array (
                'name' => 'Ovarian cancer: Teenagers and young adults',
            ),
            14 => 
            array (
                'name' => 'Ovarian cyst',
            ),
            15 => 
            array (
                'name' => 'Overactive thyroid',
            ),
            16 => 
            array (
                'name' => 'Pain in the ball of the foot',
            ),
            17 => 
            array (
                'name' => 'Paget’s disease of the nipple',
            ),
            18 => 
            array (
                'name' => 'Pancreatic cancer',
            ),
            19 => 
            array (
                'name' => 'Panic disorder',
            ),
            20 => 
            array (
                'name' => 'Parkinson’s disease',
            ),
            21 => 
            array (
                'name' => 'Patau’s syndrome',
            ),
            22 => 
            array (
                'name' => 'Patellofemoral pain syndrome',
            ),
            23 => 
            array (
                'name' => 'Pelvic inflammatory disease',
            ),
            24 => 
            array (
                'name' => 'Pelvic organ prolapse',
            ),
            25 => 
            array (
                'name' => 'Penile cancer',
            ),
            26 => 
            array (
                'name' => 'Peripheral neuropathy',
            ),
            27 => 
            array (
                'name' => 'Personality disorder',
            ),
            28 => 
            array (
                'name' => 'PIMS',
            ),
            29 => 
            array (
                'name' => 'Plantar heel pain',
            ),
            30 => 
            array (
                'name' => 'Pleurisy',
            ),
            31 => 
            array (
                'name' => 'Pneumonia',
            ),
            32 => 
            array (
                'name' => 'Polio',
            ),
            33 => 
            array (
            'name' => 'Polycystic ovary syndrome (PCOS)',
            ),
            34 => 
            array (
                'name' => 'Polymyalgia rheumatica',
            ),
            35 => 
            array (
                'name' => 'Post-polio syndrome',
            ),
            36 => 
            array (
            'name' => 'Post-traumatic stress disorder (PTSD)',
            ),
            37 => 
            array (
            'name' => 'Postural orthostatic tachycardia syndrome (PoTS)',
            ),
            38 => 
            array (
                'name' => 'Postnatal depression',
            ),
            39 => 
            array (
                'name' => 'Pregnancy and baby',
            ),
            40 => 
            array (
                'name' => 'Pressure ulcers',
            ),
            41 => 
            array (
            'name' => 'Progressive supranuclear palsy (PSP)',
            ),
            42 => 
            array (
                'name' => 'Prostate cancer',
            ),
            43 => 
            array (
                'name' => 'Psoriasis',
            ),
            44 => 
            array (
                'name' => 'Psoriatic arthritis',
            ),
            45 => 
            array (
                'name' => 'Psychosis',
            ),
            46 => 
            array (
                'name' => 'Pubic lice',
            ),
            47 => 
            array (
                'name' => 'Pulmonary hypertension',
            ),
            48 => 
            array (
                'name' => 'Rare conditions',
            ),
            49 => 
            array (
                'name' => 'Rare tumours',
            ),
            50 => 
            array (
                'name' => 'Raynaud’s phenomenon',
            ),
            51 => 
            array (
                'name' => 'Reactive arthritis',
            ),
            52 => 
            array (
                'name' => 'Restless legs syndrome',
            ),
            53 => 
            array (
            'name' => 'Respiratory syncytial virus (RSV)',
            ),
            54 => 
            array (
                'name' => 'Retinoblastoma: Children',
            ),
            55 => 
            array (
                'name' => 'Rhabdomyosarcoma',
            ),
            56 => 
            array (
                'name' => 'Rheumatoid arthritis',
            ),
            57 => 
            array (
                'name' => 'Ringworm and other fungal infections',
            ),
            58 => 
            array (
                'name' => 'Rosacea',
            ),
            59 => 
            array (
                'name' => 'Scabies',
            ),
            60 => 
            array (
                'name' => 'Scarlet fever',
            ),
            61 => 
            array (
                'name' => 'Schizophrenia',
            ),
            62 => 
            array (
                'name' => 'Sciatica',
            ),
            63 => 
            array (
                'name' => 'Scoliosis',
            ),
            64 => 
            array (
            'name' => 'Seasonal affective disorder (SAD)',
            ),
            65 => 
            array (
                'name' => 'Sepsis',
            ),
            66 => 
            array (
                'name' => 'Septic shock',
            ),
            67 => 
            array (
                'name' => 'Shingles',
            ),
            68 => 
            array (
                'name' => 'Shortness of breath',
            ),
            69 => 
            array (
                'name' => 'Sickle cell disease',
            ),
            70 => 
            array (
                'name' => 'Sinusitis',
            ),
            71 => 
            array (
                'name' => 'Sjogren’s syndrome',
            ),
            72 => 
            array (
            'name' => 'Skin cancer (melanoma)',
            ),
            73 => 
            array (
            'name' => 'Skin cancer (non-melanoma)',
            ),
            74 => 
            array (
            'name' => 'Skin light sensitivity (photosensitivity)',
            ),
            75 => 
            array (
                'name' => 'Skin rashes in children',
            ),
            76 => 
            array (
                'name' => 'Slapped cheek syndrome',
            ),
            77 => 
            array (
                'name' => 'Soft tissue sarcomas',
            ),
            78 => 
            array (
                'name' => 'Soft tissue sarcomas: Teenagers and young adults',
            ),
            79 => 
            array (
                'name' => 'Sore throat',
            ),
            80 => 
            array (
                'name' => 'Spleen problems and spleen removal',
            ),
            81 => 
            array (
                'name' => 'Stillbirth',
            ),
            82 => 
            array (
                'name' => 'Stomach ache and abdominal pain',
            ),
            83 => 
            array (
                'name' => 'Stomach cancer',
            ),
            84 => 
            array (
                'name' => 'Stomach ulcer',
            ),
            85 => 
            array (
            'name' => 'Streptococcus A (strep A)',
            ),
            86 => 
            array (
                'name' => 'Stress, anxiety and low mood',
            ),
            87 => 
            array (
                'name' => 'Stroke',
            ),
            88 => 
            array (
                'name' => 'Subacromial pain syndrome',
            ),
            89 => 
            array (
            'name' => 'Sudden infant death syndrome (SIDS)',
            ),
            90 => 
            array (
                'name' => 'Suicide',
            ),
            91 => 
            array (
                'name' => 'Sunburn',
            ),
            92 => 
            array (
                'name' => 'Supraventricular tachycardia',
            ),
            93 => 
            array (
                'name' => 'Swollen glands',
            ),
            94 => 
            array (
                'name' => 'Syphilis',
            ),
            95 => 
            array (
                'name' => 'Tennis elbow',
            ),
            96 => 
            array (
                'name' => 'Testicular cancer',
            ),
            97 => 
            array (
                'name' => 'Testicular cancer: Teenagers and young adults',
            ),
            98 => 
            array (
                'name' => 'Testicular lumps and swellings',
            ),
            99 => 
            array (
                'name' => 'Thirst',
            ),
            100 => 
            array (
                'name' => 'Threadworms',
            ),
            101 => 
            array (
                'name' => 'Thrush',
            ),
            102 => 
            array (
                'name' => 'Thyroid cancer',
            ),
            103 => 
            array (
                'name' => 'Thyroid cancer: Teenagers and young adults',
            ),
            104 => 
            array (
                'name' => 'Tick bites',
            ),
            105 => 
            array (
                'name' => 'Tinnitus',
            ),
            106 => 
            array (
                'name' => 'Tonsillitis',
            ),
            107 => 
            array (
                'name' => 'Tooth decay',
            ),
            108 => 
            array (
                'name' => 'Toothache',
            ),
            109 => 
            array (
                'name' => 'Tourette’s syndrome',
            ),
            110 => 
            array (
            'name' => 'Transient ischaemic attack (TIA)',
            ),
            111 => 
            array (
                'name' => 'Transverse myelitis',
            ),
            112 => 
            array (
                'name' => 'Trichomonas infection',
            ),
            113 => 
            array (
                'name' => 'Trigeminal neuralgia',
            ),
            114 => 
            array (
            'name' => 'Tuberculosis (TB)',
            ),
            115 => 
            array (
                'name' => 'Type 1 diabetes',
            ),
            116 => 
            array (
                'name' => 'Type 2 diabetes',
            ),
            117 => 
            array (
                'name' => 'Ulcerative colitis',
            ),
            118 => 
            array (
                'name' => 'Underactive thyroid',
            ),
            119 => 
            array (
                'name' => 'Urinary incontinence',
            ),
            120 => 
            array (
                'name' => 'Urinary incontinence in women',
            ),
            121 => 
            array (
            'name' => 'Urinary tract infection (UTI)',
            ),
            122 => 
            array (
            'name' => 'Urinary tract infection (UTI) in children',
            ),
            123 => 
            array (
            'name' => 'Urticaria (hives)',
            ),
            124 => 
            array (
                'name' => 'Vaginal cancer',
            ),
            125 => 
            array (
                'name' => 'Vaginal discharge',
            ),
            126 => 
            array (
                'name' => 'Varicose eczema',
            ),
            127 => 
            array (
                'name' => 'Varicose veins',
            ),
            128 => 
            array (
                'name' => 'Venous leg ulcer',
            ),
            129 => 
            array (
                'name' => 'Vertigo',
            ),
            130 => 
            array (
                'name' => 'Vitamin B12 or folate deficiency anaemia',
            ),
            131 => 
            array (
                'name' => 'Vomiting in adults',
            ),
            132 => 
            array (
                'name' => 'Vomiting in children and babies',
            ),
            133 => 
            array (
                'name' => 'Vulval cancer',
            ),
            134 => 
            array (
                'name' => 'Warts and verrucas',
            ),
            135 => 
            array (
                'name' => 'Whiplash',
            ),
            136 => 
            array (
                'name' => 'Whooping cough',
            ),
            137 => 
            array (
                'name' => 'Wilms’ tumour',
            ),
            138 => 
            array (
                'name' => 'Wolff-Parkinson-White syndrome',
            ),
            139 => 
            array (
            'name' => 'Womb (uterus) cancer',
            ),
            140 => 
            array (
                'name' => 'Yellow fever',
            ),
        ));
        
        
    }
}