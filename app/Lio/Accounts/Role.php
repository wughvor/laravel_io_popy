<?php namespace Lio\Accounts;

use Lio\Core\Entity;

class Role extends Entity
{
	protected $table = "roles";

	protected $fillable = ['name', 'description'];

	protected $validationRules = ['name' => 'required',];

	public function users()
	{
		$this->belongsToMany('Lio\Accounts\User');
	}
}