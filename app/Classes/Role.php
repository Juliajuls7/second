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
  {  if (Auth::check()) {
    return $self->user->id == Auth::user()->id;
      } else return 0;
  }
  public function check_service($self)
  {
    if (Auth::check()) {
    return $self->author->id == Auth::user()->id;
  } else return 0;
  }
  public function check_account($self)
  {
      if (Auth::check()) {
    return $self->id == Auth::user()->id;
      } else return 0;
  }
}
