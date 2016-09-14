<table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>nip</th>
                  <th>Jabatan</th>
                </tr>
              </thead>
              <tbody>
              <?php
            $xp = getInstance();
            $eks = getXp();
            $tanggapan = array();
            foreach($data as $r){
            ?>
                <tr>
                  <td>1</td>
                  <td><a href="?act=guru&id=<?php echo $r['xp_id'];?>"><?php echo $r['nama'];?></a></td>
                  <td><?php echo $r['xp_id'];?></td>
                  <td><?php echo ucfirst($r['jabatan']);?></td>
                </tr>
               
                <?php
                }
                ?>
              </tbody>
            </table>