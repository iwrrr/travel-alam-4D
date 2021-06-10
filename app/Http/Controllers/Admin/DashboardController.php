<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->data['currentAdminMenu'] = 'dashboard';
        $this->data['currentAdminSubMenu'] = '';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('nama_depan', 'ASC')->paginate(5);

        $this->data['users'] = $users;

        return view('admin.dashboard.index', $this->data);
    }
}
