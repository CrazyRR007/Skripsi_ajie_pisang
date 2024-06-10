<?php

// include 'koneksi.php';

require '../function.php';

$query_get_configuration = "SELECT * FROM data_konfigurasi ";
$result_get_configuration = mysqli_query($conn, $query_get_configuration);
$row_configuration = mysqli_fetch_assoc($result_get_configuration);

$result = mysqli_query($conn, "SELECT id_lapangan FROM data_pesan_lapangan WHERE status = 'terverifikasi'");
$result2 = mysqli_query($conn, "SELECT id_user FROM data_pesan_lapangan WHERE status = 'terverifikasi'");
$result3 = mysqli_query($conn, "SELECT id_jam FROM data_jam");
$result4 = mysqli_query($conn, "SELECT id_hari FROM data_pesan_lapangan WHERE status = 'terverifikasi'");

$lapangan = array();
$user = array();
$jam = array();
$hari = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $lapangan[] = $row["id_lapangan"];
    }
} else {
    echo "Tidak ada data yang ditemukan";
}

if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {
        $user[] = $row["id_user"];
    }
} else {
    echo "Tidak ada data yang ditemukan";
}

if ($result3->num_rows > 0) {
    while($row = $result3->fetch_assoc()) {
        $jam[] = $row["id_jam"];
    }
} else {
    echo "Tidak ada data yang ditemukan";
}

if ($result4->num_rows > 0) {
    while($row = $result4->fetch_assoc()) {
        $hari[] = $row["id_hari"];
    }
} else {
    echo "Tidak ada data yang ditemukan";
}

// Tutup koneksi database
// $conn->close();

// Konfigurasi algoritma genetika
$populationSize = $row_configuration['populationSize'];
$mutationRate = $row_configuration['mutationRate']; // Persentase mutasi
$generations = $row_configuration['generations'];

// Definisi kromosom (jadwal praktikum)
class Schedule {
    public $genes; // Genes berisi informasi tentang lapangan, user, jam, dan hari

    public function __construct($genes = array()) {
        $this->genes = $genes;
    }

    // Inisialisasi kromosom acak
    public static function random($lapangan, $user, $jam, $hari) {
        $genes = array();
        foreach ($lapangan as $course) {
            $genes[] = array(
                'lapangan' => $course,
                'user' => $user[array_rand($user)],
                'jam' => $jam[array_rand($jam)],
                'hari' => $hari[array_rand($hari)],
            );
        }
        shuffle($genes); // Acak urutan praktikum
        return new Schedule($genes);
    }

    // Mendapatkan fitness score (nilai kecocokan)
    public function fitness() {
        $penalty = 0;
        $scheduleInfo = array();

        foreach ($this->genes as $gene) {
            /*
            // 1. Kondisi 1 : Jika dua mata kuliah praktikum mempunyai ruangan dan jam yang sama pada hari yang sama.
            $key = $gene['day'] . '-' . $gene['timeslot'] . '-' . $gene['room'];
            if (isset($scheduleInfo[$key])) {
                $penalty++;
            } else {
                $scheduleInfo[$key] = true;
            }
            */

            // 1. Kondisi 1 : Lapangan tidak boleh mempunyai jam dan hari yang sama.
            $key = $gene['hari'] . '-' . $gene['jam'] . '-' . $gene['user'];
            if (isset($scheduleInfo[$key])) {
                $penalty++;
            } else {
                $scheduleInfo[$key] = true;
            }

            // 2. Kondisi 2: Khusus hari Jumat pukul 12.00.
            if ($gene['hari'] == 'H5' && $gene['jam'] == 'J2') {
                // Jika ada matakuliah pada hari Jumat pukul 12:00, berikan penalty
                $penalty++;
            }

            // 3. Kondisi 3: Jika ada user pada lapangan, slot waktu, dan hari yang sama.
            $assistantKey = $gene['hari'] . '-' . $gene['jam'] . '-' . $gene['user'] . '-' . $gene['lapangan'];
            if (isset($scheduleInfo[$assistantKey])) {
                $penalty++;
            } else {
                $scheduleInfo[$assistantKey] = true;
            }
            
            // 4. Kondisi 4:Jika hari yang sama muncul lebih dari 1 kali.
            if (!isset($courseCounts[$gene['hari']])) {
                $courseCounts[$gene['hari']] = 0;
            }
            $courseCounts[$gene['hari']]++;
            if ($courseCounts[$gene['hari']] > 1) {
                $penalty++;
            }               
        } 
        $fitnessScore = 1 / (1 + $penalty);
        return $fitnessScore;
    }
}

// Algoritma Genetika
class GeneticAlgorithm {
    public $populationSize;
    public $mutationRate;
    public $lapangan;
    public $user;
    public $timeslots;
    public $day;

    public function __construct($populationSize, $mutationRate, $lapangan, $user, $timeslots, $day) {
        $this->populationSize = $populationSize;
        $this->mutationRate = $mutationRate;
        $this->lapangan = $lapangan;
        $this->user = $user;
        $this->timeslots = $timeslots;
        $this->day = $day;
    }

    // Inisialisasi populasi awal
    public function initPopulation() {
        $population = array();
        for ($i = 0; $i < $this->populationSize; $i++) {
            $population[] = Schedule::random($this->lapangan, $this->user, $this->timeslots, $this->day);
        }
        return $population;
    }

    public function selectParent($population) {
        $totalFitness = array_reduce($population, function ($carry, $schedule) {
            return $carry + $schedule->fitness();
        }, 0);

        $rand = mt_rand(0, $totalFitness);

        $currentFitness = 0;
        foreach ($population as $schedule) {
            $currentFitness += $schedule->fitness();
            if ($currentFitness >= $rand) {
                return $schedule;
            }
        }
    }

    // Melakukan crossover untuk menghasilkan anak
    public function crossover($parent1, $parent2) {
        $genes1 = $parent1->genes;
        $genes2 = $parent2->genes;
        $childGenes = array();
        $splitPoint = rand(1, count($genes1) - 1);
        for ($i = 0; $i < $splitPoint; $i++) {
            $childGenes[] = $genes1[$i];
        }
        for ($i = $splitPoint; $i < count($genes2); $i++) {
            $childGenes[] = $genes2[$i];
        }
        return new Schedule($childGenes);
    }

    // Melakukan mutasi pada anak dengan peluang mutasi tertentu
    public function mutate($child) {
        foreach ($child->genes as & $gene) {
            if (rand(0, 100) < $this->mutationRate) {

                $gene['user'] = $this->user[array_rand($this->user)];
                $gene['jam'] = $this->timeslots[array_rand($this->timeslots)];
                $gene['hari'] = $this->day[array_rand($this->day)];
            }
        }
        return $child;
    }

    // Melakukan evolusi generasi
    public function regenerasi($population) {
        $newPopulation = array();

        // Elitism: Menyimpan beberapa individu terbaik dari populasi sebelumnya
        $eliteCount = 3;
        $sortedPopulation = $population;
        usort($sortedPopulation, function($a, $b) {
            return $b->fitness() - $a->fitness();
        });
        for ($i = 0; $i < $eliteCount; $i++) {
            $newPopulation[] = $sortedPopulation[$i];
        }

        // Melakukan crossover dan mutasi untuk menghasilkan generasi berikutnya
        while (count($newPopulation) < $this->populationSize) {
            $parent1 = $this->selectParent($population);
            $parent2 = $this->selectParent($population);
            $child = $this->crossover($parent1, $parent2);
            $child = $this->mutate($child);
            $newPopulation[] = $child;
        }

        return $newPopulation;
    }

    // Mencari solusi terbaik
    public function findSolution($generations) {
        $bestGeneration = 0; // Variabel untuk menyimpan generasi terbaik
        $population = $this->initPopulation();
        $bestSchedule = $population[0]; // Variabel untuk menyimpan jadwal terbaik
        for ($i = 0; $i < $generations; $i++) {
            $population = $this->regenerasi($population);
            foreach ($population as $schedule) {
                if ($schedule->fitness() > $bestSchedule->fitness()) {
                    $bestSchedule = $schedule;
                    $bestGeneration = $i + 1; // Mengupdate generasi terbaik
                }
            }
        }
        echo "Solusi terbaik ditemukan pada generasi ke-" . ($bestGeneration + 1) . "<br>";

        // Simpan solusi terbaik ke dalam tabel data_jadwal
        $this->saveBestSchedule($bestSchedule, $bestGeneration);

        return $bestSchedule;
    }

    // Metode untuk menyimpan solusi terbaik ke dalam tabel data_jadwal
    private function saveBestSchedule($bestSchedule, $bestGeneration) {
        global $conn;

        // Bersihkan tabel data_jadwal sebelum menyimpan jadwal baru
        $truncateQuery = "TRUNCATE TABLE data_jadwal";
        $conn->query($truncateQuery);

        // Siapkan query untuk menyimpan jadwal baru
        $insertQuery = "INSERT INTO data_jadwal (id_lapangan, id_user, id_hari, id_jam, best_generation, fitness_score) VALUES ";
        $values = array();

        // Bangun query dengan nilai dari solusi terbaik
        foreach ($bestSchedule->genes as $gene) {
            $values[] = "('" . $gene['lapangan'] . "', '" . $gene['user'] . "', '" . $gene['hari'] . "', '" . $gene['jam'] . "','" . $bestGeneration+1 . "', '" . $bestSchedule->fitness() . "')";
        }

        // Gabungkan nilai-nilai menjadi satu query INSERT
        $insertQuery .= implode(",", $values);

        // Eksekusi query INSERT
        $conn->query($insertQuery);
    }

}

// Membuat objek algoritma genetika dan menemukan solusi
$ga = new GeneticAlgorithm($populationSize, $mutationRate, $lapangan, $user, $jam, $hari);
$bestSchedule = $ga->findSolution($generations);
?>