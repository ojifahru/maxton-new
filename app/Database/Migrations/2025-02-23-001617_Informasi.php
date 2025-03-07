<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Informasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => '',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => '',
            ],
            'website' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => '',
            ],
            'telepon1' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => '',
            ],
            'telepon2' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => '',
            ],
            // Media Sosial
            'facebook' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => '',
            ],
            'instagram' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => '',
            ],
            'twitter' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => '',
            ],
            'youtube' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => '',
            ],
            'linkedin' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => '',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('informasi');
    }

    public function down()
    {
        $this->forge->dropTable('informasi');
    }
}
