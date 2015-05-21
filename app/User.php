<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use LaravelBook\Ardent\Ardent as Ardent;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Ardent implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * Ardent validation rules
     */
    public static $rules = array(
      'username' => 'required|between:4,16',
      'email' => 'required|email',
      'password' => 'required|alpha_num|min:8|confirmed',
      'password_confirmation' => 'required|alpha_num|min:8',
    );

    /**
     * Purges redundant data like password confirmations.
     * @var boolean
     */
    public $autoPurgeRedundantAttributes = true;

    /**
     * Posts Relationship
     */
    public function posts()
    {
      return $this->hasMany('Post');
    }

}
