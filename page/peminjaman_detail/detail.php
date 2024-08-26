<!-- Form Simpan Transaksi Peminjaman -->
<div class="container  mt-5">
    <div class="card">
        <div class="card-body ">
            <form method="POST">

                <div class="row text-center ">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Id Pinjam</label>
                                <input type="text" name="tanggal_pinjam" placeholder="Masukkan  tanggal pinjam"
                                    class="form-control">
                            </div>

                            <div class="form-group col-sm-6 ">
                                <label>Durasi Peminjaman</label>
                                <input type="text" name="tanggal_pinjam" placeholder="Masukkan  tanggal pinjam"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="card rounded shadow">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right  col-lg-3">ID buku</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right  col-lg-3">Judul Buku</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right  col-lg-3">Penerbit</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card border-primary shadow-sm col-4 offset-1">
                        <div class="card-body">
                            <p class="text-primary font-weight-bold text-center">
                                <i class="fas fa-exclamation-triangle h3"></i>
                                jika buku terlambat di kembalikan maka di kenakan denda
                            </p>

                            <div class="form-group">
                                <label for="jumlah_denda" class="text-dark">Jumlah Denda (Rp)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white">Rp</span>
                                    </div>
                                    <input type="number" class="form-control" id="jumlah_denda" name="jumlah_denda"
                                        placeholder="Masukkan jumlah denda" required>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-block text-white">
                                    <i class="fas fa-exclamation-circle"></i> Konfirmasi Denda
                                </button>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="row justify-content-center">

                    <div class=" col-sm-10 ">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>Judul buku</th>
                                <th>Status Durasi</th>
                                <th>Denda</th>
                                <th>Action</th>
                            </tr>
                            <tr>

                                <td>Irwansyah Saputra</td>
                                <td>2017-01-09</td>
                                <td>
                                    <div class="badge badge-success">Active</div>
                                </td>
                                <td>
                                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'super_admin') { ?>
                                        <a href="index.php?page=peminjaman_detail&act=delete&id_peminjaman_detail=<?php echo $row['id_peminjaman_detail'] ?>"
                                            class="btn btn-danger btn-sm">Hapus</a>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>



            </form>
        </div>
    </div>

</div>
</div>

</div>
</form>
</div>
</div>
</div>