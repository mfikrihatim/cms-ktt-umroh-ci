<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('MSudi');
	}

	public function index()
	{
		if ($this->session->userdata('Login')) {
			$data['nama'] = $this->session->userdata('nama');

			$data['content'] = 'VBlank';
			$this->load->view('welcome_message', $data);
		} else {
			redirect(site_url('Login'));
		}
	}


	// public function json_siswa()
	//     {
	//         $siswa=urldecode($this->uri->segment(3));
	//         $setting_ta = "tbl_siswa.tahun_ajaran = tbl_setting_ta.tahun_ajaran";
	//         /*$jsondata = $this->MSudi->GetDataLike('tbl_siswa', 'nisn', $siswa)->result();*/
	//         $jsondata = $this->MSudi->GetDataJoin('tbl_siswa','tbl_setting_ta', $setting_ta)->result();
	//         $data['json'] = json_encode($jsondata);

	//         $this->load->view('json',$data);
	//     }


	// public function search()
	//     {
	//         $search=urldecode($this->uri->segment(3));
	//         $jsondata = $this->MSudi->GetDataLike('tbl_siswa', 'nis', $search)->result();
	//         $data['json'] = json_encode($jsondata);

	//         $this->load->view('json',$data);
	//     }
	// public function search_tahun_ajaran()
	//     {
	//         $datapembayaran=urldecode($this->uri->segment(3));
	//         $jsondata = $this->MSudi->GetDataLike('tbl_setting_ta', 'tahun_ajaran', $datapembayaran)->result();
	//         $data['json'] = json_encode($jsondata);

	//         $this->load->view('json',$data);
	//     }

	// public function json_login()
	//     {
	//     	$where = array(
	//     		'username'=>urldecode($this->uri->segment(3)),
	//     		'password'=>urldecode($this->uri->segment(4))
	//     	);
	//         /*$login=urldecode($this->uri->segment(3));*/
	//         /*$jsondata = $this->MSudi->GetDataLike('tbl_siswa', 'nisn', $siswa)->result();*/
	//         $jsondata = $this->MSudi->GetDataWhere('tbl_users',$where,$where)->num_rows();
	//         if ($jsondata==1){
	//         	$result= array(
	//         		[
	//         			'result'=> 'valid'
	//         		]
	//         	);
	//         }
	//         else{
	//         	$result = array(
	//         		[
	//         			'result'=>'invalid'
	//         		]
	//         	);
	//         }
	//         echo json_encode($result);
	/*   $data['json'] = json_encode($jsondata);
			
        $this->load->view('json',$data);*/
	// }
	// public function json_add_user()
	// 	{
	// 		 $add['username']=urldecode($this->uri->segment(3));
	//          $add['password']=urldecode($this->uri->segment(4));


	//     	$this->MSudi->AddData('tbl_users',$add);
	// 	}

	// 	public function DataMenu()
	// 	{
	// 			$data['username']=$this->session->userdata('username');
	// 			$data['foto']=$this->session->userdata('foto');
	// 			$data['content']='VBlank';
	// 			$this->load->view('welcome_message',$data);
	// 		}


	public function DataLevelMember()
	{
		$data['nama'] = $this->session->userdata('nama');
		if ($this->uri->segment(4) == 'view') {
			$id = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_level_member', 'id', $id)->row();
			$data['detail']['id'] = $tampil->id;
			$data['detail']['kd_level'] = $tampil->kd_level;
			$data['detail']['nama_level'] = $tampil->nama_level;
			$data['content'] = 'VFormUpdateLevelMember';
		} else {
			// $join="tbl_staff.kd_staff = tbl_users.kd_staff AND tbl_pegawai.kd_pegawai = tbl_staff.kd_pegawai";
			// $data['DataUser']=$this->MSudi->GetData2Join('tbl_users','tbl_staff','tbl_pegawai', $join)->result();
			$data['DataLevelMember'] = $this->MSudi->GetDataWhere1('tbl_level_member', 'is_active', 1, 'id', 'asc')->result();
			$data['content'] = 'VLevelMember';
		}


		$this->load->view('welcome_message', $data);
	}


	public function VFormAddLevelMember()
	{
		$data['nama'] = $this->session->userdata('nama');


		$data['content'] = 'VFormAddLevelMember';
		$this->load->view('welcome_message', $data);
	}
	public function AddDataLevelMember()
	{
		$data['nama'] = $this->session->userdata('nama');

		$add['id'] = $this->input->post('id');
		$add['kd_level'] = $this->input->post('kd_level');
		$add['nama_level'] = $this->input->post('nama_level');
		$add['is_active'] = 1;

		$this->MSudi->AddData('tbl_level_member', $add);
		redirect(site_url('Welcome/DataLevelMember'));
	}

	public function UpdateDataLevelMember()
	{
		$data['nama'] = $this->session->userdata('nama');


		$id = $this->input->post('id');
		$update['kd_level'] = $this->input->post('kd_level');
		$update['nama_level'] = $this->input->post('nama_level');
		$this->MSudi->UpdateData('tbl_level_member', 'id', $id, $update);
		redirect(site_url('Welcome/DataLevelMember'));
	}


	public function DeleteDataLevelMember()
	{
		$data['nama'] = $this->session->userdata('nama');

		$id = $this->uri->segment('3');
		$update['is_active'] = 0;
		// $update['deleted_by'] = $data['nama'];
		// $update['deleted_at'] = date("Y-m-d H:i:s");

		$this->MSudi->UpdateData('tbl_level_member', 'id', $id, $update);
		redirect(site_url('Welcome/DataLevelMember'));
	}


	public function DataAdmin()
	{
		$data['nama'] = $this->session->userdata('nama');
		if ($this->uri->segment(4) == 'view') {
			$id = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tb_admin', 'id', $id)->row();
			$data['detail']['id'] = $tampil->id;
			$data['detail']['nama'] = $tampil->nama;
			$data['detail']['username'] = $tampil->username;
			$data['detail']['password'] = $tampil->password;
			$data['detail']['created_by'] = $tampil->created_by;
			$data['detail']['created_at'] = $tampil->created_at;
			$data['detail']['updated_by'] = $tampil->updated_by;
			$data['detail']['updated_at'] = $tampil->updated_at;
			$data['detail']['deleted_by'] = $tampil->deleted_by;
			$data['detail']['deleted_at'] = $tampil->deleted_at;
			$data['content'] = 'VFormUpdateAdmin';
		} else {
			// $join="tbl_staff.kd_staff = tbl_users.kd_staff AND tbl_pegawai.kd_pegawai = tbl_staff.kd_pegawai";
			// $data['DataUser']=$this->MSudi->GetData2Join('tbl_users','tbl_staff','tbl_pegawai', $join)->result();
			$data['DataAdmin'] = $this->MSudi->GetDataWhere1('tb_admin', 'is_active', 1, 'id', 'asc')->result();
			$data['content'] = 'VAdmin';
		}


		$this->load->view('welcome_message', $data);
	}


	public function VFormAddAdmin()
	{
		$data['nama'] = $this->session->userdata('nama');


		$data['content'] = 'VFormAddAdmin';
		$this->load->view('welcome_message', $data);
	}
	public function AddDataAdmin()
	{
		$data['nama'] = $this->session->userdata('nama');

		$add['id'] = $this->input->post('id');
		$add['nama'] = $this->input->post('nama');
		$add['username'] = $this->input->post('username');
		$add['password'] = $this->input->post('password');
		$add['created_by'] = $data['nama'];
		$add['created_at'] = date("Y-m-d H:i:s");
		$add['updated_by'] = Null;
		$add['updated_at'] = Null;
		$add['deleted_by'] = Null;
		$add['deleted_at'] = Null;
		$add['is_active'] = 1;

		$this->MSudi->AddData('tb_admin', $add);
		redirect(site_url('Welcome/DataAdmin'));
	}

	public function UpdateDataAdmin()
	{
		$data['nama'] = $this->session->userdata('nama');


		$id = $this->input->post('id');

		$update['username'] = $this->input->post('username');
		$update['password'] = $this->input->post('password');

		$update['updated_by'] = $data['nama'];
		$update['updated_at'] = date("Y-m-d H:i:s");
		$update['is_active'] = 1;
		$this->MSudi->UpdateData('tb_admin', 'id', $id, $update);
		redirect(site_url('Welcome/DataAdmin'));
	}


	public function DeleteDataAdmin()
	{
		$data['nama'] = $this->session->userdata('nama');

		$id = $this->uri->segment('3');
		$update['is_active'] = 0;
		$update['deleted_by'] = $data['nama'];
		$update['deleted_at'] = date("Y-m-d H:i:s");

		$this->MSudi->UpdateData('tb_admin', 'id', $id, $update);
		redirect(site_url('Welcome/DataAdmin'));
	}





	public function DataMember()
	{
		$data['nama'] = $this->session->userdata('nama');
		if ($this->uri->segment(4) == 'view') {
			$id = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tb_member', 'id', $id)->row();
			$data['detail']['id'] = $tampil->id;
			$data['detail']['id_voucher'] = $tampil->id_voucher;
			$data['detail']['nama'] = $tampil->nama;
			$data['detail']['username'] = $tampil->username;
			$data['detail']['password'] = $tampil->password;
			$data['detail']['alamat'] = $tampil->alamat;
			$data['detail']['kota'] = $tampil->kota;
			$data['detail']['kodepos'] = $tampil->kodepos;
			$data['detail']['pekerjaan'] = $tampil->pekerjaan;
			$data['detail']['no_telp_hp'] = $tampil->no_telp_hp;
			$data['detail']['email'] = $tampil->email;
			$data['detail']['kota_lahir'] = $tampil->kota_lahir;
			$data['detail']['tgl_lahir'] = $tampil->tgl_lahir;
			$data['detail']['jk'] = $tampil->jk;
			$data['detail']['foto'] = $tampil->foto;
			$data['detail']['ahli_waris'] = $tampil->ahli_waris;
			$data['detail']['hubungan_ahli_waris'] = $tampil->hubungan_ahli_waris;
			$data['detail']['ibu_kandung'] = $tampil->ibu_kandung;
			$data['detail']['npwp'] = $tampil->npwp;
			$data['detail']['no_paspor'] = $tampil->no_paspor;
			$data['detail']['tgl_dikeluarkan_pas'] = $tampil->tgl_dikeluarkan_pas;
			$data['detail']['tgl_expired_pas'] = $tampil->tgl_expired_pas;
			$data['detail']['tempat_dikeluarkan_pas'] = $tampil->tempat_dikeluarkan_pas;
			$data['detail']['pernah_umroh'] = $tampil->pernah_umroh;
			$data['detail']['kali_umroh'] = $tampil->kali_umroh;
			$data['detail']['tgl_terakhir_berangkat'] = $tampil->tgl_terakhir_berangkat;
			$data['detail']['tgl_rencana_umroh'] = $tampil->tgl_rencana_umroh;
			$data['detail']['paket'] = $tampil->paket;
			$data['detail']['nama_mahram'] = $tampil->nama_mahram;
			$data['detail']['hubungan_mahram'] = $tampil->hubungan_mahram;
			$data['detail']['nama_bank'] = $tampil->nama_bank;
			$data['detail']['nomor_rekening'] = $tampil->nomor_rekening;
			$data['detail']['atas_nama'] = $tampil->atas_nama;
			$data['detail']['pin'] = $tampil->pin;
			$data['detail']['nama_referensi'] = $tampil->nama_referensi;
			$data['detail']['nohp_referensi'] = $tampil->nohp_referensi;
			$data['detail']['id_referensi'] = $tampil->id_referensi;
			$data['detail']['id_upline'] = $tampil->id_upline;
			$data['detail']['posisi'] = $tampil->posisi;
			$data['detail']['level'] = $tampil->level;
			$data['detail']['tgl_insert'] = $tampil->tgl_insert;
			$data['detail']['list_id_upline'] = $tampil->list_id_upline;
			$data['detail']['id_member'] = $tampil->id_member;
			$data['detail']['created_by'] = $tampil->created_by;
			$data['detail']['created_at'] = $tampil->created_at;
			$data['detail']['updated_by'] = $tampil->updated_by;
			$data['detail']['updated_at'] = $tampil->updated_at;
			$data['detail']['deleted_by'] = $tampil->deleted_by;
			$data['detail']['deleted_at'] = $tampil->deleted_at;
			$data['content'] = 'VFormUpdateMember';
		} else {
			// $join="tbl_staff.kd_staff = tbl_users.kd_staff AND tbl_pegawai.kd_pegawai = tbl_staff.kd_pegawai";
			// $data['DataUser']=$this->MSudi->GetData2Join('tbl_users','tbl_staff','tbl_pegawai', $join)->result();
			$data['DataMember'] = $this->MSudi->GetDataWhere1('tb_member', 'is_active', 1, 'id', 'asc')->result();
			$data['content'] = 'VMember';
		}


		$this->load->view('welcome_message', $data);
	}


	public function VFormAddMember()
	{
		$data['nama'] = $this->session->userdata('nama');


		$data['content'] = 'VFormAddMember';
		$data['no_voucher'] = $this->MSudi->GetData('tb_voucher');
		$data['id'] = $this->MSudi->GetData('tb_voucher');
		$this->load->view('welcome_message', $data);
	}

	public function AddDataMember()
	{
		$data['nama'] = $this->session->userdata('nama');


		$add['id_voucher'] = $this->input->post('id_voucher');
		$add['nama'] = $this->input->post('nama');
		$add['username'] = $this->input->post('username');
		$add['password'] = $this->input->post('password');
		$add['alamat'] = $this->input->post('alamat');
		$add['no_telp_hp'] = $this->input->post('no_telp_hp');
		$add['email'] = $this->input->post('email');
		$add['kota_lahir'] = $this->input->post('kota_lahir');
		$add['tgl_lahir'] = $this->input->post('tgl_lahir');
		$add['jk'] = $this->input->post('jk');
		$add['nama_bank'] = $this->input->post('nama_bank');
		$add['nomor_rekening'] = $this->input->post('nomor_rekening');
		$add['atas_nama'] = $this->input->post('atas_nama');
		$add['pin'] = $this->input->post('pin');
		$add['id_upline'] = $this->input->post('id_upline');
		$add['posisi'] = $this->input->post('posisi');
		$add['level'] = $this->input->post('level');
		$add['tgl_insert'] = date("Y-m-d H:i:s");
		$add['list_id_upline'] = $this->input->post('list_id_upline');
		$add['id_member'] = $this->input->post('id_member');
		$add['created_by'] = $data['nama'];
		$add['created_at'] = date("Y-m-d H:i:s");
		$add['updated_by'] = Null;
		$add['updated_at'] = Null;
		$add['deleted_by'] = Null;
		$add['deleted_at'] = Null;
		$add['is_active'] = 1;
		$add['kota'] = $this->input->post('kota');
		$add['kodepos'] = $this->input->post('kodepos');
		$add['pekerjaan'] = $this->input->post('pekerjaan');
		$add['ahli_waris'] = $this->input->post('ahli_waris');
		$add['hubungan_ahli_waris'] = $this->input->post('hubungan_ahli_waris');
		$add['ibu_kandung'] = $this->input->post('ibu_kandung');
		$add['npwp'] = $this->input->post('npwp');
		$add['no_paspor'] = $this->input->post('no_paspor');
		$add['tgl_dikeluarkan_pas'] = $this->input->post('tgl_dikeluarkan_pas');
		$add['tgl_expired_pas'] = $this->input->post('tgl_expired_pas');
		$add['tempat_dikeluarkan_pas'] = $this->input->post('tempat_dikeluarkan_pas');
		$add['pernah_umroh'] = $this->input->post('pernah_umroh');
		$add['kali_umroh'] = $this->input->post('kali_umroh');
		$add['tgl_terakhir_berangkat'] = $this->input->post('tgl_terakhir_berangkat');
		$add['tgl_rencana_umroh'] = $this->input->post('tgl_rencana_umroh');
		$add['paket'] = $this->input->post('paket');
		$add['nama_mahram'] = $this->input->post('nama_mahram');
		$add['hubungan_mahram'] = $this->input->post('hubungan_mahram');
		$add['nama_referensi'] = $this->input->post('nama_referensi');
		$add['nohp_referensi'] = $this->input->post('nohp_referensi');
		$add['id_referensi'] = $this->input->post('id_referensi');



		$config['upload_path'] = './upload/Member';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			//   /redirect(site_url('Welcome/VFormAddMember'));

		} else {
			$data = array('upload_data' => $this->upload->data());
			$add['foto'] = implode($this->upload->data());
		}

		$this->MSudi->AddData('tb_member', $add);
		redirect(site_url('Welcome/DataMember'));
	}

	public function UpdateDataMember()
	{
		$data['nama'] = $this->session->userdata('nama');


		$id = $this->input->post('id');

		$update['id_voucher'] = $this->input->post('id_voucher');
		$update['nama'] = $this->input->post('nama');
		$update['username'] = $this->input->post('username');
		$update['password'] = $this->input->post('password');
		$update['alamat'] = $this->input->post('alamat');
		$update['no_telp_hp'] = $this->input->post('no_telp_hp');
		$update['email'] = $this->input->post('email');
		$update['kota_lahir'] = $this->input->post('kota_lahir');
		$update['tgl_lahir'] = $this->input->post('tgl_lahir');
		$update['jk'] = $this->input->post('jk');
		$update['nama_bank'] = $this->input->post('nama_bank');
		$update['nomor_rekening'] = $this->input->post('nomor_rekening');
		$update['atas_nama'] = $this->input->post('atas_nama');
		$update['pin'] = $this->input->post('pin');
		$update['id_upline'] = $this->input->post('id_upline');
		$update['posisi'] = $this->input->post('posisi');
		$update['level'] = $this->input->post('level');
		$update['tgl_insert'] = date("Y-m-d H:i:s");
		$update['list_id_upline'] = $this->input->post('list_id_upline');
		$update['id_member'] = $this->input->post('id_member');
		$update['updated_by'] = $data['nama'];
		$update['updated_at'] = date("Y-m-d H:i:s");
		$update['is_active'] = 1;
		$update['kota'] = $this->input->post('kota');
		$update['kodepos'] = $this->input->post('kodepos');
		$update['pekerjaan'] = $this->input->post('pekerjaan');
		$update['ahli_waris'] = $this->input->post('ahli_waris');
		$update['hubungan_ahli_waris'] = $this->input->post('hubungan_ahli_waris');
		$update['ibu_kandung'] = $this->input->post('ibu_kandung');
		$update['npwp'] = $this->input->post('npwp');
		$update['no_paspor'] = $this->input->post('no_paspor');
		$update['tgl_dikeluarkan_pas'] = $this->input->post('tgl_dikeluarkan_pas');
		$update['tgl_expired_pas'] = $this->input->post('tgl_expired_pas');
		$update['tempat_dikeluarkan_pas'] = $this->input->post('tempat_dikeluarkan_pas');
		$update['pernah_umroh'] = $this->input->post('pernah_umroh');
		$update['kali_umroh'] = $this->input->post('kali_umroh');
		$update['tgl_terakhir_berangkat'] = $this->input->post('tgl_terakhir_berangkat');
		$update['tgl_rencana_umroh'] = $this->input->post('tgl_rencana_umroh');
		$update['paket'] = $this->input->post('paket');
		$update['nama_mahram'] = $this->input->post('nama_mahram');
		$update['hubungan_mahram'] = $this->input->post('hubungan_mahram');
		$update['nama_referensi'] = $this->input->post('nama_referensi');
		$update['nohp_referensi'] = $this->input->post('nohp_referensi');
		$update['id_referensi'] = $this->input->post('id_referensi');
		$config['upload_path'] = './upload/Member';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			//   /redirect(site_url('Welcome/VFormAddMember'));

		} else {
			$data = array('upload_data' => $this->upload->data());
			$update['foto'] = implode($this->upload->data());
		}
		$this->MSudi->UpdateData('tb_member', 'id', $id, $update);
		redirect(site_url('Welcome/DataMember'));
	}


	public function DeleteDataMember()
	{
		$data['nama'] = $this->session->userdata('nama');

		$id = $this->uri->segment('3');
		$update['is_active'] = 0;
		$update['deleted_by'] = $data['nama'];
		$update['deleted_at'] = date("Y-m-d H:i:s");

		$this->MSudi->UpdateData('tb_member', 'id', $id, $update);
		redirect(site_url('Welcome/DataMember'));
	}


	public function DataVoucher()
	{
		$data['nama'] = $this->session->userdata('nama');
		if ($this->uri->segment(4) == 'view') {
			$id = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tb_voucher', 'id', $id)->row();
			$data['detail']['id'] = $tampil->id;
			$data['detail']['id_member_pemilik'] = $tampil->id_member_pemilik;
			$data['detail']['id_member_digunakan'] = $tampil->id_member_digunakan;
			$data['detail']['no_voucher'] = $tampil->no_voucher;
			$data['detail']['status'] = $tampil->status;
			$data['detail']['tgl_beli'] = $tampil->tgl_beli;
			$data['detail']['tgl_digunakan'] = $tampil->tgl_digunakan;
			$data['detail']['tgl_insert'] = $tampil->tgl_insert;
			// $data['detail']['created_by'] = $tampil->created_by;
			// $data['detail']['created_at'] = $tampil->created_at;
			// $data['detail']['updated_by'] = $tampil->updated_by;
			// $data['detail']['updated_at'] = $tampil->updated_at;
			// $data['detail']['deleted_by'] = $tampil->deleted_by;
			// $data['detail']['deleted_at'] = $tampil->deleted_at;
			$data['content'] = 'VFormUpdateVoucher';
		} else {
			// $join="tbl_staff.kd_staff = tbl_users.kd_staff AND tbl_pegawai.kd_pegawai = tbl_staff.kd_pegawai";
			// $data['DataUser']=$this->MSudi->GetData2Join('tbl_users','tbl_staff','tbl_pegawai', $join)->result();
			$data['DataVoucher'] = $this->MSudi->GetData('tb_voucher');
			$data['content'] = 'VVoucher';
		}


		$this->load->view('welcome_message', $data);
	}


	public function VFormAddVoucher()
	{
		$data['nama'] = $this->session->userdata('nama');


		$data['content'] = 'VFormAddVoucher';
		$data['member'] = $this->MSudi->GetData('tb_member');
		$data['id'] = $this->MSudi->GetData('tb_member');
		$this->load->view('welcome_message', $data);
	}

	public function AddDataVoucher()
	{
		$data['nama'] = $this->session->userdata('nama');


		$add['id'] = $this->input->post('id');
		$add['id_member_pemilik'] = $this->input->post('id_member_pemilik');
		$add['id_member_digunakan'] = $this->input->post('id_member_digunakan');
		$add['no_voucher'] = $this->input->post('no_voucher');
		$add['status'] = $this->input->post('status');
		$add['tgl_beli'] = $this->input->post('tgl_beli');
		$add['tgl_digunakan'] = $this->input->post('tgl_digunakan');
		$add['tgl_insert'] = date("Y-m-d H:i:s");
		// $add['created_by'] = $data['nama'];
		// $add['created_at'] = date("Y-m-d H:i:s");
		// $add['updated_by'] = Null;
		// $add['updated_at'] = Null;
		// $add['deleted_by'] = Null;
		// $add['deleted_at'] = Null;
		$add['is_active'] = 1;
		$this->MSudi->AddData('tb_voucher', $add);
		redirect(site_url('Welcome/DataVoucher'));
	}

	public function UpdateDataVoucher()
	{
		$data['nama'] = $this->session->userdata('nama');


		$id = $this->input->post('id');

		$update['id'] = $this->input->post('id');
		$update['id_member_pemilik'] = $this->input->post('id_member_pemilik');
		$update['id_member_digunakan'] = $this->input->post('id_member_digunakan');
		$update['no_voucher'] = $this->input->post('no_voucher');
		$update['status'] = $this->input->post('status');
		$update['tgl_beli'] = $this->input->post('tgl_beli');
		$update['tgl_digunakan'] = $this->input->post('tgl_digunakan');
		$update['tgl_insert'] = date("Y-m-d H:i:s");
		// $update['created_by'] = $data['nama'];
		// $update['created_at'] = date("Y-m-d H:i:s");
		// $update['updated_by'] = Null;
		// $update['updated_at'] = Null;
		// $update['deleted_by'] = Null;
		// $update['deleted_at'] = Null;
		$update['is_active'] = 1;
		$this->MSudi->UpdateData('tb_voucher', 'id', $id, $update);
		redirect(site_url('Welcome/DataVoucher'));
	}


	public function DeleteDataVoucher()
	{
		$data['nama'] = $this->session->userdata('nama');

		$id = $this->uri->segment('3');
		$update['is_active'] = 0;
		$update['deleted_by'] = $data['nama'];
		$update['deleted_at'] = date("Y-m-d H:i:s");

		$this->MSudi->UpdateData('tb_voucher', 'id', $id, $update);
		redirect(site_url('Welcome/DataVoucher'));
	}

	public function Logout()
	{
		$data['username'] = $this->session->userdata('username');
		$data['foto'] = $this->session->userdata('foto');
		$this->load->library('session');
		$this->session->unset_userdata('Login');
		redirect(site_url('Login'));
	}
}
