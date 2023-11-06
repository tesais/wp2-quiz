<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lat1 extends CI_Controller
{

	public function index()
	{
		$data['penumpang'] = $this->medel->tampil();
		$this->load->view('tampil', $data);
	}

	public function input()
	{
		$this->load->view('input_data');
	}

	public function simpan()
	{
		$this->load->model('Medel');

		// Data harga tiket berdasarkan kode pesawat dan kelas
		$harga_tiket = array(
			'GRD' => array(
				'Bisnis' => 900000,
				'Ekonomi' => 500000,
				'Eksklusif' => 1500000
			),
			'MPT' => array(
				'Bisnis' => 800000,
				'Ekonomi' => 400000,
				'Eksklusif' => 1200000
			),
			'BTV' => array(
				'Bisnis' => 700000,
				'Ekonomi' => 300000,
				'Eksklusif' => 1000000
			)
		);

		$data = array(
			'nama' => $this->input->post('nama'),
			'pesawat' => $this->input->post('pesawat'),
			'kelas' => $this->input->post('kelas'),
			'jml_tiket' => $this->input->post('jml_tiket'),
			'total' => $this->input->post('total')
		);

		// Mendapatkan kode pesawat dan kelas yang dipilih
		$kode_pesawat = $data['pesawat'];
		$kelas = $data['kelas'];

		// Mendapatkan harga tiket sesuai dengan kode pesawat dan kelas
		$harga = $harga_tiket[$kode_pesawat][$kelas];

		// Menghitung total harga tiket
		$total_harga = $harga * $data['jml_tiket'];

		$data['harga'] = $harga;
		$data['total'] = $total_harga;

		$this->Medel->simpan_tiket($data);

		redirect('lat1');
	}

	public function hapus($id)
	{
		$this->medel->hapus_data($id); // Panggil metode hapus_data di model

		redirect('lat1');
	}

	public function edit($id)
	{
		// Tampilkan form edit data dengan data yang sesuai berdasarkan $id
		$data['penumpang'] = $this->medel->get_by_id($id);

		$this->load->view('edit_data', $data);
	}

	public function update()
	{
		$id = $this->input->post('id'); // ID data yang akan diubah
		$data = array(
			'nama' => $this->input->post('nama'),
			'pesawat' => $this->input->post('pesawat'),
			'kelas' => $this->input->post('kelas'),
			'jml_tiket' => $this->input->post('jml_tiket'),
		);

		// Update data di database berdasarkan ID
		$this->medel->update_data($id, $data);

		redirect('lat1');
	}
}
