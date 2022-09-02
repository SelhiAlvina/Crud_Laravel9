<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('karyawans.update', $karyawan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama_karyawan') is-invalid @enderror" name="nama_karyawan" value="{{ old('nama_karyawan', $karyawan->nama_karyawan) }}" placeholder="Masukkan Nama">
                            
                            
                                <!-- error message untuk nama -->
                                @error('nama_karyawan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jenis Kelamin 
                                </label>
                                <div class="col-sm-10">
                                <select name="jk_karyawan" class="form-control">
                                    <option value="{{ old('jk_karyawan', $karyawan->jk_karyawan) }}">-Pilih-</option>
                                    <option @if(old('jk_karyawan')=='Laki-Laki') selected @endif value="Laki-Laki">Laki-Laki</option>
                                    <option @if(old('jk_karyawan')=='Perempuan') selected @endif value="Perempuan">Perempuan</option>
                                </select>
                                </div>
                                @error('jk_karyawan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('dob_karyawan') is-invalid @enderror" name="dob_karyawan" value="{{ old('dob_karyawan', $karyawan->dob_karyawan) }}" placeholder="Masukkan Tanggal Lahir">
                            
                                <!-- error message untuk tanggal lahir-->
                                @error('dob_karyawan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Alamat Karyawan</label>
                                <input type="text" class="form-control @error('alamat_karyawan') is-invalid @enderror" name="alamat_karyawan" value="{{ old('alamat_karyawan', $karyawan->alamat_karyawan) }}" placeholder="Masukkan Alamat Karyawan">
                            
                                <!-- error message untuk Asal Grup-->
                                @error('alamat_karyawan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>