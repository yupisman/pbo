<?php

Class HomeController
{
    public function index()
    {
        $tugas = db_select('SELECT id, nama, selesai_pada, dibuat_pada FROM tugas ORDER BY selesai_pada, dibuat_pada DESC');
        return render_view('home', compact('tugas'));
    }

    public function store()
    {
        $res = db_run('INSERT INTO tugas (nama, dibuat_pada) VALUES (?, now())', [req_post('nama')]);
        if($res->errorCode() == '00000'){
            flash_set('pesan', 'Data berhasil disimpan');
        } else {
            flash_set('pesan', 'Data gagal disimpan dengan pesan: <pre>' . $res->errorInfo() . '</pre>');
        }
        redirect_to(base_url('/'));
    }

    public function update($id) {
        $res = db_run('UPDATE tugas SET selesai_pada = now() where id = ?', [$id]);
        if($res->errorCode() == '00000'){
            flash_set('pesan', 'Data berhasil diupdate');
        } else {
            flash_set('pesan', 'Data gagal diupdate dengan pesan: <pre>' . $res->errorInfo() . '</pre>');
        }
        redirect_to(base_url('/'));
    }

    public function delete($id) {
        $res = db_run('DELETE FROM tugas WHERE id = ?', [$id]);
        if($res->errorCode() == '00000'){
            flash_set('pesan', 'Data 3' . $id . ' berhasil dihapus');
        } else {
            flash_set('pesan', 'Data gagal dihapus dengan pesan: <pre>' . $res->errorInfo() . '</pre>');
        }
        redirect_to(base_url('/'));
    }
}
