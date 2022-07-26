<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Registration;

class RegisterManagementController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth');
    }
    public function index()
    {
        $limit = 10;
        // ambil data pendaftaran
        $registrations = Registration::with('category') -> paginate($limit);

        $where =[];

        if (! empty(request()->get('keyword'))){
            $keyword = request()->get('keyword');
            $where[] = ['nama', 'LIKE', "%{$keyword}%"];
        
        }
        if(! empty(request()->get('category_id'))){
            $categoryID = request()->get('category_id');
            $where['category_id'] = $categoryID;
        }
        if(count($where)>0){
            $registrations = Registration::with('category')
            ->where('nama','LIKE', "%{$keyword}%")
            ->paginate($limit);
        }
        $categories = Category::all();
        // tampilkan view
        // echo json_encode('registration'); unutk menampilkan data 
        return view('management.pendaftaran.index', compact('registrations', 'limit', 'categories'));
    }
}
