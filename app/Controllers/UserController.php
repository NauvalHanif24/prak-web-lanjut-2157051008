<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\KelasModel; 

class UserController extends BaseController
{
    protected $helpers=['form'];
    public $userModel ;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
    }
    
    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
    }
    public function profile($nama="", $kelas="",$npm=""){
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm
        ];

        return view('profile',$data);
    }
    public function create() {

        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];
        // $kelas = [
        //     [
        //         'id' =>1,
        //         'nama_kelas' =>'A',
        //     ],
        //     [
        //         'id' =>2,
        //         'nama_kelas' =>'B',
        //     ],
        //     [
        //         'id' =>3,
        //         'nama_kelas' =>'C',
        //     ],
        //     [
        //         'id'=>4,
        //         'nama_kelas'=>'D'
        //     ],
        // ];
        // $data=[
        //     'kelas'=>$kelas
        // ];
        return view('create_user',$data);
    }
    
    public function store(){
        // $this->kelasModel = new KelasModel();
        if($this->request->getVar('kelas')!= ''){
            $kelas_select = $this->kelasModel->where('id', $this->request->getVar('kelas'))->first();
            $nama_kelas = $kelas_select['nama_kelas'];
        }else{
            $nama_kelas ='';
        }

        // $this->userModel = new UserModel();
        if (!$this->validate([
            'nama'  => 'required|is_unique[user.nama]',
            'npm'   => 'required|is_unique[user.npm]',
            'kelas' => 'required' 
        ])){
            session()->setFlashdata('nama_kelas');
            return redirect()->back()->withInput()->with('nama_kelas', $nama_kelas);
        }
        $path = 'assets/uploads/img/';

        $foto = $this->request->getFile('foto');

        $name = $foto->getRandomName();

        if ($foto->move($path, $name)) {
            $foto = base_url($path . $name);
         }   
        $this->userModel->saveUser([
            'nama' => $this->request->getVar('nama'), 
            'id_kelas' => $this->request->getVar('kelas'), 
            'npm' => $this->request->getVar('npm'),
            'foto' => $foto
        ]);
        $data=[
            'nama' => $this->request->getVar('nama'),
            'kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm'), 
        ];
        return redirect()->to('/user');
    }
    public function show($id) {
        $user = $this->userModel->getUser($id);

        $data = [
            'title' => 'profile',
            'user' => $user,
        ];

        return view('profile', $data);
    }

    public function edit($id) {
        $user = $this->userModel->getUser($id);
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas,
        ];

        return view('edit_user', $data);
    }

    public function update($id){
        $path = 'assets/upload/img';
        $foto = $this->request->getFile('foto');

        $data = [
            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm'),
        ];

        if ($foto->isValid()){
            $name = $foto->getRandomName();

            if ($foto->move($path, $name)){
                $foto_path = base_url($path . $name);

                $data['foto'] = $foto_path;
            }
        }

        $result = $this->userModel->updateUser($data, $id);

        if(!$result){
            return redirect()->back()->withInput()
            ->with('error', 'Gagal menyimpan data');
        }

        return redirect()->to(base_url('/user'));
    }

    public function destroy($id){
        $result = $this->userModel->deleteUser($id);
        if (!$result) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
        return redirect()->to(base_url('/user'))
        ->with ('success', 'Berhasil menghapus data');

        
    }
    
}
