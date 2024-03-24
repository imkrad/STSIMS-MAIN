<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QualifierNotavailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('qualifier_notavails')->delete();
        
        \DB::table('qualifier_notavails')->insert(array (
            0 => 
            array (
                'id' => 1,
                'reason' => 'STILL UNDECIDED',
                'is_seened' => 0,
                'qualifier_id' => 43,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:26:18',
                'updated_at' => '2024-01-18 20:26:18',
            ),
            1 => 
            array (
                'id' => 2,
            'reason' => 'CHOSEN PROGRAM IS NOT A PRIORITY (DOCTOR OF DENTAL MEDICINE)',
                'is_seened' => 0,
                'qualifier_id' => 114,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:27:09',
                'updated_at' => '2024-01-18 20:27:09',
            ),
            2 => 
            array (
                'id' => 3,
                'reason' => 'PLANNING TO GO ABROAD',
                'is_seened' => 0,
                'qualifier_id' => 118,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:27:12',
                'updated_at' => '2024-01-18 20:27:12',
            ),
            3 => 
            array (
                'id' => 4,
                'reason' => 'UNIVERSITY TO ENTER NOT DOST ACCREDITED',
                'is_seened' => 0,
                'qualifier_id' => 119,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:27:12',
                'updated_at' => '2024-01-18 20:27:12',
            ),
            4 => 
            array (
                'id' => 5,
                'reason' => 'MY COLLEGE PROGRAM IN UP MANILA, DOCTOR OF DENTAL MEDICINE, IS NOT COVERED BY THE DOST-SEI UNDERGRADUATE SCHOLARSHIPS',
                'is_seened' => 0,
                'qualifier_id' => 226,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:28:30',
                'updated_at' => '2024-01-18 20:28:30',
            ),
            5 => 
            array (
                'id' => 6,
                'reason' => 'MY CHOSEN COLLEGE COURSE IS NOT QUALIFIED FOR THE PROGRAM.',
                'is_seened' => 0,
                'qualifier_id' => 228,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:28:31',
                'updated_at' => '2024-01-18 20:28:31',
            ),
            6 => 
            array (
                'id' => 7,
                'reason' => 'PREFFERED SCHOOL IS NOT QUALIFIED',
                'is_seened' => 0,
                'qualifier_id' => 233,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:28:35',
                'updated_at' => '2024-01-18 20:28:35',
            ),
            7 => 
            array (
                'id' => 8,
                'reason' => 'I AM ALREADY ENROLLED IN A NON-PRIORITY PROGRAM IN A STATE UNIVERSITY',
                'is_seened' => 0,
                'qualifier_id' => 240,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:28:40',
                'updated_at' => '2024-01-18 20:28:40',
            ),
            8 => 
            array (
                'id' => 9,
                'reason' => 'I DECIDED TO PURSUE BS NURSING INSTEAD OF BS MEDICAL TECHNOLOGY',
                'is_seened' => 0,
                'qualifier_id' => 312,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:29:32',
                'updated_at' => '2024-01-18 20:29:32',
            ),
            9 => 
            array (
                'id' => 10,
                'reason' => 'PARENTS NOT INTERESTED',
                'is_seened' => 0,
                'qualifier_id' => 344,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:29:56',
                'updated_at' => '2024-01-18 20:29:56',
            ),
            10 => 
            array (
                'id' => 11,
                'reason' => 'MY COURSE IS NOT ON THE 2023 DOST-SEI UNDERGRADUATE SCHOLARSHIPS PRIORITY COURSES',
                'is_seened' => 0,
                'qualifier_id' => 352,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:30:01',
                'updated_at' => '2024-01-18 20:30:01',
            ),
            11 => 
            array (
                'id' => 12,
                'reason' => 'MY CURRENT COURSE IS NOT A PRIORITY COURSE OF THE SCHOLARSHIP ',
                'is_seened' => 0,
                'qualifier_id' => 377,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:30:20',
                'updated_at' => '2024-01-18 20:30:20',
            ),
            12 => 
            array (
                'id' => 13,
                'reason' => 'DEGREE PROGRAM IS NOT ACCREDITED',
                'is_seened' => 0,
                'qualifier_id' => 381,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:30:23',
                'updated_at' => '2024-01-18 20:30:23',
            ),
            13 => 
            array (
                'id' => 14,
                'reason' => 'I ALSO AVAILED A SCHOLARSHIP FROM LPU-C WHICH FORBIDS ME TO TAKE MORE THAN 1 SCHOLARSHIPS ',
                'is_seened' => 0,
                'qualifier_id' => 407,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:30:41',
                'updated_at' => '2024-01-18 20:30:41',
            ),
            14 => 
            array (
                'id' => 15,
                'reason' => 'I WILL PURSUE A NON-STEM DEGREE',
                'is_seened' => 0,
                'qualifier_id' => 416,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:30:48',
                'updated_at' => '2024-01-18 20:30:48',
            ),
            15 => 
            array (
                'id' => 16,
                'reason' => 'COURSE I WANT TO TAKE IS NOT ONE OF THE COURSES OFFERED',
                'is_seened' => 0,
                'qualifier_id' => 435,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:31:02',
                'updated_at' => '2024-01-18 20:31:02',
            ),
            16 => 
            array (
                'id' => 17,
                'reason' => 'DID NOT FIND THE CONDITIONS WORTH THE BENEFITS',
                'is_seened' => 0,
                'qualifier_id' => 454,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:31:16',
                'updated_at' => '2024-01-18 20:31:16',
            ),
            17 => 
            array (
                'id' => 18,
                'reason' => 'THE COURSE THAT I WILL BE TAKING UP IS NOT SUPPORTED BY THE SCHOLARSHIP.',
                'is_seened' => 0,
                'qualifier_id' => 489,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:31:41',
                'updated_at' => '2024-01-18 20:31:41',
            ),
            18 => 
            array (
                'id' => 19,
                'reason' => 'BACHELOR OF SCIENCE IN NURSING, THE COURSE I WILL BE PURSUING, IS NOT INCLUDED IN THE LIST OF PRIORITY COURSES COVERED BY THE SCHOLARSHIP PROGRAM.',
                'is_seened' => 0,
                'qualifier_id' => 502,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:31:50',
                'updated_at' => '2024-01-18 20:31:50',
            ),
            19 => 
            array (
                'id' => 20,
                'reason' => 'My chosen course isn\'t on the DOST-SEI priority list. ',
                'is_seened' => 0,
                'qualifier_id' => 529,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:32:10',
                'updated_at' => '2024-01-18 20:32:10',
            ),
            20 => 
            array (
                'id' => 21,
                'reason' => 'LEVEL OF ACCREDITATION ONLY AT LEVEL II',
                'is_seened' => 0,
                'qualifier_id' => 539,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:32:17',
                'updated_at' => '2024-01-18 20:32:17',
            ),
            21 => 
            array (
                'id' => 22,
                'reason' => 'COLEGIO DE MUNTINLUPA, A SCHOOL THAT I AM ENROLLED IN, IS NOT A DOST ACCREDITED STATE COLLEGE. I WOULD LIKE TO DEFER MY SCHOLARSHIP AND WAIT A YEAR FOR THE SAID SCHOOL TO BE DOST ACCREDITED. ',
                'is_seened' => 0,
                'qualifier_id' => 572,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:32:41',
                'updated_at' => '2024-01-18 20:32:41',
            ),
            22 => 
            array (
                'id' => 23,
                'reason' => 'GOT ACCEPTED IN UPLB BUT A NON-PRIO DOST COURSE',
                'is_seened' => 0,
                'qualifier_id' => 594,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:32:57',
                'updated_at' => '2024-01-18 20:32:57',
            ),
            23 => 
            array (
                'id' => 24,
                'reason' => 'BSCE IN DLSU-DASMARINAS IS NOT DOST ACCREDITED',
                'is_seened' => 0,
                'qualifier_id' => 670,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:33:52',
                'updated_at' => '2024-01-18 20:33:52',
            ),
            24 => 
            array (
                'id' => 25,
                'reason' => 'COLEGIO DE MUNTINLUPA IS NOT YET ACCREDITED WITH DOST',
                'is_seened' => 0,
                'qualifier_id' => 725,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:34:32',
                'updated_at' => '2024-01-18 20:34:32',
            ),
            25 => 
            array (
                'id' => 26,
            'reason' => 'MY COURSE (BS NURSING) AND MY CHOSEN SCHOOL (DE LA SALLE LIPA) ARE NOT ACCREDITED FOR DOST SCHOLARSHIP',
                'is_seened' => 0,
                'qualifier_id' => 748,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:34:48',
                'updated_at' => '2024-01-18 20:34:48',
            ),
            26 => 
            array (
                'id' => 27,
                'reason' => 'STUDYING ABROAD',
                'is_seened' => 0,
                'qualifier_id' => 768,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:35:03',
                'updated_at' => '2024-01-18 20:35:03',
            ),
            27 => 
            array (
                'id' => 28,
                'reason' => 'ENROLLMENT TO NON-ACCREDITED COURSE',
                'is_seened' => 0,
                'qualifier_id' => 802,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:35:28',
                'updated_at' => '2024-01-18 20:35:28',
            ),
            28 => 
            array (
                'id' => 29,
            'reason' => 'CURRENTLY ENROLLED UNDER A NON-PRIORITY COURSE OF THE SCHOLARSHIP (BACHELOR OF ARTS IN ECONOMICS)',
                'is_seened' => 0,
                'qualifier_id' => 814,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:35:37',
                'updated_at' => '2024-01-18 20:35:37',
            ),
            29 => 
            array (
                'id' => 30,
            'reason' => 'MY CHOSEN COURSE(BS NURSING) IS NOT ON THE PRIORITY LIST OF DOST',
                'is_seened' => 0,
                'qualifier_id' => 823,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:35:43',
                'updated_at' => '2024-01-18 20:35:43',
            ),
            30 => 
            array (
                'id' => 31,
                'reason' => 'UNDERTAKING A PROGRAM NOT ACCREDITED BY DOST',
                'is_seened' => 0,
                'qualifier_id' => 901,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:36:41',
                'updated_at' => '2024-01-18 20:36:41',
            ),
            31 => 
            array (
                'id' => 32,
                'reason' => 'REASON FOR DEFERMENT NOT ACCEPTED. DECIDED TO CONTINUE THE GAP SEM.',
                'is_seened' => 0,
                'qualifier_id' => 940,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:37:10',
                'updated_at' => '2024-01-18 20:37:10',
            ),
            32 => 
            array (
                'id' => 33,
                'reason' => 'COURSE TO BE ENROLLED IS NOT INCLUDED IN THE PRIORITY COURSES',
                'is_seened' => 0,
                'qualifier_id' => 979,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:37:39',
                'updated_at' => '2024-01-18 20:37:39',
            ),
            33 => 
            array (
                'id' => 34,
            'reason' => 'CHOSEN COURSE (POLITICAL SCIENCE) IS NOT UNDER THE DOST PRIORITY COURSES LIST.',
                'is_seened' => 0,
                'qualifier_id' => 1036,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:38:21',
                'updated_at' => '2024-01-18 20:38:21',
            ),
            34 => 
            array (
                'id' => 35,
                'reason' => 'CHOSEN COURSE IS NOT WITHIN THE LIST OF PRIORITY COURSES',
                'is_seened' => 0,
                'qualifier_id' => 1051,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:38:32',
                'updated_at' => '2024-01-18 20:38:32',
            ),
            35 => 
            array (
                'id' => 36,
                'reason' => 'NOT IN THE LIST OF PRIORITY COURSES',
                'is_seened' => 0,
                'qualifier_id' => 1055,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:38:35',
                'updated_at' => '2024-01-18 20:38:35',
            ),
            36 => 
            array (
                'id' => 37,
                'reason' => 'ACCEPTANCE OF ANOTHER SCHOLARSHIP',
                'is_seened' => 0,
                'qualifier_id' => 1067,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:38:44',
                'updated_at' => '2024-01-18 20:38:44',
            ),
            37 => 
            array (
                'id' => 38,
                'reason' => 'I AM ALREADY ENROLLED IN BACHELOR OF SCIENCE IN SOCIAL WORK AT BICOL UNIVERSITY',
                'is_seened' => 0,
                'qualifier_id' => 1098,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:39:07',
                'updated_at' => '2024-01-18 20:39:07',
            ),
            38 => 
            array (
                'id' => 39,
                'reason' => 'THE DEGREE PROGRAM I\'M ENROLLED IN IS NOT UNDER ANY DOST-SEI S&T DEGREE PROGRAMS.',
                'is_seened' => 0,
                'qualifier_id' => 1186,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:40:13',
                'updated_at' => '2024-01-18 20:40:13',
            ),
            39 => 
            array (
                'id' => 40,
                'reason' => 'COURSE IS A NON-PRIORITY COURSE',
                'is_seened' => 0,
                'qualifier_id' => 1245,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:40:56',
                'updated_at' => '2024-01-18 20:40:56',
            ),
            40 => 
            array (
                'id' => 41,
                'reason' => 'MY ENROLLED COURSE IS NOT INCLUDED IN THE PRIORITY COURSES.',
                'is_seened' => 0,
                'qualifier_id' => 1278,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:41:21',
                'updated_at' => '2024-01-18 20:41:21',
            ),
            41 => 
            array (
                'id' => 42,
                'reason' => 'ENROLLED COURSE NOT UNDER THE PRIORITY COURSES OF DOST',
                'is_seened' => 0,
                'qualifier_id' => 1326,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:41:57',
                'updated_at' => '2024-01-18 20:41:57',
            ),
            42 => 
            array (
                'id' => 43,
                'reason' => 'WILL ACCEPT THE OWWA SCHOLARHIP PROGRAM',
                'is_seened' => 0,
                'qualifier_id' => 1344,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:42:11',
                'updated_at' => '2024-01-18 20:42:11',
            ),
            43 => 
            array (
                'id' => 44,
                'reason' => 'BECAUSE I HAVE ANOTHER SCHOLARSHIP OFFERED, AND IT DOES NOT ALLOW OTHER SCHOLARSHIP ASIDE FROM THEIRS.',
                'is_seened' => 0,
                'qualifier_id' => 1360,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:42:23',
                'updated_at' => '2024-01-18 20:42:23',
            ),
            44 => 
            array (
                'id' => 45,
                'reason' => 'I AM PURSUING A NON-PRIOTY PROGRAM ',
                'is_seened' => 0,
                'qualifier_id' => 1372,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:42:32',
                'updated_at' => '2024-01-18 20:42:32',
            ),
            45 => 
            array (
                'id' => 46,
                'reason' => 'MY SCHOOL IS NOT A DOST SCHOLARSHIP ACCREDITED.',
                'is_seened' => 0,
                'qualifier_id' => 1399,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:42:52',
                'updated_at' => '2024-01-18 20:42:52',
            ),
            46 => 
            array (
                'id' => 47,
                'reason' => 'I AM PURSUING A NON S&T DEGREE COURSE ',
                'is_seened' => 0,
                'qualifier_id' => 1432,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:43:18',
                'updated_at' => '2024-01-18 20:43:18',
            ),
            47 => 
            array (
                'id' => 48,
                'reason' => 'I WAS ENROLLED IN A NON-PRIORITY COUSE',
                'is_seened' => 0,
                'qualifier_id' => 1500,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:44:09',
                'updated_at' => '2024-01-18 20:44:09',
            ),
            48 => 
            array (
                'id' => 49,
            'reason' => 'ENROLLED IN A NON PRIORITY COURSE (BS DEVCOM - UPLB)',
                'is_seened' => 0,
                'qualifier_id' => 1576,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:45:05',
                'updated_at' => '2024-01-18 20:45:05',
            ),
            49 => 
            array (
                'id' => 50,
                'reason' => 'I AM TAKING BS IN MEDICAL TECHNOLOGY AT MANUEL S. ENVERGA UNIVERSITY FOUNDATION. BSMET OF MSEUF IS NOT INCLUDED IN THE PACUCOA\'S LIST OF ACCREDITED PROGRAMS/INSTITUTIONS.',
                'is_seened' => 0,
                'qualifier_id' => 1581,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:45:08',
                'updated_at' => '2024-01-18 20:45:08',
            ),
            50 => 
            array (
                'id' => 51,
                'reason' => 'DEGREE COURSE NOT APPROVED',
                'is_seened' => 0,
                'qualifier_id' => 1588,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:45:14',
                'updated_at' => '2024-01-18 20:45:14',
            ),
            51 => 
            array (
                'id' => 52,
                'reason' => 'MY SCHOOL IS NOT ACCREDITED OF DOST SCHOLARSHIP.',
                'is_seened' => 0,
                'qualifier_id' => 1622,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:45:39',
                'updated_at' => '2024-01-18 20:45:39',
            ),
            52 => 
            array (
                'id' => 53,
                'reason' => 'DUE TO MY CHOSEN COURSE, BS IN NURSING, WHICH IS NOT INCLUDED IN THE PRIORITIZED COURSES OF THE SCHOLARSHIP ',
                'is_seened' => 0,
                'qualifier_id' => 1632,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:45:47',
                'updated_at' => '2024-01-18 20:45:47',
            ),
            53 => 
            array (
                'id' => 54,
                'reason' => 'PLV / SCHOOL DOES NOT HAVE A FAAP LEVEL III CERTIFICATE',
                'is_seened' => 0,
                'qualifier_id' => 1696,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:46:34',
                'updated_at' => '2024-01-18 20:46:34',
            ),
            54 => 
            array (
                'id' => 55,
            'reason' => 'ENROLLED IN ATENEO DE ZAMBOANGA UNIVERSITY (ADZU) UNDER BS BIO 1',
                'is_seened' => 0,
                'qualifier_id' => 1726,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:46:56',
                'updated_at' => '2024-01-18 20:46:56',
            ),
            55 => 
            array (
                'id' => 56,
                'reason' => 'I DECIDED TO TAKE BS NURSING',
                'is_seened' => 0,
                'qualifier_id' => 1732,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:47:00',
                'updated_at' => '2024-01-18 20:47:00',
            ),
            56 => 
            array (
                'id' => 57,
                'reason' => 'NOT DOST ACCREDITED SCHOOL',
                'is_seened' => 0,
                'qualifier_id' => 1750,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:47:13',
                'updated_at' => '2024-01-18 20:47:13',
            ),
            57 => 
            array (
                'id' => 58,
                'reason' => 'I AM ALREADY ENROLLED IN COURSE THAT IS NOT A PRIORITY OF THE SCHOLARSHIP.',
                'is_seened' => 0,
                'qualifier_id' => 1783,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:47:37',
                'updated_at' => '2024-01-18 20:47:37',
            ),
            58 => 
            array (
                'id' => 59,
                'reason' => 'CHOSEN SCHOOL IS NOT ACCREDITED FAAP LEVEL III',
                'is_seened' => 0,
                'qualifier_id' => 1907,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:49:08',
                'updated_at' => '2024-01-18 20:49:08',
            ),
            59 => 
            array (
                'id' => 60,
                'reason' => 'AVAILED THE CHED SCHOLARSHIP',
                'is_seened' => 0,
                'qualifier_id' => 1914,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:49:13',
                'updated_at' => '2024-01-18 20:49:13',
            ),
            60 => 
            array (
                'id' => 61,
                'reason' => 'I HAVE ALREADY ENROLLED AT SILLIMAN UNIVERSITY FOR BS ARCHITECURE AND UNFORTUNATELY, I JUST FOUND OUT THAT MY PROGRAM IS NOT ACCREDITED BY THE SCHOLARSHIP.',
                'is_seened' => 0,
                'qualifier_id' => 1943,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:49:35',
                'updated_at' => '2024-01-18 20:49:35',
            ),
            61 => 
            array (
                'id' => 62,
                'reason' => 'MY UNIVERSITY DOES NOT SATISFY THE STUDY PLACEMENT REQUIREMENTS ',
                'is_seened' => 0,
                'qualifier_id' => 1949,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:49:40',
                'updated_at' => '2024-01-18 20:49:40',
            ),
            62 => 
            array (
                'id' => 63,
                'reason' => 'GOT INTO A DEGREE PROGRAM NOT UNDER DOST PRIORITY PROGRAMS THAT I DECIDED TO PURSUE DUE TO THE FULL SCHOLARSHIP IT OFFERED AND IS THE APPLICANT\'S DESIRED DEGREE PROGRAM.',
                'is_seened' => 0,
                'qualifier_id' => 1971,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:49:56',
                'updated_at' => '2024-01-18 20:49:56',
            ),
            63 => 
            array (
                'id' => 64,
                'reason' => 'I FAILED TO ENROLL IN AN APPROVED UNIVERSITY. ',
                'is_seened' => 0,
                'qualifier_id' => 1997,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:50:16',
                'updated_at' => '2024-01-18 20:50:16',
            ),
            64 => 
            array (
                'id' => 65,
                'reason' => 'I ALREADY ENROLLED IN UNIVERSITY OF CEBU WHICH IS A NON AFFILIATED INSTITUTION OF THIS SCHOLARSHIP AND THE OTHER SCHOOL THAT IS AFFILIATED WITH DOST SCHOLARSHIP IS TOO FAR FROM OUR HOME.',
                'is_seened' => 0,
                'qualifier_id' => 2058,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:51:04',
                'updated_at' => '2024-01-18 20:51:04',
            ),
            65 => 
            array (
                'id' => 66,
                'reason' => 'ENROLLED COURSE, AB PSYCHOLOGY, IS NOT LISTED IN THE DOST-SEI S&T PRIORITY COURSES',
                'is_seened' => 0,
                'qualifier_id' => 2068,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:51:11',
                'updated_at' => '2024-01-18 20:51:11',
            ),
            66 => 
            array (
                'id' => 67,
                'reason' => 'MY SCHOLARSHIP IS NOT APPLICABLE FOR MY CHOSEN COURSE IN MY SCHOOL.',
                'is_seened' => 0,
                'qualifier_id' => 2076,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:51:17',
                'updated_at' => '2024-01-18 20:51:17',
            ),
            67 => 
            array (
                'id' => 68,
                'reason' => 'MY COURSE IS NOT COVERED UNDER THE DOST SCHOLARSHIP. NEVERTHELESS, THANK YOU VERY MUCH. ',
                'is_seened' => 0,
                'qualifier_id' => 2077,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:51:18',
                'updated_at' => '2024-01-18 20:51:18',
            ),
            68 => 
            array (
                'id' => 69,
            'reason' => 'MY CHOSEN COURSE (BS ECE) DOES NOT HAVE THE LEVEL III FAAP ACCREDITATION IN MY CHOSEN SCHOOL (DE LA SALLE LIPA).',
                'is_seened' => 0,
                'qualifier_id' => 2127,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:51:55',
                'updated_at' => '2024-01-18 20:51:55',
            ),
            69 => 
            array (
                'id' => 70,
                'reason' => 'COURSE IS NOT A S&T PRIORITY ',
                'is_seened' => 0,
                'qualifier_id' => 2184,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:52:38',
                'updated_at' => '2024-01-18 20:52:38',
            ),
            70 => 
            array (
                'id' => 71,
                'reason' => 'WE CHANGED OUR MINDS ABOUT THIS SCHOLARSHIP AND BECAUSE I WOULD LIKE TO PURSUE MY ENTIRE COLLEGE EDUCATION AT A NON-DOST ACCREDITED SCHOOL.',
                'is_seened' => 0,
                'qualifier_id' => 2277,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:53:49',
                'updated_at' => '2024-01-18 20:53:49',
            ),
            71 => 
            array (
                'id' => 72,
                'reason' => 'THE DEGREE PROGRAM I AM PURSUING IS NOT IN THE DOST-SEI PRIORITY PROGRAM ',
                'is_seened' => 0,
                'qualifier_id' => 2383,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:55:10',
                'updated_at' => '2024-01-18 20:55:10',
            ),
            72 => 
            array (
                'id' => 73,
                'reason' => 'MY COURSE IS NOT IN THE DOST PRIORITY COURSES',
                'is_seened' => 0,
                'qualifier_id' => 2404,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:55:27',
                'updated_at' => '2024-01-18 20:55:27',
            ),
            73 => 
            array (
                'id' => 74,
                'reason' => 'MY CHOSEN COURSE IS NOT A PRIORITY COURSE',
                'is_seened' => 0,
                'qualifier_id' => 2425,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:55:44',
                'updated_at' => '2024-01-18 20:55:44',
            ),
            74 => 
            array (
                'id' => 75,
                'reason' => 'I CANNOT AVAIL THE SCHOLARSHIP FOR MY CHOSEN COURSE',
                'is_seened' => 0,
                'qualifier_id' => 2434,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:55:51',
                'updated_at' => '2024-01-18 20:55:51',
            ),
            75 => 
            array (
                'id' => 76,
            'reason' => 'MY UNIVERSITY (UNIVERSITY OF CABUYAO) AND MY COURSE (BS NURSING) IS NOT ACCREDITED BY THE CHED',
                'is_seened' => 0,
                'qualifier_id' => 2436,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:55:52',
                'updated_at' => '2024-01-18 20:55:52',
            ),
            76 => 
            array (
                'id' => 77,
                'reason' => 'COURSE IS NOT A PRIORITY COURSE',
                'is_seened' => 0,
                'qualifier_id' => 2448,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:56:02',
                'updated_at' => '2024-01-18 20:56:02',
            ),
            77 => 
            array (
                'id' => 78,
                'reason' => 'I AM NOT AVAILING THE SCHOLARSHIP DUE TO THE REASON THAT THERE IS NO ACCREDITED SCHOOL THAT OFFERS MY COURSE NEAR MY RESIDENCE.',
                'is_seened' => 0,
                'qualifier_id' => 2471,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:56:20',
                'updated_at' => '2024-01-18 20:56:20',
            ),
            78 => 
            array (
                'id' => 79,
                'reason' => 'CURRENTLY ENROLLED IN A NON-PRIORITY PROGRAM ELIGIBLE FOR SCHOLARSHIP',
                'is_seened' => 0,
                'qualifier_id' => 2543,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:57:17',
                'updated_at' => '2024-01-18 20:57:17',
            ),
            79 => 
            array (
                'id' => 80,
                'reason' => 'CHOSEN COLLEGE COURSE IS NOT APPLICABLE',
                'is_seened' => 0,
                'qualifier_id' => 2545,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:57:19',
                'updated_at' => '2024-01-18 20:57:19',
            ),
            80 => 
            array (
                'id' => 81,
                'reason' => 'I AM TAKING BS NURSING',
                'is_seened' => 0,
                'qualifier_id' => 2566,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:57:36',
                'updated_at' => '2024-01-18 20:57:36',
            ),
            81 => 
            array (
                'id' => 82,
                'reason' => 'PENDING IMMIGRATION APPLICATION',
                'is_seened' => 0,
                'qualifier_id' => 2595,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:57:58',
                'updated_at' => '2024-01-18 20:57:58',
            ),
            82 => 
            array (
                'id' => 83,
                'reason' => 'MY COURSE IS NOT AMONG THE PRIORITY COURSES OF DOST-SEI.',
                'is_seened' => 0,
                'qualifier_id' => 2617,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:58:16',
                'updated_at' => '2024-01-18 20:58:16',
            ),
            83 => 
            array (
                'id' => 84,
                'reason' => 'ENROLLED IN A NOT PRIORITY COURSE ',
                'is_seened' => 0,
                'qualifier_id' => 2623,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:58:20',
                'updated_at' => '2024-01-18 20:58:20',
            ),
            84 => 
            array (
                'id' => 85,
                'reason' => 'I\'M REALLY EAGER TO RECEIVE THE DOST SCHOLARSHIP, BUT UNFORTUNATELY, MY CHOSEN COURSE, BS NAVAL ARCHITECTURE AND MARINE ENGINEERING, IS NOT LISTED AMONG YOUR PRIORITY COURSES.',
                'is_seened' => 0,
                'qualifier_id' => 2627,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:58:23',
                'updated_at' => '2024-01-18 20:58:23',
            ),
            85 => 
            array (
                'id' => 86,
                'reason' => 'WILL BE GOING ABROAD AFTER GRADUATING',
                'is_seened' => 0,
                'qualifier_id' => 2642,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:58:35',
                'updated_at' => '2024-01-18 20:58:35',
            ),
            86 => 
            array (
                'id' => 87,
                'reason' => 'THE SCHOOL I AM ENROLLED AT IS NOT AN ACCREDITED SCHOOL FOR DOST',
                'is_seened' => 0,
                'qualifier_id' => 2662,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:58:50',
                'updated_at' => '2024-01-18 20:58:50',
            ),
            87 => 
            array (
                'id' => 88,
            'reason' => 'LESSER NEED FOR THE FINANCIAL ASSISTANCE, AS THE COLLEGE I HAVE ENROLLED IN (UNIVERSITY OF THE PHILIPPINES - LOS BAÑOS) HAS FREE TUITION FEE.',
                'is_seened' => 0,
                'qualifier_id' => 2682,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:59:06',
                'updated_at' => '2024-01-18 20:59:06',
            ),
            88 => 
            array (
                'id' => 89,
                'reason' => 'ACCEPTANCE OF ADMISSION TO A STATE UNIVERSITY THAT IS ALREADY FREE OF TUITION',
                'is_seened' => 0,
                'qualifier_id' => 2707,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:59:25',
                'updated_at' => '2024-01-18 20:59:25',
            ),
            89 => 
            array (
                'id' => 90,
                'reason' => 'I HAVE A PENDING APPLICATION TO STUDY IN ANOTHER SCHOOL. ',
                'is_seened' => 0,
                'qualifier_id' => 2728,
                'user_id' => 1,
                'created_at' => '2024-01-18 20:59:41',
                'updated_at' => '2024-01-18 20:59:41',
            ),
            90 => 
            array (
                'id' => 91,
                'reason' => 'I HAVE ALREADY ENROLLED IN BS NURSING WHICH IS A NON S&T PRIORITY PROGRAM OF DOST SINCE I HAVE NOT PASSED THE COURSE I INITIALLY APPLIED FOR IN MY DOST APPLICATION. ',
                'is_seened' => 0,
                'qualifier_id' => 2760,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:00:06',
                'updated_at' => '2024-01-18 21:00:06',
            ),
            91 => 
            array (
                'id' => 92,
                'reason' => 'THE DEGREE COURSE I WILL BE PURSUING IS A NON-DOST PRIORITY DEGREE COURSE',
                'is_seened' => 0,
                'qualifier_id' => 2770,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:00:13',
                'updated_at' => '2024-01-18 21:00:13',
            ),
            92 => 
            array (
                'id' => 93,
                'reason' => 'THE COUSE I WILL BE TAKING IS NOT CREDITED ',
                'is_seened' => 0,
                'qualifier_id' => 2867,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:01:28',
                'updated_at' => '2024-01-18 21:01:28',
            ),
            93 => 
            array (
                'id' => 94,
                'reason' => 'STUDYING ABROAD',
                'is_seened' => 0,
                'qualifier_id' => 2873,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:01:32',
                'updated_at' => '2024-01-18 21:01:32',
            ),
            94 => 
            array (
                'id' => 95,
                'reason' => 'EVEN THOUGH MY COURSE IS STEM THE COURSE IS NOT INCLUDED IN THE DOST SCHOLARSHIP ',
                'is_seened' => 0,
                'qualifier_id' => 2885,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:01:41',
                'updated_at' => '2024-01-18 21:01:41',
            ),
            95 => 
            array (
                'id' => 96,
                'reason' => 'MY COURSE IS NOT IN THE PRIORITY COURSES',
                'is_seened' => 0,
                'qualifier_id' => 2905,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:01:57',
                'updated_at' => '2024-01-18 21:01:57',
            ),
            96 => 
            array (
                'id' => 97,
                'reason' => 'UST ARCHITECTURE IS NOT ACCREDITED',
                'is_seened' => 0,
                'qualifier_id' => 3040,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:03:43',
                'updated_at' => '2024-01-18 21:03:43',
            ),
            97 => 
            array (
                'id' => 98,
                'reason' => 'WILL PURSUE BS NURSING',
                'is_seened' => 0,
                'qualifier_id' => 3059,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:03:59',
                'updated_at' => '2024-01-18 21:03:59',
            ),
            98 => 
            array (
                'id' => 99,
                'reason' => 'THE COURSE I WANT TO PURSUE IS NOT A PRIORITY COURSE OF DOST-SEI SCHOLARSHIP.',
                'is_seened' => 0,
                'qualifier_id' => 3079,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:04:14',
                'updated_at' => '2024-01-18 21:04:14',
            ),
            99 => 
            array (
                'id' => 100,
                'reason' => 'THE COURSE I INTEND TO PURSUE IS NOT A PRIORITY PROGRAM OF DOST SEI AND IS NOT A SCIENCE RELATED COURSE.',
                'is_seened' => 0,
                'qualifier_id' => 3085,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:04:19',
                'updated_at' => '2024-01-18 21:04:19',
            ),
            100 => 
            array (
                'id' => 101,
                'reason' => 'I ENROLLED IN A NON-PRIORITY COURSE ',
                'is_seened' => 0,
                'qualifier_id' => 3093,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:04:25',
                'updated_at' => '2024-01-18 21:04:25',
            ),
            101 => 
            array (
                'id' => 102,
                'reason' => 'The university scholarship that I applied to cannot be availed with the DOST scholarship.',
                'is_seened' => 0,
                'qualifier_id' => 3169,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:05:23',
                'updated_at' => '2024-01-18 21:05:23',
            ),
            102 => 
            array (
                'id' => 103,
                'reason' => 'THE SCHOOL I WILL BE ENROLLING TO DOES NOT NEED DOST SCHOLARSHIP A. I HOPE I CAN USE IT IN THE FUTURE.ND THE COURSE IS NOT ALIGNED WITH THE PRIORITY PROGRAM OF DOST',
                'is_seened' => 0,
                'qualifier_id' => 3201,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:05:48',
                'updated_at' => '2024-01-18 21:05:48',
            ),
            103 => 
            array (
                'id' => 104,
                'reason' => 'I AM PURSUING A NON-BACHELOR OF SCIENCE DEGREE PROGRAM',
                'is_seened' => 0,
                'qualifier_id' => 3203,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:05:49',
                'updated_at' => '2024-01-18 21:05:49',
            ),
            104 => 
            array (
                'id' => 105,
                'reason' => 'I WAS UNABLE TO PASS AND APPLY TO A PRIORITY COURSE STATED ON THE WEBSITE.',
                'is_seened' => 0,
                'qualifier_id' => 3223,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:06:04',
                'updated_at' => '2024-01-18 21:06:04',
            ),
            105 => 
            array (
                'id' => 106,
                'reason' => 'SCHOLARSHIP BENEFITS IS NOT ENOUGH TO COVER THE TUITION FEES OF ACCREDITED UNIVERSITIES; LACKING FINANCIALLY TO COVER THE REST',
                'is_seened' => 0,
                'qualifier_id' => 3231,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:06:10',
                'updated_at' => '2024-01-18 21:06:10',
            ),
            106 => 
            array (
                'id' => 107,
                'reason' => 'MY CHOSEN COURSE IS NOT ACCREDITED IN THE UNIVERSITY I ENROLLED IN.',
                'is_seened' => 0,
                'qualifier_id' => 3249,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:06:24',
                'updated_at' => '2024-01-18 21:06:24',
            ),
            107 => 
            array (
                'id' => 108,
                'reason' => 'I WILL BE PURSUING MY COLLEGE IN ATENEO DE MANILA UNIVERSITY. THE COURSE I HAVE IN ADMU IS AB PSYCHOLOGY, AND IT\'S NOT LISTED AS ONE OF THE PRIORITY COURSES FOR THE SAID SCHOLARSHIP.',
                'is_seened' => 0,
                'qualifier_id' => 3275,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:06:44',
                'updated_at' => '2024-01-18 21:06:44',
            ),
            108 => 
            array (
                'id' => 109,
                'reason' => 'I AM NOT AVAILING THE SCHOLARSHIP DUE TO MY DESIRED COURSE AND SCHOOL WHICH BS MEDICAL LABORATORY SCIENCE AND PHINMA UPANG DOES NOT COMPLY WITH THE DOST STUDY PLACEMENT.',
                'is_seened' => 0,
                'qualifier_id' => 3296,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:07:00',
                'updated_at' => '2024-01-18 21:07:00',
            ),
            109 => 
            array (
                'id' => 110,
                'reason' => 'CANNOT COMPLY WITH THE CONDITIONS',
                'is_seened' => 0,
                'qualifier_id' => 3365,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:07:54',
                'updated_at' => '2024-01-18 21:07:54',
            ),
            110 => 
            array (
                'id' => 111,
            'reason' => 'I WILL PURSUE BACHELOR OF SCIENCE IN NURSING (BSN), WHICH IS NOT ONE OF YOUR PRIORITY PROGRAMS.',
                'is_seened' => 0,
                'qualifier_id' => 3521,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:09:55',
                'updated_at' => '2024-01-18 21:09:55',
            ),
            111 => 
            array (
                'id' => 112,
                'reason' => 'ADMISSION TO NON-PRIORITY PROGRAM',
                'is_seened' => 0,
                'qualifier_id' => 3547,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:10:15',
                'updated_at' => '2024-01-18 21:10:15',
            ),
            112 => 
            array (
                'id' => 113,
                'reason' => 'CHOSEN COURSE IS NOT PART OF THE PRIORTIY DEGREE PROGRAMS',
                'is_seened' => 0,
                'qualifier_id' => 3573,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:10:35',
                'updated_at' => '2024-01-18 21:10:35',
            ),
            113 => 
            array (
                'id' => 114,
                'reason' => 'COLLEGE COURSE NOT INCLUDED IN DOST-SEI PRIORITY COURSES',
                'is_seened' => 0,
                'qualifier_id' => 3611,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:11:04',
                'updated_at' => '2024-01-18 21:11:04',
            ),
            114 => 
            array (
                'id' => 115,
                'reason' => 'PREFERRED COURSE AT NATIONAL UNIVERSITY IS NOT UNDER DOST SCHOLARSHIP PROGRAM',
                'is_seened' => 0,
                'qualifier_id' => 3645,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:11:30',
                'updated_at' => '2024-01-18 21:11:30',
            ),
            115 => 
            array (
                'id' => 116,
                'reason' => 'NOT ENROLLED IN PRIORITY COURSE',
                'is_seened' => 0,
                'qualifier_id' => 3722,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:12:29',
                'updated_at' => '2024-01-18 21:12:29',
            ),
            116 => 
            array (
                'id' => 117,
                'reason' => 'MY CHOSEN COURSE IS NOT A PRIORITY COURSE',
                'is_seened' => 0,
                'qualifier_id' => 3738,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:12:42',
                'updated_at' => '2024-01-18 21:12:42',
            ),
            117 => 
            array (
                'id' => 118,
                'reason' => 'SHIFT OF COURSE TO ONE THAT IS NOT IN SUPPORTED LIST',
                'is_seened' => 0,
                'qualifier_id' => 3751,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:12:52',
                'updated_at' => '2024-01-18 21:12:52',
            ),
            118 => 
            array (
                'id' => 119,
                'reason' => 'I PLAN TO ENROLL IN A NON-PRIORITY COURSE',
                'is_seened' => 0,
                'qualifier_id' => 3756,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:12:56',
                'updated_at' => '2024-01-18 21:12:56',
            ),
            119 => 
            array (
                'id' => 120,
            'reason' => 'BS IET-GD2 INTERACTIVE ENTERTAINMENT MAJOR IN GAME DEVELOPMENT)',
            'is_seened' => 0,
            'qualifier_id' => 3822,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:13:47',
            'updated_at' => '2024-01-18 21:13:47',
        ),
        120 => 
        array (
            'id' => 121,
            'reason' => 'UNABLE TO SECURE ENROLLMENT IN AN APPROVED DEGREE COURSE OR UNIVERSITY',
            'is_seened' => 0,
            'qualifier_id' => 3844,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:14:05',
            'updated_at' => '2024-01-18 21:14:05',
        ),
        121 => 
        array (
            'id' => 122,
            'reason' => 'ENROLLED IN A DOST NON-PRIORITY COURSE',
            'is_seened' => 0,
            'qualifier_id' => 3847,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:14:07',
            'updated_at' => '2024-01-18 21:14:07',
        ),
        122 => 
        array (
            'id' => 123,
            'reason' => 'MY CHOSEN COURSE IS NOT UNDER THE PRIORITY PROGRAMS OFFERED.',
            'is_seened' => 0,
            'qualifier_id' => 3866,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:14:22',
            'updated_at' => '2024-01-18 21:14:22',
        ),
        123 => 
        array (
            'id' => 124,
            'reason' => 'NOT INCLUDED IN THE PRIORITY COURSES',
            'is_seened' => 0,
            'qualifier_id' => 3897,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:14:46',
            'updated_at' => '2024-01-18 21:14:46',
        ),
        124 => 
        array (
            'id' => 125,
            'reason' => 'CHOSEN COLLEGE COURSE IS NOT A PRIORITY COURSE OF DOST.',
            'is_seened' => 0,
            'qualifier_id' => 4024,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:16:27',
            'updated_at' => '2024-01-18 21:16:27',
        ),
        125 => 
        array (
            'id' => 126,
            'reason' => 'MY SCHOOL DOES NOT SATISFY STUDY PLACEMENT REQUIREMENTS',
            'is_seened' => 0,
            'qualifier_id' => 4031,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:16:33',
            'updated_at' => '2024-01-18 21:16:33',
        ),
        126 => 
        array (
            'id' => 127,
            'reason' => 'UNABLE TO MEET THE REQUIREMENTS OF THE DEFERMENT',
            'is_seened' => 0,
            'qualifier_id' => 4091,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:17:20',
            'updated_at' => '2024-01-18 21:17:20',
        ),
        127 => 
        array (
            'id' => 128,
            'reason' => 'COURSE IS NOT DOST-SEI ACCREDITED',
            'is_seened' => 0,
            'qualifier_id' => 4093,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:17:22',
            'updated_at' => '2024-01-18 21:17:22',
        ),
        128 => 
        array (
            'id' => 129,
            'reason' => 'NOT IN PRIORITY COURSE',
            'is_seened' => 0,
            'qualifier_id' => 4109,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:17:34',
            'updated_at' => '2024-01-18 21:17:34',
        ),
        129 => 
        array (
            'id' => 130,
            'reason' => 'SHIFTED TO BS NURSING, WHICH IS NOT IN THE PRIORITY COURSES OF DOST SEI',
            'is_seened' => 0,
            'qualifier_id' => 4165,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:18:17',
            'updated_at' => '2024-01-18 21:18:17',
        ),
        130 => 
        array (
            'id' => 131,
            'reason' => 'COURSE IS NOT ACCREDITED AND DOES NOT WANT TO TRANSFER ON ANOTHER SCHOOL',
            'is_seened' => 0,
            'qualifier_id' => 4173,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:18:23',
            'updated_at' => '2024-01-18 21:18:23',
        ),
        131 => 
        array (
            'id' => 132,
            'reason' => 'COURSE IS NOT QUALIFIED FOR DOST SCHOLARSHIP GRANT',
            'is_seened' => 0,
            'qualifier_id' => 4178,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:18:27',
            'updated_at' => '2024-01-18 21:18:27',
        ),
        132 => 
        array (
            'id' => 133,
            'reason' => 'I WILL BE AVAILING OTHER SCHOLARSHIP PROGRAM. ',
            'is_seened' => 0,
            'qualifier_id' => 4188,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:18:35',
            'updated_at' => '2024-01-18 21:18:35',
        ),
        133 => 
        array (
            'id' => 134,
            'reason' => 'THE SCHOOL THAT I WILL GO TO IS NOT ACCREDITED FOR THE SCHOLARSHIP ',
            'is_seened' => 0,
            'qualifier_id' => 4202,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:18:46',
            'updated_at' => '2024-01-18 21:18:46',
        ),
        134 => 
        array (
            'id' => 135,
            'reason' => 'I ALREADY HAVE A SCHOLARSHIP',
            'is_seened' => 0,
            'qualifier_id' => 4203,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:18:46',
            'updated_at' => '2024-01-18 21:18:46',
        ),
        135 => 
        array (
            'id' => 136,
        'reason' => 'THE S&T PROGRAM( BS CHE )I AM CURRENTLY ENROLLED IN IS NOT INCLUDED IN THE LIST OF DOST ACCREDITED PROGRAMS IN THE UNIVERSITY( CEBU INSTITUTE OF TECHNOLOGY- UNIVERSITY) I AM ENROLLED IN.',
            'is_seened' => 0,
            'qualifier_id' => 4228,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:19:06',
            'updated_at' => '2024-01-18 21:19:06',
        ),
        136 => 
        array (
            'id' => 137,
            'reason' => 'COURSE IS NOT SUPPORTED BY DOST',
            'is_seened' => 0,
            'qualifier_id' => 4299,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:20:03',
            'updated_at' => '2024-01-18 21:20:03',
        ),
        137 => 
        array (
            'id' => 138,
            'reason' => 'I QUALIFIED FOR A SCHOLARSHIP IN MY CHOSEN UNIVERSITY.',
            'is_seened' => 0,
            'qualifier_id' => 4336,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:20:32',
            'updated_at' => '2024-01-18 21:20:32',
        ),
        138 => 
        array (
            'id' => 139,
            'reason' => 'COURSE CHOICE',
            'is_seened' => 0,
            'qualifier_id' => 4358,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:20:49',
            'updated_at' => '2024-01-18 21:20:49',
        ),
        139 => 
        array (
            'id' => 140,
            'reason' => 'PREFERRED COURSE IN NOT ACCREDITED BY THE DOST-SEI SCHOLARSHIP.',
            'is_seened' => 0,
            'qualifier_id' => 4496,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:22:39',
            'updated_at' => '2024-01-18 21:22:39',
        ),
        140 => 
        array (
            'id' => 141,
        'reason' => 'The desired course (BS Petroleum Engineering) at the chosen university (Adamson University) is not recognized as CHED COE/COD nor has least Level III FAAP Accreditation for the S&T degree pro',
            'is_seened' => 0,
            'qualifier_id' => 4533,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:23:12',
            'updated_at' => '2024-01-18 21:23:12',
        ),
        141 => 
        array (
            'id' => 142,
            'reason' => 'ALREADY ENROLLED ON A NON-PRIORITY COURSE & IN A DOST NON-ACCREDITED  SCHOOL.',
            'is_seened' => 0,
            'qualifier_id' => 4571,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:23:42',
            'updated_at' => '2024-01-18 21:23:42',
        ),
        142 => 
        array (
            'id' => 143,
            'reason' => 'MY PREFERRED COURSE IS NOT PART OF THE PRIORITY COURSE LIST.',
            'is_seened' => 0,
            'qualifier_id' => 4580,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:23:51',
            'updated_at' => '2024-01-18 21:23:51',
        ),
        143 => 
        array (
            'id' => 144,
            'reason' => 'I AM ALREADY ENROLLED IN A NON-DOST APPROVED INSTITUTION.',
            'is_seened' => 0,
            'qualifier_id' => 4589,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:23:58',
            'updated_at' => '2024-01-18 21:23:58',
        ),
        144 => 
        array (
            'id' => 145,
            'reason' => 'MY CHOSEN COLLEGE COURSE IS NOT LISTED IN THE PRIORITY COURSES OF THE DOST SCHOLARSHIP.',
            'is_seened' => 0,
            'qualifier_id' => 4600,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:24:06',
            'updated_at' => '2024-01-18 21:24:06',
        ),
        145 => 
        array (
            'id' => 146,
            'reason' => 'I ENROLLED IN A NON S&T PRIORITY PROGRAMS',
            'is_seened' => 0,
            'qualifier_id' => 4645,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:24:42',
            'updated_at' => '2024-01-18 21:24:42',
        ),
        146 => 
        array (
            'id' => 147,
            'reason' => 'THE COURSE I HAVE CHOSEN IS NOT AMONG THE PRIORITY COURSES.',
            'is_seened' => 0,
            'qualifier_id' => 4652,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:24:47',
            'updated_at' => '2024-01-18 21:24:47',
        ),
        147 => 
        array (
            'id' => 148,
        'reason' => 'DECIDED TO PURSUE A PROGRAM (ECONOMICS AND ACCOUNTANCY) NOT PRIORITIZED BY DOST',
            'is_seened' => 0,
            'qualifier_id' => 4676,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:25:06',
            'updated_at' => '2024-01-18 21:25:06',
        ),
        148 => 
        array (
            'id' => 149,
            'reason' => 'The reason for deferring the scholarship is that I have chosen dentistry as my program, which is not on DOST’s priority program. However, I’m optimistic that in the future, or possibly next y',
            'is_seened' => 0,
            'qualifier_id' => 4681,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:25:10',
            'updated_at' => '2024-01-18 21:25:10',
        ),
        149 => 
        array (
            'id' => 150,
            'reason' => 'SCHOOL NOT INCLUDED IN LIST ',
            'is_seened' => 0,
            'qualifier_id' => 4682,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:25:11',
            'updated_at' => '2024-01-18 21:25:11',
        ),
        150 => 
        array (
            'id' => 151,
            'reason' => 'ENROLLED IN A NON-PRIORITY COURSE. OF DOST AND WAS NOT ABLE TO SHIFT TO ANOTHER PROGRAM ',
            'is_seened' => 0,
            'qualifier_id' => 4814,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:26:56',
            'updated_at' => '2024-01-18 21:26:56',
        ),
        151 => 
        array (
            'id' => 152,
            'reason' => 'SWU IS NOT INCLUDED IN THE CHED ACCREDITED SCHOOLS OF DOST',
            'is_seened' => 0,
            'qualifier_id' => 4823,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:27:02',
            'updated_at' => '2024-01-18 21:27:02',
        ),
        152 => 
        array (
            'id' => 153,
            'reason' => 'AVAILMENT OF A DIFFERENT GOVERNMENT SCHOLARSHIP AWARD',
            'is_seened' => 0,
            'qualifier_id' => 4840,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:27:16',
            'updated_at' => '2024-01-18 21:27:16',
        ),
        153 => 
        array (
            'id' => 154,
        'reason' => 'WILL PURSUE A NON-PRIORITY COURSE (BA COMMUNICATION)',
            'is_seened' => 0,
            'qualifier_id' => 4844,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:27:19',
            'updated_at' => '2024-01-18 21:27:19',
        ),
        154 => 
        array (
            'id' => 155,
            'reason' => 'MY COURSE IS NOT ON THE LISTED PRIORITY PROGRAMS TO AVAIL THE SCHOLARSHIP.',
            'is_seened' => 0,
            'qualifier_id' => 4886,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:27:53',
            'updated_at' => '2024-01-18 21:27:53',
        ),
        155 => 
        array (
            'id' => 156,
            'reason' => 'MY FAMILY DECIDED THAT I WOULD BE STUDYING IN ANOTHER COUNTRY.',
            'is_seened' => 0,
            'qualifier_id' => 4963,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:28:54',
            'updated_at' => '2024-01-18 21:28:54',
        ),
        156 => 
        array (
            'id' => 157,
            'reason' => 'COURSE NOT ALIGNED WITH DOST PRIORITY PROGRAMS/COURSES',
            'is_seened' => 0,
            'qualifier_id' => 5001,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:29:24',
            'updated_at' => '2024-01-18 21:29:24',
        ),
        157 => 
        array (
            'id' => 158,
            'reason' => 'THE PROGRAM I ENROLLED FOR IS NOT A PRIORITY PROGRAM OF THE SCHOLARSHIP AWARD',
            'is_seened' => 0,
            'qualifier_id' => 5106,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:30:48',
            'updated_at' => '2024-01-18 21:30:48',
        ),
        158 => 
        array (
            'id' => 159,
            'reason' => 'GRANTING OTHER SCHOLARSHIP ',
            'is_seened' => 0,
            'qualifier_id' => 5134,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:31:11',
            'updated_at' => '2024-01-18 21:31:11',
        ),
        159 => 
        array (
            'id' => 160,
            'reason' => 'INSTITUTION OF CHOICE IS NOT ACCREDITED',
            'is_seened' => 0,
            'qualifier_id' => 5161,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:31:33',
            'updated_at' => '2024-01-18 21:31:33',
        ),
        160 => 
        array (
            'id' => 161,
            'reason' => 'DO NOT HAVE A SCHOOL',
            'is_seened' => 0,
            'qualifier_id' => 5172,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:31:42',
            'updated_at' => '2024-01-18 21:31:42',
        ),
        161 => 
        array (
            'id' => 162,
            'reason' => 'NOT PRIORITY COURSE',
            'is_seened' => 0,
            'qualifier_id' => 5324,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:33:43',
            'updated_at' => '2024-01-18 21:33:43',
        ),
        162 => 
        array (
            'id' => 163,
            'reason' => 'THE CHOSEN HIGHER EDUCATION INSTITUTE IS NOT ACCREDITED BY THE UNDERGRADUATE DOST-SEI SCHOLARSHIP',
            'is_seened' => 0,
            'qualifier_id' => 5371,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:34:20',
            'updated_at' => '2024-01-18 21:34:20',
        ),
        163 => 
        array (
            'id' => 164,
            'reason' => 'MY COURSE IS NOT ONE OF THE PRIORITY COURSES, AND THEREFORE CANNOT USE IT.',
            'is_seened' => 0,
            'qualifier_id' => 5380,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:34:27',
            'updated_at' => '2024-01-18 21:34:27',
        ),
        164 => 
        array (
            'id' => 165,
        'reason' => 'COURSE (BS IN NURSING) IS NOT A PRIORITY COURSE',
            'is_seened' => 0,
            'qualifier_id' => 5382,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:34:29',
            'updated_at' => '2024-01-18 21:34:29',
        ),
        165 => 
        array (
            'id' => 166,
            'reason' => 'MY CURRENT PROGRAM, BS FAMILY LIFE AND CHILD DEVELOPMENT, IS NOT PART OF THE PRIORITY PROGRAMS OF THE SCHOLARSHIP.',
            'is_seened' => 0,
            'qualifier_id' => 5457,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:35:30',
            'updated_at' => '2024-01-18 21:35:30',
        ),
        166 => 
        array (
            'id' => 167,
            'reason' => 'My course, Bachelor of Landscape Architecture, is not included among the priority programs, despite my school, UP Diliman, being a state university.',
            'is_seened' => 0,
            'qualifier_id' => 5464,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:35:36',
            'updated_at' => '2024-01-18 21:35:36',
        ),
        167 => 
        array (
            'id' => 168,
            'reason' => 'MY CHOSEN COURSE/PROGRAM IS NOT ACCREDITED BY THE SCHOLARSHIP.',
            'is_seened' => 0,
            'qualifier_id' => 5470,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:35:42',
            'updated_at' => '2024-01-18 21:35:42',
        ),
        168 => 
        array (
            'id' => 169,
            'reason' => 'DOST DOES NOT ACCREDIT BS NURSING ',
            'is_seened' => 0,
            'qualifier_id' => 5501,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:36:07',
            'updated_at' => '2024-01-18 21:36:07',
        ),
        169 => 
        array (
            'id' => 170,
            'reason' => 'IMMIGRATION',
            'is_seened' => 0,
            'qualifier_id' => 5503,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:36:08',
            'updated_at' => '2024-01-18 21:36:08',
        ),
        170 => 
        array (
            'id' => 171,
            'reason' => 'I AM A CHED SCHOLAR ALREADY',
            'is_seened' => 0,
            'qualifier_id' => 5510,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:36:14',
            'updated_at' => '2024-01-18 21:36:14',
        ),
        171 => 
        array (
            'id' => 172,
            'reason' => 'The approved schools by DOST for my course were too far from my home town.',
            'is_seened' => 0,
            'qualifier_id' => 5521,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:36:22',
            'updated_at' => '2024-01-18 21:36:22',
        ),
        172 => 
        array (
            'id' => 173,
        'reason' => 'SCHOLARSHIP IS NOT ACCREDITED IN SPECIFIC COLLEGE (VELEZ COLLEGE)',
            'is_seened' => 0,
            'qualifier_id' => 5556,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:36:50',
            'updated_at' => '2024-01-18 21:36:50',
        ),
        173 => 
        array (
            'id' => 174,
            'reason' => 'MY CHOSEN COURSE, WHICH IS BS BASIC HUMAN STUDIES, IN THE UNIVERSITY OF SANTO TOMAS IS NOT INCLUDED ON THE LIST OF PRIORITY COURSES.',
            'is_seened' => 0,
            'qualifier_id' => 5618,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:37:39',
            'updated_at' => '2024-01-18 21:37:39',
        ),
        174 => 
        array (
            'id' => 175,
            'reason' => 'CURRENT AVAILABLE COURSE IS NOT A DOST PRIORITY COURSE',
            'is_seened' => 0,
            'qualifier_id' => 5659,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:38:14',
            'updated_at' => '2024-01-18 21:38:14',
        ),
        175 => 
        array (
            'id' => 176,
            'reason' => 'DECIDING TO CHOOSE TO ENROLL IN NURSING WHICH IS NOT A PRIORITY COURSE OF THE DOST SCHOLARSHIP',
            'is_seened' => 0,
            'qualifier_id' => 5662,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:38:16',
            'updated_at' => '2024-01-18 21:38:16',
        ),
        176 => 
        array (
            'id' => 177,
            'reason' => 'MY CHOSEN COURSE IS NOT INCLUDED IN THE LIST OF PRIORITY COURSES, AND   MY SCHOOL IS NOT RECOGNIZED  AS CHED COE/COD ',
            'is_seened' => 0,
            'qualifier_id' => 5668,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:38:21',
            'updated_at' => '2024-01-18 21:38:21',
        ),
        177 => 
        array (
            'id' => 178,
            'reason' => 'ENROLLED IN A NON-PRIORITY COURSE',
            'is_seened' => 0,
            'qualifier_id' => 5692,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:38:41',
            'updated_at' => '2024-01-18 21:38:41',
        ),
        178 => 
        array (
            'id' => 179,
            'reason' => 'MY COURSE IS NOT INCLUDED ON THE PRIORITY',
            'is_seened' => 0,
            'qualifier_id' => 5727,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:39:09',
            'updated_at' => '2024-01-18 21:39:09',
        ),
        179 => 
        array (
            'id' => 180,
            'reason' => 'MIGRATION ABROAD',
            'is_seened' => 0,
            'qualifier_id' => 5757,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:39:33',
            'updated_at' => '2024-01-18 21:39:33',
        ),
        180 => 
        array (
            'id' => 181,
            'reason' => 'I WISH NOT TO AVAIL THE SCHOLARSHIP AWARD FOR PERSONAL REASONS.',
            'is_seened' => 0,
            'qualifier_id' => 5804,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:40:14',
            'updated_at' => '2024-01-18 21:40:14',
        ),
        181 => 
        array (
            'id' => 182,
            'reason' => 'I WILL BE TAKING BACHELOR OF SCIENCE IN NURSING WHICH IS NOT IN THE PRIORITY COURSES OF DOST',
            'is_seened' => 0,
            'qualifier_id' => 5805,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:40:15',
            'updated_at' => '2024-01-18 21:40:15',
        ),
        182 => 
        array (
            'id' => 183,
            'reason' => 'THE COURSE I HAVE CHOSEN IS NOT A PART OF THE 2023-2024 PRIORITY COURSES TO ENROLL IN.',
            'is_seened' => 0,
            'qualifier_id' => 5817,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:40:24',
            'updated_at' => '2024-01-18 21:40:24',
        ),
        183 => 
        array (
            'id' => 184,
            'reason' => 'ACCEPTED AT PMMA',
            'is_seened' => 0,
            'qualifier_id' => 5896,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:41:28',
            'updated_at' => '2024-01-18 21:41:28',
        ),
        184 => 
        array (
            'id' => 185,
            'reason' => 'I HAVE ALR ENROLLED IN A PROGRAM THAT IS NOT COVERED BY THE SCHOLARSHIP',
            'is_seened' => 0,
            'qualifier_id' => 5901,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:41:33',
            'updated_at' => '2024-01-18 21:41:33',
        ),
        185 => 
        array (
            'id' => 186,
            'reason' => 'MEDICAL COURSES OFFERED BY OUR LOCAL INSTITUTIONS DO NOT HAVE FAAP LEVEL III ACCREDITATION. IF DEFERMENT IS POSSIBLE, I WILL APPLY TO UNIVERSITIES OUTSIDE OF OUR CITY IN THE FOLLOWING ACADEMI',
            'is_seened' => 0,
            'qualifier_id' => 5938,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:42:03',
            'updated_at' => '2024-01-18 21:42:03',
        ),
        186 => 
        array (
            'id' => 187,
            'reason' => 'ENROLLED COURSE IS NOT S&T PRIORITY PROGRAM.',
            'is_seened' => 0,
            'qualifier_id' => 5956,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:42:18',
            'updated_at' => '2024-01-18 21:42:18',
        ),
        187 => 
        array (
            'id' => 188,
            'reason' => 'THE SCHOOL I\'M PLANNING TO ATTEND IS NOT ACCREDITED BY DOST ',
            'is_seened' => 0,
            'qualifier_id' => 5971,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:42:30',
            'updated_at' => '2024-01-18 21:42:30',
        ),
        188 => 
        array (
            'id' => 189,
            'reason' => 'I ALREADY ENROLLED IN THE UNIVERSITY OF CEBU WHICH IS A NON-AFFILIATED INSTITUTION OF THIS SCHOLARSHIP AND THE OTHER SCHOOL THAT HAS A BACHELOR OF COMPUTER SCIENCE AND IS AFFILIATED WITH DOST',
            'is_seened' => 0,
            'qualifier_id' => 6012,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:43:05',
            'updated_at' => '2024-01-18 21:43:05',
        ),
        189 => 
        array (
            'id' => 190,
            'reason' => 'THE SCHOOL THAT I AM ENROLLED TO IS NOT CONSIDERED AS A CENTER OF EXCELLENCE ',
            'is_seened' => 0,
            'qualifier_id' => 6016,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:43:08',
            'updated_at' => '2024-01-18 21:43:08',
        ),
        190 => 
        array (
            'id' => 191,
            'reason' => 'CHOSEN COURSE IS NOT PART OF DOST\'S PRIORITY COURSES',
            'is_seened' => 0,
            'qualifier_id' => 6049,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:43:35',
            'updated_at' => '2024-01-18 21:43:35',
        ),
        191 => 
        array (
            'id' => 192,
            'reason' => 'MY COLLEGE PROGRAM IS NOT ACCREDITED.',
            'is_seened' => 0,
            'qualifier_id' => 6074,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:43:54',
            'updated_at' => '2024-01-18 21:43:54',
        ),
        192 => 
        array (
            'id' => 193,
            'reason' => 'MY PREFERRED COURSE IN MY SCHOOL IS VERY UNFORTUNATELY NOT CHED/COD CERTIFIED.',
            'is_seened' => 0,
            'qualifier_id' => 6095,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:44:12',
            'updated_at' => '2024-01-18 21:44:12',
        ),
        193 => 
        array (
            'id' => 194,
            'reason' => 'I AM ENROLLED IN SOUTHERN LUZON STATE UNIVERSITY, WITH BS RADTECH AS MY PROGRAM, WHICH IS NOT A PRIORITY PROGRAM OF DOST.',
            'is_seened' => 0,
            'qualifier_id' => 6114,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:44:27',
            'updated_at' => '2024-01-18 21:44:27',
        ),
        194 => 
        array (
            'id' => 195,
            'reason' => 'CHOSE A DIFFERENT SCHOLARSHIP',
            'is_seened' => 0,
            'qualifier_id' => 6162,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:45:05',
            'updated_at' => '2024-01-18 21:45:05',
        ),
        195 => 
        array (
            'id' => 196,
        'reason' => 'COURSE (BS BASIC HUMAN STUDIES) NOT LISTED IN PRIORITY COURSE',
            'is_seened' => 0,
            'qualifier_id' => 6165,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:45:08',
            'updated_at' => '2024-01-18 21:45:08',
        ),
        196 => 
        array (
            'id' => 197,
            'reason' => 'COURSE IS NOT ALIGNED WITH PRIORITY COURSE',
            'is_seened' => 0,
            'qualifier_id' => 6211,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:45:44',
            'updated_at' => '2024-01-18 21:45:44',
        ),
        197 => 
        array (
            'id' => 198,
            'reason' => 'PLANNING TO MIGRATE',
            'is_seened' => 0,
            'qualifier_id' => 6259,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:46:23',
            'updated_at' => '2024-01-18 21:46:23',
        ),
        198 => 
        array (
            'id' => 199,
        'reason' => 'I AM ENROLLED IN A NON-PRIORITY COURSE (BS IN NURSING).',
            'is_seened' => 0,
            'qualifier_id' => 6271,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:46:34',
            'updated_at' => '2024-01-18 21:46:34',
        ),
        199 => 
        array (
            'id' => 200,
            'reason' => 'ENROLLED IN A NON-PRIORITY COURSE OF DOST-SEI.',
            'is_seened' => 0,
            'qualifier_id' => 6281,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:46:41',
            'updated_at' => '2024-01-18 21:46:41',
        ),
        200 => 
        array (
            'id' => 201,
            'reason' => 'I WILL BE PURSUING BS IN ACCOUNTANCY. ',
            'is_seened' => 0,
            'qualifier_id' => 6326,
            'user_id' => 1,
            'created_at' => '2024-01-18 21:47:18',
            'updated_at' => '2024-01-18 21:47:18',
        ),
        201 => 
        array (
            'id' => 202,
            'reason' => 'MY COURSE IS NOT DOST-ACCREDITED :(',
                'is_seened' => 0,
                'qualifier_id' => 6377,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:47:58',
                'updated_at' => '2024-01-18 21:47:58',
            ),
            202 => 
            array (
                'id' => 203,
                'reason' => 'THE CHOSEN COURSE IS NOT INCLUDED IN THE PRIORITY COURSES.',
                'is_seened' => 0,
                'qualifier_id' => 6399,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:48:15',
                'updated_at' => '2024-01-18 21:48:15',
            ),
            203 => 
            array (
                'id' => 204,
                'reason' => 'CURRENTLY ENROLLED AS A STUDENT UNDER THE PROGRAM OF BS NURSING IN CEU-MALOLOS.',
                'is_seened' => 0,
                'qualifier_id' => 6420,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:48:32',
                'updated_at' => '2024-01-18 21:48:32',
            ),
            204 => 
            array (
                'id' => 205,
                'reason' => 'PURSUING ANOTHER COURSE NOT PRIORITIZED BY THE SCHOLARSHIP',
                'is_seened' => 0,
                'qualifier_id' => 6447,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:48:53',
                'updated_at' => '2024-01-18 21:48:53',
            ),
            205 => 
            array (
                'id' => 206,
                'reason' => 'THE COURSE THAT I WILL BE TAKING IS NOT INCLUDED IN THE PRIORITY PROGRAMS OF DOST SCGOLARSHIP',
                'is_seened' => 0,
                'qualifier_id' => 6449,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:48:55',
                'updated_at' => '2024-01-18 21:48:55',
            ),
            206 => 
            array (
                'id' => 207,
                'reason' => 'STUDY PLACEMENT DOES NOT BELONG TO ACCREDITED SCHOOLS',
                'is_seened' => 0,
                'qualifier_id' => 6451,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:48:56',
                'updated_at' => '2024-01-18 21:48:56',
            ),
            207 => 
            array (
                'id' => 208,
                'reason' => 'AFTER REVIEWING THE ONLINE ORIENTATION, I HAVE DECIDED NOT TO AVAIL THE SCHOLARSHIP BECAUSE THE CONDITIONS WERE DIFFERENT THAN WHAT WE HOPED FOR. HOWEVER, WE I AM TRULY GREATFUL OF THE OPPORT',
                'is_seened' => 0,
                'qualifier_id' => 6483,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:49:22',
                'updated_at' => '2024-01-18 21:49:22',
            ),
            208 => 
            array (
                'id' => 209,
                'reason' => 'I AM ENROLLED IN A NON-PRIORITY COURSE OF THE DOST-SEI SCHOLARSHIP PROGRAM',
                'is_seened' => 0,
                'qualifier_id' => 6558,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:50:22',
                'updated_at' => '2024-01-18 21:50:22',
            ),
            209 => 
            array (
                'id' => 210,
                'reason' => 'NON COE/COD COURSE ',
                'is_seened' => 0,
                'qualifier_id' => 6562,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:50:26',
                'updated_at' => '2024-01-18 21:50:26',
            ),
            210 => 
            array (
                'id' => 211,
                'reason' => 'PROGRAM OUTSIDE PRIORITY LIST, UNSUCCESSFUL APPLICATION TO PROSPECTIVE UNIVERSITIES,FUTURE PLANS TO STUDY ABROAD, AND MENTAL HEALTH CONSIDERATIONS',
                'is_seened' => 0,
                'qualifier_id' => 6639,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:51:29',
                'updated_at' => '2024-01-18 21:51:29',
            ),
            211 => 
            array (
                'id' => 212,
                'reason' => 'I WILL ENROL IN A NON-PRIORITY COURSE.',
                'is_seened' => 0,
                'qualifier_id' => 6645,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:51:34',
                'updated_at' => '2024-01-18 21:51:34',
            ),
            212 => 
            array (
                'id' => 213,
                'reason' => 'CHOSEN COURSE IS NOT A PRIORITY COURSE OF DOST AND IS NOT A COE OR COD.',
                'is_seened' => 0,
                'qualifier_id' => 6660,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:51:46',
                'updated_at' => '2024-01-18 21:51:46',
            ),
            213 => 
            array (
                'id' => 214,
                'reason' => 'UNFORTUNATELY, I ENROLLED IN BS NURSING WHICH IS NOT YET INCLUDED IN THE PRIORITY PROGRAMS.',
                'is_seened' => 0,
                'qualifier_id' => 6669,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:51:53',
                'updated_at' => '2024-01-18 21:51:53',
            ),
            214 => 
            array (
                'id' => 215,
                'reason' => 'MY FIRST CHOICE OF COURSE IS NOT COVERED BY DOST',
                'is_seened' => 0,
                'qualifier_id' => 6672,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:51:55',
                'updated_at' => '2024-01-18 21:51:55',
            ),
            215 => 
            array (
                'id' => 216,
                'reason' => 'DID NOT QUALIFY FOR BS HUMAN BIOLOGY AND WAS REDIRECTED TO AB BEHAVIORAL SCIENCES MAJOR IN ORGANIZATIONAL AND SOCIAL SYSTEMS DEVELOPMENT AT DLSU - MANILA',
                'is_seened' => 0,
                'qualifier_id' => 6767,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:53:13',
                'updated_at' => '2024-01-18 21:53:13',
            ),
            216 => 
            array (
                'id' => 217,
                'reason' => 'MY CHOSEN PROGRAM, WHICH IS BS NURSING, IS NOT INCLUDED IN THE PRIORITY PROGRAM LIST OF THE DOST SCHOLARSHIP.',
                'is_seened' => 0,
                'qualifier_id' => 6782,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:53:24',
                'updated_at' => '2024-01-18 21:53:24',
            ),
            217 => 
            array (
                'id' => 218,
                'reason' => 'PROGRAM IS NOT A PRIORITY PROGRAM',
                'is_seened' => 0,
                'qualifier_id' => 6799,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:53:38',
                'updated_at' => '2024-01-18 21:53:38',
            ),
            218 => 
            array (
                'id' => 219,
                'reason' => 'THE ACCREDITED INSTITUTION AVAILABLE FOR MY DESIRED COURSE WAS TOO FAR FROM MY HOMETOME ANDI WAS ALREADY ENROLLED WITH A NON-ACCREDITED INSTITUTION',
                'is_seened' => 0,
                'qualifier_id' => 6854,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:54:24',
                'updated_at' => '2024-01-18 21:54:24',
            ),
            219 => 
            array (
                'id' => 220,
                'reason' => 'BS ELECTRONICS ENGINEERING AT SLU DID NOT MEET THE LEVEL OF ACCREDITATION FOR PRIVATE INSTITUTION.',
                'is_seened' => 0,
                'qualifier_id' => 6917,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:55:15',
                'updated_at' => '2024-01-18 21:55:15',
            ),
            220 => 
            array (
                'id' => 221,
                'reason' => 'I HAVE NOT CHOSEN A PRIORITY COURSE OF DOST AND THE SCHOOL IS NOT ACCREDITED BY DOST',
                'is_seened' => 0,
                'qualifier_id' => 6922,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:55:20',
                'updated_at' => '2024-01-18 21:55:20',
            ),
            221 => 
            array (
                'id' => 222,
                'reason' => 'MY DESIRED COURSE/PROGRAM IS NOT INCLUDED IN THE LIST OF PRIORITY PROGRAMS OF THE SCHOLARSHIP',
                'is_seened' => 0,
                'qualifier_id' => 6977,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:56:09',
                'updated_at' => '2024-01-18 21:56:09',
            ),
            222 => 
            array (
                'id' => 223,
            'reason' => 'ENROLLED IN SCHOOL (SWU PHINMA) THAT HAS NO FAAP ACCREDITATION',
                'is_seened' => 0,
                'qualifier_id' => 7009,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:56:38',
                'updated_at' => '2024-01-18 21:56:38',
            ),
            223 => 
            array (
                'id' => 224,
                'reason' => 'I AM PURSUING BS NURSING WHICH IS NOT AMONG THE PRIORITY PROGRAMS OF THE SCHOLARSHIP',
                'is_seened' => 0,
                'qualifier_id' => 7015,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:56:43',
                'updated_at' => '2024-01-18 21:56:43',
            ),
            224 => 
            array (
                'id' => 225,
                'reason' => 'THE SCHOOL WHERE I PASSED IS A STATE COLLEGE AND A DISTANT RELATIVE OFFERED TO SUPPORT ME WITH MY EXPENSES',
                'is_seened' => 0,
                'qualifier_id' => 7181,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:59:05',
                'updated_at' => '2024-01-18 21:59:05',
            ),
            225 => 
            array (
                'id' => 226,
                'reason' => 'COLLEGE COURSE IS NOT A PRIORITY COURSE',
                'is_seened' => 0,
                'qualifier_id' => 7234,
                'user_id' => 1,
                'created_at' => '2024-01-18 21:59:48',
                'updated_at' => '2024-01-18 21:59:48',
            ),
            226 => 
            array (
                'id' => 227,
            'reason' => 'ENROLLED COURSE IS NOT INCLUDED IN DOST-SEI\'S PRIORITY COURSE (BS INTERIOR DESIGN)',
                'is_seened' => 0,
                'qualifier_id' => 7270,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:00:17',
                'updated_at' => '2024-01-18 22:00:17',
            ),
            227 => 
            array (
                'id' => 228,
                'reason' => 'MY CHOSEN SCHOOL IS NOT COVERED BY DOST',
                'is_seened' => 0,
                'qualifier_id' => 7345,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:01:24',
                'updated_at' => '2024-01-18 22:01:24',
            ),
            228 => 
            array (
                'id' => 229,
                'reason' => 'THE UST COLLEGE OF ARCHITECTURE DOES NOT ACCREDIT THE SCHOLARSHIP.',
                'is_seened' => 0,
                'qualifier_id' => 7389,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:02:02',
                'updated_at' => '2024-01-18 22:02:02',
            ),
            229 => 
            array (
                'id' => 230,
                'reason' => 'CHOSEN COURSE IS NOT IN THE PRIORITY LIST',
                'is_seened' => 0,
                'qualifier_id' => 7427,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:02:33',
                'updated_at' => '2024-01-18 22:02:33',
            ),
            230 => 
            array (
                'id' => 231,
                'reason' => 'TOOK ANOTHER SCHOLARSHIP OPPORTUNITY',
                'is_seened' => 0,
                'qualifier_id' => 7564,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:04:30',
                'updated_at' => '2024-01-18 22:04:30',
            ),
            231 => 
            array (
                'id' => 232,
                'reason' => 'NOT ENROLLED ',
                'is_seened' => 0,
                'qualifier_id' => 7588,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:04:50',
                'updated_at' => '2024-01-18 22:04:50',
            ),
            232 => 
            array (
                'id' => 233,
                'reason' => 'VELEZ COLLEGE IS NOT AN ACCREDITED SCHOOL.',
                'is_seened' => 0,
                'qualifier_id' => 7702,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:06:26',
                'updated_at' => '2024-01-18 22:06:26',
            ),
            233 => 
            array (
                'id' => 234,
                'reason' => 'THE SCHOLARSHIP DOES NOT COVER THE PROGRAM THAT I HAVE CHOSEN',
                'is_seened' => 0,
                'qualifier_id' => 7733,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:06:51',
                'updated_at' => '2024-01-18 22:06:51',
            ),
            234 => 
            array (
                'id' => 235,
                'reason' => 'CHOSEN COURSE IS NOT ACCREDITED BY DOST',
                'is_seened' => 0,
                'qualifier_id' => 7742,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:06:59',
                'updated_at' => '2024-01-18 22:06:59',
            ),
            235 => 
            array (
                'id' => 236,
                'reason' => 'THE SCHOOL I AM ENROLLED IN IS NOT IN THE CHED CENTER OF  EXCELLENCE AND DO NOT HAVE FAAP LEVEL III',
                'is_seened' => 0,
                'qualifier_id' => 7770,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:07:25',
                'updated_at' => '2024-01-18 22:07:25',
            ),
            236 => 
            array (
                'id' => 237,
                'reason' => 'I AM ALREADY ENROLLED AND CURRENTLY STUDYING AT MARITIME ACADEMY OF ASIA AND THE PACIFIC.',
                'is_seened' => 0,
                'qualifier_id' => 7783,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:07:37',
                'updated_at' => '2024-01-18 22:07:37',
            ),
            237 => 
            array (
                'id' => 238,
                'reason' => 'COURSE IS NOT A PRIORITY PROGRAM: BS ACCOUNTANCY ',
                'is_seened' => 0,
                'qualifier_id' => 7806,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:07:59',
                'updated_at' => '2024-01-18 22:07:59',
            ),
            238 => 
            array (
                'id' => 239,
                'reason' => 'NOT APPLICABLE / QUALIFICATIONS NOT MET',
                'is_seened' => 0,
                'qualifier_id' => 7862,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:08:50',
                'updated_at' => '2024-01-18 22:08:50',
            ),
            239 => 
            array (
                'id' => 240,
                'reason' => 'I WILL BE PURSUING BS PHYSICAL THERAPY',
                'is_seened' => 0,
                'qualifier_id' => 7869,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:08:56',
                'updated_at' => '2024-01-18 22:08:56',
            ),
            240 => 
            array (
                'id' => 241,
                'reason' => 'PREFERRED COLLEGE PROGRAM IS NOT UNDER THE PRIORITY LIST OF THE SCHOLARSHIP. ',
                'is_seened' => 0,
                'qualifier_id' => 7872,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:08:58',
                'updated_at' => '2024-01-18 22:08:58',
            ),
            241 => 
            array (
                'id' => 242,
                'reason' => 'I AM NOT AVAILING THE DOST SCHOLARSHIP DUE TO THE BS ARCHITECTURE COURSE AT UST LACKING THE REQUIRED RECOGNITIONS, SUCH AS "CENTER OF EXCELLENCE" AND "CENTER OF DEVELOPMENT" STATUS, AS WELL A',
                'is_seened' => 0,
                'qualifier_id' => 7879,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:09:06',
                'updated_at' => '2024-01-18 22:09:06',
            ),
            242 => 
            array (
                'id' => 243,
                'reason' => 'COURSE ISN\'T ACCREDITED',
                'is_seened' => 0,
                'qualifier_id' => 7941,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:10:02',
                'updated_at' => '2024-01-18 22:10:02',
            ),
            243 => 
            array (
                'id' => 244,
                'reason' => 'ENROLLED TO A NON-PRIORITY PROGRAM',
                'is_seened' => 0,
                'qualifier_id' => 8029,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:11:19',
                'updated_at' => '2024-01-18 22:11:19',
            ),
            244 => 
            array (
                'id' => 245,
                'reason' => 'COURSE IS NOT COVERED BY THE SCHOLARSHIP ',
                'is_seened' => 0,
                'qualifier_id' => 8031,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:11:20',
                'updated_at' => '2024-01-18 22:11:20',
            ),
            245 => 
            array (
                'id' => 246,
                'reason' => 'I WAS OFFERED A SCHOLARSHIP AT MY CHOSEN UNIVERSITY.',
                'is_seened' => 0,
                'qualifier_id' => 8036,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:11:24',
                'updated_at' => '2024-01-18 22:11:24',
            ),
            246 => 
            array (
                'id' => 247,
                'reason' => 'MAY NOT BE ABLE TO FULFILL CONTRACTUAL OBLIGATIONS AND DUTIES AFTER GRADUATION',
                'is_seened' => 0,
                'qualifier_id' => 8068,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:11:51',
                'updated_at' => '2024-01-18 22:11:51',
            ),
            247 => 
            array (
                'id' => 248,
                'reason' => 'THE COURSE I EMROLLED AT THE DEL LA SALLE UNIVERSITY - DASMARINAS, BS CIVIL ENGINEERING, IS NOT FAAP III ACCREDITED',
                'is_seened' => 0,
                'qualifier_id' => 8110,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:12:30',
                'updated_at' => '2024-01-18 22:12:30',
            ),
            248 => 
            array (
                'id' => 249,
                'reason' => 'PROGRAM IS NOT A PRIORITY',
                'is_seened' => 0,
                'qualifier_id' => 8152,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:13:07',
                'updated_at' => '2024-01-18 22:13:07',
            ),
            249 => 
            array (
                'id' => 250,
                'reason' => 'RELIGIOUS; OBLIGATIONS AND COMPLIANCE REQUIREMENT',
                'is_seened' => 0,
                'qualifier_id' => 8159,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:13:12',
                'updated_at' => '2024-01-18 22:13:12',
            ),
            250 => 
            array (
                'id' => 251,
                'reason' => 'ENROLLED IN A NON-PRIORITY PROGRAM',
                'is_seened' => 0,
                'qualifier_id' => 8259,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:14:43',
                'updated_at' => '2024-01-18 22:14:43',
            ),
            251 => 
            array (
                'id' => 252,
                'reason' => 'NON PRIORITY COURSE',
                'is_seened' => 0,
                'qualifier_id' => 8304,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:15:22',
                'updated_at' => '2024-01-18 22:15:22',
            ),
            252 => 
            array (
                'id' => 253,
            'reason' => 'enrolled in a non dost accredited branch (nu fairview)',
                'is_seened' => 0,
                'qualifier_id' => 8327,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:15:42',
                'updated_at' => '2024-01-18 22:15:42',
            ),
            253 => 
            array (
                'id' => 254,
                'reason' => 'I AM ENROLLED IN A NON-PRIORITY COURSE.',
                'is_seened' => 0,
                'qualifier_id' => 8336,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:15:50',
                'updated_at' => '2024-01-18 22:15:50',
            ),
            254 => 
            array (
                'id' => 255,
                'reason' => 'THE COURSE THAT I AM ALREADY ENROLLED IN IS NOT A PRIORITY COURSE OF THE SCHOLARSHIP.',
                'is_seened' => 0,
                'qualifier_id' => 8365,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:16:13',
                'updated_at' => '2024-01-18 22:16:13',
            ),
            255 => 
            array (
                'id' => 256,
                'reason' => 'THERE’S NO MARINE ENGINEERING IN THE LIST',
                'is_seened' => 0,
                'qualifier_id' => 8369,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:16:16',
                'updated_at' => '2024-01-18 22:16:16',
            ),
            256 => 
            array (
                'id' => 257,
                'reason' => 'I OPTED TO AVAIL THE SCHOLARSHIP GIVEN BY THE UNIVERSITY I AM ATTENDING TO.',
                'is_seened' => 0,
                'qualifier_id' => 8401,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:16:45',
                'updated_at' => '2024-01-18 22:16:45',
            ),
            257 => 
            array (
                'id' => 258,
                'reason' => 'BECAUSE THE COURSE I HAVE CHOSEN IS NOT A PRIORITY COURSE IN THE SCHOLARSHIP',
                'is_seened' => 0,
                'qualifier_id' => 8427,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:17:07',
                'updated_at' => '2024-01-18 22:17:07',
            ),
            258 => 
            array (
                'id' => 259,
                'reason' => 'NOT ENROLLED IN A PRIORITY COURSE',
                'is_seened' => 0,
                'qualifier_id' => 8452,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:17:27',
                'updated_at' => '2024-01-18 22:17:27',
            ),
            259 => 
            array (
                'id' => 260,
                'reason' => 'CHOSEN UNDERGRADUATE COURSE IS NOT A PRIORITY COURSE',
                'is_seened' => 0,
                'qualifier_id' => 8508,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:18:19',
                'updated_at' => '2024-01-18 22:18:19',
            ),
            260 => 
            array (
                'id' => 261,
                'reason' => 'PERSONAL INTEREST AND PLAN',
                'is_seened' => 0,
                'qualifier_id' => 8525,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:18:32',
                'updated_at' => '2024-01-18 22:18:32',
            ),
            261 => 
            array (
                'id' => 262,
                'reason' => 'ALREADY AVAILED OWWA EDSP ',
                'is_seened' => 0,
                'qualifier_id' => 8581,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:19:18',
                'updated_at' => '2024-01-18 22:19:18',
            ),
            262 => 
            array (
                'id' => 263,
            'reason' => 'CHOSE A NON-PRIORITY COURSE OF DOST (BS NURSING)',
                'is_seened' => 0,
                'qualifier_id' => 8621,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:19:53',
                'updated_at' => '2024-01-18 22:19:53',
            ),
            263 => 
            array (
                'id' => 264,
                'reason' => 'RECEIVED ANOTHER OFFER',
                'is_seened' => 0,
                'qualifier_id' => 8645,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:20:18',
                'updated_at' => '2024-01-18 22:20:18',
            ),
            264 => 
            array (
                'id' => 265,
                'reason' => 'I WILL BE AVAILING THE CHED MERIT SCHOLARSHIP SINCE BS ACCOUNTANCY IS INCLUDED IN THEIR LIST OF PRIORITY PROGRAM.',
                'is_seened' => 0,
                'qualifier_id' => 8729,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:21:31',
                'updated_at' => '2024-01-18 22:21:31',
            ),
            265 => 
            array (
                'id' => 266,
                'reason' => 'PERSONAL REASONS',
                'is_seened' => 0,
                'qualifier_id' => 8737,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:21:38',
                'updated_at' => '2024-01-18 22:21:38',
            ),
            266 => 
            array (
                'id' => 267,
                'reason' => 'My course is BS Nursing and it was not in the priority course of the DOST Scholarship',
                'is_seened' => 0,
                'qualifier_id' => 8752,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:21:53',
                'updated_at' => '2024-01-18 22:21:53',
            ),
            267 => 
            array (
                'id' => 268,
                'reason' => 'ENROLLE IN A NON-PRIORITY DEGREE PROGRAM',
                'is_seened' => 0,
                'qualifier_id' => 8756,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:21:56',
                'updated_at' => '2024-01-18 22:21:56',
            ),
            268 => 
            array (
                'id' => 269,
                'reason' => 'CHOSEN COURSE IS NOT INCLUDED IN DOST SEI\'S PRIORITY PROGRAMS',
                'is_seened' => 0,
                'qualifier_id' => 8786,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:22:21',
                'updated_at' => '2024-01-18 22:22:21',
            ),
            269 => 
            array (
                'id' => 270,
                'reason' => 'MY PROGRAM, BSOT, IS NOT INCLUDED ON THE LIST OF PRIORITY PROGRAMS.',
                'is_seened' => 0,
                'qualifier_id' => 8873,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:23:43',
                'updated_at' => '2024-01-18 22:23:43',
            ),
            270 => 
            array (
                'id' => 271,
                'reason' => 'CHOSEN DEGREE IS NOT UNDER DOST SCHOLARSHIP AT UDD',
                'is_seened' => 0,
                'qualifier_id' => 8881,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:23:50',
                'updated_at' => '2024-01-18 22:23:50',
            ),
            271 => 
            array (
                'id' => 272,
                'reason' => 'ENROLLED IN BS PHYSICAL THERAPY IN PLM WHICH IS NOT A PRIORITY COURSE',
                'is_seened' => 0,
                'qualifier_id' => 8916,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:24:19',
                'updated_at' => '2024-01-18 22:24:19',
            ),
            272 => 
            array (
                'id' => 273,
                'reason' => 'ENROLLED IN NON-PRIORITY UNIVERSITY',
                'is_seened' => 0,
                'qualifier_id' => 8952,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:24:51',
                'updated_at' => '2024-01-18 22:24:51',
            ),
            273 => 
            array (
                'id' => 274,
                'reason' => 'STUDY ABROAD ',
                'is_seened' => 0,
                'qualifier_id' => 9002,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:25:39',
                'updated_at' => '2024-01-18 22:25:39',
            ),
            274 => 
            array (
                'id' => 275,
                'reason' => 'MY FAMILY AND I CAREFULLY CONSIDERED WHAT I SHOULD STUDY IN COLLEGE AND WE DECIDED THAT IT IS BETTER FOR ME TO STUDY ANOTHER COURSE THAT IS NOT INCLUDED IN DOST\'S PROGRAM AS IT IS MORE CONVEN',
                'is_seened' => 0,
                'qualifier_id' => 9065,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:26:33',
                'updated_at' => '2024-01-18 22:26:33',
            ),
            275 => 
            array (
                'id' => 276,
                'reason' => 'UNIVERSITY IS NOT ACCREDITED.',
                'is_seened' => 0,
                'qualifier_id' => 9135,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:27:38',
                'updated_at' => '2024-01-18 22:27:38',
            ),
            276 => 
            array (
                'id' => 277,
                'reason' => 'THE SCHOOL THAT I INTENDED TO ENROLL IN GAVE A COURSE THAT IS NOT ALIGNED WITH THE PRIORITY COURSED OF DOST-SEI SCHOLARSHIS',
                'is_seened' => 0,
                'qualifier_id' => 9145,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:27:47',
                'updated_at' => '2024-01-18 22:27:47',
            ),
            277 => 
            array (
                'id' => 278,
                'reason' => 'THE COURSE TAKEN IS NOT IN THE PRIORITY OF COURSES ',
                'is_seened' => 0,
                'qualifier_id' => 9194,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:28:29',
                'updated_at' => '2024-01-18 22:28:29',
            ),
            278 => 
            array (
                'id' => 279,
            'reason' => 'AVAILMENT OF OTHER GOVERNMENT SCHOLARSHIP (CHED)',
                'is_seened' => 0,
                'qualifier_id' => 9262,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:29:31',
                'updated_at' => '2024-01-18 22:29:31',
            ),
            279 => 
            array (
                'id' => 280,
            'reason' => 'NOT ACCREDITED UNIVERSITY (BSMLS-OLFU-AC)',
                'is_seened' => 0,
                'qualifier_id' => 9290,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:29:55',
                'updated_at' => '2024-01-18 22:29:55',
            ),
            280 => 
            array (
                'id' => 281,
                'reason' => 'NON-PRIORITY COURSE',
                'is_seened' => 0,
                'qualifier_id' => 9298,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:30:01',
                'updated_at' => '2024-01-18 22:30:01',
            ),
            281 => 
            array (
                'id' => 282,
                'reason' => 'WILL ACCEPT PRIVATE SCHOLARSHIP',
                'is_seened' => 0,
                'qualifier_id' => 9311,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:30:12',
                'updated_at' => '2024-01-18 22:30:12',
            ),
            282 => 
            array (
                'id' => 283,
                'reason' => 'INELIGIBLE FOR CURRENT COURSE',
                'is_seened' => 0,
                'qualifier_id' => 9366,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:31:02',
                'updated_at' => '2024-01-18 22:31:02',
            ),
            283 => 
            array (
                'id' => 284,
                'reason' => 'ANOTHER SCHOLARSHIP',
                'is_seened' => 0,
                'qualifier_id' => 9367,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:31:02',
                'updated_at' => '2024-01-18 22:31:02',
            ),
            284 => 
            array (
                'id' => 285,
                'reason' => 'SM SCHOLARSHIP GRANTEE',
                'is_seened' => 0,
                'qualifier_id' => 9391,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:31:24',
                'updated_at' => '2024-01-18 22:31:24',
            ),
            285 => 
            array (
                'id' => 286,
            'reason' => 'THE DEGREE PROGRAM THAT I ENROLLED IN (BS NURSING) IS NOT A PRIORITY PROGRAM OF THE DOST SCHOLARSHIP. ',
                'is_seened' => 0,
                'qualifier_id' => 9458,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:32:28',
                'updated_at' => '2024-01-18 22:32:28',
            ),
            286 => 
            array (
                'id' => 287,
                'reason' => 'SCHOOL IS NOT ACCREDITED AND NOT ON THE PRIORITY COURSE ',
                'is_seened' => 0,
                'qualifier_id' => 9463,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:32:32',
                'updated_at' => '2024-01-18 22:32:32',
            ),
            287 => 
            array (
                'id' => 288,
                'reason' => 'COURSE NOT UNDER THE PRIORITY COURSESS. I\'LL BEBE TAKING BS NURSING FOR COLLEGE ',
                'is_seened' => 0,
                'qualifier_id' => 9482,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:32:53',
                'updated_at' => '2024-01-18 22:32:53',
            ),
            288 => 
            array (
                'id' => 289,
                'reason' => 'THE PRIORITY COURSES FOR THE SCHOLARSHIP DOES NOT INCLUDE MY CHOSEN COURSE',
                'is_seened' => 0,
                'qualifier_id' => 9506,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:33:14',
                'updated_at' => '2024-01-18 22:33:14',
            ),
            289 => 
            array (
                'id' => 290,
            'reason' => 'MY ENROLLED COURSE IS NOT PART OF THE PRIORITY PROGRAMS (BS PHYSICAL THERAPY). I HUMBLY REQUEST FOR A RECONSIDERATION.',
                'is_seened' => 0,
                'qualifier_id' => 9526,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:33:32',
                'updated_at' => '2024-01-18 22:33:32',
            ),
            290 => 
            array (
                'id' => 291,
                'reason' => 'COURSE IS NOT A PRIORITY COURSE',
                'is_seened' => 0,
                'qualifier_id' => 9537,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:33:41',
                'updated_at' => '2024-01-18 22:33:41',
            ),
            291 => 
            array (
                'id' => 292,
                'reason' => 'ENROLLED IN A COURSE THAT IS NOT PART OF DOST\'S PRIORITY COURSES',
                'is_seened' => 0,
                'qualifier_id' => 9582,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:34:19',
                'updated_at' => '2024-01-18 22:34:19',
            ),
            292 => 
            array (
                'id' => 293,
                'reason' => 'MY COURSE, BS DATA SCIENCE, IS NOT A PRIORITY PROGRAM OF THE DOST-SEI.',
                'is_seened' => 0,
                'qualifier_id' => 9598,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:34:34',
                'updated_at' => '2024-01-18 22:34:34',
            ),
            293 => 
            array (
                'id' => 294,
                'reason' => 'I PASSED THE SCHOLARSHIP EXAM OF A SCHOOL WHICH OFFERS A FULL TUITION AND I WILL TAKE THE COURSE BS NURSING.',
                'is_seened' => 0,
                'qualifier_id' => 9643,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:35:11',
                'updated_at' => '2024-01-18 22:35:11',
            ),
            294 => 
            array (
                'id' => 295,
                'reason' => 'THE COURSE I HAVE CHOSEN IS NOT IN THE PRIORITY LIST FOR THE SCHOOL I HAVE CHOSEN',
                'is_seened' => 0,
                'qualifier_id' => 9672,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:35:35',
                'updated_at' => '2024-01-18 22:35:35',
            ),
            295 => 
            array (
                'id' => 296,
                'reason' => 'THE UNIVERSITY I ENROLLED IN ISNT ACCREDITED',
                'is_seened' => 0,
                'qualifier_id' => 9677,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:35:39',
                'updated_at' => '2024-01-18 22:35:39',
            ),
            296 => 
            array (
                'id' => 297,
                'reason' => 'THE COLLEGE I WILL BE ENROLLING IN IS NOT ACCREDITED BY DOST AND HAS NOT REACHD THE MINIMUM STANDARD TO BE ELIGIBLE FOR THE DOST SCHOLASRHIP',
                'is_seened' => 0,
                'qualifier_id' => 9717,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:36:13',
                'updated_at' => '2024-01-18 22:36:13',
            ),
            297 => 
            array (
                'id' => 298,
                'reason' => 'I AM TAKING BS ACCOUNTANCY IN COLLEGE.',
                'is_seened' => 0,
                'qualifier_id' => 9725,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:36:21',
                'updated_at' => '2024-01-18 22:36:21',
            ),
            298 => 
            array (
                'id' => 299,
                'reason' => 'I CHOSE TO STUDY A BACHELOR OF ARTS COURSE.',
                'is_seened' => 0,
                'qualifier_id' => 9755,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:36:49',
                'updated_at' => '2024-01-18 22:36:49',
            ),
            299 => 
            array (
                'id' => 300,
                'reason' => 'SCHOOL IS NOT ACCREDITED ',
                'is_seened' => 0,
                'qualifier_id' => 9769,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:37:00',
                'updated_at' => '2024-01-18 22:37:00',
            ),
            300 => 
            array (
                'id' => 301,
                'reason' => 'CHOSE TO PURSUE A NON-PRIORITY S&T PROGRAM',
                'is_seened' => 0,
                'qualifier_id' => 9791,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:37:21',
                'updated_at' => '2024-01-18 22:37:21',
            ),
            301 => 
            array (
                'id' => 302,
                'reason' => 'ENROLLED TO A SCHOOL THAT IS NON-ACCREDITED BY DOST AND PURSUING A PROGRAM THAT ISN\'T UNDER THE SCHOLARSHIP',
                'is_seened' => 0,
                'qualifier_id' => 9818,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:37:46',
                'updated_at' => '2024-01-18 22:37:46',
            ),
            302 => 
            array (
                'id' => 303,
                'reason' => 'THE PRIORITY PROGRAM I ENROLLED IN IS NOT DOST-SEI APPROVED.',
                'is_seened' => 0,
                'qualifier_id' => 9851,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:38:18',
                'updated_at' => '2024-01-18 22:38:18',
            ),
            303 => 
            array (
                'id' => 304,
                'reason' => 'PURSUED A NON-DOST PRIORITY DEGREE COURSE',
                'is_seened' => 0,
                'qualifier_id' => 9853,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:38:20',
                'updated_at' => '2024-01-18 22:38:20',
            ),
            304 => 
            array (
                'id' => 305,
                'reason' => 'WE MAY NOT BE ABLE TO FULFILL THE CONTRACT REQUIREMENTS.',
                'is_seened' => 0,
                'qualifier_id' => 9884,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:38:48',
                'updated_at' => '2024-01-18 22:38:48',
            ),
            305 => 
            array (
                'id' => 306,
                'reason' => 'I ALREADY ENROLLED FOR THE PROGRAM OF BACHELOR OF SCIENCE IN NURSING IN OUR LOCAL UNIVERSITY, WHICH UNFORTUNATELY THE PROGRAM I\'VE CHOSEN WASN\'T IN THE PRIORITY LIST OF THE DOST-SEI SCHOLARSH',
                'is_seened' => 0,
                'qualifier_id' => 9901,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:39:01',
                'updated_at' => '2024-01-18 22:39:01',
            ),
            306 => 
            array (
                'id' => 307,
                'reason' => 'REGRETTABLY, I WON\'T BE ABLE TO AVAIL THE SCHOLARSHIP DUE TO THE UNIVERSITY I WILL BE ATTENDING NOT MEETING THE SCHOLARSHIP\'S CRITERIA FOR A STUDY PLACEMENT. ',
                'is_seened' => 0,
                'qualifier_id' => 9928,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:39:25',
                'updated_at' => '2024-01-18 22:39:25',
            ),
            307 => 
            array (
                'id' => 308,
            'reason' => 'MY COURSE (AVIATION ELECTRONICS TECHNOLOGY) IS NOT PRIORITIZED BY DOST. MOREOVER, THE SCHOOL I APPLIED TO (PHILSCA) IS NOT ACCREDITED BY DOST AS WELL.',
                'is_seened' => 0,
                'qualifier_id' => 10000,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:40:29',
                'updated_at' => '2024-01-18 22:40:29',
            ),
            308 => 
            array (
                'id' => 309,
                'reason' => 'CURRENTLY ENROLLED IN A PROGRAM NOT ACCREDITED BY DOST',
                'is_seened' => 0,
                'qualifier_id' => 10093,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:41:51',
                'updated_at' => '2024-01-18 22:41:51',
            ),
            309 => 
            array (
                'id' => 310,
            'reason' => 'CHOSEN COURSE (BS PHYSICAL THERAPY) NOT INCLUDED',
                'is_seened' => 0,
                'qualifier_id' => 10101,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:41:58',
                'updated_at' => '2024-01-18 22:41:58',
            ),
            310 => 
            array (
                'id' => 311,
                'reason' => 'NO AVAILABLE SCHOOL',
                'is_seened' => 0,
                'qualifier_id' => 10128,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:42:24',
                'updated_at' => '2024-01-18 22:42:24',
            ),
            311 => 
            array (
                'id' => 312,
                'reason' => 'I AM ENROLLED IN A NON-PRIORITY COURSE.',
                'is_seened' => 0,
                'qualifier_id' => 10139,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:42:36',
                'updated_at' => '2024-01-18 22:42:36',
            ),
            312 => 
            array (
                'id' => 313,
                'reason' => 'MY DESIRED COURSE AND SCHOOL WAS NOT INCLUDED IN THE LIST OF ACCREDITED COURSES AND SCHOOLS OF DOST AND I DID NOT LIKE THE ACCREDITED COURSES AVAILABLE',
                'is_seened' => 0,
                'qualifier_id' => 10148,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:42:43',
                'updated_at' => '2024-01-18 22:42:43',
            ),
            313 => 
            array (
                'id' => 314,
                'reason' => 'COURSE',
                'is_seened' => 0,
                'qualifier_id' => 10151,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:42:46',
                'updated_at' => '2024-01-18 22:42:46',
            ),
            314 => 
            array (
                'id' => 315,
                'reason' => 'COURSE IS NOT A DOST-PRIORITY',
                'is_seened' => 0,
                'qualifier_id' => 10189,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:43:19',
                'updated_at' => '2024-01-18 22:43:19',
            ),
            315 => 
            array (
                'id' => 316,
                'reason' => 'THERE ARE NO ACCREDITED SCHOOLS NEAR MY AREA THAT OFFER MY DESIRED COURSE WHICH IS MEDICAL TECHNOLOGY',
                'is_seened' => 0,
                'qualifier_id' => 10202,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:43:31',
                'updated_at' => '2024-01-18 22:43:31',
            ),
            316 => 
            array (
                'id' => 317,
                'reason' => 'I PASSED THE CTU-CCMC BS IN NURSING',
                'is_seened' => 0,
                'qualifier_id' => 10204,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:43:33',
                'updated_at' => '2024-01-18 22:43:33',
            ),
            317 => 
            array (
                'id' => 318,
                'reason' => 'THE COURSE THAT I AM ENROLLED IN IS NOT A PRIORITY COURSE',
                'is_seened' => 0,
                'qualifier_id' => 10248,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:44:10',
                'updated_at' => '2024-01-18 22:44:10',
            ),
            318 => 
            array (
                'id' => 319,
                'reason' => 'MY COURSE PREFERENCE IS NOT IN THE PRIORITY LIST',
                'is_seened' => 0,
                'qualifier_id' => 10257,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:44:19',
                'updated_at' => '2024-01-18 22:44:19',
            ),
            319 => 
            array (
                'id' => 320,
                'reason' => 'I\'M CURRENTLY ENROLLED IN A NON-ACCREDITED SCHOOL AND I\'M NOT PLANNING TO TRANSFER.',
                'is_seened' => 0,
                'qualifier_id' => 10290,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:44:50',
                'updated_at' => '2024-01-18 22:44:50',
            ),
            320 => 
            array (
                'id' => 321,
                'reason' => 'N/A',
                'is_seened' => 0,
                'qualifier_id' => 10306,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:45:03',
                'updated_at' => '2024-01-18 22:45:03',
            ),
            321 => 
            array (
                'id' => 322,
                'reason' => 'MY ENROLLED SCHOOL IS NOT ACCREDITED',
                'is_seened' => 0,
                'qualifier_id' => 10336,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:45:29',
                'updated_at' => '2024-01-18 22:45:29',
            ),
            322 => 
            array (
                'id' => 323,
                'reason' => 'I WASN\'T ABLE TO ENROLL THIS YEAR BECAUSE MY FAMILY CAN\'T AFFORD IT.',
                'is_seened' => 0,
                'qualifier_id' => 10346,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:45:37',
                'updated_at' => '2024-01-18 22:45:37',
            ),
            323 => 
            array (
                'id' => 324,
                'reason' => 'Conflict with the affiliation with the school currently enrolled',
                'is_seened' => 0,
                'qualifier_id' => 10370,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:46:01',
                'updated_at' => '2024-01-18 22:46:01',
            ),
            324 => 
            array (
                'id' => 325,
                'reason' => 'PERSONAL HEALTH REASONS',
                'is_seened' => 0,
                'qualifier_id' => 10385,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:46:12',
                'updated_at' => '2024-01-18 22:46:12',
            ),
            325 => 
            array (
                'id' => 326,
                'reason' => 'I AM QUALIFIED FOR BA PSYCHOLOGY, A COURSE THAT IS NOT PART OF THE S&T PRIORITY COURSES FOR FRESHMEN',
                'is_seened' => 0,
                'qualifier_id' => 10386,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:46:13',
                'updated_at' => '2024-01-18 22:46:13',
            ),
            326 => 
            array (
                'id' => 327,
                'reason' => 'DENTISTRY IS NOT PART OF THE PRIORITY COURSES',
                'is_seened' => 0,
                'qualifier_id' => 10404,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:46:28',
                'updated_at' => '2024-01-18 22:46:28',
            ),
            327 => 
            array (
                'id' => 328,
                'reason' => 'COURSE IS NOT INCLUDED IN THE PRIORITY PROGRAMS',
                'is_seened' => 0,
                'qualifier_id' => 10449,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:47:08',
                'updated_at' => '2024-01-18 22:47:08',
            ),
            328 => 
            array (
                'id' => 329,
            'reason' => 'MY CHOSEN COURSE (BACHELOR OF SCIENCE IN ACCOUNTANCY) WAS NOT PRIORITY FOR THE SCHOLARSHIP. ',
                'is_seened' => 0,
                'qualifier_id' => 10458,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:47:18',
                'updated_at' => '2024-01-18 22:47:18',
            ),
            329 => 
            array (
                'id' => 330,
                'reason' => 'ENVIRONMENTAL PLANNING IS NOT ONE OF THE PRIORITY COURSES',
                'is_seened' => 0,
                'qualifier_id' => 10462,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:47:23',
                'updated_at' => '2024-01-18 22:47:23',
            ),
            330 => 
            array (
                'id' => 331,
                'reason' => 'COURSE IS NOT A PRIORITY COURSE',
                'is_seened' => 0,
                'qualifier_id' => 10495,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:47:53',
                'updated_at' => '2024-01-18 22:47:53',
            ),
            331 => 
            array (
                'id' => 332,
                'reason' => 'THE DEGREE PROGRAM THAT I AM CURRENTLY TAKING IS NOT INCLUDED ON THE PRIORITY S&T PROGRAMS COVERED BY THE SCHOLARSHIP.',
                'is_seened' => 0,
                'qualifier_id' => 10555,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:48:48',
                'updated_at' => '2024-01-18 22:48:48',
            ),
            332 => 
            array (
                'id' => 333,
                'reason' => 'MY CHOSEN COURSE IS NOT A PRIORITY PROGRAM OF THE SCHOLARSHIP',
                'is_seened' => 0,
                'qualifier_id' => 10619,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:49:41',
                'updated_at' => '2024-01-18 22:49:41',
            ),
            333 => 
            array (
                'id' => 334,
                'reason' => 'MY PROGRAM IS NOT A PRIORITY PROGRAM',
                'is_seened' => 0,
                'qualifier_id' => 10627,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:49:48',
                'updated_at' => '2024-01-18 22:49:48',
            ),
            334 => 
            array (
                'id' => 335,
                'reason' => 'MY PROGRAM IS NOT INCLUDED IN THE PRIORITY COURSES.',
                'is_seened' => 0,
                'qualifier_id' => 10660,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:50:22',
                'updated_at' => '2024-01-18 22:50:22',
            ),
            335 => 
            array (
                'id' => 336,
                'reason' => 'MY CHOSEN COURSE IS UNDER BACHELOR OF ARTS.',
                'is_seened' => 0,
                'qualifier_id' => 10676,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:50:37',
                'updated_at' => '2024-01-18 22:50:37',
            ),
            336 => 
            array (
                'id' => 337,
                'reason' => 'DESIRED COURSE IS NOT INCLUDED IN THE LIST OF PRIORITY PROGRAMS',
                'is_seened' => 0,
                'qualifier_id' => 10684,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:50:44',
                'updated_at' => '2024-01-18 22:50:44',
            ),
            337 => 
            array (
                'id' => 338,
                'reason' => 'I WILL AVAIL A PRIVATE SCHOLARSHIP PROGRAM THAT DOES NOT ALLOW THE ACCEPTANCE OF DOST PROGRAM',
                'is_seened' => 0,
                'qualifier_id' => 10703,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:50:59',
                'updated_at' => '2024-01-18 22:50:59',
            ),
            338 => 
            array (
                'id' => 339,
                'reason' => 'AVAILING OWWA-EDSP SCHOLARSHIP AND UST IS NOT A DOST ACCREDITED INSTITUTION',
                'is_seened' => 0,
                'qualifier_id' => 10712,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:51:08',
                'updated_at' => '2024-01-18 22:51:08',
            ),
            339 => 
            array (
                'id' => 340,
                'reason' => 'I AM ENROLLED IN A NON-PRIORITY DEGREE PROGRAM',
                'is_seened' => 0,
                'qualifier_id' => 10733,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:51:26',
                'updated_at' => '2024-01-18 22:51:26',
            ),
            340 => 
            array (
                'id' => 341,
                'reason' => 'I\'M A CHED SCHOLAR.',
                'is_seened' => 0,
                'qualifier_id' => 10739,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:51:32',
                'updated_at' => '2024-01-18 22:51:32',
            ),
            341 => 
            array (
                'id' => 342,
                'reason' => 'NON-DOST PRIORITY COURSE',
                'is_seened' => 0,
                'qualifier_id' => 10750,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:51:42',
                'updated_at' => '2024-01-18 22:51:42',
            ),
            342 => 
            array (
                'id' => 343,
                'reason' => 'I WAS NOT QUALIFIED IN A PRIORITY COURSE OF DOST. ',
                'is_seened' => 0,
                'qualifier_id' => 10762,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:51:57',
                'updated_at' => '2024-01-18 22:51:57',
            ),
            343 => 
            array (
                'id' => 344,
                'reason' => 'SCHOOL IS NOT QUALIFIED FOR DOST SCHOLARSHIP',
                'is_seened' => 0,
                'qualifier_id' => 10842,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:53:06',
                'updated_at' => '2024-01-18 22:53:06',
            ),
            344 => 
            array (
                'id' => 345,
                'reason' => 'DESIRED COURSE IS NOT A PART OF THE DOST PRIORITY PROGRAMS: BACHELOR OF SCIENCE IN NURSING',
                'is_seened' => 0,
                'qualifier_id' => 10843,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:53:07',
                'updated_at' => '2024-01-18 22:53:07',
            ),
            345 => 
            array (
                'id' => 346,
                'reason' => 'I WAS NOT ABLE TO PASS A DOST PRIORITY PROGRAM',
                'is_seened' => 0,
                'qualifier_id' => 10853,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:53:15',
                'updated_at' => '2024-01-18 22:53:15',
            ),
            346 => 
            array (
                'id' => 347,
                'reason' => 'THE COURSE THAT I WILL BE TAKING IN COLLEGE IS NOT INCLUDED IN THE LIST OF PRIORITY COURSES.',
                'is_seened' => 0,
                'qualifier_id' => 10856,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:53:19',
                'updated_at' => '2024-01-18 22:53:19',
            ),
            347 => 
            array (
                'id' => 348,
                'reason' => 'MY COURSE IS NOT LISTED IN DOST’S PRIORITY COURSES LIST',
                'is_seened' => 0,
                'qualifier_id' => 10953,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:54:50',
                'updated_at' => '2024-01-18 22:54:50',
            ),
            348 => 
            array (
                'id' => 349,
                'reason' => 'I AM GOING TO TAKE A MAJOR THAT IS NOT PART OF THE LIST OF S&T PRIORITY COURSES.',
                'is_seened' => 0,
                'qualifier_id' => 10991,
                'user_id' => 1,
                'created_at' => '2024-01-18 22:55:25',
                'updated_at' => '2024-01-18 22:55:25',
            ),
        ));
        
        
    }
}