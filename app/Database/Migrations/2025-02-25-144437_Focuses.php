<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Focuses extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'scope_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->forge->addForeignKey('scope_id', 'scopes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('focuses');
    }

    public function down()
    {
        $this->forge->dropTable('focuses');
    }
}
