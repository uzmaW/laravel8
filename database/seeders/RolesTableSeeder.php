<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('roles')->upsert([
            ['slug'=>'superadmin','name'=>'Super Admin'],
            ['slug'=>'admin','name'=>'Admin'],
            ['slug'=>'user','User'=>'User']
        ],['slug']
        );
		$perm1 = new Permission();
		$perm1->slug = 'create-users';
		$perm1->name = 'Create Users';
		$perm1->save();

        $perm2 = new Permission();
		$perm2->slug = 'edit-users';
		$perm2->name = 'Edit Users';
		$perm2->save();

        $perm3 = new Permission();
		$perm3->slug = 'create-pages';
		$perm3->name = 'Create Pages';
		$perm3->save();

        $perm4 = new Permission();
		$perm4->slug = 'edit-pages';
		$perm4->name = 'Edit Pages';
		$perm4->save();
		
		$super_role = Role::where('slug','superadmin')->first();
		$admin_role = Role::where('slug', 'admin')->first();
		$user_role  = Role::where('slug', 'user')->first();

	

       
        $perm1 = Permission::where('slug','create-users')->first();
        $perm1->roles()->attach($super_role);

		$perm2 = Permission::where('slug', 'edit-users')->first();
		$perm2->roles()->attach($super_role);

		$perm3 = Permission::where('slug','create-pages')->first();
        $perm3->roles()->attach($super_role);
		$perm3->roles()->attach($admin_role);
		$perm3->roles()->attach($user_role);
         

		$perm4 = Permission::where('slug', 'edit-pages')->first();
        $perm4->roles()->attach($super_role);
		$perm4->roles()->attach($admin_role);
		$perm4->roles()->attach($user_role);

        $superadmin = new User();
		$superadmin->name = 'Super Programmer';
		$superadmin->email = 'kodedsoft@gmail.com';
		$superadmin->password = bcrypt('hello123');
		$superadmin->type = 'superadmin';
		$superadmin->save();
		$superadmin->roles()->attach($super_role);
		$superadmin->permissions()->attach($perm1);

        $admin = new User();
		$admin->name = 'Programmer';
		$admin->email = 'kodedsoft+111@gmail.com';
		$admin->password = bcrypt('hello123');
		$admin->type = 'admin';
		$admin->save();
		$admin->roles()->attach($admin_role);
		$admin->permissions()->attach($perm3);
		$admin->permissions()->attach($perm4);

        $admin = new User();
		$admin->name = 'User';
		$admin->email = 'kodedsoft+222@gmail.com';
		$admin->password = bcrypt('hello123');
		$admin->type = 'user';
		$admin->save();
		$admin->roles()->attach($user_role);
		$admin->permissions()->attach($perm3);
		$admin->permissions()->attach($perm4);
    }
}
