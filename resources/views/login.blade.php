@extends('layout.layadmin')

@section('containeradmin')
<div class="main-login">
  <div class="row justify-content-center">
    <div class="col-md-1">
      @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <main class="form-signin w-100 m-auto">
        <form action="/login" method="POST">
        @csrf
          <h1 class="h3 mb-3 fw-normal block justify-content-center">Please Login</h1>
          <div class="form-floating">
            <input type="text" class="form-control input-same-size @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" required value="{{ old('username') }}">
            <label for="username"></label>
            @error('username')
            <div class="invalid-feedback">
            {{ $message }} </div>  
            @enderror
          </div>
          <div class="form-floating">
          <input type="password" name="password" class="form-control input-same-size @error('password') is-invalid @enderror" id="password" placeholder="Password">
            <label for="password"></label>
            @error('password')
            <div class="invalid-feedback">
            {{ $message }} </div>
            @enderror
          </div>
          <button class="btn-custom" type="submit">MASUK</button>
        </form>
      </main>
    </div>
  </div>
</div>
<div class="main" style="margin-top: 20px; margin: 20px; padding: 20px; border: 1px solid #9d8e1e;">
  <div class="gambar-deskripsi">
    <img src="assets-umum/images/MA.jpg" alt="Contoh Gambar">
      <div style= "color: #dbf8f5">
        <h3 style="display: block;"><strong>MAHKAMAH AGUNG</strong></h3>
          <p style= "text-align: justify;">Peradilan adalah segala sesuatu atau proses peradilan yang berlangsung di pengadilan yang berkaitan dengan tugas penyidikan, mengadili, 
            dan mengadili perkara dengan menerapkan undang-undang atau menetapkan undang-undang “khusus” Untuk memelihara dan menjamin ditaatinya 
            hukum substantif dengan menerapkan cara-cara prosedural yang ditetapkan oleh hukum. </p>
          <p style="margin-top: 10px; text-align: justify;">Lembaga peradilan tertinggi di Indonesia adalah Mahkamah Agung dan lembaga peradilan yang 
            lebih rendah dibawah naungan Mahkamah Agung adalah Badan Peradilan Umum terdiri atas Pengadilan Tinggi dan Pengadilan Negeri; 
            Badan Peradilan Agama terdiri atas Pengadilan Tinggi Agama dan Pengadilan Agama; Badan Peradilan Militer terdiri atas Pengadilan Militer Utama, 
            Pengadilan Militer Tinggi dan Pengadilan Militer; Badan Peradilan Tata Usaha Negara terdiri atas Pengadilan Tinggi Tata Usaha Negara dan Pengadilan 
            Tata Usaha Negara.</p>
          <a href="/tentang" class="button-readmore">Baca Selengkapnya</a>
    </div>
  </div>
</div>

@endsection