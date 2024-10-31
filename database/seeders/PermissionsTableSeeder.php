<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'profile_create',
            ],
            [
                'id'    => 18,
                'title' => 'profile_edit',
            ],
            [
                'id'    => 19,
                'title' => 'profile_show',
            ],
            [
                'id'    => 20,
                'title' => 'profile_delete',
            ],
            [
                'id'    => 21,
                'title' => 'profile_access',
            ],
            [
                'id'    => 22,
                'title' => 'master_access',
            ],
            [
                'id'    => 23,
                'title' => 'country_create',
            ],
            [
                'id'    => 24,
                'title' => 'country_edit',
            ],
            [
                'id'    => 25,
                'title' => 'country_show',
            ],
            [
                'id'    => 26,
                'title' => 'country_delete',
            ],
            [
                'id'    => 27,
                'title' => 'country_access',
            ],
            [
                'id'    => 28,
                'title' => 'news_create',
            ],
            [
                'id'    => 29,
                'title' => 'news_edit',
            ],
            [
                'id'    => 30,
                'title' => 'news_show',
            ],
            [
                'id'    => 31,
                'title' => 'news_delete',
            ],
            [
                'id'    => 32,
                'title' => 'news_access',
            ],
            [
                'id'    => 33,
                'title' => 'custom_data_create',
            ],
            [
                'id'    => 34,
                'title' => 'custom_data_edit',
            ],
            [
                'id'    => 35,
                'title' => 'custom_data_show',
            ],
            [
                'id'    => 36,
                'title' => 'custom_data_delete',
            ],
            [
                'id'    => 37,
                'title' => 'custom_data_access',
            ],
            [
                'id'    => 38,
                'title' => 'feedback_create',
            ],
            [
                'id'    => 39,
                'title' => 'feedback_edit',
            ],
            [
                'id'    => 40,
                'title' => 'feedback_show',
            ],
            [
                'id'    => 41,
                'title' => 'feedback_delete',
            ],
            [
                'id'    => 42,
                'title' => 'feedback_access',
            ],
            [
                'id'    => 43,
                'title' => 'games_section_access',
            ],
            [
                'id'    => 44,
                'title' => 'game_create',
            ],
            [
                'id'    => 45,
                'title' => 'game_edit',
            ],
            [
                'id'    => 46,
                'title' => 'game_show',
            ],
            [
                'id'    => 47,
                'title' => 'game_delete',
            ],
            [
                'id'    => 48,
                'title' => 'game_access',
            ],
            [
                'id'    => 49,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 50,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 51,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 52,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 53,
                'title' => 'game_session_create',
            ],
            [
                'id'    => 54,
                'title' => 'game_session_edit',
            ],
            [
                'id'    => 55,
                'title' => 'game_session_show',
            ],
            [
                'id'    => 56,
                'title' => 'game_session_delete',
            ],
            [
                'id'    => 57,
                'title' => 'game_session_access',
            ],
            [
                'id'    => 58,
                'title' => 'session_member_create',
            ],
            [
                'id'    => 59,
                'title' => 'session_member_edit',
            ],
            [
                'id'    => 60,
                'title' => 'session_member_show',
            ],
            [
                'id'    => 61,
                'title' => 'session_member_delete',
            ],
            [
                'id'    => 62,
                'title' => 'session_member_access',
            ],
            [
                'id'    => 63,
                'title' => 'color_create',
            ],
            [
                'id'    => 64,
                'title' => 'color_edit',
            ],
            [
                'id'    => 65,
                'title' => 'color_show',
            ],
            [
                'id'    => 66,
                'title' => 'color_delete',
            ],
            [
                'id'    => 67,
                'title' => 'color_access',
            ],
            [
                'id'    => 68,
                'title' => 'chat_create',
            ],
            [
                'id'    => 69,
                'title' => 'chat_edit',
            ],
            [
                'id'    => 70,
                'title' => 'chat_show',
            ],
            [
                'id'    => 71,
                'title' => 'chat_delete',
            ],
            [
                'id'    => 72,
                'title' => 'chat_access',
            ],
            [
                'id'    => 73,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 74,
                'title' => 'avatar_create',
            ],
            [
                'id'    => 75,
                'title' => 'avatar_edit',
            ],
            [
                'id'    => 76,
                'title' => 'avatar_show',
            ],
            [
                'id'    => 77,
                'title' => 'avatar_delete',
            ],
            [
                'id'    => 78,
                'title' => 'avatar_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
