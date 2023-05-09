@extends('layout.layadmin2')

@section('containeradmin2')
  <div class="main-item">
    <div class="judul-tambah" style="flex: 1; margin-top: 8px; margin-bottom: 20px;"> Tambah Data Pelanggaran {{ auth()->user()->nama_pengadilan }}</div>
      <form action="/admin" method="post" onsubmit="return validateForm()">
        @csrf
        <?php
          $user_id = auth()->user()->id; // mendapatkan ID user yang sedang login
          $kode_pelanggaran = "PLG".$user_id."-".rand(10000,99999);
        ?>
        <div class="form-group">
          <label for="kode_pelanggaran"><strong>kode pelanggaran</strong></label>
          <input type="text" name="kode_pelanggaran" class="form-control @error('kode_pelanggaran') is-invalid @enderror" id="kode_pelanggaran" placeholder="kode_pelanggaran" value="{{ $kode_pelanggaran }}" required>
          @error('kode_pelanggaran')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <input type="hidden" name="user_id" class="form-control" id="user_id" value="{{ auth()->user()->id}}">
        </div>   
        <div class="form-group">
          <label for="date"><strong>tanggal putusan</strong></label>
          <input type="date" name="tanggal" class="form-control @error('date') is-invalid @enderror" id="date" placeholder="date" required>
          @error('date')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="pemohon"><strong>Pemohon</strong></label>
          <textarea class="form-control" name="pemohon" id="exampleFormControlTextarea1" placeholder="pemohon" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="tersangka"><strong>Tersangka</strong></label>
          <textarea class="form-control" name="tersangka" id="exampleFormControlTextarea1" placeholder="tersangka" rows="3"></textarea>
        </div>
        <?php
          $kecamatans = DB::table('kecamatans')
          ->join('kabupatens', 'kecamatans.kode_kab_id', '=', 'kabupatens.kode_kab')
          ->join('users', 'kabupatens.kode_kab', '=', 'users.kode_kab_id')
          ->select('kecamatans.*')
          ->where('users.id', '=', Auth::user()->id)
          ->get();
        ?>
        <div class="form-group">
          <label for="kecamatan"><strong>Kecamatan</strong></label>
          <select class="form-control" name="kecamatan" id="kecamatan" required>
              <option selected disabled>Pilih Kecamatan</option>
              @foreach ($kecamatans->where('kode_kab_id', $users->kode_kab_id) as $kecamatan)
                  <option value="{{ $kecamatan->kode_kec}}">{{ $kecamatan->nama_kec }}</option>
              @endforeach
          </select>
          <div class="add-icon">
            <a  href="{{ url('/kecamatan')}}"><i data-feather="plus-circle"></i></a>
            <span class="text">Tambah kecamatan baru</span>
          </div>
        </div>
        <div class="form-group">
          <label for="kode_des"> <strong>Desa</strong></label>
          <select class="form-control" name="kode_des" id="kode_des" required>
          <div class="add-icon">
            <a  href="{{ url('/desa')}}"><i data-feather="plus-circle"></i></a>
            <span class="text">Tambah desa baru</span>
          </div>
            <option selected disabled >Direktori</option>
            @foreach ($desas as $desa)
            <option value="{{ $desa->kode_des }}">{{ $desa->nama_des }}</option>
            @endforeach
          </select>
        </div>
        <!-- <div class="form-group">
            <label for="desa"><strong>Desa</strong></label>
            <select class="form-control" name="desa" id="desa" required>
                <option selected disabled>Pilih Desa</option>
            </select>
        </div> --> 
        <div class="form-group">
          <label for="kode_direktori"> <strong>Direktori</strong></label>
          <select class="form-control" name="kode_direktori" id="kode_direktori" required>
            <option selected disabled >Direktori</option>
            @foreach ($direktoris as $direktori)
            <option value="{{ $direktori->kode_direktori }}">{{ $direktori->nama_direktori }}</option>
            @endforeach
          </select>
        </div>
      <div class="form-group">
        <label for="kode_klasifikasi"><strong>Klasifikasi</strong></label>
        <div class="select-container">
          <select class="form-control" name="kode_klasifikasi" id="kode_klasifikasi" required>
            <option selected disabled>Klasifikasi</option>
          </select>
          <div class="add-icon">
            <a  href="{{ url('/klasifikasi')}}"><i data-feather="plus-circle"></i></a>
            <span class="text">Tambah klasifikasi baru</span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="deskripsi"><strong>Deskripsi</strong></label>
        <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" placeholder="deskripsi" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="latitudea"><strong>Latitude</strong></label>
        <input class="form-control" name="latitude" id="latitude" placeholder="latitude" rows="3"></input>
      </div>
      <div class="form-group">
        <label for="longitude"><strong>Longitude</strong></label>
        <input class="form-control" name="longitude" id="longitude" placeholder="longitude" rows="3"></input>
      </div>
        <div id="map" style="width: 600px; height: 400px;"></div>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
    </form>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

  
  <script> 
  function autoResize(textarea) {
    textarea.style.height = "auto";
    textarea.style.height = (textarea.scrollHeight) + "px";
    }
  </script>

  <script>
    feather.replace();
  </script>

<script>
  const map = L.map('map', {
    center: [5.5590904, 95.2926264],
    zoom: 15,
  });
  
  const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  }).addTo(map);
  
  @foreach ($geojson_kecamatan as $listkec)
    $.getJSON("{{ $listkec->geojson_kec }}", function(data) {
        var geojsonLayer = L.geoJSON(data, {
            onEachFeature: function(feature, layer) {
                // kode lainnya di sini
            }
        });
        geojsonLayer.addTo(map);
    });
@endforeach
  // get coordinate location inputs
  var LatInput = document.querySelector("[name=latitude]");
  var LngInput = document.querySelector("[name=longitude]");

  // set initial map location and marker
  var curLocation = [4.1908315, 96.4750404];
  map.attributionControl.setPrefix(false);
  var marker = new L.marker(curLocation, {
    draggable: true,
  });

  // set marker dragend event listener to update input fields
  marker.on('dragend', function(event){
    var position = marker.getLatLng();
    marker.setLatLng(position, { draggable: true })
      .bindPopup(position)
      .update();
    LatInput.value = position.lat;
    LngInput.value = position.lng;
  });

  // set map click event listener to update marker position and input fields
  map.on('click', function(event){
    var position = event.latlng;
    marker.setLatLng(position, { draggable: true })
      .bindPopup(position)
      .update();
    LatInput.value = position.lat;
    LngInput.value = position.lng;
  });

  // add marker to map
  map.addLayer(marker);
</script>

  <script>
    $(document).ready(function() {
    $('#kode_direktori').on('change', function() {
    var direktoriID = $(this).val();
    console.log(direktoriID)
    // jenisID = 'acehpu' ; //disini harus jenis ID tapi belom mau
    jenisID = "{{ Auth::user()->kode_jenis_id }}"; // mengambil jenis user dari objek user
    console.log(jenisID)
    if(direktoriID) {
      $.ajax({
      url: '/add_item_pelanggaran/'+direktoriID+'/'+jenisID,
      type: "GET",
      data : {"_token":"{{ csrf_token() }}", "kode_jenis_id":jenisID},
      dataType: "json",
      success:function(data){
        if(data){
          $('#kode_klasifikasi').empty();
          $('#kode_klasifikasi').append('<option hidden>Klasifikasi</option>');
          $.each(data, function(key, value){
          $('select[name="kode_klasifikasi"]').append('<option value="'+ value.kode_klasifikasi+'">' + value.nama_klasifikasi+ '</option>');
          // console.log($('select[name="kode_klasifikasi"]').append('<option value="'+ key.kode_klasifikasi+'">' + value.nama_klasifikasi+ '</option>'));
          });
        }else{
          $('#kode_klasifikasi').empty();
        }
      }});
    }else{
      $('#kode_klasifikasi').empty();
    }
    });
    });
  </script>







  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  @if ($errors->any())
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Isi data dengan lengkap',
      text: '{{ $errors->first() }}',
    });
  </script>
  @endif

@endsection