<?php
namespace App\Classes;

use Auth;

class Role {

  private $role;

  public function __construct()
  {
    if (Auth::check()) {
      $this->role = Auth::user()->role->name;
    } else {
      $this->role = 'guest';
    }
  }



  // является ли текущий пользователь администратором
  public function admin()
  {
    return $this->role=='admin';
  }

  public function guest()
  {
    return $this->role=='guest';
  }

  public function user()
  {
    return $this->role=='user';
  }

  public function banned()
  {
    return $this->role=='banned';
  }

  public function check($self)
  {
    return $self->user->id == Auth::user()->id;
  }
  public function check_service($self)
  {
    return $self->author->id == Auth::user()->id;
  }
  public function check_account($self)
  {
    return $self->id == Auth::user()->id;
  }
}
