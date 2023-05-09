@extends('layout.layadmin2')

@section('containeradmin2')

<div class="main-show" >
  <table style="margin: 0 auto; color: white; width: 80%; color: black">
    <tr>
        <td style="padding: 10px;">Kode Data Pelanggaran</td>
        <td style="padding: 10px; text-align: right;">
            <span style="font-size: 1em;"> {{ $data_pelanggaran->kode_pelanggaran }}</span>
        </td>
    </tr>
    <tr>
        <td style="padding: 10px;">Deskripsi</td>
        <td style="padding: 10px; text-align: right;">
            <span style="font-size: 1em;"> {{ $data_pelanggaran->deskripsi }}</span>
        </td>
    </tr>
    <tr>
        <td style="padding: 10px;">Tanggal Putusan</td>
        <td style="padding: 10px; text-align: right;">
            <span style="font-size: 1em;">{{ date('Y-m-d', strtotime($data_pelanggaran->tanggal)) }}</span>
        </td>
    </tr>
    <tr>
        <td style="padding: 10px;">Pemohon</td>
        <td style="padding: 10px; text-align: right;">
            <span style="font-size: 1em;"> {{ $data_pelanggaran->pemohon }}</span>
        </td>
    </tr>
    <tr>
        <td style="padding: 10px;">Penggugat</td>
        <td style="padding: 10px; text-align: right;">
            <span style="font-size: 1em;"> {{ $data_pelanggaran->tersangka }}</span>
        </td>
    </tr>
    <tr>
        <td style="padding: 10px;">Kecamatan</td>
        <td style="padding: 10px; text-align: right;">
            <span style="font-size: 1em;"> {{ $kecamatan->nama_kec }}</span>
        </td>
    </tr>
    <tr>
        <td style="padding: 10px;">Desa</td>
        <td style="padding: 10px; text-align: right;">
            <span style="font-size: 1em;"> {{ $desa->nama_des }}</span>
        </td>
    </tr>
    <tr>
        <td style="padding: 10px;">Direktori</td>
        <td style="padding: 10px; text-align: right;">
            <span style="font-size: 1em;">{{ $direktori->nama_direktori }}</span>
        </td>
    </tr>
    <tr>
        <td style="padding: 10px;">Klasifikasi</td>
        <td style="padding: 10px; text-align: right;">
            <span style="font-size: 1em;"> {{ $klasifikasi->nama_klasifikasi }}</span>
        </td>
    </tr>
  </table>
</div>
@endsection

