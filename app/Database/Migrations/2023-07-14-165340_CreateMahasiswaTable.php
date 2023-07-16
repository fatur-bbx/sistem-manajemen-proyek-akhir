<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMahasiswaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mahasiswa' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'program_studi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'angkatan' => [
                'type' => 'INT',
                'constraint' => 4,
            ],
            'kbk' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'dosen_pembimbing' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'dosen_penguji' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
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

        $this->forge->addPrimaryKey('id_mahasiswa');
        $this->forge->addForeignKey('dosen_pembimbing', 'pengguna', 'id_pengguna', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('dosen_penguji', 'pengguna', 'id_pengguna', 'CASCADE', 'CASCADE');
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa');
    }
}
