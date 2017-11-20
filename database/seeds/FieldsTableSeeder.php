<?php

use Illuminate\Database\Seeder;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('fields')->insert([
        //     'name' => 'White Blood Cell (WBC)',
        //     'unit' => 'K/mcL',
        //     'normal' => '6.9',
        //     'test_id' => 1
        // ]);

        DB::table('fields')->insert([
            'name' => 'White Blood Cell (WBC)',
            'unit' => 'K/mcL',
            'normal' => '6.9',
        'abnormal' => '',
        'ref_range' => '4.8-10.8',
            'test_id' => 1
        ]);

DB::table('fields')->insert([
            'name' => 'Red Blood Cell (RBC)',
            'unit' => 'M/mcL',
            'normal' => '',
        'abnormal' => '1.8',
        'ref_range' => '4.7-6.1',
            'test_id' => 1
        ]);

DB::table('fields')->insert([
            'name' => 'Hemoglobin (HB/Hgb)',
            'unit' => 'g/dL',
            'normal' => '',
        'abnormal' => '6.5',
        'ref_range' => '14.0-18.0',
            'test_id' => 1
        ]);

DB::table('fields')->insert([
            'name' => 'Hematocrit (HCT)',
            'unit' => '%',
            'normal' => '',
        'abnormal' => '19.5',
        'ref_range' => '42-52',
            'test_id' => 1
        ]);

DB::table('fields')->insert([
            'name' => 'Mean Cell Volume (MCV)',
            'unit' => 'fL',
            'normal' => '',
        'abnormal' => '109.6',
        'ref_range' => '80-100',
            'test_id' => 1
        ]);

DB::table('fields')->insert([
            'name' => 'Mean Cell Hemoglobin (MCH)',
            'unit' => 'pg',
            'normal' => '',
        'abnormal' => '36.5',
        'ref_range' => '27.0-32.0',
            'test_id' => 1
        ]);

DB::table('fields')->insert([
            'name' => 'Mean Cell Hb Conc (MCHC)',
            'unit' => 'g/dL',
            'normal' => '33.3',
        'abnormal' => '',
        'ref_range' => '32.0-36.0',
            'test_id' => 1
        ]);

DB::table('fields')->insert([
            'name' => 'Red Cell Dist Width (RDW)',
            'unit' => '%',
            'normal' => '',
        'abnormal' => '16.0',
        'ref_range' => '11.5-14.5',
            'test_id' => 1
        ]);

DB::table('fields')->insert([
            'name' => 'Platelet count',
            'unit' => 'K/mcL',
            'normal' => '180',
        'abnormal' => '',
        'ref_range' => '150-450',
            'test_id' => 1
        ]);

DB::table('fields')->insert([
            'name' => 'Mean Platelet Volume',
            'unit' => 'fL',
            'normal' => '7.9',
        'abnormal' => '',
        'ref_range' => '7.5-11.0',
            'test_id' => 1
        ]);

DB::table('fields')->insert([
            'name' => 'Neutrophil (Neut)',
            'unit' => '%',
            'normal' => '50',
        'abnormal' => '',
        'ref_range' => '33-73',
            'test_id' => 2
        ]);

DB::table('fields')->insert([
            'name' => 'Lymphocyte (Lymph)',
            'unit' => '%',
            'normal' => '36',
        'abnormal' => '',
        'ref_range' => '13-52',
            'test_id' => 2
        ]);

DB::table('fields')->insert([
            'name' => 'Monocyte (Mono)',
            'unit' => '%',
            'normal' => '8',
        'abnormal' => '',
        'ref_range' => '0-10',
            'test_id' => 2
        ]);

DB::table('fields')->insert([
            'name' => 'Eosinophil (Eos)',
            'unit' => '%',
            'normal' => '5',
        'abnormal' => '',
        'ref_range' => '0-5',
            'test_id' => 2
        ]);

DB::table('fields')->insert([
            'name' => 'Basophil (Baso)',
            'unit' => '%',
            'normal' => '1',
        'abnormal' => '',
        'ref_range' => '0-2',
            'test_id' => 2
        ]);

DB::table('fields')->insert([
            'name' => 'Neutrophil, Absolute',
            'unit' => 'K/mcl',
            'normal' => '3.5',
        'abnormal' => '',
        'ref_range' => '1.8-7.8',
            'test_id' => 2
        ]);

DB::table('fields')->insert([
            'name' => 'Lymphocyte, Absolute',
            'unit' => 'K/mcl',
            'normal' => '2.5',
        'abnormal' => '',
        'ref_range' => '1.0-4.8',
            'test_id' => 2
        ]);

DB::table('fields')->insert([
            'name' => 'Monocyte, Absolute',
            'unit' => 'K/mcl',
            'normal' => '0.6',
        'abnormal' => '',
        'ref_range' => '0-0.8',
            'test_id' => 2
        ]);

DB::table('fields')->insert([
            'name' => 'Eosinophil, Absolute',
            'unit' => 'K/mcl',
            'normal' => '0.4',
        'abnormal' => '',
        'ref_range' => '0-0.45',
            'test_id' => 2
        ]);

DB::table('fields')->insert([
            'name' => 'Basophil, Absolute',
            'unit' => 'K/mcl',
            'normal' => '0.1',
        'abnormal' => '',
        'ref_range' => '0-0.2',
            'test_id' => 2
        ]);
DB::table('fields')->insert([
            'name' => 'CREATININE',
            'unit' => 'mg/dl',
            'normal' => '',
        'abnormal' => '',
        'ref_range' => '35-225',
            'test_id' => 3
        ]);
DB::table('fields')->insert([
            'name' => 'URINE COLOR',
            'unit' => '',
            'normal' => 'Pale to dark yellow',
        'abnormal' => 'Red : Blood in urine Orange : Drugs in urine Dark orange to brown : Jaundice, Gilbert syndrome (excess of Conjugated bilirubin) Pink : Consumption of beet Green : Consumption of Asparagus',
        'ref_range' => '',
            'test_id' => 4
        ]);

DB::table('fields')->insert([
            'name' => 'ODOR',
            'unit' => '',
            'normal' => 'Slightly NUTTY Odor',
        'abnormal' => 'Sweet fruity odor : Uncontrolled diabetes
Bad odor : Urinary tract infection
Maple Syrup like odor : Maple Syrup urine disease',
        'ref_range' => '',
            'test_id' => 4
        ]);

DB::table('fields')->insert([
            'name' => 'CLARITY',
            'unit' => '',
            'normal' => 'Clear / Transparent',
        'abnormal' => 'Turbid',
        'ref_range' => '',
            'test_id' => 4
        ]);

DB::table('fields')->insert([
            'name' => 'SPECIFIC GRAVITY',
            'unit' => '',
            'normal' => '1.005-1.030',
        'abnormal' => 'Very high Value : 1.031 or up
Very Low Value : 1.004 or below',
        'ref_range' => '',
            'test_id' => 4
        ]);

DB::table('fields')->insert([
            'name' => 'pH',
            'unit' => '',
            'normal' => '4.6-8',
        'abnormal' => 'Basic urine : <4.5 Acidic urine : >8',
        'ref_range' => '',
            'test_id' => 4
        ]);

DB::table('fields')->insert([
            'name' => 'PROTEINS',
            'unit' => '',
            'normal' => 'No PROTEINS',
        'abnormal' => 'Protein in the urine may mean kidney damage, an infection, cancer, high blood pressure, diabetes, systemic lupus erythematosus (SLE) is present.',
        'ref_range' => '',
            'test_id' => 4
        ]);

DB::table('fields')->insert([
            'name' => 'GLUCOSE',
            'unit' => '',
            'normal' => 'No glucose; Except in pregnancy',
        'abnormal' => 'Too much glucose in the urine may be caused by uncontrolled diabetes, an adrenal gland problem, liver damage, brain injury.',
        'ref_range' => '',
            'test_id' => 4
        ]);

DB::table('fields')->insert([
            'name' => 'NITRITES',
            'unit' => '',
            'normal' => 'No Nitrites',
        'abnormal' => 'Nitrites presents means presence of bacteria',
        'ref_range' => '',
            'test_id' => 4
        ]);

DB::table('fields')->insert([
            'name' => 'KETONES',
            'unit' => '',
            'normal' => 'No Ketones',
        'abnormal' => 'Ketones in the urine can mean uncontrolled diabetes, alcoholism',
        'ref_range' => '',
            'test_id' => 4
        ]);

DB::table('fields')->insert([
            'name' => 'Red cells',
            'unit' => '',
            'normal' => 'None',
        'abnormal' => 'Present',
        'ref_range' => '',
            'test_id' => 5
        ]);

DB::table('fields')->insert([
            'name' => 'White blood cells',
            'unit' => '',
            'normal' => 'None',
        'abnormal' => 'Present',
        'ref_range' => '',
            'test_id' => 5
        ]);

DB::table('fields')->insert([
            'name' => 'Casts',
            'unit' => '',
            'normal' => 'None',
        'abnormal' => 'Present',
        'ref_range' => '',
            'test_id' => 5
        ]);

DB::table('fields')->insert([
            'name' => 'Bacteria / yeasts / Squamous cells',
            'unit' => '',
            'normal' => 'None',
        'abnormal' => 'Present',
        'ref_range' => '',
            'test_id' => 5
        ]);

DB::table('fields')->insert([
            'name' => 'Crystals',
            'unit' => '',
            'normal' => 'None - very few',
        'abnormal' => 'Very High',
        'ref_range' => '',
            'test_id' => 5
        ]);





    }
}
