<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            ['username' => 'nguyenvku2k2', 'name' => 'Hoàng Nguyên', 'password' => 'hoangnguyen123', 'info'=> 'vdhnguyen.20it11@vku.udn.vn'],
            ['username' => 'hoangnguyenxyz', 'name' => 'Nguyên Võ', 'password' => 'hoangnguyen123', 'info'=> 'vhn.report@gmail.com'],
        ];
        foreach($customers as $customer){
            DB::table('customers')->insert($customer);
        }
    }
}
