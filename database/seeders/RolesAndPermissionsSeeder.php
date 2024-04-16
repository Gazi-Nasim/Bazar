<?php
namespace Database\Seeders;

use App\Models\Upazilla;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'রোল তৈরী','groups'=>'রোল']);
        Permission::create(['name' => 'রোল মুছে ফেলা','groups'=>'রোল']);
        Permission::create(['name' => 'রোল হালনাগাদ','groups'=>'রোল']);
        Permission::create(['name' => 'রোল দেখা','groups'=>'রোল']);

        Permission::create(['name' => 'বাজার তৈরী','groups'=>'বাজার']);
        Permission::create(['name' => 'বাজার মুছে ফেলা','groups'=>'বাজার']);
        Permission::create(['name' => 'বাজার হালনাগাদ','groups'=>'বাজার']);
        Permission::create(['name' => 'বাজার দেখা','groups'=>'বাজার']);

        Permission::create(['name' => 'ব্যবহারকারী তৈরী','groups'=>'ব্যবহারকারী']);
        Permission::create(['name' => 'ব্যবহারকারী মুছে ফেলা','groups'=>'ব্যবহারকারী']);
        Permission::create(['name' => 'ব্যবহারকারী হালনাগাদ','groups'=>'ব্যবহারকারী']);
        Permission::create(['name' => 'ব্যবহারকারী দেখা','groups'=>'ব্যবহারকারী']);

        Permission::create(['name' => 'আবেদন করা','groups'=>'আবেদনপত্র']);
        Permission::create(['name' => 'আবেদনপত্র হালনাগাদ','groups'=>'আবেদনপত্র']);
        Permission::create(['name' => 'আবেদনপত্র মুছে ফেলা','groups'=>'আবেদনপত্র']);
        Permission::create(['name' => 'আবেদনপত্র দেখা','groups'=>'আবেদনপত্র']);
        Permission::create(['name' => 'আবেদনপত্র নথিতে উপস্থাপন','groups'=>'আবেদনপত্র']);
        Permission::create(['name' => 'পরিদর্শন প্রতিবেদন প্রদান','groups'=>'আবেদনপত্র']);
        Permission::create(['name' => 'নোটিশ প্রকাশ করা','groups'=>'আবেদনপত্র']);
        Permission::create(['name' => 'জমা স্লিপ আপলোড','groups'=>'আবেদনপত্র']);

        $applicant=Role::create(['name' => 'আবেদনকারী'])
            ->givePermissionTo([
                'আবেদন করা',
                'আবেদনপত্র হালনাগাদ',
                'আবেদনপত্র মুছে ফেলা',
                'আবেদনপত্র দেখা',
                'জমা স্লিপ আপলোড'
            ]);
        $bench=Role::create(['name' => 'বেঞ্চ সহকারী'])
            ->givePermissionTo([
                'আবেদনপত্র দেখা',
                'আবেদনপত্র নথিতে উপস্থাপন',
                'আবেদনপত্র হালনাগাদ',
                'নোটিশ প্রকাশ করা',
                'রোল দেখা'
            ]);
        $surveyor=Role::create(['name' => 'সার্ভেয়ার'])
            ->givePermissionTo([
                'পরিদর্শন প্রতিবেদন প্রদান',
                'আবেদনপত্র দেখা',
            ]);
        $chowdhuri=Role::create(['name' => 'বাজার চৌধুরী'])
            ->givePermissionTo([
                'পরিদর্শন প্রতিবেদন প্রদান',
                'আবেদনপত্র দেখা',
            ]);
        $super=Role::create(['name' => 'Super Admin'])->givePermissionTo(Permission::all());
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'super@email.com',
            'phone'=>'01735254295',
            'password'=>Hash::make('123456'),
            'type'=>'admin'
        ])->assignRole($super);

        User::factory()->create([
            'name' => 'Bench Assistant',
            'email' => 'bench@email.com',
            'phone'=>'01735254296',
            'password'=>Hash::make('123456'),
            'type'=>'admin'
        ])->assignRole($bench);

        User::factory()->create([
            'name' => 'Surveyor',
            'email' => 'servey@email.com',
            'phone'=>'01735254297',
            'password'=>Hash::make('123456'),
            'type'=>'admin'
        ])->assignRole($surveyor);

        User::factory()->create([
            'name' => 'Chowdhuri',
            'email' => 'chowdhuri@email.com',
            'phone'=>'01735254298',
            'password'=>Hash::make('123456'),
            'type'=>'admin'
        ])->assignRole($chowdhuri);

        Upazilla::insert(
            [
                ['name'=>'খাগড়াছড়ি সদর'],
                ['name'=>'দীঘিনালা'],
                ['name'=>'মহালছড়ি'],
                ['name'=>'পানছড়ি'],
                ['name'=>'মাটিরাঙ্গা'],
                ['name'=>'মানিকছড়ি'],
                ['name'=>'লক্ষীছড়ি'],
                ['name'=>'রামগড়'],
                ['name'=>'গু্ইমারা']
            ]
        );
    }
}