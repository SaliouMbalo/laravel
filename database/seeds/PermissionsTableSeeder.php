<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'agence_create',
            ],
            [
                'id'    => '18',
                'title' => 'agence_edit',
            ],
            [
                'id'    => '19',
                'title' => 'agence_show',
            ],
            [
                'id'    => '20',
                'title' => 'agence_delete',
            ],
            [
                'id'    => '21',
                'title' => 'agence_access',
            ],
            [
                'id'    => '22',
                'title' => 'affectation_create',
            ],
            [
                'id'    => '23',
                'title' => 'affectation_edit',
            ],
            [
                'id'    => '24',
                'title' => 'affectation_show',
            ],
            [
                'id'    => '25',
                'title' => 'affectation_delete',
            ],
            [
                'id'    => '26',
                'title' => 'affectation_access',
            ],
            [
                'id'    => '27',
                'title' => 'compte_create',
            ],
            [
                'id'    => '28',
                'title' => 'compte_edit',
            ],
            [
                'id'    => '29',
                'title' => 'compte_show',
            ],
            [
                'id'    => '30',
                'title' => 'compte_delete',
            ],
            [
                'id'    => '31',
                'title' => 'compte_access',
            ],
            [
                'id'    => '32',
                'title' => 'client_create',
            ],
            [
                'id'    => '33',
                'title' => 'client_edit',
            ],
            [
                'id'    => '34',
                'title' => 'client_show',
            ],
            [
                'id'    => '35',
                'title' => 'client_delete',
            ],
            [
                'id'    => '36',
                'title' => 'client_access',
            ],
            [
                'id'    => '37',
                'title' => 'operations_bancaire_access',
            ],
            [
                'id'    => '38',
                'title' => 'depot_create',
            ],
            [
                'id'    => '39',
                'title' => 'depot_edit',
            ],
            [
                'id'    => '40',
                'title' => 'depot_show',
            ],
            [
                'id'    => '41',
                'title' => 'depot_delete',
            ],
            [
                'id'    => '42',
                'title' => 'depot_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
