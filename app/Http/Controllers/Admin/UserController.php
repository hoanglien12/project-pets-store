<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
	function __construct()
	{
	    $this->user = new User();
	}

	public function index()
	{
		$users		= User::all();
		// dd($users);
		return view('admin.user.index',compact('users'));
	}
}
