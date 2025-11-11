<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileStorageSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('file_storages')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('file_storages')->insert(
            array (
  0 => 
  array (
    'id' => 1,
    'code' => 's3',
    'name' => 'Amazon S3',
    'status' => 0,
    'parameters' => '{"access_key_id":"XXXXXXXXXX","secret_access_key":"XXXXXXXXXXXX","default_region":"blr1","bucket":"XXXXXXXXXXXX","url":"https:\\/\\/g2bulk.blr1.digitaloceanspaces.com","endpoint":"https:\\/\\/blr1.digitaloceanspaces.com"}',
    'created_at' => NULL,
    'updated_at' => '2025-03-09 07:33:06',
  ),
  1 => 
  array (
    'id' => 2,
    'code' => 'sftp',
    'name' => 'SFTP',
    'status' => 0,
    'parameters' => '{"sftp_username":"XXXXXXXXXXXXX","sftp_password":"XXXXXXXXXXXXX"}',
    'created_at' => NULL,
    'updated_at' => '2025-03-09 07:33:23',
  ),
  2 => 
  array (
    'id' => 3,
    'code' => 'do',
    'name' => 'Digitalocean Spaces',
    'status' => 0,
    'parameters' => '{"spaces_key":"XXXXXXXXXXXX","spaces_secret":"XXXXXXXXXXXXXXX","spaces_endpoint":"XXXXXXXXXXXX","spaces_region":"XXXXXXXXXXXXX","spaces_bucket":"assets-coral"}',
    'created_at' => NULL,
    'updated_at' => '2025-03-09 07:33:35',
  ),
  3 => 
  array (
    'id' => 4,
    'code' => 'ftp',
    'name' => 'FTP',
    'status' => 0,
    'parameters' => '{"ftp_host":"XXXXXXXXXX","ftp_username":"XXXXXXXXXXXXX","ftp_password":"XXXXXXXXXXXX"}',
    'created_at' => NULL,
    'updated_at' => '2025-03-09 07:33:44',
  ),
  4 => 
  array (
    'id' => 5,
    'code' => 'local',
    'name' => 'Local Storage',
    'status' => 1,
    'parameters' => NULL,
    'created_at' => NULL,
    'updated_at' => '2025-03-03 05:22:55',
  ),
)
        );
    }
}
