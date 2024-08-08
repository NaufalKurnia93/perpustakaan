<?php

if(isset($_GET['page']))
{
    $halaman_get = $_GET['page'];
}else{
    $halaman_get = "";
}

switch ($halaman_get) {
    case 'anggota':
        include('page/anggota/default.php');
        break;
        
        case 'petugas':
            include('page/petugas/default.php');
            break;

        case 'penulis':
            include('page/penulis/default.php');
            break;

            case 'kategori':
                include('page/kategori/default.php');
                break;

            case 'buku':
            include('page/buku/default.php');
            break;

            case 'peminjaman':
                include('page/peminjaman/default.php');
                break;

                case 'peminjaman_detail':
                    include('page/peminjaman_detail/default.php');
                    break;
            
        default:
         # code...
         $title = "Halaman Utama";
         include('layout/header.php');
         include('layout/sidebar.php');
         include('default.php');
          include('layout/footer.php');
         break;

}

?>
