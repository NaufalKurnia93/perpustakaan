<footer class="bg-light text-center py-3 pd">
  <div class="container">
    <span class="text-muted">&copy; 2024 Perpustakaan Naufal. All Rights Reserved.</span>
  </div>
</footer>

<!-- sweet alert start  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  <?php
  if (isset($_GET['cek']) && $_GET['cek'] == "add") {
    ?>

    Swal.fire({
      icon: "success",
      title: "data berhasil di tambahkan",
      showConfirmButton: false,
      timer: 1500
    });

  <?php } elseif (isset($_GET['cek']) && $_GET['cek'] == "updt") { ?>
    Swal.fire({
      icon: "success",
      title: "data berhasil di simpan",
      showConfirmButton: false,
      timer: 1500
    });

    <?php } elseif (isset($_GET['cek']) && $_GET['cek'] == "del") { ?>
        Swal.fire({
            icon: "success",
            title: 'Items telah dihapus!',
            showConfirmButton: false,
            timer: 1500
        });

    <?php
  }
  ?>


</script>