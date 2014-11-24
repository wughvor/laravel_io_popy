<?php namespace Lio\Accounts;

use Carbon\Carbon;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\UserTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Lio\Core\Entity;
use McCool\LaravelAuthPresenter\PresentInterface;

class User extends Entity implements UserInterface, RemindableInterface, presentInterface
{
	use UserTrait, RemindableTrait, SoftDeletingTrait;

	const STATE_ACTIVE = 1;
	const STATE_BLOCKED = 2;

	protected $table = 'users';
	protected $hidden = ['github_id', 'email', 'remember_token'];
	protected $fillable = ['email', 'name', 'github_url', 'github_id', 'image_url', 'is_banned'];

	protected $validationRules = ['github_id' => 'unique:users, github_id, <id>',];

	private $rolesCache;

	// Articles
	public function articles()
	{
		return $this->hasMany('Lio\Articles\Article', 'author_id');
	}

	// Roles
	public function roles()
	{
		return $this->belongsToMany('Lio\Accounts\Role');
	}

	public function getRoles()
	{
		if(! isset($this->rolesCache))
		{
			$this->rolesCache = $this->roles;
		}

		return $this->rolesCache;
	}

	public function isForumAdmin()
	{
		return $this->hasRole(('manage_forum'));
	}

	public function setRolesAttribute($roles)
	{
		$this->roles()->sync((array) $roles);
	}

	public function hasRole($rolename)
	{
		return $this->hasRoles($roleName);
	}

	public function hasRoles($roleNames = [])
	{
		$roleList = \App::make('Lio\Accounts\RoleRepository')->getRoleList();

		foreach ((array) $roleNames as $allowedRole)
		{
			if(! in_array($allowedRole, $roleList))
			{
				throw new InvalidRoleException("Unidentified role: {$allowedRole}");
			}

			// validate that the user has the role
			if(!$this->roleCollectionHasRole($allowedRole))
			{
				return false;
			}
		}

		return true;
	}

	private function roleCollectionHasRole($allowedRole)
	{
		$roles = $this->getRoles();

		if(!$roles)
		{
			return false;
		}

		foreach($roles as $role)
		{
			if(strtolower($role->name) == strtolower($allowedRole))
			{
				return true;
			}
		}
		return false;
	}
}