<?php
namespace App\DataSource\User;

use Atlas\Orm\Table\AbstractTable;

class UserTable extends AbstractTable
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function getColNames()
    {
        return ['id', 'email', 'password', 'name', 'last_name'];
    }

    /**
     * @inheritdoc
     */
    public function getCols()
    {
        return [
            'id' => (object) [
                'name' => 'id',
                'type' => 'integer',
                'size' => null,
                'scale' => null,
                'notnull' => false,
                'default' => null,
                'autoinc' => true,
                'primary' => true,
            ],
            'email' => (object) [
                'name' => 'email',
                'type' => 'varchar',
                'size' => 255,
                'scale' => null,
                'notnull' => true,
                'default' => null,
                'autoinc' => false,
                'primary' => false,
            ],
            'password' => (object) [
                'name' => 'password',
                'type' => 'varchar',
                'size' => 255,
                'scale' => null,
                'notnull' => false,
                'default' => null,
                'autoinc' => false,
                'primary' => false,
            ],
            'name' => (object) [
                'name' => 'name',
                'type' => 'varchar',
                'size' => 255,
                'scale' => null,
                'notnull' => false,
                'default' => null,
                'autoinc' => false,
                'primary' => false,
            ],
            'last_name' => (object) [
                'name' => 'last_name',
                'type' => 'varchar',
                'size' => 255,
                'scale' => null,
                'notnull' => false,
                'default' => null,
                'autoinc' => false,
                'primary' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function getPrimaryKey()
    {
        return ['id'];
    }

    /**
     * @inheritdoc
     */
    public function getAutoinc()
    {
        return 'id';
    }

    /**
     * @inheritdoc
     */
    public function getColDefaults()
    {
        return [
            'id' => null,
            'email' => null,
            'password' => null,
            'name' => null,
            'last_name' => null,
        ];
    }
}
