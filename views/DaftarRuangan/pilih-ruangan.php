<?php 

    $query_arr = $_POST;
    
    $day = isset($query_arr['day'])? $query_arr['day'] : date('d');
    $month = isset($query_arr['month'])? $query_arr['month'] : date('m');
    $year = date('y');
    $gedung = $_GET['gedung'];

    $year = date("y");

    // fungsi untuk mencari jumlah hari dalam bulan, credit: David Bindel
    function days_in_month($month, $year)
    {
        return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
    }

    $months_array = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
?>

<h1>Daftar Ruangan</h1>

<h3>Silahkan Memilih Tanggal dan Ruangan yang Akan Digunakan</h3>

<form action='./?gedung=<?= $gedung;?>' method='POST'>

    <?php 
        if(isset($query_arr['month']))
            echo "<input name='month' hidden value=$month></input>";
        
        if(isset($query_arr['day']))
            echo "<input name='day' hidden value=$day></input>";  
    ?>

    <div class="selector-container">
        <div id="month-selector" class="horizontal-container">
            <?php 
                for($i=0; $i<count($months_array); $i++){
                    $value = $i + 1;
                    if($value == $month){
                        echo "<button name='month' class='horizontal-item light' selected value={$value}>{$months_array[$i]}</button>";
                    } else{
                        echo "<button name='month' class='horizontal-item light' value={$value}>{$months_array[$i]}</button>";
                    }
                }
            ?>
        </div>

        <div id="day-selector" class="horizontal-container">
            <?php 
                for($i=1; $i <= days_in_month($month, $year); $i++){
                    if($i == $day){
                        echo "<button name='day' class='horizontal-item light' selected value=$i>$i</button>";
                    } else{
                        echo "<button name='day' class='horizontal-item light' value=$i>$i</button>";
                    }
                }
            ?>
        </div>

        <div id="ruangan-selector" class="table-container">
            <?php 
                for($i=1; $i <= 40; $i++){
                    echo "<button name='ruangan' class='light' value=$i>$i</button>";
                }
            ?>
        </div>

    </div>
    
    <?php 
        if(isset($_POST['month']) && isset($_POST['day'])){
            $waktu = date("Y-m-d", mktime(0, 0, 0, $_POST['month'], $_POST['day'], $year));
            echo $waktu;
        }

        $controller = new ruanganController;
    ?>

    <script>
    </script>

</form>