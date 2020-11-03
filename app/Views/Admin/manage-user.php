<?=$this->extend('layout/dashboard')?>

<?=$this->section('sidebar')?>
<?=$this->include('Admin/sidebar')?>
<?=$this->endSection()?>


<?=$this->section('content')?>
  <h1 class="h3 mb-4 text-gray-800"><?=$title?></h1>
  <a href="#" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-50">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Data Pengguna</span>
  </a>
  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-2">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Username</th>
              <th>Jabatan</th>
              <th>Email</th>
              <th>No Hp</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Username</th>
              <th>Jabatan</th>
              <th>Email</th>
              <th>No Hp</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
              <td><?=$user->username?></td>
              <td><?=$user->nama_role?></td>
              <td><?=$user->email?></td>
              <td><?=$user->no_hp?></td>
              <td><img src="<?=base_url("images/" . $user->foto)?>" alt="<?=$user->username?>" width="65px;"></td>
              <td>
                  <a href="#" class="btn btn-info btn-circle btn-sm">
                    <i class="fas fa-info-circle"></i>
                  </a>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?=$this->endSection()?>