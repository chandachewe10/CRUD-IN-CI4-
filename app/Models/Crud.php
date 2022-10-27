<?php
namespace App\Models;

use CodeIgniter\Model;

class Crud extends Model
{

protected $table = 'users';

protected $allowedFields = ['name', 'email'];
protected $primaryKey = 'id';

}