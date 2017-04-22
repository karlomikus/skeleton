<?php
namespace App\DataSource\User;

use Atlas\Orm\Mapper\AbstractMapper;

class UserMapper extends AbstractMapper
{
    /**
     * @inheritdoc
     */
    protected function setRelated()
    {
        // no related fields
    }
}
