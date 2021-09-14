<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table      = 'tb_role';
    protected $primaryKey = 'role_sid';

    protected $returnType     = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['role_sid', 'role_name', 'role_admindashboard', 'role_adminairbaku', 'role_adminpendayagunaan', 'role_adminkonservasi', 'role_adminpengendalian', 'role_adminpengaturan'];

    protected $useTimestamps = true;
    protected $createdonField  = 'sys_createdon';
    protected $createdbyField  = 'sys_createdby';
    protected $updatedonField  = 'sys_modifiedon';
    protected $updatedbyField  = 'sys_modifiedby';
    protected $deletedField    = 'sys_deleted';

    protected $validationRules    = [
        'role_name'          => 'required|min_length[3]',
    ];

    protected $validationMessages = [
        'role_name'        => [
            'required' => 'Nama Hak Akses Harus di isi.',
            'min_length' => 'Minimal 3 Karakter'
        ]
    ];

    protected $skipValidation  = false;

    public function getData()
    {
        return 'Ini adalah Method getData didalam ProductModel';
    }
}
