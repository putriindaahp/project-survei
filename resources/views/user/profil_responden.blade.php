@extends('user.index')

@section('content')
    @include('sweetalert::alert')
    <div class="card-body">
        <p class="fw-bold">PROFIL RESPONDEN</p>
        <p class="fst-italic" style="font-size: 12px; color: #3b4568"><span class="text-danger">*</span>Mohon isi seluruh data
            dengan benar</p>
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" action="{{ url('/profile') }}" method="post" novalidate>
                    @csrf

                    <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
                    <input required type="text" class="form-control" id="nama" placeholder="" name="nama"
                        value="{{ Session::has('profile') ? $profiles['nama'] : '' }}" />

                    <div class="mt-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input required type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="" name="email"
                            value="{{ Session::has('profile') ? $profiles['email'] : '' }}" />
                        @error('no_hp')
                            <div class="alert alert-danger mt-1">
                                {{ 'Masukkan email dengan benar' }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="no_hp" class="form-label fw-bold">No. HP</label>
                        <input required type="number" class="form-control @error('no_hp') is-invalid @enderror"
                            id="no_hp" placeholder="" name="no_hp"
                            value="{{ Session::has('profile') ? $profiles['no_hp'] : '' }}" />
                        @error('no_hp')
                            <div class="alert alert-danger mt-1">
                                {{ 'Masukkan nomor HP dengan benar' }}</div>
                        @enderror
                    </div>

                    <label for="gender" class="form-label fw-bold mt-3">Jenis Kelamin</label>
                    <select required class="form-select" id="gender" name="gender">
                        <option selected disabled value="">-- Pilih Jenis Kelamin --</option>
                        <option value="L"
                            {{ Session::has('profile') ? ($profiles['gender'] == 'L' ? 'selected' : '') : '' }}>Pria
                        </option>
                        <option value="P"
                            {{ Session::has('profile') ? ($profiles['gender'] == 'P' ? 'selected' : '') : '' }}>Wanita
                        </option>
                    </select>

                    <label for="usia" class="form-label fw-bold mt-3">Usia</label>
                    <input required type="number" class="form-control" id="usia" placeholder="" name="usia"
                        max="100" value="{{ Session::has('profile') ? $profiles['usia'] : '' }}" />

                    <label for="kategori_responden" class="form-label fw-bold mt-3">Kategori Responden</label>
                    <select required class="form-select" id="kategori_responden" name="kategori_responden">
                        <option selected disabled value="">-- Pilih Kategori Responden --</option>
                        <option value="Instansi (K/L) Pusat"
                            {{ Session::has('profile') ? ($profiles['kategori_responden'] == 'cat1' ? 'selected' : '') : '' }}>
                            Instansi (K/L) Pusat</option>
                        <option value="Provinsi Se-Indonesia"
                            {{ Session::has('profile') ? ($profiles['kategori_responden'] == 'cat2' ? 'selected' : '') : '' }}>
                            Provinsi Se-Indonesia</option>
                        <option value="Kab-Kota di Jawa Timur"
                            {{ Session::has('profile') ? ($profiles['kategori_responden'] == 'Kab-Kota di Jawa Timur' ? 'selected' : '') : '' }}>
                            Kab-Kota di Jawa Timur</option>
                        <option value="BUMN-BUMD"
                            {{ Session::has('profile') ? ($profiles['kategori_responden'] == 'BUMN-BUMD' ? 'selected' : '') : '' }}>
                            BUMN-BUMD</option>
                    </select>

                    <label for="jabatan" class="form-label fw-bold mt-3">Jabatan</label>
                    <select required class="form-select" id="jabatan" name="jabatan">
                        <option selected disabled value="">-- Pilih Jenis Jabatan --</option>
                        <option value="Jabatan Pimpinan Tinggi"
                            {{ Session::has('profile') ? ($profiles['jabatan'] == 'Jabatan Pimpinan Tinggi' ? 'selected' : '') : '' }}>
                            Jabatan Pimpinan Tinggi</option>
                        <option value="Administrator"
                            {{ Session::has('profile') ? ($profiles['jabatan'] == 'Administrator' ? 'selected' : '') : '' }}>
                            Administrator</option>
                        <option value="Pengawas"
                            {{ Session::has('profile') ? ($profiles['jabatan'] == 'POLRI' ? 'selected' : '') : '' }}>POLRI
                        </option>
                        <option value="Fungsional"
                            {{ Session::has('profile') ? ($profiles['jabatan'] == 'Fungsional' ? 'selected' : '') : '' }}>
                            Fungsional</option>
                        <option value="Pelaksana"
                            {{ Session::has('profile') ? ($profiles['jabatan'] == 'Pelaksana' ? 'selected' : '') : '' }}>
                            Pelaksana</option>
                        <option value="Non-ASN"
                            {{ Session::has('profile') ? ($profiles['jabatan'] == '"Non-ASN' ? 'selected' : '') : '' }}>
                            Non-ASN</option>
                        <option value="Lainnya"
                            {{ Session::has('profile') ? ($profiles['jabatan'] == 'Lainnya' ? 'selected' : '') : '' }}>
                            Lainnya</option>
                    </select>

                    <label for="pendidikan" class="form-label fw-bold mt-3">Pendidikan</label>
                    <select required class="form-select" id="pendidikan" name="pendidikan">
                        <option selected disabled value="">-- Pilih Jenis Pendidikan --</option>
                        <option value="SD"
                            {{ Session::has('profile') ? ($profiles['pendidikan'] == 'SD' ? 'selected' : '') : '' }}>SD
                        </option>
                        <option value="SLTP"
                            {{ Session::has('profile') ? ($profiles['pendidikan'] == 'SLTP' ? 'selected' : '') : '' }}>SLTP
                        </option>
                        <option value="SLTA"
                            {{ Session::has('profile') ? ($profiles['pendidikan'] == 'SLTA" ' ? 'selected' : '') : '' }}>
                            SLTA
                        </option>
                        <option value="Diploma"
                            {{ Session::has('profile') ? ($profiles['pendidikan'] == 'Diploma' ? 'selected' : '') : '' }}>
                            Diploma</option>
                        <option value="Sarjana"
                            {{ Session::has('profile') ? ($profiles['pendidikan'] == 'Sarjana' ? 'selected' : '') : '' }}>
                            Sarjana</option>
                        <option value="Pascasarjana"
                            {{ Session::has('profile') ? ($profiles['pendidikan'] == 'Pascasarjana' ? 'selected' : '') : '' }}>
                            Pascasarjana</option>
                        <option value="Lainnya"
                            {{ Session::has('profile') ? ($profiles['pendidikan'] == 'Lainnya' ? 'selected' : '') : '' }}>
                            Lainnya</option>
                    </select>
                    <br />
                    <div class="text-end">
                        <button type="submit" class="btn mt-3"
                            style="background-color: #001a76; color: white">Selanjutnya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
