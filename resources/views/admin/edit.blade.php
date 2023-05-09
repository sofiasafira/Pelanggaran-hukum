@extends('layout.layadmin3')

@section('containeradmin3')

<div class="main-item2">
  <div class="judul-tambah" style="flex: 1; margin-top: 8px; margin-bottom: 20px;"> Edit Data Pelanggaran {{ auth()->user()->nama_pengadilan }}</div>
    <form method="post" action="{{ route('admin.update', $data_pelanggaran->kode_pelanggaran) }}">  
    @csrf
      @method('PUT')
      <div class="left-column">
          <label for="tanggal">Tanggal Putusan:</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal"  value="{{ $data_pelanggaran->tanggal }}">

          <label for="pemohon">Pemohon</label>
          <textarea class="form-control" id="pemohon" name="pemohon" rows="3">{{ $data_pelanggaran->pemohon }}</textarea>

          <label for="tersangka">Tersangka</label>
          <textarea class="form-control" id="tersangka" name="tersangka" rows="3">{{ $data_pelanggaran->tersangka}}</textarea>


          <label for="kecamatan"><strong>Kecamatan</strong> <span class="required">*</span></label>
          <div class="input-group">
            <select class="form-control" name="kecamatan" id="kecamatan" onchange="zoomKecamatan()" required>
              <option selected disabled>{{ $datas_pelanggaran->nama_kec }}</option>
              @foreach ($kecamatans->where('kode_kab_id', $users->kode_kab_id) as $kecamatan)
              <option value="{{ $kecamatan->kode_kec}}">{{ $kecamatan->nama_kec }}</option>
              @endforeach
            </select>
          </div>

          <label for="kode_des"> <strong>Desa</strong> <span class="required">*</span></label>
            <select class="form-control" name="kode_des" id="kode_des" onchange="zoomDesa()" required>
              <option selected disabled >{{ $datas_pelanggaran->nama_des }}</option>
              @foreach ($desas as $desa)
              <option value="{{ $desa->kode_des }}">{{ $desa->nama_des }}</option>
              @endforeach
            </select>

          <label for="nama_direktori">Direktori:</label>
            <select class="form-control" name="kode_direktori" id="kode_direktori" required >
              <option selected disabled >{{ $datas_pelanggaran->nama_direktori }}</option>
                @foreach ($direktoris as $direktori)
                  <option value="{{ $direktori->kode_direktori }}">{{ $direktori->nama_direktori }}</option>
                @endforeach
            </select>
      
          <label for="nama_klasifikasi">Klasifikasi:</label>
            <select class="form-control" name="kode_klasifikasi" id="kode_klasifikasi" required>
              <option selected disabled >{{ $datas_pelanggaran->nama_klasifikasi }}</option>
            </select>
      </div>
    
      <div class="right-column">
      
        <label for="deskripsi">Deskripsi:</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $data_pelanggaran->deskripsi }}</textarea>
        
        <label for="latitude">Latitude:</label>
        <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $data_pelanggaran->latitude }}">
        
        <label for="longitude">Longitude:</label>
        <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $data_pelanggaran->longitude }}">
         
        <div>
        <div id="map" style="width: 500px; height: 300px;"></div>
        </div>
        
        <button class="w-100 btn btn-lg btn-primary" type="submit">Edit</button>
      </div>
    </form>
  </div>
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

<!-- <script>
    // you want to get it of the window global
    const providerOSM = new GeoSearch.OpenStreetMapProvider();

    //leaflet map
    var leafletMap = L.map('map', {
    fullscreenControl: true,
    // OR
    fullscreenControl: {
        pseudoFullscreen: false // if true, fullscreen to page width and height
    },
    minZoom: 2
    }).setView([5.5590904, 95.2926264], 15);

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(leafletMap);
    
    let theMarker = {};

    leafletMap.on('click',function(e) {
        let latitude  = e.latlng.lat.toString().substring(0,15);
        let longitude = e.latlng.lng.toString().substring(0,15);

        let popup = L.popup()
            .setLatLng([latitude,longitude])
            .setContent("Kordinat : " + latitude +" - "+  longitude )
            .openOn(leafletMap);

        if (theMarker != undefined) {
            leafletMap.removeLayer(theMarker);
        };
        theMarker = L.marker([latitude,longitude]).addTo(leafletMap);  
    });

    const search = new GeoSearch.GeoSearchControl({
        provider: providerOSM,
        style: 'bar',
        searchLabel: 'Sinjai',
    });

    leafletMap.addControl(search); 
</script> -->

<script>
  const map = L.map('map', {
    center: [5.55505464, 95.2930712],
    zoom: 14,
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