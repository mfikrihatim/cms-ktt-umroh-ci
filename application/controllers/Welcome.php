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
			$data['level'] = $this->session->userdata('level');

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
		$username = $this->input->post('username');

		$add['password'] = $this->input->post('password');
		$add['created_by'] = $data['nama'];
		$add['created_at'] = date("Y-m-d H:i:s");
		$add['updated_by'] = Null;
		$add['updated_at'] = Null;
		$add['deleted_by'] = Null;
		$add['deleted_at'] = Null;
		$add['is_active'] = 1;

		$sql = $this->db->query("SELECT username FROM tb_admin where username = '$username'");
		$cek_username = $sql->num_rows();

		if ($cek_username > 0) {
			$this->session->set_flashdata('message', 'USERNAME Sudah digunakan sebelumnya');
			redirect(site_url('Welcome/DataAdmin'));
		} else {
			// var_dump($add);
			$this->MSudi->AddData('tb_admin', $add);
			redirect(site_url('Welcome/DataAdmin'));
		}
	}

	public function UpdateDataAdmin()
	{
		$data['nama'] = $this->session->userdata('nama');


		$id = $this->input->post('id');

		$update['username'] = $this->input->post('username');
		$update['password'] = $this->input->post('password');
		$username = $this->input->post('username');
		$update['updated_by'] = $data['nama'];
		$update['updated_at'] = date("Y-m-d H:i:s");
		$update['is_active'] = 1;
		$sql = $this->db->query("SELECT username FROM tb_admin where username = '$username'");
		$cek_username = $sql->num_rows();

		if ($cek_username > 0) {
			$this->session->set_flashdata('update', 'USERNAME GAGAL DI UPDATE <br>USERNAME Sudah digunakan sebelumnya <br> Silahkan Masukan username yang baru');
			redirect(site_url('Welcome/DataAdmin'));
		} else {
			$this->MSudi->UpdateData('tb_admin', 'id', $id, $update);
			redirect(site_url('Welcome/DataAdmin'));
		}
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
			$data['no_voucher'] = $this->MSudi->GetData('tb_voucher');

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
			$convertTgTerakhirBerangkat = date_create($tampil->tgl_terakhir_berangkat, timezone_open('Europe/London'));
			date_timezone_set($convertTgTerakhirBerangkat, timezone_open('Asia/Bangkok'));


			$tgTerakhirBerangkat = $convertTgTerakhirBerangkat->format('d/m/Y');

			$data['detail']['tgl_terakhir_berangkat'] = $tgTerakhirBerangkat;
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
			$arrayflag_member = json_decode($tampil->flag_member, TRUE);
			$data['detail']['flag_member'] = $tampil->flag_member;
			$data['content'] = 'VFormUpdateMember';
		} else {
			// $join="tbl_staff.kd_staff = tbl_users.kd_staff AND tbl_pegawai.kd_pegawai = tbl_staff.kd_pegawai";
			// $data['DataUser']=$this->MSudi->GetData2Join('tbl_users','tbl_staff','tbl_pegawai', $join)->result();
			$data['DataMember'] = $this->MSudi->GetDataWhere1('tb_member', 'is_active', 1, 'id', 'asc')->result();
			$data['content'] = 'VMember';
		}


		$this->load->view('welcome_message', $data);
	}



	public function DataAktivasiMember()
	{
		$data['nama'] = $this->session->userdata('nama');
		if ($this->uri->segment(4) == 'view') {
			$id = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tb_member', 'id', $id)->row();
		} else {
			// $join="tbl_staff.kd_staff = tbl_users.kd_staff AND tbl_pegawai.kd_pegawai = tbl_staff.kd_pegawai";
			// $data['DataUser']=$this->MSudi->GetData2Join('tbl_users','tbl_staff','tbl_pegawai', $join)->result();
			$data['DataMember'] = $this->MSudi->GetDataWhere1('tb_member', 'is_active', 0, 'id', 'asc')->result();
			$data['content'] = 'VAktivasiMember';
		}


		$this->load->view('welcome_message', $data);
	}
	public function AktivasiMember()
	{
		$data['nama'] = $this->session->userdata('nama');

		$id = $this->uri->segment('3');
		$update['is_active'] = 1;
		$update['actived_by'] = $data['nama'];


		$this->MSudi->UpdateData('tb_member', 'id', $id, $update);
		redirect(site_url('Welcome/DataMember'));
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
		$flag_member = $this->input->post("flag_member");
		if ($flag_member == null)
			$flag_member =  [];

		$add['id_voucher'] = $this->input->post('id_voucher');
		$add['nama'] = $this->input->post('nama');
		$add['username'] = $this->input->post('username');
		$username = $this->input->post('username');
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
		$add['pin'] = null;
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
		$add['is_active'] = 0;
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
		$add['flag_member'] = json_encode($flag_member);


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
		$sql = $this->db->query("SELECT username FROM tb_member where username = '$username'");
		$cek_username = $sql->num_rows();

		if ($cek_username > 0) {
			$this->session->set_flashdata('message', 'USERNAME Sudah digunakan sebelumnya <br> Silahkan Masukan username yang baru');
			redirect(site_url('Welcome/VFormAddMember'));
		} else {
			// var_dump($add);
			$this->MSudi->AddData('tb_member', $add);
			redirect(site_url('Welcome/DataMember'));
		}
	}

	public function UpdateDataMember()
	{
		$data['nama'] = $this->session->userdata('nama');
		$flag_member = $this->input->post("flag_member");
		if ($flag_member == null || $flag_member == "") {
			$flag_member = "[]";
		} else {
			$flag_member = json_encode($flag_member);
		}
		$id = $this->input->post('id');

		$update['id_voucher'] = $this->input->post('id_voucher');
		$update['nama'] = $this->input->post('nama');
		$update['username'] = $this->input->post('username');
		$username = $this->input->post('username');
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
		$update['pin'] = Null;
		$update['id_upline'] = $this->input->post('id_upline');
		$update['posisi'] = $this->input->post('posisi');
		$update['level'] = $this->input->post('level');
		$update['tgl_insert'] = date("Y-m-d H:i:s");
		$update['list_id_upline'] = $this->input->post('list_id_upline');
		$update['id_member'] = $this->input->post('id_member');
		$update['updated_by'] = $data['nama'];
		$update['updated_at'] = date("Y-m-d H:i:s");
		$update['is_active'] = 0;
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
		$update['flag_member'] = $flag_member;

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
			$data['detail']['id_admin'] = $tampil->id_admin;
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

		$this->load->view('welcome_message', $data);
	}

	public function AddDataVoucher()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['id'] = $this->session->userdata('id');


		$add['id'] = $this->input->post('id');
		$add['id_member_pemilik'] = null;
		$add['id_member_digunakan'] = null;
		$add['no_voucher'] = $this->input->post('no_voucher');
		$add['status'] = $this->input->post('status');
		$add['tgl_beli'] = null;
		$add['tgl_digunakan'] = null;
		$add['tgl_insert'] = date("Y-m-d H:i:s");
		$add['id_admin'] = $data['id'];

		// $add['created_by'] = $data['nama'];
		// $add['created_at'] = date("Y-m-d H:i:s");
		// $add['updated_by'] = Null;
		// $add['updated_at'] = Null;
		// $add['deleted_by'] = Null;
		// $add['deleted_at'] = Null;
		// $add['is_active'] = 1;
		$this->MSudi->AddData('tb_voucher', $add);
		redirect(site_url('Welcome/DataVoucher'));
	}

	public function UpdateDataVoucher()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['id'] = $this->session->userdata('id');


		$id = $this->input->post('id');

		$update['id'] = $this->input->post('id');
		$update['id_member_pemilik'] = null;
		$update['id_member_digunakan'] = null;
		$update['no_voucher'] = $this->input->post('no_voucher');
		$update['status'] = $this->input->post('status');
		$update['tgl_beli'] = null;
		$update['tgl_digunakan'] = null;
		$update['tgl_insert'] = date("Y-m-d H:i:s");
		$update['id_admin'] = $data['id'];

		// $update['created_by'] = $data['nama'];
		// $update['created_at'] = date("Y-m-d H:i:s");
		// $update['updated_by'] = Null;
		// $update['updated_at'] = Null;
		// $update['deleted_by'] = Null;
		// $update['deleted_at'] = Null;

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



	public function DataKategoriKomisi()
	{
		$data['nama'] = $this->session->userdata('nama');
		if ($this->uri->segment(4) == 'view') {
			$id = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_kategori_komisi', 'id', $id)->row();
			$data['detail']['id'] = $tampil->id;
			$data['detail']['nama_kategori'] = $tampil->nama_kategori;

			$data['content'] = 'VFormUpdateKategoriKomisi';
		} else {
			// $join="tbl_staff.kd_staff = tbl_users.kd_staff AND tbl_pegawai.kd_pegawai = tbl_staff.kd_pegawai";
			// $data['DataUser']=$this->MSudi->GetData2Join('tbl_users','tbl_staff','tbl_pegawai', $join)->result();
			$data['DataKategoriKomisi'] = $this->MSudi->GetDataWhere1('tbl_kategori_komisi', 'is_active', 1, 'id', 'asc')->result();
			$data['content'] = 'VKategoriKomisi';
		}


		$this->load->view('welcome_message', $data);
	}


	public function AddDataKategoriKomisi()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['id'] = $this->session->userdata('id');


		$add['id'] = $this->input->post('id');
		$add['nama_kategori'] = $this->input->post('nama_kategori');

		$add['is_active'] = 1;
		$this->MSudi->AddData('tbl_kategori_komisi', $add);
		redirect(site_url('Welcome/DataKategoriKomisi'));
	}

	public function UpdateDataKategoriKomisi()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['id'] = $this->session->userdata('id');


		$id = $this->input->post('id');

		$update['id'] = $this->input->post('id');
		$update['nama_kategori'] = $this->input->post('nama_kategori');;

		$this->MSudi->UpdateData('tbl_kategori_komisi', 'id', $id, $update);
		redirect(site_url('Welcome/DataKategoriKomisi'));
	}


	public function DeleteDataKategoriKomisi()
	{
		$data['nama'] = $this->session->userdata('nama');

		$id = $this->uri->segment('3');
		$update['is_active'] = 0;


		$this->MSudi->UpdateData('tbl_kategori_komisi', 'id', $id, $update);
		redirect(site_url('Welcome/DataKategoriKomisi'));
	}




	public function DataMasterKomisi()
	{
		$data['nama'] = $this->session->userdata('nama');
		if ($this->uri->segment(4) == 'view') {
			$id_komisi = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tbl_master_komisi', 'id_komisi', $id_komisi)->row();
			$data['kategori'] = $this->MSudi->GetDataWhere('tbl_kategori_komisi', 'is_active', 1)->result();
			$data['level_member'] = $this->MSudi->GetDataWhere('tbl_level_member', 'is_active', 1)->result();
			$data['level_target'] = $this->MSudi->GetDataWhere('tbl_level_member', 'is_active', 1)->result();

			$data['detail']['id_komisi'] = $tampil->id_komisi;
			$data['detail']['nama_komisi'] = $tampil->nama_komisi;
			$data['detail']['id_kategori_komisi'] = $tampil->id_kategori_komisi;
			$data['detail']['kd_level_member'] = $tampil->kd_level_member;
			$data['detail']['target'] = $tampil->target;
			$data['detail']['kd_level_target'] = $tampil->kd_level_target;
			$data['detail']['target_hari'] = $tampil->target_hari;
			$data['detail']['target_bonus'] = $tampil->target_bonus;
			$data['detail']['nominal_ujroh_satuan'] = $tampil->nominal_ujroh_satuan;
			$data['detail']['created_by'] = $tampil->created_by;
			$data['detail']['created_at'] = $tampil->created_at;
			$data['detail']['updated_by'] = $tampil->updated_by;
			$data['detail']['updated_at'] = $tampil->updated_at;
			$data['detail']['deleted_by'] = $tampil->deleted_by;
			$data['detail']['deleted_at'] = $tampil->deleted_at;
			$data['detail']['is_active'] = $tampil->is_active;


			$data['content'] = 'VFormUpdateMasterKomisi';
		} else {
			// $join="tbl_staff.kd_staff = tbl_users.kd_staff AND tbl_pegawai.kd_pegawai = tbl_staff.kd_pegawai";
			// $data['DataUser']=$this->MSudi->GetData2Join('tbl_users','tbl_staff','tbl_pegawai', $join)->result();
			$data['DataMasterKomisi'] = $this->MSudi->GetDataWhere1('tbl_master_komisi', 'is_active', 1, 'id_komisi', 'asc')->result();
			$data['content'] = 'VMasterKomisi';
		}


		$this->load->view('welcome_message', $data);
	}

	public function VFormAddMasterKomisi()
	{
		$data['nama'] = $this->session->userdata('nama');


		$data['content'] = 'VFormAddMasterKomisi';
		$data['kategori'] = $this->MSudi->GetDataWhere('tbl_kategori_komisi', 'is_active', 1)->result();
		$data['level_member'] = $this->MSudi->GetDataWhere('tbl_level_member', 'is_active', 1)->result();
		$data['level_target'] = $this->MSudi->GetDataWhere('tbl_level_member', 'is_active', 1)->result();

		$this->load->view('welcome_message', $data);
	}

	public function AddDataMasterKomisi()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['id'] = $this->session->userdata('id');


		$add['id_komisi'] = $this->input->post('id_komisi');
		$add['nama_komisi'] = $this->input->post('nama_komisi');
		$add['id_kategori_komisi'] = $this->input->post('id_kategori_komisi');
		$add['kd_level_member'] = $this->input->post('kd_level_member');
		$add['target'] = $this->input->post('target');
		$add['kd_level_target'] = $this->input->post('kd_level_target');
		$add['target_hari'] = $this->input->post('target_hari');
		$add['target_bonus'] = $this->input->post('target_bonus');
		$add['nominal_ujroh_satuan'] = $this->input->post('nominal_ujroh_satuan');
		$add['created_by'] = $data['nama'];
		$add['created_at'] = date("Y-m-d H:i:s");
		$add['updated_by'] = null;
		$add['updated_at'] = null;
		$add['deleted_by'] = null;
		$add['deleted_at'] = null;

		$add['is_active'] = 1;
		$this->MSudi->AddData('tbl_master_komisi', $add);
		redirect(site_url('Welcome/DataMasterKomisi'));
	}

	public function UpdateDataMasterKomisi()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['id'] = $this->session->userdata('id');


		$id_komisi = $this->input->post('id_komisi');

		$update['nama_komisi'] = $this->input->post('nama_komisi');
		$update['id_kategori_komisi'] = $this->input->post('id_kategori_komisi');
		$update['kd_level_member'] = $this->input->post('kd_level_member');
		$update['target'] = $this->input->post('target');
		$update['kd_level_target'] = $this->input->post('kd_level_target');
		$update['target_hari'] = $this->input->post('id');
		$update['target_bonus'] = $this->input->post('target_bonus');
		$update['nominal_ujroh_satuan'] = $this->input->post('nominal_ujroh_satuan');

		$update['updated_by'] =  $data['nama'];
		$update['updated_at'] = date("Y-m-d H:i:s");


		$this->MSudi->UpdateData('tbl_master_komisi', 'id_komisi', $id_komisi, $update);
		redirect(site_url('Welcome/DataMasterKomisi'));
	}


	public function DeleteDataMasterKomisi()
	{
		$data['nama'] = $this->session->userdata('nama');

		$id_komisi = $this->uri->segment('3');
		$update['is_active'] = 0;
		$update['deleted_by'] =  $data['nama'];
		$update['deleted_at'] = date("Y-m-d H:i:s");

		$this->MSudi->UpdateData('tbl_master_komisi', 'id_komisi', $id_komisi, $update);
		redirect(site_url('Welcome/DataMasterKomisi'));
	}

	public function DataCustomer()
	{
		$data['nama'] = $this->session->userdata('nama');
		if ($this->uri->segment(4) == 'view') {
			$id = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tb_customer', 'id', $id)->row();
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
			$convertTgTerakhirBerangkat = date_create($tampil->tgl_terakhir_berangkat, timezone_open('Europe/London'));
			date_timezone_set($convertTgTerakhirBerangkat, timezone_open('Asia/Bangkok'));
			$tgTerakhirBerangkat = $convertTgTerakhirBerangkat->format('d/m/Y');
			$data['detail']['tgl_terakhir_berangkat'] = $tgTerakhirBerangkat;
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
			$data['content'] = 'VFormUpdateCustomer';
		} else {
			// $join="tbl_staff.kd_staff = tbl_users.kd_staff AND tbl_pegawai.kd_pegawai = tbl_staff.kd_pegawai";
			// $data['DataUser']=$this->MSudi->GetData2Join('tbl_users','tbl_staff','tbl_pegawai', $join)->result();
			$data['DataCustomer'] = $this->MSudi->GetDataWhere1('tb_customer', 'is_active', 1, 'id', 'asc')->result();
			$data['content'] = 'VCustomer';
		}


		$this->load->view('welcome_message', $data);
	}


	public function VFormAddCustomer()
	{
		$data['nama'] = $this->session->userdata('nama');


		$data['content'] = 'VFormAddCustomer';
		$data['no_voucher'] = $this->MSudi->GetData('tb_voucher');
		$data['id'] = $this->MSudi->GetData('tb_voucher');
		$this->load->view('welcome_message', $data);
	}

	public function AddDataCustomer()
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



		$config['upload_path'] = './upload/customer';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			//   /redirect(site_url('Welcome/VFormAddMember'));

		} else {
			$data = array('upload_data' => $this->upload->data());
			$add['foto'] = implode($this->upload->data());
		}

		$this->MSudi->AddData('tb_customer', $add);
		redirect(site_url('Welcome/DataCustomer'));
	}

	public function UpdateDataCustomer()
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
		$config['upload_path'] = './upload/customer';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			//   /redirect(site_url('Welcome/VFormAddMember'));

		} else {
			$data = array('upload_data' => $this->upload->data());
			$update['foto'] = implode($this->upload->data());
		}
		$this->MSudi->UpdateData('tb_Customer', 'id', $id, $update);
		redirect(site_url('Welcome/DataCustomer'));
	}


	public function DeleteDataCustomer()
	{
		$data['nama'] = $this->session->userdata('nama');

		$id = $this->uri->segment('3');
		$update['is_active'] = 0;
		$update['deleted_by'] = $data['nama'];
		$update['deleted_at'] = date("Y-m-d H:i:s");

		$this->MSudi->UpdateData('tb_customer', 'id', $id, $update);
		redirect(site_url('Welcome/DataCustomer'));
	}


	public function DataPendaftaranMember()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['id'] = $this->session->userdata('id');
		if ($this->uri->segment(4) == 'view') {
			$id = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tb_member', 'id', $id)->row();
			$data['no_voucher'] = $this->MSudi->GetData('tb_voucher');

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
			$convertTgTerakhirBerangkat = date_create($tampil->tgl_terakhir_berangkat, timezone_open('Europe/London'));
			date_timezone_set($convertTgTerakhirBerangkat, timezone_open('Asia/Bangkok'));


			$tgTerakhirBerangkat = $convertTgTerakhirBerangkat->format('d/m/Y');

			$data['detail']['tgl_terakhir_berangkat'] = $tgTerakhirBerangkat;
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
			$data['content'] = 'VFormUpdatePendaftaranMember';
		} else {
			// $join="tbl_staff.kd_staff = tbl_users.kd_staff AND tbl_pegawai.kd_pegawai = tbl_staff.kd_pegawai";
			// $data['DataUser']=$this->MSudi->GetData2Join('tbl_users','tbl_staff','tbl_pegawai', $join)->result();
			$data['DataPendaftaranMember'] = $this->MSudi->GetDataWhere2('tb_member', 'is_active', 1, 'id_member', $data['id'], 'id', 'asc')->result();
			$data['content'] = 'VPendaftaranMember';
		}


		$this->load->view('welcome_message', $data);
	}


	public function VFormAddPendaftaranMember()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['id'] = $this->session->userdata('id');


		$data['content'] = 'VFormAddPendaftaranMember';
		$data['no_voucher'] = $this->MSudi->GetData('tb_voucher');
		$data['id'] = $this->MSudi->GetData('tb_voucher');
		$this->load->view('welcome_message', $data);
	}

	public function AddDataPendaftaranMember()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['id'] = $this->session->userdata('id');

		$add['id_voucher'] = $this->input->post('id_voucher');
		$add['nama'] = $this->input->post('nama');
		$add['username'] = $this->input->post('username');
		$username = $this->input->post('username');
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
		$add['pin'] = Null;
		$add['id_upline'] = $this->input->post('id_upline');
		$add['posisi'] = $this->input->post('posisi');
		$add['level'] = $this->input->post('level');
		$add['tgl_insert'] = date("Y-m-d H:i:s");
		$add['list_id_upline'] = $this->input->post('list_id_upline');
		$add['id_member'] = $data['id'];
		$add['created_by'] = $data['nama'];
		$add['created_at'] = date("Y-m-d H:i:s");
		$add['updated_by'] = Null;
		$add['updated_at'] = Null;
		$add['deleted_by'] = Null;
		$add['deleted_at'] = Null;
		$add['is_active'] = 0;
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
		$sql = $this->db->query("SELECT username FROM tb_member where username = '$username'");
		$cek_username = $sql->num_rows();

		if ($cek_username > 0) {
			$this->session->set_flashdata('message', 'USERNAME Sudah digunakan sebelumnya <br> Silahkan Masukan username yang baru');
			redirect(site_url('Welcome/VFormAddPendaftaranMember'));
		} else {
			// var_dump($add);
			$id_member = $this->MSudi->AddData('tb_member', $add);
			// $update['id_member'] = $id_member;
			// $this->MSudi->UpdateData('tb_member', 'id', $id_member, $update);
			redirect(site_url('Welcome/DataPendaftaranMember'));
		}
	}

	public function UpdateDataPendaftaranMember()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['id'] = $this->session->userdata('id');


		$id = $this->input->post('id');

		$update['id_voucher'] = $this->input->post('id_voucher');
		$update['nama'] = $this->input->post('nama');
		$update['username'] = $this->input->post('username');
		$username = $this->input->post('username');
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
		$update['pin'] = null;
		$update['id_upline'] = $this->input->post('id_upline');
		$update['posisi'] = $this->input->post('posisi');
		$update['level'] = $this->input->post('level');
		$update['tgl_insert'] = date("Y-m-d H:i:s");
		$update['list_id_upline'] = $this->input->post('list_id_upline');
		$update['id_member'] = $data['id'];
		$update['updated_by'] = $data['nama'];
		$update['updated_at'] = date("Y-m-d H:i:s");
		$update['is_active'] = 0;
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
		$sql = $this->db->query("SELECT username FROM tb_member where username = '$username'");
		$cek_username = $sql->num_rows();

		if ($cek_username > 0) {
			$this->session->set_flashdata('update', 'USERNAME GAGAL DI UPDATE <br>USERNAME Sudah digunakan sebelumnya <br> Silahkan Masukan username yang baru');
			redirect(site_url('Welcome/DataPendaftaranMember'));
		} else {
			$this->MSudi->UpdateData('tb_member', 'id', $id, $update);
			redirect(site_url('Welcome/DataPendaftaranMember'));
		}
	}
	public function DeleteDataPendaftaranMember()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['id'] = $this->session->userdata('id');

		$id = $this->uri->segment('3');
		$update['is_active'] = 0;
		$update['deleted_by'] = $data['nama'];
		$update['deleted_at'] = date("Y-m-d H:i:s");

		$this->MSudi->UpdateData('tb_member', 'id', $id, $update);
		redirect(site_url('Welcome/DataPendaftaranMember'));
	}


	public function DataPembelianVoucher()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['id'] = $this->session->userdata('id');
		if ($this->uri->segment(4) == 'view') {
			$id = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tb_pembelian_voucher', 'id', $id)->row();
			$data['detail']['id'] = $tampil->id;
			$data['detail']['id_member'] = $tampil->id_member;
			$data['detail']['nama_paket'] = $tampil->nama_paket;
			$data['detail']['jumlah_voucher'] = $tampil->jumlah_voucher;
			$data['detail']['harga'] = $tampil->harga;
			$data['detail']['status'] = $tampil->status;
			$data['detail']['tgl_insert'] = $tampil->tgl_insert;
			// $data['detail']['created_by'] = $tampil->created_by;
			// $data['detail']['created_at'] = $tampil->created_at;
			// $data['detail']['updated_by'] = $tampil->updated_by;
			// $data['detail']['updated_at'] = $tampil->updated_at;
			// $data['detail']['deleted_by'] = $tampil->deleted_by;
			// $data['detail']['deleted_at'] = $tampil->deleted_at;
			$data['content'] = 'VFormUpdatePembelianVoucher';
		} else {
			// $join="tbl_staff.kd_staff = tbl_users.kd_staff AND tbl_pegawai.kd_pegawai = tbl_staff.kd_pegawai";
			// $data['DataUser']=$this->MSudi->GetData2Join('tbl_users','tbl_staff','tbl_pegawai', $join)->result();
			$data['DataPembelianVoucher'] = $this->MSudi->GetData('tb_pembelian_voucher');
			$data['content'] = 'VPembelianVoucher';
		}


		$this->load->view('welcome_message', $data);
	}


	public function VFormAddPembelianVoucher()
	{
		$data['nama'] = $this->session->userdata('nama');


		$data['content'] = 'VFormAddPembelianVoucher';
		$data['voucher'] = $this->MSudi->GetData('tb_voucher');

		$this->load->view('welcome_message', $data);
	}

	public function AddDataPembelianVoucher()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['id'] = $this->session->userdata('id');


		$add['id_member'] = $data['id'];
		$add['nama_paket'] = $this->input->post('nama_paket');
		$add['jumlah_voucher'] = $this->input->post('jumlah_voucher');
		$add['harga'] = $this->input->post('harga');
		$add['status'] = $this->input->post('status');
		$add['tgl_insert'] = date("Y-m-d H:i:s");
		$this->MSudi->AddData('tb_pembelian_voucher', $add);
		redirect(site_url('Welcome/DataPembelianVoucher'));
	}

	public function UpdateDataPembelianVoucher()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['id'] = $this->session->userdata('id');


		$id = $this->input->post('id');

		$update['id'] = $this->input->post('id');
		$update['nama_paket'] = $this->input->post('nama_paket');
		$update['jumlah_voucher'] = $this->input->post('jumlah_voucher');
		$update['harga'] = $this->input->post('harga');
		$update['status'] = $this->input->post('status');
		$update['tgl_insert'] = date("Y-m-d H:i:s");
		$this->MSudi->UpdateData('tb_pembelian_voucher', 'id', $id, $update);
		redirect(site_url('Welcome/DataPembelianVoucher'));
	}


	public function DeleteDataPembelianVoucher()
	{
		$data['nama'] = $this->session->userdata('nama');
		$id = $this->uri->segment('3');
		$this->MSudi->DeleteData('tb_pembelian_voucher', 'id', $id);
		redirect(site_url('Welcome/DataPembelianVoucher'));
	}

	public function DataHistoryTransferVoucher()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['id'] = $this->session->userdata('id');
		if ($this->uri->segment(4) == 'view') {
			$id = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tb_history_transfer_voucher', 'id', $id)->row();
			$data['detail']['id'] = $tampil->id;
			$data['detail']['id_member'] = $tampil->id_member;
			$data['detail']['id_voucher'] = $tampil->id_voucher;
			$data['detail']['id_penerima'] = $tampil->id_penerima;
			$data['detail']['tgl_insert'] = $tampil->tgl_insert;
			// $data['detail']['created_by'] = $tampil->created_by;
			// $data['detail']['created_at'] = $tampil->created_at;
			// $data['detail']['updated_by'] = $tampil->updated_by;
			// $data['detail']['updated_at'] = $tampil->updated_at;
			// $data['detail']['deleted_by'] = $tampil->deleted_by;
			// $data['detail']['deleted_at'] = $tampil->deleted_at;
			$data['content'] = 'VFormUpdateHistoryTransferVoucher';
		} else {
			// $join="tbl_staff.kd_staff = tbl_users.kd_staff AND tbl_pegawai.kd_pegawai = tbl_staff.kd_pegawai";
			// $data['DataUser']=$this->MSudi->GetData2Join('tbl_users','tbl_staff','tbl_pegawai', $join)->result();
			$data['DataHistoryTransferVoucher'] = $this->MSudi->GetData('tb_history_transfer_voucher');
			$data['content'] = 'VHistoryTransferVoucher';
		}

		$this->load->view('welcome_message', $data);
	}

	public function VFormAddHistoryTransferVoucher()
	{
		$data['nama'] = $this->session->userdata('nama');


		$data['content'] = 'VFormAddHistoryTransferVoucher';
		$data['id_voucher'] = $this->MSudi->GetData('tb_voucher');
		// $data['id_penerima'] = $this->MSudi->GetDataWhere('tb_member', 'is_active', 1)->result();

		$this->load->view('welcome_message', $data);
	}

	public function AddDataHistoryTransferVoucher()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['id'] = $this->session->userdata('id');

		$add['id_member'] = $data['id'];
		$add['id_voucher'] = $this->input->post('id_voucher');
		$add['id_penerima'] = $this->input->post('id_penerima');
		$add['tgl_insert'] = date("Y-m-d H:i:s");

		$this->MSudi->AddData('tb_history_transfer_voucher', $add);
		redirect(site_url('Welcome/DataHistoryTransferVoucher'));
	}

	public function UpdateDataHistoryTransferVoucher()
	{
		$data['nama'] = $this->session->userdata('nama');
		$data['id'] = $this->session->userdata('id');


		$id = $this->input->post('id');
		// $update['id_member'] = $data['id'];
		$update['id_voucher'] = $this->input->post('id_voucher');
		$update['id_penerima'] = $this->input->post('id_penerima');
		// $update['tgl_insert'] = date("Y-m-d H:i:s");

		$this->MSudi->UpdateData('tb_history_transfer_voucher', 'id', $id, $update);
		redirect(site_url('Welcome/DataHistoryTransferVoucher'));
	}


	public function DeleteDataHistoryTransferVoucher()
	{
		$data['nama'] = $this->session->userdata('nama');
		$id = $this->uri->segment('3');
		$this->MSudi->DeleteData('tb_history_transfer_voucher', 'id', $id);
		redirect(site_url('Welcome/DataHistoryTransferVoucher'));
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
