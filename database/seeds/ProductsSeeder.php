<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
           'name' => 'Samsung Galaxy S9',
           'desc' => 'A brand new, sealed Lilac Purple Verizon Global Unlocked Galaxy S9 by Samsung. This is an upgrade. Clean ESN and activation ready.',
           'upload_id' => 1,
           'price' => 698.88,
           'parent_id' => 1,
           'category_id' => 1
        ]);
 
        DB::table('products')->insert([
            'name' => 'Apple iPhone X',
            'desc' => 'GSM & CDMA FACTORY UNLOCKED! WORKS WORLDWIDE! FACTORY UNLOCKED. iPhone x 64gb. iPhone 8 64gb. iPhone 8 64gb. iPhone X with iOS 11.',
            'upload_id' => 1,
            'price' => 983.00,
            'parent_id' => 1,
            'category_id' => 1
        ]);
 
        DB::table('products')->insert([
            'name' => 'Google Pixel 2 XL',
            'desc' => 'New condition • No returns, but backed by eBay Money back guarantee',
            'upload_id' => 1,
            'price' => 675.00,
            'parent_id' => 1,
            'category_id' => 1
        ]);
 
        DB::table('products')->insert([
            'name' => 'LG V10 H900',
            'desc' => 'NETWORK Technology GSM. Protection Corning Gorilla Glass 4. MISC Colors Space Black, Luxe White, Modern Beige, Ocean Blue, Opal Blue. SAR EU 0.59 W/kg (head).',
            'upload_id' => 1,
            'price' => 159.99,
            'parent_id' => 1,
            'category_id' => 1
        ]);
 
        DB::table('products')->insert([
            'name' => 'Huawei Elate',
            'desc' => 'Cricket Wireless - Huawei Elate. New Sealed Huawei Elate Smartphone.',
            'upload_id' => 1,
            'price' => 68.00,
            'parent_id' => 1,
            'category_id' => 1
        ]);
 
        DB::table('products')->insert([
            'name' => 'HTC One M10',
            'desc' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
            'upload_id' => 1,
            'price' => 129.99,
            'parent_id' => 1,
            'category_id' => 1
        ]);
    }
}
