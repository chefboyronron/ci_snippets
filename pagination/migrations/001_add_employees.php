<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_employees extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255'
                        ),
                        'age' => array(
                                'type' => 'INT',
                                'constraint' => 11
                        ),
                        'timestamp' => array(
                                'type' => 'DATETIME'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $attributes = array('ENGINE' => 'InnoDB', 'CHARSET' => 'utf8', 'COLLATE' => 'utf8_unicode_ci');
                $this->dbforge->create_table('employees');

                $timestamp = date("Y-m-d H:i:s");
                $datas = [
                        array(
                                'name' => 'Ron',
                                'age' => '32',
                                'timestamp' => $timestamp
                        ),
                        array(
                                'name' => 'Kyle',
                                'age' => '11',
                                'timestamp' => $timestamp
                        ),
                        array(
                                'name' => 'Nikki',
                                'age' => '32',
                                'timestamp' => $timestamp
                        ),
                        array(
                                'name' => 'Ryle',
                                'age' => '1',
                                'timestamp' => $timestamp
                        )
                ];
                foreach( $datas as $data ) {
                        $this->db->insert('employees', $data);
                }
                

        }

        public function down()
        {
                $this->dbforge->drop_table('employees');
        }
}