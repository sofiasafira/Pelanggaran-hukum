@extends('layout.layadmin3')

@section('containeradmin3')
<?php
  $user_id = auth()->user()->id; // mendapatkan ID user yang sedang login
  $kode_pelanggaran = "PLG".$user_id."-".rand(10000,99999);
  $kecamatans = DB::table('kecamatans')
          ->join('kabupatens', 'kecamatans.kode_kab_id', '=', 'kabupatens.kode_kab')
          ->join('users', 'kabupatens.kode_kab', '=', 'users.kode_kab_id')
          ->select('kecamatans.*')
          ->where('users.id', '=', Auth::user()->id)
          ->get();
?>
<div class="main-item2">
  <div class="judul-tambah" style="flex: 1; margin-top: 8px; margin-bottom: 20px;"> Tambah Data Pelanggaran {{ auth()->user()->nama_pengadilan }}</div>
  <div style="flex: 1; margin-top: 0px; margin-bottom: 20px; font-weight: bold;">Keterangan: tanda <span class="required" style="color: red">*</span> wajib diisi </div>
  <form action="/admin" method="post" onsubmit="return validateForm()">
  @csrf
    <div class="left-column">
      <label for="kode_pelanggaran"><strong>Kode Pelanggaran</strong> <span class="required">*</span></label>
      <input type="text" name="kode_pelanggaran" class="form-control @error('kode_pelanggaran') is-invalid @enderror" id="kode_pelanggaran" placeholder="kode_pelanggaran" value="{{ $kode_pelanggaran }}" required>
      @error('kode_pelanggaran')
      <div class="invalid-feedback">
      {{ $message }}
      </div>
      @enderror

      <input type="hidden" name="user_id" class="form-control" id="user_id" value="{{ auth()->user()->id}}">

      <label for="date"><strong>Tanggal Putusan</strong> <span class="required">*</span></label>
      <input type="date" name="tanggal" class="form-control @error('date') is-invalid @enderror" id="date" placeholder="date" required>
      @error('date')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror

      <label for="pemohon"><strong>Pemohon/Penggugat/Saksi</strong> <span class="required">*</span></label>
      <textarea class="form-control" name="pemohon" id="exampleFormControlTextarea1" placeholder="Pemohon" rows="3"></textarea>

      <label for="tersangka"><strong>Tersangka/Terdakwa/Tergugat</strong> <span class="required">*</span></label>
      <textarea class="form-control" name="tersangka" id="exampleFormControlTextarea1" placeholder="Tersangka" rows="3"></textarea>
      
      <label for="kecamatan"><strong>Kecamatan</strong> <span class="required">*</span></label>
      <select class="form-control" name="kecamatan" id="kecamatan" onchange="zoomKecamatan()" required>
        <option selected disabled>Pilih Kecamatan</option>
        @foreach ($kecamatans->where('kode_kab_id', $users->kode_kab_id) as $kecamatan)
        <option value="{{ $kecamatan->kode_kec}}">{{ $kecamatan->nama_kec }}</option>
        @endforeach
      </select>

      <label for="kode_des"><strong>Desa</strong> <span class="required">*</span></label>
      <select class="form-control" name="kode_des" id="kode_des" required>
      <option selected disabled>Pilih Desa</option>
      </select>


      <label for="kode_direktori"> <strong>Direktori</strong> <span class="required">*</span></label>
      <select class="form-control" name="kode_direktori" id="kode_direktori" required>
        <option selected disabled >Pilih Direktori</option>
        @foreach ($direktoris as $direktori)
        <option value="{{ $direktori->kode_direktori }}">{{ $direktori->nama_direktori }}</option>
        @endforeach
      </select>
      
      <label for="kode_klasifikasi"><strong>Klasifikasi</strong> <span class="required">*</span></label>
          <select class="form-control" name="kode_klasifikasi" id="kode_klasifikasi" required>
            <option selected disabled>Pilih Klasifikasi</option>
          </select>
    </div>
    
    <div class="right-column">
      
      <label for="deskripsi"><strong>Deskripsi</strong></label>
      <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" placeholder="Deskripsi" rows="3"></textarea>
      
      <label for="latitudea"><strong>Latitude</strong></label>
      <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Silahkan klik pada peta" rows="3"></input>
      
      <label for="longitude"><strong>Longitude</strong></label>
      <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Silahkan klik pada peta" rows="3"></input>
      
      <div>
      <div id="map" style="width: 500px; height: 300px;"></div>
      </div>
      <button type="submit">Submit</button>
    </div>
  </form>
</div>

<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script> 
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>


<script> 
  function autoResize(textarea) {
    textarea.style.height = "auto";
    textarea.style.height = (textarea.scrollHeight) + "px";
  }
</script>

<script>

// Buat const map dengan center yang diambil dari tabel user
const map = L.map('map', {
  center: [{{auth()->user()->latitude}}, {{auth()->user()->longitude}}],
  zoom: 13,
});


  
  const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 25,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  }).addTo(map);
  L.Control.geocoder().addTo(map);
  
  

// Ambil semua layer desa
var allDesaLayers = [];
map.eachLayer(function(layer) {
  if (layer.feature && layer.feature.properties && layer.feature.properties.nama_desa) {
    allDesaLayers.push(layer);
  }
});

function getRandomColor(input) {
    var seed = 0;
    for (var i = 0; i < input.length; i++) {
        seed += input.charCodeAt(i);
    }
    var hue = Math.abs(Math.sin(seed) * 360);
    return "hsl(" + hue + ", 70%, 50%)";
}


  @foreach ($desas as $listdesa)
    $.getJSON("{{ $listdesa->geojson_des }}", function(data) {
        var desaLayer = L.geoJSON(data, {
            style: {
                color: 'black', // set warna garis pinggir menjadi hitam
                weight: 1,
                opacity: 1,
                dashArray: '3',
                fillOpacity: 0.2,
            },
            onEachFeature: function(feature, layer) {
              layer.feature.properties.nama_desa = "{{ $listdesa->nama_des }}";
              layer.bindTooltip(
              "{{ $listdesa->nama_des }}", {
              permanent: true,
              direction: "center",
              className: "custom-tooltip",
              maxWidth: 10 // sesuaikan nilai maxWidth sesuai kebutuhan
            });
            }        
        });
        desaLayer.addTo(map);
    });
@endforeach

@foreach ($geojson_kabupaten as $kab)
    $.getJSON("{{ $kab->geojson_kab }}", function(data) {
        var kabupatenLayer = L.geoJSON(data, {
            style: {
                color: 'black', // set warna garis pinggir menjadi hitam
                weight: 1,
                opacity: 1,
                dashArray: '3',
                fillOpacity: 0.2,
            },      
        });
        kabupatenLayer.addTo(map);
    });
@endforeach

function updateTooltipFontSize(e) {
  var zoom = map.getZoom();
  var scaleFactor = 1.5; // sesuaikan sesuai kebutuhan
  var newFontSize = Math.max(8, Math.min(20, zoom * scaleFactor)); // sesuaikan rentang ukuran font yang diinginkan

  // jika zoom level menurun, bagikan ukuran font
  if (zoom < 18) {
    newFontSize /= (18 - zoom);
  }

  // ubah ukuran font tooltip
  $('.leaflet-tooltip').css({
    'font-size': newFontSize + 'px'
  });
}

// panggil fungsi updateTooltipFontSize ketika zoom level berubah
map.on('zoomend', updateTooltipFontSize);

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

<script>
    $(document).ready(function() {
    $('#kecamatan').on('change', function() {
    var kecID = $(this).val();
    console.log(kecID)
    // jenisID = 'acehpu' ; //disini harus jenis ID tapi belom mau
    // jenisID = "{{ Auth::user()->kode_jenis_id }}"; // mengambil jenis user dari objek user
    if(kecID) {
      $.ajax({
      url: '/des/'+kecID,
      type: "GET",
      data : {"_token":"{{ csrf_token() }}"},
      dataType: "json",
      success:function(data){
        if(data){
          $('#kode_des').empty();
          $('#kode_des').append('<option hidden>Desa</option>');
          $.each(data, function(key, value){
          $('select[name="kode_des"]').append('<option value="'+ value.kode_des+'">' + value.nama_des+ '</option>');
          // console.log($('select[name="kode_klasifikasi"]').append('<option value="'+ key.kode_klasifikasi+'">' + value.nama_klasifikasi+ '</option>'));
          });
        }else{
          $('#kode_des').empty();
        }
      }});
    }else{
      $('#kode_des').empty();
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