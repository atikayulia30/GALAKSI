@extends('admin.layout')

@section('content')

<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Data Video</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div style="float:right;">
                                <button data-bs-toggle="modal" data-bs-target="#tambahVendor"
                                    class="btn btn-primary">Tambah</button>
                            </div>
                            <table class="datatables display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Judul</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($video as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_kategori }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->nama_mapel }}</td>
                                        <td>{{ $item->deskripsi }}</td>

                                        <td>
                                            <button style='width:120px;' onclick="editVendor({{ $item->id }})"
                                                class="btn btn-primary btn-sm"
                                                id="btn-edit{{ $item->id }}">Edit</button>
                                            <form action="{{ url('/admin/vendor/hapus') }}" method="post"
                                                style="display:inline;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <button style="width:120px;margin-top:10px;"
                                                    onclick="return confirm('Yakin ingin menghapus vendor?')"
                                                    type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="tambahVendor" tabindex="-1" aria-labelledby="tambahVendorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahVendorLabel">Tambah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route("admin.materi.store") }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method("POST")
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputJudul" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="inputJudul" name="judul" required>
                            </div>
                            <div class="form-group">
                                <label for="inputMapel" class="form-label">Mata Pelajaran</label>
                                <select name="id_mapel" id="inputMapel" class="form-control" required>
                                    <option value="">Pilih Mata Pelajaran</option>
                                    @foreach ($mapel as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_mapel }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputKelas" class="form-label">Kelas</label>
                                <select name="id_kelas" id="inputKelas" class="form-control" required>
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputVideo" class="form-label">Video</label>
                                <input type="file" class="form-control" accept="video/mp4,video/avi,video/wmv,video/mov"
                                    id="inputVideo" name="video" required>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputGambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control" accept="image/*" id="inputGambar" name="gambar"
                                    required>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputPDF" class="form-label">File</label>
                                <input type="file" class="form-control" accept="application/pdf" id="inputPDF"
                                    name="file_materi" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDeskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="summernote" id="inputDeskripsi" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
        </div>

        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editVendor" tabindex="-1" aria-labelledby="editVendorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editVendorLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEdit" action="{{ url('/admin/vendor/edit/') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" class="form-control" id="editId" name="id" required>
                            <div class="form-group">
                                <label for="editJudul" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="editJudul" name="judul" required>
                            </div>
                            <div class="form-group">
                                <label for="editMapel" class="form-label">Mata Pelajaran</label>
                                <select name="id_mapel" id="editMapel" class="form-control" required>
                                    <option value="">Pilih Mata Pelajaran</option>
                                    @foreach ($mapel as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_mapel }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editKelas" class="form-label">Kelas</label>
                                <select name="id_kategori" id="editKelas" class="form-control" required>
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editVideo" class="form-label">Video</label>
                                <input type="file" class="form-control" accept="video/mp4,video/avi,video/wmv,video/mov"
                                    id="editVideo" name="video">
                                <a href="" id="lihatVideo" target="_blank" class="btn btn-succes">Lihat Video</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputGambar" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" accept="image/*" id="inputGambar"
                                        name="gambar">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputPDF" class="form-label">File</label>
                                    <input type="file" class="form-control" accept="application/pdf" id="inputPDF"
                                        name="file_materi">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editDeskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="summernote" id="editDeskripsi" required></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200,
            tabsize: 2
        });
    });
    function editVendor(id){
        $.ajax({
            url: "{{ url('/admin/vendor/detail') }}/"+id,
            type: 'GET',
            dataType: 'json',
            beforeSend:function () {
                $('#btn-edit'+id).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`).attr('disabled',true);
            },
            success: function(response){
                $('#editId').val(response.id);
                $('#formEdit').attr("action", "{{ url('/admin/vendor/edit') }}/" +id);
                $('#editJudul').val(response.judul);
                $('#editDeskripsi').summernote('code', response.deskripsi);
                $("#editKelas option").removeAttr('selected');
                $(`#editKelas option[value='${response.id_kategori}']`).attr('selected',true);
                $("#editMapel option").removeAttr('selected');
                $(`#editMapel option[value='${response.id_mapel}']`).attr('selected',true);
                $('#lihatVideo').attr('href', "{{ asset('storage') }}/"+ response.video);
                $('#editId').val(response.id);
                $('#editVendor').modal('show');
                $('#btn-edit'+id).html('Edit').attr('disabled',false);
            }
        });
    }
</script>
@endsection